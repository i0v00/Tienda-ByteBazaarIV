<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-lg-6 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>Productos/actualizar" autocomplete="off">
                        <div class="card-header bg-dark">
                            <h6 class="title text-white text-center">Modificar Producto</46>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="codigo">Codigo</label>
                                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                <input id="codigo" class="form-control" type="text" name="codigo" value="<?php echo $data['codigo']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input id="nombre" class="form-control" type="text" name="nombre" value="<?php echo $data['nombre']; ?>">
                            </div>

                            <div class="col-lg-14">
                                    <label for="plataforma">Tipo componente</label>
                                    <select id="plataforma" class="form-control" name="plataforma">
                                        <option value="RAM" <?php if ($data['plataforma'] == "RAM") { echo "selected"; } ?>>RAM</option>    
                                        <option value="MS" <?php if ($data['plataforma'] == "MS") { echo "selected"; } ?>>Mouse</option>
                                        <option value="TC" <?php if ($data['plataforma'] == "TC") { echo "selected"; } ?>>Teclado</option>
                                        <option value="DSSD" <?php if ($data['plataforma'] == "DSSD") { echo "selected"; } ?>>Disco SSD</option>
                                        <option value="DHDD" <?php if ($data['plataforma'] == "DHDD") { echo "selected"; } ?>>Disco HDD</option>
                                        <option value="PM" <?php if ($data['plataforma'] == "PM") { echo "selected"; } ?>>Placa madre</option>
                                        <option value="FP" <?php if ($data['plataforma'] == "FP") { echo "selected"; } ?>>Fuente de poder</option>
                                        <option value="AB" <?php if ($data['plataforma'] == "AB") { echo "selected"; } ?>>Altavoz o Bocina</option>
                                        <option value="TV" <?php if ($data['plataforma'] == "TV") { echo "selected"; } ?>>Tarjeta de video</option>
                                        <option value="MP" <?php if ($data['plataforma'] == "MP") { echo "selected"; } ?>>Micro Procesador</option>
                                        <option value="Otro" <?php if ($data['plataforma'] == "Otro") { echo "selected"; } ?>>Otro</option>

                                    </select>
                                </div>

                            <div class="form-group">
                            <label for="plataforma">Stock</label>
                                <input id="cantidad" class="form-control" type="text" name="cantidad" value="<?php echo $data['cantidad']; ?>" >
                            </div>

                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label for="precio">Precio/Compra</label>
                                        <input id="precio" class="form-control" type="text" name="precio" value="<?php echo $data['precio']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="moneda">Tipo de moneda</label>
                                    <select id="moneda" class="form-control" name="moneda">
                                        <option value="Bs" <?php if ($data['moneda'] == "Bs") {
                                                                            echo "selected";
                                                                        } ?>>Bs</option>
                                        <option value="USD" <?php if ($data['moneda'] == "USD") {
                                                                        echo "selected";
                                                                    } ?>>USD</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="impuesto">Cambiar Precio/Venta por porcentaje</label>
                                <input id="impuesto" class="form-control" type="text" name="impuesto" value="<?php echo $data['impuesto']; ?>">
                            </div>

                            

                        </div>
                        <div class="card-footer">
                            <button class="btn btn-dark" type="submit">Modificar</button>
                            <a href="<?php echo base_url(); ?>Productos/Listar" class="btn btn-danger">Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>