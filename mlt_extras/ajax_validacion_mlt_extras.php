<?php
include '../conexion/conexion.php';

$hot_id = $con->real_escape_string($_POST['hot_id']);
$sel = $con->query("SELECT hot_id FROM mlt_extras WHERE hot_id = '$hot_id';");
$row = mysqli_num_rows($sel);
if($row != 0){
        echo "<label style='color:red;'>El nombre de mlt_extras ya existe</label>";
}else{
        echo "<label style='color:green;'>El nombre de mlt_extras esta disponible</label>";
}
$con->close();
?>
