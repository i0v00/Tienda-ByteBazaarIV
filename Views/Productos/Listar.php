<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#nuevo_producto"><i class="fas fa-plus-circle"></i> Nuevo</button>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>Productos/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                        </div>
                        <div class="col-lg-6">
                            <?php if (isset($_GET['msg'])) {
                                $alert = $_GET['msg'];
                                if ($alert == "existe") { ?>
                                    <div class="alert alert-warning" role="alert">
                                        <strong>El producto ya existe</strong>
                                    </div>
                                <?php } else if ($alert == "error") { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Error al registrar</strong>
                                    </div>
                                <?php } else if ($alert == "registrado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Producto registrado</strong>
                                    </div>
                                <?php } else if ($alert == "modificado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Producto Modificado</strong>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="Table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Tipo Componente</th>
                                    <th>Stock</th>
                                    <th>Precio/compra</th>
                                    <th>Precio/venta</th>
                                    <th>Moneda</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $cl) { ?>
                                    <tr>
                                        <td><?php echo $cl['codigo']; ?></td>
                                        <td><?php echo $cl['nombre']; ?></td>
                                        <td><?php echo $cl['plataforma']; ?></td>
                                        <td><?php echo $cl['cantidad']; ?></td>
                                        <td><?php echo $cl['precio']; ?></td>
                                        <td><?php echo $cl['preciov']; ?></td>
                                        <td><?php echo $cl['moneda']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url() ?>Productos/editar?id=<?php echo $cl['id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <form action="<?php echo base_url() ?>Productos/eliminar?id=<?php echo $cl['id']; ?>" method="post" class="d-inline elim">
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div id="nuevo_producto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="my-modal-title"><i class="fas fa-clipboard-list"></i> Nuevo Producto</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>Productos/insertar" autocomplete="off" onsubmit="return validateForm()">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="codigo">Codigo</label>
                        <input id="codigo" class="form-control" type="text" name="codigo" placeholder="Codigo">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Descripcion">
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="plataforma">Tipo componente</label>
                                <select id="plataforma" class="form-control" name="plataforma">
                                    <option value="RAM">RAM</option>    
                                    <option value="MS">Mouse</option>
                                    <option value="TC">Teclado</option>
                                    <option value="DSSD">Disco SSD</option>
                                    <option value="DHDD">Disco HDD</option>
                                    <option value="PM">Placa madre</option>
                                    <option value="FP">Fuente de poder</option>
                                    <option value="AB">Altavoz o Bocina</option>
                                    <option value="TV">Tarjeta de video</option>
                                    <option value="MP">Micro Procesador</option>                        
                                    <option value="Otro">Otro</option>
                                </select>
                            </div>
                        </div>
                    </div>
                                    
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="precio">Precio/Compra</label>
                                <input id="precio" class="form-control" type="text" name="precio" placeholder="Precio">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="moneda">Moneda</label>
                                <select id="moneda" class="form-control" name="moneda">
                                    <option value="Bs">Bs</option>
                                    <option value="USD">USD</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Registrar</button>
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function validateForm() {
    var codigo = document.getElementById("codigo").value;
    var nombre = document.getElementById("nombre").value;
    var plataforma = document.getElementById("plataforma").value;
    var precio = document.getElementById("precio").value;
    var moneda = document.getElementById("moneda").value;

    if (codigo == "" || nombre == "" || plataforma == "" || precio == "" || moneda == "") {
        alert("Todos los campos deben ser llenados");
        return false;
    }
    return true;
}
</script>

<?php pie() ?>
