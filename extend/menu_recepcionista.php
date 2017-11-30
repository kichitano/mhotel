<nav class="black">
	<a href="" data-activates="menu" class="button-collapse" ><i class="material-icons">menu</i></a>
</nav>
<ul id="menu" class="side-nav fixed">
	<li>
		<div class="userView">
			<div class="background">
				<img src="http://lorempixel.com/output/abstract-q-c-640-480-5.jpg">
			</div>
			<a href=""><img src="../usuarios/<?php  echo $_SESSION['foto'] ?>" class="circle" alt=""></a>
			<a href="" class="white-text"><?php  echo $_SESSION['nombre'] ?></a>
			<a href="" class="white-text"><?php  echo $_SESSION['correo'] ?></a>
		</div>
	</li>
	<li><a href="../inicio"><i class="material-icons">home</i> INICIO</a></li>
	<li><div class="divider"></div></li>
	<li><a href="../mlt_habitacion/recepcionista.php"><i class="material-icons">business</i> HABITACIONES</a></li>
	<li><div class="divider"></div></li>
	<li><a href="../mlt_cliente/recepcionista.php"><i class="material-icons">group</i> CLIENTES</a></li>
	<li><div class="divider"></div></li>
	<li><a href="../mlt_reserva/recepcionista.php"><i class="material-icons">playlist_add_check</i> RESERVAS</a></li>
	<li><div class="divider"></div></li>
	<li><a href="../mlt_cuenta/recepcionista.php"><i class="material-icons">remove_red_eye</i> CUENTAS</a></li>
	<li><div class="divider"></div></li>
	<li><a href="../login/salir.php"><i class="material-icons">power_settings_new</i> SALIR</a></li>
	<li><div class="divider"></div></li>
</ul>