<?php

namespace App\Controllers\admin;

use App\Controllers\admin\BaseController;
use App\Models\ProfilModel;


class Loginctrl extends BaseController
{
    public function index()
    {
        // Pengecekan jika pengguna sudah login
        if (session()->get('logged_in')) {
            return redirect()->to(base_url('admin/dashboard')); // Ubah 'vw_home' sesuai dengan halaman yang diinginkan setelah login
        }

        // Proses login jika pengguna belum login
        return view('admin/login/vw_login');
    }

    public function process()
    {
        $users = new ProfilModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataUser = $users->where([
            'username' => $username,
        ])->first();
        if ($dataUser) {
            if ($password === $dataUser->password) {
                session()->set([
                    'username' => $dataUser->username,
                    'nama_perusahaan' => $dataUser->nama_perusahaan,
                    'deskripsi_perusahaan_in' => $dataUser->deskripsi_perusahaan_in,
                    'deskripsi_perusahaan_en' => $dataUser->deskripsi_perusahaan_en,
                    'title_website' => $dataUser->title_website,
                    'alamat' => $dataUser->alamat,
                    'deskripsi_kontak_in' => $dataUser->deskripsi_kontak_in,
                    'deskripsi_kontak_en' => $dataUser->deskripsi_kontak_en,
                    'link_maps' => $dataUser->link_maps,
                    'link_whatsapp' => $dataUser->link_whatsapp,
                    'no_hp' => $dataUser->no_hp,
                    'email' => $dataUser->email,
                    'favicon_website' => $dataUser->favicon_website,
                    'logo_perusahaan' => $dataUser->logo_perusahaan,
                    'foto_utama' => $dataUser->foto_utama,
                    'logged_in' => TRUE
                ]);
                return redirect()->to(base_url('admin/dashboard'));
            } else {
                session()->setFlashdata('error', 'Username & Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Username & Password Salah');
            return redirect()->back();
        }
    }

    function logout()
    {
        session()->destroy();
        return redirect()->to('admin');
    }
}
