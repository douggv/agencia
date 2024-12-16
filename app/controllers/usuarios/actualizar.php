<?php
include '../../config.php';
include '../../../admin/layout/validacion.php';
$nombre = $_POST['nombre'];
$apellido = $_POST["apellido"];
$cedula = $_POST["cedula"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$rol = $_POST["rol"];   
$id_usuario = $_POST["id_usuario"];

$sentencia = $pdo->prepare("UPDATE usuarios 
SET nombre = :nombre,
apellido = :apellido,
cedula = :cedula,   
email = :email,  
telefono = :telefono,
rol = :rol
WHERE id = :id_usuario");

$sentencia->bindParam(':nombre', $nombre);
$sentencia->bindParam(':apellido', $apellido);
$sentencia->bindParam(':cedula', $cedula);
$sentencia->bindParam(':email', $email);
$sentencia->bindParam(':telefono', $telefono);
$sentencia->bindParam(':rol', $rol);
$sentencia->bindParam(':id_usuario', $id_usuario);
if ($sentencia->execute()) {

    $mensaje = "Un usuario ha sido actualizado" . " correo: " . $email . "con el rol de " . $rol . " Por Parte de: " .  $nombre_usuario_sesion . " Que es: " . $cargo_usuario_sesion . " y el correo: " . $email_sesion;
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