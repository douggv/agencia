<?php
    echo $password = "123";

    
    
    echo password_hash($password, PASSWORD_DEFAULT);
    echo "<br>";
    $hash = '$2y$10$tDCTFwcm';
    if(password_verify($password, $hash)){
        echo "bienvenido";

    } else {
        echo "error";
    }
    
?>
