<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UnidadModel;

class Unidad extends BaseController
{

    protected $unidadDao;
    protected $reglas;

    public function __construct()
    {
        $this->unidadDao = new UnidadModel();
        helper(['form']);
        $this->reglas = [
            'nombre' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ]
            ],
            'nombre_corto' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo nombre corto es obligatorio.'
                ]
            ]
        ];
    }

    public function index($activo = 1)
    {
        $unidades = $this->unidadDao->where('activo', $activo)->findAll();
        if ($activo == 1) {
            $titulo = 'Unidades';
        } else {
            $titulo = 'Unidades eliminadas';
        }
        $data = [
            'titulo' => $titulo,
            'unidades' => $unidades,
            'activo' => $activo
        ];
        return view('header') . view('unidad/index', $data) . view('footer');
    }

    public function agregar()
    {
        $data = [
            'titulo' => 'Agregar nuevo'
        ];
        return view('header') . view('unidad/agregar', $data) . view('footer');
    }

    public function guardar()
    {
        if ($this->request->getMethod() == 'post' && $this->validate($this->reglas)) {

            $data = [
                'nombre' => $this->request->getPost('nombre'),
                'nombre_corto' => $this->request->getPost('nombre_corto')
            ];

            $this->unidadDao->save($data);
        } else {
            $data = [
                'titulo' => 'Agregar nuevo',
                'validacion' => $this->validator
            ];
            return view('header') . view('unidad/agregar', $data) . view('footer');
        }

        return redirect()->to(base_url(('unidad/index')));
    }

    public function editar($id, $valid = null)
    {
        $unidad = $this->unidadDao->where('id', $id)->first();
        if ($valid == null) {
            $data = [
                'titulo' => 'Editar',
                'unidad' => $unidad
            ];
        } else {
            $data = [
                'titulo' => 'Editar',
                'unidad' => $unidad,
                'validation' => $valid
            ];
        }
        //print_r($data);
        return view('header') . view('unidad/editar', $data) . view('footer');
    }

    public function actualizar()
    {
        if ($this->request->getMethod() == 'post' && $this->validate($this->reglas)) {
            $id = $this->request->getPost('id');
            $data = [
                'nombre' => $this->request->getPost('nombre'),
                'nombre_corto' => $this->request->getPost('nombre_corto')
            ];

            $this->unidadDao->update($id, $data);

            return redirect()->to(base_url(('unidad/index')));
        }else{
            return $this->editar($this->request->getPost('id'), $this->validator);
        }
    }

    public function eliminar($id)
    {
        $data = [
            'activo' => '0'
        ];

        $this->unidadDao->update($id, $data);

        return redirect()->to(base_url(('unidad/index')));
    }

    public function activar($id)
    {
        $data = [
            'activo' => '1'
        ];

        $this->unidadDao->update($id, $data);

        return redirect()->to(base_url(('unidad/index')));
    }
}
