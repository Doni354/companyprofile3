<?php

namespace App\Controllers\user;

use App\Controllers\user\BaseController;
use App\Models\ProfilModel;
use App\Models\SliderModel;
use App\Models\ArtikelModel;
use App\Models\MetaModel;

class Artikelctrl extends BaseController
{
    private $ProfilModel;
    private $SliderModel;
    private $ArtikelModel;
    private $MetaModel;

    public function __construct()
    {
        $this->ProfilModel = new ProfilModel();
        $this->SliderModel = new SliderModel();
        $this->ArtikelModel = new ArtikelModel();
        $this->MetaModel = new MetaModel();
    }

    public function index()
    {
        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'tbslider' => $this->SliderModel->findAll(),
            'artikelterbaru' => $this->ArtikelModel->getArtikelTerbaru(),
        ];

        // SEO
        $meta = $this->MetaModel->where('nama_halaman', 'Artikel')->first();
        $canonicalUrl = base_url('artikel');

        return view('user/artikel/index', [
            'meta' => $meta,
            'canonicalUrl' => $canonicalUrl,
            'profil' => $data['profil'],
            'tbslider' => $data['tbslider'],
            'artikelterbaru' => $data['artikelterbaru'],
        ]);
    }

    public function detail($id_artikel)
    {
        $artikel = $this->ArtikelModel->getDetailArtikel($id_artikel);

        if (!$artikel) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Artikel dengan ID $id_artikel tidak ditemukan");
        }

        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'artikel' => $artikel,
            'artikel_lain' => $this->ArtikelModel->getArtikelLainnya($id_artikel, 4),
        ];

        helper('text');

        // Set meta description based on session language
        $metaDescription = $this->generateMetaDescription($data);
        $data['Meta'] = character_limiter($metaDescription, 150);

        // Set title based on session language
        if (session('lang') === 'in') {
            $data['Title'] = $artikel->judul_artikel ?? 'Detail Artikel';
        } else {
            $data['Title'] = $artikel->judul_artikel_en ?? 'Detail Artikel';
        }

        return view('user/artikel/detail', $data);
    }

    private function generateMetaDescription($data)
    {
        $nama_perusahaan = $data['profil'][0]->nama_perusahaan;
        $deskripsi_perusahaan = session('lang') === 'in' ?
            strip_tags($data['profil'][0]->deskripsi_perusahaan_in) :
            strip_tags($data['profil'][0]->deskripsi_perusahaan_en);

        $teks = session('lang') === 'in' ?
            "Artikel dari $nama_perusahaan. $deskripsi_perusahaan" :
            "Articles of $nama_perusahaan. $deskripsi_perusahaan";

        return $teks;
    }
}
