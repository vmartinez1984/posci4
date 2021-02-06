<div class="container-fluid">
    <h1 class="mt-4"><?php echo $titulo ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
            <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
            .
            <br />
            <a href="<?php echo base_url('unidad/agregar'); ?>" class="btn btn-info">Agregar</a>
            <a href="<?php echo base_url('unidad/agregar'); ?>" class="btn btn-info">Ver eliminados</a>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
            <?php if (isset($validation)) { ?>
                <div class="alert alert-danger">
                    <?php echo $validation->listErrors(); ?>
                </div>
            <?php }  ?>
            <form method="POST" action="<?php echo base_url('producto/guardar') ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Código</label>
                            <input class="form-control" id="codigo" name="codigo" type="text" maxlength="20" autofocus require />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Nombre</label>
                            <input class="form-control" id="nombre" name="nombre" type="text" maxlength="20" autofocus require />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Unidad</label>
                            <select class="form-control" id="unidad_id" name="unidad_id" required>
                                <option>Seleccionar unidad</option>
                                <?php foreach ($unidades as $item) { ?>
                                    <option value="<?php echo $item['id']; ?>"><?php echo $item['nombre_corto']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Categoria</label>
                            <select class="form-control" id="categoria_id" name="categoria_id" required>
                                <option>Seleccionar unidad</option>
                                <?php foreach ($categorias as $item) { ?>
                                    <option value="<?php echo $item['id']; ?>"><?php echo $item['nombre']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Precio de venta</label>
                            <input class="form-control" id="precio_venta" name="precio_venta" type="text" maxlength="20" require />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Precio de compra</label>
                            <input class="form-control" id="precio_compra" name="precio_compra" type="text" maxlength="20" require />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Stock mínimo</label>
                            <input class="form-control" id="stock_minimo" name="stock_minimo" type="text" maxlength="20" require />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>¿Es inventariable?</label>
                            <select class="form-control" id="inventariable" name="inventariable" type="text" maxlength="20" require>
                                <option value="1">Sí</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url('producto/index'); ?>" class="btn btn-info">Regresar</a>
                <input type="submit" value="Guardar" class="btn btn-success" />
            </form>
        </div>
    </div>
</div>