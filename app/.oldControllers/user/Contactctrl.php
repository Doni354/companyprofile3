<?php

namespace App\Controllers\user;

use App\Controllers\user\BaseController;
use App\Models\ProfilModel;
use App\Models\SliderModel;
use App\Models\ProdukModel;
use App\Models\MetaModel;

class Contactctrl extends BaseController
{
    private $ProfilModel;
    private $SliderModel;
    private $ProdukModel;
    private $MetaModel;

    public function __construct()
    {
        $this->ProfilModel = new ProfilModel();
        $this->SliderModel = new SliderModel();
        $this->ProdukModel = new ProdukModel();
        $this->MetaModel = new MetaModel();   //Tambahkan ini
    }

    public function index()
    {
        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'tbslider' => $this->SliderModel->findAll(),
            'tbproduk' => $this->ProdukModel->findAll(),
        ];

        // SEO
        $meta = $this->MetaModel->where('nama_halaman', 'Kontak')->first();
        $canonicalUrl = base_url('contact');

        return view('user/contact/index', [
            'meta' => $meta,
            'canonicalUrl' => $canonicalUrl,
            'profil' => $data['profil'],
            'tbslider' => $data['tbslider'],
            'tbproduk' => $data['tbproduk'],
        ]);
    }
}
