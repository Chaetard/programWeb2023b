<?php
    // Insertamos el código PHP donde nos conectamos a la base de datos *******************************
    require_once "conexion.php";
    $result;
	
	// Recuperamos los valores de los objetos de QUERYSTRING que viene desde la URL mediante GET ******
	$idfactura= $_GET["id"];
	
	// Conversión explicita de CARACTER a ENTERO mediante el forzado de (int), 
	// los valores por GET son tipo STRING ************************************************************
	$idfactura = (int)$idfactura; //*****************************************************************
	
    //Verificamos que SI VENGA EL NUMERO DE factura **************************************************
	if($idfactura == "")
	{
		header("Location: reporte_con_enlaces_pdo.php"); //Este archivo lo tienes que generar //////////
		exit;
	}
	if(is_null($idfactura))
	{
		header("Location: reporte_con_enlaces_pdo.php"); //Este archivo lo tienes que generar //////////
		exit;
	}
	if(!is_int($idfactura))
	{
		header("Location: reporte_con_enlaces_pdo.php"); //Este archivo lo tienes que generar //////////
		exit;
	}
	
    // Escribimos la consulta para recuperar el UNICO REGISTRO de MySQL mediante el ID obtenido por _GET
    $sql2 = 'SELECT f.id_factura, f.nombre_empresa, f.monto_total, f.lugar_emision, f.fecha_vencimiento, f.estado_pago, a.id_abono, a.fecha_abono, a.monto_abono, a.metodo_pago FROM facturas f ';
	$sql3 = $sql2 . 'INNER JOIN abonos a ON f.id_factura = a.id_factura WHERE f.id_factura=' . $idfactura;


    // Ejecutamos la consulta y asignamos el resultado a la variable llamada $result
    $result = $conn->query($sql3);
      
    // Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
    $rows = $result->fetchAll();
    // El resultado se mostrará en la página, en el BODY ***************************************************
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Reporte de PHP conectado a MySQL</title>
</head>
<body>
    <h2>Reporte de detalle del empleado seleccionado</h2>
    <div align="center">
    <table border="1" width="90%">
        <thead>
            <tr>

           
                <th>ID Factura</th>
                <th>Nombre de la Empresa</th>
                <th>Monto Total</th>
                <th>Lugar Emision</th>
                <th>Fecha de fecha_vencimiento</th>
                <th>Estado del Abono</th>
                <th>Id del Abono</th>
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
                <td><?php echo $row['id_factura']; ?></td>
                <td><?php echo $row['nombre_empresa']; ?></td>
                <td><?php echo $row['monto_total']; ?></td>
                <td><?php echo $row['lugar_emision']; ?></td>
                <td><?php echo $row['fecha_vencimiento']; ?></td>
                <td><?php echo $row['estado_pago']; ?></td>
                <td><?php echo $row['id_abono']; ?></td>
                <td><?php echo $row['fecha_abono']; ?></td>
                <td><?php echo $row['monto_abono']; ?></td>
                <td><?php echo $row['metodo_pago']; ?></td>
            </tr>
        <?php } ?>
        <tr>
            <td>&nbsp;</td>
    		<td>&nbsp;</td>
    		<td>&nbsp;</td>
            <td>&nbsp;</td>
    		<td>&nbsp;</td>
    		<td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
    		<td><a href="reporte_con_enlaces_pdo.php">
				        <<< --- Regresar al reporte completo (Maestro)
                </a>
            </td>
    		<td>&nbsp;</td>
            <td>&nbsp;</td>
    		<td>&nbsp;</td>
    		<td>&nbsp;</td>
        </tr>
        </tbody>
    </table>
    </div>
    
     <?php
			//Cerramos la oonexion a la base de datos **********************************************
			$conn = null;
     ?>
      
      <br />
      <br />
      
</body>
</html>