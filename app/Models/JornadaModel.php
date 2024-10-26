<?php

namespace App\Models;

use CodeIgniter\Model;

class JornadaModel extends Model
{
    protected $table = 'jornadas';
    protected $primaryKey = 'id_jornada';
    protected $allowedFields = ['fecha', 'descripcion'];
}
