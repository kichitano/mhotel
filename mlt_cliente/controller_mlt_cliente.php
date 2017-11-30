<?php
include '../conexion/conexion.php';
$op = $con->real_escape_string(htmlentities($_GET['op']));
$cli_id = $con->real_escape_string(htmlentities($_GET['id']));
$bloqueo = $con->real_escape_string(htmlentities($_GET['bl']));


//if($_SERVER['REQUEST_METHOD'] == 'POST'){

	switch ($op) {

	    case "insertar_mlt_cliente":
	$cli_nombre = $con->real_escape_string(htmlentities($_POST['cli_nombre']));
	$cli_apellido = $con->real_escape_string(htmlentities($_POST['cli_apellido']));
	$cli_dni = $con->real_escape_string(htmlentities($_POST['cli_dni']));
	$cli_sexo = $con->real_escape_string(htmlentities($_POST['cli_sexo']));
	$cli_empresa = $con->real_escape_string(htmlentities($_POST['cli_empresa']));
	$cli_ciudad = $con->real_escape_string(htmlentities($_POST['cli_ciudad']));
	$cli_pais = $con->real_escape_string(htmlentities($_POST['cli_pais']));
	$cli_codigopostal = $con->real_escape_string(htmlentities($_POST['cli_codigopostal']));
	$cli_fechanacimiento = $con->real_escape_string(htmlentities($_POST['cli_fechanacimiento']));
	$cli_telefono = $con->real_escape_string(htmlentities($_POST['cli_telefono']));
	$cli_email = $con->real_escape_string(htmlentities($_POST['cli_email']));
	$cli_pass = $con->real_escape_string(htmlentities($_POST['cli_pass']));

//	if(empty($cli_nombre) || empty($cli_apellido) || empty($cli_dni) || empty($cli_sexo) || empty($cli_empresa) || empty($cli_ciudad) || empty($cli_pais) || empty($cli_codigopostal) || empty($cli_fechanacimiento) || empty($cli_telefono) || empty($cli_email) || empty($cli_pass))
//	{
//            header('location:../extend/alerta.php?msj=Hay un campo sin especificar&c=ho&p=in&t=error');
//            exit;
//	}

	        $ins = $con->query("INSERT INTO mlt_cliente (cli_nombre, cli_apellido, cli_dni, cli_sexo, cli_empresa, cli_ciudad, cli_pais, cli_codigopostal, cli_fechanacimiento, cli_telefono, cli_email, cli_pass, cli_estado) VALUES ( '$cli_nombre', '$cli_apellido', '$cli_dni', $cli_sexo, '$cli_empresa', '$cli_ciudad', '$cli_pais', '$cli_codigopostal', '$cli_fechanacimiento', $cli_telefono, '$cli_email', '$cli_pass', 1) ");
	        if($ins){
              header('location:../extend/alerta.php?msj=El cliente ha sido registrado&c=cl&p=home&t=success');
	        }else{
              header('location:../extend/alerta.php?msj=El cliente no pudo ser registrado&c=cl&p=cli&t=error');
	        }

	        $con->close();

	    break;


	    case "modificar_mlt_cliente":



	$cli_nombre = $con->real_escape_string(htmlentities($_POST['cli_nombre']));
	$cli_apellido = $con->real_escape_string(htmlentities($_POST['cli_apellido']));
	$cli_dni = $con->real_escape_string(htmlentities($_POST['cli_dni']));
	$cli_sexo = $con->real_escape_string(htmlentities($_POST['cli_sexo']));
	$cli_empresa = $con->real_escape_string(htmlentities($_POST['cli_empresa']));
	$cli_ciudad = $con->real_escape_string(htmlentities($_POST['cli_ciudad']));
	$cli_pais = $con->real_escape_string(htmlentities($_POST['cli_pais']));
	$cli_codigopostal = $con->real_escape_string(htmlentities($_POST['cli_codigopostal']));
	$cli_fechanacimiento = $con->real_escape_string(htmlentities($_POST['cli_fechanacimiento']));
	$cli_telefono = $con->real_escape_string(htmlentities($_POST['cli_telefono']));
	$cli_email = $con->real_escape_string(htmlentities($_POST['cli_email']));
	$cli_pass = $con->real_escape_string(htmlentities($_POST['cli_pass']));

//	if()
//	{
//            header('location:../extend/alerta.php?msj=Hay un campo sin especificar&c=ho&p=in&t=error');
//            exit;
//	}

	$up = $con->query("UPDATE mlt_cliente SET cli_nombre = '$cli_nombre', cli_apellido = '$cli_apellido', cli_dni = '$cli_dni', cli_sexo = $cli_sexo, cli_empresa = '$cli_empresa', cli_ciudad = '$cli_ciudad', cli_pais = '$cli_pais', cli_codigopostal = '$cli_codigopostal', cli_fechanacimiento = '$cli_fechanacimiento', cli_telefono = $cli_telefono, cli_email = '$cli_email', cli_pass = '$cli_pass' where cli_id = $cli_id");
	if($up){
		header('location:../extend/alerta.php?msj=El cliente ha sido modificado&c=cl&p=home&t=success');
	}else{
		header('location:../extend/alerta.php?msj=El cliente no pudo ser modificado&c=cl&p=clu&t=error');
	}
	
	$con->close();


	    break;


	    case "bloquear_mlt_cliente":


        if($bloqueo == 1){
		$up = $con->query("UPDATE mlt_cliente SET cli_estado = 0 WHERE cli_id = $cli_id ");
		if($up){
			header('location:../extend/alerta.php?msj=El cliente a sido bloqueado&c=cl&p=home&t=success');
		} else{
			header('location:../extend/alerta.php?msj=El cliente no ha podido ser bloqueado&c=cl&p=home&t=error');
		}
	} else {
		$up = $con->query("UPDATE mlt_cliente SET cli_estado = 1 WHERE cli_id = $cli_id ");
		if($up){
			header('location:../extend/alerta.php?msj=El cliente a sido desbloqueado&c=cl&p=home&t=success');
		} else{
			header('location:../extend/alerta.php?msj=El cliente no ha podido ser bloqueado&c=cl&p=home&t=error');
		}
	}

	$con->close();

	    break;


	    case "eliminar_mlt_cliente":


	    $del = $con-> query("DELETE FROM mlt_cliente WHERE cli_id=$cli_id ");

	    if($del){
		header('location:../extend/alerta.php?msj=Cliente Eliminado&c=cl&p=home&t=success');
	    } else{
		header('location:../extend/alerta.php?msj=El Cliente no pudo ser eliminado&c=cl&p=home&t=error');
	    }

	    $con->close();

	    break;

}

//}else{
//	header('location:../extend/alerta.php?msj=Utiliza el formulario&c=ho&p=in&t=error');
//}


?>

