<?php
// Insertamos el código PHP donde nos conectamos a la base de datos 
require_once "conexion.php";
$result = "";
$result2 = "";

// Escribimos la consulta para recuperar los nombre_empresas de la tabla departamentos
$sqlFact = 'SELECT id_factura, nombre_empresa FROM facturas';
// Almacenamos los resultados de la consulta en una variable llamada $smtp a partir de la conexión
$stmt2 = $conn->query($sqlFact);
// Recuperamos los valores de los registros de la tabla que ya están en la variable $stmt
$rows2 = $stmt2->fetchAll();
// Verificamos si está vacia la variable $smtp, si es positivo imprimimos en pantalla que no trae
if (empty($rows2)) {
    $result2 = "No se encontraron departamentos !!";
}

// Recuperamos los valores de los objetos de QUERYSTRING que viene desde la URL mediante GET ******
$id_abono = $_GET["id"];

// Conversión explicita de CARACTER a ENTERO mediante el forzado de (int), 
// los valores por GET son tipo STRING ************************************************************
$id_abono = (int) $id_abono; //*****************************************************************

//Verificamos que SI VENGA EL NUMERO DE EMPLEADO **************************************************
if ($id_abono == "") {
    header("Location: reporte_para_editar_relacionada_jesus.php");
    exit;
}
if (is_null($id_abono)) {
    header("Location: reporte_para_editar_relacionada_jesus.php");
    exit;
}

// Escribimos la consulta para recuperar el UNICO REGISTRO de MySQL mediante el ID obtenido por _GET
$sql3 = 'SELECT A.id_abono, A.id_factura, A.fecha_abono, A.monto_abono, A.metodo_pago, F.nombre_empresa FROM abonos A 
	         INNER JOIN facturas F ON A.id_factura = F.id_factura 
	         WHERE id_abono =' . $id_abono;

//echo ($sql3);
//die();

// Ejecutamos la consulta y asignamos el resultado a la variable llamada $result
$result = $conn->query($sql3);

// Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
$rows = $result->fetchAll();

// El resultado se mostrará en la página, en el BODY ***************************************************
if (empty($rows)) {
    $result = "No se encontraron Abonos !!";
    header("Location: reporte_para_editar_relacionada_jesus.php");
    exit;
}
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Regitro de Abonos desde PHP hacia MySQL</title>

    <style type="text/css" media="screen">
        body {
            background-color: #999;
        }

        #wrapper {
            margin: auto;
            width: 960px;
            height: 550px;
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
            height: 450px;
            margin-left: 10px;
            margin-right: 10px;
            margin-top: 40px;
            background-color: #333;
            clear: both;
            /*
         position:absolute; 
         top:200px;
         */

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
            height: 400px;
            margin-left: 5px;
            margin-right: 10px;
            margin-top: 10px;
            background-color: #CCC;
            padding: 5px;
            float: right;
            right: -10px;
            top: 10px;
        }

        #AddAbono {
            position: absolute;
            right: 50px;
            border: 3px solid #009;
            padding: 10px;
        }
    </style>

    <script language="javascript">

        function ValidaFormulario() {
           
            var nombre_empresa = document.getElementById("combo_nombre_empresa").selectedIndex;
       
            var id_abono = document.getElementById("id_abono").value;
        
            var fecha_abono = document.getElementById("fecha_abono").value;
   
            var monto_abono = document.getElementById("monto_abono").value;
      

            var metodo_pago = document.getElementById("combo_metodo_pago").selectedIndex;
           




            
            if (id_abono == null || id_abono.length == 0 || /^\s+$/.test(id_abono)) {
                alert("Debes escribir el número del abono");
                document.getElementById("id_abono").focus();
                return false;
            } else if (fecha_abono == null || fecha_abono.length == 0 || /^\s+$/.test(fecha_abono)) {
                alert("Debes poner una fecha");
                document.getElementById("fecha_abono").focus();
                return false;
            } else if (monto_abono == null || monto_abono.length == 0 || /^\s+$/.test(monto_abono)) {
                alert("Debes escribir el monto abonado");
                document.getElementById("monto_abono").focus();
                return false;
            } else if (metodo_pago == null || metodo_pago == 0) {
                alert("Debes elegir un Metodo de Pago");
                document.getElementById("combo_metodo_pago").focus();
                return false;
            } else if (nombre_empresa == null || nombre_empresa == 0) {
                alert("Debes elegir un nombre_empresa");
                document.getElementById("combo_nombre_empresa").focus();
                return false;
            } //Cuando ya están contestadas todas las cajas de texto y seleccionados los combobox enviamos el form
            return true;
        }
        //-->
    </script>

