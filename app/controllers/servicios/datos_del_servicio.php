<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 21/8/2023
 * Time: 08:42
*/

$sql = "SELECT * FROM services where id = '$servicio_id' ";
$query = $pdo->prepare($sql);
$query->execute();
$servicios = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($servicios as $servicio){

    $id_servicio = $servicio["id"];
    $nombre = $servicio["nombre"];
    $categoria = $servicio["categoria"];
    $descripcion = $servicio["descripcion"];
    $precio = $servicio["precio"];
    $imagen = $servicio["imagen"];
}