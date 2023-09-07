<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistencia</title>


    <?php


    function miTabla($renglones)
    {
        echo "<table border='1' width=60%'style='text-aling:center;'> ";


        for ($i = 1; $i <= $renglones; $i++) {
            echo "<tr>";
            echo "<td> Renglon " . $i . "</td>";
            echo "</tr>";
        }
        echo "</table>";

    }

    ?>
</head>

<body style="text-align: center;">

    <h1>Asistencia</h1>

    <div style="display: flex; justify-content: center; text-align: center;">
        <?php

        miTabla(5);

        ?>
    </div>

    <?php
    //Fecha
    echo "<br> <h2> FECHA </h2>";
    date_default_timezone_set('America/Mexico_City');
    $tiempo_en_segundos = time();
    $fecha_actual = date("d-m-Y h:i:s", $tiempo_en_segundos);
    echo $fecha_actual;
    echo "<h3>Este Codigo lo programo: Jesus Santos </h3>";

    ?>
</body>

</html>