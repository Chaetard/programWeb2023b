<?php
// Insertamos el código PHP donde nos conectamos a la base de datos 
require_once "conexion.php";

// Recuperamos los valores de los objetos de QUERYSTRING que viene desde la URL mediante GET ******
$id_factura = $_GET["id"];
//Eliminamos los posibles espacios en blanco que tenga a ambos lados la variable $id_factura usando trim()
$id_factura = trim($id_factura);

// Escribimos la consulta para recuperar el UNICO REGISTRO de MySQL mediante el ID obtenido por _GET
// Debido a que el campo llave en este ejemplo es de tipo STRING la variable en SQL va encerrada entre ''
$sql = "SELECT * FROM facturas WHERE id_factura='$id_factura'";

// Ejecutamos la consulta SQL y asignamos el resultado a la variable llamada $result
$result = $conn->query($sql);

// Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
$rows = $result->fetchAll();

// El resultado se mostrará en la página, en el BODY del HTML **********************************************
if (empty($rows)) {
    $result = "No se encontraron Facturas con esa información !!";
    header("Location: reporte_editar_catalog_jesus.php");
    exit;
}
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Regitro de Facturas desde PHP hacia MySQL</title>

    <style type="text/css" media="screen">
        body {
            background-color: #999;
        }

        #wrapper {
            margin: auto;
            width: 960px;
            height: 350px;
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
            height: 260px;
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
            height: 230px;
            margin-left: 5px;
            margin-right: 10px;
            margin-top: 10px;
            background-color: #CCC;
            padding: 5px;
            float: right;
            right: -10px;
            top: 10px;
        }

        #AddEmpleado {
            position: absolute;
            right: 50px;
            border: 3px solid #009;
            padding: 10px;
        }
    </style>

    <script language="javascript">
        function ValidaFormulario1() {
            var id_factura = document.getElementById("txt_id_facturas").value;
            var nombre_empresa = document.getElementById("txt_nombre_empresa").value;
            var fecha_emision = document.getElementById("txt_fecha_emision").value;
            var fecha_vencimiento = document.getElementById("txt_fecha_vencimiento").value;
            var monto_total = document.getElementById("txt_monto_total").value;
            var lugar_emision = document.getElementById("txt_lugar_emision").value;
            var estado_pago = document.getElementById("txt_estado_pago").value;

            // VALIDACIONES ***************************************************************
            // Caja de Texto *************************************************************

            if (id_factura == null || id_factura.length === 0 || /^\s+$/.test(id_factura)) {
                alert("Debes escribir la CLAVE de la factura usando solo números");
                document.getElementById("txt_id_factura").value = "";
                document.getElementById("txt_id_factura").style.background = 'lightgreen';
                document.getElementById("txt_id_factura").focus();
                return false;
            } else if (nombre_empresa == null || nombre_empresa.length === 0 || /^\s+$/.test(nombre_empresa)) {
                alert("Debes escribir el nombre de la empresa");
                document.getElementById("txt_nombre_empresa").style.background = 'lightgreen';
                document.getElementById("txt_nombre_empresa").focus();
                return false;
            } else if (fecha_emision == null || fecha_emision.length === 0) {
                alert("Debes seleccionar la fecha de emisión");
                document.getElementById("txt_fecha_emision").style.background = 'lightgreen';
                document.getElementById("txt_fecha_emision").focus();
                return false;
            } else if (fecha_vencimiento == null || fecha_vencimiento.length === 0) {
                alert("Debes seleccionar la fecha de vencimiento");
                document.getElementById("txt_fecha_vencimiento").style.background = 'lightgreen';
                document.getElementById("txt_fecha_vencimiento").focus();
                return false;
            } else if (monto_total == null || monto_total.length === 0 || isNaN(monto_total)) {
                alert("Debes ingresar un monto total válido");
                document.getElementById("txt_monto_total").style.background = 'lightgreen';
                document.getElementById("txt_monto_total").focus();
                return false;
            } else if (lugar_emision == null || lugar_emision.length === 0 || /^\s+$/.test(lugar_emision)) {
                alert("Debes ingresar el lugar de emisión");
                document.getElementById("txt_lugar_emision").style.background = 'lightgreen';
                document.getElementById("txt_lugar_emision").focus();
                return false;
            } else if (estado_pago == null || estado_pago == 0|| estado_pago.length === 0 || /^\s+$/.test(estado_pago)) {
                alert("Debes ingresar el estado de pago");
                document.getElementById("txt_estado_pago").style.background = 'lightgreen';
                document.getElementById("txt_estado_pago").focus();
                return false;
            }

            return true;
        }

    </script>

