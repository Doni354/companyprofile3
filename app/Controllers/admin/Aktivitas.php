<?php

namespace App\Controllers\admin;

use App\Models\AktivitasModel;

class Aktivitas extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }
        $aktivitasModel = new AktivitasModel();
        $all_data_aktivitas = $aktivitasModel->findAll();
        return view('admin/aktivitas/index', [
            'all_data_aktivitas' => $all_data_aktivitas,
            'validation' => \Config\Services::validation()
        ]);
    }

    public function tambah()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }
        return view('admin/aktivitas/tambah', [
            'validation' => \Config\Services::validation()
        ]);
    }

    public function proses_tambah()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }
        
        date_default_timezone_set('Asia/Jakarta');
        $file_foto = $this->request->getFile('foto_aktivitas');
        $currentDateTime = date('dmYHis');
        $nama_aktivitas_in = $this->request->getVar("nama_aktivitas_in");
        $nama_aktivitas_en = $this->request->getVar("nama_aktivitas_en");

        // Validate input
        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $nama_aktivitas_in) || !preg_match('/^[a-zA-Z0-9\s]+$/', $nama_aktivitas_en)) {
            session()->setFlashdata('error', 'Nama aktivitas hanya boleh berisi huruf dan angka.');
            return redirect()->back()->withInput();
        }

        // Generate slugs
        $slug_id = url_title($nama_aktivitas_in, '-', true);
        $slug_en = url_title($nama_aktivitas_en, '-', true);

        // Handle file upload
        if ($file_foto->isValid() && !$file_foto->hasMoved()) {
            $newFileName = "{$nama_aktivitas_en}_{$nama_aktivitas_in}_{$currentDateTime}.{$file_foto->getExtension()}";
            $file_foto->move('asset-user/images', $newFileName);
        } else {
            $newFileName = null;
        }

        // Insert data into database
        $aktivitasModel = new AktivitasModel();
        $data = [
            'nama_aktivitas_in' => $nama_aktivitas_in,
            'nama_aktivitas_en' => $nama_aktivitas_en,
            'deskripsi_aktivitas_in' => $this->request->getPost("deskripsi_aktivitas_in"),
            'deskripsi_aktivitas_en' => $this->request->getPost("deskripsi_aktivitas_en"),
            'foto_aktivitas' => $newFileName,
            'meta_title_aktivitas' => $this->request->getPost("meta_title_aktivitas"),
            'meta_description_aktivitas' => $this->request->getPost("meta_description_aktivitas"),
            'meta_title_aktivitas_en' => $this->request->getPost("meta_title_aktivitas_en"),
            'meta_description_aktivitas_en' => $this->request->getPost("meta_description_aktivitas_en"),
            'slug_id' => $slug_id,
            'slug_en' => $slug_en
        ];
        $aktivitasModel->insert($data);

        session()->setFlashdata('success', 'Aktivitas berhasil ditambahkan');
        return redirect()->to(base_url('admin/aktivitas/index'));
    }

    public function proses_edit($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }
        
        date_default_timezone_set('Asia/Jakarta');
        $aktivitasModel = new AktivitasModel();
        $aktivitasData = $aktivitasModel->getAktivitasById($id);

        if (!$aktivitasData) {
            throw new PageNotFoundException('Aktivitas tidak ditemukan');
        }

        $file_foto = $this->request->getFile('foto_aktivitas');
        $currentDateTime = date('dmYHis');
        $nama_aktivitas_in = $this->request->getVar("nama_aktivitas_in");
        $nama_aktivitas_en = $this->request->getVar("nama_aktivitas_en");

        // Validate input
        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $nama_aktivitas_in) || !preg_match('/^[a-zA-Z0-9\s]+$/', $nama_aktivitas_en)) {
            session()->setFlashdata('error', 'Nama aktivitas hanya boleh berisi huruf dan angka.');
            return redirect()->back()->withInput();
        }

        // Generate slugs
        $slug_id = url_title($nama_aktivitas_in, '-', true);
        $slug_en = url_title($nama_aktivitas_en, '-', true);

        // Handle file upload
        if ($file_foto->isValid() && !$file_foto->hasMoved()) {
            // Delete old file
            if ($aktivitasData->foto_aktivitas && file_exists('asset-user/images/' . $aktivitasData->foto_aktivitas)) {
                unlink('asset-user/images/' . $aktivitasData->foto_aktivitas);
            }
            $newFileName = "{$nama_aktivitas_en}_{$nama_aktivitas_in}_{$currentDateTime}.{$file_foto->getExtension()}";
            $file_foto->move('asset-user/images', $newFileName);
        } else {
            // Use existing file if no new file is uploaded
            $newFileName = $aktivitasData->foto_aktivitas; // Ensure existing image is retained
        }

        // Update data in database
        $data = [
            'nama_aktivitas_in' => $nama_aktivitas_in,
            'nama_aktivitas_en' => $nama_aktivitas_en,
            'deskripsi_aktivitas_in' => $this->request->getPost("deskripsi_aktivitas_in"),
            'deskripsi_aktivitas_en' => $this->request->getPost("deskripsi_aktivitas_en"),
            'foto_aktivitas' => $newFileName,
            'meta_title_aktivitas' => $this->request->getPost("meta_title_aktivitas"),
            'meta_description_aktivitas' => $this->request->getPost("meta_description_aktivitas"),
            'meta_title_aktivitas_en' => $this->request->getPost("meta_title_aktivitas_en"),
            'meta_description_aktivitas_en' => $this->request->getPost("meta_description_aktivitas_en"),
            'slug_id' => $slug_id,
            'slug_en' => $slug_en
        ];
        $aktivitasModel->update($id, $data);

        session()->setFlashdata('success', 'Aktivitas berhasil diperbarui');
        return redirect()->to(base_url('admin/aktivitas/index'));
    }

    public function edit($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }
        $aktivitasModel = new AktivitasModel();
        $aktivitasData = $aktivitasModel->getAktivitasById($id);
        return view('admin/aktivitas/edit', [
            'aktivitasData' => $aktivitasData,
            'validation' => \Config\Services::validation()
        ]);
    }

    public function delete($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }
        $aktivitasModel = new AktivitasModel();
        $aktivitasData = $aktivitasModel->getAktivitasById($id);

        // Delete file
        if ($aktivitasData->foto_aktivitas && file_exists('asset-user/images/' . $aktivitasData->foto_aktivitas)) {
            unlink('asset-user/images/' . $aktivitasData->foto_aktivitas);
        }

        // Delete data from database
        $aktivitasModel->delete($id);

        session()->setFlashdata('success', 'Aktivitas berhasil dihapus');
        return redirect()->to(base_url('admin/aktivitas/index'));
    }
}