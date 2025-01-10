<?php 
include '../../app/config.php';
?>

<?php include '../layout/cabecera.php';?>
<?php include '../layout/nav.php';?>
<?php include '../../app/controllers_clientes/vuelos/listado_vuelos.php"'; ?>
<?php include '../../admin/layout/mensaje.php"'; ?>


<div class="container">
    <section class="mt-5 d-flex justify-content-center flex-wrap gap-5 align-items-left">
        <?php 
        foreach ($vuelos as $vuelo) {
            ?>
            <article class="col-md-3 card shadow-sm h-100">
                <img src="<?php echo $URL; ?>/public/images/vuelos/<?php echo $vuelo['imagen']; ?>" alt="<?php echo $vuelo['nombre']; ?>" class="img-fluid card-img-top">
                <div class="card-body">
                    <h2 class="card-title"><?php echo $vuelo['nombre']; ?></h2>
                    <p class="card-text"><?php echo $vuelo['descripcion']; ?></p>
                    <p class="card-text">Aerolínea: <?php echo $vuelo['aerolinea']; ?></p>
                    <p class="card-text">Precio: <?php echo $vuelo['precio']; ?></p>
                    <p class = "card-text">fecha de salida: <?php echo $vuelo['fecha_salida']; ?></p>
                    <p class="card-text">
                        <?php if($vuelo['fecha_regreso'] != null) {?>
                            Fecha de regreso: <?php echo $vuelo['fecha_regreso']; ?>
                        <?php } ?>
                    </p>
                    <?php if ($vuelo['puestos_vendidos'] == $vuelo['puestos_totales']) { ?>
                        <p class="card-text">No quedan puestos disponibles</p>
                    <?php } ?>
                    <div class="d-flex justify-content-center mt-auto">
                        <a href="vuelo.php?id=<?php echo $vuelo['id']; ?>" class="btn btn-primary w-100">Comprar</a>
                    </div>
                </div>
            </article>
            <?php
        }
        ?>
    </section>
</div>