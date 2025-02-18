<?php
    include "mensaje.php";
    ?>

<?php
if(isset($_SESSION["email"])) {
    $email = $_SESSION["email"]; 

    unset($_SESSION["email"]);
} else {
    header("Location: login.php");
    echo"Error";
}
include "nav.php";
?>

<div  class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" >
                <div class="card-body">
                    <h2 class="text-center" style="color: black;">Recuperar contraseña</h2>
                    <form class="text-center" action="app/controllers_clientes/login/cambio_contraseña.php" method="POST">
                    <div class="mb-3">
                            <label for="contraseña" class="form-label" style="color: black;">Contraseña</label>
                            <input require name = "contraseña" 
                            placeholder="Ingresa la Contraseña" 
                            minlength="3"
                            maxlength="20"
                            type="password" class="form-control" id="contraseña" style="border-color: #FFC0CB;">
                        </div>
                        <div class="mb-3">
                            <label for="contraseña" class="form-label" style="color: black;">Confirmar Contraseña</label>
                            <input require name = "contraseña_verificacion" type="password" 
                            placeholder="Ingresa la Contraseña de nuevo" 
                            minlength="3"
                            maxlength="20"
                            class="form-control" id="contraseña" style="border-color: #FFC0CB;">
                        </div>                        
                        <input hidden type="text" name="email" value="<?php echo $email; ?>">
                        <button type="submit" class="btn btn-primary" >Verificar Códico</button>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css?family=Numans');

html,body{
background-image: url('assets/img/fondo.avif');
background-size: cover;
background-repeat: no-repeat;
height: 100%;
font-family: 'Numans', sans-serif;

}

.container{
height: 100%;
align-content: center;
}

.card{
height: 370px;
margin-top: auto;
margin-bottom: auto;
width: 400px;
background-color: rgba(0,0,0,0.5) !important;
}

.social_icon span{
font-size: 60px;
margin-left: 10px;
color: #FFC312;
}

.social_icon span:hover{
color: white;
cursor: pointer;
}

.card-header h3{
color: white;
}

.social_icon{
position: absolute;
right: 20px;
top: -45px;
}

.input-group-prepend span{
width: 50px;
background-color: #FFC312;
color: black;
border:0 !important;
}

input:focus{
outline: 0 0 0 0  !important;
box-shadow: 0 0 0 0 !important;

}

.remember{
color: white;
}

.remember input
{
width: 20px;
height: 20px;
margin-left: 15px;
margin-right: 5px;
}

.login_btn{
color: black;
background-color: #FFC312;
width: 100px;
}

.login_btn:hover{
color: black;
background-color: white;
}

.links{
color: white;
}

.links a{
margin-left: 4px;

}
a{
    text-decoration: none;
    color: #FFC312;
}
</style>


<?php
include "footer.php";
?>