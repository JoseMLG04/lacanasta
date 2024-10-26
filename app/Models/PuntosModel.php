<?php

namespace App\Models;

use CodeIgniter\Model;

class PuntosModel extends Model
{
    protected $table = 'puntos';
    protected $primaryKey = 'id_puntos';
    protected $allowedFields = ['id_jugador', 'id_jornada', 'puntos', 'tipo_tiro'];
}
