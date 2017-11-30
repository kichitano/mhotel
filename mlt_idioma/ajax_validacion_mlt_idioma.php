<?php
include '../conexion/conexion.php';

$idi_nombre = $con->real_escape_string($_POST['idi_nombre']);
$sel = $con->query("SELECT idi_nombre FROM mlt_idioma WHERE idi_nombre = '$idi_nombre';");
$row = mysqli_num_rows($sel);
if($row != 0){
        echo "<label style='color:red;'>El nombre de mlt_idioma ya existe</label>";
}else{
        echo "<label style='color:green;'>El nombre de mlt_idioma esta disponible</label>";
}
$con->close();
?>
