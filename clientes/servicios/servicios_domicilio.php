<?php 
include '../../app/config.php';
?>

<?php include '../layout/cabecera.php';?>
<?php include '../layout/nav.php';?>
<?php include '../../app/controllers_clientes/servicios/listado_servicios_domicilio.php"'; ?>
<section style ="background-color: #c8ffc3;"  class="servicios pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Nuestros <span class="text-success opacity-75">Servicios</span></h3> 
                </div>
            </div>
            <h3>Servicios A Domicilio</h3>
            <div  class="row mt-5 d-flex justify-content-center align-items-start gap-5">
                <?php
                foreach ($servicios as $servicio) {
                    ?>
                    <div class="col-md-4 col-lg-3 col-sm-6">
                            <div class="card">
                            <img class="card-img-top" src="<?php echo $URL; ?>public/images/servicios/<?php echo $servicio['imagen']; ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $servicio['nombre']; ?></h5>
                                <p class="card-text"><?php echo '$' . $servicio['precio']; ?></p>
                                <a href="servicios_calendario.php?id_servicio=<?php echo $servicio['servicio_id']; ?>" class="btn btn-primary">Reservar Servicio</a>
                            </div>
                            </div>
                        </div>
                    <?php
                }
                ?>
                
                
                
                
            </div>
        </div>
</section>