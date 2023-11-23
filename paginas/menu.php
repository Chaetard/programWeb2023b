<?php

session_start();

if ($_SESSION["validado"] != "true") {


    header("Location: ../login_jesus.php");
    exit;

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../javascript/menuDinamico.js">
</head>

<body class="bg-dark">

    <h1>Menu Principal</h1>

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-6">
                <h1>Bienvenido
                    <?php echo $_SESSION["usuario"]; ?>

                </h1>
                <div class="imgCont">
                    <img src="../imagenes/shop.svg" alt="" id="imgPrincipal" height="350px">
                </div>
            </div>




            <div class="col-md-6">


                <div class="row contenedorListasMain">
                    <div class="col-md-6 contLista">

                        <h1>Abonos</h1>
                        <a href="alta_abonos_jesus.php" class="listaA" id="registroAbono">Registro de Nuevos
                            Abonos</a>
                        <a href="reporte_abonos_santos.php" class="listaA" id="reporteAbonos">Reporte de Abonos</a>
                        <a href="reporte_para_editar_relacionada_jesus.php" class="listaA"
                            id="modificarAbonos">Modificacion/Eliminacion
                            del
                            Abono</a>
                    </div>

                    <div class="col-md-6 contLista">



                        <h1>Facturas</h1>
                        <a href="alta_factura_jesus.php" class="listaA" id="registroFactura">Registro de Nuevas
                            Facturas</a>
                        <a href="reporte_general_santos.php" class="listaA" id="reporteFacturas">Reporte de Facturas</a>
                        <a href="reporte_para_editar_catalogo_jesus.php" class="listaA"
                            id="modificarFacturas">Modificacion/Eliminacion de
                            la
                            Factura</a>
                    </div>
                </div>


                <a href="../index.php" class="btn btn-danger">Cerrar Sesion</a>
            </div>

        </div>

    </div>



    <script>


        const IMG = document.getElementById("imgPrincipal");




        const registroAbono = document.getElementById("registroAbono");
        registroAbono.addEventListener("mouseover", () => {
            if (!IMG) {
                console.error("No se pudo encontrar el elemento con id 'imgPrincipal'");
                return;
            }

            // Cambiar la imagen
            IMG.src = "../imagenes/pay.svg";

        });





        const registroFactura = document.getElementById("registroFactura");
        registroFactura.addEventListener("mouseover", () => {
            if (!IMG) {
                console.error("No se pudo encontrar el elemento con id 'imgPrincipal'");
                return;
            }

            // Cambiar la imagen
            IMG.src = "../imagenes/pay.svg";

        });




        const reporteFacturas = document.getElementById("reporteFacturas");
        reporteFacturas.addEventListener("mouseover", () => {
            if (!IMG) {
                console.error("No se pudo encontrar el elemento con id 'imgPrincipal'");
                return;
            }

            // Cambiar la imagen
            IMG.src = "../imagenes/agenda.svg";

        });




        const reporteAbonos = document.getElementById("reporteAbonos");
        reporteAbonos.addEventListener("mouseover", () => {
            if (!IMG) {
                console.error("No se pudo encontrar el elemento con id 'imgPrincipal'");
                return;
            }

            // Cambiar la imagen
            IMG.src = "../imagenes/agenda.svg";

        });




        const modificarFacturas = document.getElementById("modificarFacturas");
        modificarFacturas.addEventListener("mouseover", () => {
            if (!IMG) {
                console.error("No se pudo encontrar el elemento con id 'imgPrincipal'");
                return;
            }

            // Cambiar la imagen
            IMG.src = "../imagenes/email.svg";

        });




        const modificarAbonos = document.getElementById("modificarAbonos");
        modificarAbonos.addEventListener("mouseover", () => {
            if (!IMG) {
                console.error("No se pudo encontrar el elemento con id 'imgPrincipal'");
                return;
            }

            // Cambiar la imagen
            IMG.src = "../imagenes/email.svg";

        });
    </script>
</body>

</html>