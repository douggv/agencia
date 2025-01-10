<?php
include '../../../app/config.php';
include '../../../admin/layout/validacion.php';

$id_reserva = $_GET['id'];
$id_usuario = $_GET['id_usuario'];

$sql = "SELECT *
        FROM reservas 
        INNER JOIN usuarios ON reservas.id_usuario = usuarios.id 
        INNER JOIN vuelos ON reservas.id_vuelo = vuelos.id 
        WHERE reservas.id_reserva = :id_reserva";
        $query = $pdo->prepare($sql);
        $query->bindParam(':id_reserva', $id_reserva);
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

        };


        $mensaje = "Saludos ". $email . " Su Reserva para el vuelo de " . $origen . " a " . $destino . " ha sido aceptada fecha de salida: " . $fecha_salida . " fecha de regreso: " . $fecha_regreso . " por favor no olvide el comprobante de pago adjunto. Gracias";



        $sentencia = $pdo->prepare('INSERT INTO notificacion
        (id_usuario_fk, mensaje)
        VALUES ( :id_usuario, :mensaje)');

        $sentencia->bindParam(':id_usuario',$id_usuario);
        $sentencia->bindParam(':mensaje',$mensaje);
        
        if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje'] = "Se envio la notificacion de la manera correcta " ;
            $_SESSION['icono'] = 'success';
            $_SESSION["tituloEmail"] = "Finol Travel Agency";
            $_SESSION["mensajeEmail"] = $mensaje;
            $_SESSION["emailEnviar"] = $email;
            header('Location: '.$URL.'/admin/reservas');
        }else{
            session_start();
            $_SESSION['mensaje'] = "Error no se envio la notificacion";
            $_SESSION['icono'] = 'error';
            header('Location: '.$URL.'/admin/reservas.');
        }


?>



