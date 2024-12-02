<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\AktivitasModel;
use App\Models\SliderModel;
use App\Models\ArtikelModel;

class Dashboardctrl extends BaseController
{
    public function index()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Ubah 'login' sesuai dengan halaman login kamu
        }
        $produkModel = new ProdukModel();
        $aktivitasModel = new AktivitasModel();
        $sliderModel = new SliderModel();
        $artikelModel = new ArtikelModel();

        $data['productCount'] = $produkModel->countAll();
        $data['aktivitasCount'] = $aktivitasModel->countAll();
        $data['sliderCount'] = $sliderModel->countAll();
        $data['artikelCount'] = $artikelModel->countAll();

        return view('admin/dashboard/index', $data);
    }
}