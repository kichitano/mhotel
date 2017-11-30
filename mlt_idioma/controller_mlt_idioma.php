<?php
include '../conexion/conexion.php';
$op = $con->real_escape_string(htmlentities($_GET['op']));
$idi_id = $con->real_escape_string(htmlentities($_GET['id']));
$bloqueo = $con->real_escape_string(htmlentities($_GET['bl']));


//if($_SERVER['REQUEST_METHOD'] == 'POST'){

	switch ($op) {

	    case "insertar_mlt_idioma":
	$idi_nombre = $con->real_escape_string(htmlentities($_POST['idi_nombre']));
	$idi_abreviatura = $con->real_escape_string(htmlentities($_POST['idi_abreviatura']));
	$idi_descripcion = $con->real_escape_string(htmlentities($_POST['idi_descripcion']));

//	if(empty($idi_nombre) || empty($idi_abreviatura) || empty($idi_descripcion))
//	{
//            header('location:../extend/alerta.php?msj=Hay un campo sin especificar&c=ho&p=in&t=error');
//            exit;
//	}

	        $ins = $con->query("INSERT INTO mlt_idioma (idi_nombre, idi_abreviatura, idi_descripcion, idi_estado) VALUES ( '$idi_nombre', '$idi_abreviatura', '$idi_descripcion', 1) ");
	        if($ins){
              header('location:../extend/alerta.php?msj=El idioma ha sido registrado&c=id&p=home&t=success');
	        }else{
              header('location:../extend/alerta.php?msj=El idioma no pudo ser registrado&c=id&p=idi&t=error');
	        }

	        $con->close();

	    break;


	    case "modificar_mlt_idioma":



	$idi_nombre = $con->real_escape_string(htmlentities($_POST['idi_nombre']));
	$idi_abreviatura = $con->real_escape_string(htmlentities($_POST['idi_abreviatura']));
	$idi_descripcion = $con->real_escape_string(htmlentities($_POST['idi_descripcion']));

//	if()
//	{
//            header('location:../extend/alerta.php?msj=Hay un campo sin especificar&c=ho&p=in&t=error');
//            exit;
//	}

	$up = $con->query("UPDATE mlt_idioma SET idi_nombre = '$idi_nombre', idi_abreviatura = '$idi_abreviatura', idi_descripcion = '$idi_descripcion' where idi_id = $idi_id");
	if($up){
		header('location:../extend/alerta.php?msj=El idioma ha sido modificado&c=id&p=home&t=success');
	}else{
		header('location:../extend/alerta.php?msj=El idioma no pudo ser modificado&c=id&p=idu&t=error');
	}
	
	$con->close();


	    break;


	    case "bloquear_mlt_idioma":


        if($bloqueo == 1){
		$up = $con->query("UPDATE mlt_idioma SET idi_estado = 0 WHERE idi_id = $idi_id ");
		if($up){
			header('location:../extend/alerta.php?msj=El idioma a sido bloqueado&c=id&p=home&t=success');
		} else{
			header('location:../extend/alerta.php?msj=El idioma no ha podido ser bloqueado&c=id&p=home&t=error');
		}
	} else {
		$up = $con->query("UPDATE mlt_idioma SET idi_estado = 1 WHERE idi_id = $idi_id ");
		if($up){
			header('location:../extend/alerta.php?msj=El idioma a sido desbloqueado&c=id&p=home&t=success');
		} else{
			header('location:../extend/alerta.php?msj=El idioma no ha podido ser bloqueado&c=id&p=home&t=error');
		}
	}

	$con->close();

	    break;


	    case "eliminar_mlt_idioma":


	    $del = $con-> query("DELETE FROM mlt_idioma WHERE idi_id=$idi_id ");

	    if($del){
		header('location:../extend/alerta.php?msj=Idioma Eliminado&c=id&p=home&t=success');
	    } else{
		header('location:../extend/alerta.php?msj=El idioma no pudo ser eliminado&c=id&p=home&t=error');
	    }

	    $con->close();

	    break;

}

//}else{
//	header('location:../extend/alerta.php?msj=Utiliza el formulario&c=ho&p=in&t=error');
//}


?>

