<?php
include '../../../app/config.php';

$id_reserva = $_GET['id'];  

$sql = ('UPDATE reservas SET estado = "negado" WHERE id_reserva = :id');

$sentencia = $pdo->prepare($sql);
$sentencia->bindParam(':id', $id_reserva);

$sentencia->execute();

if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Se Nego la reserva de la manera correcta ";
    $_SESSION['icono'] = 'success';
    header('Location: '.$URL.'/admin/reservas');
}else{
    session_start();
    $_SESSION['mensaje'] = "Error no se Nego la reserva";
    $_SESSION['icono'] = 'error';
    header('Location: '.$URL.'/admin/reservas.');
}