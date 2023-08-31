<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sentencia IF - Ejercicio 2</title>
</head>

<body style="background-color: black; color: white; font-size: 30px;">

    <?php
    $contenedor = strlen("Emmanuel Santos");
    echo "Mi nombre tiene: " . $contenedor . " letras";

    if ($contenedor < 10) {
        $mensaje = "Tu nombre tiene menos de 10 letras";

        echo ("<marquee>" . $mensaje . "</marquee>");
    } else {
        $mensaje = "Tu Nombre tiene mas de 10 Letras UgU";
        echo ("<marquee>" . $mensaje . "</marquee>");

    }
    ?>
</body>

</html>