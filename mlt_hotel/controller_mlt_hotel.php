<?php
include '../conexion/conexion.php';
$op = $con->real_escape_string(htmlentities($_GET['op']));
$hot_id = $_SESSION['Hotel'];
$bloqueo = $con->real_escape_string(htmlentities($_GET['bl']));


//if($_SERVER['REQUEST_METHOD'] == 'POST'){

	switch ($op) {

	    case "insertar_mlt_hotel":
	$idi_id = $con->real_escape_string(htmlentities($_POST['idi_id']));
	$hot_nombre = $con->real_escape_string(htmlentities($_POST['hot_nombre']));
	$hot_direccion = $con->real_escape_string(htmlentities($_POST['hot_direccion']));
	$hot_ciudad = $con->real_escape_string(htmlentities($_POST['hot_ciudad']));
	$hot_pais = $con->real_escape_string(htmlentities($_POST['hot_pais']));
	$hot_ejex = $con->real_escape_string(htmlentities($_POST['hot_ejex']));
	$hot_ejey = $con->real_escape_string(htmlentities($_POST['hot_ejey']));
	$hot_email = $con->real_escape_string(htmlentities($_POST['hot_email']));
	$hot_telefono = $con->real_escape_string(htmlentities($_POST['hot_telefono']));
	$hot_estrellas = $con->real_escape_string(htmlentities($_POST['hot_estrellas']));
	$hot_imagen = $con->real_escape_string(htmlentities($_POST['hot_imagen']));
	$hot_descripcion = $con->real_escape_string(htmlentities($_POST['hot_descripcion']));

//	if(empty($idi_id) || empty($hot_nombre) || empty($hot_direccion) || empty($hot_ciudad) || empty($hot_pais) || empty($hot_ejex) || empty($hot_ejey) || empty($hot_email) || empty($hot_telefono) || empty($hot_estrellas) || empty($hot_imagen) || empty($hot_descripcion))
//	{
//            header('location:../extend/alerta.php?msj=Hay un campo sin especificar&c=ho&p=in&t=error');
//            exit;
//	}

	        $ins = $con->query("INSERT INTO mlt_hotel (idi_id, hot_nombre, hot_direccion, hot_ciudad, hot_pais, hot_ejex, hot_ejey, hot_email, hot_telefono, hot_estrellas, hot_imagen, hot_descripcion, hot_estado) VALUES ( $idi_id, '$hot_nombre', '$hot_direccion', '$hot_ciudad', '$hot_pais', '$hot_ejex', '$hot_ejey', '$hot_email', $hot_telefono, $hot_estrellas, '$hot_imagen', '$hot_descripcion', 1) ");
	        if($ins){
              header('location:../extend/alerta.php?msj=El hotel ha sido registrado&c=ho&p=home&t=success');
	        }else{
              header('location:../extend/alerta.php?msj=El hotel no pudo ser registrado&c=ho&p=hoi&t=error');
	        }

	        $con->close();

	    break;


	    case "modificar_mlt_hotel":



	$idi_id = $con->real_escape_string(htmlentities($_POST['idi_id']));
	$hot_nombre = $con->real_escape_string(htmlentities($_POST['hot_nombre']));
	$hot_direccion = $con->real_escape_string(htmlentities($_POST['hot_direccion']));
	$hot_ciudad = $con->real_escape_string(htmlentities($_POST['hot_ciudad']));
	$hot_pais = $con->real_escape_string(htmlentities($_POST['hot_pais']));
	$hot_ejex = $con->real_escape_string(htmlentities($_POST['hot_ejex']));
	$hot_ejey = $con->real_escape_string(htmlentities($_POST['hot_ejey']));
	$hot_email = $con->real_escape_string(htmlentities($_POST['hot_email']));
	$hot_telefono = $con->real_escape_string(htmlentities($_POST['hot_telefono']));
	$hot_estrellas = $con->real_escape_string(htmlentities($_POST['hot_estrellas']));
	$hot_imagen = $con->real_escape_string(htmlentities($_POST['hot_imagen']));
	$hot_descripcion = $con->real_escape_string(htmlentities($_POST['hot_descripcion']));

//	if()
//	{
//            header('location:../extend/alerta.php?msj=Hay un campo sin especificar&c=ho&p=in&t=error');
//            exit;
//	}

	$up = $con->query("UPDATE mlt_hotel SET idi_id = $idi_id, hot_nombre = '$hot_nombre', hot_direccion = '$hot_direccion', hot_ciudad = '$hot_ciudad', hot_pais = '$hot_pais', hot_ejex = '$hot_ejex', hot_ejey = '$hot_ejey', hot_email = '$hot_email', hot_telefono = $hot_telefono, hot_estrellas = $hot_estrellas, hot_imagen = '$hot_imagen', hot_descripcion = '$hot_descripcion' where hot_id = $hot_id");
	if($up){
		header('location:../extend/alerta.php?msj=El hotel ha sido modificado&c=ho&p=home&t=success');
	}else{
		header('location:../extend/alerta.php?msj=El hotel no pudo ser modificado&c=ho&p=hou&t=error');
	}
	
	$con->close();


	    break;


	    case "bloquear_mlt_hotel":


        if($bloqueo == 1){
		$up = $con->query("UPDATE mlt_hotel SET hot_estado = 0 WHERE hot_id = $hot_id ");
		if($up){
			header('location:../extend/alerta.php?msj=El hotel a sido bloqueado&c=ho&p=home&t=success');
		} else{
			header('location:../extend/alerta.php?msj=El hotel no ha podido ser bloqueado&c=ho&p=home&t=error');
		}
	} else {
		$up = $con->query("UPDATE mlt_hotel SET hot_estado = 1 WHERE hot_id = $hot_id ");
		if($up){
			header('location:../extend/alerta.php?msj=El hotel a sido desbloqueado&c=ho&p=home&t=success');
		} else{
			header('location:../extend/alerta.php?msj=El hotel no ha podido ser bloqueado&c=ho&p=home&t=error');
		}
	}

	$con->close();

	    break;


	    case "eliminar_mlt_hotel":


	    $del = $con-> query("DELETE FROM mlt_hotel WHERE hot_id=$hot_id ");

	    if($del){
		header('location:../extend/alerta.php?msj=Hotel Eliminado&c=ho&p=home&t=success');
	    } else{
		header('location:../extend/alerta.php?msj=El hotel no pudo ser eliminado por tener un constraint&c=ho&p=home&t=error');
	    }

	    $con->close();

	    break;

}

//}else{
//	header('location:../extend/alerta.php?msj=Utiliza el formulario&c=ho&p=in&t=error');
//}


?>

