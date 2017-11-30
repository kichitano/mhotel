<?php
include '../conexion/conexion.php';
$op = $con->real_escape_string(htmlentities($_GET['op']));
$fac_id = $con->real_escape_string(htmlentities($_GET['id']));
$bloqueo = $con->real_escape_string(htmlentities($_GET['bl']));


//if($_SERVER['REQUEST_METHOD'] == 'POST'){

	switch ($op) {

	    case "insertar_mlt_habitacion_facilitys":
		$hab_id = $_SESSION['Habitacion'];
		$fac_nombre = $con->real_escape_string(htmlentities($_POST['fac_nombre']));
		$fac_imagen = $con->real_escape_string(htmlentities($_POST['fac_imagen']));
		$fac_descripcion = $con->real_escape_string(htmlentities($_POST['fac_descripcion']));

//	if(empty($hab_id) || empty($fac_nombre) || empty($fac_imagen) || empty($fac_descripcion))
//	{
//            header('location:../extend/alerta.php?msj=Hay un campo sin especificar&c=ho&p=in&t=error');
//            exit;
//	}

	        $ins = $con->query("INSERT INTO mlt_habitacion_facilitys (hab_id, fac_nombre, fac_imagen, fac_descripcion, fac_estado) VALUES ( $hab_id, '$fac_nombre', '$fac_imagen', '$fac_descripcion', 1) ");
	        if($ins){
              header('location:../extend/alerta.php?msj=La facilidad de habitacion ha sido registrada&c=hb&p=hbu&t=success');
	        }else{
              header('location:../extend/alerta.php?msj=La facilidad de habitacion no pudo ser registrada&c=hb&p=hfi&t=error');
	        }

	        $con->close();

	    break;


	    case "modificar_mlt_habitacion_facilitys":

		$hab_id = $_SESSION['Habitacion'];
		$fac_nombre = $con->real_escape_string(htmlentities($_POST['fac_nombre']));
		$fac_imagen = $con->real_escape_string(htmlentities($_POST['fac_imagen']));
		$fac_descripcion = $con->real_escape_string(htmlentities($_POST['fac_descripcion']));

//	if()
//	{
//            header('location:../extend/alerta.php?msj=Hay un campo sin especificar&c=ho&p=in&t=error');
//            exit;
//	}

	$up = $con->query("UPDATE mlt_habitacion_facilitys SET hab_id = $hab_id, fac_nombre = '$fac_nombre', fac_imagen = '$fac_imagen', fac_descripcion = '$fac_descripcion' where fac_id = $fac_id");
	if($up){
		header('location:../extend/alerta.php?msj=La facilidad de habitacion ha sido modificada&c=hb&p=hbu&t=success');
	}else{
		header('location:../extend/alerta.php?msj=La facilidad de habitacion no pudo ser modificada&c=hb&p=hfu&t=error');
	}
	
	$con->close();


	    break;


	    case "bloquear_mlt_habitacion_facilitys":


        if($bloqueo == 1){
		$up = $con->query("UPDATE mlt_habitacion_facilitys SET fac_estado = 0 WHERE fac_id = $fac_id ");
		if($up){
			header('location:../extend/alerta.php?msj=La facilidad de habitacion a sido bloqueada&c=hb&p=hbu&t=success');
		} else{
			header('location:../extend/alerta.php?msj=La facilidad de habitacion no ha podido ser bloqueada&c=hb&p=hbu&t=error');
		}
	} else {
		$up = $con->query("UPDATE mlt_habitacion_facilitys SET fac_estado = 1 WHERE fac_id = $fac_id ");
		if($up){
			header('location:../extend/alerta.php?msj=La facilidad de habitacion a sido desbloqueada&c=hb&p=hbu&t=success');
		} else{
			header('location:../extend/alerta.php?msj=La facilidad de habitacion no ha podido ser bloqueada&c=hb&p=hbu&t=error');
		}
	}

	$con->close();

	    break;

	    case "eliminar_mlt_habitacion_facilitys":


	    $del = $con-> query("DELETE FROM mlt_habitacion_facilitys WHERE fac_id=$fac_id ");

	    if($del){
		header('location:../extend/alerta.php?msj=Facilidad de habitacion Eliminada&c=hb&p=hbu&t=success');
	    } else{
		header('location:../extend/alerta.php?msj=La facilidad de habitacion no pudo ser eliminada por tener un constraint&c=hb&p=hbu&t=error');
	    }

	    $con->close();

	    break;

}

//}else{
//	header('location:../extend/alerta.php?msj=Utiliza el formulario&c=ho&p=in&t=error');
//}


?>

