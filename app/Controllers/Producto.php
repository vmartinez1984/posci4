<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductoModel;
use App\Models\CategoriaModel;
use App\Models\UnidadModel;

class Producto extends BaseController
{

    protected $productoDao;
    protected $categoriaDao;
    protected $unidadDao;

    public function __construct()
    {
        $this->productoDao = new ProductoModel();
        $this->categoriaDao = new CategoriaModel();
        $this->unidadDao = new UnidadModel();
    }

    public function index($activo = 1)
    {
        $lista = $this->productoDao->where('activo', $activo)->findAll();
        if ($activo == 1) {
            $titulo = 'Productos';
        } else {
            $titulo = 'Productos eliminadas';
        }
        $data = [
            'titulo' => $titulo,
            'lista' => $lista,
            'activo' => $activo
        ];
        return view('header') . view('producto/index', $data) . view('footer');
    }

    public function agregar()
    {
        $unidades = $this->unidadDao->where('activo', 1)->findAll();
        $categorias = $this->categoriaDao->where('activo',1)->findAll();
        $data = [
            'titulo' => 'Agregar nuevo',
            'unidades' => $unidades,
            'categorias' => $categorias
        ];
        return view('header') . view('producto/agregar', $data) . view('footer');
    }

    public function guardar()
    {
        if($this->request->getMethod() == 'post'){

            $data = [
                'codigo' => $this->request->getPost('codigo'),
                'nombre' => $this->request->getPost('nombre'),
                'precio_venta' => $this->request->getPost('precio_venta'),
                'precio_compra' => $this->request->getPost('precio_compra'),
                'stock_minimo' => $this->request->getPost('stock_minimo'),
                'inventariable' => $this->request->getPost('inventariable'),
                'unidad_id' => $this->request->getPost('unidad_id'),
                'categoria_id' => $this->request->getPost('categoria_id')
            ];            
            //print_r($data);
            $this->productoDao->save($data);

            return redirect()->to(base_url(('producto/index')));
        }else{
            $data = [
                'titulo' => 'Agregar nuevo',
                'validacion' => $this->validator
            ];
            return view('header') . view('producto/agregar', $data) . view('footer');
        }
    }

    public function editar($id)
    {
        $producto = $this->productoDao->where('id', $id)->first();
        $unidades = $this->unidadDao->where('activo', 1)->findAll();
        $categorias = $this->categoriaDao->where('activo',1)->findAll();
        $data = [
            'titulo' => 'Agregar nuevo',
            'unidades' => $unidades,
            'categorias' => $categorias,
            'producto'=> $producto
        ];
        return view('header') . view('producto/editar', $data) . view('footer');
    }

    public function actualizar()
    {
        $id = $this->request->getPost('id');
        $data = [
            'codigo' => $this->request->getPost('codigo'),
            'nombre' => $this->request->getPost('nombre'),
            'precio_venta' => $this->request->getPost('precio_venta'),
            'precio_compra' => $this->request->getPost('precio_compra'),
            'stock_minimo' => $this->request->getPost('stock_minimo'),
            'inventariable' => $this->request->getPost('inventariable'),
            'unidad_id' => $this->request->getPost('unidad_id'),
            'categoria_id' => $this->request->getPost('categoria_id'),
        ];            

        $this->productoDao->update($id, $data);

        return redirect()->to(base_url(('producto/index')));
    }

    public function eliminar($id)
    {
        $data = [
            'activo' => '0'
        ];

        $this->productoDao->update($id, $data);

        return redirect()->to(base_url(('producto/index')));
    }

    public function activar($id)
    {
        $data = [
            'activo' => '1'
        ];

        $this->productoDao->update($id, $data);

        return redirect()->to(base_url(('producto/index')));
    }
}
