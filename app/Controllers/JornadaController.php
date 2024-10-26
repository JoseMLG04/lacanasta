<?php
namespace App\Controllers;

use App\Models\JornadaModel;

class JornadaController extends BaseController
{
    public function index()
    {
        $jornadaModel = new JornadaModel();
        $data['jornadas'] = $jornadaModel->findAll();
        return view('jornadas/index', $data);
    }

    public function create()
    {
        return view('jornadas/create');
    }

    public function store()
    {
        $jornadaModel = new JornadaModel();

        $data = [
            'descripcion' => $this->request->getPost('descripcion'),
            'fecha' => $this->request->getPost('fecha'),
        ];

        $jornadaModel->insert($data);

        return redirect()->to('/jornadas');
    }

    public function edit($id_jornada)
    {
        $jornadaModel = new JornadaModel();
        $data['jornada'] = $jornadaModel->find($id_jornada);

        if (!$data['jornada']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Jornada no encontrada');
        }

        return view('jornadas/edit', $data);
    }

    public function update($id_jornada)
    {
        $jornadaModel = new JornadaModel();
        $data = [
            'fecha' => $this->request->getPost('fecha'),
            'descripcion' => $this->request->getPost('descripcion'),
        ];

        $jornadaModel->update($id_jornada, $data);
        return redirect()->to('/jornadas');
    }

    public function delete($id_jornada)
    {
        $jornadaModel = new JornadaModel();
        $jornadaModel->delete($id_jornada);

        return redirect()->to('/jornadas');
    }
}
