<?php include '../extend/header.php';
include '../extend/permiso.php';
?>

<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Nuevo Empleado</span>
				<form class="form" action="controller_mlt_empleado.php?op=insertar_mlt_empleado" method="post" enctype="multipart/form-data">
					
					<div class="input-field">
				    <select name="hot_id" id="hot_id">
				      <option value="" disabled selected>Elija Hotel</option>
				      <?php 
					    $sel = $con->query("SELECT hot_id, hot_nombre FROM mlt_hotel where hot_estado = 1 and hot_id != 1 order by hot_nombre;");
						//$row = mysqli_num_rows($sel);

						while($f = $sel->fetch_assoc()){
							echo '<option value="' . $f['hot_id'] . '" selected>' . $f['hot_nombre'] . '</option>';
						}
				       ?>
				    </select>
				    <label>Seleccione Hotel</label>
				  	</div>
                                  
					<div class="input-field">
						<input type="text" name="emp_nombre" required
						id="emp_nombre">
						<label for="emp_nombre">Nombre:</label>
					</div>
                                  
					<div class="input-field">
						<input type="text" name="emp_apellido" required
						id="emp_apellido">
						<label for="emp_apellido">Apellido:</label>
					</div>
                                  
					<div class="input-field">
						<input type="text" name="emp_dni" required
						id="emp_dni" onblur="may(this.value, this.id)" >
						<label for="emp_dni">Dni:</label>
					</div>

					<!--div class="validacion"></div-->
                                  
					<div class="input-field">
						<input type="text" name="emp_sexo" required
						id="emp_sexo">
						<label for="emp_sexo">Sexo:</label>
					</div>
                                  
					<div class="input-field">
						<input type="text" name="emp_ciudad" required
						id="emp_ciudad">
						<label for="emp_ciudad">Ciudad:</label>
					</div>
                                  
					<div class="input-field">
						<input type="text" name="emp_pais" required
						id="emp_pais">
						<label for="emp_pais">Pais:</label>
					</div>
                                  
					<div class="input-field">
						<input type="text" name="emp_codigopostal" required
						id="emp_codigopostal">
						<label for="emp_codigopostal">Codigo Postal:</label>
					</div>
                                  
					<div class="input-field">
						<input type="text" name="emp_fechanacimiento" required
						id="emp_fechanacimiento">
						<label for="emp_fechanacimiento">Fecha Nacimiento:</label>
					</div>
                                  
					<div class="input-field">
						<input type="text" name="emp_telefono" required
						id="emp_telefono">
						<label for="emp_telefono">Telefono:</label>
					</div>
                                  
					<div class="input-field">
						<input type="text" name="emp_email" required
						id="emp_email">
						<label for="emp_email">Email:</label>
					</div>
                                  
					<div class="input-field">
						<input type="text" name="emp_fechacontrato" required
						id="emp_fechacontrato">
						<label for="emp_fechacontrato">Fecha Contrato:</label>
					</div>
                                  
					<div class="input-field">
						<input type="text" name="emp_usuario" required
						id="emp_usuario">
						<label for="emp_usuario">Usuario:</label>
					</div>
                                  
					<div class="input-field">
						<input type="text" name="emp_pass" required
						id="emp_pass">
						<label for="emp_pass">Pass:</label>
					</div>
                                  
					<div class="input-field">
						<input type="text" name="emp_cargo" required
						id="emp_cargo">
						<label for="emp_cargo">Cargo:</label>
					</div>
                                  
					<button type="submit" class="btn blue" id="btn_guardar">Guardar</button>
					<a href="index.php" class="btn red ">Cancelar</a>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include '../extend/scripts.php'; ?>

<script src="../js/validacion_mlt_empleado.js"></script>

</body>
</html>
            
