<?php
//Insertamos el código PHP donde nos conectamos a la base de datos *******************************
require_once "conexion.php";
$result;
// Escribimos la consulta para recuperar los registros de la tabla de MySQL
$sql = 'SELECT * FROM empleados';

// Ejecutamos la consulta y asignamos el resultado a la variable llamada $result
$result = $conn->query($sql);

// Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
$rows = $result->fetchAll();

// Los valores que tendrá la variable $rows se organizan en un arreglo asociativo
// (Variable con varias valores)
// y se usará un ciclo foreach para recuper los valores uno a uno de ese arreglo
// El resultado se mostrará en una tabla HTML ***************************************************
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Reporte de PHP conectado a MySQL</title>
    <link rel="stylesheet" href="../css/reporte_enlaces.css">
</head>

<body>
    <h2>Reporte de la tabla de MySQL en tabla de HTML</h2>
    <div class="contenedor">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Salario</th>
                    <th>Categoria</th>
                    <th>Sexo</th>
                    <th>Departamento</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($rows as $row) {
                    //Imprimimos en la página un renglon de tabla HTML por cada registro de tabla de MySQL
                    ?>
                    <tr>
                        <td>
                            <?php echo $row['numero']; ?>
                        </td>
                        <!-- Creamos una celda con un enlace HTML que apunta a otro archivo PHP -->
                        <td id="nombre">

                            <a href="detalle_empleado.php?id=<?php echo $row['numero']; ?>">
                                <?php echo $row['nombre']; ?>
                            </a>

                        </td>

                        <td>
                            <?php echo $row['salario']; ?>
                        </td>
                        <td>
                            <?php echo $row['categoria']; ?>
                        </td>
                        <td>
                            <?php echo $row['sexo']; ?>
                        </td>
                        <td>
                            <?php echo $row['departamento']; ?>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
        
    </div>
    <h3>Jesus Emmanuel Santos Chavez</h3>

    <?php
    //Cerramos la oonexion a la base de datos **********************************************
    $conn = null;
    ?>

</body>

</html>