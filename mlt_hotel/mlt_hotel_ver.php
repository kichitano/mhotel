<?php include '../extend/header.php';
include '../extend/permiso.php';

$hot_id = $con->real_escape_string(htmlentities($_GET['id']));
$_SESSION['Hotel'] = $hot_id;

$sel = $con->query("SELECT mlt_hotel.hot_id, mlt_hotel.idi_id, (select mlt_idioma.idi_nombre from mlt_idioma where mlt_idioma.idi_id = mlt_hotel.idi_id) as NombreIdioma, mlt_hotel.hot_nombre, mlt_hotel.hot_direccion, mlt_hotel.hot_ciudad, mlt_hotel.hot_pais, mlt_hotel.hot_ejex, mlt_hotel.hot_ejey, mlt_hotel.hot_email, mlt_hotel.hot_telefono, mlt_hotel.hot_estrellas, mlt_hotel.hot_imagen, mlt_hotel.hot_descripcion, mlt_hotel.hot_estado FROM mlt_hotel WHERE hot_id = $hot_id");
	//$row = mysqli_num_rows($sel);
	while($f = $sel->fetch_assoc()){
?>

<div class="row">
    

	<div class="col s12 ">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Editar Hotel</span>
				<form class="form" action="controller_mlt_hotel.php?op=modificar_mlt_hotel&id=<?php echo $hot_id; ?>" method="post" enctype="multipart/form-data">

					<div class="input-field">
						<input type="text" name="hot_nombre" required autofocus
						id="hot_nombre" onblur="may(this.value, this.id)" value="<?php echo $f['hot_nombre']; ?>">
						<label for="hot_nombre">Nombre Hotel:</label>
					</div>
					
					<div class="validacion"></div>

					<div class="input-field">
						<input type="text" name="hot_direccion" required
						id="hot_direccion" value="<?php echo $f['hot_direccion']; ?>">
						<label for="hot_direccion">Direccion:</label>
					</div>

					<div class="input-field">
						<input type="text" name="hot_ciudad" required
						id="hot_ciudad" value="<?php echo $f['hot_ciudad']; ?>">
						<label for="hot_ciudad">Ciudad:</label>
					</div>

					<div class="input-field">
						<input type="text" name="hot_pais" required
						id="hot_pais" value="<?php echo $f['hot_pais']; ?>">
						<label for="hot_pais">Pais:</label>
					</div>

					<div class="input-field">
				    <select name="idi_id" id="idi_id">
				      <option value="" disabled selected>Elija Idioma</option>
				      <?php 
					    $sel2 = $con->query("SELECT idi_id, idi_nombre FROM mlt_idioma WHERE idi_estado = 1;");
						
						echo '<option value="' . $f['idi_id'] . '" selected>' . $f['NombreIdioma'] . '</option>';

						while($g = $sel2->fetch_assoc()){

							if($f['NombreIdioma'] == $g['idi_nombre']){
								//echo '<option value="' . $g['idi_id'] . '">' . $g['idi_nombre'] . '</option>';
							} else{
								echo '<option value="' . $g['idi_id'] . '">' . $g['idi_nombre'] . '</option>';
							}
						}
				       ?>
				    </select>
				    <label>Seleccione Idioma</label>
				  	</div>

					<div class="input-field">
						<input type="text" name="hot_ejex" required
						id="hot_ejex" value="<?php echo $f['hot_ejex']; ?>">
						<label for="hot_ejex">Latitud:</label>
					</div>

					<div class="input-field">
						<input type="text" name="hot_ejey" required
						id="hot_ejey" value="<?php echo $f['hot_ejey']; ?>">
						<label for="hot_ejey">Longitud:</label>
					</div>

					<div class="input-field">
						<input type="text" name="hot_email" required
						id="hot_email" value="<?php echo $f['hot_email']; ?>">
						<label for="hot_email">Email:</label>
					</div>

					<div class="input-field">
						<input type="text" name="hot_telefono" required
						id="hot_telefono" value="<?php echo $f['hot_telefono']; ?>">
						<label for="hot_telefono">Telefono:</label>
					</div>

					<div class="input-field">
						<input type="text" name="hot_estrellas" required
						id="hot_estrellas" value="<?php echo $f['hot_estrellas']; ?>">
						<label for="hot_estrellas">Estrellas:</label>
					</div>

					<div class="input-field">
						<input type="text" name="hot_imagen" required
						id="hot_imagen" value="<?php echo $f['hot_imagen']; ?>">
						<label for="hot_imagen">Imagen:</label>
					</div>

					<div class="input-field">
						<input type="text" name="hot_descripcion" required
						id="hot_descripcion" value="<?php echo $f['hot_descripcion']; ?>">
						<label for="hot_descripcion">Descripcion:</label>
					</div>

					<button type="submit" class="btn green accent-3" id="btn_guardar">Modificar HOTEL</button>
					<?php }?>
					<a href="index.php" class="btn red ">Cancelar</a>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="row">
            <div class = "col s12">
                    <nav class="white lighten-3">
                            <div class="nav_wrapper">
                                    <div class="input-field">
                                            <input type="search" id="buscar" autocomplete="off" >
                                            <label for="buscar"><i class="material-icons">search</i></label>
                                            <i class="material-icons">close</i>
                                    </div>
                            </div>
                    </nav>
            </div>
    </div>
    
    <?php $sel = $con->query("SELECT mlt_hotel_servicios.seh_id, mlt_hotel_servicios.hot_id, (select mlt_hotel.hot_nombre from mlt_hotel where hot_id = mlt_hotel_servicios.hot_id) as NombreHotel, mlt_hotel_servicios.seh_nombre, mlt_hotel_servicios.seh_imagen, mlt_hotel_servicios.seh_descripcion, mlt_hotel_servicios.seh_estado FROM mlt_hotel_servicios WHERE mlt_hotel_servicios.hot_id = $hot_id;");
            $row = mysqli_num_rows($sel);
    ?>
    <div class="row">
            <div class="col s12">
                    <div class="card">
                            <div class="card-content">
                                    <span class="card-title">Servicios Hotel (<?php echo $row; ?>) </span>
                                    <TABLE>
                                            <THEAD>
                                                    <th>Id</th>
                                                    <th>Hotel</th>
                                                    <th>Nombre</th>
                                                    <th>Imagen</th>
                                                    <th>Descripcion</th>
                                                    <th>Bloqueo</th>
                                                    <th>Editar</th>
                                                    <th>Eliminar</th>
                                            </THEAD>
                                            <?php while($f = $sel->fetch_assoc()){ ?>
                                                    <tr>
                                                            <td><?php echo $f['seh_id']?></td>
                                                            <td><?php echo $f['NombreHotel']?></td>
                                                            <td><?php echo $f['seh_nombre']?></td>
                                                            <td><?php echo $f['seh_imagen']?></td>
                                                            <td><?php echo $f['seh_descripcion']?></td>
                                                            <td>
                                                            <?php if($f['seh_estado'] == 1): ?>
                                                                    <a href="controller_mlt_hotel_servicios.php?op=bloquear_mlt_hotel_servicios&id=<?php echo $f['seh_id'] ?>&bl=<?php echo $f['seh_estado'] ?>"><i class = "material-icons green-text">lock_open</i></a>
                                                                    <?php else: ?>
                                                                    <a href="controller_mlt_hotel_servicios.php?op=bloquear_mlt_hotel_servicios&id=<?php echo $f['seh_id'] ?>&bl=<?php echo $f['seh_estado'] ?>"><i class = "material-icons red-text">lock_outline</i></a>
                                                            <?php endif; ?>
                                                            </td>
                                                            <td>
                                                            
                                                            <?php if($f['seh_estado'] == 1): ?>
                                                                    <a href="mlt_hotel_servicios_ver.php?id=<?php echo $f['seh_id']; ?>" class="btn green accent-3"><i class = "material-icons">edit</i></a>
                                                                    <?php else: ?>
                                                            <?php endif; ?>
                                                            </td>
                                                            <td>
                                                            <?php if($f['seh_estado'] == 0): ?>
                                                                    
                                                                    <a href="#" onclick="swal({ title: 'Esta seguro que desea eliminar el item?',
                                                                    text: 'Al eliminar no podra recuperarlo', type: 'warning', 
                                                                    showCancelButton: true, 
                                                                    confirmButtonColor: '#3085d6',
                                                                    cancelButtonColor: '#d33',
                                                                    confirmButtonText: 'Si, Eliminarlo'
                                                                    }).then(function () {
                                                                            location.href='controller_mlt_hotel_servicios.php?op=eliminar_mlt_hotel_servicios&id=<?php echo $f['seh_id'] ?>';
                                                                    })" class = "btn-floating red" ><i class="material-icons">clear</i></a>
                                                                    
                                                                    <?php else: ?>
                                                            <?php endif; ?>
                                                            </td>
                                                        </tr>
                                            <?php } ?>
                                    </TABLE>
                            </div>
                    </div>
            </div>
            <div class="row">
                    <div class = "col s12">
                            <a href="mlt_hotel_servicios_nuevo.php" class="btn green accent-3">NUEVO SERVICIO DE HOTEL</a>
                    </div>
            </div>
    </div>

<?php include '../extend/scripts.php'; ?>

<script src="../js/validacion_mlt_hotel.js"></script>

</body>
</html>

