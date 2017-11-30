<?php include '../extend/header.php';
include '../extend/permiso.php';

$ext_id = $con->real_escape_string(htmlentities($_GET['id']));
$_SESSION['Extras'] = $ext_id;
$nivel = $_SESSION['nivel'];

$sel = $con->query("SELECT mlt_extras.ext_id, mlt_extras.hot_id, (select mlt_hotel.hot_nombre from mlt_hotel where mlt_hotel.hot_id = mlt_extras.hot_id) as NombreHotel, mlt_extras.ext_nombre, mlt_extras.ext_descripcion, mlt_extras.ext_precio, mlt_extras.ext_estado FROM mlt_extras WHERE ext_id = $ext_id");
	//$row = mysqli_num_rows($sel);
	while($f = $sel->fetch_assoc()){
?>

<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Extras</span>
				<form class="form" action="controller_mlt_extras.php?op=modificar_mlt_extras&id=<?php echo $ext_id; ?>" method="post" enctype="multipart/form-data">

					<div class="input-field">
				    <select name="hot_id" id="hot_id">
				      <option value="" disabled selected>Elija Hotel</option>
				      <?php

						    $sel2 = $con->query("SELECT hot_id, hot_nombre FROM mlt_hotel WHERE hot_estado = 1 and hot_id != 1 order by hot_nombre;");
							
							echo '<option value="' . $f['hot_id'] . '" selected>' . $f['NombreHotel'] . '</option>';

							while($g = $sel2->fetch_assoc()){

								if($nivel == '0')
								{
									if($f['hot_id'] == $g['hot_id']){
									//echo '<option value="' . $g['idi_id'] . '">' . $g['idi_nombre'] . '</option>';
									} else{
										echo '<option value="' . $g['hot_id'] . '">' . $g['hot_nombre'] . '</option>';
									}
								}else{
								}
								
							}
				       ?>
				    </select>
				    <label>Seleccione Idioma</label>
				  	</div>

					<div class="input-field">
						<input type="text" name="ext_nombre" required
						id="ext_nombre" value="<?php echo $f['ext_nombre']; ?>">
						<label for="ext_nombre">Nombre:</label>
					</div>

					<div class="input-field">
						<input type="text" name="ext_descripcion" required
						id="ext_descripcion" value="<?php echo $f['ext_descripcion']; ?>">
						<label for="ext_descripcion">Descripcion:</label>
					</div>

					<div class="input-field">
						<input type="text" name="ext_precio" required
						id="ext_precio" value="<?php echo $f['ext_precio']; ?>">
						<label for="ext_precio">Precio:</label>
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

<script src="../js/validacion_mlt_extras.js"></script>

</body>
</html>

