<?php
include ('../../../app/config.php');
include '../../../admin/layout/validacion.php';

$nombre = $_POST['nombre'];
$descripcion = $_POST["descripcion"];
$categoria = $_POST["categoria"];
$precio = $_POST["precio"];



if (isset($_FILES['file'])) {
    $nombreDelArchivo = date('Y-m-d-h-i-s').$_FILES['file']['name'];
    $location = "../../../public/images/servicios/".$nombreDelArchivo;
    move_uploaded_file($_FILES['file']['tmp_name'],$location);
} else {
    // Maneja el caso en que no se ha subido un archivo
    $nombreDelArchivo = '';
}

$sql = "INSERT INTO services (nombre, descripcion, categoria, precio, imagen) VALUES (?, ?, ?, ?, ?)";
$query = $pdo->prepare($sql);
$query->bindParam(1, $nombre, PDO::PARAM_STR);
$query->bindParam(2, $descripcion, PDO::PARAM_STR);
$query->bindParam(3, $categoria, PDO::PARAM_STR);
$query->bindParam(4, $precio, PDO::PARAM_STR);
$query->bindParam(5, $nombreDelArchivo, PDO::PARAM_STR);

if($query->execute()){
    session_start();
    $mensaje = "Se registro el servicio de la manera correcta en la base de datos. Registrado Por: ".$nombre_usuario_sesion . "Servicio registrado: ".$nombre . " con el precio de: " . $precio . "con categoria de: " . $categoria;
    $sql = "INSERT INTO auditorias (mensaje) VALUES (?)";
    $query = $pdo->prepare($sql);
    $query->bindParam(1, $mensaje, PDO::PARAM_STR);
    $query->execute();
    $_SESSION['mensaje'] = "Se registro un servicio de la manera correcta en la base de datos";
    $_SESSION['icono'] = 'success';
    header('Location: '.$URL.'/admin/servicios');
}else{
    session_start();
    $_SESSION['mensaje'] = "error no se pudo registrar en la base de datos";
    $_SESSION['icono'] = 'error';
    header('Location: '.$URL.'/admin/servicios/create.php');
}