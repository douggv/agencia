<?php
    include '../../config.php';
    $correo = $_GET['correo'];
    $password = $_GET['contraseña'];
    $cargo = $_GET['rol'];
    
    
    $sql = "SELECT * FROM usuarios WHERE correo = ? AND rol = ? ";

    $query = $pdo->prepare($sql);
    $query->bindParam("1", $correo, PDO::PARAM_STR);
    $query->bindParam("2", $cargo, PDO::PARAM_STR);

    $query->execute();

    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
    $contador = 0;
    foreach ($usuarios as $usuario) {
        $passwod_tabla = $usuario['contrasena'];
        if (password_verify($password, $passwod_tabla)) {
            $contador = $contador + 1;
        }
    }
    
    if($contador > 0){
        echo "bienvenido al sistema";
        session_start();
        $_SESSION['email'] = $email;
        header("Location: ".$URL."/clientes/index.php");
    } else {
        session_start();
        $_SESSION['mensaje2'] = "Error al iniciar sesion, verifique sus credenciales";
        $_SESSION['icono2'] = "error";
        header('Location: '.$URL.'/login.php');
    }
?> 