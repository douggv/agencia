<?php

session_start();
    if(isset($_SESSION['email'])) {
        $email_sesion = $_SESSION['email'];
        $sql = "SELECT * FROM usuarios WHERE email = '$email_sesion' ";
        $query = $pdo->prepare(query: $sql);
        $query->execute();
        $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($usuarios as $usuario) {
            $email_sesion = $_SESSION["email"];
            $id_usuario_sesion = $usuario['id'];
            $cargo_usuario_sesion = $usuario['rol'];
            $nombre_usuario_sesion = $usuario['nombre'];
        }
    }else{
        
        header(header: "Location: ".$URL."/login.php");
    }

?>