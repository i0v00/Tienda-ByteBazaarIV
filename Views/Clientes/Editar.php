<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-lg-6 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>Clientes/actualizar" autocomplete="off">
                        <div class="card-header bg-dark">
                            <h6 class="title text-white text-center"><i class="fas fa-user-edit"></i> Modificar Cliente</46>
                        </div>
                        <div class="modal-body">
                            
                        <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                    <label for="ruc">CI/Carnet</label>
                                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                        <input id="ruc" class="form-control" type="text" name="ruc" value="<?php echo $data['ruc']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="extci">Extension</label>
                                        <input id="extci" class="form-control" type="text" name="extci" value="<?php echo $data['extci']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input id="nombre" class="form-control" type="text" name="nombre" value="<?php echo $data['nombre']; ?>">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="direccion">Dirección</label>
                                        <input id="direccion" class="form-control" type="text" name="direccion" value="<?php echo $data['direccion']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="telefono">Teléfono</label>
                                        <input id="telefono" class="form-control" type="text" name="telefono" value="<?php echo $data['telefono']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <label for="membresia">Membresia</label>
                                    <select id="membresia" class="form-control" name="membresia">
                                        <option value="Noaplica" <?php if ($data['membresia'] == "Noaplica") {
                                                                            echo "selected";
                                                                        } ?>>No aplica</option>
                                        <option value="Oro" <?php if ($data['membresia'] == "Oro") {
                                                                        echo "selected";
                                                                    } ?>>Oro</option>
                                        <option value="Plata" <?php if ($data['membresia'] == "Plata") {
                                                                        echo "selected";
                                                                    } ?>>Plata</option>
                                        <option value="Bronce" <?php if ($data['membresia'] == "Bronce") {
                                                                        echo "selected";
                                                                    } ?>>Bronce</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-dark" type="submit"><i class="fas fa-save"></i> Modificar</button>
                            <a href="<?php echo base_url(); ?>Clientes/Listar" class="btn btn-danger"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>