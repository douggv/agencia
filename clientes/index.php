<?php
include '../app/config.php';

?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= APP_NAME ?></title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="<?php echo $URL; ?>/public/css/home.css">
        <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
        <link href="<?php echo $URL; ?>/public/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="<?php echo $URL; ?>/public/js/jquery-3.6.4.min.js"></script>

        
    </head>
    <body>
    <?php include 'layout/nav.php';?>
    <center>
            <h1 style="font-size: 36px; font-weight: bold; margin-bottom: 20px;">¡Viaja con <span style="color: #c20000;">Finol</span>  Travel Agency!</h1>
            <p style="font-size: 24px; margin-bottom: 40px;">Tenemos los mejores paquetes y ofertas para que puedas disfrutar de tus viajes soñados.</p>
        </center>
        <div style="background: linear-gradient(to bottom, #eb7575, #f7f7f7);" class="container-fluid row">
            <a class="col-md-6" href="login.php">
            <center id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div style="border: 2px rounded;" class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="../assets/img/cap1.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="../assets/img/cap2.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="../assets/img/cap3.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="../assets/img/cap4.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="../assets/img/cap5.png" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </center>
            </a>
            <div class="col-md-6 mt-5">
                <h1 style="font-size: 36px; font-weight: bold; margin-bottom: 20px;">¡Promociones Exclusivas!</h1>
                <p style="font-size: 24px; margin-bottom: 40px;">¡No te pierdas nuestras ofertas especiales! Regístrate ahora y disfruta de los mejores precios con <span style="color: #c20000;">Finol</span> Travel Agency tus viajes estan garantizados!</p>
                <center><a style="background-color: #c20000; color: #ffffff;" class="btn" href="vuelos/index.php">Reserva con Finol Travel Agency Ahora!!</a></center>
                <p style="font-size: 18px; margin-top: 20px;">¿Necesitas ayuda? <br> Conéctate con nuestro asistente virtual <a href="https://wa.link/nr7smc">aquí</a>!!! Escribele "hola" para comenzar.</p>
            </div>
        </div>

    

    
    <footer class="container-fluid">
        
    </footer >


    <style>
        .carousel-inner img {
            max-width: 100%;
        }
        
    </style>

</html>   

    </body>
</html>