<?php
include '../conexion/conexion.php';
$op = $con->real_escape_string(htmlentities($_GET['op']));
$ext_id = $con->real_escape_string(htmlentities($_GET['id']));
$bloqueo = $con->real_escape_string(htmlentities($_GET['bl']));


//if($_SERVER['REQUEST_METHOD'] == 'POST'){

	switch ($op) {

	    case "insertar_mlt_extras":
	$hot_id = $con->real_escape_string(htmlentities($_POST['hot_id']));
	$ext_nombre = $con->real_escape_string(htmlentities($_POST['ext_nombre']));
	$ext_descripcion = $con->real_escape_string(htmlentities($_POST['ext_descripcion']));
	$ext_precio = $con->real_escape_string(htmlentities($_POST['ext_precio']));

//	if(empty($hot_id) || empty($ext_nombre) || empty($ext_descripcion) || empty($ext_precio))
//	{
//            header('location:../extend/alerta.php?msj=Hay un campo sin especificar&c=ho&p=in&t=error');
//            exit;
//	}

	        $ins = $con->query("INSERT INTO mlt_extras (hot_id, ext_nombre, ext_descripcion, ext_precio, ext_estado) VALUES ( $hot_id, '$ext_nombre', '$ext_descripcion', $ext_precio, 1) ");
	        if($ins){
              header('location:../extend/alerta.php?msj=El extra ha sido registrado&c=ex&p=home&t=success');
	        }else{
              header('location:../extend/alerta.php?msj=El extra no pudo ser registrado&c=ex&p=exi&t=error');
	        }

	        $con->close();

	    break;


	    case "modificar_mlt_extras":



	$hot_id = $con->real_escape_string(htmlentities($_POST['hot_id']));
	$ext_nombre = $con->real_escape_string(htmlentities($_POST['ext_nombre']));
	$ext_descripcion = $con->real_escape_string(htmlentities($_POST['ext_descripcion']));
	$ext_precio = $con->real_escape_string(htmlentities($_POST['ext_precio']));

//	if()
//	{
//            header('location:../extend/alerta.php?msj=Hay un campo sin especificar&c=ho&p=in&t=error');
//            exit;
//	}

	$up = $con->query("UPDATE mlt_extras SET hot_id = $hot_id, ext_nombre = '$ext_nombre', ext_descripcion = '$ext_descripcion', ext_precio = $ext_precio where ext_id = $ext_id");
	if($up){
		header('location:../extend/alerta.php?msj=El extra ha sido modificado&c=ex&p=home&t=success');
	}else{
		header('location:../extend/alerta.php?msj=El extra no pudo ser modificado&c=ex&p=exu&t=error');
	}
	
	$con->close();


	    break;


	    case "bloquear_mlt_extras":


        if($bloqueo == 1){
		$up = $con->query("UPDATE mlt_extras SET ext_estado = 0 WHERE ext_id = $ext_id ");
		if($up){
			header('location:../extend/alerta.php?msj=El extra a sido bloqueado&c=ex&p=home&t=success');
		} else{
			header('location:../extend/alerta.php?msj=El extra no ha podido ser bloqueado&c=ex&p=home&t=error');
		}
	} else {
		$up = $con->query("UPDATE mlt_extras SET ext_estado = 1 WHERE ext_id = $ext_id ");
		if($up){
			header('location:../extend/alerta.php?msj=El extra a sido desbloqueado&c=ex&p=home&t=success');
		} else{
			header('location:../extend/alerta.php?msj=El extra no ha podido ser bloqueado&c=ex&p=home&t=error');
		}
	}

	$con->close();

	    break;


	    case "eliminar_mlt_extras":


	    $del = $con-> query("DELETE FROM mlt_extras WHERE ext_id=$ext_id ");

	    if($del){
		header('location:../extend/alerta.php?msj=Extra Eliminado&c=ex&p=home&t=success');
	    } else{
		header('location:../extend/alerta.php?msj=El extra no pudo ser eliminado&c=ex&p=home&t=error');
	    }

	    $con->close();

	    break;

}

//}else{
//	header('location:../extend/alerta.php?msj=Utiliza el formulario&c=ho&p=in&t=error');
//}


?>

