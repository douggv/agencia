<?php
    echo $password = "1234";

    
    
    echo password_hash($password, PASSWORD_DEFAULT);
    echo "<br>";
    $hash = '$2y$10$pdQz0bAG/85JY9xwRrCMae82gGBkUvWLONYpORgAHjXIlXNrn8FwG';
    if(password_verify($password, $hash)){
        echo "bienvenido";

    } else {
        echo "error";
    }
    
?>
