<?php

include '../../app/config.php';
include "<?php echo $URL; ?>clientes/layout/validacion.php; ?>";

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$rol = $_POST["rol"];
$sentencia = $pdo->prepare("UPDATE usuarios 
SET nombre = :nombre,
apellido = :apellido,  
telefono = :telefono,

WHERE id = :id_usuario");

$sentencia->bindParam(':nombre', $nombre);
$sentencia->bindParam(':apellido', $apellido);
$sentencia->bindParam(':cedula', $cedula);
$sentencia->bindParam(':email', $email);
$sentencia->bindParam(':telefono', $telefono);
$sentencia->bindParam(':rol', $rol);
$sentencia->bindParam(':id_usuario', $id_usuario_sesion);
if ($sentencia->execute()) {

    $mensaje = "Un usuario ha sido actualizado" . " correo: " . $email . "con el rol de " . $rol . " Por parte del cliente" .  
    $sql = "INSERT INTO auditorias (mensaje) VALUES (?)";
    $query = $pdo->prepare($sql);
    $query->bindParam(1, $mensaje, PDO::PARAM_STR);
    $query->execute();

    session_start();
    $_SESSION['mensaje'] = "Usuario Actualizado Correctamente";
    $_SESSION['icono'] = "success";
    header("Location: ".$URL."/clientes/perfil/index.php");
} else {
    session_start();
    $_SESSION['mensaje'] = "Error al Actualizar el Usuario";
    $_SESSION['icono'] = "error";
    header("Location: ".$URL."/clientes/perfil/index.php");
}
?>
