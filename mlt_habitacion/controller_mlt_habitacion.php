<?php
include '../conexion/conexion.php';
$op = $con->real_escape_string(htmlentities($_GET['op']));
$hab_id = $con->real_escape_string(htmlentities($_GET['id']));
$bloqueo = $con->real_escape_string(htmlentities($_GET['bl']));


//if($_SERVER['REQUEST_METHOD'] == 'POST'){

	switch ($op) {

	    case "insertar_mlt_habitacion":
	    
	    if($_SESSION['nivel'] == 0)
	    {
	    	$hot_id = $con->real_escape_string(htmlentities($_POST['hot_id']));
	    }
	    else
	    {
	    	$hot_id = $_SESSION['hot_id'];
	    }
	
	$hab_nombre = $con->real_escape_string(htmlentities($_POST['hab_nombre']));
	$hab_imagen = $con->real_escape_string(htmlentities($_POST['hab_imagen']));
	$hab_precio = $con->real_escape_string(htmlentities($_POST['hab_precio']));
	$hab_ocupacion = $con->real_escape_string(htmlentities($_POST['hab_ocupacion']));
	$hab_descripcion = $con->real_escape_string(htmlentities($_POST['hab_descripcion']));

//	if(empty($hot_id) || empty($hab_nombre) || empty($hab_imagen) || empty($hab_precio) || empty($hab_ocupacion) || empty($hab_descripcion))
//	{
//            header('location:../extend/alerta.php?msj=Hay un campo sin especificar&c=ho&p=in&t=error');
//            exit;
//	}

	        $ins = $con->query("INSERT INTO mlt_habitacion (hot_id, hab_nombre, hab_imagen, hab_precio, hab_ocupacion, hab_descripcion, hab_estado) VALUES ( $hot_id, '$hab_nombre', '$hab_imagen', $hab_precio, $hab_ocupacion, '$hab_descripcion', 1) ");
	        if($ins){
              header('location:../extend/alerta.php?msj=La habitacion ha sido registrada&c=hb&p=home&t=success');
	        }else{
              header('location:../extend/alerta.php?msj=La habitacion no pudo ser registrada&c=hb&p=hbi&t=error');
	        }

	        $con->close();

	    break;


	    case "modificar_mlt_habitacion":

	if($_SESSION['nivel'] == 0)
	    {
	    	$hot_id = $con->real_escape_string(htmlentities($_POST['hot_id']));
	    }
	    else
	    {
	    	$hot_id = $_SESSION['hot_id'];
	    }

	$hab_nombre = $con->real_escape_string(htmlentities($_POST['hab_nombre']));
	$hab_imagen = $con->real_escape_string(htmlentities($_POST['hab_imagen']));
	$hab_precio = $con->real_escape_string(htmlentities($_POST['hab_precio']));
	$hab_ocupacion = $con->real_escape_string(htmlentities($_POST['hab_ocupacion']));
	$hab_descripcion = $con->real_escape_string(htmlentities($_POST['hab_descripcion']));

//	if()
//	{
//            header('location:../extend/alerta.php?msj=Hay un campo sin especificar&c=ho&p=in&t=error');
//            exit;
//	}

	$up = $con->query("UPDATE mlt_habitacion SET hot_id = $hot_id, hab_nombre = '$hab_nombre', hab_imagen = '$hab_imagen', hab_precio = $hab_precio, hab_ocupacion = $hab_ocupacion, hab_descripcion = '$hab_descripcion' where hab_id = $hab_id");
	if($up){
		header('location:../extend/alerta.php?msj=La habitacion ha sido modificada&c=hb&p=home&t=success');
	}else{
		header('location:../extend/alerta.php?msj=La habitacion no pudo ser modificada&c=hb&p=hbu&t=error');
	}
	
	$con->close();


	    break;


	    case "bloquear_mlt_habitacion":


        if($bloqueo == 1){
		$up = $con->query("UPDATE mlt_habitacion SET hab_estado = 0 WHERE hab_id = $hab_id ");
		if($up){
			header('location:../extend/alerta.php?msj=La habitacion a sido bloqueada&c=hb&p=home&t=success');
		} else{
			header('location:../extend/alerta.php?msj=La habitacion no ha podido ser bloqueada&c=hb&p=home&t=error');
		}
	} else {
		$up = $con->query("UPDATE mlt_habitacion SET hab_estado = 1 WHERE hab_id = $hab_id ");
		if($up){
			header('location:../extend/alerta.php?msj=La habitacion a sido desbloqueada&c=hb&p=home&t=success');
		} else{
			header('location:../extend/alerta.php?msj=La habitacion no ha podido ser bloqueada& c=hb&p=home&t=error');
		}
	}

	$con->close();

	    break;


	    case "eliminar_mlt_habitacion":


	    $del = $con-> query("DELETE FROM mlt_habitacion WHERE hab_id = $hab_id ");

	    if($del){
		header('location:../extend/alerta.php?msj=Habitacion Eliminada&c=hb&p=home&t=success');
	    } else{
		header('location:../extend/alerta.php?msj=La habitacion no pudo ser eliminada por tener un constraint&c=hb&p=home&t=error');
	    }

	    $con->close();

	    break;

}

//}else{
//	header('location:../extend/alerta.php?msj=Utiliza el formulario&c=ho&p=in&t=error');
//}


?>

