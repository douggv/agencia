<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 19/8/2023
 * Time: 12:07
 */

$sql = "SELECT * FROM vuelos";
$query = $pdo->prepare($sql);
$query->execute();
$vuelos = $query->fetchAll(PDO::FETCH_ASSOC);