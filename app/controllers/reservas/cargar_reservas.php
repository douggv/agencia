<?php
include ('../../../app/config.php');

$sql = "SELECT title, start, end, color FROM reservas where estado = 'aceptado' ";
$query = $pdo->prepare($sql);
$query->execute();
$reservas = $query->fetchAll(PDO::FETCH_ASSOC);
//print_r ($reservas);

echo json_encode($reservas);