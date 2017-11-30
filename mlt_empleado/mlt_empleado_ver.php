<?php include '../extend/header.php';
include '../extend/permiso.php';

$emp_id = $con->real_escape_string(htmlentities($_GET['id']));
$_SESSION['Empleado'] = $emp_id;

$sel = $con->query("SELECT mlt_empleado.emp_id, mlt_empleado.hot_id, (select mlt_hotel.hot_nombre from mlt_hotel where mlt_hotel.hot_id = mlt_empleado.hot_id) as NombreHotel, mlt_empleado.emp_nombre, mlt_empleado.emp_apellido, mlt_empleado.emp_dni, mlt_empleado.emp_sexo, mlt_empleado.emp_ciudad, mlt_empleado.emp_pais, mlt_empleado.emp_codigopostal, mlt_empleado.emp_fechanacimiento, mlt_empleado.emp_telefono, mlt_empleado.emp_email, mlt_empleado.emp_fechacontrato, mlt_empleado.emp_usuario, mlt_empleado.emp_pass, mlt_empleado.emp_cargo, mlt_empleado.emp_estado FROM mlt_empleado WHERE emp_id = $emp_id");
	//$row = mysqli_num_rows($sel);
	while($f = $sel->fetch_assoc()){
?>

<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Editar Empleado</span>
				<form class="form" action="controller_mlt_empleado.php?op=modificar_mlt_empleado&id=<?php echo $emp_id; ?>" method="post" enctype="multipart/form-data">

					<div class="input-field">
				    <select name="hot_id" id="hot_id">
				      <option value="" disabled selected>Elija Hotel</option>
				      <?php 
					    $sel2 = $con->query("SELECT hot_id, hot_nombre FROM mlt_hotel WHERE hot_estado = 1 and hot_id != 1 order by hot_nombre;");
						
						echo '<option value="' . $f['hot_id'] . '" selected>' . $f['NombreHotel'] . '</option>';

						while($g = $sel2->fetch_assoc()){

							if($f['hot_id'] == $g['hot_id']){
								//echo '<option value="' . $g['idi_id'] . '">' . $g['idi_nombre'] . '</option>';
							} else{
								echo '<option value="' . $g['hot_id'] . '">' . $g['hot_nombre'] . '</option>';
							}
						}
				       ?>
				    </select>
				    <label>Seleccione Idioma</label>
				  	</div>
					
					<div class="input-field">
						<input type="text" name="emp_nombre" required
						id="emp_nombre" value="<?php echo $f['emp_nombre']; ?>">
						<label for="emp_nombre">Nombre:</label>
					</div>

					<div class="input-field">
						<input type="text" name="emp_apellido" required
						id="emp_apellido" value="<?php echo $f['emp_apellido']; ?>">
						<label for="emp_apellido">Apellido:</label>
					</div>

					<div class="input-field">
						<input type="text" name="emp_dni" required
						id="emp_dni" value="<?php echo $f['emp_dni']; ?>">
						<label for="emp_dni">Dni:</label>
					</div>

					<div class="input-field">
						<input type="text" name="emp_sexo" required
						id="emp_sexo" value="<?php echo $f['emp_sexo']; ?>">
						<label for="emp_sexo">Sexo:</label>
					</div>

					<div class="input-field">
						<input type="text" name="emp_ciudad" required
						id="emp_ciudad" value="<?php echo $f['emp_ciudad']; ?>">
						<label for="emp_ciudad">Ciudad:</label>
					</div>

					<div class="input-field">
						<input type="text" name="emp_pais" required
						id="emp_pais" value="<?php echo $f['emp_pais']; ?>">
						<label for="emp_pais">Pais:</label>
					</div>

					<div class="input-field">
						<input type="text" name="emp_codigopostal" required
						id="emp_codigopostal" value="<?php echo $f['emp_codigopostal']; ?>">
						<label for="emp_codigopostal">Codigo Postal:</label>
					</div>

					<div class="input-field">
						<input type="text" name="emp_fechanacimiento" required
						id="emp_fechanacimiento" value="<?php echo $f['emp_fechanacimiento']; ?>">
						<label for="emp_fechanacimiento">Fecha Nacimiento:</label>
					</div>

					<div class="input-field">
						<input type="text" name="emp_telefono" required
						id="emp_telefono" value="<?php echo $f['emp_telefono']; ?>">
						<label for="emp_telefono">Telefono:</label>
					</div>

					<div class="input-field">
						<input type="text" name="emp_email" required
						id="emp_email" value="<?php echo $f['emp_email']; ?>">
						<label for="emp_email">Email:</label>
					</div>

					<div class="input-field">
						<input type="text" name="emp_fechacontrato" required
						id="emp_fechacontrato" value="<?php echo $f['emp_fechacontrato']; ?>">
						<label for="emp_fechacontrato">Fecha Contrato:</label>
					</div>

					<div class="input-field">
						<input type="text" name="emp_usuario" required
						id="emp_usuario" value="<?php echo $f['emp_usuario']; ?>">
						<label for="emp_usuario">Usuario:</label>
					</div>

					<div class="input-field">
						<input type="text" name="emp_pass" required
						id="emp_pass" value="<?php echo $f['emp_pass']; ?>">
						<label for="emp_pass">Pass:</label>
					</div>

					<div class="input-field">
						<input type="text" name="emp_cargo" required
						id="emp_cargo" value="<?php echo $f['emp_cargo']; ?>">
						<label for="emp_cargo">Cargo:</label>
					</div>

					<button type="submit" class="btn green accent-3" id="btn_guardar">Modificar</button>
					<?php }?>
					<a href="index.php" class="btn red ">Cancelar</a>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include '../extend/scripts.php'; ?>

<!--script src="../js/validacion_mlt_empleado.js"></script-->

</body>
</html>

