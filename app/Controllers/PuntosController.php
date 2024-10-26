<?php
namespace App\Controllers;

use App\Models\PuntosModel;
use App\Models\JugadorModel;
use App\Models\JornadaModel;

class PuntosController extends BaseController
{
    public function index($id_jornada)
    {
        $puntosModel = new PuntosModel();
        $jornadaModel = new JornadaModel();
    
        // Obtener la jornada
        $jornada = $jornadaModel->find($id_jornada);
    
        // Verificar si la jornada existe
        if (!$jornada) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Jornada no encontrada');
        }
    
        // Obtener los puntos de los jugadores para esa jornada
        $puntos = $puntosModel->select('puntos.*, jugadores.nombres, jugadores.apellidos, equipos.nombre_equipo')
                              ->join('jugadores', 'jugadores.id_jugador = puntos.id_jugador')
                              ->join('equipos', 'equipos.id_equipo = jugadores.id_equipo')
                              ->where('id_jornada', $id_jornada)
                              ->findAll();
    
        $data['jornada'] = $jornada;
        $data['puntos'] = $puntos;
    
        return view('puntos/index', $data);
    }
    
    public function create($id_jornada)
    {
        $jugadorModel = new JugadorModel();
        $jornadaModel = new JornadaModel();
    
        // Obtener la jornada y los jugadores junto con sus equipos
        $jornada = $jornadaModel->find($id_jornada);
        $jugadores = $jugadorModel->select('jugadores.*, equipos.nombre_equipo')
                                  ->join('equipos', 'equipos.id_equipo = jugadores.id_equipo')
                                  ->findAll();
    
        // Verificar si la jornada existe
        if (!$jornada) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Jornada no encontrada');
        }
    
        // Preparar los datos para la vista
        $data['jugadores'] = $jugadores;
        $data['jornada'] = $jornada;
    
        return view('puntos/create', $data);
    }
    
    public function store()
    {
        $puntosModel = new PuntosModel();
    
        $data = [
            'id_jugador' => $this->request->getPost('id_jugador'),
            'id_jornada' => $this->request->getPost('id_jornada'),
            'puntos' => $this->request->getPost('puntos'),
            'tipo_tiro' => $this->request->getPost('tipo_tiro'),
        ];
    
        $puntosModel->insert($data);
    
        // Redirigir al listado de puntos para la jornada
        return redirect()->to('/puntos/jornada/' . $data['id_jornada']);
    }
    
    public function edit($id_puntos)
    {
        $puntosModel = new PuntosModel();
        $jugadorModel = new JugadorModel();
        $jornadaModel = new JornadaModel();
    
        // Obtener el punto y los detalles relacionados
        $punto = $puntosModel->find($id_puntos);
    
        if (!$punto) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Punto no encontrado');
        }
    
        $jornada = $jornadaModel->find($punto['id_jornada']);
        $jugadores = $jugadorModel->select('jugadores.*, equipos.nombre_equipo')
                                  ->join('equipos', 'equipos.id_equipo = jugadores.id_equipo')
                                  ->findAll();
    
        $data['punto'] = $punto;
        $data['jugadores'] = $jugadores;
        $data['jornada'] = $jornada;
    
        return view('puntos/edit', $data);
    }
    
    public function update($id_puntos)
    {
        $puntosModel = new PuntosModel();
        $punto = $puntosModel->find($id_puntos);
    
        if (!$punto) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Punto no encontrado');
        }
    
        $data = [
            'id_jugador' => $this->request->getPost('id_jugador'),
            'puntos' => $this->request->getPost('puntos'),
            'tipo_tiro' => $this->request->getPost('tipo_tiro'),
        ];
    
        $puntosModel->update($id_puntos, $data);
    
        // Redirigir al listado de puntos para la jornada
        return redirect()->to('/puntos/jornada/' . $punto['id_jornada']);
    }
    
    public function delete($id_puntos)
    {
        $puntosModel = new PuntosModel();
        $punto = $puntosModel->find($id_puntos);
    
        if (!$punto) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Punto no encontrado');
        }
    
        $puntosModel->delete($id_puntos);
    
        // Redirigir al listado de puntos para la jornada
        return redirect()->to('/puntos/jornada/' . $punto['id_jornada']);
    }
    
}
