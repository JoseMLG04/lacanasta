<?php

namespace App\Controllers;

use App\Models\EquipoModel;
use App\Models\JugadorModel;
use App\Models\PuntosModel;
use Dompdf\Dompdf;


class InformeController extends BaseController
{
    public function index()
{
    $equipoModel = new EquipoModel();
    $equipos = $equipoModel->findAll(); // Obtener todos los equipos

    $data['equipos'] = $equipos;

    return view('informes/index', $data);
}

    // 1. Informe de todos los jugadores agrupados por equipo
    public function JugadoresPorEquipo()
    {
        $equipoModel = new EquipoModel();
        $jugadorModel = new JugadorModel();

        // Obtener todos los equipos
        $equipos = $equipoModel->findAll();

        // Obtener todos los jugadores agrupados por equipo
        $jugadoresPorEquipo = [];

        foreach ($equipos as $equipo) {
            // Obtener los jugadores de cada equipo
            $jugadores = $jugadorModel->where('id_equipo', $equipo['id_equipo'])->findAll();
            $jugadoresPorEquipo[$equipo['nombre_equipo']] = $jugadores;
        }

        $data['jugadoresPorEquipo'] = $jugadoresPorEquipo;

        return view('informes/jugadores_por_equipo', $data);
    }
    public function informeJugadoresPorEquipoPDF()
{
    $equipoModel = new EquipoModel();
    $jugadorModel = new JugadorModel();

    $equipos = $equipoModel->findAll();
    $jugadoresPorEquipo = [];

    foreach ($equipos as $equipo) {
        $jugadores = $jugadorModel->where('id_equipo', $equipo['id_equipo'])->findAll();
        $jugadoresPorEquipo[$equipo['nombre_equipo']] = $jugadores;
    }

    $data['jugadoresPorEquipo'] = $jugadoresPorEquipo;

    // Cargar la vista PDF en lugar de la vista normal
    $html = view('informes/jugadores_por_equipo_pdf', $data);

    $dompdf = new \Dompdf\Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream('informe_jugadores_por_equipo.pdf', ['Attachment' => 1]);
}



    // 2. Informe de jugadores de un equipo, ordenados alfabéticamente por apellidos
    public function JugadoresPorEquipoOrdenados($id_equipo)
    {
        $jugadorModel = new JugadorModel();
        $equipoModel = new EquipoModel();

        // Obtener el equipo
        $equipo = $equipoModel->find($id_equipo);

        if (!$equipo) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Equipo no encontrado');
        }

        // Obtener los jugadores del equipo ordenados por apellidos
        $jugadores = $jugadorModel->where('id_equipo', $id_equipo)
                                  ->orderBy('apellidos', 'ASC')
                                  ->findAll();

        $data['equipo'] = $equipo;
        $data['jugadores'] = $jugadores;

        return view('informes/jugadores_por_equipo_ordenados', $data);
    }
    // Función para generar PDF del informe de jugadores ordenados por apellidos
    public function informeJugadoresPorEquipoOrdenadosPDF($id_equipo)
    {
        $jugadorModel = new JugadorModel();
        $equipoModel = new EquipoModel();

        $equipo = $equipoModel->find($id_equipo);

        if (!$equipo) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Equipo no encontrado');
        }

        $jugadores = $jugadorModel->where('id_equipo', $id_equipo)
                                  ->orderBy('apellidos', 'ASC')
                                  ->findAll();

        $data['equipo'] = $equipo;
        $data['jugadores'] = $jugadores;

        // Cargar la vista como HTML
        $html = view('informes/jugadores_por_equipo_ordenados_pdf', $data);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $dompdf->stream('informe_jugadores_por_equipo_ordenados.pdf', ['Attachment' => 1]);
    }

    // 3. Informe de máximos anotadores, ordenados de mayor a menor
    public function MaximosAnotadores()
    {
        $puntosModel = new PuntosModel();
        $jugadorModel = new JugadorModel();

        // Obtener los jugadores con la suma total de puntos, ordenados de mayor a menor
        $query = $puntosModel->select('jugadores.nombres, jugadores.apellidos, SUM(puntos.puntos) as total_puntos')
                             ->join('jugadores', 'jugadores.id_jugador = puntos.id_jugador')
                             ->groupBy('puntos.id_jugador')
                             ->orderBy('total_puntos', 'DESC')
                             ->findAll();

        $data['jugadores'] = $query;

        return view('informes/maximos_anotadores', $data);
    }
    // Función para generar PDF del informe de máximos anotadores
    public function informeMaximosAnotadoresPDF()
    {
        $puntosModel = new PuntosModel();

        $query = $puntosModel->select('jugadores.nombres, jugadores.apellidos, SUM(puntos.puntos) as total_puntos')
                             ->join('jugadores', 'jugadores.id_jugador = puntos.id_jugador')
                             ->groupBy('puntos.id_jugador')
                             ->orderBy('total_puntos', 'DESC')
                             ->findAll();

        $data['jugadores'] = $query;

        // Cargar la vista como HTML
        $html = view('informes/maximos_anotadores_pdf', $data);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $dompdf->stream('informe_maximos_anotadores.pdf', ['Attachment' => 1]);
    }
}
