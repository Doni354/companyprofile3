<?php

namespace App\Controllers\admin;

use App\Models\MetaModel;

class Meta extends BaseController
{
    private $metaModel;

    public function __construct()
    {
        $this->metaModel = new MetaModel();
    }

    public function index()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Ubah 'login' sesuai dengan halaman login kamu
        }

        $data['meta'] = $this->metaModel->findAll();
        return view('admin/meta/index', $data);
    }

    public function tambah()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Ubah 'login' sesuai dengan halaman login kamu
        }

        return view('admin/meta/tambah');
    }

    public function proses_tambah()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Ubah 'login' sesuai dengan halaman login kamu
        }

        $data = [
            'nama_halaman' => $this->request->getVar('nama_halaman'),
            'meta_title' => $this->request->getVar('meta_title'),
            'meta_description' => $this->request->getVar('meta_description'),
            'canonical_url' => $this->request->getVar('canonical_url'),
        ];

        $this->metaModel->save($data);
        session()->setFlashdata('success', 'Meta berhasil ditambahkan');
        return redirect()->to(base_url('admin/meta/index'));
    }

    public function edit($id_seo)
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Ubah 'login' sesuai dengan halaman login kamu
        }

        $data['meta_data'] = $this->metaModel->find($id_seo);
        return view('admin/meta/edit', $data);
    }

    public function proses_edit($id_seo)
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Ubah 'login' sesuai dengan halaman login kamu
        }

        $data = [
            'nama_halaman' => $this->request->getVar('nama_halaman'),
            'meta_title' => $this->request->getVar('meta_title'),
            'meta_description' => $this->request->getVar('meta_description'),
            'canonical_url' => $this->request->getVar('canonical_url'),
        ];

        $this->metaModel->update($id_seo, $data);
        session()->setFlashdata('success', 'Meta berhasil diperbarui');
        return redirect()->to(base_url('admin/meta/index'));
    }

    public function delete($id_seo)
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Ubah 'login' sesuai dengan halaman login kamu
        }

        $this->metaModel->delete($id_seo);
        session()->setFlashdata('success', 'Meta berhasil dihapus');
        return redirect()->to(base_url('admin/meta/index'));
    }
}