<?php
include '../conexion/conexion.php';
if(!isset($_SESSION['nick'])){
	header('location:../');
}
?>
<!DOCTYPE html>
<html lang='es'>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie-edge">
		<link rel="stylesheet" href="../css/materialize.min.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.css">
		<style media="screen">
			header, main, footer{
				padding-left: 300px;
			}
			.button-collapse{
				display: none;
			}

			@media only screen and (max-width: 992px){
				header, main, footer {
					padding-left: 0;
				}
				.button-collapse{
				display: inherit;			
			}

		</style>		
		<title>Multi-Hotel</title>
		
	</head>
	<body>
		<main>


	<?php 
	if($_SESSION['nivel'] == '0'){
		include 'menu_web_master.php'; 
	} else if($_SESSION['nivel'] == '1'){
		include 'menu_administrador.php';
	} else if($_SESSION['nivel'] == '2'){
		include 'menu_recepcionista.php';
	}
	?>
