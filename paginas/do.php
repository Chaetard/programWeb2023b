<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ciclo Do While</title>
</head>
<body style="background-color: black; color: white; font-size: 30px;">
    
<?php 

    $x = 1;
    echo "<h2> Esto se hizo usando el ciclo DO </h2> <br>";

    do{
        echo ("El valor de X es: ". $x . "<br>");
        $x++;
    }
    while($x <= 15);

?>

</body>
</html>