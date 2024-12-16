<?php

$sql = "SELECT * FROM reservas where estado = 'aceptado' ";
$query = $pdo->prepare($sql);
$query->execute();
$reservas = $query->fetchAll(PDO::FETCH_ASSOC);

?>


