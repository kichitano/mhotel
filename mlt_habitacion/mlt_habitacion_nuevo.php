<?php include '../extend/header.php';
include '../extend/permiso.php';
?>

<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Nueva Habitacion</span>
				<form class="form" action="controller_mlt_habitacion.php?op=insertar_mlt_habitacion" method="post" enctype="multipart/form-data">
					
					<?php 

						if($_SESSION['nivel'] == 0)
						{
							echo ('<div class="input-field">');
						    echo ('<select name="hot_id" id="hot_id">');

						    echo ('option value="" disabled selected>Elija Hotel</option>');
						      
							    $sel = $con->query("SELECT hot_id, hot_nombre FROM mlt_hotel where hot_estado = 1 and hot_id != 1 order by hot_nombre;");
								//$row = mysqli_num_rows($sel);

								while($f = $sel->fetch_assoc()){
									echo '<option value="' . $f['hot_id'] . '" selected>' . $f['hot_nombre'] . '</option>';
								}
						       
						    echo ('</select>');
						    echo ('<label>Seleccione Hotel</label>');
						  	echo ('</div>');
						}
						else
						{
							echo ('<div class="input-field">');
								echo ('<input type="text" name="hot_id" disabled required');
								$hoteel = $_SESSION['hot_id'];
								$sel = $con->query("SELECT hot_id, hot_nombre FROM mlt_hotel where hot_id = $hoteel;");
								while($f = $sel->fetch_assoc())
								{
									echo ('id="hot_id" value="' . $f['hot_nombre'] . '" >');	
								}
								echo ('<label for="hot_id">Hotel:</label>');
							echo ('</div>');
						}

					?>
					
                                  
					<div class="input-field">
						<input type="text" name="hab_nombre" required
						id="hab_nombre">
						<label for="hab_nombre">Nombre:</label>
					</div>
                                  
					<div class="input-field">
						<input type="text" name="hab_imagen" required
						id="hab_imagen">
						<label for="hab_imagen">Imagen:</label>
					</div>
                                  
					<div class="input-field">
						<input type="text" name="hab_precio" required
						id="hab_precio">
						<label for="hab_precio">Precio:</label>
					</div>
                                  
					<div class="input-field">
						<input type="text" name="hab_ocupacion" required
						id="hab_ocupacion">
						<label for="hab_ocupacion">Ocupacion:</label>
					</div>
                                  
					<div class="input-field">
						<input type="text" name="hab_descripcion" required
						id="hab_descripcion">
						<label for="hab_descripcion">Descripcion:</label>
					</div>
                                  
					<button type="submit" class="btn blue" id="btn_guardar">Guardar</button>
					<a href="index.php" class="btn red ">Cancelar</a>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include '../extend/scripts.php'; ?>

<script src="../js/validacion_mlt_habitacion.js"></script>

</body>
</html>
            
