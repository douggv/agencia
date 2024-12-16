<?php

include '../../../app/config.php';
include '../../../admin/layout/validacion.php';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$cedula = $_POST['cedula'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$rol = $_POST['rol'];
$contraseña = $_POST['contraseña'];
$contraseña_verificacion = $_POST['contraseña_verificacion'];

if($contraseña == $contraseña_verificacion){
    
    // Verificar si el correo electrónico ya está registrado
    $sql = "SELECT * FROM usuarios WHERE email = '$email' OR cedula = '$cedula'";
    $query = $pdo->prepare($sql);
    $query->execute();

    if ($query->rowCount() > 0) {
        // El correo electrónico o la cedula ya está registrado
        //echo "<script>alert('El correo electrónico o la cedula ya está registrado'); window.location.href='../../../admin/usuarios/nuevo_usuario.php';</script>";
        session_start();
        $_SESSION['mensaje'] = "Este Usuario ya ha Sido Registrado anteriormente";
        $_SESSION['icono'] = "error";
        header("Location: ".$URL."/admin/usuarios/nuevo_usuario.php");       
    } else {
        // El correo electrónico no está registrado, puedes continuar con la inserción
        $hashed_password = password_hash($contraseña, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios ( nombre, apellido, telefono, cedula, email, rol, contrasena ) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $query = $pdo->prepare($sql);
        $query->bindParam(1, $nombre, PDO::PARAM_STR);
        $query->bindParam(2, $apellido, PDO::PARAM_STR);
        $query->bindParam(3, $telefono, PDO::PARAM_STR);
        $query->bindParam(4, $cedula, PDO::PARAM_INT);
        $query->bindParam(5, $email, PDO::PARAM_STR);
        $query->bindParam(6, $rol, PDO::PARAM_STR);
        $query->bindParam(7, $hashed_password, PDO::PARAM_STR);
        
        if ($query->execute()) {
            // Auditoria
            $mensaje = "Un usuario ha sido registrado" . " correo: " . $email . "con el rol de " . $rol . " Por Parte de: " .  $nombre_usuario_sesion . " Que es: " . $cargo_usuario_sesion . " y el correo: " . $email_sesion;
            $sql = "INSERT INTO auditorias (mensaje) VALUES (?)";
            $query = $pdo->prepare($sql);
            $query->bindParam(1, $mensaje, PDO::PARAM_STR);
            $query->execute();

            // Envio de  Email
            session_start();
            $_SESSION ["emailEnviar"] = $email;
            $_SESSION["tituloEmail"] = "Rullier Spa";
            $_SESSION["mensajeEmail"] = "Saludos " . $nombre ." te damos la Bienvenida a Rullier Spa donde podras ofrecerle a tu cuerpo un tratamiento que te ayudara a mejorar tu salud y tu belleza!!";



            $_SESSION['mensaje'] = "Usuario Registrado Correctamente";
            $_SESSION['icono'] = "success";
            header("Location: ".$URL."/admin/usuarios/index.php");
            
        }else{
            
            session_start();
            $_SESSION['mensaje'] = "Error al Registrar el Usuario";
            $_SESSION['icono'] = "error";
            header("Location: ".$URL."/admin/usuarios/nuevo_usuario.php");        }
        
    }
} else {
    session_start();
    $_SESSION['mensaje'] = "Las contraseñas no coinciden";
    $_SESSION['icono'] = "error";
    header("Location: ".$URL."/admin/usuarios/nuevo_usuario.php");
    
    
}
?>