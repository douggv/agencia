<?php

    $sql = "SELECT * FROM auditorias";
    $query = $pdo->prepare($sql);
    $query->execute();
    $auditorias = $query->fetchAll(PDO::FETCH_ASSOC);

?>