<?php
    include '../../app/config.php';
    include ('../../app/controllers/vuelos/listado_de_vuelos.php');

    
?>   
<?php include '../../admin/layout/parte1.php';?>
<?php include '../../admin/layout/mensaje.php';?>

<div class="container-fluid">
    <h1 class="text-center">Nuevo Vuelo</h1>  
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
                    <div class="card card-outline card-rosado">
                        
                    <div class="card-body">                        
                        <form action="../../app/controllers/vuelos/create.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nombre</label>
                                    <input class="form-control " type="text" name="nombre" placeholder="Ingresa el nombre" required pattern="^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$" title="Solo letras" minlength="3" maxlength="40">
                                </div>
                                </div>
                                <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Descripcion del vuelo</label>
                                    <input class="form-control " type="text" name="descripcion" placeholder="Ingresa una descripcion" required pattern="^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$" title="Solo letras"  >
                                </div>
                                </div>
                                <div class="col-md-4">
                                <label for="">Tipo de Vuelo</label>
                                <select class = "form-control " name="tipo" id="">
                                    <option value="comun">Vuelo Comun</option>
                                    <option value="paquete">Paquete</option>
                                </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">precio</label>
                                    <input class="form-control " type="text" name="precio" placeholder="Ingresa el precio" required>
                                </div>
                                </div>
                                <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Origen</label>
                                    <input class="form-control " type="text" name="origen" placeholder="Ingresa el origen" required>
                                </div>
                                </div>
                                <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Destino</label>
                                    <input class="form-control " type="text" name="destino" placeholder="Ingresa el destino" required>
                                </div>
                                </div>
                                <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Aerolinea</label>
                                    <input class="form-control " type="text" name="aerolinea" placeholder="Ingresa la aerolinea" required>
                                </div>
                                </div>
                                
                            </div>
                            <div class="row">
                            
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Puestos Totales</label>
                                    <input class="form-control " type="number" name="puestos_totales"  required>                            </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Fecha de Salida</label>
                                    <input class="form-control " type="datetime-local" name="fecha_salida" value="" required>                            </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Fecha de Regreso</label>
                                    <input class="form-control " type="datetime-local" name="fecha_regreso" value="">                            </div>
                            </div>

                            <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Imagen</label>
                                            <input type="file" class="form-control" name="file" id="file">
                                            <br>
                                            <center>
                                                <output id="list"></output>
                                            </center>
                                        </div>
                                    </div>

                            </div >
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                <a class="btn btn-secondary w-40" href="index.php">Regresar</a>
                                <input  type="submit" class="btn btn-primary     w-40" value="Registrar Vuelo">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>

<?php include '../../admin/layout/parte2.php';?>                     
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

