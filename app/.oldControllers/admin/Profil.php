<?php

namespace App\Controllers\admin;

use App\Models\ProfilModel;

class Profil extends BaseController
{
    public function edit()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Ubah 'login' sesuai dengan halaman login kamu
        }

        $model = new ProfilModel();
        $data['profil_pengguna'] = $model->find($_SESSION['username']);

        // Jika ada data yang dikirim dari formulir pengubahan profil
        if ($this->request->getMethod() === 'post') {
            $data = [
                'nama_perusahaan' => $this->request->getPost('nama_perusahaan'),
                'deskripsi_perusahaan_in' => $this->request->getPost('deskripsi_perusahaan_in'),
                'deskripsi_perusahaan_en' => $this->request->getPost('deskripsi_perusahaan_en'),
                'title_website' => $this->request->getPost('title_website'),
                'alamat' => $this->request->getPost('alamat'),
                'deskripsi_kontak_in' => $this->request->getPost('deskripsi_kontak_in'),
                'deskripsi_kontak_en' => $this->request->getPost('deskripsi_kontak_en'),
                'link_maps' => $this->request->getPost('link_maps'),
                'link_whatsapp' => $this->request->getPost('link_whatsapp'),
                'no_hp' => $this->request->getPost('no_hp'),
                'email' => $this->request->getPost('email'),
                'teks_footer' => $this->request->getPost('teks_footer'),
                'favicon_website' => $this->request->getPost('favicon_website'),
                'logo_perusahaan' => $this->request->getPost('logo_perusahaan'),
                'foto_utama' => $this->request->getPost('foto_utama')

                // Tambahkan kolom lain yang perlu diubah sesuai dengan struktur tabel tb_profil
            ];

            // Check if a new 'foto_utama' file is uploaded
            // Process each uploaded file
            $fileFields = ['logo_perusahaan', 'favicon_website', 'foto_utama'];
            foreach ($fileFields as $field) {
                $file = $this->request->getFile($field);
                if ($file->isValid()) {
                    $oldFile = $model->find($_SESSION['username'])->$field;

                    if ($oldFile && file_exists('asset-user/images/' . $oldFile)) {
                        unlink('asset-user/images/' . $oldFile);
                    }

                    $currentDateTime = date('dmYHis');
                    $nama_perusahaan = $data['nama_perusahaan'];
                    $nama_perusahaan = str_replace(' ', '-', $nama_perusahaan);

                    // Check if it's the 'logo_perusahaan' field
                    if ($field === 'logo_perusahaan') {
                        $newFileName = "Logo_{$nama_perusahaan}_{$currentDateTime}.{$file->getExtension()}";
                    }
                    // Check if it's the 'favicon_website' field
                    elseif ($field === 'favicon_website') {
                        $newFileName = "Favicon_{$nama_perusahaan}_{$currentDateTime}.{$file->getExtension()}";
                    } else {
                        $newFileName = $file->getRandomName();
                    }

                    $file->move('asset-user/images/', $newFileName);

                    $data[$field] = $newFileName;
                } else {
                    $data[$field] = $model->find($_SESSION['username'])->$field;
                }
            }

            $username_pengguna = $_SESSION['username'];
            $model->update($username_pengguna, $data);

            session()->setFlashdata('success', 'Profil berhasil diubah.');
            return redirect()->to(base_url('admin/profil/edit'));
        }
        return view('admin/profil/edit', $data); // Ubah 'vw_ubah_profil' sesuai dengan halaman ubah profil kamu
    }
}
