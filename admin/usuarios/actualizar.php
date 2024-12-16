<?php
    $id_usuario = $_GET['id'];
    include '../../app/config.php';
    include '../../app/controllers/usuarios/datos_usuario.php';
    
?>   
<?php include '../../admin/layout/parte1.php';?>
<?php include '../../admin/layout/mensaje.php';?>
<div class="container-fluid">
    <h1 class="text-center">Actualización del Usuario</h1>  
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
                    <div class="card card-outline card-primary">
                        
                    <div class="card-body">
                        
                        
                        <form action="../../app/controllers/usuarios/actualizar.php" method="post">
                        <div class="row">
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input value = "<?=$nombre;?>" class="form-control form-control-rosado" type="text" name="nombre" placeholder="Ingresa el nombre" required pattern="^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$" title="Solo letras" minlength="3" maxlength="40">
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Apellido</label>
                                <input value="<?=$apellido;?>" class="form-control form-control-rosado" type="text" name="apellido" placeholder="Ingresa el apellido" required pattern="^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$" title="Solo letras" minlength="3" maxlength="40">
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Cedula</label>
                                <input value="<?=$cedula;?>" class="form-control form-control-rosado" type="text" name="cedula" placeholder="Ingresa la cedula" required title="Solo Numeros" pattern="[0-9]*" minlength="7" maxlength="8">
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input value="<?=$email;?>" class="form-control form-control-rosado" type="email" name="email" placeholder="Ingresa el correo electronico" required>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Telefono</label>
                                <input value ="<?=$telefono;?>" class="form-control form-control-rosado" type="text" name="telefono" placeholder="Ingresa el numero de telefono" minlength="10" maxlength="17">
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Cargo</label>
                                <select name="rol" id="" class="form-control form-control-rosado">
                                    <option value="Cliente" <?php if ($rol == "Cliente") echo "selected"; ?>>Cliente</option>
                                    <option value="Peluqero" <?php if ($rol == "Peluqero") echo "selected"; ?>>Peluqera</option>
                                    <option value="Manicurista" <?php if ($rol == "Manicurista") echo "selected"; ?>>Manicurista</option>
                                    <option value="Esticista" <?php if ($rol == "Esticista") echo "selected"; ?>>Esticista</option>
                                    <option value="Masajista" <?php if ($rol == "Masajista") echo "selected"; ?>>Masajista</option>
                                </select>
                            </div>  
                        </div>

                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                            <a class="btn btn-secondary w-40" href="index.php">Regresar</a>
                            <input style="background-color:#FF69B4; border-color:#FF69B4 " type="submit" class="btn btn-success w-40" value="Actualizar">
                            </div>
                        </div>
                        <input type="text" name="id_usuario" value="<?= $id_usuario; ?>" hidden>
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


