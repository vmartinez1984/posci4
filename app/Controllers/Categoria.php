<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriaModel;

class  Categoria extends BaseController{
    protected $categoriaDao;

    public function __construct(){
        $this->categoriaDao = new CategoriaModel();
    }

    public function index($activo = 1){
        $lista = $this->categoriaDao->where('activo',$activo)->findAll();
        if($activo == 1){
            $titulo = 'Categorias';
        }else{
            $titulo = 'Categorias eliminadas';
        }
        $data = [
            'titulo' => $titulo,
            'categorias' => $lista,
            'activo' => $activo
        ];

        return view('header').view('categoria/index',$data).view('footer');
    }

    public function agregar()
    {
        $data = [
            'titulo' => 'Agregar nuevo'
        ];
        return view('header') . view('categoria/agregar', $data) . view('footer');
    }

    public function guardar()
    {
        $data = [
            'nombre' => $this->request->getPost('nombre'),
        ];

        $this->categoriaDao->save($data);

        return redirect()->to(base_url(('categoria/index')));
    }

    public function editar($id)
    {
        $categoria = $this->categoriaDao->where('id', $id)->first();
        $data = [
            'titulo' => 'Editar',
            'categoria' => $categoria
        ];
        //print_r($data);
        return view('header') . view('categoria/editar', $data) . view('footer');
    }

    public function actualizar()
    {
        $id = $this->request->getPost('id');
        $data = [
            'nombre' => $this->request->getPost('nombre'),
        ];

        $this->categoriaDao->update($id, $data);

        return redirect()->to(base_url(('categoria/index')));
    }

    public function eliminar($id)
    {
        $data = [
            'activo' => '0'
        ];

        $this->categoriaDao->update($id, $data);

        return redirect()->to(base_url(('categoria/index')));
    }

    public function activar($id)
    {
        $data = [
            'activo' => '1'
        ];

        $this->categoriaDao->update($id, $data);

        return redirect()->to(base_url(('unidad/index')));
    }
}