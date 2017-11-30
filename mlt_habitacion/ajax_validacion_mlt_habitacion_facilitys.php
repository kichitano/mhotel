<?php
include '../conexion/conexion.php';

$hab_id = $con->real_escape_string($_POST['hab_id']);
$sel = $con->query("SELECT hab_id FROM mlt_habitacion_facilitys WHERE hab_id = '$hab_id';");
$row = mysqli_num_rows($sel);
if($row != 0){
        echo "<label style='color:red;'>El nombre de mlt_habitacion_facilitys ya existe</label>";
}else{
        echo "<label style='color:green;'>El nombre de mlt_habitacion_facilitys esta disponible</label>";
}
$con->close();
?>
