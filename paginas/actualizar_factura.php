<?php
// Insertamos el código PHP donde nos conectamos a la base de datos 
require_once "conexion.php";


$id_factura = $_POST["txt_id_factura_oculto"];
$nombre_empresa = strtoupper(trim($_POST["txt_nombre_empresa"]));
$fecha_emision = $_POST["txt_fecha_emision"];
$lugar_emision = strtoupper(trim($_POST["txt_lugar_emision"]));
$fecha_vencimiento = $_POST["txt_fecha_vencimiento"];
$monto_total = (int) $_POST["txt_monto_total"];
$estado_pago = $_POST["txt_estado_pago"];

echo $estado_pago;





$sqlUPDATE = "UPDATE facturas SET nombre_empresa = '$nombre_empresa', fecha_emision = '$fecha_emision', fecha_vencimiento = '$fecha_vencimiento', lugar_emision = '$lugar_emision', monto_total  = $monto_total, estado_pago = '$estado_pago' WHERE id_factura=$id_factura";

// Ejecutamos la sentencia UPDATE de SQL a partir de la conexión usando PDO 
// mediante la propiedad "EXEC" de la linea de conexión ***************************

$conn->exec($sqlUPDATE);
$mensaje = "Factura Actualizada Correctamente ACTUALIZADO SATISFACTORIAMENTE";
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Actualización de departamentos desde PHP hacia MySQL</title>

	<style type="text/css" media="screen">
		body {
			background-color: #999;
		}

		#wrapper {
			margin: auto;
			width: 960px;
			height: 390px;
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
			height: 300px;
			margin-left: 10px;
			margin-right: 10px;
			margin-top: 40px;
			background-color: #333;
			clear: both;

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
			height: 270px;
			margin-left: 5px;
			margin-right: 10px;
			margin-top: 10px;
			background-color: #CCC;
			padding: 5px;
			float: right;
			right: -10px;
			top: 10px;
		}
	</style>

</head>

<body>

	<div id="wrapper">

		<div id="caja1">Licenciatura en Tecnologías de la Información</div>
		<div id="caja2">Programación web</div>
		<div id="caja3">Formulario para modificar departamentos en la base de datos desde una página web</div>

		<div id="caja4">
			<div id="texto1"><br>
				<p></p>

				<fieldset style="width: 90%;">
					<legend>
						<?php echo ($mensaje); ?>
					</legend>
					<div>
						<br />
						<b>Id de la Factura:</b>
						<?php echo ($id_factura); ?>
						<br />
						<br />
						<b>Nombre de la Empresa:</b>
						<?php echo ($nombre_empresa); ?>
						<br />
						<br />
						<b>Fecha de Emisión:</b>
						<?php echo ($fecha_emision); ?>
						<br />
						<br />
						<b>Fecha de Vencimiento:</b>
						<?php echo ($fecha_vencimiento); ?>
						<br />
						<br />

						<b>Lugar de Emisión:</b>
						<?php echo ($lugar_emision); ?>
						<br />
						<br />
						<b>Monto Total:</b>
						<?php echo ($monto_total); ?>
						<br />
						<br />
						<b>Estado de Pago:</b>
						<?php echo ($estado_pago); ?>
						<br />
						<br />
						<a href="reporte_para_editar_catalogo_jesus.php">REGRESAR AL REPORTE DE FACTURAS</a>
						<br />

						<a href="alta_factura_jesus.php">REGISTRAR OTRA FACTURA</a>
						<br />
						
					</div>
				</fieldset>
			</div>
		</div>
	</div>
	<?php
	//Cerramos la conexion a la base de datos *************************************
	$conn = null;
	?>
</body>

</html>