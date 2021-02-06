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
            <a href="<?php echo base_url('categoria/agregar'); ?>" class="btn btn-info">Agregar</a>
            <?php if ($activo == 1) { ?>
                <a href="<?php echo base_url('categoria/index/0'); ?>" class="btn btn-info">Ver eliminados</a>
            <?php } else { ?>
                <a href="<?php echo base_url('categoria/index/1'); ?>" class="btn btn-info">Ver activos</a>
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
                            <th>Nombre</th>
                            <?php if ($activo == 1) { ?>
                                <th></th>
                            <?php } ?>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <?php if ($activo == 1) { ?>
                                <th></th>
                            <?php } ?>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($categorias as $item) { ?>
                            <tr>
                                <td><?php echo $item['id']; ?></td>
                                <td><?php echo $item['nombre']; ?></td>
                                <?php if ($activo == 1) { ?>
                                    <td>
                                        <a href="<?php echo base_url('categoria/editar/' . $item['id']); ?>" class="btn btn-warning">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                    </td>
                                <?php } ?>
                                <td>
                                    <?php if ($activo == 1) { ?>
                                        <a href="<?php echo base_url('categoria/eliminar/' . $item['id']); ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    <?php } else { ?>
                                        <a href="<?php echo base_url('categoria/activar/' . $item['id']); ?>" class="btn btn-danger"><i class="fas fa-trash-restore-alt"></i></a>
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