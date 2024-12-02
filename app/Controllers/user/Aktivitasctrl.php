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
        $lang = session()->get('lang') ?? 'en';

        $meta = $this->MetaModel->where('nama_halaman', 'Aktivitas')->first();
        // var_dump($meta);
        // die();
        $canonicalUrl = base_url('activities');

        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'tbslider' => $this->SliderModel->findAll(),
            'tbproduk' => $this->ProdukModel->findAll(),
            'tbaktivitas' => $this->AktivitasModel->findAll(),
            'meta' => $meta,
            'lang' => $lang,
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



        $batasan = 150;
        $data['Meta'] = character_limiter($teks, $batasan);

        return view('user/aktivitas/index', $data);
    }

    public function detail($slug_aktivitas)
    {
        $lang = session()->get('lang') ?? 'en';

        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'tbaktivitas' => $this->AktivitasModel->where('slug_id', $slug_aktivitas)
                ->orWhere('slug_en', $slug_aktivitas)
                ->first(),
        ];

        helper('text');

        if (!$data['tbaktivitas']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Aktivitas dengan slug $slug_aktivitas tidak ditemukan");
        }

        $lang = session('lang') ?? 'en';

        $nama_aktivitas = $lang === 'in' ?
            $data['tbaktivitas']->nama_aktivitas_in :
            $data['tbaktivitas']->nama_aktivitas_en;
        $deskripsi_aktivitas = $lang === 'in' ?
            strip_tags($data['tbaktivitas']->deskripsi_aktivitas_in) :
            strip_tags($data['tbaktivitas']->deskripsi_aktivitas_en);

        $data['Title'] = $nama_aktivitas ?? '';
        $teks = "$nama_aktivitas. $deskripsi_aktivitas";

        $batasan = 150;
        $data['Meta'] = character_limiter($teks, $batasan);

        return view('user/aktivitas/detail', $data);
    }
}
