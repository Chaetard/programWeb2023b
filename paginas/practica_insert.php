<?php
    // Recuperamos el código PHP donde *** nos conectamos *** a la base de datos 
    require_once "conexion.php";
	
	//Establecemos los valores que serán INSERTADOS en la Tabla de la Base de Datos
    $numero_dpto = "B3";
	$departamento = "Fiestas y Eventos";

    // Escribimos la sentencia para INSERTAR LOS DATOS EN LA TABLA de departamentos (PDO)
	// Concatenando 2 strings armamos la sentencia INSERT INTO ************************
	
    $sqlINSERT1 = "INSERT INTO departamentos(departamento, descripcion) ";
	$sqlINSERT2 = $sqlINSERT1 . "VALUES ('$numero_dpto', '$departamento')";
    
	// Ejecutamos la sentencia INSERT de SQL a partir de la conexión usando PDO 
	// mediante la propiedad "EXEC" de la linea de conexión ***************************
	
    $conn->exec($sqlINSERT2);
		
	$mensaje = "DEPARTAMENTO REGISTRADO SATISFACTORIAMENTE";
	
	//Cerramos la conexion a la base de datos y liberamos recursos en el server *******
	$conn = null;
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Regitro de departamentos desde PHP hacia MySQL</title>
</head>

<body>

<div id="wrapper">

     <fieldset style="width: 97%;">
         <legend><?php echo $mensaje; ?></legend>
             <div>
                <br>
                    <b>Código de Departamento:</b> <?php echo ($numero_dpto); ?>
                <br>
			    <br>
                    <b>Nombre de Departamento:</b> <?php echo ($departamento); ?>
                <br>
			    <br>
                    <a target="_blank" href="http://localhost:8080/phpmyadmin">Revisa este registro en MySQL</a>
				<br>
				<br>
					<?php echo "Se ejecutó la sentencia <b>SQL</b>: $sqlINSERT2"; ?>
             </div>
      </fieldset> 

</div>
</body>
</html>