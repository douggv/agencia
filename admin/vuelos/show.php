<?php
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');
$id_producto = $_GET['id_producto'];
include ('../../app/controllers/productos/datos_del_producto.php');
?>

<br>
<div class="container-fluid">

    <h1>Información del Producto</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Datos del producto</b></h3>
                </div>
                <div class="card-body">

                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Código</label>
                                            <input type="text" class="form-control" value="<?= $codigo; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Nombre del producto</label>
                                            <input type="text" name="nombre_producto" value="<?=$nombre_producto;?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Descripción</label>
                                            <input type="text" name="descripcion" value="<?=$descripcion;?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Stock</label>
                                            <input type="number" name="stock" value="<?=$stock;?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Stock mínimo</label>
                                            <input type="number" name="stock_minimo" value="<?=$stock_minimo;?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Stock máximo</label>
                                            <input type="number" name="stock_maximo" value="<?=$stock_maximo;?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Precio compra</label>
                                            <input type="number" name="precio_compra" value="<?=$precio_compra;?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Precio venta</label>
                                            <input type="number" name="precio_venta" value="<?=$precio_venta;?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Fecha de ingreso</label>
                                            <input type="text" name="fecha_de_ingreso" value="<?=$fecha_de_ingreso;?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Categoria</label>
                                            <input type="text" name="tipo_producto" value="<?=$tipo_producto;?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Usuario de registro</label>
                                            <input type="text" name="fecha_de_ingreso" value="<?=$nombre_completo;?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Imagen</label>
                                    <br>
                                    <img src="<?= $URL."/public/images/productos/".$imagen;?>" width="200px" alt="">
                                </div>
                            </div>
                        </div>
                        <input type="text" name="id_usuario" value="<?= $id_usuario_sesion; ?>" hidden>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="index.php" class="btn btn-secondary">Cancelar</a>

                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
include ('../../admin/layout/parte2.php');
include ('../../admin/layout/mensaje.php');
?>


