<?php

namespace App\Controllers\admin;

use App\Models\AktivitasModel;

class Aktivitas extends BaseController
{
    public function index()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Ubah 'login' sesuai dengan halaman login kamu
        }
        $aktivitas_model = new AktivitasModel();
        $all_data_aktivitas = $aktivitas_model->findAll();
        $validation = \Config\Services::validation();
        return view('admin/aktivitas/index', [
            'all_data_aktivitas' => $all_data_aktivitas,
            'validation' => $validation
        ]);
    }

    public function tambah()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Ubah 'login' sesuai dengan halaman login kamu
        }
        $aktivitas_model = new AktivitasModel();
        $all_data_aktivitas = $aktivitas_model->findAll();
        $validation = \Config\Services::validation();
        return view('admin/aktivitas/tambah', [
            'all_data_aktivitas' => $all_data_aktivitas,
            'validation' => $validation
        ]);
    }

    public function proses_tambah()
    {
        date_default_timezone_set('Asia/Jakarta');
        $file_foto = $this->request->getFile('foto_aktivitas');
        $currentDateTime = date('dmYHis');
        $nama_aktivitas_in = $this->request->getVar("nama_aktivitas_in");
        $nama_aktivitas_en = $this->request->getVar("nama_aktivitas_en");

        // Validasi nama aktivitas Indonesia
        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $nama_aktivitas_in)) {
            session()->setFlashdata('error', 'Nama aktivitas Indonesia hanya boleh berisi huruf dan angka.');
            return redirect()->back()->withInput();
        }

        // Validasi nama aktivitas Inggris
        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $nama_aktivitas_en)) {
            session()->setFlashdata('error', 'Nama aktivitas Inggris hanya boleh berisi huruf dan angka.');
            return redirect()->back()->withInput();
        }

        if (!$this->validate([
            'foto_aktivitas' => [
                'rules' => 'uploaded[foto_aktivitas]|is_image[foto_aktivitas]|max_dims[foto_aktivitas,572,572]|mime_in[foto_aktivitas,image/jpg,image/jpeg,image/png]',
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
            $newFileName = "{$nama_aktivitas_en}_{$nama_aktivitas_in}_{$currentDateTime}.{$file_foto->getExtension()}";
            $file_foto->move('asset-user/images', $newFileName);

            $aktivitasModel = new AktivitasModel();
            $data = [
                'nama_aktivitas_in' => $this->request->getVar("nama_aktivitas_in"),
                'nama_aktivitas_en' => $this->request->getVar("nama_aktivitas_en"),
                'deskripsi_aktivitas_in' => $this->request->getVar("deskripsi_aktivitas_in"),
                'deskripsi_aktivitas_en' => $this->request->getVar("deskripsi_aktivitas_en"),
                'foto_aktivitas' => $newFileName
            ];
            $aktivitasModel->save($data);

            session()->setFlashdata('success', 'Data berhasil disimpan');
            return redirect()->to(base_url('admin/aktivitas/index'));
        }
    }

    public function edit($id_aktivitas)
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Ubah 'login' sesuai dengan halaman login kamu
        }
        $aktivitas_model = new AktivitasModel();
        $aktivitasData = $aktivitas_model->find($id_aktivitas);
        $validation = \Config\Services::validation();

        return view('admin/aktivitas/edit', [
            'aktivitasData' => $aktivitasData,
            'validation' => $validation
        ]);
    }

    public function proses_edit($id_aktivitas = null)
    {
        date_default_timezone_set('Asia/Jakarta');
        $file_foto = $this->request->getFile('foto_aktivitas');
        $currentDateTime = date('dmYHis');
        $nama_aktivitas_in = $this->request->getVar("nama_aktivitas_in");
        $nama_aktivitas_en = $this->request->getVar("nama_aktivitas_en");

        if (!$id_aktivitas) {
            return redirect()->back();
        }

        $aktivitasModel = new AktivitasModel();
        $aktivitasData = $aktivitasModel->find($id_aktivitas);

        // Validasi nama aktivitas Indonesia
        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $nama_aktivitas_in)) {
            session()->setFlashdata('error', 'Nama aktivitas Indonesia hanya boleh berisi huruf dan angka.');
            return redirect()->back()->withInput();
        }

        // Validasi nama aktivitas Inggris
        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $nama_aktivitas_en)) {
            session()->setFlashdata('error', 'Nama aktivitas Inggris hanya boleh berisi huruf dan angka.');
            return redirect()->back()->withInput();
        }

        // Check if new 'foto_aktivitas' file is uploaded
        if ($this->request->getFile('foto_aktivitas')->isValid()) {
            // Delete the old 'foto_aktivitas' file
            unlink('asset-user/images/' . $aktivitasData->foto_aktivitas);

            // Upload the new 'foto_aktivitas' file
            $newFileName = "{$nama_aktivitas_en}_{$nama_aktivitas_in}_{$currentDateTime}.{$file_foto->getExtension()}";
            $file_foto->move('asset-user/images', $newFileName);

            // Update the 'foto_aktivitas' field in the database with a "where" clause
            $aktivitasModel->where('id_aktivitas', $id_aktivitas)->set([
                'foto_aktivitas' => $newFileName,
                'nama_aktivitas_in' => $this->request->getPost("nama_aktivitas_in"),
                'nama_aktivitas_en' => $this->request->getPost("nama_aktivitas_en"),
                'deskripsi_aktivitas_in' => $this->request->getPost("deskripsi_aktivitas_in"),
                'deskripsi_aktivitas_en' => $this->request->getPost("deskripsi_aktivitas_en"),
            ])->update();
        } else {
            // If no new 'foto_aktivitas' file is uploaded, keep the old filename
            $newFileName = $aktivitasData->foto_aktivitas;
        }

        // Update the Akvtivitas data
        $data = [
            'foto_aktivitas' => $newFileName,
            'nama_aktivitas_in' => $nama_aktivitas_in,
            'nama_aktivitas_en' => $nama_aktivitas_en,
            'deskripsi_aktivitas_in' => $this->request->getPost("deskripsi_aktivitas_in"),
            'deskripsi_aktivitas_en' => $this->request->getPost("deskripsi_aktivitas_en"),
        ];

        // Update the product data in the database
        $aktivitasModel->where('id_aktivitas', $id_aktivitas)->set($data)->update();

        session()->setFlashdata('success', 'Berkas berhasil diperbarui');
        return redirect()->to(base_url('admin/aktivitas/index'));
    }

    public function delete($id = false)
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Ubah 'login' sesuai dengan halaman login kamu
        }
        $aktivitasModel = new AktivitasModel();

        $data = $aktivitasModel->find($id);

        unlink('asset-user/images/' . $data->foto_aktivitas);

        $aktivitasModel->delete($id);

        return redirect()->to(base_url('admin/aktivitas/index'));
    }
}
