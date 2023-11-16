<?php

require_once "conexion.php";
$result;
$sql = 'SELECT A.id_abono, A.fecha_abono, A.monto_abono, A.metodo_pago, F.nombre_empresa FROM abonos A ';
$sql2 = $sql . 'INNER JOIN facturas F ON A.id_factura = F.id_factura ORDER BY A.fecha_abono ASC';


$result = $conn->query($sql2);


$rows = $result->fetchAll();


?>
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Regitro de registros a eliminar</title>

  <style type="text/css" media="screen">
    body {
      background-color: #999;
    }

    #wrapper {
      margin: auto;
      width: 960px;
      height: auto;
      background-color: #CCC;
    }

    #caja1 {
      width: 300px;
      height: 60px;
      margin-left: 10px;
      margin-right: 10px;
      margin-top: 10px;
      background-color: #FFC;
      float: left;
    }

    #caja2 {
      width: 300px;
      height: 60px;
      margin-left: 10px;
      margin-right: 10px;
      margin-top: 10px;
      background-color: #FFC;
      float: left;
    }

    #caja3 {
      width: 300px;
      height: 60px;
      margin-left: 10px;
      margin-right: 10px;
      margin-top: 10px;
      background-color: #FFC;
      float: left;
    }

    #caja4 {
      width: 940px;
      height: 400px;
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
      width: 900px;
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


  <script language="javascript">
    function borrar_abono(id_abono) {
      if (confirm("¿Estás seguro de eliminar el Abono No: " + id_abono + "?") == true) {
        return true;
      } else {
        return false;
      }
    }
  </script>

</head>

<body>

  <div id="wrapper">

    <div id="caja1">Licenciatura en Tecnologías de la Información</div>
    <div id="caja2">Programación web</div>
    <div id="caja3">Reporte de registros de una tabla para ser eliminados en línea (PHP con PDP y MySQL)</div>

    <div id="caja4">
      <div id="texto1"><br>

        <table border="1" style="width:100%;">
          <thead>
            <tr>
              <th>ID</th>
              <th>Fecha</th>
              <th>Monto Abonado</th>
              <th>Metodo de Pago</th>
              <th>Nombre de la Empresa</th>
              
            </tr>
          </thead>
          <tbody>

            <?php
            foreach ($rows as $row) {
              //Imprimimos en la página un renglon de tabla HTML por cada registro de tabla de MySQL
              ?>
              <tr>
                <td>
                  <?php echo $row['id_abono']; ?>
                </td>
                <!-- Creamos una celda con un enlace HTML que apunta a otro archivo PHP -->
                <td><a onClick="return borrar_abono(<?php echo $row['id_abono']; ?>);"
                    href="eliminar_registro.php?id=<?php echo $row['id_abono']; ?>">
                    <?php echo $row['fecha_abono']; ?>
                  </a>
                </td>
                <td>
                  <?php echo $row['monto_abono']; ?>
                </td>
            <td>
                  <?php echo $row['metodo_pago']; ?>
                </td>
              
               
                <td>
                  <?php echo $row['nombre_empresa']; ?>
                </td>
              </tr>
            <?php } ?>

            <tr>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
            </tr>
            <tr>
              <th>&nbsp;</th>
              <th><a href="alta_abonos_jesus.php">Agregar otro Abono</a></th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php
  //Cerramos la oonexion a la base de datos **********************************************
  $conn = null;
  ?>
</body>

</html>