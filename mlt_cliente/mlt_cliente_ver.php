<?php include '../extend/header.php';
include '../extend/permiso.php';

$cli_id = $con->real_escape_string(htmlentities($_GET['id']));
$_SESSION['Cliente'] = $cli_id;

$sel = $con->query("SELECT mlt_cliente.cli_id, mlt_cliente.cli_nombre, mlt_cliente.cli_apellido, mlt_cliente.cli_dni, mlt_cliente.cli_sexo, mlt_cliente.cli_empresa, mlt_cliente.cli_ciudad, mlt_cliente.cli_pais, mlt_cliente.cli_codigopostal, mlt_cliente.cli_fechanacimiento, mlt_cliente.cli_telefono, mlt_cliente.cli_email, mlt_cliente.cli_pass, mlt_cliente.cli_estado FROM mlt_cliente WHERE cli_id = $cli_id");
	//$row = mysqli_num_rows($sel);
	while($f = $sel->fetch_assoc()){
?>

<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Editar Cliente</span>
				<form class="form" action="controller_mlt_cliente.php?op=modificar_mlt_cliente&id=<?php echo $cli_id; ?>" method="post" enctype="multipart/form-data">

					<div class="input-field">
						<input type="text" name="cli_nombre" required autofocus
						id="cli_nombre" value="<?php echo $f['cli_nombre']; ?>">
						<label for="cli_nombre">Nombre:</label>
					</div>
					
					

					<div class="input-field">
						<input type="text" name="cli_apellido" required
						id="cli_apellido" value="<?php echo $f['cli_apellido']; ?>">
						<label for="cli_apellido">Apellido:</label>
					</div>

					<div class="input-field">
						<input type="text" name="cli_dni" required
						id="cli_dni" onblur="may(this.value, this.id)" value="<?php echo $f['cli_dni']; ?>">
						<label for="cli_dni">DNI:</label>
					</div>

					<!--div class="validacion"></div-->

					<div class="input-field">
						<input type="text" name="cli_sexo" required
						id="cli_sexo" value="<?php echo $f['cli_sexo']; ?>">
						<label for="cli_sexo">Sexo:</label>
					</div>

					<div class="input-field">
						<input type="text" name="cli_empresa" required
						id="cli_empresa" value="<?php echo $f['cli_empresa']; ?>">
						<label for="cli_empresa">Empresa:</label>
					</div>

					<div class="input-field">
						<input type="text" name="cli_ciudad" required
						id="cli_ciudad" value="<?php echo $f['cli_ciudad']; ?>">
						<label for="cli_ciudad">Ciudad:</label>
					</div>

					<div class="input-field">
						<input type="text" name="cli_pais" required
						id="cli_pais" value="<?php echo $f['cli_pais']; ?>">
						<label for="cli_pais">Pais:</label>
					</div>

					<div class="input-field">
						<input type="text" name="cli_codigopostal" required
						id="cli_codigopostal" value="<?php echo $f['cli_codigopostal']; ?>">
						<label for="cli_codigopostal">Codigo Postal:</label>
					</div>

					<div class="input-field">
						<input type="text" name="cli_fechanacimiento" required
						id="cli_fechanacimiento" value="<?php echo $f['cli_fechanacimiento']; ?>">
						<label for="cli_fechanacimiento">Fecha Nacimiento:</label>
					</div>

					<div class="input-field">
						<input type="text" name="cli_telefono" required
						id="cli_telefono" value="<?php echo $f['cli_telefono']; ?>">
						<label for="cli_telefono">Telefono:</label>
					</div>

					<div class="input-field">
						<input type="text" name="cli_email" required
						id="cli_email" value="<?php echo $f['cli_email']; ?>">
						<label for="cli_email">cli_email:</label>
					</div>

					<div class="input-field">
						<input type="password" name="cli_pass" required
						id="cli_pass" value="<?php echo $f['cli_pass']; ?>">
						<label for="cli_pass">Pass:</label>
					</div>

					<button type="submit" class="btn green accent-3" id="btn_guardar">Modificar Cliente</button>
					<?php }?>
					<a href="index.php" class="btn red ">Cancelar</a>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include '../extend/scripts.php'; ?>

<script src="../js/validacion_mlt_cliente.js"></script>

</body>
</html>

