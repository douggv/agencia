<?php 
include '../../app/config.php';
?>

<?php include '../layout/cabecera.php';?>
<?php include '../layout/nav.php';?>
<?php 
$sql = "SELECT * FROM mascotas  where  usuario_id = '$id_usuario_sesion' ";
$query = $pdo->prepare($sql);
$query->execute();
$mascotas = $query->fetchAll(PDO::FETCH_ASSOC);; ?>



    <div class="row">
        <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">Mis Mascotas</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-responsive table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nro</th>
                                    <th>Nombre</th>
                                    <th>Fecha de Nacimiento</th>
                                    <th>Especie</th>
                                    <th>Identificacion</th>
                                    <th>Imagen</th>
                                    <th>Ver Historial</th>
                            </thead>
                            <tbody>
                                <?php
                                $contador = 0;
                                
                                    foreach ($mascotas as $mascota) {
                                        $contador++; 
                                        $mascota_id = $mascota['mascota_id'];
                                        ?>
                                        <tr>
                                            <td><?php echo $contador; ?></td>
                                            <td><?php echo $mascota['nombre']; ?></td>
                                            <td><?php echo $mascota['fecha_nacimiento']; ?></td>
                                            <td><?php echo $mascota['especie']; ?></td>
                                            <td><?php echo $mascota['identificacion']; ?></td>    
                                            </td>
                                            <td>
                                                <img src="<?= $URL."/public/images/mascotas/".$mascota['imagen']; ?>" width="100px" alt="img404">
                                            </td>
                                            <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href= "show.php?id=<?php echo $mascota_id ?>" class="btn btn-primary"><i class="bi bi-eye-fill"></i> Ver Historial</a>  
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>  
                            