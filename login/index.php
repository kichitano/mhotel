<?php
include '../conexion/conexion.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){ //para verificar si lo que estamos enviando al servidor esta siendo enviado por POST
	$user = $con->real_escape_String(htmlentities($_POST['usuario']));
	$pass = $con->real_escape_String(htmlentities($_POST['contra']));
	$candado = ' ';
	$str_u = strpos($user,$candado);
	$str_p = strpos($user,$candado);
	if(is_int($str_u)){
		$user = '';
	}else {
		$usuario = $user;
	}

	if(is_int($str_p)){
		$pass = '';
	}else {
		//$pass2 = sha1($pass);
		$pass2 = $pass;
	}

	if($user == null && $pass == null) {
		header('location:../extend/alerta.php?msj=El formato no es correcto&c=salir&p=salir&t=error');
	}else
	{
		$ins = $con->query("SELECT emp_id, hot_id, (SELECT mlt_hotel.hot_nombre FROM mlt_hotel WHERE mlt_hotel.hot_id = mlt_empleado.hot_id) as NombreHotel, emp_usuario, emp_apellido, emp_nombre, emp_cargo, emp_email, emp_pass, emp_estado FROM mlt_empleado WHERE emp_usuario = '$usuario' AND emp_pass = '$pass2' and emp_estado = 1;");
		$row = mysqli_num_rows($ins);
			if($row == 1){
				if($var = mysqli_fetch_array($ins)){
					$emp_id = $var['emp_id'];
					$hot_id = $var['hot_id'];
					$hot_nombre = $var['NombreHotel'];
					$nick = $var['emp_usuario'];
					$nombre = $var['emp_nombre'];
					$apellido = $var['emp_apellido'];
					$pass = $var['emp_pass'];
					$nivel = $var['emp_cargo'];
					$correo = $var['emp_email'];
					$estado = $var['emp_estado'];
				}
				//if($nick == $usuario && $contra == $pass2 && $nivel == 'ADMINISTRADOR'){
				if($nick == $usuario && $pass == $pass2 && $nivel == '0'){
					$_SESSION['emp_id'] = $emp_id;
					$_SESSION['hot_id'] = $hot_id;
					$_SESSION['hot_nombre'] = $hot_nombre;
					$_SESSION['nick'] = $nick;
					$_SESSION['nombre'] = $nombre;
					$_SESSION['apellido'] = $apellido;
					$_SESSION['nivel'] = $nivel;
					$_SESSION['correo'] = $correo;
					$_SESSION['estado'] = $estado;
					header('location:../extend/alerta.php?msj=Bienvenido&c=home&p=home&t=success');
				} else if ($nick == $usuario && $pass == $pass2 && $nivel == '1'){
					$_SESSION['emp_id'] = $emp_id;
					$_SESSION['hot_id'] = $hot_id;
					$_SESSION['hot_nombre'] = $hot_nombre;
					$_SESSION['nick'] = $nick;
					$_SESSION['nombre'] = $nombre;
					$_SESSION['apellido'] = $apellido;
					$_SESSION['nivel'] = $nivel;
					$_SESSION['correo'] = $correo;
					$_SESSION['estado'] = $estado;
					header('location:../extend/alerta.php?msj=Bienvenido&c=home&p=home&t=success');
				}else if ($nick == $usuario && $pass == $pass2 && $nivel == '2'){
					$_SESSION['emp_id'] = $emp_id;
					$_SESSION['hot_id'] = $hot_id;
					$_SESSION['hot_nombre'] = $hot_nombre;
					$_SESSION['nick'] = $nick;
					$_SESSION['nombre'] = $nombre;
					$_SESSION['apellido'] = $apellido;
					$_SESSION['nivel'] = $nivel;
					$_SESSION['correo'] = $correo;
					$_SESSION['estado'] = $estado;
					header('location:../extend/alerta.php?msj=Bienvenido&c=home&p=home&t=success');
				}else{
					header('location:../extend/alerta.php?msj=No tienes el permiso para entrar&c=salir&p=salir&t=error');
				}

			} else{
				header('location:../extend/alerta.php?msj=Usuario o contraseña incorrectos&c=salir&p=salir&t=error');
			}
	}

}else{	
	header('location:../extend/alerta.php?msj=Utiliza el formulario&c=salir&p=salir&t=error');
}
$con->close();
?>