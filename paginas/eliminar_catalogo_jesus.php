<?php
    require_once "conexion.php";
	$id_factura= $_GET["id"];
	$id_factura = trim($id_factura);
	
	if($id_factura == ""){
		header("location: reporte_para_editar_catalogo_jesus.php");
		exit();
	}

	if(is_null($id_factura)){
		header("location: reporte_para_editar_catalogo_jesus.php");
		exit();
	}

    $sql3 = "SELECT * FROM facturas where id_factura= '$id_factura'";
    $result = $conn->query($sql3);
    $rows = $result->fetchAll();
	$sqlBorrar = "DELETE From facturas WHERE id_factura = '$id_factura' ";
    $conn->exec($sqlBorrar);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Regitro de registros a eliminar</title>

<style type="text/css" media="screen">

body { background-color:#999;}

#wrapper {
	margin: auto;
	width: 960px;
	height:auto;
	background-color: #CCC;
	}
	
#caja1 {
	width: 300px;
	height: 60px;
	margin-left: 10px;
	margin-right: 10px;
	margin-top: 10px;
	background-color: #FFC;
	float: left;
}

#caja2 {
	width: 300px;
	height: 60px;
	margin-left: 10px;
	margin-right: 10px;
	margin-top: 10px;
	background-color: #FFC;
	float: left;
}

#caja3 {
	width: 300px;
	height: 60px;
	margin-left: 10px;
	margin-right: 10px;
	margin-top: 10px;
	background-color: #FFC;
	float: left;
}

#caja4 {
	width: 940px;
	height:400px;
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
	
#imagen1 { position:relative; top:10px; right:-10px; }

#texto1 {
	width: 900px;
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
   <div id="caja3">Datos de la Factura que se han eliminado satisfactoriamente</div>
 
   <div id="caja4">
     <div id="texto1"><br>
 
     <h2>Registro satisfactoriamente eliminado</h2>
 
        <table border="1" width="100%">
        <thead>
            <tr>
                <th>Nombre Empresa</th>
                <th>Monto Total</th>
				<th>Fecha de Emision</th>
				<th>Id Factura</th>
				<th>estado_pago</th>
                
            </tr>
        </thead>
        <tbody>
        
        <?php
            foreach ($rows as $row) {
			//Imprimimos en la página EL UNICO REGISTRO de MySQL en un renglon de HTML
        ?>
            <tr>
                <td><?php echo $row['nombre_empresa']; ?></td>
               
                <td><?php echo $row['monto_total']; ?></td>
                
				<td><?php echo $row['fecha_emision']; ?></td>
				<td><?php echo $row['id_factura']; ?></td>
				<td><?php echo $row['estado_pago']; ?></td>
            </tr>
        <?php } ?>
        <tr>
		
            <td colspan="6">&nbsp;</td>

        </tr>
        <tr>
       
    		<td><a href="reporte_para_editar_catalogo_jesus.php">
				        <<< --- Regresar al reporte completo (Para eliminar mas registros)
                </a>
            </td>
    		
    		 <th><a href="alta_factura_jesus.php">Agregar otra Factura</a></th>
        </tr>
        </tbody>
    </table>
     </div>
  </div>
</div>
     <?php
			//Cerramos la oonexion a la base de datos **********************************************
			$conn = null;
     ?>
</body>
</html>