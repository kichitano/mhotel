<?php 

include '../conexion/conexion.php';

?>
<!DOCTYPE html>
<html lang = "ES">
<head>
	<meta charse="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.css">
	<title>Multi-Hotel</title>
</head>
<body>

<?php

	$mensaje=htmlentities($_GET['msj']);
	$c=htmlentities($_GET['c']);
	$p=htmlentities($_GET['p']);
	$t=htmlentities($_GET['t']);
	$carpeta='';
	switch ($c) {
		case 'em':
			$carpeta = '../mlt_empleado/';
			break;
		case 'cl':
			$carpeta = '../mlt_cliente/';
			break;
		case 'cu':
			$carpeta = '../mlt_cuenta/';
			break;
		case 'ex':
			$carpeta = '../mlt_extras/';
			break;
		case 'hb':
			$carpeta = '../mlt_habitacion/';
			break;
		case 'ho':
			$carpeta = '../mlt_hotel/';
			break;
		case 'id':
			$carpeta = '../mlt_idioma/';
			break;
		case 'pl':
			$carpeta = '../mlt_planing/';
			break;
		case 're':
			$carpeta = '../mlt_reserva/';
			break;
		case 'home':
			$carpeta = '../inicio/';
			break;
		case 'salir':
			$carpeta = '../';
			break;
	}

	switch ($p) {
		
		case 'home':
			$pagina = 'index.php';
			break;
		case 'ver':
			$pagina = 'inicio.php';
			break;
		case 'emi':
			$pagina = 'mlt_empleado_nuevo.php';
			break;
		case 'emu':
			$pagina = 'mlt_empleado_ver.php?id='.$_SESSION['Empleado'];
			break;
		case 'hoi' :
			$pagina = 'mlt_hotel_nuevo.php';
			break;
		case 'hou' :
			$pagina = 'mlt_hotel_ver.php?id='.$_SESSION['Hotel'];
			break;
		case 'hsi' :
			$pagina = 'mlt_hotel_servicio_nuevo.php';
			break;
		case 'hsu' :
			$pagina = 'mlt_hotel_servicio_ver.php?id='.$_SESSION['Servicio'];
			break;
		case 'cui' :
			$pagina = 'mlt_cuenta_nuevo.php';
			break;
		case 'cuu' :
			$pagina = 'mlt_cuenta_ver.php?id='.$_SESSION['Cuenta'];
			break;
		case 'cdi' :
			$pagina = 'mlt_cuenta_detalle_nuevo.php';
			break;
		case 'cdu' :
			$pagina = 'mlt_cuenta_detalle_ver.php?id='.$_SESSION['CuentaDetalle'];
			break;
		case 'rei' :
			$pagina = 'mlt_reserva_nuevo.php';
			break;
		case 'reu' :
			$pagina = 'mlt_reserva_ver.php?id='.$_SESSION['Reserva'];
			break;
		case 'cli' :
			$pagina = 'mlt_cliente_nuevo.php';
			break;
		case 'clu' :
			$pagina = 'mlt_cliente_ver.php?id='.$_SESSION['Cliente'];
			break;
		case 'idi' :
			$pagina = 'mlt_idioma_nuevo.php';
			break;
		case 'idu' :
			$pagina = 'mlt_idioma_ver.php?id='.$_SESSION['Idioma'];
			break;
		case 'exi':
			$pagina = 'mlt_extras_nuevo.php';
			break;
		case 'exu':
			$pagina = 'mlt_extras_ver.php?id='. $_SESSION['Extras'];
			break;
		case 'hbi' :
			$pagina = 'mlt_habitacion_nuevo.php';
			break;
		case 'hbu' :
			$pagina = 'mlt_habitacion_ver.php?id='. $_SESSION['Habitacion'];
			break;
		case 'hfi' :
			$pagina = 'mlt_habitacion_facilitys_nuevo.php';
			break;
		case 'hfu' :
			$pagina = 'mlt_habitacion_facilitys_ver.php?id='. $_SESSION['Facility'];
			break;

		//  ADMIN

		case 'ahsa' :
			$pagina = 'mlt_hotel_admin_inicio.php';
			break;
		case 'ahsi' :
			$pagina = 'mlt_hotel_servicios_admin_nuevo.php';
			break;
		case 'ahsu' :
			$pagina = 'mlt_hotel_servicios_admin_ver.php?id='. $_SESSION['Servicio'];
			break;

		case 'rhsa' :
			$pagina = 'mlt_hotel_servicios_recep_inicio.php';
			break;
		case 'rhsi' :
			$pagina = 'mlt_hotel_servicios_recep_nuevo.php';
			break;
		case 'rhsu' :
			$pagina = 'mlt_hotel_servicios_recep_ver.php?id='. $_SESSION['Servicio'];
			break;

		case 'ahbi' :
			$pagina = 'mlt_habitacion_admin_nuevo.php';
			break;
		case 'ahbu' :
			$pagina = 'mlt_habitacion_admin_ver.php?id='. $_SESSION['Habitacion'];
			break;


		case 'ahfi' :
			$pagina = 'mlt_habitacion_facilitys_admin_nuevo.php';
			break;
		case 'ahfu' :
			$pagina = 'mlt_habitacion_facilitys_admin_ver.php?id='. $_SESSION['Facility'];
			break;


		case 'aexi' : 
			$pagina = 'mlt_extras_admin_nuevo.php';
			break;
		case 'aexu' :
			$pagina = 'mlt_extras_admin_ver.php?id='. $_SESSION['Extras'];
			break;


		case 'acli' :
			$pagina = 'mlt_cliente_admin_nuevo.php';
			break;
		case 'aclu' :
			$pagina = 'mlt_cliente_admin_ver.php?id='. $_SESSION['Cliente'];
			break;


		case 'arei' :
			$pagina = 'mlt_reserva_admin_nuevo.php';
			break;
		case 'areu' :
			$pagina = 'mlt_reserva_admin_ver.php?id='. $_SESSION['Reserva'];
			break;


		case 'acui' :
			$pagina = 'mlt_cuenta_admin_nuevo.php';
			break;
		case 'acuu' :
			$pagina = 'mlt_cuenta_admin_ver.php?id='. $_SESSION['Cuenta'];
			break;

		case 'salir' :
			$pagina = '';
			break;
	}

	$dir= $carpeta.$pagina;
	if($t == "error")	{
		$titulo = "Oppss..";
	}else	{
		$titulo = "Buen Trabajo!";
	}

?>

	<script src="https://code.jquery.com/jquery-3.2.1.min.js" 
	integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="   crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.js"></script>
	<script>
	swal({
		title: '<?php echo $titulo; ?>',
		text: "<?php echo $mensaje; ?>",
		type: '<?php echo $t; ?>',
		confirmButtonColor: '#3085d6',
		confirmButtonText: 'Ok'
	}).then(function()	{
		location.href='<?php echo $dir ?>';
	});

	$(document).click(function() {
		location.href='<?php echo $dir ?>';
	});

	$(document).keyup(function(e) {
		if(e.which == 27)
		{
			location.href='<?php echo $dir ?>';
		}		
	});	
	</script>
</body>
</html>