</head>

<body>

    <div id="wrapper">

        <div id="caja1">Licenciatura en Tecnologías de la Información</div>
        <div id="caja2">Programación web</div>
        <div id="caja3">Formulario para modificar departamentos en la base de datos desde una página web</div>

        <div id="caja4">
            <div id="texto1"><br>
                <p></p>

                <fieldset style="width: 90%; font-weight: bold;">
                    <legend>ACTUALIZAR UN DEPARTAMENTO</legend>

                    <!-- el atributo ACTION del Formulario apunta al archivo 3 de esta práctica: actualizar_departamento.php -->
                    <form action="actualizar_factura.php" method="post" id="formulario1"
                        onsubmit="return ValidaFormulario1();">
                        <?php
                        foreach ($rows as $row) {
                            //Imprimimos en la página EL UNICO REGISTRO de MySQL en un renglon de HTML
                            ?>
                            <div>
                                <br />
                                <!-- Cada valor recuperado de tu tabla CATALOGO va en 1 caja de texto del formulario -->
                                Número de departamento:
                                <input type="text" name="txt_id_factura" id="txt_id_factura" size="10" maxlength="5"
                                    disabled value="<?php echo $row['id_factura']; ?>" />

                                <!-- Cada valor recuperado de tu tabla CATALOGO va en 1 caja de texto del formulario -->
                                <input type="hidden" name="txt_id_factura_oculto" id="txt_id_factura_oculto" size="10"
                                    maxlength="2" value="<?php echo $row['id_factura']; ?>" />

                                <br />
                                <br />
                                <!-- Cada valor recuperado de tu tabla CATALOGO va en 1 caja de texto del formulario -->
                                Nombre de la empresa:
                                <input type="text" name="txt_nombre_empresa" id="txt_nombre_empresa" size="40"
                                    maxlength="50" value="<?php echo $row['nombre_empresa']; ?>" />
                                <br />
                                <br />
                                fecha de emisión:
                                <input type="date" name="txt_fecha_emision" id="txt_fecha_emision" size="40" maxlength="50"
                                    value="<?php echo $row['fecha_emision']; ?>" />
                                <br />
                                <br />
                                fecha de vencimiento:
                                <input type="date" name="txt_fecha_vencimiento" id="txt_fecha_vencimiento" size="40"
                                    maxlength="50" value="<?php echo $row['fecha_vencimiento']; ?>" />
                                <br />
                                <br />
                                monto total:
                                <input type="text" name="txt_monto_total" id="txt_monto_total" size="40" maxlength="50"
                                    value="<?php echo $row['monto_total']; ?>" />
                                <br />
                                <br />
                                lugar de emisión:
                                <input type="text" name="txt_lugar_emision" id="txt_lugar_emision" size="40" maxlength="50"
                                    value="<?php echo $row['lugar_emision']; ?>" />
                                <br />
                                <br />


                                estado de pago:
                                <select id="txt_estado_pago" name="txt_estado_pago">
                                <option value="0">--Seleccione un Estado--</option>
                                    <option value="PAGADO">Pagado</option>
                                    <option value="PENDIENTE" selected>Pendiente</option>
                                    <option value="VENCIDO">Vencido</option>

                                </select>




                                <input type="submit" name="AddFactura" id="AddFactura" value="  Actualizar este Factura " />
                                <br />
                            </div>
                        <?php } ?>
                    </form>
                </fieldset>
            </div>
        </div>
    </div>
</body>

</html>