<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 29/8/2023
 * Time: 21:57
 */

include ('../../../app/config.php');

$servicio_id = $_POST['servicio_id'];


$sentencia = $pdo->prepare("DELETE FROM services WHERE id = '$servicio_id' ");

if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Se elimino de la manera correcta en la base de datos";
    $_SESSION['icono'] = 'success';
    header('Location: '.$URL.'/admin/servicios');
}else{
    session_start();
    $_SESSION['mensaje'] = "error no se pudo eliminar en la base de datos";
    $_SESSION['icono'] = 'error';
    header('Location: '.$URL.'/admin/servicios');
}


