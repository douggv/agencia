<?php

$sql = "SELECT *
        FROM reservas 
        INNER JOIN usuarios ON reservas.id_usuario = usuarios.id 
        INNER JOIN vuelos ON reservas.id_vuelo = vuelos.id 
        WHERE reservas.estado = 'aceptada'";
        $query = $pdo->prepare($sql);
        $query->execute();
        $reservas = $query->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($reservas as $reserva) {
            $nombre = $reserva["nombre"];
            $email = $reserva["email"];
            $cedula = $reserva["cedula"];
            $origen = $reserva["origen"];
            $destino = $reserva["destino"];
            $forma_de_pago = $reserva["forma_de_pago"];
            $persona_pago = $reserva["persona_pago"];
            $referencia = $reserva["referencia"];
            $fecha_salida = $reserva["fecha_salida"];
            $fecha_regreso = $reserva["fecha_regreso"];
            $imagen = $reserva["imagen2"];
            $id_reserva = $reserva["id"];
            $estado = $reserva["estado"];

        }
?>

