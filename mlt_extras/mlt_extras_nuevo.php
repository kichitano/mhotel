<?php include '../extend/header.php';
include '../extend/permiso.php';
$nivel = $_SESSION['nivel'];
?>

<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Extras</span>
				<form class="form" action="controller_mlt_extras.php?op=insertar_mlt_extras" method="post" enctype="multipart/form-data">
					
					<div class="input-field">
				    <select name="hot_id" id="hot_id">
				      <option value="" disabled selected>Elija Hotel</option>
				      <?php 
					    $sel = $con->query("SELECT hot_id, hot_nombre FROM mlt_hotel where hot_estado = 1 and hot_id != 1 order by hot_nombre;");
						//$row = mysqli_num_rows($sel);

						while($f = $sel->fetch_assoc()){
							if($nivel == '0')
							{
								echo '<option value="' . $f['hot_id'] . '" selected>' . $f['hot_nombre'] . '</option>';
							}else{
								if($_SESSION['hot_id'] == $f['hot_id'])
								{
									echo '<option value="' . $f['hot_id'] . '" selected>' . $f['hot_nombre'] . '</option>';	
								}
							}
						}
				       ?>
				    </select>
				    <label>Seleccione Hotel</label>
				  	</div>
                                  
					<div class="input-field">
						<input type="text" name="ext_nombre" required
						id="ext_nombre">
						<label for="ext_nombre">Nombre:</label>
					</div>
                                  
					<div class="input-field">
						<input type="text" name="ext_descripcion" required
						id="ext_descripcion">
						<label for="ext_descripcion">Descripcion:</label>
					</div>
                                  
					<div class="input-field">
						<input type="text" name="ext_precio" required
						id="ext_precio">
						<label for="ext_precio">Precio:</label>
					</div>
                                  
					<button type="submit" class="btn blue" id="btn_guardar">Guardar Extra</button>
					<a href="index.php" class="btn red ">Cancelar</a>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include '../extend/scripts.php'; ?>

<script src="../js/validacion_mlt_extras.js"></script>

</body>
</html>
            
