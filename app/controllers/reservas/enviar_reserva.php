<?php
include ('../../../app/config.php');

$title = $_POST['title'];
$fecha_cita = $_POST['fecha_cita'];
$hora_cita = $_POST['hora_cita'];
$usuario = $_POST['usuario'];
$metodo_pago = $_POST['metodo_pago'];
$nombre_pago = $_POST['nombre_pago'];
$referencia = $_POST['referencia'];
$id_usuario = $_POST['id_usuario'];
$id_servicio = $_POST['id_servicio'];
$estado = $_POST['estado'];

$nombreDelArchivo = date('Y-m-d-h-i-s').$_FILES['file']['name'];
$location = "../../../public/images/comprobantes/".$nombreDelArchivo;
move_uploaded_file($_FILES['file']['tmp_name'],$location);


$sentencia = $pdo->prepare('INSERT INTO reservas 
(title, start, end,fecha_cita,hora_cita,usuario,metodo_pago,nombre_pago,referencia,id_usuario,id_servicio,estado, fyh_creacion, imagen)
VALUES ( :title,:fecha_cita, :fecha_cita,:fecha_cita,:hora_cita,:usuario,:metodo_pago,:nombre_pago,:referencia,:id_usuario,:id_servicio,:estado,:fyh_creacion, :imagen)');

$sentencia->bindParam(':title',$title);
$sentencia->bindParam(':fecha_cita',$fecha_cita);
$sentencia->bindParam(':hora_cita',$hora_cita);
$sentencia->bindParam(':usuario',$usuario);
$sentencia->bindParam(':metodo_pago',$metodo_pago);
$sentencia->bindParam(':nombre_pago',$nombre_pago);
$sentencia->bindParam(':referencia',$referencia);
$sentencia->bindParam(':id_usuario',$id_usuario);
$sentencia->bindParam(':id_servicio',$id_servicio);
$sentencia->bindParam(':estado',$estado);
$sentencia->bindParam(':fyh_creacion',$fyh_creacion);
$sentencia->bindParam(':imagen',$nombreDelArchivo);



if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Mascota registrada satisfactoriamente";
    $_SESSION['icono'] = 'success';
    header('Location: '.$URL.'/clientes/servicios/servicios_clinica.php');
}else{
    session_start();
    $_SESSION['mensaje'] = "error no se pudo registrar la mascota en la base de datos";
    $_SESSION['icono'] = 'error';
    header('Location: '.$URL.'/clientes/servicios/servicios_clinica.php');
}