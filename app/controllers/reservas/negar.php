<?php
include '../../../app/config.php';

$id = $_GET['id'];

$sql = ('UPDATE reservas SET estado = "negado" WHERE id = :id');

$sentencia = $pdo->prepare($sql);
$sentencia->bindParam(':id', $id);

$sentencia->execute();

if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Se nego la reserva de la manera correcta ";
    $_SESSION['icono'] = 'success';
    header('Location: '.$URL.'admin/reservas');
}else{
    session_start();
    $_SESSION['mensaje'] = "Error no se nego la reserva";
    $_SESSION['icono'] = 'error';
    header('Location: '.$URL.'/admin/reservas.');
}