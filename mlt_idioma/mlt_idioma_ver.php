<?php include '../extend/header.php';
include '../extend/permiso.php';

$idi_id = $con->real_escape_string(htmlentities($_GET['id']));
$_SESSION['Idioma'] = $idi_id;

$sel = $con->query("SELECT mlt_idioma.idi_id, mlt_idioma.idi_nombre, mlt_idioma.idi_abreviatura, mlt_idioma.idi_descripcion, mlt_idioma.idi_estado FROM mlt_idioma WHERE idi_id = $idi_id");
	//$row = mysqli_num_rows($sel);
	while($f = $sel->fetch_assoc()){
?>

<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Editar Idioma</span>
				<form class="form" action="controller_mlt_idioma.php?op=modificar_mlt_idioma&id=<?php echo $idi_id; ?>" method="post" enctype="multipart/form-data">

					<div class="input-field">
						<input type="text" name="idi_nombre" required autofocus
						id="idi_nombre" onblur="may(this.value, this.id)" value="<?php echo $f['idi_nombre']; ?>">
						<label for="idi_nombre">Nombre:</label>
					</div>
					
					<div class="validacion"></div>

					<div class="input-field">
						<input type="text" name="idi_abreviatura" required
						id="idi_abreviatura" value="<?php echo $f['idi_abreviatura']; ?>">
						<label for="idi_abreviatura">Abreviatura:</label>
					</div>

					<div class="input-field">
						<input type="text" name="idi_descripcion" required
						id="idi_descripcion" value="<?php echo $f['idi_descripcion']; ?>">
						<label for="idi_descripcion">Descripcion:</label>
					</div>

					<button type="submit" class="btn green accent-3" id="btn_guardar">Modificar Idioma</button>
					<?php }?>
					<a href="index.php" class="btn red ">Cancelar</a>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include '../extend/scripts.php'; ?>

<script src="../js/validacion_mlt_idioma.js"></script>

</body>
</html>

