<?php
//Inicializamos el uso de las sesiones ****
session_start();
// Quitamos todas las variables de sesiones
// $_SESSION["validado"] = "";
// session_unset();

// // Eliminamos la sesion *******************
// session_destroy();


if ($_SESSION["validado"] == "true") {
	header("Location: paginas/menu.php");
	exit;

}



?>
<!doctype html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Validación de usuarios con PHP y MySQL</title>
	<link rel="stylesheet" href="css/loginStyle.css">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">



</head>

<body class="bg-dark">
	<!-- <div id="wrapper">
   <div id="caja1">Licenciatura en Tecnologías de la Información</div>
   <div id="caja2">Programación web</div>
   <div id="caja3">Formulario validación de usuarios</div>
   <div id="caja4">
	 <div id="texto1"><br>
		<fieldset style="width: 95%; font-weight: bold;"    >
			<legend>INGRESO AL SISTEMA</legend>
		  <form action="paginas/validacion.php" method="post" id="formulario1" onSubmit="return ValidaFormulario()">
				<div>
					<br /> 
						 Usuario: 
						 <input type="text" name="txtusuario" id="txtusuario" size="30">
					<br />
					<br />
						 Password: 
					<input type="password" name="txtpassword" id="txtpassword" size="28">
					<br />
					<br />
					<input type="submit" name="btn_aceptar" id="btn_aceptar" value="      Aceptar     " />
					<br />
				</div>
				<br />
				<br />
			</form>
		</fieldset> 
	 </div>
  </div>
</div> -->
	<h1 style="color:white;" class="text-center">Iniciar Sesion</h1>


	<div class="logContainer ">




		<form action="validacion.php" method="post" onSubmit="return ValidaFormulario()">
			<div class="imgcontainer">
				<img src="https://cdn2.iconfinder.com/data/icons/audio-16/96/user_avatar_profile_login_button_account_member-512.png"
					alt="Avatar" class="avatar">
			</div>

			<div class="container">
				<label for="uname"><b>Usuario</b></label>
				<input type="text" placeholder="Ingresa el Usuario" name="txtusuario" id="txtusuario">

				<label for="psw"><b>Contraseña</b></label>
				<input type="password" placeholder="Ingresa la Contraseña" name="txtpassword" id="txtpassword">

				<button type="submit">Login</button>
				<label>
					<input type="checkbox" checked="checked" name="remember"> Recuerdame
				</label>
			</div>

			<div class="container" style="background-color:#f1f1f1">
				<button type="button" class="cancelbtn btn btn-danger">Cancelar</button>
				<span class="psw">Olvidaste tu <a href="#">contraseña?</a></span>
			</div>
		</form>
	</div>
	<script>


		var valor = document.getElementById("txtusuario");

		valor.addEventListener("keypress", function (event) {
			document.getElementById("txtusuario").style.background = 'white';

		});

		var valorC = document.getElementById("txtpassword");

		valorC.addEventListener("keypress", function (event) {
			document.getElementById("txtpassword").style.background = 'white';

		});



		function ValidaFormulario() {
			//Recuperamos lo escrito en la caja del usuario:
			var valorUsuario = document.getElementById("txtusuario").value;

			//Recuperamos lo escrito en la caja del password:
			var valorClave = document.getElementById("txtpassword").value;

			//VALIDACIONES *****************************************************************
			//Caja de Texto ****************************************************************
			if (valorUsuario == null || valorUsuario.length == 0 || /^\s+$/.test(valorUsuario)) {
				alert("Debes escribir el usuario");
				document.getElementById("txtusuario").style.background = 'pink';
				document.getElementById("txtusuario").focus();
				return false;
			} else if (valorClave == null || valorClave.length == 0 || ! /^([0-9])*$/.test(valorClave)) {
				alert("Debes escribir la contraseña con solo NUMEROS");
				document.getElementById("txtpassword").value = "";
				document.getElementById("txtpassword").style.background = 'pink';
				document.getElementById("txtpassword").focus();
				return false;
			} //Cuando ya están contestadas todas las cajas de texto y seleccionados los combobox enviamos el form
			return true;
		}
		//-->
	</script>
</body>

</html>