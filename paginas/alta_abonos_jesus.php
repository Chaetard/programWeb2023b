<?php
// Insertamos el código PHP donde nos conectamos a la base de datos *******************************
require_once "conexion.php";
$result = "";

//   //Escribimos la consulta para recuperar los abonos de la tabla abonos **************
$sql = 'SELECT id_factura, nombre_empresa FROM facturas';
//   //Almacenamos los resultados de la consulta en una variable llamada $smtp a partir de la conexión
$stmt = $conn->query($sql);
//   //Recuperamos los valores de los registros de la tabla que ya están en la variable $stmt
$rows = $stmt->fetchAll();
//   //Verificamos si está vacia la variable $smtp, si es positivo imprimimos en pantalla que no trae
if (empty($rows)) {
    $result = "No se encontraron resultados !!";
}
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Regitro de Facturas desde PHP hacia MySQL</title>


    <link rel="stylesheet" href="../css/altas_facturas.css">

    <script language="javascript">








        function ValidaFormulario() {


            var abono = document.getElementById("combo_abono").selectedIndex;

            var valorNumero = document.getElementById("txtfacturaid").value;

            var valorFechaIni = document.getElementById("fechaIni").value;

            var NumMonto = document.getElementById("NumMonto").value;

            var estado = document.getElementById("combo_estado").selectedIndex;



            if (valorNumero == null || valorNumero.length == 0 || !/^([0-9])*$/.test(valorNumero)) {
                alert("Debes escribir el número de la Factura usando solo números enteros");
                document.getElementById("txtfacturaid").value = "";
                document.getElementById("txtfacturaid").focus();
                return false;
            } else if (valorFechaIni == null || valorFechaIni.length == 0 || /^\s+$/.test(valorFechaIni)) {
                alert("Debes escribir la fecha Inicial de la Factura");
                document.getElementById("fechaIni").focus();
                return false;
            }  else if (NumMonto == null || NumMonto.length == 0 || !/^([0-9])*$/.test(NumMonto)) {
                alert("Debes escribir el monton total de la factura utilizando solamente números");
                document.getElementById("NumMonto").value = "";
                document.getElementById("NumMonto").focus();
                return false;
            }
            else if (estado == null || estado == 0) {
                alert("Debes elegir un metodo de Pago");
                document.getElementById("combo_estado").focus();
                return false;
            } else if (abono == null || abono == 0) {
                alert("Debes elegir la factura");
                document.getElementById("combo_abono").focus();
                return false;
            }
            return true;
        }
        //-->
    </script>

</head>

<body class="bg-dark d-flex">

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


            <div class="col-8 mb-3">



                <!-- <div id="texto1"><br>
                <p>
                    <?php echo $result; ?>
                </p> -->






                <form class="bg-success  formulario  " action="grabar_datos_abonos.php" method="post" id="formulario1"
                    onsubmit="return ValidaFormulario()">
                    <h1>Registro de Una Abono</h1>

                    <div class="contenedor-items">



                        <label for="abono">Factura:</label>
                        <select name="combo_abono" id="combo_abono">
                            <option value="0">-- Selecciona una Factura --</option>
                            <?php
                            foreach ($rows as $row) {
                                echo '<option value="' . $row['id_factura'] . '">' . $row['nombre_empresa'] . '</option>';
                            }
                            ?>

                        </select>

                        <label for="txtfacturaid"> Ingresa un id del Abono</label>
                        <input type="text" name="txtfacturaid" id="txtfacturaid">


                        <label for="fechaIni">Fecha de Abono:</label>

                        <input type="date" name="fechaIni" id="fechaIni">









                        <label for="NumMonto"> Monto de Abono:</label>

                        <input type="text" name="NumMonto" id="NumMonto" maxlength="20">

                        <label for="combo_estado">Metodo de Pago:</label>

                        <select name="combo_estado" id="combo_estado">
                            <option value="0">-- Selecciona un Metodo de Pago --</option>
                            <option value="TARJETA">Tarjeta</option>
                            <option value="EFECTIVO">Efectivo</option>
                            <option value="TRANSFERENCIA">TRANSFERENCIA</option>
                            <option value="CHEQUE">Cheque</option>

                        </select>



                    </div>



                    <input class="btn btn-primary" type="submit" name="AddFactura" id="AddFactura"
                        value="  Registrar este Abono" />

                </form>
            </div>



            <div class="col-4 mb-3 bg-danger formulario">

            </div>
        </div>
    </div>
    </div>
    <?php
    //Cerramos la oonexion a la base de datos **********************************************
    $conn = null;
    ?>
</body>