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
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }
        $data = [
            'artikels' => $this->artikelModel->findAll(),
        ];
        return view('admin/artikel/index', $data);
    }

    public function tambah()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }
        return view('admin/artikel/tambah', [
            'validation' => $this->validator
        ]);
    }

    public function proses_tambah()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        // Validate input
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
        }

        $file_foto = $this->request->getFile('foto_artikel');
        $currentDateTime = date('dmYHis');
        $judul_artikel = $this->request->getPost('judul_artikel');
        $judul_artikel_en = $this->request->getPost('judul_artikel_en');

        // Generate slugs
        $slug_id = url_title($judul_artikel, '-', true);
        $slug_en = url_title($judul_artikel_en, '-', true);

        // Handle file upload
        $newFileName = "{$currentDateTime}.{$file_foto->getExtension()}";
        $file_foto->move('asset-user/images', $newFileName);

        // Insert data into database
        $data = [
            'judul_artikel' => $judul_artikel,
            'judul_artikel_en' => $judul_artikel_en,
            'deskripsi_artikel' => $this->request->getPost('deskripsi_artikel'),
            'deskripsi_artikel_en' => $this->request->getPost('deskripsi_artikel_en'),
            'foto_artikel' => $newFileName,
            'meta_title_artikel' => $this->request->getPost('meta_title_artikel'),
            'meta_description_artikel' => $this->request->getPost('meta_description_artikel'),
            'meta_title_artikel_en' => $this->request->getPost('meta_title_artikel_en'), // Added
            'meta_description_artikel_en' => $this->request->getPost('meta_description_artikel_en'), // Added
            'slug_id' => $slug_id,
            'slug_en' => $slug_en
        ];
        $this->artikelModel->insert($data);

        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to(base_url('admin/artikel/index'));
    }

    public function edit($id_artikel)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }
        $artikelData = $this->artikelModel->find($id_artikel);
        return view('admin/artikel/edit', [
            'artikelData' => $artikelData,
            'validation' => \Config\Services::validation()
        ]);
    }

    public function proses_edit($id_artikel = null)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        if (!$id_artikel) {
            return redirect()->back();
        }

        $file_foto = $this->request->getFile('foto_artikel');

        $judul_artikel = $this->request->getPost('judul_artikel');
        $judul_artikel_en = $this->request->getPost('judul_artikel_en');

        // Generate slugs
        $slug_id = url_title($judul_artikel, '-', true);
        $slug_en = url_title($judul_artikel_en, '-', true);

        // Handle file upload
        if ($file_foto->isValid() && !$file_foto->hasMoved()) {
            $artikelData = $this->artikelModel->find($id_artikel);
            if ($artikelData->foto_artikel && file_exists('asset-user/images/' . $artikelData->foto_artikel)) {
                unlink('asset-user/images/' . $artikelData->foto_artikel);
            }
            $newFileName = date('dmYHis') . ".{$file_foto->getExtension()}";
            $file_foto->move('asset-user/images', $newFileName);
        } else {
            // Jika tidak ada file baru, ambil nama file lama
            $artikelData = $this->artikelModel->find($id_artikel);
            $newFileName = $artikelData->foto_artikel;        }

        // Update data in database
        $data = [
            'judul_artikel' => $judul_artikel,
            'judul_artikel_en' => $judul_artikel_en,
            'deskripsi_artikel' => $this->request->getPost('deskripsi_artikel'),
            'deskripsi_artikel_en' => $this->request->getPost('deskripsi_artikel_en'),
            'foto_artikel' => $newFileName,
            'meta_title_artikel' => $this->request->getPost('meta_title_artikel'),
            'meta_description_artikel' => $this->request->getPost('meta_description_artikel'),
            'meta_title_artikel_en' => $this->request->getPost('meta_title_artikel_en'), // Added
            'meta_description_artikel_en' => $this->request->getPost('meta_description_artikel_en'), // Added
            'slug_id' => $slug_id,
            'slug_en' => $slug_en
        ];
        $this->artikelModel->update($id_artikel, $data);

        session()->setFlashdata('success', 'Berkas berhasil diperbarui');
        return redirect()->to(base_url('admin/artikel/index'));
    }

    public function delete($id = false)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }
        $artikelData = $this->artikelModel->find($id);

        // Delete file
        if ($artikelData->foto_artikel && file_exists('asset-user/images/' . $artikelData->foto_artikel)) {
            unlink('asset-user/images/' . $artikelData->foto_artikel);
        }

        // Delete data from database
        $this->artikelModel->delete($id);

        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to(base_url('admin/artikel/index'));
    }
}