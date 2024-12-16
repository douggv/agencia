<?php 
include '../../app/config.php';
?>

<?php include '../layout/cabecera.php';?>
<?php include '../layout/nav.php';?>
<?php include '../../app/controllers_clientes/notificaciones/listado_notificaciones.php"'; ?>
<?php $sql = "SELECT * FROM notificacion where  id_usuario_fk = '$id_usuario_sesion' ";
$query = $pdo->prepare($sql);
$query->execute();
$notificaciones = $query->fetchAll(PDO::FETCH_ASSOC);; ?>
<section style =""  class="">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Notificaciones</h3> 
            </div>
        </div>

        <div  class="row mt-5 d-flex align-items-start gap-5">
            <?php
            foreach ($notificaciones as $notificacion) {
                ?>
                <div class="col-md-4 col-lg-3 col-sm-6">

                        <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $notificacion['mensaje']; ?></h5>

                        </div>
                        </div>

                </div>
                <?php
            }
            ?>
        </div>
    </div>


</section>