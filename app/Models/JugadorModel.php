<?php

namespace App\Models;

use CodeIgniter\Model;

class JugadorModel extends Model
{
    protected $table = 'jugadores';
    protected $primaryKey = 'id_jugador';
    protected $allowedFields = ['nombres', 'apellidos', 'fecha_nacimiento', 'imagen', 'id_equipo'];
}
