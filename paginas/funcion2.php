<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcion con 2 Parametros en PHP</title>

    <?php 
    
    function suma($num1, $num2)
    {

        if($num1 == ""){
            $num1 = 0;
        }
        if($num2 == ""){
            $num2 = 0;
        }

        $resultado = $num1 + $num2;
        echo "El resultado de la suma es: " . $resultado;
        echo "<br>";
    }
    
    ?>
</head>
<body>
    
<h1>Esto se ve en Pantalla</h1>


    <?php 
    
    suma(5, 10);
    suma(10, 10);
    suma(10, 20);

    ?>
    



</body>
</html>