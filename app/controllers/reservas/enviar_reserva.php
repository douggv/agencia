<?php
include ('../../../app/config.php');

$id_usuario = $_POST['id_usuario_sesion'];
$id_vuelo = $_POST['id_vuelo'];
$metodo_pago = $_POST['metodo_pago'];
$referencia = $_POST['referencia'];
$nombre_pago = $_POST['nombre_pago'];
$estado = $_POST['estado'];

if (isset($_FILES['file'])) {
    $nombreDelArchivo = date('Y-m-d-h-i-s').$_FILES['file']['name'];
    $location = "../../../public/images/comprobantes/".$nombreDelArchivo;
    move_uploaded_file($_FILES['file']['tmp_name'],$location);
} else {
    // Maneja el caso en que no se ha subido un archivo
    $nombreDelArchivo = '';
}
$sql = "INSERT INTO reservas (id_usuario, id_vuelo, forma_de_pago, referencia, persona_pago, estado, imagen2) VALUES (?, ?, ?, ?, ?, ?, ?)";


$sentencia = $pdo->prepare($sql);

$sentencia->bindParam(1, $id_usuario, PDO::PARAM_INT);
$sentencia->bindParam(2, $id_vuelo, PDO::PARAM_INT);
$sentencia->bindParam(3, $metodo_pago, PDO::PARAM_STR);
$sentencia->bindParam(4, $referencia, PDO::PARAM_STR);
$sentencia->bindParam(5, $nombre_pago, PDO::PARAM_STR);
$sentencia->bindParam(6, $estado, PDO::PARAM_STR);
$sentencia->bindParam(7, $nombreDelArchivo, PDO::PARAM_STR);


if($sentencia->execute()){
    session_start();
    $mensaje = "Se ha realizado una reserva de vuelo";
    $sql = "INSERT INTO auditorias (mensaje) VALUES (?)";
    $query = $pdo->prepare($sql);
    $query->bindParam(1, $mensaje, PDO::PARAM_STR);
    $query->execute();
    
    
    $_SESSION['mensaje'] = "Se registro la reserva de la manera correcta";
    $_SESSION['icono'] = 'success';
    header('Location: '.$URL.'/clientes/vuelos');
}else{
    session_start();
    $_SESSION['mensaje'] = "No se pudo registrar la reserva";
    $_SESSION['icono'] = 'error';
    header('Location: '.$URL.'/clientes/vuelos');
}
