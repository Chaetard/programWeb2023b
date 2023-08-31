<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sentencia Switch</title>
</head>
<body style="background-color: black; color: white; font-size: 30px;">

<?php 

    $contenedor = "noche";
    switch ($contenedor){
        case "dia":
            echo "<h1> Buenos Dias (en minuscula) !!! </h1>";
            break;
        case "DIA":
            echo "<h1> Buenos Dias (en Mayuscula) !!! </h1>";
            break;
        case "tarde":
            echo "<h1> Buenas Tardes !!! </h1>";
            break;
        case "noche":
            echo "<h1> Buenas Noches !!! </h1>";
            break;
        default: 
        echo "<h1> No te quiero Saludar </h1>";
        break;
        }

?>
    
</body>
</html>