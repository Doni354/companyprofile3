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
        $lang = session()->get('lang') ?? 'en';

        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'tbslider' => $this->SliderModel->findAll(),
            'artikelterbaru' => $this->ArtikelModel->getArtikelTerbaru(),
            'lang' => $lang
        ];

        // SEO
        $meta = $this->MetaModel->where('nama_halaman', 'Article')->first();
        $canonicalUrl = base_url('article');

        return view('user/article/index', [
            'meta' => $meta,
            'canonicalUrl' => $canonicalUrl,
            'profil' => $data['profil'],
            'tbslider' => $data['tbslider'],
            'artikelterbaru' => $data['artikelterbaru'],
            'lang' => $lang
        ]);
    }

    public function detail($slug_artikel)
    {
        $lang = session()->get('lang') ?? 'en';

        // Cari artikel berdasarkan slug, bukan ID
        $artikel = $this->ArtikelModel->where('slug_id', $slug_artikel)
            ->orWhere('slug_en', $slug_artikel)
            ->first();

        if (!$artikel) {
            throw new PageNotFoundException("Artikel dengan slug $slug_artikel tidak ditemukan");
        }

        // Tentukan bahasa (dengan fallback jika tidak ada session)
        $language = session('lang') ?? 'in';
        
        // Memilih judul dan deskripsi berdasarkan session bahasa
        $judul_artikel = $language === 'in' ? $artikel->judul_artikel : $artikel->judul_artikel_en;
        $deskripsi_artikel = $language === 'in' ? $artikel->deskripsi_artikel : $artikel->deskripsi_artikel_en;

        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'artikel' => $artikel,
            'artikel_lain' => $this->ArtikelModel->getArtikelLainnya($artikel->id_artikel, 4),
            'judul_artikel' => $judul_artikel,
            'deskripsi_artikel' => $deskripsi_artikel,
            'language' => $language,
            'lang' => $lang,
        ];

        helper('text');

        // Set meta description berdasarkan bahasa session
        $metaDescription = $this->generateMetaDescription($data);
        $data['Meta'] = character_limiter($metaDescription, 150);

        // Set judul halaman sesuai judul artikel yang sesuai dengan bahasa

        return view('user/article/detail', $data);
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