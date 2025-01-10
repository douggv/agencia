<?php
include ('../../../app/config.php');
include '../../../admin/layout/validacion.php';

$nombre = $_POST['nombre'];
$descripcion = $_POST["descripcion"];
$tipo = $_POST["tipo"];
$precio = $_POST["precio"];
$origen = $_POST["origen"];
$destino = $_POST["destino"];
$fecha_salida = $_POST["fecha_salida"];
$fecha_regreso = $_POST["fecha_regreso"];
$aerolinea = $_POST["aerolinea"];   
$puestos_totales = $_POST["puestos_totales"];



if (isset($_FILES['file'])) {
    $nombreDelArchivo = date('Y-m-d-h-i-s').$_FILES['file']['name'];
    $location = "../../../public/images/vuelos/".$nombreDelArchivo;
    move_uploaded_file($_FILES['file']['tmp_name'],$location);
} else {
    // Maneja el caso en que no se ha subido un archivo
    $nombreDelArchivo = '';
}

$sql = "INSERT INTO vuelos (nombre, descripcion, tipo, precio, origen, destino, fecha_salida, fecha_regreso, aerolinea, imagen, puestos_totales) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$query = $pdo->prepare($sql);
$query->bindParam(1, $nombre, PDO::PARAM_STR);
$query->bindParam(2, $descripcion, PDO::PARAM_STR);
$query->bindParam(3, $tipo, PDO::PARAM_STR);
$query->bindParam(4, $precio, PDO::PARAM_STR);
$query->bindParam(5, $origen, PDO::PARAM_STR);
$query->bindParam(6, $destino, PDO::PARAM_STR);
$query->bindParam(7, $fecha_salida, PDO::PARAM_STR);
$query->bindParam(8, $fecha_regreso, PDO::PARAM_STR);
$query->bindParam(9, $aerolinea, PDO::PARAM_STR);
$query->bindParam(10, $nombreDelArchivo, PDO::PARAM_STR);
$query->bindParam(11, $puestos_totales, PDO::PARAM_INT);

if($query->execute()){
    if (!isset($_SESSION)) {
        session_start();
    }
    $mensaje = "Se registro el " . $tipo . " de forma correcta . Registrado Por: ". $nombre_usuario_sesion . "Vuelo registrado: ".$nombre . " con el precio de: " . $precio;
    $sql = "INSERT INTO auditorias (mensaje) VALUES (?)";
    $query = $pdo->prepare($sql);
    $query->bindParam(1, $mensaje, PDO::PARAM_STR);
    $query->execute();
    $_SESSION['mensaje'] = "Registro de vuelo Exitoso";
    $_SESSION['icono'] = 'success';
    header('Location: '.$URL.'/admin/vuelos');
}else{
    if (!isset($_SESSION)) {
        session_start();
    }
    $_SESSION['mensaje'] = "error no se pudo registrar en la base de datos";
    $_SESSION['icono'] = 'error';
    header('Location: '.$URL.'/admin/vuelos/create.php');
}