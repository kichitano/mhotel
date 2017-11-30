<?php include '../extend/header.php';
include '../extend/permiso.php';

$seh_id = $con->real_escape_string(htmlentities($_GET['id']));
$_SESSION['Servicio'] = $seh_id;

$sel = $con->query("SELECT mlt_hotel_servicios.seh_id, mlt_hotel_servicios.hot_id, (select mlt_hotel.hot_nombre from mlt_hotel where hot_id = mlt_hotel_servicios.hot_id) as NombreHotel, mlt_hotel_servicios.seh_nombre, mlt_hotel_servicios.seh_imagen, mlt_hotel_servicios.seh_descripcion, mlt_hotel_servicios.seh_estado FROM mlt_hotel_servicios WHERE seh_id = $seh_id");
	//$row = mysqli_num_rows($sel);
	while($f = $sel->fetch_assoc()){
?>

<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Editar servicio Hotel</span>
				<form class="form" action="controller_mlt_hotel_servicios.php?op=modificar_mlt_hotel_servicios&id=<?php echo $seh_id; ?>" method="post" enctype="multipart/form-data">

					<div class="input-field">
						<input type="text" name="hot_id" required autofocus
						id="hot_id" onblur="may(this.value, this.id)" value="<?php echo $f['NombreHotel']; ?>" disabled>
						<label for="hot_id">Hotel:</label>
					</div>
					
					<div class="validacion"></div>

					<div class="input-field">
						<input type="text" name="seh_nombre" required
						id="seh_nombre" value="<?php echo $f['seh_nombre']; ?>">
						<label for="seh_nombre">Nombre servicio:</label>
					</div>

					<div class="input-field">
						<input type="text" name="seh_imagen" required
						id="seh_imagen" value="<?php echo $f['seh_imagen']; ?>">
						<label for="seh_imagen">Imagen:</label>
					</div>

					<div class="input-field">
						<input type="text" name="seh_descripcion" required
						id="seh_descripcion" value="<?php echo $f['seh_descripcion']; ?>">
						<label for="seh_descripcion">Descripcion:</label>
					</div>

					<button type="submit" class="btn green accent-3" id="btn_guardar">Modificar</button>
					<?php }?>
					<a href="mlt_hotel_ver.php?id=<?php echo $_SESSION['Hotel'] ?>" class="btn red ">Cancelar</a>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include '../extend/scripts.php'; ?>

<script src="../js/validacion_mlt_hotel_servicios.js"></script>

</body>
</html>

