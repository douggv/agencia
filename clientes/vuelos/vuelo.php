<?php 
include '../../app/config.php';
?>

<?php include '../layout/cabecera.php';?>
<?php include '../layout/nav.php';?>
<?php include '../../app/controllers_clientes/vuelos/listado_vuelos.php"'; ?>
<?php include '../../admin/layout/mensaje.php"'; ?>
<?php $id_vuelo = $_GET['id']; ?>

<?php
    foreach ($vuelos as $vuelo) {
        if($vuelo['id'] == $id_vuelo){
            break;
        }
    }
?>

<div class="container">
    <section class="mt-5 d-flex justify-content-center flex-wrap gap-5 align-items-left">
        
        <article class="col-md-6 card shadow-sm h-100">
            <img src="<?php echo $URL; ?>/public/images/vuelos/<?php echo $vuelo['imagen']; ?>" alt="<?php echo $vuelo['nombre']; ?>" class="img-fluid card-img-top">
            <div class="card-body">
                <h2 class="card-title"><?php echo $vuelo['nombre']; ?></h2>
                <p class="card-text"><?php echo $vuelo['descripcion']; ?></p>
                <p class="card-text">Aerolínea: <?php echo $vuelo['aerolinea']; ?></p>
                <p class="card-text">Puestos vendidos: <?php echo $vuelo['puestos_vendidos']; ?> / <?php echo $vuelo['puestos_totales']; ?></p>
                <p class="card-text">Tipo: <?php echo $vuelo['tipo']; ?></p>
                <p class = "card-text">fecha de salida: <?php echo $vuelo['fecha_salida']; ?></p>
                    <p class="card-text">
                        <?php if($vuelo['fecha_regreso'] != null) {?>
                            Fecha de regreso: <?php echo $vuelo['fecha_regreso']; ?>
                        <?php } ?>
                    </p>
                <p class="card-text">Precio: <?php echo $vuelo['precio']; ?></p>
                
            </div>
        </article>

            <form action ="<?php echo $URL; ?>/app/controllers/reservas/enviar_reserva.php" method="POST" enctype="multipart/form-data" >
                    
                    <div class="row">
                         
                        <div class="col-md-6">
                            <label for="">Metodo de Pago</label>
                            <select class="form-select"  name="metodo_pago" id="">
                                <option value="pago_movil">Pago Movil</option>
                                <option value="transferencia">Transferencia</option>
                                <option value="Binace">Binace</option>
                                <option value="zelle">Zelle</option>
                                <option value="paypal">Paypal</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
 
                        <div class="col-md-5">
                            <label for="">Numero de referencia</label>
                            <input type="text" name="referencia" id =""  class="form-control">
                        </div> 
                        <div class="col-md-7">
                            <label for="">Persona que realiz el Pago</label>
                            <input required  type="text" name="nombre_pago"  class="form-control">
                        </div> 
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Comprobante de pago</label>
                                <input required type="file" class="form-control" name="file" id="file">
                                <br>
                                <center>
                                    <output id="list"></output>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex gap-2">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Comprar</button>
                    </div>

                    
                    <input type="text" name ="estado" value = "pendiente" hidden>

                    <input type="text" name="id_vuelo" value = "<?php echo $vuelo['id']; ?>"
                    
                    <input hidden type="text" name ="id" value = "<?php echo $id_usuario_sesion; ?>">
                    <input hidden type="text" name ="id_usuario_sesion" value = "<?php echo $id_usuario_sesion; ?>">
                    
                    
                               


            </form>

    </section>
</div>

<script>
    function archivo(evt) {
        var files = evt.target.files; // FileList object
        // Obtenemos la imagen del campo "file".
        for (var i = 0, f; f = files[i]; i++) {
            //Solo admitimos imágenes.
            if (!f.type.match('image.*')) {
                continue;
            }
            var reader = new FileReader();
            reader.onload = (function (theFile) {
                return function (e) {
                    // Insertamos la imagen
                    document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="',e.target.result, '" width="200px" title="', escape(theFile.name), '"/>'].join('');
                };
            })(f);
            reader.readAsDataURL(f);
        }
    }
    document.getElementById('file').addEventListener('change', archivo, false);
</script>