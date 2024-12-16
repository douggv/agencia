<?php


include '../../config.php';
include '../../../admin/layout/validacion.php';

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $categoria = $_POST["categoria"];
    $imagen = $_POST['imagen'];
    $servicio_id = $_POST['servicio_id'];
if($_FILES['file']['name'] != null){
    //echo "hay imagen nueva";
    $nombreDelArchivo = date('Y-m-d-h-i-s').$_FILES['file']['name'];
    $location = "../../../public/images/servicios/".$nombreDelArchivo;
    move_uploaded_file($_FILES['file']['tmp_name'],$location);
    $imagen = $nombreDelArchivo;
}else{
    //echo "no hay imagen";
    $imagen = $imagen;
};


$sentencia = $pdo->prepare("UPDATE services 
SET 
    nombre=:nombre,
    descripcion=:descripcion,
    imagen=:imagen,
    precio=:precio,
    categoria=:categoria
WHERE id = :servicio_id");
$sentencia->bindParam('nombre',$nombre);
$sentencia->bindParam('descripcion',$descripcion);
$sentencia->bindParam("imagen",$imagen);
$sentencia->bindParam('precio',$precio);
$sentencia->bindParam('categoria',$categoria);
$sentencia->bindParam('servicio_id',$servicio_id);

if($sentencia->execute()){
    echo "Se actualizó el servicio de la manera correcta";
    
    $mensaje = "Se actualizó el servicio de: ".$nombre." de la manera correcta por: ".$nombre_usuario_sesion;
    $sql = "INSERT INTO auditorias (mensaje) VALUES (?)";
    $query = $pdo->prepare($sql);
    $query->bindParam(1, $mensaje, PDO::PARAM_STR);

    
    $query->execute();
    session_start();
    $_SESSION['mensaje'] = "Se actualizó el servicio de la manera correcta";
    $_SESSION['icono'] = 'success';
    header('Location: '.$URL.'/admin/servicios/');
}else{
    session_start();
    $_SESSION['mensaje'] = "No se pudo actualizar al producto";
    $_SESSION['icono'] = 'error';
    header('Location: '.$URL.'/admin/servicios/update.php?id_producto='.$id_producto);
}

