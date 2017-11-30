<?php include '../extend/header.php';
include '../extend/permiso.php';

$fac_id = $con->real_escape_string(htmlentities($_GET['id']));
$_SESSION['Facility'] = $fac_id;

$sel = $con->query("SELECT mlt_habitacion_facilitys.fac_id, mlt_habitacion_facilitys.hab_id, (select mlt_habitacion.hab_nombre from mlt_habitacion where mlt_habitacion.hab_id = mlt_habitacion_facilitys.hab_id) as HabitacionNombre, mlt_habitacion_facilitys.fac_nombre, mlt_habitacion_facilitys.fac_imagen, mlt_habitacion_facilitys.fac_descripcion, mlt_habitacion_facilitys.fac_estado FROM mlt_habitacion_facilitys WHERE fac_id = $fac_id");
	//$row = mysqli_num_rows($sel);
	while($f = $sel->fetch_assoc()){
?>

<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Editar facilidad de habitacion</span>
				<form class="form" action="controller_mlt_habitacion_facilitys.php?op=modificar_mlt_habitacion_facilitys&id=<?php echo $fac_id; ?>" method="post" enctype="multipart/form-data">

					<div class="input-field">
						<input type="text" name="hab_id" required autofocus
						id="hab_id" onblur="may(this.value, this.id)" value="<?php echo $f['HabitacionNombre']; ?>" disabled>
						<label for="hab_id">Habitacion:</label>
					</div>
					
					<div class="validacion"></div>

					<div class="input-field">
						<input type="text" name="fac_nombre" required
						id="fac_nombre" value="<?php echo $f['fac_nombre']; ?>">
						<label for="fac_nombre">Nombre facilidad de habitacion:</label>
					</div>

					<div class="input-field">
						<input type="text" name="fac_imagen" required
						id="fac_imagen" value="<?php echo $f['fac_imagen']; ?>">
						<label for="fac_imagen">Imagen:</label>
					</div>

					<div class="input-field">
						<input type="text" name="fac_descripcion" required
						id="fac_descripcion" value="<?php echo $f['fac_descripcion']; ?>">
						<label for="fac_descripcion">Descripcion:</label>
					</div>

					<button type="submit" class="btn green accent-3" id="btn_guardar">Modificar</button>
					<?php }?>
					<a href="mlt_habitacion_ver.php?id=<?php echo $_SESSION['Habitacion']; ?>" class="btn red ">Cancelar</a>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include '../extend/scripts.php'; ?>

<script src="../js/validacion_mlt_habitacion_facilitys.js"></script>

</body>
</html>

