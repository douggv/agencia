<?php

    $sql = "SELECT * FROM usuarios WHERE id = '$id_usuario' ";
    $query = $pdo->prepare($sql);
    $query->execute();
    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($usuarios as $usuario) {
        $id = $usuario['id'];
        $nombre = $usuario["nombre"];
        $apellido = $usuario["apellido"];
        $cedula = $usuario["cedula"];
        $email = $usuario["email"];
        $telefono = $usuario["telefono"];
        $rol = $usuario["rol"];
    }
?>