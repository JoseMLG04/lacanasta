<?php

namespace App\Controllers;

use App\Models\EquipoModel;
use App\Models\JugadorModel;

class EquipoController extends BaseController
{
    public function index()
    {
        $equipoModel = new EquipoModel();
        $data['equipos'] = $equipoModel->findAll();
        
        return view('equipos/index', $data);
    }

    public function create()
    {
        return view('equipos/create');
    }

    public function store()
    {
        $equipoModel = new EquipoModel();

        // Obtener el archivo del logo desde el formulario
        $file = $this->request->getFile('imagen');  // 'imagen' es el nombre del campo en el formulario

        // Verificar si el archivo es válido y ha sido subido correctamente
        if ($file->isValid() && !$file->hasMoved()) {
            // Generar un nombre único para el archivo
            $fileName = $file->getRandomName();

            // Mover el archivo a la carpeta writable/uploads/logos
            $file->move(FCPATH . 'uploads/logos', $fileName);

            // Preparar los datos para insertar en la base de datos
            $data = [
                'nombre_equipo' => $this->request->getPost('nombre_equipo'),
                'imagen' => $fileName,  // Guardamos solo el nombre del archivo
            ];

            // Insertar los datos en la base de datos
            $equipoModel->insert($data);

            // Redirigir al listado de equipos
            return redirect()->to('/equipos');
        } else {
            // Manejo de error en caso de que la subida de la imagen falle
            return redirect()->back()->with('error', 'Error al subir el logo.');
        }
    }

    public function jugadores($id_equipo)
{
    $equipoModel = new EquipoModel();
    $jugadorModel = new JugadorModel();

    // Obtener el equipo por ID
    $equipo = $equipoModel->find($id_equipo);

    // Verificar si el equipo existe
    if (!$equipo) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Equipo no encontrado');
    }

    // Obtener los jugadores asociados al equipo
    $data['jugadores'] = $jugadorModel->where('id_equipo', $id_equipo)->findAll();

    // Pasar los datos del equipo a la vista
    $data['equipo'] = $equipo;

    // Cargar la vista con los datos de los jugadores y el equipo
    return view('jugadores/index', $data);
}

public function edit($id_equipo)
    {
        $equipoModel = new EquipoModel();
        $equipo = $equipoModel->find($id_equipo);

        if (!$equipo) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Equipo no encontrado');
        }

        $data['equipo'] = $equipo;
        return view('equipos/edit', $data);
    }

    // 2. Método para Actualizar un equipo
    public function update($id_equipo)
    {
        $equipoModel = new EquipoModel();

        $data = [
            'nombre_equipo' => $this->request->getPost('nombre_equipo'),
            // Asumimos que no se cambia el logo, pero puede agregarse la funcionalidad
        ];
        $file = $this->request->getFile('imagen');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/logos', $fileName);
            $data['imagen'] = $fileName;
        }

        $equipoModel->update($id_equipo, $data);
        return redirect()->to('/equipos');
    }

    // 3. Método para Eliminar un equipo
    public function delete($id_equipo)
    {
        $equipoModel = new EquipoModel();
        $equipoModel->delete($id_equipo);

        return redirect()->to('/equipos');
    }

}
