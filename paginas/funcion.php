<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones con parametros en PHP</title>

    <?php

    function saludo($nombre)
    {
        echo "Buenos dias " . $nombre;
        echo "<br>";
    }
    
    ?>

</head>
<body>
    <h1>Esto se ve en Pantalla</h1>
    <br>

    <?php
    
    saludo("Jesus");
    saludo("BATMAN");
    saludo("SUPERMAN");
    saludo("Programador de PHP");

   ?> 
</body>
</html>