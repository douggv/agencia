<?php

    $id_usuario = $_GET['id'];
    include '../../app/config.php';
    include '../../app/controllers/usuarios/datos_usuario.php';
    
    
?>   
<?php include '../../admin/layout/mensaje.php';?>
<?php include '../../admin/layout/parte1.php';?>
<?php include '../../admin/layout/mensaje.php';?>
<div class="container-fluid">
    <h1>Datos del Usuario  </h1>  
    <div class="row">
        <div class="col-md-6">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">Datos Registrados</h3>
                    </div>
                    <div class="card-body">
                        
                        
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nombre Completo</label>
                                        <input readonly value="<?php echo $nombre_completo; ?>" class ="form-control" type="text" class="form-control" name="nombre_completo"
                                        required
                                        pattern="^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$"
                                        title="Solo letras"
                                        minlength="3"
                                        maxlength="40">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Cedula</label>
                                        <input readonly value="<?php echo $cedula; ?>" class ="form-control" type="number" class="form-control" name="cedula"
                                        required

                                        title="Solo Numeros"
                                        minlength ="7"
                                        maxlength = "8">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Correo Electronico</label>
                                        <input readonly value="<?php echo $email; ?>" class ="form-control" type="email" class="form-control" name="email"
                                        required
                                        >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Telefono</label>
                                        <input readonly value="<?php echo $telefono; ?>" class ="form-control" type="text" class="form-control" name="telefono"

                                        minlength ="10"
                                        maxlength = "17">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label  for="">Direccion</label>
                                        <input readonly value="<?php echo $direccion; ?>" class ="form-control" type="text" class="form-control" name="direccion"
                                    >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Cargo</label>
                                            <input readonly value="<?php echo $cargo; ?>" class ="form-control" type="text" class="form-control" name="cargo"
                                            >
                                        </div>
                                    </div>

                                

                                
                            </div>
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

<?php include '../../admin/layout/parte2.php';?>

