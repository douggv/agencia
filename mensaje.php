<?php
    session_start();
    if((isset($_SESSION['mensaje2'])) && (isset($_SESSION['icono2']))){
        
        $mensaje = $_SESSION['mensaje2'];
            $icono = $_SESSION['icono2'];
            unset($_SESSION['mensaje2']);
            unset($_SESSION['icono2']);
        ?>
            <script>
                Swal.fire({
                position: "top-center",
                icon: "<?php echo $icono; ?>",
                title: "<?php echo $mensaje; ?>",
                showConfirmButton: false,
                timer: 2500
                });
            </script>
        <?php
        }else {
            
        }
?> 