<?php include '../extend/header.php';
include '../extend/permiso.php';

$hot_id = $_SESSION['Hotel'];

$sel = $con->query("SELECT mlt_hotel.hot_nombre from mlt_hotel where hot_id = $hot_id;");
	//$row = mysqli_num_rows($sel);
	while($f = $sel->fetch_assoc()){

?>

<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Nuevo servicio hotel</span>
				<form class="form" action="controller_mlt_hotel_servicios.php?op=insertar_mlt_hotel_servicios" method="post" enctype="multipart/form-data">
					<div class="input-field">
						<input type="text" name="hot_id" required autofocus
						id="hot_id" onblur="may(this.value, this.id)" value="<?php echo $f['hot_nombre']; ?>" disabled>
						<label for="hot_id">Hotel:</label>
					</div>
					
					<div class="validacion"></div>
                                  
					<div class="input-field">
						<input type="text" name="seh_nombre" required
						id="seh_nombre">
						<label for="seh_nombre">Nombre servicio hotel:</label>
					</div>
                                  
					<div class="input-field">
						<input type="text" name="seh_imagen" required
						id="seh_imagen">
						<label for="seh_imagen">Imagen:</label>
					</div>
                                  
					<div class="input-field">
						<input type="text" name="seh_descripcion" required
						id="seh_descripcion">
						<label for="seh_descripcion">Descripcion:</label>
					</div>
                                  
					<button type="submit" class="btn blue" id="btn_guardar">Guardar</button>
					<a href="mlt_hotel_ver.php?id=<?php } echo $_SESSION['Hotel'] ?>" class="btn red ">Cancelar</a>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include '../extend/scripts.php'; ?>

<script src="../js/validacion_mlt_hotel_servicios.js"></script>

</body>
</html>
            
