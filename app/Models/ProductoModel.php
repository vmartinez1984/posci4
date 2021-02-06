<?php namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model{
    
    protected $table      = 'producto';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['codigo','nombre', 'precio_venta','precio_compra','existencias','stock_minimo','inventariable','unidad_id','categoria_id','activo'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edicion';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}