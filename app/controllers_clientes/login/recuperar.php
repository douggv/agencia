<?php
include '../../config.php';
$email = $_GET['email'];
$token = rand(100000, 999999);

$sql = "SELECT * FROM usuarios WHERE email = ?";
$query = $pdo->prepare($sql);
$query->bindParam(1, $email, PDO::PARAM_STR);
$query->execute();

if ($query->rowCount() > 0) {
    $sql = "UPDATE usuarios SET token = ? WHERE email = ?";
    $query = $pdo->prepare($sql);
    $query->bindParam(1, $token, PDO::PARAM_INT);
    $query->bindParam(2, $email, PDO::PARAM_STR);
    $query->execute();
    echo $token;
    if ($query->rowCount() > 0) {
        session_start();

        // Envio de  Email

        $_SESSION["tituloEmail"] = "Finol Travel Agency";
        $_SESSION["mensajeEmail"] = "Su codigo de recuperacion de contraseña es: " . $token;
        $_SESSION["emailEnviar"] = $email;


        $_SESSION['mensaje2'] = "Token Enviado Revise Su Correo Electronico";   
        $_SESSION['icono2'] = "success";

        header("Location: ".$URL."/codigo_recuperacion.php");
        
    }else {
        session_start();
        $_SESSION['mensaje2'] = "Error al Enviar el Token";
        $_SESSION['icono2'] = "error";
        header("Location: ".$URL."/login.php");
        
    }
}else{
    session_start();
        $_SESSION['mensaje2'] = "el correo no se encuentra registrado";
        $_SESSION['icono2'] = "error";
        header("Location: ".$URL."/login.php");
}
?>