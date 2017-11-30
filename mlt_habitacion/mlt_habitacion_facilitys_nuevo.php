<?php include '../extend/header.php';
include '../extend/permiso.php';

$hab_id = $_SESSION['Habitacion'];

$sel = $con->query("SELECT mlt_habitacion.hab_nombre from mlt_habitacion where hab_id = $hab_id;");
	//$row = mysqli_num_rows($sel);
	while($f = $sel->fetch_assoc()){

?>

<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Nueva facilidad de habitacion</span>
				<form class="form" action="controller_mlt_habitacion_facilitys.php?op=insertar_mlt_habitacion_facilitys" method="post" enctype="multipart/form-data">
					
					<?php 

						if($_SESSION['nivel'] == 0)
						{
							echo ('<div class="input-field">');
						    echo ('<select name="hot_id" id="hot_id">');

						    echo ('option value="" disabled selected>Elija Hotel</option>');
						      
							    //$sel1 = $con->query("SELECT hot_id, hot_nombre FROM mlt_hotel where hot_estado = 1 and hot_id != 1 order by hot_nombre;");

						    	$sel1 = $con->query("SELECT hab_id, hab_nombre FROM mlt_habitacion where hot_id = $hab_id;");

								//$row = mysqli_num_rows($sel);

								while($f1 = $sel1->fetch_assoc()){
									echo '<option value="' . $f1['hab_id'] . '" selected>' . $f1['hab_nombre'] . '</option>';
								}
						       
						    echo ('</select>');
						    echo ('<label>Seleccione Hotel</label>');
						  	echo ('</div>');
						}
						else
						{
							echo ('<div class="input-field">');
								echo ('<input type="text" name="hab_id" disabled required');
								
								$sel1 = $con->query("SELECT hab_id, hab_nombre FROM mlt_habitacion where hot_id = $hab_id;");
								while($f1 = $sel1->fetch_assoc())
								{
									echo ('id="hab_id" value="' . $f1['hab_nombre'] . '" >');	
								}
								echo ('<label for="hab_id">Hotel:</label>');
							echo ('</div>');
						}

					?>
					
					<div class="validacion"></div>
                                  
					<div class="input-field">
						<input type="text" name="fac_nombre" required
						id="fac_nombre">
						<label for="fac_nombre">Nombre facilidad de habitacion:</label>
					</div>
                                  
					<div class="input-field">
						<input type="text" name="fac_imagen" required
						id="fac_imagen">
						<label for="fac_imagen">Imagen:</label>
					</div>
                                  
					<div class="input-field">
						<input type="text" name="fac_descripcion" required
						id="fac_descripcion">
						<label for="fac_descripcion">Descripcion:</label>
					</div>
                                  
					<button type="submit" class="btn blue" id="btn_guardar">Guardar</button>
					<a href="mlt_habitacion_ver.php?id=<?php } echo $_SESSION['Habitacion'] ?>" class="btn red ">Cancelar</a>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include '../extend/scripts.php'; ?>

<script src="../js/validacion_mlt_habitacion_facilitys.js"></script>

</body>
</html>
            
