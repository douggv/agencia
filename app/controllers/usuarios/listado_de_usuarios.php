<?php

    $sql = "SELECT * FROM usuarios ";

    $query = $pdo->prepare($sql);
    $query->execute();
    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
    
    ?>