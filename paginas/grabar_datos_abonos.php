<?php
// Insertamos el código PHP donde nos conectamos a la base de datos 
require_once "conexion.php";

//Recuperamos los valores de las cajas de texto y de los demás objetos de formulario
$txtfacturaid = $_POST["txtfacturaid"];
$txtfacturaid = (int) $txtfacturaid;
$combo_abono = $_POST["combo_abono"];
$combo_abono = (int) $combo_abono;


$fechaIni = $_POST["fechaIni"];
$estado = $_POST["combo_estado"];
$NumMonto = $_POST["NumMonto"];
$NumMonto = (int) $NumMonto;



$sql = "SELECT * FROM abonos WHERE id_abono=" . $txtfacturaid;
$result = $conn->query($sql);
$rows = $result->fetchAll();





if (empty($rows)) {


    $sqlINSERT1 = "INSERT INTO abonos(id_abono, id_factura, fecha_abono, monto_abono, metodo_pago) ";
    $sqlINSERT2 = $sqlINSERT1 . "VALUES ($txtfacturaid, '$combo_abono', '$fechaIni', '$NumMonto', '$estado')";

    $conn->exec($sqlINSERT2);
    $mensaje = "ABONO REGISTRADO SATISFACTORIAMENTE";

} else {

    // En caso de que si exista ya capturado ese empleado en la base de datos
    $mensaje = "Ese ID de Abono ya existe en la base de datos";


}
$sql2 = "SELECT * FROM abonos";
$result2 = $conn->query($sql2);
$rows2 = $result2->fetchAll();

$sql3 = "SELECT id_factura, nombre_empresa FROM facturas";
$result3 = $conn->query($sql3);
$rows3 = $result3->fetchAll();

$sql4 = 'SELECT f.id_factura, f.nombre_empresa, f.monto_total, f.lugar_emision, f.fecha_vencimiento, f.estado_pago, a.id_abono, a.fecha_abono, a.monto_abono, a.metodo_pago FROM facturas f ';
$sql5 = $sql4 . 'INNER JOIN abonos a ON f.id_factura = a.id_factura WHERE f.id_factura=' . $combo_abono;


$resultA = $conn->query($sql5);

// Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
$rowsA = $resultA->fetchAll();

?>


<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Regitro de Facturas desde PHP hacia MySQL</title>

    <link rel="stylesheet" href="../css/altas_facturas.css">

</head>

<body class=" d-flex">


    <div class="conatiner-fluid text-center contenedor">
        <div class="row bg-primary nav">
            <div class="col-4 ">
                <h6>Licenciatura en Tecnologías de la Información</h6>
            </div>
            <div class="col-4 ">
                <h5>Programación web</h5>
            </div>
            <div class="col-4 ">
                <h6>Formulario para alta de Abonos en la base de datos desde una página web</h6>
            </div>
        </div>

        <br>


        <div class="row">
            <div class="col-8 ">

                <div class="bg-success  formulario">

                    <div class="contenedor-nam">

                        <h1>Abonos Registrados a la Empresa:
                            <?php


                            foreach ($rows3 as $row3) {
                                if ($row3['id_factura'] == $combo_abono) {
                                    echo $row3['nombre_empresa'];
                                }
                            }


                            ?>
                        </h1>



                        <a id="reporte" href="reporte_abonos_santos.php">Reporte de Abonos capturados en mi tabla tipo
                            Relacionada</a>



                        <?php

                        foreach ($rowsA as $rowA) {


                            if ($rowA['id_factura'] == $combo_abono) {
                                echo '<div class="tablas-abonos" >';
                                echo "<label>Factura ID:</label> " . $rowA['id_factura'];
                                echo "<label>Nompre de la Empresa:</label> " . $rowA['nombre_empresa'];
                                echo "<label>Monto Total:</label> " . $rowA['monto_total'];
                                echo "<label>id del Abono</label> " . $rowA['id_abono'];
                                echo "<label>Fecha de Abono:</label> " . $rowA['fecha_abono'];
                                echo "<label>Monto de Abono:</label> " . $rowA['monto_abono'];
                                echo "<label>Metodo de Pago:</label> " . $rowA['metodo_pago'];
                                echo '</div>';
                            }
                        }






                        ?>






                    </div>

                </div>

            </div>


            <div class="col-4  bg-danger formulario">
                <legend>
                    <?php echo $mensaje; ?>
                </legend>
                <div>

                    <br />
                    <b>ID Abono:</b>
                    <?php echo ($txtfacturaid); ?>
                    <br />
                    <b>ID Factura:</b>
                    <?php echo ($combo_abono); ?>
                    <br />
                    <br />
                    <b>Fecha De Emicion:</b>
                    <?php echo ($fechaIni); ?>
                    <br />

                    <br />
                    <b>Monto Abonado:</b>
                    <?php echo ($NumMonto); ?>
                    <br />
                    <br />
                    <b>Metodo de Pago</b>
                    <?php echo ($estado); ?>
                    <br />
                    <br />

                    <a id="otraFac" href="alta_abono_jesus.php">REGISTRAR OTRO ABONO</a>
                </div>

            </div>

        </div>
    </div>
    <?php
    //Cerramos la conexion a la base de datos *************************************
    $conn = null;
    ?>
</body>

</html>