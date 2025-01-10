<?php 
include '../../config.php';

    $email = $_POST['email'];
    $token = $_POST['token'];



    $sql = "SELECT * FROM usuarios WHERE email = ? AND token = ?";
    $query = $pdo->prepare($sql);
    $query->bindParam(1, $email, PDO::PARAM_STR);
    $query->bindParam(2, $token, PDO::PARAM_INT);
    $query->execute();  

    if ($query->rowCount() > 0) {
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['mensaje2'] = "La verificacion del token fue exitosa";
        $_SESSION['icono2'] = "success";
        header("Location: ".$URL."/cambio_contraseña.php");
    } else {
        session_start();
        $_SESSION['mensaje2'] = "Token o correo electronico Incorrecto";
        $_SESSION['icono2'] = "error";
        header("Location: ".$URL."/login.php");
    }

?>