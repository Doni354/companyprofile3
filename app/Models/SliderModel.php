<?php

namespace App\Models;

use CodeIgniter\Model;

class SliderModel extends Model
{
    protected $table = 'tb_slider';
    protected $primaryKey = 'id_slider';
    protected $returnType = 'object';
    protected $allowedFields = ['file_foto_slider'];
}
