
<?php

include("validacion.php");
    
?>

<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= APP_NAME ?></title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="public/css/home.css">
        <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
        <link href="public/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="public/js/jquery-3.6.4.min.js"></script>
        <!-- jQuery -->
        <script src="<?= $URL ?>/public/template/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
        <!-- SweetAlert2 -->
    </head>
    
    <body >
        
        <nav style ="background-color:#ffa6c5" class="navbar navbar-expand-lg ">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img width="80px" src="assets/img/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="<?= $URL ?>">Inicio</a>
                    <a class="nav-link" href="<?php echo $URL ?>/clientes/servicios/index.php">Contacto</a>
                    <a class="nav-link" href="<?php echo $URL ?>/clientes/servicios/index.php">Servicios</a>
                    
                </div>
                <div style="margin-left: auto;">
                    <a href="<?= $URL ?>/clientes/perfil/index.php" type="button" style="background-color:#FF69B4; border-color:#FF69B4 " class="btn btn-success mx-2">
                        <?php echo $email_sesion ?>
                    </a>
                    <a href="<?= $URL ?>/app/controllers_clientes/login/cerrar_sesion.php" type="button" class="btn btn-danger ">
                        Salir
                    </a>
                </div>

                </div>
                
            </div>
        </nav>

        <style>
            body {
            background-image: url('fondo.jpg');
            background-repeat: no-repeat;
            background-size: 100% 100%;
            background-position: center;
            background-attachment: fixed;
            }
        </style>