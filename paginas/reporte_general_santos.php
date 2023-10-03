<?php
    //Insertamos el código PHP donde nos conectamos a la base de datos *******************************
    require_once "conexion.php";
    $result;
    // Escribimos la consulta para recuperar los registros de la tabla de MySQL
    $sql = 'SELECT * FROM facturas' ;

    // Ejecutamos la consulta y asignamos el resultado a la variable llamada $result
    $result = $conn->query($sql);
      
    // Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
    $rows = $result->fetchAll();
	
	// Los valores que tendrá la variable $rows se organizan en un arreglo asociativo
	// (Variable con varias valores)
	// y se usará un ciclo foreach para recuper los valores uno a uno de ese arreglo
    // El resultado se mostrará en una tabla HTML ***************************************************
 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Reporte General</title>
</head>
<body>
    <h2>Reporte de la tabla de MySQL en tabla de HTML</h2>
    <div align="center">
    <table border="1" width="90%">
        <thead>
            <tr>
                <th>ID Factura</th>
                <th>Nombre de la Empresa</th>
                <th>Lugar de Emision</th>
                <th>Fecha de Emision</th>
                <th>Fecha de Vencimiento</th>
                <th>Monto Total</th>
                <!-- <th>Fecha Abono</th>
                <th>Monto Abonado</th>
                <th>Metodo de Pago</th> -->
            </tr>
        </thead>
        <tbody>
        
        <?php
            foreach ($rows as $row) {
			//Imprimimos en la página un renglon de tabla HTML por cada registro de tabla de MySQL
        ?>
            <tr>
                <td><?php echo $row['id_factura']; ?></td>
                <!-- Creamos una celda con un enlace HTML que apunta a otro archivo PHP -->
                <td>
                
                    <a href="detalle_empleado.php?id=<?php echo $row['id_factura']; ?>">
				        <?php echo $row['nombre_empresa']; ?>
                    </a>
                    
                </td>
                
                <td><?php echo $row['lugar_emision']; ?></td>
                <td><?php echo $row['fecha_emision']; ?></td>
                <td><?php echo $row['fecha_vencimiento']; ?></td>
                <td><?php echo $row['monto_total']; ?></td>
               
            </tr>
        <?php } ?>
        
        </tbody>
    </table>
    <h3>Jesus Emmanuel Santos Chavez</h3>
    </div>
    
     <?php
			//Cerramos la oonexion a la base de datos **********************************************
			$conn = null;
     ?>
        
</body>
</html>




