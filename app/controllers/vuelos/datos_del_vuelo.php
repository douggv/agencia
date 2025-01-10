<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 21/8/2023
 * Time: 08:42
*/

$sql = "SELECT * FROM vuelos where id = '$vuelo_id' ";
$query = $pdo->prepare($sql);
$query->execute();
$vuelos = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($vuelos as $vuelo){

    $id_vuelo = $vuelo["id"];
    $nombre = $vuelo["nombre"];
    $tipo = $vuelo["tipo"];
    $descripcion = $vuelo["descripcion"];
    $precio = $vuelo["precio"];
    $imagen = $vuelo["imagen"];
    $fecha_salida = $vuelo["fecha_salida"];
    $fecha_regreso = $vuelo["fecha_regreso"];
    $aerolinea = $vuelo["aerolinea"];
    $origen = $vuelo["origen"];
    $destino = $vuelo["destino"];
    $puestos_totales = $vuelo["puestos_totales"];
    $puestos_vendidos = $vuelo["puestos_vendidos"];

}