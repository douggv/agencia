<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 21/8/2023
 * Time: 08:42
*/

$sql = "SELECT * FROM servicios where servicio_id = '$id_servicio' ";
$query = $pdo->prepare($sql);
$query->execute();
$servicios = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($servicios as $servicio){

    $servicio_id = $servicio['servicio_id'];
    $codigo = $servicio['codigo'];
    $nombre = $servicio['nombre'];
    $descripcion = $servicio['descripcion'];
    $precio = $servicio['precio'];
    $imagen = $servicio['imagen'];
    $lugar = $servicio['lugar'];
    $id_usuario = $servicio['id_usuario'];

}