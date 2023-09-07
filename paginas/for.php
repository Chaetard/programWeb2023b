<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ciclo For</title>
</head>
<body style="background-color: black; color: white; font-size: 30px;">
    
<?php

    for($var = 1; $var<=6; $var++){
      echo "El valor de X es: ". $var . "<br>";
      echo "<h". $var . ">" . "Encabezado" . $var . "</h" . $var  .">";
    }

?>

</body>
</html>