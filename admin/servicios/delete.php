<?php
    include '../../app/config.php';
    include ('../../app/controllers/servicios/listado_de_servicios.php');
    
    $servicio_id = $_GET['id'];
    include ('../../app/controllers/servicios/datos_del_servicio.php');
    
?>   
<?php include '../../admin/layout/parte1.php';?>
<?php include '../../admin/layout/mensaje.php';?>


<div class="container-fluid">
    <h1 class="text-center">Actualización del Servicio</h1>  
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
                    
                        
                    <div class="card-body">
                        
                        
                        <form action="../../app/controllers/servicios/delete.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nombre</label>
                                    <input readonly  value="<?=$nombre;?>" class="form-control form-control-rosado" type="text" name="nombre" placeholder="Ingresa el nombre" required pattern="^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$" title="Solo letras" minlength="3" maxlength="40">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Descripcion</label>
                                    <input readonly value="<?=$descripcion;?>" class="form-control form-control-rosado" type="text" name="descripcion" placeholder="Ingresa el apellido" required pattern="^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$" title="Solo letras"  maxlength="300">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Precio</label>
                                    <input readonly value="<?=$precio;?>" class="form-control form-control-rosado" type="text" name="precio" placeholder="Ingresa la cedula"  title="Solo Numeros">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Categoria</label>
                                    <input type="text" readonly value="<?=$categoria;?>" class="form-control form-control-rosado" name="categoria">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Imagen</label>
                                    
                                    <br>
                                    <center>
                                        <output id="list">
                                        <img src="<?=$URL."/public/images/servicios/".$imagen;?>" width="80%" alt="">                                            </output>
                                    </center>
                                    <input type="text" value="<?= $id_servicio;?>" name="servicio_id" hidden>
                                    <input type="text" value="<?= $imagen;?>" name="imagen" hidden >
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                            <a class="btn btn-secondary w-40" href="index.php">Regresar</a>
                            <input style="background-color:#FF69B4; border-color:#FF69B4 " type="submit" class="btn btn-success w-40" value="Seguro que desea eliminar?">
                            </div>
                        </div>
                        <input type="text" name="servicio_id" value="<?= $servicio_id; ?>" hidden>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>

<?php include '../../admin/layout/parte2.php';?>

<style>
.form-control-rosado {
    border: 1px solid #FFC5C5;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.form-control-rosado:focus {
    border-color: #FF69B4;
    box-shadow: 0 0 10px rgba(255, 105, 180, 0.5);
    background-color: #FFF0F0;
}
</style>





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
<?php include '../../admin/layout/parte2.php';?>
