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
            <?php if (isset($validacion)) { ?>
                <div class="alert alert-danger">
                    <?php echo $validacion->listErrors(); ?>
                </div>
            <?php }  ?>
            <form method="POST" action="<?php echo base_url('unidad/guardar') ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Nombre</label>
                            <input class="form-control" id="nombre" name="nombre" type="text" maxlength="20" autofocus require value="<?php echo set_value('nombre') ?>"/>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Nombre corto</label>
                            <input class="form-control" id="nombre_corto" name="nombre_corto" type="text" maxlength="20" value="<?php echo set_value('nombre_corto') ?>" />
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url('unidad/index'); ?>" class="btn btn-info">Regresar</a>
                <input type="submit" value="Guardar" class="btn btn-success" />
            </form>
        </div>
    </div>
</div>