<?php
include 'app/config.php';

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
        
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <img style="margin-right: 10px" width="60px" src="assets/img/logo.png" alt="">
            <a class="navbar-brand" href="index.php"><span style="color: red">Finol</span> Travel Agency</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#" style="transition: color 0.2s ease;">Home</a>
                    </li>
    
                    <li style="" class="nav-item dropdown">
                        <a style="transition: color 0.2s ease;" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Iniciar Sesión
                        </a>
                        <ul  class="dropdown-menu">
                            <li><a class="dropdown-item" href="login.php" style="transition: color 0.2s ease;">Iniciar Sesion</a></li>
                            <li><a class="dropdown-item" href="#" style="transition: color 0.2s ease;">Registrase</a></li>
    
                        </ul>
                    </li>
    
                </ul>
    
            </div>
        </div>
    </nav>

    <style>
        .nav-link:hover, .dropdown-item:hover {
            color: red;
        }
    </style>

    
