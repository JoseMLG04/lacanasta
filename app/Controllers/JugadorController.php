<?php

namespace App\Controllers;

use App\Models\JugadorModel;
use App\Models\EquipoModel;

class JugadorController extends BaseController
{
    public function index()
    {
        $jugadorModel = new JugadorModel();
        $data['jugadores'] = $jugadorModel->findAll();

        return view('jugadores/index', $data);  // Asegúrate de tener esta vista
    }

    public function create($id_equipo)
{
    // Cargar el modelo de equipo
    $equipoModel = new EquipoModel();
    
    // Buscar el equipo por ID
    $equipo = $equipoModel->find($id_equipo);

    // Verificar si el equipo existe
    if (!$equipo) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Equipo no encontrado');
    }

    // Pasar los datos del equipo a la vista
    $data['equipo'] = $equipo;

    // Cargar la vista para crear el jugador
    return view('jugadores/create', $data);
}

    public function store()
{
    $jugadorModel = new JugadorModel();

    // Obtener el archivo de la imagen
    $file = $this->request->getFile('imagen');
    $fileName = '';

    // Verificar si se subió una imagen válida
    if ($file && $file->isValid() && !$file->hasMoved()) {
        $fileName = $file->getRandomName();
        $file->move(FCPATH . 'uploads/jugadores', $fileName);
    }

    // Preparar los datos del jugador
    $data = [
        'nombres' => $this->request->getPost('nombres'),
        'apellidos' => $this->request->getPost('apellidos'),
        'fecha_nacimiento' => $this->request->getPost('fecha_nacimiento'),
        'imagen' => $fileName,  // Guardar el nombre de la imagen
        'id_equipo' => $this->request->getPost('id_equipo'),  // ID del equipo
    ];

    // Insertar los datos en la base de datos
    $jugadorModel->insert($data);

    // Redirigir a la lista de jugadores del equipo
    return redirect()->to('/equipos/jugadores/' . $data['id_equipo']);
}
// 1. Método para Editar un jugador
public function edit($id_jugador)
{
    // Cargar el modelo de jugador
    $jugadorModel = new JugadorModel();
    
    // Obtener el jugador por ID
    $jugador = $jugadorModel->find($id_jugador);

    // Verificar si el jugador existe
    if (!$jugador) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Jugador no encontrado');
    }

    // Pasar los datos del jugador a la vista
    $data['jugador'] = $jugador;

    // Cargar la vista para editar el jugador
    return view('jugadores/edit', $data);
}
// 2. Método para Actualizar un jugador
// Método para Actualizar un equipo
public function update($id_equipo)
{
    $equipoModel = new EquipoModel();

    // Obtener los datos enviados en el formulario
    $data = [
        'nombre_equipo' => $this->request->getPost('nombre_equipo'),
    ];

    // Verificar si se subió una nueva imagen
    $file = $this->request->getFile('imagen');
    if ($file && $file->isValid() && !$file->hasMoved()) {
        // Generar un nombre aleatorio para el archivo y moverlo a la carpeta
        $fileName = $file->getRandomName();
        $file->move(FCPATH . 'uploads/logos', $fileName);

        // Actualizar el campo 'imagen' con el nuevo nombre del archivo
        $data['imagen'] = $fileName;
    }

    // Actualizar los datos del equipo en la base de datos
    $equipoModel->update($id_equipo, $data);

    // Redirigir a la lista de equipos
    return redirect()->to('/equipos');
}

// 3. Método para Eliminar un jugador
public function delete($id_jugador)
{
    // Cargar el modelo de jugador
    $jugadorModel = new JugadorModel();

    // Buscar el jugador por ID
    $jugador = $jugadorModel->find($id_jugador);

    // Verificar si el jugador existe
    if (!$jugador) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Jugador no encontrado');
    }

    // Obtener el id del equipo del jugador antes de eliminarlo
    $id_equipo = $jugador['id_equipo'];

    // Eliminar el jugador
    $jugadorModel->delete($id_jugador);

    // Redirigir a la lista de jugadores del equipo después de la eliminación
    return redirect()->to('/equipos/jugadores/' . $id_equipo);
}


}
