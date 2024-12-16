<?php 
include '../../app/config.php';
?>

<?php include '../layout/cabecera.php';?>
<?php include '../layout/nav.php';?>
<?php 
    $sql = "SELECT * FROM usuarios WHERE id = '$id_usuario_sesion' ";
    $query = $pdo->prepare($sql);
    $query->execute();
    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($usuarios as $usuario) {
        $id = $usuario['id'];
        $nombre = $usuario["nombre"];
        $apellido = $usuario["apellido"];
        $cedula = $usuario["cedula"];
        $email = $usuario["email"];
        $telefono = $usuario["telefono"];
        $rol = $usuario["rol"];
    }

?>
<h2>Mis datos</h2>
<form action="../../app/controllers_clientes/usuarios/actualizar.php" method="post">
                        <div class="row">
                            
                                <input value = "<?=$rol;?>" class="form-control form-control-rosado" type="text" name="rol"  hidden>
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