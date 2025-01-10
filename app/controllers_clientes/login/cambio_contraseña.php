<?php
include '../../config.php';
$email = $_POST['email'];
$contrasena = $_POST['contraseña'];
$contrasena_verificacion = $_POST['contraseña_verificacion'];

if($contrasena == $contrasena_verificacion){

    $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);

    $sql = "UPDATE usuarios SET contrasena = ? WHERE email = ?";
    $sentencia = $pdo->prepare($sql);
    $sentencia->bindParam(1, $hashed_password, PDO::PARAM_STR);
    $sentencia->bindParam(2, $email, PDO::PARAM_STR);

    if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje2'] = "Cambio de contraseña exitoso";
        $_SESSION['icono2'] = "success";
        header("Location: ".$URL."/login.php");
    } else {
        session_start();
        $_SESSION['mensaje2'] = "Error al cambiar la contraseña";
        $_SESSION['icono2'] = "error";
        header("Location: ".$URL."/cambio_contraseña.php");
    }

}else{
    session_start();
    $_SESSION['mensaje2'] = "Las contraseñas no coinciden";
    $_SESSION['icono2'] = "error";
    header("Location: ".$URL."/cambio_contraseña.php");
}





?>