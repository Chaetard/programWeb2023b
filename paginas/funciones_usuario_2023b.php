<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <!-- Estilos bootstrap y css  -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <style>
        #tabla {
            border: 2px solid black;
        }

        td {
            border: 1px solid black;
            padding: 10px;
        }

        body {
            justify-content: center;
            background-color: gray;
        }
    </style>


</head>

<body class="d-flex">



    <?php

    $numero = $_POST["BoxNumbers"];
    $txt_nombre = $_POST["emmanuel"];

    function miTabla($renglones)
    {

        for ($i = 1; $i <= $renglones; $i++) {
            echo " <tr> 

            <td> Renglon " . $i . "</td>
            <td> Renglon " . $i . "</td>
            <td> Renglon " . $i . "</td>

            </tr>";
        }

    }

    ?>

    <div class="container text-center">

        <div class="row">
            <h1>Practica de Web de la Session 5</h1>
        </div>
        <div class="row">
            <table id="tabla">

                <?php miTabla($numero);



                ?>

            </table>
        </div>
        <div class="row">
            <?php echo "<br> <h2>Este Programa fue echo por $txt_nombre </h2>"; ?>
        </div>

    </div>






</body>

</html>