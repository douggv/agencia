<?php
    include '../../app/config.php';
    
?>   
<?php include '../../admin/layout/parte1.php';?>
<?php include '../../admin/layout/mensaje.php';?>
<div class="container-fluid">
    <h1 class="text-center">Nuevo Usuario</h1>  
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">Información del Usuario</h3>
                    </div>
                    <div class="card-body">
                        
                        
                        <form action="../../app/controllers/usuarios/nuevo_usuario.php" method="post">
                        <div class="row">
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input class="form-control form-control-rosado" type="text" name="nombre" placeholder="Ingresa el nombre" required pattern="^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$" title="Solo letras" minlength="3" maxlength="40">
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Apellido</label>
                                <input class="form-control form-control-rosado" type="text" name="apellido" placeholder="Ingresa el apellido" required pattern="^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$" title="Solo letras" minlength="3" maxlength="40">
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Cedula</label>
                                <input class="form-control form-control-rosado" type="text" name="cedula" placeholder="Ingresa la cedula" required title="Solo Numeros" pattern="[0-9]*" minlength="7" maxlength="8">
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input class="form-control form-control-rosado" type="email" name="email" placeholder="Ingresa el correo electronico" required>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Telefono</label>
                                <input class="form-control form-control-rosado" type="text" name="telefono" placeholder="Ingresa el numero de telefono" minlength="10" maxlength="17">
                            </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <input value = "cliente" type="hidden" name="rol">
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Contraseña</label>
                                <input class="form-control form-control-rosado" type="password" name="contraseña" placeholder="Ingresa la Contraseña" required minlength="3" maxlength="40">
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Verificar Contraseña</label>
                                <input class="form-control form-control-rosado" type="password" name="contraseña_verificacion" placeholder="Ingresa la Contraseña de nuevo" required minlength="3" maxlength="40">
                            </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                            <a class="btn btn-secondary w-40" href="index.php">Regresar</a>
                            <input  type="submit" class="btn btn-primary w-40" value="Registrar">
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

</style>

