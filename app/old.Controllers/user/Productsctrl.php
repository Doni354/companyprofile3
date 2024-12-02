<?php

namespace App\Controllers\user;

use App\Controllers\user\BaseController;
use App\Models\ProfilModel;
use App\Models\SliderModel;
use App\Models\ProdukModel;
use App\Models\MetaModel;
use CodeIgniter\Exceptions\PageNotFoundException;

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

        // Load the text helper
        helper('text');
    }

    public function index()
    {
        $lang = session()->get('lang') ?? 'en';

        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'tbslider' => $this->SliderModel->findAll(),
            'tbproduk' => $this->ProdukModel->findAll(),
            'lang' => $lang
        ];

        // SEO
        $meta = $this->MetaModel->where('nama_halaman', 'Product')->first();
        $canonicalUrl = base_url('product');

        return view('user/products/index', [
            'meta' => $meta,
            'canonicalUrl' => $canonicalUrl,
            'profil' => $data['profil'],
            'tbslider' => $data['tbslider'],
            'tbproduk' => $data['tbproduk'],
        ]);
    }

    public function detail($slug_produk)
{
    $lang = session()->get('lang') ?? 'en';

    $data = [
        'profil' => $this->ProfilModel->findAll(),
        'tbproduk' => $this->ProdukModel->where('slug_id', $slug_produk)
            ->orWhere('slug_en', $slug_produk)
            ->first(),
    ];

    helper('text');

    if (!$data['tbproduk']) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException("Produk dengan slug $slug_produk tidak ditemukan");
    }

    $nama_produk = $lang === 'in' ? 
        $data['tbproduk']->nama_produk_in : 
        $data['tbproduk']->nama_produk_en;
    $deskripsi_produk = $lang === 'in' ? 
        strip_tags($data['tbproduk']->deskripsi_produk_in) : 
        strip_tags($data['tbproduk']->deskripsi_produk_en);

    $data['Title'] = $nama_produk ?? '';
    $teks = "$nama_produk. $deskripsi_produk";

    $batasan = 150;
    $data['Meta'] = character_limiter($teks, $batasan);

    return view('user/products/detail', $data);
}
}