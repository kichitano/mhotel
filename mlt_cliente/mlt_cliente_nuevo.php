<?php include '../extend/header.php';
include '../extend/permiso.php';
?>

<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Nuevo Cliente</span>
				<form class="form" action="controller_mlt_cliente.php?op=insertar_mlt_cliente" method="post" enctype="multipart/form-data">
					
					<div class="input-field">
						<input type="text" name="cli_nombre" required autofocus
						id="cli_nombre">
						<label for="cli_nombre">Nombre:</label>
					</div>

					<div class="input-field">
						<input type="text" name="cli_apellido" required
						id="cli_apellido">
						<label for="cli_apellido">Apellido:</label>
					</div>
                    
                    <div class="input-field">
						<input type="text" name="cli_dni" required
						id="cli_dni" onblur="may(this.value, this.id)">
						<label for="cli_dni">DNI:</label>
					</div>

					<div class="validacion"></div>

					<div class="input-field">
						<input type="text" name="cli_sexo" required
						id="cli_sexo">
						<label for="cli_sexo">Sexo:</label>
					</div>
                                  
					<div class="input-field">
						<input type="text" name="cli_empresa" required
						id="cli_empresa">
						<label for="cli_empresa">Empresa:</label>
					</div>
                                  
					<div class="input-field">
						<input type="text" name="cli_ciudad" required
						id="cli_ciudad">
						<label for="cli_ciudad">Ciudad:</label>
					</div>
                                  
					<div class="input-field">
						<input type="text" name="cli_pais" required
						id="cli_pais">
						<label for="cli_pais">Pais:</label>
					</div>
                                  
					<div class="input-field">
						<input type="text" name="cli_codigopostal" required
						id="cli_codigopostal">
						<label for="cli_codigopostal">Codigo Postal:</label>
					</div>
                                  
					<div class="input-field">
						<input type="text" name="cli_fechanacimiento" required
						id="cli_fechanacimiento">
						<label for="cli_fechanacimiento">Fecha Nacimiento:</label>
					</div>
                                  
					<div class="input-field">
						<input type="text" name="cli_telefono" required
						id="cli_telefono">
						<label for="cli_telefono">Telefono:</label>
					</div>
                                  
					<div class="input-field">
						<input type="text" name="cli_email" required
						id="cli_email">
						<label for="cli_email">Email:</label>
					</div>
                                  
					<div class="input-field">
						<input type="password" name="cli_pass" required
						id="cli_pass">
						<label for="cli_pass">Pass:</label>
					</div>
                                  
					<button type="submit" class="btn blue" id="btn_guardar">Guardar Cliente</button>
					<a href="index.php" class="btn red ">Cancelar</a>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include '../extend/scripts.php'; ?>

<script src="../js/validacion_mlt_cliente.js"></script>

</body>
</html>
            
