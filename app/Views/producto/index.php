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
            <a href="<?php echo base_url('producto/agregar'); ?>" class="btn btn-info">Agregar</a>
            <?php if ($activo == 1) { ?>
                <a href="<?php echo base_url('producto/index/0'); ?>" class="btn btn-info">Ver eliminados</a>
            <?php } else { ?>
                <a href="<?php echo base_url('producto/index/1'); ?>" class="btn btn-info">Ver activos</a>
            <?php } ?>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Existencias</th>
                            <?php if ($activo == 1) { ?>
                                <th></th>
                            <?php } ?>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Existencias</th>
                            <?php if ($activo == 1) { ?>
                                <th></th>
                            <?php } ?>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($lista as $item) { ?>
                            <tr>
                                <td><?php echo $item['id']; ?></td>
                                <td><?php echo $item['codigo']; ?></td>
                                <td><?php echo $item['nombre']; ?></td>
                                <td><?php echo $item['precio_venta']; ?></td>
                                <td><?php echo $item['existencias']; ?></td>
                                <?php if ($activo == 1) { ?>
                                    <td>
                                        <a href="<?php echo base_url('producto/editar/' . $item['id']); ?>" class="btn btn-warning">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                    </td>
                                <?php } ?>
                                <td>
                                    <?php if ($activo == 1) { ?>
                                        <a href="#" data-href="<?php echo base_url('producto/eliminar/' . $item['id']); ?>" data-toggle="modal" data-target="#modal-confirmar" data-placement="top" title="Eliminar registro" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    <?php } else { ?>
                                        <a href="#" data-href="<?php echo base_url('producto/activar/' . $item['id']); ?>" data-toggle="modal" data-target="#modal-confirmar" data-placement="top" title="Activar registro" class="btn btn-danger"><i class="fas fa-trash-restore-alt"></i></a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-confirmar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <?php if ($activo == 1) { ?>
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar registro</h5>
                <?php } else { ?>
                    <h5 class="modal-title" id="exampleModalLabel">Activar registro</h5>
                <?php } ?>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if ($activo == 1) { ?>
                    <p>¿Desea eliminar el registro?</p>
                <?php } else { ?>
                    <p>¿Desea activar el registro?</p>
                <?php } ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-danger btn-ok">Si</a>
            </div>
        </div>
    </div>
</div>