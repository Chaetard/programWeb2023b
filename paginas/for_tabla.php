<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablas Genreadas Con el Ciclo For</title>
</head>

<body style="background-color: black; color: white; font-size: 20px;">

    <h3 style="text-align: center;">Jesus Emmanuel Santos Chavez</h3>
    <table border="2" width="70%">

        <?php

        for ($var = 1; $var <= 10; $var++) {
            echo "<tr>";
             echo "<td aling= 'center'>" . $var . "</td>";
             echo "<td aling= 'center'><img src='../imagenes/$var.jpg'</td>";
             echo "</tr>";


        }

        ?>
        </div>


    </table>

</body>

</html>