<?php

namespace App\Controllers\admin;

use App\Models\ProdukModel;

class Produk extends BaseController
{
    public function index()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Ubah 'login' sesuai dengan halaman login kamu
        }
        $produk_model = new ProdukModel();
        $all_data_produk = $produk_model->findAll();
        $validation = \Config\Services::validation();
        return view('admin/produk/index', [
            'all_data_produk' => $all_data_produk,
            'validation' => $validation
        ]);
    }

    public function tambah()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Ubah 'login' sesuai dengan halaman login kamu
        }
        $produk_model = new ProdukModel();
        $all_data_produk = $produk_model->findAll();
        $validation = \Config\Services::validation();
        return view('admin/produk/tambah', [
            'all_data_produk' => $all_data_produk,
            'validation' => $validation
        ]);
    }

    public function proses_tambah()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Ubah 'login' sesuai dengan halaman login kamu
        }
        date_default_timezone_set('Asia/Jakarta');
        $file_foto = $this->request->getFile('foto_produk');
        $currentDateTime = date('dmYHis');
        $nama_produk_in = $this->request->getVar("nama_produk_in");
        $nama_produk_en = $this->request->getVar("nama_produk_en");

        // Validasi nama produk Indonesia
        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $nama_produk_in)) {
            session()->setFlashdata('error', 'Nama produk Indonesia hanya boleh berisi huruf dan angka.');
            return redirect()->back()->withInput();
        }

        // Validasi nama produk Inggris
        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $nama_produk_en)) {
            session()->setFlashdata('error', 'Nama produk Inggris hanya boleh berisi huruf dan angka.');
            return redirect()->back()->withInput();
        }

        if (!$this->validate([
            'foto_produk' => [
                'rules' => 'uploaded[foto_produk]|is_image[foto_produk]|max_dims[foto_produk,572,572]|mime_in[foto_produk,image/jpg,image/jpeg,image/png]',
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

            $newFileName = "{$nama_produk_en}_{$nama_produk_in}_{$currentDateTime}.{$file_foto->getExtension()}";
            $file_foto->move('asset-user/images', $newFileName);

            $produkModel = new ProdukModel();
            $data = [
                'nama_produk_in' => $this->request->getVar("nama_produk_in"),
                'nama_produk_en' => $this->request->getVar("nama_produk_en"),
                'deskripsi_produk_in' => $this->request->getVar("deskripsi_produk_in"),
                'deskripsi_produk_en' => $this->request->getVar("deskripsi_produk_en"),
                'foto_produk' => $newFileName
            ];
            $produkModel->save($data);

            session()->setFlashdata('success', 'Data berhasil disimpan');
            return redirect()->to(base_url('admin/produk/index'));
        }
    }

    public function edit($id_produk)
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Ubah 'login' sesuai dengan halaman login kamu
        }
        $produk_model = new ProdukModel();
        $produkData = $produk_model->find($id_produk);
        $validation = \Config\Services::validation();

        return view('admin/produk/edit', [
            'produkData' => $produkData,
            'validation' => $validation
        ]);
    }

    // Produk.php (Controller)
    public function proses_edit($id_produk = null)
    {
        if (!$id_produk) {
            return redirect()->back();
        }

        $produkModel = new ProdukModel();
        $produkData = $produkModel->find($id_produk);

        $nama_produk_in = $this->request->getVar("nama_produk_in");
        $nama_produk_en = $this->request->getVar("nama_produk_en");
        $file_foto = $this->request->getFile('foto_produk');

        // Validasi nama produk Indonesia
        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $nama_produk_in)) {
            session()->setFlashdata('error', 'Nama produk Indonesia hanya boleh berisi huruf dan angka.');
            return redirect()->back()->withInput();
        }

        // Validasi nama produk Inggris
        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $nama_produk_en)) {
            session()->setFlashdata('error', 'Nama produk Inggris hanya boleh berisi huruf dan angka.');
            return redirect()->back()->withInput();
        }

        // Check if new 'foto_produk' file is uploaded
        if ($this->request->getFile('foto_produk')->isValid()) {
            // Delete the old 'foto_produk' file if it exists
            $oldFilePath = 'asset-user/images/' . $produkData->foto_produk;
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
            // Generate new file name
            $currentDateTime = date('dmYHis');
            $newFileName = "{$nama_produk_en}_{$nama_produk_in}_{$currentDateTime}.{$file_foto->getExtension()}";

            $file_foto = $this->request->getFile('foto_produk');
            $file_foto->move('asset-user/images', $newFileName);
        } else {
            // If no new 'foto_produk' file is uploaded, keep the old filename
            $newFileName = $produkData->foto_produk;
        }

        // Update the product data
        $data = [
            'foto_produk' => $newFileName,
            'nama_produk_in' => $nama_produk_in,
            'nama_produk_en' => $nama_produk_en,
            'deskripsi_produk_in' => $this->request->getPost("deskripsi_produk_in"),
            'deskripsi_produk_en' => $this->request->getPost("deskripsi_produk_en"),
        ];

        // Update the product data in the database
        $produkModel->where('id_produk', $id_produk)->set($data)->update();

        session()->setFlashdata('success', 'Berkas berhasil diperbarui');
        return redirect()->to(base_url('admin/produk/index'));
    }




    public function delete($id = false)
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Ubah 'login' sesuai dengan halaman login kamu
        }
        $produkModel = new ProdukModel();

        $data = $produkModel->find($id);

        unlink('asset-user/images/' . $data->foto_produk);

        $produkModel->delete($id);

        return redirect()->to(base_url('admin/produk/index'));
    }
}
