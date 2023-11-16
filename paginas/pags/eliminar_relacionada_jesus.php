<?php
    require_once "conexion.php";
	$id_abono= $_GET["id"];
	$id_abono = trim($id_abono);
	
	if($id_abono == ""){
		header("location: reporte_para_editar_relacionada_jesus.php");
		exit();
	}

	if(is_null($id_abono)){
		header("location: reporte_para_editar_relacionada_jesus.php");
		exit();
	}

    $sql3 = 'SELECT A.id_abono, A.id_factura, A.fecha_abono, A.monto_abono, A.metodo_pago, F.nombre_empresa FROM abonos A INNER JOIN facturas F ON A.id_factura = F.id_factura where A.id_abono = ' . $id_abono . '';
    $result = $conn->query($sql3);
    $rows = $result->fetchAll();
	$sqlBorrar = "DELETE From abonos WHERE id_abono = '$id_abono' ";
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
                <th>Id Abono</th>
                <th>Empresa</th>
				<th>Fecha del Abono</th>
				<th>Monto Abonado</th>
				<th>Metodo de Pago</th>
                
            </tr>
        </thead>
        <tbody>
        
        <?php
            foreach ($rows as $row) {
			//Imprimimos en la página EL UNICO REGISTRO de MySQL en un renglon de HTML
        ?>
            <tr>
                <td><?php echo $row['id_abono']; ?></td>
               
                <td><?php echo $row['nombre_empresa']; ?></td>
                
				<td><?php echo $row['fecha_abono']; ?></td>
				<td><?php echo $row['monto_abono']; ?></td>
				<td><?php echo $row['metodo_pago']; ?></td>
            </tr>
        <?php } ?>
        <tr>
		
            <td colspan="6">&nbsp;</td>

        </tr>
        <tr>
       
    		<td><a href="reporte_para_editar_relacionada_jesus.php">
				        <<< --- Regresar al reporte completo (Para eliminar mas registros)
                </a>
            </td>
    		
    		 <th><a href="alta_abonos_jesus.php">Agregar otra Abonos</a></th>
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