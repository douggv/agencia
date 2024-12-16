<?php
    include '../../app/config.php';
    include ('../../app/controllers/servicios/listado_de_servicios.php');

    
?>   
<?php include '../../admin/layout/parte1.php';?>
<?php include '../../admin/layout/mensaje.php';?>

<?php
$contador = 1;
foreach ($servicios as $servicio){
$contador = $contador + 1;
}
function ceros($numero){
    $len=0;
    $cantidad_ceros = 5;
    $aux=$numero;
    $pos=strlen($numero);
    $len=$cantidad_ceros-$pos;
    for ($i=0;$i<$len;$i++){
        $aux="0".$aux;
    }
    return $aux;
}
?>
<div class="container-fluid">
    <h1 class="text-center">Nuevo servicio</h1>  
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
                    <div class="card card-outline card-rosado">
                        
                    <div class="card-body">                        
                        <form action="../../app/controllers/servicios/create.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input class="form-control form-control-rosado" type="text" name="nombre" placeholder="Ingresa el nombre" required pattern="^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$" title="Solo letras" minlength="3" maxlength="40">
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Descripcion</label>
                                <input class="form-control form-control-rosado" type="text" name="descripcion" placeholder="Ingresa una descripcion" required pattern="^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$" title="Solo letras"  maxlength="300">
                            </div>
                            </div>
                            <div class="col-md-4">
                            <label for="">Categoría</label>
                            <select class = "form-control form-control-rosado" name="categoria" id="">
                                <option value="manicurista">Manicurista</option>
                                <option value="esteticista">Esteticista</option>
                                <option value="peluquera">Peluquera</option>
                                <option value="masajista">Masajista</option>
                            </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="">precio</label>
                                <input class="form-control form-control-rosado" type="text" name="precio" placeholder="Ingresa el precio" required>
                            </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Imagen</label>
                                        <input type="file" class="form-control" name="file" id="file">
                                        <br>
                                        <center>
                                            <output id="list"></output>
                                        </center>
                                    </div>
                                </div>
                        </div>
                        
                            
                            

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                            <a class="btn btn-secondary w-40" href="index.php">Regresar</a>
                            <input style="background-color:#FF69B4; border-color:#FF69B4 " type="submit" class="btn btn-success w-40" value="Registrar">
                            </div>
                        </div>
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

