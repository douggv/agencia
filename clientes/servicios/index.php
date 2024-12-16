<?php 
include '../../app/config.php';
?>

<?php include '../layout/cabecera.php';?>
<?php include '../layout/nav.php';?>
<?php include '../../app/controllers_clientes/servicios/listado_servicios.php"'; ?>
<?php include '../../admin/layout/mensaje.php".'; ?>

<script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth', 
            local : 'es',
            
            });
            calendar.render();
        });
</script>



<section style="background-color: #f5f5f5;" class="servicios pt-5">
    <div class="container">
        <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">Nuestros <span class=" opacity-75">Servicios</span></h2>
        </div>
        </div>

<div class="row mt-5 d-flex justify-content-center align-items-start gap-5">
    <?php
    foreach ($servicios as $servicio) {
    ?>
    <div class="col-md-4 col-lg-3 col-sm-6">
        <div class="card border-0 shadow-sm" style="background-color: #f7f7f7;">
            <img src="<?php echo $URL; ?>/public/images/servicios/<?php echo $servicio["imagen"]; ?>" alt="ad" class="img-fluid rounded-top" style="height: 200px; object-fit: cover;">
            <div class="card-body">
                <h5 class="card-title text-purple" style="color: #7a288a;"><?php echo $servicio['nombre']; ?></h5>
                <p class="text-muted"><?php echo $servicio['descripcion']; ?></p>
                <p class="card-text text-pink" style="color: #ff69b4;"><?php echo '$' . $servicio['precio']; ?></p>
                <a href="servicios_calendario.php?id_servicio=<?php echo $servicio['id']; ?>" class="btn btn-pink" style="background-color: #ff69b4; color: #ffffff;">Reservar Servicio</a>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
</div>
    </div>
</section>