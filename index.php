<?php
session_start();

$_SESSION["validado"] = "false";

// echo $_SESSION["validado"];



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Facturas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>

<style>
    body {
        color: white;
    }

    .inicio {
        margin: auto;
        width: 960px;
        height: 390px;
        text-align: center;
        padding-top: 200px;
    }
</style>

<body class="bg-dark">
    <h1 class="text-center">Bienvenido al sistema de Facturas</h1>
    <div class="inicio">

        <a href="login_jesus.php" class="btn btn-success">Iniciar Sesion</a>

    </div>
</body>

</html>