</head>

<body>

    <div id="wrapper">

        <div id="caja1">Licenciatura en Tecnologías de la Información</div>
        <div id="caja2">Programación web</div>
        <div id="caja3">Formulario para editar la información de los Abonos en la BD desde una página web</div>

        <div id="caja4">
            <div id="texto1"><br>

                <fieldset style="width: 90%; font-weight: bold;">
                    <legend>EDITAR EL Abono SELECCIONADO</legend>
                    <form action="actualizar_abono.php" method="post" id="formulario1"
                        onsubmit="return ValidaFormulario()">
                        <?php
                        foreach ($rows as $row) {
                            //Imprimimos en la página EL UNICO REGISTRO de MySQL en un renglon de HTML
                            ?>
                            <div>
                                <br />
                                <label for="nombre_empresa">Nombre de la Empresa:</label>

                                <select name="combo_nombre_empresa" id="combo_nombre_empresa">
                                    <option value="0">-- Selecciona una Empresa --</option>

                                    <?php
                                    foreach ($rows2 as $row2) {

                                        if ($row2['id_factura'] == $row['id_factura']) {
                                            echo '<option value="' . $row['id_factura'] . '" selected>' . $row['nombre_empresa'] . '</option>';

                                        } else {
                                            echo '<option value="' . $row2['id_factura'] . '">' . $row2['nombre_empresa'] . '</option>';
                                        }

                                    }
                                    ?>


                                </select>


                                <br />
                                <br />
                                Id del abono:
                                <input type="text" name="id_abono" id="id_abono" size="10"
                                    value="<?php echo $row['id_abono']; ?>" disabled />
                                <br />
                                <br />
                                fecha del Abono:
                                <input type="date" name="fecha_abono" id="fecha_abono"
                                    value="<?php echo $row['fecha_abono']; ?>" />
                                <br />
                                <br />
                                Monto del Abono:
                                <input type="text" name="monto_abono" id="monto_abono" size="15"
                                    value="<?php echo $row['monto_abono']; ?>" />
                                <br />
                                <br />
                               
                                Metodo de Pago:<!-- Caja de Selección o ComboBox -->

                                <select name="combo_metodo_pago" id="combo_metodo_pago">
                                    <option value="0">-- Selecciona un metodo_pago --</option>
                                    <option value="TARJETA">TARJETA</option>
                                    <option value="EFECTIVO">EFECTIVO</option>
                                    | <option value="CHEQUE">CHEQUE</option>
                                    <option value="TRANSFERENCIA">TRANSFERENCIA</option>


                                    <option value="<?php echo $row['metodo_pago']; ?>" selected>
                                        <?php echo $row['metodo_pago']; ?>
                                    </option>
                                </select>
                                <br />
                                <br />
                                <input type="hidden" name="id_abonoOCULTO" id="id_abonoOCULTO"
                                    value="<?php echo $row['id_abono']; ?>" />
                                <input type="submit" name="AddAbono" id="AddAbono" value="  Guardar cambios " />
                                <br />
                            </div>
                        <?php } ?>
                    </form>
                </fieldset>
            </div>
        </div>
    </div>
    <?php
    //Cerramos la oonexion a la base de datos **********************************************
    $conn = null;
    ?>
</body>

</html>