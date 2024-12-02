<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'tb_produk';
    protected $primaryKey = 'id_produk';
    protected $returnType = 'object';
    protected $allowedFields = [
        'nama_produk_in', 
        'nama_produk_en', 
        'deskripsi_produk_in', 
        'deskripsi_produk_en', 
        'foto_produk', 
        'meta_title_produk', 
        'meta_description_produk',
        'meta_title_produk_en',
        'meta_description_produk_en',
        'slug_id',
        'slug_en'
    ];
    public function getProdukLainnya($id_produk, $limit = 4)
    {
        return $this->where('id_produk !=', $id_produk)
                    ->findAll($limit);
    }
}
