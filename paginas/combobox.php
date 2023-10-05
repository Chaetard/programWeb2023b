<?php 

require_once "conexion.php";
$sql = "SELECT departamento, descripcion FROM departamentos";
$result = $conn->query($sql);
$rows = $result->fetchAll();
$cuantos = (int)$rows;


if ($cuantos > 0 ){
    echo"<form action='' method='post' id='formulario1' >";

    echo "<label for='departamento'>Selecciona un Departamento</label> <br> <br>";
    echo "<select name='departamento' id='departament'>";
    echo "<option value='0'>Selecciona un Departamento...</option>";

    foreach ($rows as $row) {
        echo '<option value="' . $row['departamento'] . '">' . $row['descripcion'] . '</option>';
    } 
}else {
    echo "<select name='departamento' id='departamento' disable>";
    echo "<option value='0'>Selecciona un departamento</option>";
}


echo "</select>";
echo "</form>";

$conn = null;
?>