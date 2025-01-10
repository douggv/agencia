<?php
include '../../config.php';
include '../../../admin/layout/validacion.php';
$nombre = $_POST['nombre'];
$apellido = $_POST["apellido"];
$cedula = $_POST["cedula"];
$telefono = $_POST["telefono"];
$id_usuario = $_POST["id_usuario"];

$sentencia = $pdo->prepare("UPDATE usuarios 
SET nombre = :nombre,
apellido = :apellido,
cedula = :cedula,    
telefono = :telefono
WHERE id = :id_usuario");

$sentencia->bindParam(':nombre', $nombre);
$sentencia->bindParam(':apellido', $apellido);
$sentencia->bindParam(':cedula', $cedula);
$sentencia->bindParam(':telefono', $telefono);
$sentencia->bindParam(':id_usuario', $id_usuario);
if ($sentencia->execute()) {

    $mensaje = "Se actualizo el usuario " . " correo: " . $email .  " por: " .  $nombre_usuario_sesion . "  correo: " . $email_sesion;
    $sql = "INSERT INTO auditorias (mensaje) VALUES (?)";
    $query = $pdo->prepare($sql);
    $query->bindParam(1, $mensaje, PDO::PARAM_STR);
    $query->execute();

    session_start();
    $_SESSION['mensaje'] = "Usuario Actualizado Correctamente";
    $_SESSION['icono'] = "success";
    header("Location: ".$URL."/admin/usuarios/index.php");
} else {
    session_start();
    $_SESSION['mensaje'] = "Error al Actualizar el Usuario";
    $_SESSION['icono'] = "error";
    header("Location: ".$URL."/admin/usuarios/actualizar.php?id=".$id_usuario);
}
?>