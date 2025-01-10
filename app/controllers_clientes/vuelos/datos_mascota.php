<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 21/8/2023
 * Time: 08:42
*/

$sql = "SELECT * FROM mascotas where usuario_id = '$id_usuario_sesion' ";
$query = $pdo->prepare($sql);
$query->execute();
$servicios = $query->fetchAll(PDO::FETCH_ASSOC);

