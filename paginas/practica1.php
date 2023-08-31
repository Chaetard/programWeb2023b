<!DOCTYPE html>

<html lang="es">
<body>

<?php
echo "My first PHP script!";


// PHP Puede imprimir etiquetas de HTML
# Este es otra forma de agregar comentarios


echo "<br>";
echo "Mi Nombre: Jesus Emmanuel Santos Chavez";

//Variables en PHP

echo "<br>";
$variable1 = "Valor de la variable";
echo $variable1;

echo "<br><br>";

// Operadores Matematicos Basicos

$valor1 = 100;
$valor2 = 220;

//SUMA
$suma =($valor1 + $valor2);
echo "<h2>SUMA</h2>";
echo "<br>";
echo "La suma  es: $suma";
echo "<br>";

//RESTA
$resta =($valor2 - $valor1);
echo "<h2>RESTA</h2>";
echo "<br>";
echo "La resta  es: $resta";
echo "<br>";

//MULTIPLICACION
$multip =($valor1 * $valor2);
echo "<h2>MULTIPLICACION</h2>";
echo "<br>";
echo "La multiplicacion  es: $multip";
echo "<br>" ;

//DIVISION
$divi =($valor2 / $valor1);
echo "<h2>DIVISION</h2>";
echo "<br>";
echo "La division  es: $divi";
echo "<br>" ;

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