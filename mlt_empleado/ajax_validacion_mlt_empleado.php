<?php
include '../conexion/conexion.php';

$emp_dni = $con->real_escape_string($_POST['emp_dni']);
$sel = $con->query("SELECT emp_dni FROM mlt_empleado WHERE emp_dni = '$emp_dni';");
$row = mysqli_num_rows($sel);
if($row != 0){
        echo "<label style='color:red;'>El dni del empleado ya existe</label>";
}else{
        echo "<label style='color:green;'>El dni del empleado esta disponible</label>";
}
$con->close();
?>
