<?php
include '../../config.php';
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$cedula = $_POST['cedula'];
$email = $_POST['email'];
$rol = "cliente";
$contraseña = $_POST['contraseña'];
$contraseña_verificacion = $_POST['contraseña_verificacion'];

if($contraseña == $contraseña_verificacion){

    // Verificar si el correo electrónico ya está registrado
    $sql = "SELECT * FROM usuarios WHERE email = ? OR cedula = ?";
    $query = $pdo->prepare($sql);
    $query->bindParam(1, $email, PDO::PARAM_STR);
    $query->bindParam(2, $cedula, PDO::PARAM_INT);
    $query->execute();

    if ($query->rowCount() > 0) {
        // El correo electrónico o la cedula ya está registrado
        session_start();
        $_SESSION['mensaje2'] = "Este Usuario ya ha Sido Registrado anteriormente";
        $_SESSION['icono2'] = "error";
        header("Location: ".$URL."/registro.php");
        
    } else {
        // El correo electrónico no está registrado, puedes continuar con la inserción
        $hashed_password = password_hash($contraseña, PASSWORD_DEFAULT);
        

        $sql = "INSERT INTO usuarios (nombre, apellido, telefono, cedula, email, rol, contrasena) VALUES (?, ?, ?, ?, ?, ?, ?)";

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
            $mensaje = "Un usuario ha sido registrado" . " correo: " . $email;
            $sql = "INSERT INTO auditorias (mensaje) VALUES (?)";
            $query = $pdo->prepare($sql);
            $query->bindParam(1, $mensaje, PDO::
            PARAM_STR);
            $query->execute();
            session_start();
            
            // Mensaje de Alerta
            $_SESSION['mensaje2'] = "Registro de Usuario Exitoso";
            $_SESSION['icono2'] = "success";
            
            // Envio de  Email

            $_SESSION["tituloEmail"] = "Finol Travel Agency";
            $_SESSION["mensajeEmail"] = "Bienvenido " . $nombre ."a Finol Travel Agency donde Tenemos los mejores paquetes y ofertas para que puedas disfrutar de tus viajes soñados. ";
            $_SESSION["emailEnviar"] = $email;
            header("Location: ".$URL."/login.php");
            
        }else{
            
            session_start();
            $_SESSION['mensaje2'] = "Error al Registrar el Usuario";
            $_SESSION['icono2'] = "error";
            header("Location: ".$URL."/registro.php"); 
        }
        
    }
} else {
    session_start();
    $_SESSION['mensaje2'] = "Las contraseñas no coinciden";
    $_SESSION['icono2'] = "error";
    header("Location: ".$URL."/registro.php");        
}

?>