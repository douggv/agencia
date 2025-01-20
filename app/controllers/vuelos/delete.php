<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 29/8/2023
 * Time: 21:57
 */

include ('../../../app/config.php');

$vuelo_id = $_POST['vuelo_id'];

try {
$sentencia = $pdo->prepare("DELETE FROM vuelos WHERE id = '$vuelo_id' ");

if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Se elimino de la manera correcta en la base de datos";
    $_SESSION['icono'] = 'success';
    header('Location: '.$URL.'/admin/vuelos');
}else{
    session_start();
    $_SESSION['mensaje'] = "error no se pudo eliminar en la base de datos";
    $_SESSION['icono'] = 'error';
    header('Location: '.$URL.'/admin/vuelos');
}

} catch (Exception $e) {
    session_start();
    $_SESSION['mensaje'] = "error no se pudo eliminar en la base de datos porque hay reservas asociadas";
    $_SESSION['icono'] = 'error';
    header('Location: '.$URL.'/admin/vuelos');
}
