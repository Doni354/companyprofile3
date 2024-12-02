<?php

namespace App\Models;

use CodeIgniter\Model;

class AktivitasModel extends Model
{
    protected $table = 'tb_aktivitas';
    protected $primaryKey = 'id_aktivitas';
    protected $returnType = 'object';
    protected $allowedFields = ['nama_aktivitas_in', 'nama_aktivitas_en', 'deskripsi_aktivitas_in', 'deskripsi_aktivitas_en', 'foto_aktivitas'];

    public function getAktivitasById($idAktivitas)
    {
        return $this->where('id_aktivitas', $idAktivitas)->first();
    }
}
