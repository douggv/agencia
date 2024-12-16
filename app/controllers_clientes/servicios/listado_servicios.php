<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 19/8/2023
 * Time: 12:07
 */

$sql = "SELECT * FROM services";
$query = $pdo->prepare($sql);
$query->execute();
$servicios = $query->fetchAll(PDO::FETCH_ASSOC);