<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea Sesion 3</title>
    <meta http-equiv="refresh" content="1"> <!-- Recargar la página cada segundo -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Bootsrtap para el estilo -->
</head>

<body style="background-color: purple; ">


    <div class="container-fluid text-center" style="color: white; font-size: 20px; ">


        <div class="row">

            <div class="col-4" style="padding-top: 30px;">
                <?php

                $operador1 = 58;
                $operador2 = 42;


                $suma = $operador1 + $operador2;
                echo " <h4>Esto es una suma </h4> " . ($suma) . "<br><br>";
                $resta = $operador1 - $operador2;
                echo " <h4>Esto es una resta </h4> " . ($resta) . "<br><br>";
                $multi = $operador1 * $operador2;
                echo " <h4>Esto es una multiplicacion </h4> " . ($multi) . "<br><br>";
                $divi = $operador1 / $operador2;
                echo " <h4>Esto es una division </h4> " . ($divi) . "<br><br>";

                ?>
            </div>

            <div class="col-4" style="font-size: 22px;">

                <?php

                $minombre = "Jesus";
                echo "<h1> Mi Nombre es: $minombre </h1>";

                echo "Mi nombre tiene " . strlen($minombre) . " caracteres <br>";
                echo "Mi nombre tiene " . str_word_count($minombre) . " Palabra <br>";
                echo "Mi nombre invertido se ve de esta manera: " . strrev($minombre) . "<br>";
                echo "La letra 'e' en mi nombre se encuentra en la posicion: " . strpos("$minombre", "e") + 1; // el + 1 es por que la funcion retorna la posicion dentro del arreglo, desde el punto logico comienza desde cero por eso el + 1
                echo "<br> Remplace mi la letra 'e' de mi nombre por la letra 'i', quedo de esta Manera:  " . str_replace("e", "i", $minombre);


                ?>


            </div>
            <div class="col-4">

                <?php
                //Fecha
                echo "<br> <h2> FECHA </h2>";
                date_default_timezone_set('America/Mexico_City');
                $tiempo_en_segundos = time();
                $fecha_actual = date("d-m-Y h:i:s", $tiempo_en_segundos);
                echo $fecha_actual;
                echo "<h3>Este Codigo lo programo: Jesus Santos </h3>";
                ?>

               

            </div>

        </div>
    </div>
</body>

</html>