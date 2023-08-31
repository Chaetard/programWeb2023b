<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setencia IF</title>
</head>
<body style="background-color: black; color:white; font-size: 30px;">
    

<?php 
    $contenedor = "DIASs";
    if($contenedor == "DIAS"){
        $saludo = "Buenos DIAS Mortal !!!";
        echo ("<marquee>".$saludo."</marquee>");
    }else{
        $saludo = "No te quiero saludar !!!!";
        echo ("<marquee>".$saludo. "</marquee>");
    }

?>

</body>
</html>