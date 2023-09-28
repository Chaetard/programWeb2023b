<?php
require_once "conexion.php";

$sql = "SELECT * FROM empleados";
$result = $conn->query($sql);

$rows = $result->fetchAll();


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de PHP Conectado a MySQL</title>
</head>

<body>
    <h2>Reporte de la tabla de MySQL en la tabla de HTML</h2>

    <div align="left">

        <?php
    
        foreach ($rows as $row) {
            echo $row["numero"] . " --- " . $row["nombre"] . " --- ".$row["salario"] . "<br>" ;
            // . $row["salario"] . "<br>"

        }

        ?>
    </div>

    <?php

    $conn = null;

    ?>
</body>

</html>