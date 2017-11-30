<?php
include '../conexion/conexion.php';

$cli_dni = $con->real_escape_string($_POST['cli_dni']);
$sel = $con->query("SELECT cli_dni FROM mlt_cliente WHERE cli_dni = '$cli_dni';");
$row = mysqli_num_rows($sel);
if($row != 0){
        echo "<label style='color:red;'>El DNI de Cliente ya existe</label>";
}else{
        echo "<label style='color:green;'>El DNI de Cliente esta disponible</label>";
}
$con->close();
?>
