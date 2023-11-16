<?php
// Insertamos el código PHP donde nos conectamos a la base de datos 
require_once "conexion.php";


$id_abono = $_POST["id_abonoOCULTO"];
$nombre_empresa = strtoupper(trim($_POST["combo_nombre_empresa"]));
$fecha_abono = $_POST["fecha_abono"];
$monto_abono = (int) $_POST["monto_abono"];
$metodo_pago = $_POST["combo_metodo_pago"];






$sqlUPDATE = "UPDATE abonos SET id_factura = '$nombre_empresa', fecha_abono = '$fecha_abono', monto_abono  = $monto_abono, metodo_pago = '$metodo_pago' WHERE id_abono=$id_abono";

// Ejecutamos la sentencia UPDATE de SQL a partir de la conexión usando PDO 
// mediante la propiedad "EXEC" de la linea de conexión ***************************

$conn->exec($sqlUPDATE);
$mensaje = "Factura Actualizada Correctamente ACTUALIZADO SATISFACTORIAMENTE";
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Actualización de Abonos desde PHP hacia MySQL</title>

    <style type="text/css" media="screen">
        body {
            background-color: #999;
        }

        #wrapper {
            margin: auto;
            width: 960px;
            height: 390px;
            background-color: #CCC;
        }

        #caja1 {
            width: 300px;
            height: 50px;
            margin-left: 10px;
            margin-right: 10px;
            margin-top: 10px;
            background-color: #FFC;
            float: left;
        }

        #caja2 {
            width: 300px;
            height: 50px;
            margin-left: 10px;
            margin-right: 10px;
            margin-top: 10px;
            background-color: #FFC;
            float: left;
        }

        #caja3 {
            width: 300px;
            height: 50px;
            margin-left: 10px;
            margin-right: 10px;
            margin-top: 10px;
            background-color: #FFC;
            float: left;
        }

        #caja4 {
            width: 940px;
            height: 300px;
            margin-left: 10px;
            margin-right: 10px;
            margin-top: 40px;
            background-color: #333;
            clear: both;

            position: relative;
            top: 10px;
        }

        #imagen1 {
            position: relative;
            top: 10px;
            right: -10px;
        }

        #texto1 {
            width: 500px;
            height: 270px;
            margin-left: 5px;
            margin-right: 10px;
            margin-top: 10px;
            background-color: #CCC;
            padding: 5px;
            float: right;
            right: -10px;
            top: 10px;
        }
    </style>

</head>

<body>

    <div id="wrapper">

        <div id="caja1">Licenciatura en Tecnologías de la Información</div>
        <div id="caja2">Programación web</div>
        <div id="caja3">Formulario para modificar Abonos en la base de datos desde una página web</div>

        <div id="caja4">
            <div id="texto1"><br>
                <p></p>

                <fieldset style="width: 90%;">
                    <legend>
                        <?php echo ($mensaje); ?>
                    </legend>
                    <div>
                        <br />
                        <b>Id del abono:</b>
                        <?php echo ($id_abono); ?>
                        <br />
                        <br />
                        <b>Nombre de la Empresa:</b>
                        <?php echo ($nombre_empresa); ?>
                        <br />
                        <br />
                        <b>Fecha :</b>
                        <?php echo ($fecha_abono); ?>
                        <br />
                        <br />
                        

                        <b>Monto Abonado:</b>
                        <?php echo ($monto_abono); ?>
                        <br />
                        <br />
                        <b>Metodo de Pago:</b>
                        <?php echo ($metodo_pago); ?>
                        <br />
                        <br />
                        <a href="reporte_para_editar_relacionada_jesus.php">REGRESAR AL REPORTE DE ABONOS</a>
                        <br />

                        <a href="alta_abonos_jesus.php">REGISTRAR OTRA ABONOS</a>
                        <br />

                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <?php
    //Cerramos la conexion a la base de datos *************************************
    $conn = null;
    ?>
</body>

</html>