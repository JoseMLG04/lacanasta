<?php

namespace App\Models;

use CodeIgniter\Model;

class EquipoModel extends Model
{
    protected $table = 'equipos';
    protected $primaryKey = 'id_equipo';
    protected $allowedFields = ['nombre_equipo', 'imagen'];
}
