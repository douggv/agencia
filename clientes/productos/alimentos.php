<?php 
include '../../app/config.php';
?>

<?php include '../layout/cabecera.php';?>
<?php include '../layout/nav.php';

$sql = "SELECT * FROM productos where tipo_producto = 'Alimento' ";
$query = $pdo->prepare($sql);
$query->execute();
$productos = $query->fetchAll(PDO::FETCH_ASSOC); 


?>
<section class="servicios mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Nuestros <span class="text-success opacity-75">Alimentos</span></h3> 
                </div>
            </div>

            <div  class="row mt-5 d-flex justify-content-center align-items-start gap-5">
                <?php
                foreach ($productos as $producto) {
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card h-100">
                            <img src="<?php echo $URL; ?>public/images/productos/<?php echo $producto['imagen']; ?>" class="card-img-top" alt="..." style=" height: 300px;">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <h5 class="card-title"><?php echo $producto['nombre_producto']; ?></h5>
                                <p class="card-text"><?php echo $producto['descripcion']; ?></p>
                                <div class="d-flex justify-content-between">
                                    <p class="card-text"><?php echo '$' . $producto['precio_venta']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                
                
                
            </div>
        </div>
</section>