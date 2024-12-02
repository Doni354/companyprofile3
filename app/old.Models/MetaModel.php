<?php

namespace App\Models;

use CodeIgniter\Model;

class MetaModel extends Model
{
    protected $table = "tb_meta";
    protected $primaryKey = "id_seo";
    protected $returnType = "object";
    protected $allowedFields = ['id_seo', 'nama_halaman', 'meta_title', 'meta_description', 'canonical_url'];
}
