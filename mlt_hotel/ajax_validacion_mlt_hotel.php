<?php
include '../conexion/conexion.php';

$hot_nombre = $con->real_escape_string($_POST['hot_nombre']);
$sel = $con->query("SELECT hot_nombre FROM mlt_hotel WHERE hot_nombre = '$hot_nombre';");
$row = mysqli_num_rows($sel);
if($row != 0){
        echo "<label style='color:red;'>El nombre de Hotel ya existe</label>";
}else{
        echo "<label style='color:green;'>El nombre de Hotel esta disponible</label>";
}
$con->close();
?>