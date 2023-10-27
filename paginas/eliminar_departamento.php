<?php
    // Insertamos el código PHP donde nos conectamos a la base de datos *******************************
    require_once "conexion.php";
	$idDepartamento= $_GET["id"];
	$idDepartamento = trim($idDepartamento);
	
	if($idDepartamento == ""){
		header("location: reporte_elimina_departamentos.php");
		exit();
	}

	if(is_null($idDepartamento)){
		header("location: reporte_elimina_departamentos.php");
		exit();
	}
	
	//
    $sql3 = "SELECT * FROM departamentos where departamento= '$idDepartamento'";
    $result = $conn->query($sql3);
    $rows = $result->fetchAll();
	$sqlBorrar = "DELETE From departamentos WHERE departamento = '$idDepartamento' ";
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
   <div id="caja3">Datos del departamento que se han eliminado satisfactoriamente</div>
 
   <div id="caja4">
     <div id="texto1"><br>
 
     <h2>Registro satisfactoriamente eliminado</h2>
 
        <table border="1" width="100%">
        <thead>
            <tr>
                <th>Departamento</th>
                <th>Descripcion</th>
                
            </tr>
        </thead>
        <tbody>
        
        <?php
            foreach ($rows as $row) {
			//Imprimimos en la página EL UNICO REGISTRO de MySQL en un renglon de HTML
        ?>
            <tr>
                <td><?php echo $row['departamento']; ?></td>
                <!-- Creamos una celda con un enlace HTML que apunta a otro archivo PHP -->
                <td><?php echo $row['descripcion']; ?></td>
                
            </tr>
        <?php } ?>
        <tr>
		
            <td colspan="6">&nbsp;</td>

        </tr>
        <tr>
       
    		<td><a href="reporte_elimina_departamentos.php">
				        <<< --- Regresar al reporte completo (Para eliminar mas registros)
                </a>
            </td>
    		
    		 <th><a href="alta_departamentos.php">Agregar otro departamento</a></th>
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