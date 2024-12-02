<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = "tb_artikel";
    protected $primaryKey = "id_artikel";
    protected $returnType = "object";
    protected $allowedFields = ['id_artikel', 'judul_artikel', 'judul_artikel_en', 'foto_artikel', 'deskripsi_artikel', 'deskripsi_artikel_en'];

    public function getArtikelTerbaru()
    {
        return $this->orderBy('id_artikel', 'desc')
            ->findAll();
    }

    public function getDetailArtikel($id_artikel)
    {
        $artikel = $this->find($id_artikel);

        if (!$artikel) {
            return null; // Atau return array kosong, tergantung pada kebutuhan Anda
        }

        return $artikel;
    }

    public function getArtikelLainnya($id_artikel, $limit = 4)
    {
        return $this->where('id_artikel !=', $id_artikel)
            ->orderBy('id_artikel', 'ASC')
            ->limit($limit)
            ->findAll();
    }
}
