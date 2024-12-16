<?php
    if((isset($_SESSION['mensaje'])) && (isset($_SESSION['icono']))){
        $mensaje = $_SESSION['mensaje'];
            $icono = $_SESSION['icono'];
            unset($_SESSION['mensaje']);
            unset($_SESSION['icono']);
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
        }
?>