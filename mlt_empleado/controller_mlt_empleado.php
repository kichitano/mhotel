<?php
include '../conexion/conexion.php';
$op = $con->real_escape_string(htmlentities($_GET['op']));
$emp_id = $con->real_escape_string(htmlentities($_GET['id']));
$bloqueo = $con->real_escape_string(htmlentities($_GET['bl']));


//if($_SERVER['REQUEST_METHOD'] == 'POST'){

	switch ($op) {

	    case "insertar_mlt_empleado":
	$hot_id = $con->real_escape_string(htmlentities($_POST['hot_id']));
	$emp_nombre = $con->real_escape_string(htmlentities($_POST['emp_nombre']));
	$emp_apellido = $con->real_escape_string(htmlentities($_POST['emp_apellido']));
	$emp_dni = $con->real_escape_string(htmlentities($_POST['emp_dni']));
	$emp_sexo = $con->real_escape_string(htmlentities($_POST['emp_sexo']));
	$emp_ciudad = $con->real_escape_string(htmlentities($_POST['emp_ciudad']));
	$emp_pais = $con->real_escape_string(htmlentities($_POST['emp_pais']));
	$emp_codigopostal = $con->real_escape_string(htmlentities($_POST['emp_codigopostal']));
	$emp_fechanacimiento = $con->real_escape_string(htmlentities($_POST['emp_fechanacimiento']));
	$emp_telefono = $con->real_escape_string(htmlentities($_POST['emp_telefono']));
	$emp_email = $con->real_escape_string(htmlentities($_POST['emp_email']));
	$emp_fechacontrato = $con->real_escape_string(htmlentities($_POST['emp_fechacontrato']));
	$emp_usuario = $con->real_escape_string(htmlentities($_POST['emp_usuario']));
	$emp_pass = $con->real_escape_string(htmlentities($_POST['emp_pass']));
	$emp_cargo = $con->real_escape_string(htmlentities($_POST['emp_cargo']));

//	if(empty($hot_id) || empty($emp_nombre) || empty($emp_apellido) || empty($emp_dni) || empty($emp_sexo) || empty($emp_ciudad) || empty($emp_pais) || empty($emp_codigopostal) || empty($emp_fechanacimiento) || empty($emp_telefono) || empty($emp_email) || empty($emp_fechacontrato) || empty($emp_usuario) || empty($emp_pass) || empty($emp_cargo))
//	{
//            header('location:../extend/alerta.php?msj=Hay un campo sin especificar&c=ho&p=in&t=error');
//            exit;
//	}

	        $ins = $con->query("INSERT INTO mlt_empleado (hot_id, emp_nombre, emp_apellido, emp_dni, emp_sexo, emp_ciudad, emp_pais, emp_codigopostal, emp_fechanacimiento, emp_telefono, emp_email, emp_fechacontrato, emp_usuario, emp_pass, emp_cargo, emp_estado) VALUES ( $hot_id, '$emp_nombre', '$emp_apellido', '$emp_dni', $emp_sexo, '$emp_ciudad', '$emp_pais', '$emp_codigopostal', '$emp_fechanacimiento', $emp_telefono, '$emp_email', '$emp_fechacontrato', '$emp_usuario', '$emp_pass', $emp_cargo, 1) ");
	        if($ins){
              header('location:../extend/alerta.php?msj=El empleado ha sido registrado&c=em&p=home&t=success');
	        }else{
              header('location:../extend/alerta.php?msj=El empleado no pudo ser registrado&c=em&p=emi&t=error');
	        }

	        $con->close();

	    break;


	    case "modificar_mlt_empleado":



	$hot_id = $con->real_escape_string(htmlentities($_POST['hot_id']));
	$emp_nombre = $con->real_escape_string(htmlentities($_POST['emp_nombre']));
	$emp_apellido = $con->real_escape_string(htmlentities($_POST['emp_apellido']));
	$emp_dni = $con->real_escape_string(htmlentities($_POST['emp_dni']));
	$emp_sexo = $con->real_escape_string(htmlentities($_POST['emp_sexo']));
	$emp_ciudad = $con->real_escape_string(htmlentities($_POST['emp_ciudad']));
	$emp_pais = $con->real_escape_string(htmlentities($_POST['emp_pais']));
	$emp_codigopostal = $con->real_escape_string(htmlentities($_POST['emp_codigopostal']));
	$emp_fechanacimiento = $con->real_escape_string(htmlentities($_POST['emp_fechanacimiento']));
	$emp_telefono = $con->real_escape_string(htmlentities($_POST['emp_telefono']));
	$emp_email = $con->real_escape_string(htmlentities($_POST['emp_email']));
	$emp_fechacontrato = $con->real_escape_string(htmlentities($_POST['emp_fechacontrato']));
	$emp_usuario = $con->real_escape_string(htmlentities($_POST['emp_usuario']));
	$emp_pass = $con->real_escape_string(htmlentities($_POST['emp_pass']));
	$emp_cargo = $con->real_escape_string(htmlentities($_POST['emp_cargo']));

//	if()
//	{
//            header('location:../extend/alerta.php?msj=Hay un campo sin especificar&c=ho&p=in&t=error');
//            exit;
//	}

	$up = $con->query("UPDATE mlt_empleado SET hot_id = $hot_id, emp_nombre = '$emp_nombre', emp_apellido = '$emp_apellido', emp_dni = '$emp_dni', emp_sexo = $emp_sexo, emp_ciudad = '$emp_ciudad', emp_pais = '$emp_pais', emp_codigopostal = '$emp_codigopostal', emp_fechanacimiento = '$emp_fechanacimiento', emp_telefono = $emp_telefono, emp_email = '$emp_email', emp_fechacontrato = '$emp_fechacontrato', emp_usuario = '$emp_usuario', emp_pass = '$emp_pass', emp_cargo = $emp_cargo where emp_id = $emp_id");
	if($up){
		header('location:../extend/alerta.php?msj=El empleado ha sido modificado&c=em&p=home&t=success');
	}else{
		header('location:../extend/alerta.php?msj=El empleado no pudo ser modificado&c=em&p=emu&t=error');
	}
	
	$con->close();


	    break;


	    case "bloquear_mlt_empleado":


        if($bloqueo == 1){
		$up = $con->query("UPDATE mlt_empleado SET emp_estado = 0 WHERE emp_id = $emp_id ");
		if($up){
			header('location:../extend/alerta.php?msj=El empleado a sido bloqueado&c=em&p=home&t=success');
		} else{
			header('location:../extend/alerta.php?msj=El empleado no ha podido ser bloqueado&c=em&p=home&t=error');
		}
	} else {
		$up = $con->query("UPDATE mlt_empleado SET emp_estado = 1 WHERE emp_id = $emp_id ");
		if($up){
			header('location:../extend/alerta.php?msj=El empleado a sido desbloqueado&c=em&p=home&t=success');
		} else{
			header('location:../extend/alerta.php?msj=El empleado no ha podido ser bloqueado&c=em&p=home&t=error');
		}
	}

	$con->close();

	    break;


	    case "eliminar_mlt_empleado":


	    $del = $con-> query("DELETE FROM mlt_empleado WHERE emp_id=$emp_id ");

	    if($del){
		header('location:../extend/alerta.php?msj=Empleado Eliminado&c=em&p=home&t=success');
	    } else{
		header('location:../extend/alerta.php?msj=El empleado no pudo ser eliminado por tener un constraint&c=em&p=home&t=error');
	    }

	    $con->close();

	    break;

}

//}else{
//	header('location:../extend/alerta.php?msj=Utiliza el formulario&c=ho&p=in&t=error');
//}


?>

