<?php

namespace App\Controllers\user;

use App\Controllers\user\BaseController;
use App\Models\ProfilModel;
use App\Models\SliderModel;
use App\Models\ProdukModel;
use App\Models\ArtikelModel;
use App\Models\MetaModel; // Tambahkan ini

class Homectrl extends BaseController
{
    private $ProfilModel;
    private $SliderModel;
    private $ProdukModel;
    private $ArtikelModel;
    private $MetaModel; // Tambahkan ini

    public function __construct()
    {
        $this->ProfilModel = new ProfilModel();
        $this->SliderModel = new SliderModel();
        $this->ProdukModel = new ProdukModel();
        $this->ArtikelModel = new ArtikelModel();
        $this->MetaModel = new MetaModel(); // Tambahkan ini
    }

    public function index()
    {
        $lang = session()->get('lang') ?? 'en';
     

        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'tbslider' => $this->SliderModel->findAll(),
            'tbproduk' => $this->ProdukModel->findAll(),
            'artikelterbaru' => $this->ArtikelModel->getArtikelTerbaru(), // Fetch the latest articles
            'lang' => $lang
        ];

        $data['Title'] = $data['profil'][0]->title_website;

        helper('text');

        if (session('lang') === 'id') {
            $teks = strip_tags($data['profil'][0]->deskripsi_perusahaan_in);
        } else {
            $teks = strip_tags($data['profil'][0]->deskripsi_perusahaan_en);
        }

        $batasan = 150;
        $data['Meta'] = character_limiter($teks, $batasan);

        // SEO
        $meta = $this->MetaModel->where('nama_halaman', 'Beranda')->first(); // Ambil meta untuk halaman Home
        $data['meta'] = $meta; // Tambahkan meta ke data
        $data['canonicalUrl'] = base_url('user/beranda'); // Tambahkan canonical URL



        return view('user/home/index', $data);
    }

    public function redirectToHome()
    {
        return redirect()->to('/');
    }

    public function language($locale)
    {
        $session = session();

        // Validasi bahasa yang diterima
        if ($locale === 'id' || $locale === 'en') {
            // Mengatur sesi bahasa ke bahasa yang dipilih
            $session->set('lang', $locale);
        }

        // Redirect kembali ke halaman sebelumnya
        return redirect()->back();
    }
}