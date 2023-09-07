<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones con 2 parametros en PHP</title>

    <?php 
    
        function SaludoPersonalizado($param1, $param2)
        {
        
            if($param1 >= 1 && $param1 <= 11){
                echo "-- Buenos dias " . $param2 . "<br> <br>";
            }else {
                echo "-- tus valores estan fuera del parametro <br><br>";

            }
        }
    
    ?>


</head>
<body>

<h1>Esto se ve en Pantalla</h1>
    <?php
    
    SaludoPersonalizado(10, "Batman");
    SaludoPersonalizado(12, "Goku");
    SaludoPersonalizado(1, "Programador de PHP");
    
    ?>
</body>
</html>