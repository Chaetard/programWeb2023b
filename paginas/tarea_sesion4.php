<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica web dinámica de la sesión 4</title>

    <style>
        .text {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>

</head>

<body style="display: flex; justify-content: center; background-color: gray;">

    <div style="width: 80%; background-color: white; color:black; text-align: center; border-radius: 20px;">
        <h1 class="text">Practica web de la sesion 4</h1>
        <?php

        echo '<table border="1" width="100%">';
        echo '<tr style="background-color: blue; color:white;">';
        echo '<th >Numero</th>';
        echo '<th>Numero al Cuadrado</th>';
        echo '<th>Es Par ?</th>';
        echo '</tr>';
        $numero = 1;
        while ($numero <= 200) {
            echo '<tr>';




            if ($numero % 2 == 0) {
                echo '<td style="background-color:rgba(225, 92, 160, 0.15);">' . $numero . '</td>';
                echo '<td style="background-color:rgba(225, 92, 160, 0.15);">' . ($numero * $numero) . '</td>';
                echo '<td style="background-color:rgba(225, 92, 160, 0.15);">Es Par</td>';

            } else {
                echo '<td>' . $numero . '</td>';
                echo '<td>' . ($numero * $numero) . '</td>';
                echo '<td>Es Non</td>';
            }
            echo '</tr>';
            $numero++;
        }
        echo '</table>';


        ?>
        <h1 class="text">Esta Pagina Fue desarrollada por Jesus Santos</h1>

        <a href="" class="text" target="_blank" style="font-size: 30px;"> Repositorio</a>
    </div>
</body>

</html>