<?php
    // Insertamos el código PHP donde nos conectamos a la base de datos 
    require_once "conexion.php";
	
	//Recuperamos los valores de las cajas de texto y de los demás objetos de formulario
    $numero = $_POST["txtcodigo"];
	$nombre = strtoupper(trim($_POST["txtdepartamento"])); //Se convierte a MAYUSCULAS
	
	
	$sql = "SELECT * FROM departamentos WHERE departamento= " . $numero ;
	$result = $conn->query($sql);
    $rows = $result->fetchAll();
	
	if(empty($rows)) // Si detecta VACIO la consulta de busqueda del ID de empleado
	{
	
    // Escribimos la consulta para INSERTAR LOS DATOS EN LA TABLA de empleados (PDO)
	// Concatenando 2 strings armamos la sentencia INSERT INTO ******************
       $sqlINSERT1 = "INSERT INTO departamentos(departamento, descripcion) ";
	    $sqlINSERT2 = $sqlINSERT1 . "VALUES ('$numero', '$nombre')";
    // Ejecutamos la sentencia INSERT de SQL a partir de la conexión usando PDO 
	// mediante la propiedad "EXEC" de la linea de conexión *******************
	
        $conn->exec($sqlINSERT2);
	    $mensaje = "DEPARTAMENTO REGISTRADO SATISFACTORIAMENTE";
	
	} else {
	
	// En caso de que si exista ya capturado ese empleado en la base de datos
	    $mensaje = "Ese Departamento ya existe en la base de datos";
	
		$nombre = "";
		$numero = "";
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Regitro de empleados desde PHP hacia MySQL</title>

<style type="text/css" media="screen">

body { background-color:#999;}

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
	
#imagen1 { position:relative; top:10px; right:-10px; }

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
	
#AddEmpleado{ 
    position: absolute;
    right: 50px;
    border:3px solid #009;
    padding: 10px;
}

</style>

</head>

<body>

<div id="wrapper">

   <div id="caja1">Licenciatura en Tecnologías de la Información</div>
   <div id="caja2">Programación web</div>
   <div id="caja3">Formulario para alta de empleados en la base de datos desde una página web</div>
 
   <div id="caja4">
     <div id="texto1"><br>
      <p></p>
 
        <fieldset style="width: 90%;"    >
            <legend><?php echo $mensaje; ?></legend>
                <div>
                   
                    <br />
                         <b>Número de Departamento	:</b> <?php echo ($numero); ?>
                    <br />
                    <br />
                         <b>Nombre de Departamento	:</b> <?php echo ($nombre); ?>
                    <br />
                    
                    <a href="alta_departamentos.php">REGISTRAR OTRO Departamento	</a>
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