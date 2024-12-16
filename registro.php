<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<?php
include "nav.php";
?>
<?php
    include "mensaje.php";
?>
<?php
    include "app/controllers/correo/enviarCorreo.php";
?>
<div class="container">
	<div class="d-flex justify-content-center ">
		<div class="card">
			<div class="card-header">
				<h3>Registrarse</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="bi bi-instagram"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form action="app/controllers_clientes/login/registrarse.php" method="POST" >
                    <div class = "row">
                        <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nombre" class="form-label" style="color: black;">Nombre</label>
                            <input require name = "nombre" type="text" 
                            placeholder="nombre " required
                                        pattern="^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$"
                                        title="Solo letras"
                                        minlength="3"
                                        maxlength="40"
                            class="form-control" id="nombre" style="border-color: #FFC0CB;">
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label" style="color: black;">Apellido</label>
                            <input require name = "apellido" type="text" 
                            placeholder="pellido" required
                                        pattern="^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$"
                                        title="Solo letras"
                                        minlength="3"
                                        maxlength="40"
                            class="form-control" id="apellido" style="border-color: #FFC0CB;">
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label" style="color: black;">Teléfono</label>
                            <input  name = "telefono" type="tel" class="form-control" id="telefono" 
                            placeholder="telefono" 
                            minlength ="10"
                            maxlength = "17"
                            style="border-color: #FFC0CB;">
                        </div>
                        <div class="mb-3">
                            <label for="cedula" class="form-label" style="color: black;">Identificacion</label>
                            <input require name = "cedula" type="text" class="form-control" id="cedula"
                            placeholder="identificacion" 
                            title="Solo Numeros"
                            pattern="[0-9]*"
                            minlength ="7"
                            maxlength = "8" style="border-color: #FFC0CB;">
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="mb-3">
                            <label for="correo" class="form-label" style="color: black;">Correo electrónico</label>
                            <input require name = "email" type="email" class="form-control" id="correo" 
                            placeholder="correo electronico"
                            aria-describedby="emailHelp" style="border-color: #FFC0CB;">
                        </div>
                        <div class="mb-3">
                            <label for="contraseña" class="form-label" style="color: black;">Contraseña</label>
                            <input require name = "contraseña" 
                            placeholder="Contraseña" 
                            minlength="3"
                            maxlength="20"
                            type="password" class="form-control" id="contraseña" style="border-color: #FFC0CB;">
                        </div>
                        <div class="mb-3">
                            <label style = "font-size: 15px; color: black;" for="contraseña" class="form-label" style="color: black;">Verificar Contraseña</label>
                            <input require name = "contraseña_verificacion" type="password" 
                            placeholder="Contraseña de nuevo" 
                            minlength="3"
                            maxlength="20"
                            class="form-control" id="contraseña" style="border-color: #FFC0CB;">
                        </div>
					
					
                        </div>
                        <div  class="form-group">
						<input type="submit" value="Registrar" class="btn float-right login_btn">
					</div>

                    </div>
                
                        
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					¿Ya tienes una cuenta?<a href="login.php">Inicia Sesion Aqui!</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">¿Olvidaste tu contraseña?</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
include "footer.php";
?>


<style>
    @import url('https://fonts.googleapis.com/css?family=Numans');

html,body{
background-image: url('assets/img/fondo.avif');
background-size: cover;
background-repeat: no-repeat;
height: auto;
font-family: 'Numans', sans-serif;

}

.container{
height: auto;
align-content: center;
}

.card{
height: auto;
margin-top: 25px;
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




<?php include "footer.php"; ?>