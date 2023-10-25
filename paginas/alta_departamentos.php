<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Regitro de departamentos desde PHP hacia MySQL</title>

	<style type="text/css" media="screen">
		body {
			background-color: #999;
		}

		#wrapper {
			margin: auto;
			width: 960px;
			height: 550px;
			background-color: #CCC;
		}

		#caja1 {
			width: 300px;
			height: 50px;
			margin-left: 10px;
			margin-right: 10px;
			margin-top: 10px;
			background-color: #FFC;
			float: left;
		}

		#caja2 {
			width: 300px;
			height: 50px;
			margin-left: 10px;
			margin-right: 10px;
			margin-top: 10px;
			background-color: #FFC;
			float: left;
		}

		#caja3 {
			width: 300px;
			height: 50px;
			margin-left: 10px;
			margin-right: 10px;
			margin-top: 10px;
			background-color: #FFC;
			float: left;
		}

		#caja4 {
			width: 940px;
			height: 450px;
			margin-left: 10px;
			margin-right: 10px;
			margin-top: 40px;
			background-color: #333;
			clear: both;
			/*
		 position:absolute; 
		 top:200px;
		 */

			position: relative;
			top: 10px;
		}

		#imagen1 {
			position: relative;
			top: 10px;
			right: -10px;
		}

		#texto1 {
			width: 500px;
			height: 400px;
			margin-left: 5px;
			margin-right: 10px;
			margin-top: 10px;
			background-color: #CCC;
			padding: 5px;
			float: right;
			right: -10px;
			top: 10px;
		}

		#AddEmpleado {
			position: absolute;
			right: 50px;
			border: 3px solid #009;
			padding: 10px;
		}
	</style>

	<script language="javascript">

		function ValidaFormulario() {

			//Recuperamos lo escrito en la caja del número de departamento:
			var valorNumero = document.getElementById("txtcodigo").value;
			//Recuperamos lo escrito en la caja del nombre del departamento:
			var valorNombre = document.getElementById("txtdepartamento").value;



			if (valorNumero == null || valorNumero.length == 0 || /^\s+$/.test(valorNumero)) {
				alert("Debes escribir el número del departamento usando solo números enteros");
				document.getElementById("txtcodigo").value = "";
				document.getElementById("txtcodigo").focus();
				return false;
			} else if (valorNombre == null || valorNombre.length == 0 || /^\s+$/.test(valorNombre)) {
				alert("Debes escribir el nombre del departamento");
				document.getElementById("txtdepartamento").focus();
				return false;
			}
			return true;
		}
		//-->
	</script>

</head>

<body>

	<div id="wrapper">

		<div id="caja1">Licenciatura en Tecnologías de la Información</div>
		<div id="caja2">Programación web</div>
		<div id="caja3">Formulario para alta de empleados en la base de datos desde una página web</div>

		<div id="caja4">
			<div id="texto1"><br>
				<p>

				</p>

				<fieldset style="width: 90%; font-weight: bold;">
					<legend>REGISTRAR UN NUEVO DEPARTAMENTO</legend>



					<form action="grabar_departamento.php" method="post" id="formulario1"
						onsubmit="return ValidaFormulario()">
						<div>


							<br />
							Número de departamento:
							<input type="text" name="txtcodigo" id="txtcodigo" maxlength="2">
							<br />
							<br />
							Nombre del departamento:
							<input type="text" name="txtdepartamento" id="txtdepartamento" maxlength="50">

							<br /><br /><br />


							<input type="submit" name="AddDepartamento" id="AddDepartamento"
								value="  Registrar este Departamento " />
							<br />
						</div>
					</form>
				</fieldset>
			</div>
		</div>
	</div>
	<?php
	//Cerramos la oonexion a la base de datos **********************************************
	$conn = null;
	?>
</body>

</html>