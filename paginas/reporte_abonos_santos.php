<?php
    //Insertamos el código PHP donde nos conectamos a la base de datos *******************************
    require_once "conexion.php";
    $result;
    // Escribimos la consulta para recuperar los registros de la tabla de MySQL
    $sql = 'SELECT * FROM abonos' ;

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
<title>Reporte de PHP conectado a MySQL</title>
</head>
<body>
    <h2>Reporte de la tabla de MySQL en tabla de HTML</h2>
    <div align="center">
    <table border="1" width="90%">
        <thead>
            <tr>
                <th>ID Abono</th>
                <th>ID Factura</th>
                <th>Fecha del Abono</th>
                <th>Monto del Abono</th>
                <th>Metodo de Pago</th>
               
            </tr>
        </thead>
        <tbody>
        
        <?php
            foreach ($rows as $row) {
			//Imprimimos en la página un renglon de tabla HTML por cada registro de tabla de MySQL
        ?>
            <tr>
                <td><?php echo $row['id_abono']; ?></td>
                <!-- Creamos una celda con un enlace HTML que apunta a otro archivo PHP -->
                <td>
                
                    <a href="detalle_registro.php?id=<?php echo $row['id_abono']; ?>">
				        <?php echo $row['id_factura']; ?>
                    </a>
                    
                </td>
                
                <td><?php echo $row['fecha_abono']; ?></td>
                <td><?php echo $row['monto_abono']; ?></td>
                <td><?php echo $row['metodo_pago']; ?></td>
                
               
            </tr>
        <?php } ?>
        
        </tbody>
    </table>
    <h3>Jesus Emmanuel Santos Chavez</h3>
            
            
        <h3> <a href="alta_abono_jesus.php"> Ingresar otro Abono </a> </h3>  
    </div>
    
     <?php
			//Cerramos la oonexion a la base de datos **********************************************
			$conn = null;
     ?>
        
</body>
</html>

