<?php
session_start();
    if(isset($_SESSION['emailu'])) {
        $email_sesion = $_SESSION['emailu'];
        $sql = "SELECT * FROM usuarios WHERE email = '$email_sesion' ";
        $query = $pdo->prepare($sql);
        $query->execute();
        $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($usuarios as $usuario) {
            $id_usuario_sesion = $usuario['id'];
            $cargo_usuario_sesion = $usuario['rol'];
            $nombre_usuario_sesion_cliente = $usuario['nombre'];
        }
    }else{
        echo "no ha pasado por el login";
        //header("Location: ".$URL."/login");
        
    }
    
?>