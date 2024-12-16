<?php
include '../../../app/config.php';
$fecha_cita = $_POST['fecha_cita'];
$hora_cita = $_POST['hora_cita'];
$id_usuario_fk = $_POST['id_usuario_fk'];

$mensaje = "Tu reserva para el día: ".$fecha_cita." a las: ".$hora_cita." ha sido aceptada";

$sentencia = $pdo->prepare('INSERT INTO notificacion
(id_usuario_fk, mensaje)
VALUES ( :id_usuario_fk, :mensaje)');

$sentencia->bindParam(':id_usuario_fk',$id_usuario_fk);
$sentencia->bindParam(':mensaje',$mensaje);
if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Se envio la notificacion de la manera correcta ";
    $_SESSION['icono'] = 'success';
    header('Location: '.$URL.'admin/reservas');
}else{
    session_start();
    $_SESSION['mensaje'] = "Error no se envio la notificacion";
    $_SESSION['icono'] = 'error';
    header('Location: '.$URL.'/admin/reservas.');
}

