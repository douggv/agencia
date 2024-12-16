<?php
include '../../../app/config.php';
$id_usuario = $_POST['id_usuario'];

$sentencia = $pdo->prepare("DELETE FROM usuarios WHERE id = :id_usuario");
$sentencia->bindParam(':id_usuario', $id_usuario);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Usuario Borrado Correctamente";
    $_SESSION['icono'] = "success";
    header("Location: ".$URL."/admin/usuarios/index.php");
    
} else {
    session_start();
    $_SESSION['mensaje'] = "Error al Borrar el Usuario";
    $_SESSION['icono'] = "error";
    header("Location: ".$URL."/admin/usuarios/index.php");
    
}
?>