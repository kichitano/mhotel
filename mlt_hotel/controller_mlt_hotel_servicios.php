<?php
include '../conexion/conexion.php';
$op = $con->real_escape_string(htmlentities($_GET['op']));
$seh_id = $con->real_escape_string(htmlentities($_GET['id']));
$bloqueo = $con->real_escape_string(htmlentities($_GET['bl']));


//if($_SERVER['REQUEST_METHOD'] == 'POST'){

	switch ($op) {

	    case "insertar_mlt_hotel_servicios":
	if($_SESSION['nivel'] == 0)
	{
		$hot_id = $_SESSION['Hotel'];	
	}
	else
	{
		$hot_id = $_SESSION['hot_id'];
	}
	$seh_nombre = $con->real_escape_string(htmlentities($_POST['seh_nombre']));
	$seh_imagen = $con->real_escape_string(htmlentities($_POST['seh_imagen']));
	$seh_descripcion = $con->real_escape_string(htmlentities($_POST['seh_descripcion']));

//	if(empty($hot_id) || empty($seh_nombre) || empty($seh_imagen) || empty($seh_descripcion))
//	{
//            header('location:../extend/alerta.php?msj=Hay un campo sin especificar&c=ho&p=in&t=error');
//            exit;
//	}

	        $ins = $con->query("INSERT INTO mlt_hotel_servicios (hot_id, seh_nombre, seh_imagen, seh_descripcion, seh_estado) VALUES ( $hot_id, '$seh_nombre', '$seh_imagen', '$seh_descripcion', 1) ");
	        if($ins){

	        	if($_SESSION['nivel'] == 0)
	        	{
	        		header('location:../extend/alerta.php?msj=El servicio ha sido registrado&c=ho&p=hou&t=success');
	        	}
	        	else if($_SESSION['nivel'] == 1)
	        	{
	        		header('location:../extend/alerta.php?msj=El servicio ha sido registrado&c=ho&p=ahsa&t=success');
	        	}
	        	else
	        	{
	        		header('location:../extend/alerta.php?msj=El servicio ha sido registrado&c=ho&p=rhsa&t=success');
	        	}
              
	        }else{
	        	if($_SESSION['nivel'] == 0)
	        	{
	        		header('location:../extend/alerta.php?msj=El servicio no pudo ser registrado&c=ho&p=hsi&t=error');
	        	}
	        	else if($_SESSION['nivel'] == 1)
	        	{
	        		header('location:../extend/alerta.php?msj=El servicio no pudo ser registrado&c=ho&p=ahsi&t=error');
	        	}
	        	else
	        	{
	        		header('location:../extend/alerta.php?msj=El servicio no pudo ser registrado&c=ho&p=rhsi&t=error');
	        	}
              
	        }

	        $con->close();

	    break;


	    case "modificar_mlt_hotel_servicios":


	if($_SESSION['nivel'] == 0)
	{
		$hot_id = $_SESSION['Hotel'];	
	}
	else
	{
		$hot_id = $_SESSION['hot_id'];
	}
	
	$seh_nombre = $con->real_escape_string(htmlentities($_POST['seh_nombre']));
	$seh_imagen = $con->real_escape_string(htmlentities($_POST['seh_imagen']));
	$seh_descripcion = $con->real_escape_string(htmlentities($_POST['seh_descripcion']));

//	if()
//	{
//            header('location:../extend/alerta.php?msj=Hay un campo sin especificar&c=ho&p=in&t=error');
//            exit;
//	}

	$up = $con->query("UPDATE mlt_hotel_servicios SET hot_id = $hot_id, seh_nombre = '$seh_nombre', seh_imagen = '$seh_imagen', seh_descripcion = '$seh_descripcion' where seh_id = $seh_id");
	if($up){
		if($_SESSION['nivel'] == 0)
	        	{
	        		header('location:../extend/alerta.php?msj=El servicio ha sido modificado&c=ho&p=hou&t=success');
	        	}
	        	else if($_SESSION['nivel'] == 1)
	        	{
	        		header('location:../extend/alerta.php?msj=El servicio ha sido modificado&c=ho&p=ahsa&t=success');
	        	}
	        	else
	        	{
	        		header('location:../extend/alerta.php?msj=El servicio ha sido modificado&c=ho&p=rhsa&t=success');
	        	}
		
	}else{
		if($_SESSION['nivel'] == 0)
	        	{
	        		header('location:../extend/alerta.php?msj=El servicio no pudo ser modificado&c=ho&p=hou&t=error');
	        	}
	        	else if($_SESSION['nivel'] == 1)
	        	{
	        		header('location:../extend/alerta.php?msj=El servicio no pudo ser modificado&c=ho&p=ahsu&t=error');
	        	}
	        	else
	        	{
	        		header('location:../extend/alerta.php?msj=El servicio no pudo ser modificado&c=ho&p=rhsu&t=error');
	        	}
	}
	
	$con->close();


	    break;


	    case "bloquear_mlt_hotel_servicios":


        if($bloqueo == 1){
		$up = $con->query("UPDATE mlt_hotel_servicios SET seh_estado = 0 WHERE seh_id = $seh_id ");
		if($up){
			if($_SESSION['nivel'] == 0)
	        	{
	        		header('location:../extend/alerta.php?msj=El servicio a sido bloqueado&c=ho&p=hou&t=success');
	        	}
	        	else if($_SESSION['nivel'] == 1)
	        	{
	        		header('location:../extend/alerta.php?msj=El servicio a sido bloqueado&c=ho&p=ahsa&t=success');
	        	}
	        	else
	        	{
	        		header('location:../extend/alerta.php?msj=El servicio a sido bloqueado&c=ho&p=rhsa&t=success');
	        	}
			
		} else{
			if($_SESSION['nivel'] == 0)
	        	{
	        		header('location:../extend/alerta.php?msj=El servicio no ha podido ser bloqueado&c=ho&p=hou&t=error');
	        	}
	        	else if($_SESSION['nivel'] == 1)
	        	{
	        		header('location:../extend/alerta.php?msj=El servicio no ha podido ser bloqueado&c=ho&p=ahsa&t=error');
	        	}
	        	else
	        	{
	        		header('location:../extend/alerta.php?msj=El servicio no ha podido ser bloqueado&c=ho&p=rhsa&t=error');
	        	}
		}
	} else {
		$up = $con->query("UPDATE mlt_hotel_servicios SET seh_estado = 1 WHERE seh_id = $seh_id ");
		if($up){
			if($_SESSION['nivel'] == 0)
	        	{
	        		header('location:../extend/alerta.php?msj=El servicio a sido desbloqueado&c=ho&p=hou&t=success');
	        	}
	        	else if($_SESSION['nivel'] == 1)
	        	{
	        		header('location:../extend/alerta.php?msj=El servicio a sido desbloqueado&c=ho&p=ahsa&t=success');
	        	}
	        	else
	        	{
	        		header('location:../extend/alerta.php?msj=El servicio a sido desbloqueado&c=ho&p=rhsa&t=success');
	        	}
		} else{
			if($_SESSION['nivel'] == 0)
	        	{
	        		header('location:../extend/alerta.php?msj=El servicio no ha podido ser bloqueado&c=ho&p=hou&t=error');
	        	}
	        	else if($_SESSION['nivel'] == 1)
	        	{
	        		header('location:../extend/alerta.php?msj=El servicio no ha podido ser bloqueado&c=ho&p=ahsa&t=error');
	        	}
	        	else
	        	{
	        		header('location:../extend/alerta.php?msj=El servicio no ha podido ser bloqueado&c=ho&p=rhsa&t=error');
	        	}
		}
	}

	$con->close();

	    break;


	    case "eliminar_mlt_hotel_servicios":


	    $del = $con-> query("DELETE FROM mlt_hotel_servicios WHERE seh_id=$seh_id ");

	    if($del){
	    	if($_SESSION['nivel'] == 0)
	        	{
	        		header('location:../extend/alerta.php?msj=Servicio Eliminado&c=ho&p=hou&t=success');
	        	}
	        	else if($_SESSION['nivel'] == 1)
	        	{
	        		header('location:../extend/alerta.php?msj=Servicio Eliminado&c=ho&p=ahsa&t=success');
	        	}
	        	else
	        	{
	        		header('location:../extend/alerta.php?msj=Servicio Eliminado&c=ho&p=rhsa&t=success');
	        	}
		
	    } else{
	    	if($_SESSION['nivel'] == 0)
	        	{
	        		header('location:../extend/alerta.php?msj=El servicio no pudo ser eliminado por tener un constraint&c=ho&p=hou&t=error');
	        	}
	        	else if($_SESSION['nivel'] == 1)
	        	{
	        		header('location:../extend/alerta.php?msj=El servicio no pudo ser eliminado por tener un constraint&c=ho&p=ahsa&t=error');
	        	}
	        	else
	        	{
	        		header('location:../extend/alerta.php?msj=El servicio no pudo ser eliminado por tener un constraint&c=ho&p=rhsa&t=error');
	        	}
	    }

	    $con->close();

	    break;

}

//}else{
//	header('location:../extend/alerta.php?msj=Utiliza el formulario&c=ho&p=in&t=error');
//}


?>

