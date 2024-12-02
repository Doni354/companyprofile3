<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilModel extends Model
{
    protected $table = "tb_profil";
    protected $primaryKey = "username";
    protected $returnType = "object";
    protected $allowedFields = [
        'username', 'password', 'nama_perusahaan',
        'logo_perusahaan', 'deskripsi_perusahaan_in', 'deskripsi_perusahaan_en',
        'deskripsi_kontak_in', 'deskripsi_kontak_en', 'link_maps',
        'link_whatsapp', 'favicon_website', 'title_website', 'foto_utama',
        'alamat', 'no_hp', 'email', 'teks_footer'
    ];
    public function getSingleProfil($username)
    {
        return $this->find($username); // Ini akan mengambil data berdasarkan 'username' dari tabel 'tb_profil'
    }
}
