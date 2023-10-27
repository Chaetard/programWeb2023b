<?php
// Insertamos el código PHP donde nos conectamos a la base de datos 
require_once "conexion.php";

//Recuperamos los valores de las cajas de texto y de los demás objetos de formulario
$txtfacturaid = $_POST["txtfacturaid"];
$txtfacturaid = (int) $txtfacturaid;


$fechaIni = $_POST["fechaIni"];
$lugar = $_POST["lugar"];
$txtNomEmpresa = $_POST["txtNomEmpresa"];
$fechaVen = $_POST["fechaVen"];
$estado = $_POST["combo_estado"];
$NumMonto = $_POST["NumMonto"];
$NumMonto = (int) $NumMonto;



$sql = "SELECT * FROM facturas WHERE id_factura=" . $txtfacturaid;
$result = $conn->query($sql);
$rows = $result->fetchAll();





if (empty($rows)) {


    $sqlINSERT1 = "INSERT INTO facturas(id_factura, fecha_emision, lugar_emision, nombre_empresa, fecha_vencimiento, monto_total, estado_pago) ";
    $sqlINSERT2 = $sqlINSERT1 . "VALUES ($txtfacturaid, '$fechaIni', '$lugar', '$txtNomEmpresa', '$fechaVen', $NumMonto, '$estado')";

    $conn->exec($sqlINSERT2);
    $mensaje = "FACTURA REGISTRADA SATISFACTORIAMENTE";

} else {

    // En caso de que si exista ya capturado ese empleado en la base de datos
    $mensaje = "Ese ID de Factura ya existe en la base de datos";

    $nombre = "";
    $salario = "";
    $categoria = "";
    $sexo = "";
    $departamento = "";
}
$sql2 = "SELECT * FROM facturas";
$result2 = $conn->query($sql2);
$rows2 = $result2->fetchAll();
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
                <h6>Formulario para alta de Facturas en la base de datos desde una página web</h6>
            </div>
        </div>

        <br>


        <div class="row">
            <div class="col-8 ">

                <div class="bg-success  formulario">

                    <div class="contenedor-nam">

                        <h1>Facturas Registradas</h1>



                        <a id="reporte" href="reporte_general_santos.php">Reporte de registros capturados en mi tabla
                            tipo catálogo</a>

                       

                            <?php


                            foreach ($rows2 as $row2) {

                                if ($row2['id_factura'] == $txtfacturaid) {
                                    echo '<a href=detalle_registro.php?id=' . $row2['id_factura'] . ' class="regiExist">' . ' <button class="btn  btn-info">Ver Mas </button> ' . $row2['id_factura'] . '  ' . $row2['nombre_empresa'] . '  ' . $row2['estado_pago'] . '</a>';
                                } else {




                                    echo '<a href=detalle_registro.php?id=' . $row2['id_factura'] . '>' . ' <button class="btn  btn-info">Ver Mas </button> ' . $row2['id_factura'] . '  ' . $row2['nombre_empresa'] . '  ' . $row2['estado_pago'] . '</a>';
                                }



                            }

                            ?>
                        </a>
                    </div>

                </div>

            </div>


            <div class="col-4  bg-danger formulario">
                <legend>
                    <?php echo $mensaje; ?>
                </legend>
                <div>
                    <br />
                    <b>Empresa:</b>
                    <?php echo ($txtNomEmpresa); ?>
                    <br />
                    <br />
                    <b>ID Factura:</b>
                    <?php echo ($txtfacturaid); ?>
                    <br />
                    <br />
                    <b>Fecha De Emicion:</b>
                    <?php echo ($fechaIni); ?>
                    <br />
                    <br />
                    <b>Fecha de Vencimiento:</b>
                    <?php echo ($fechaVen); ?>
                    <br />
                    <br />
                    <b>Monto Total:</b>
                    <?php echo ($NumMonto); ?>
                    <br />
                    <br />
                    <b>Estado:</b>
                    <?php echo ($estado); ?>
                    <br />
                    <br />
                    <a id="otraFac" href="alta_factura_jesus.php">REGISTRAR OTRA FACTURA</a>
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