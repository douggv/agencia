<?php


include '../../config.php';
include '../../../admin/layout/validacion.php';

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $tipo = $_POST['tipo'];
    $precio = $_POST['precio'];
    $origen = $_POST['origen'];
    $destino = $_POST['destino'];
    $fecha_salida = $_POST['fecha_salida'];
    $fecha_regreso = $_POST['fecha_regreso'];
    $aerolinea = $_POST['aerolinea'];   
    $puestos_totales = $_POST['puestos_totales'];
    $puestos_vendidos = $_POST['puestos_vendidos'];
    $vuelo_id = $_POST['vuelo_id'];    
    $imagen = $_POST['imagen'];
if($_FILES['file']['name'] != null){
    //echo "hay imagen nueva";
    $nombreDelArchivo = date('Y-m-d-h-i-s').$_FILES['file']['name'];
    $location = "../../../public/images/vuelos/".$nombreDelArchivo;
    move_uploaded_file($_FILES['file']['tmp_name'],$location);
    $imagen = $nombreDelArchivo;
}else{
    //echo "no hay imagen";
    $imagen = $imagen;
};


$sentencia = $pdo->prepare("UPDATE vuelos 
SET 
    nombre=:nombre,
    descripcion=:descripcion,
    tipo=:tipo,
    precio=:precio,
    origen=:origen,
    destino=:destino,
    fecha_salida=:fecha_salida,
    fecha_regreso=:fecha_regreso,
    aerolinea=:aerolinea,
    imagen=:imagen,
    puestos_totales=:puestos_totales,
    puestos_vendidos=:puestos_vendidos

WHERE id = :vuelo_id");


$sentencia->bindParam(':nombre', $nombre);
$sentencia->bindParam(':descripcion', $descripcion);
$sentencia->bindParam(':tipo', $tipo);
$sentencia->bindParam(':precio', $precio);
$sentencia->bindParam(':origen', $origen);
$sentencia->bindParam(':destino', $destino);
$sentencia->bindParam(':fecha_salida', $fecha_salida);
$sentencia->bindParam(':fecha_regreso', $fecha_regreso);
$sentencia->bindParam(':aerolinea', $aerolinea);
$sentencia->bindParam(':imagen', $imagen);
$sentencia->bindParam(':puestos_totales', $puestos_totales);
$sentencia->bindParam(':puestos_vendidos', $puestos_vendidos);
$sentencia->bindParam(':vuelo_id', $vuelo_id);


if($sentencia->execute()){
    echo "Se actualizó el servicio de la manera correcta";
    
    $mensaje = "Se ha actualizado el vuelo de la manera correcta. actualizó el vuelo de: ".$nombre." de la manera correcta por: ".$nombre_usuario_sesion;
    $sql = "INSERT INTO auditorias (mensaje) VALUES (?)";
    $query = $pdo->prepare($sql);
    $query->bindParam(1, $mensaje, PDO::PARAM_STR);

    
    $query->execute();
    session_start();
    $_SESSION['mensaje'] = "Se actualizó el vuelo de la manera correcta";
    $_SESSION['icono'] = 'success';
    header('Location: '.$URL.'/admin/vuelos/');
}else{
    session_start();
    $_SESSION['mensaje'] = "No se pudo actualizar el vuelo de la manera correcta";
    $_SESSION['icono'] = 'error';
    header('Location: '.$URL.'/admin/vuelos/update.php?id='.$id_vuelo);
}

