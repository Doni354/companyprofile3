<?php

namespace App\Controllers\admin;

use App\Models\ArtikelModel;

class Artikel extends BaseController
{
    private $artikelModel;

    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
    }

    public function index()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Sesuaikan dengan halaman login Anda
        }

        $data = [
            'artikels' => $this->artikelModel->findAll(),
        ];

        return view('admin/artikel/index', $data);
    }

    public function tambah()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Sesuaikan dengan halaman login Anda
        }

        return view('admin/artikel/tambah', [
            'validation' => $this->validator
        ]);
    }

    public function proses_tambah()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Sesuaikan dengan halaman login Anda
        }

        $judul_artikel_in = $this->request->getVar("judul_artikel_in");
        $judul_artikel_en = $this->request->getVar("judul_artikel_en");
        $deskripsi_artikel_in = $this->request->getVar("deskripsi_artikel_in");
        $deskripsi_artikel_en = $this->request->getVar("deskripsi_artikel_en");

        // Validasi judul artikel dalam bahasa Indonesia
        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $judul_artikel_in)) {
            session()->setFlashdata('error', 'Judul artikel dalam bahasa Indonesia hanya boleh berisi huruf dan angka.');
            return redirect()->back()->withInput();
        }

        // Validasi judul artikel dalam bahasa Inggris
        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $judul_artikel_en)) {
            session()->setFlashdata('error', 'Judul artikel dalam bahasa Inggris hanya boleh berisi huruf dan angka.');
            return redirect()->back()->withInput();
        }

        // Proses validasi foto artikel
        if (!$this->validate([
            'foto_artikel' => [
                'rules' => 'uploaded[foto_artikel]|is_image[foto_artikel]|max_dims[foto_artikel,572,572]|mime_in[foto_artikel,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih foto terlebih dahulu',
                    'is_image' => 'File yang anda pilih bukan gambar',
                    'max_dims' => 'Maksimal ukuran gambar 572x572 pixels',
                    'mime_in' => 'File yang anda pilih wajib berekstensikan jpg/jpeg/png'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            // Simpan artikel ke dalam database
            $file_foto = $this->request->getFile('foto_artikel');
            $currentDateTime = date('dmYHis');
            $newFileName = "{$currentDateTime}.{$file_foto->getExtension()}";
            $file_foto->move('asset-user/images', $newFileName);

            $data = [
                'judul_artikel' => $judul_artikel_in,
                'judul_artikel_en' => $judul_artikel_en,
                'deskripsi_artikel' => $deskripsi_artikel_in,
                'deskripsi_artikel_en' => $deskripsi_artikel_en,
                'foto_artikel' => $newFileName
            ];

            $this->artikelModel->insert($data);

            return redirect()->to(base_url('admin/artikel'));
        }
    }

    public function edit($id_artikel)
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Ubah 'login' sesuai dengan halaman login kamu
        }
        $artikelData = $this->artikelModel->find($id_artikel);

        $validation = \Config\Services::validation();

        return view('admin/artikel/edit', [
            'artikelData' => $artikelData,
            'validation' => $validation
        ]);
    }

    public function proses_edit($id_artikel = null)
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Sesuaikan dengan halaman login Anda
        }

        // Pengecekan apakah ID artikel valid
        if (!$id_artikel) {
            return redirect()->back();
        }

        $judul_artikel_in = $this->request->getVar("judul_artikel_in");
        $judul_artikel_en = $this->request->getVar("judul_artikel_en");
        $deskripsi_artikel_in = $this->request->getVar("deskripsi_artikel_in");
        $deskripsi_artikel_en = $this->request->getVar("deskripsi_artikel_en");

        // Validasi judul artikel dalam bahasa Indonesia
        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $judul_artikel_in)) {
            session()->setFlashdata('error', 'Judul artikel dalam bahasa Indonesia hanya boleh berisi huruf dan angka.');
            return redirect()->back()->withInput();
        }

        // Validasi judul artikel dalam bahasa Inggris
        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $judul_artikel_en)) {
            session()->setFlashdata('error', 'Judul artikel dalam bahasa Inggris hanya boleh berisi huruf dan angka.');
            return redirect()->back()->withInput();
        }

        $file_foto = $this->request->getFile('foto_artikel');

        // Jika file foto di-upload
        if ($file_foto->isValid()) {
            // Hapus foto lama jika ada
            $artikelData = $this->artikelModel->find($id_artikel);
            $oldFilePath = 'asset-user/images/' . $artikelData->foto_artikel;
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }

            // Simpan foto baru
            $newFileName = $file_foto->getRandomName();
            $file_foto->move('asset-user/images', $newFileName);
        } else {
            // Jika tidak ada file foto baru, gunakan foto lama
            $artikelData = $this->artikelModel->find($id_artikel);
            $newFileName = $artikelData->foto_artikel;
        }

        // Update data artikel
        $data = [
            'judul_artikel' => $judul_artikel_in,
            'judul_artikel_en' => $judul_artikel_en,
            'deskripsi_artikel' => $deskripsi_artikel_in,
            'deskripsi_artikel_en' => $deskripsi_artikel_en,
            'foto_artikel' => $newFileName, // Gunakan nama file foto baru atau lama
        ];

        // Update data artikel dalam database
        $this->artikelModel->update($id_artikel, $data);

        // Redirect ke halaman admin artikel
        return redirect()->to(base_url('admin/artikel/index'));
    }

    public function delete($id = false)
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Ubah 'login' sesuai dengan halaman login kamu
        }

        $data = $this->artikelModel->find($id);
        unlink('asset-user/images/' . $data->foto_artikel);
        $this->artikelModel->delete($id);

        return redirect()->to(base_url('admin/artikel/index'));
    }
}
