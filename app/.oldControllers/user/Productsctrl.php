<?php

namespace App\Controllers\user;

use App\Controllers\user\BaseController;
use App\Models\ProfilModel;
use App\Models\SliderModel;
use App\Models\ProdukModel;
use App\Models\MetaModel;

class Productsctrl extends BaseController
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
        $this->MetaModel = new MetaModel();
    }

    public function index()
    {
        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'tbslider' => $this->SliderModel->findAll(),
            'tbproduk' => $this->ProdukModel->findAll(),
        ];

        helper('text');

        if (session('lang') === 'in') {
            $nama_perusahaan = $data['profil'][0]->nama_perusahaan;
            $deskripsi_perusahaan = strip_tags($data['profil'][0]->deskripsi_perusahaan_in);

            $data['Title'] = $data['tbproduk']->nama_produk_in ?? 'Produk';
            $teks = "Produk dari $nama_perusahaan. $deskripsi_perusahaan";
        } else {
            $nama_perusahaan = $data['profil'][0]->nama_perusahaan;
            $deskripsi_perusahaan = strip_tags($data['profil'][0]->deskripsi_perusahaan_en);

            $data['Title'] = $data['tbproduk']->nama_produk_en ?? 'Products';
            $teks = "Products of $nama_perusahaan. $deskripsi_perusahaan";
        }
        // SEO
        $meta = $this->MetaModel->where('nama_halaman', 'Produk')->first();
        $canonicalUrl = base_url('product');

        return view('user/products/index', [
            'meta' => $meta,
            'canonicalUrl' => $canonicalUrl,
            'profil' => $data['profil'],
            'tbslider' => $data['tbslider'],
            'tbproduk' => $data['tbproduk'],
        ]);
    }

    public function detail($id_produk)
    {
        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'tbproduk' => $this->ProdukModel->find($id_produk),
        ];

        helper('text');

        if (session('lang') === 'in') {
            $nama_produk = $data['tbproduk']->nama_produk_in;
            $deskripsi_produk = strip_tags($data['tbproduk']->deskripsi_produk_in);

            $data['Title'] = $data['tbproduk']->nama_produk_in ?? '';
            $teks = "$nama_produk. $deskripsi_produk";
        } else {
            $nama_produk = $data['tbproduk']->nama_produk_en;
            $deskripsi_produk = strip_tags($data['tbproduk']->deskripsi_produk_en);

            $data['Title'] = $data['tbproduk']->nama_produk_en ?? '';
            $teks = "$nama_produk. $deskripsi_produk";
        }

        $batasan = 150;
        $data['Meta'] = character_limiter($teks, $batasan);

        return view('user/products/detail', $data);
    }
}
