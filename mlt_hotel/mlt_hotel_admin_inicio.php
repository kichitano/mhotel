<?php include '../extend/header.php';
include '../extend/permiso.php';

$hot_id = $_SESSION['hot_id'];

$sel = $con->query("SELECT mlt_hotel.hot_id, mlt_hotel.idi_id, (select mlt_idioma.idi_nombre from mlt_idioma where mlt_idioma.idi_id = mlt_hotel.idi_id) as NombreIdioma, mlt_hotel.hot_nombre, mlt_hotel.hot_direccion, mlt_hotel.hot_ciudad, mlt_hotel.hot_pais, mlt_hotel.hot_ejex, mlt_hotel.hot_ejey, mlt_hotel.hot_email, mlt_hotel.hot_telefono, mlt_hotel.hot_estrellas, mlt_hotel.hot_imagen, mlt_hotel.hot_descripcion, mlt_hotel.hot_estado FROM mlt_hotel WHERE hot_id = $hot_id");
	//$row = mysqli_num_rows($sel);
	while($f = $sel->fetch_assoc()){
?>

<div class="row">
	<div class="col s3 ">
		<div class="card">
			<div class="card-content">

				<span class="card-title">Ficha Hotel:</span>

				<h6>Nombre Hotel:</h6>
				<h5><?php echo $f['hot_nombre'];?></h5>
				<h6>Idioma:</h6>
				<h5><?php echo $f['NombreIdioma'];?></h5>
				<h6>Ciudad:</h6>
				<h5><?php echo $f['hot_ciudad'];?></h5>
				<h6>Pais:</h6>
				<h5><?php echo $f['hot_pais'];?></h5>
				<h6>Estrellas:</h6>
				<h5><?php echo $f['hot_estrellas'];?></h5>
				<h6>Telefono:</h6>
				<h5><?php echo $f['hot_telefono'];?></h5>
				<h6>Imagen:</h6>
				<h5><?php echo $f['hot_imagen'];?></h5>
				<h6>Estado:</h6>
				<h5><?php
							if($f['hot_estado'] == 1){
							echo 'Activo';
							}
							else{
							echo 'Inactivo';
							}}?></h5>
				<!--a href="index.php" class="btn red ">Cancelar</a-->
			</div>
		</div>
	</div>



	<div class="col s9 ">
		<div class="card">
			<div class="card-content">

				<span class="card-title">Servicios Hotel:</span>

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
                                                                    <a href="mlt_hotel_servicios_admin_ver.php?id=<?php echo $f['seh_id']; ?>" class="btn green accent-3"><i class = "material-icons">edit</i></a>
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
                            <a href="mlt_hotel_servicios_admin_nuevo.php" class="btn green accent-3">NUEVO SERVICIO DE HOTEL</a>
                    </div>
            </div>
    </div>
			</div>
		</div>
	</div>
</div>



<?php include '../extend/scripts.php'; ?>



</body>
</html>