<?php 
include '../../app/config.php';
?>

<?php include '../layout/cabecera.php';?>
<?php include '../layout/nav.php';

$mascota_id = $_GET['id'];

$sql = "SELECT * FROM historial_clinico where mascota_id_fk = '$mascota_id' ";
$query = $pdo->prepare($sql);
$query->execute();
$historiales = $query->fetchAll(PDO::FETCH_ASSOC); 



?>

<h1 class="text-center mt-5 ">Historial Clinico </h1>

<?php
if (empty($historiales)) {
    echo "Aun no existe historial clinico para esta mascota";
} else {
    foreach ($historiales as $historial) {
?>
        <div class="row mx-5 mt-5">
            <div class="col-md-2  border border-secondary rounded p-2">
                <h5 class="text-center">Fecha</h5>
                <p class="text-center"><?php echo $historial['fyh_creacion']; ?></p>
            </div>
            <div class="col-md-2 border border-secondary rounded p-2">
                <h5 class="text-center">Enfermedad</h5>
                <p class="text-center"><?php echo $historial['enfermedad']; ?></p>
            </div>
            <div class="col-md-2 border border-secondary rounded p-2">
                <h5 class="text-center">Tratamiento</h5>
                <p class="text-center"><?php echo $historial['tratamiento']; ?></p>
            </div>
            <div class="col-md-2 border border-secondary rounded p-2">
                <h5 class="text-center">Alergias</h5>
                <p class="text-center"><?php echo $historial['alergias']; ?></p>
            </div>
            <div class="col-md-2 border border-secondary rounded p-2">
                <h5 class="text-center">Cirugias</h5>
                <p class="text-center"><?php echo $historial['cirugias']; ?></p>
            </div>
        </div>
<?php
    }
}
?>
<h2 class="text-center mt-5">Historial de Vacunacion</h2>
<?php
$sql = "SELECT * FROM detalles_vacunacion WHERE mascota_id_fk = '$mascota_id'";
$query = $pdo->prepare($sql);
$query->execute();
$detalles = $query->fetchAll(PDO::FETCH_ASSOC);

if (empty($detalles)) {
    echo "Aun no existe historial de vacunación para esta mascota";
} else {
    foreach ($detalles as $detalle) {
        $mensaje = "Colocar la vacuna nuevamente a los ". $detalle['dias_espera'] . " días de la fecha " . $detalle['fyh_creacion'];
?>
        <div class="row mx-5 mt-5">
            <div class="col-md-4 border border-secondary rounded p-2">
                <h5 class="text-center">Nombre</h5>
                <p class="text-center"><?php echo $detalle['nombre']; ?></p>
            </div>
            <div class="col-md-4 border border-secondary rounded p-2">
                <h5 class="text-center">Refuerzo</h5>
                <p class="text-center"><?php echo $mensaje; ?></p>
            </div>
            <div class="col-md-4 border border-secondary rounded p-2">
                <h5 class="text-center">Enfermedad previene</h5>
                <p class="text-center"><?php echo $detalle['enfermedad_previene']; ?></p>
            </div>
        </div>
<?php
    }
}
?>

