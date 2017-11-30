<?php include '../extend/header.php';
include '../extend/permiso.php';

$hab_id = $con->real_escape_string(htmlentities($_GET['id']));
$_SESSION['Habitacion'] = $hab_id;

$sel = $con->query("SELECT mlt_habitacion.hab_id, mlt_habitacion.hot_id, (select mlt_hotel.hot_nombre from mlt_hotel where mlt_hotel.hot_id = mlt_habitacion.hot_id) as NombreHotel, mlt_habitacion.hab_nombre, mlt_habitacion.hab_imagen, mlt_habitacion.hab_precio, mlt_habitacion.hab_ocupacion, mlt_habitacion.hab_descripcion, mlt_habitacion.hab_estado FROM mlt_habitacion WHERE hab_id = $hab_id");
	//$row = mysqli_num_rows($sel);
	while($f = $sel->fetch_assoc()){
?>

<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Editar Habitacion</span>
				<form class="form" action="controller_mlt_habitacion.php?op=modificar_mlt_habitacion&id=<?php echo $hab_id; ?>" method="post" enctype="multipart/form-data">

					<?php

                        if($_SESSION['nivel'] == 0)
                        {
                            echo ('<div class="input-field">');
                            echo ('<select name="hot_id" id="hot_id">');

                            echo ('option value="" disabled selected>Elija Hotel</option>');
                              
                                $sel2 = $con->query("SELECT hot_id, hot_nombre FROM mlt_hotel where hot_estado = 1 and hot_id != 1 order by hot_nombre;");
                                //$row = mysqli_num_rows($sel);

                                while($f1 = $sel2->fetch_assoc()){
                                    echo '<option value="' . $f1['hot_id'] . '" selected>' . $f1['hot_nombre'] . '</option>';
                                }
                               
                            echo ('</select>');
                            echo ('<label>Seleccione Hotel</label>');
                            echo ('</div>');
                        }
                        else
                        {
                            echo ('<div class="input-field">');
                                echo ('<input type="text" name="hot_id" disabled required');
                                $hoteel = $_SESSION['hot_id'];
                                $sel2 = $con->query("SELECT hot_id, hot_nombre FROM mlt_hotel where hot_id = $hoteel;");
                                while($f1 = $sel2->fetch_assoc())
                                {
                                    echo ('id="hot_id" value="' . $f1['hot_nombre'] . '" >');    
                                }
                                echo ('<label for="hot_id">Hotel:</label>');
                            echo ('</div>');
                        }

                    ?>

					<div class="input-field">
						<input type="text" name="hab_nombre" required
						id="hab_nombre" value="<?php echo $f['hab_nombre']; ?>">
						<label for="hab_nombre">Nombre:</label>
					</div>

					<div class="input-field">
						<input type="text" name="hab_imagen" required
						id="hab_imagen" value="<?php echo $f['hab_imagen']; ?>">
						<label for="hab_imagen">Imagen:</label>
					</div>

					<div class="input-field">
						<input type="text" name="hab_precio" required
						id="hab_precio" value="<?php echo $f['hab_precio']; ?>">
						<label for="hab_precio">Precio:</label>
					</div>

					<div class="input-field">
						<input type="text" name="hab_ocupacion" required
						id="hab_ocupacion" value="<?php echo $f['hab_ocupacion']; ?>">
						<label for="hab_ocupacion">Ocupacion:</label>
					</div>

					<div class="input-field">
						<input type="text" name="hab_descripcion" required
						id="hab_descripcion" value="<?php echo $f['hab_descripcion']; ?>">
						<label for="hab_descripcion">Descripcion:</label>
					</div>

					<button type="submit" class="btn green accent-3" id="btn_guardar">Modificar Habitacion</button>
					<?php }?>
					<a href="index.php" class="btn red ">Cancelar</a>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="row">
            <div class = "col s12">
                    <nav class="brown lighten-3">
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
    
    <?php $sel = $con->query("SELECT mlt_habitacion_facilitys.fac_id, mlt_habitacion_facilitys.hab_id, (select mlt_habitacion.hab_nombre from mlt_habitacion where mlt_habitacion.hab_id = mlt_habitacion_facilitys.hab_id) as HabitacionNombre, mlt_habitacion_facilitys.fac_nombre, mlt_habitacion_facilitys.fac_imagen, mlt_habitacion_facilitys.fac_descripcion, mlt_habitacion_facilitys.fac_estado FROM mlt_habitacion_facilitys WHERE mlt_habitacion_facilitys.hab_id = $hab_id");
            $row = mysqli_num_rows($sel);
    ?>
    <div class="row">
            <div class="col s12">
                    <div class="card">
                            <div class="card-content">
                                    <span class="card-title">Facilidad de Habitacion (<?php echo $row; ?>) </span>
                                    <TABLE>
                                            <THEAD>
                                                    <th>Id</th>
                                                    <th>Facilidad</th>
                                                    <th>Habitacion</th>
                                                    <th>Imagen</th>
                                                    <th>Descripcion</th>
                                                    <th>Bloqueo</th>
                                                    <th>Editar</th>
                                                    <th>Eliminar</th>
                                            </THEAD>
                                            <?php while($f = $sel->fetch_assoc()){ ?>
                                                    <tr>
                                                            <td><?php echo $f['fac_id']?></td>
                                                            <td><?php echo $f['fac_nombre']?></td>
                                                            <td><?php echo $f['HabitacionNombre']?></td>                                                            
                                                            <td><?php echo $f['fac_imagen']?></td>
                                                            <td><?php echo $f['fac_descripcion']?></td>
                                                            <td>
                                                            <?php if($f['fac_estado'] == 1): ?>
                                                                    <a href="controller_mlt_habitacion_facilitys.php?op=bloquear_mlt_habitacion_facilitys&id=<?php echo $f['fac_id'] ?>&bl=<?php echo $f['fac_estado'] ?>"><i class = "material-icons green-text">lock_open</i></a>
                                                                    <?php else: ?>
                                                                    <a href="controller_mlt_habitacion_facilitys.php?op=bloquear_mlt_habitacion_facilitys&id=<?php echo $f['fac_id'] ?>&bl=<?php echo $f['fac_estado'] ?>"><i class = "material-icons red-text">lock_outline</i></a>
                                                            <?php endif; ?>
                                                            </td>
                                                            <td>
                                                            
                                                            <?php if($f['fac_estado'] == 1): ?>
                                                                    <a href="mlt_habitacion_facilitys_ver.php?id=<?php echo $f['fac_id']; ?>" class="btn green accent-3"><i class = "material-icons">edit</i></a>
                                                                    <?php else: ?>
                                                            <?php endif; ?>
                                                            </td>
                                                            <td>
                                                            <?php if($f['fac_estado'] == 0): ?>
                                                                    
                                                                    <a href="#" onclick="swal({ title: 'Esta seguro que desea eliminar el item?',
                                                                    text: 'Al eliminar no podra recuperarlo', type: 'warning', 
                                                                    showCancelButton: true, 
                                                                    confirmButtonColor: '#3085d6',
                                                                    cancelButtonColor: '#d33',
                                                                    confirmButtonText: 'Si, Eliminarlo'
                                                                    }).then(function () {
                                                                            location.href='controller_mlt_habitacion_facilitys.php?op=eliminar_mlt_habitacion_facilitys&id=<?php echo $f['fac_id'] ?>';
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
                            <a href="mlt_habitacion_facilitys_nuevo.php" class="btn green accent-3">NUEVO FACILIDAD HABITACION</a>
                    </div>
            </div>
    </div>

<?php include '../extend/scripts.php'; ?>

<script src="../js/validacion_mlt_habitacion.js"></script>

</body>
</html>

