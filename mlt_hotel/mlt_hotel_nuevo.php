<?php include '../extend/header.php';
include '../extend/permiso.php';
?>

<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Nuevo Hotel</span>
				<form class="form" action="controller_mlt_hotel.php?op=insertar_mlt_hotel" method="post" enctype="multipart/form-data">
					<div class="input-field">
						<input type="text" name="hot_nombre" required autofocus
						id="hot_nombre" onblur="may(this.value, this.id)" >
						<label for="hot_nombre">Nombre Hotel:</label>
					</div>
					
					<div class="validacion"></div>
                                  
					<div class="input-field">
						<input type="text" name="hot_direccion" required
						id="hot_direccion">
						<label for="hot_direccion">Direccion:</label>
					</div>
                                  
					<div class="input-field">
						<input type="text" name="hot_ciudad" required
						id="hot_ciudad">
						<label for="hot_ciudad">Ciudad:</label>
					</div>
                                  
					<div class="input-field">
						<input type="text" name="hot_pais" required
						id="hot_pais">
						<label for="hot_pais">Pais:</label>
					</div>

                    <!--div class="input-field">
						<input type="text" name="idi_id" required
						id="idi_id">
						<label for="idi_id">Idioma:</label>
					</div-->

					<div class="input-field">
				    <select name="idi_id" id="idi_id">
				      <option value="" disabled selected>Elija Idioma</option>
				      <?php 
					    $sel = $con->query("SELECT mlt_idioma.idi_id, mlt_idioma.idi_nombre FROM mlt_idioma WHERE idi_estado = 1;");
						//$row = mysqli_num_rows($sel);

						while($f = $sel->fetch_assoc()){
							echo '<option value="' . $f['idi_id'] . '">' . $f['idi_nombre'] . '</option>';
						}
				       ?>
				    </select>
				    <label>Seleccione Idioma</label>
				  	</div>

					<div class="input-field">
						<input type="text" name="hot_ejex" required
						id="hot_ejex">
						<label for="hot_ejex">Latitud:</label>
					</div>
                                  
					<div class="input-field">
						<input type="text" name="hot_ejey" required
						id="hot_ejey">
						<label for="hot_ejey">Longitud:</label>
					</div>
                                  
					<div class="input-field">
						<input type="text" name="hot_email" required
						id="hot_email">
						<label for="hot_email">Email:</label>
					</div>
                                  
					<div class="input-field">
						<input type="text" name="hot_telefono" required
						id="hot_telefono">
						<label for="hot_telefono">Telefono:</label>
					</div>
                                  
					<div class="input-field">
						<input type="text" name="hot_estrellas" required
						id="hot_estrellas">
						<label for="hot_estrellas">Estrellas:</label>
					</div>
                                  
					<div class="input-field">
						<input type="text" name="hot_imagen" required
						id="hot_imagen">
						<label for="hot_imagen">Imagen:</label>
					</div>
                                  
					<div class="input-field">
						<input type="text" name="hot_descripcion" required
						id="hot_descripcion">
						<label for="hot_descripcion">Descripcion:</label>
					</div>
                                  
					<button type="submit" class="btn blue" id="btn_guardar">Guardar Hotel</button>
					<a href="index.php" class="btn red ">Cancelar</a>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include '../extend/scripts.php'; ?>

<script src="../js/validacion_mlt_hotel.js"></script>

</body>
</html>
            
