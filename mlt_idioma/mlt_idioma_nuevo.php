<?php include '../extend/header.php';
include '../extend/permiso.php';
?>

<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Nuevo Idioma</span>
				<form class="form" action="controller_mlt_idioma.php?op=insertar_mlt_idioma" method="post" enctype="multipart/form-data">
					<div class="input-field">
						<input type="text" name="idi_nombre" required autofocus
						id="idi_nombre" onblur="may(this.value, this.id)" >
						<label for="idi_nombre">Nombre:</label>
					</div>
					
					<div class="validacion"></div>
                                  
					<div class="input-field">
						<input type="text" name="idi_abreviatura" required
						id="idi_abreviatura">
						<label for="idi_abreviatura">Abreviatura:</label>
					</div>
                                  
					<div class="input-field">
						<input type="text" name="idi_descripcion" required
						id="idi_descripcion">
						<label for="idi_descripcion">Descripcion:</label>
					</div>
                                  
					<button type="submit" class="btn blue" id="btn_guardar">Guardar</button>
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
            
