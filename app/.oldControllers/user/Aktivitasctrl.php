<?php

namespace App\Controllers\user;

use App\Controllers\user\BaseController;
use App\Models\ProfilModel;
use App\Models\SliderModel;
use App\Models\ProdukModel;
use App\Models\AktivitasModel;
use App\Models\MetaModel;

class Aktivitasctrl extends BaseController
{
    private $ProfilModel;
    private $SliderModel;
    private $ProdukModel;
    private $AktivitasModel;
    private $MetaModel;


    public function __construct()
    {
        $this->ProfilModel = new ProfilModel();
        $this->SliderModel = new SliderModel();
        $this->ProdukModel = new ProdukModel();
        $this->AktivitasModel = new AktivitasModel();
        $this->MetaModel = new MetaModel();
    }

    public function index()
    {
        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'tbslider' => $this->SliderModel->findAll(),
            'tbproduk' => $this->ProdukModel->findAll(),
            'tbaktivitas' => $this->AktivitasModel->findAll(),
        ];

        helper('text');

        if (session('lang') === 'in') {
            $nama_perusahaan = $data['profil'][0]->nama_perusahaan;
            $deskripsi_perusahaan = strip_tags($data['profil'][0]->deskripsi_perusahaan_in);

            $data['Title'] = $data['tbproduk']->nama_produk_in ?? 'Aktivitas';
            $teks = "Aktivitas dari $nama_perusahaan. $deskripsi_perusahaan";
        } else {
            $nama_perusahaan = $data['profil'][0]->nama_perusahaan;
            $deskripsi_perusahaan = strip_tags($data['profil'][0]->deskripsi_perusahaan_en);

            $data['Title'] = $data['tbproduk']->nama_produk_en ?? 'Activities';
            $teks = "Activities of $nama_perusahaan. $deskripsi_perusahaan";
        }
        $meta = $this->MetaModel->where('nama_halaman', 'Aktivitas')->first(); // Ambil meta untuk halaman Home
        $data['meta'] = $meta; // Tambahkan meta ke data
        $data['canonicalUrl'] = base_url('user/beranda'); // Tambahkan canonical URL

        $batasan = 150;

        return view('user/aktivitas/index', $data);
    }

    public function detail($id_aktivitas)
    {
        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'tbaktivitas' => $this->AktivitasModel->find($id_aktivitas),
        ];

        helper('text');

        if (session('lang') === 'in') {
            $nama_aktivitas = $data['tbaktivitas']->nama_aktivitas_in;
            $deskripsi_aktivitas = strip_tags($data['tbaktivitas']->deskripsi_aktivitas_in);

            $data['Title'] = $data['tbaktivitas']->nama_aktivitas_in ?? '';
            $teks = "$nama_aktivitas. $deskripsi_aktivitas";
        } else {
            $nama_aktivitas = $data['tbaktivitas']->nama_aktivitas_en;
            $deskripsi_aktivitas = strip_tags($data['tbaktivitas']->deskripsi_aktivitas_en);

            $data['Title'] = $data['tbaktivitas']->nama_aktivitas_en ?? '';
            $teks = "$nama_aktivitas. $deskripsi_aktivitas";
        }

        $batasan = 150;
        $data['Meta'] = character_limiter($teks, $batasan);

        return view('user/aktivitas/detail', $data);
    }
}
