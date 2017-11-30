<?php include '../extend/header.php'; ?>

<div class="row">
	<div class="col s12">

	<?php
    if($_SESSION['nivel'] == '0')
    {
        $sel = $con->query("SELECT mlt_habitacion.hab_id, mlt_habitacion.hot_id, (select mlt_hotel.hot_nombre from mlt_hotel where hot_id = mlt_habitacion.hot_id) as NombreHotel, mlt_habitacion.hab_nombre, mlt_habitacion.hab_imagen, mlt_habitacion.hab_precio, mlt_habitacion.hab_ocupacion, mlt_habitacion.hab_descripcion, mlt_habitacion.hab_estado FROM mlt_habitacion where mlt_habitacion.hab_ocupacion = 1;");
    }
    else
    {   $hot_id = $_SESSION['hot_id'];
        $sel = $con->query("SELECT mlt_habitacion.hab_id, mlt_habitacion.hot_id, (select mlt_hotel.hot_nombre from mlt_hotel where hot_id = mlt_habitacion.hot_id) as NombreHotel, mlt_habitacion.hab_nombre, mlt_habitacion.hab_imagen, mlt_habitacion.hab_precio, mlt_habitacion.hab_ocupacion, mlt_habitacion.hab_descripcion, mlt_habitacion.hab_estado FROM mlt_habitacion WHERE mlt_habitacion.hot_id = $hot_id and mlt_habitacion.hab_ocupacion = 0;");
    }     
            $row = mysqli_num_rows($sel);
    
    ?>
		
			<ul id="tabs-swipe-demo" class="tabs">	
			    <li class="tab col s3"><a class="active" href="#test-swipe-1">Habitaciones Libres</a></li>
			    <li class="tab col s3"><a href="#test-swipe-2">Habitaciones Ocupadas</a></li>
			    <li class="tab col s3"><a href="#test-swipe-3">Reservas</a></li>
			  </ul>
			  <div id="test-swipe-1" class="col s12 white">

			  		<div class="row">
		            <div class="col s12">
		                    <div class="card">
		                            <div class="card-content">
		                            <?php 
		                                if($_SESSION['nivel'] == 0)
		                                {
		                                    echo ('<span class="card-title">Habitaciones Libres ('. $row .') </span>');
		                                }else
		                                {
		                                    $hot_nombre = $_SESSION['hot_nombre'];
		                                    echo ('<span class="card-title">Habitaciones Libres del ' . $hot_nombre . ' ('. $row .') </span>');
		                                }
		                                
		                                ?>
		                                    <TABLE>
		                                            <THEAD>
		                                                    <th>Id</th>
		                                                    
		                                                    <?php 
		                                                            if($_SESSION['nivel'] == 0)
		                                                            {
		                                                                echo ('<th>Hotel</th>');
		                                                            }
		                                                            ?>
		                                                    <th>Habiacion</th>
		                                                    <th>Imagen</th>
		                                                    <th>Precio</th>
		                                                    <th>Ocupacion</th>
		                                                    <th>Descripcion</th>
		                                                    <th>Bloqueo</th>
		                                                    <th>Editar</th>
		                                                    <th>Eliminar</th>
		                                            </THEAD>
		                                            <?php while($f = $sel->fetch_assoc()){ ?>
		                                                    <tr>
		                                                            <td><?php  echo $f['hab_id']?></td>
		                                                            <?php 
		                                                            if($_SESSION['nivel'] == 0)
		                                                            {
		                                                                echo ('<td>' . $f['NombreHotel'] . '</td>');
		                                                            }
		                                                            ?>
		                                                            
		                                                            <td><?php echo $f['hab_nombre']?></td>
		                                                            <td><?php echo $f['hab_imagen']?></td>
		                                                            <td><?php echo $f['hab_precio']?></td>
		                                                            <td><?php echo $f['hab_ocupacion']?></td>
		                                                            <td><?php echo $f['hab_descripcion']?></td>
		                                                            <td>
		                                                            <?php if($f['hab_estado'] == 1): ?>
		                                                                    <a href="#"><i class = "material-icons green-text">lock_open</i></a>
		                                                                    <?php else: ?>
		                                                                    <a href="#"><i class = "material-icons red-text">lock_outline</i></a>
		                                                            <?php endif; ?>
		                                                            </td>
		                                                            <td>
		                                                            
		                                                            <?php if($f['hab_estado'] == 1): ?>
		                                                                    <!--a href="mlt_habitacion_ver.php?id=<?php echo $f['hab_id']; ?>" class="btn green accent-3"><i class = "material-icons">edit</i></a-->
		                                                                    <a href="mlt_habitacion_ver.php?id=<?php echo $f['hab_id']; ?>" class="btn green accent-3"><i class = "material-icons">edit</i></a>
		                                                                    <?php else: ?>
		                                                            <?php endif; ?>
		                                                            </td>
		                                                        </tr>
		                                            <?php } ?>
		                                    </TABLE>
		                            </div>
		                    </div>
		            </div>
		    </div>
			  		
									<!--p>Contenido</p>
									<p> <?php //echo $_SESSION['emp_id'];?></p>
									<p> <?php //echo $_SESSION['hot_id'];?></p>
									<p> <?php //echo $_SESSION['nick'];?></p-->


			  </div>


			  <div id="test-swipe-2" class="col s12 white">

			  <?php
    if($_SESSION['nivel'] == '0')
    {
        $sel1 = $con->query("SELECT mlt_habitacion.hab_id, mlt_habitacion.hot_id, (select mlt_hotel.hot_nombre from mlt_hotel where hot_id = mlt_habitacion.hot_id) as NombreHotel, mlt_habitacion.hab_nombre, mlt_habitacion.hab_imagen, mlt_habitacion.hab_precio, mlt_habitacion.hab_ocupacion, mlt_habitacion.hab_descripcion, mlt_habitacion.hab_estado FROM mlt_habitacion where mlt_habitacion.hab_ocupacion = 1;");
    }
    else
    {   $hot_id = $_SESSION['hot_id'];
        $sel1 = $con->query("SELECT mlt_habitacion.hab_id, mlt_habitacion.hot_id, (select mlt_hotel.hot_nombre from mlt_hotel where hot_id = mlt_habitacion.hot_id) as NombreHotel, mlt_habitacion.hab_nombre, mlt_habitacion.hab_imagen, mlt_habitacion.hab_precio, mlt_habitacion.hab_ocupacion, mlt_habitacion.hab_descripcion, mlt_habitacion.hab_estado FROM mlt_habitacion WHERE mlt_habitacion.hot_id = $hot_id and mlt_habitacion.hab_ocupacion = 0;");
    }     
            $row1 = mysqli_num_rows($sel1);
    
    ?>
		
			<ul id="tabs-swipe-demo" class="tabs">	
			    <li class="tab col s3"><a class="active" href="#test-swipe-1">Habitaciones Libres</a></li>
			    <li class="tab col s3"><a href="#test-swipe-2">Habitaciones Ocupadas</a></li>
			    <li class="tab col s3"><a href="#test-swipe-3">Reservas</a></li>
			  </ul>
			  <div id="test-swipe-1" class="col s12 white">

			  		<div class="row">
		            <div class="col s12">
		                    <div class="card">
		                            <div class="card-content">
		                            <?php 
		                                if($_SESSION['nivel'] == 0)
		                                {
		                                    echo ('<span class="card-title">Habitaciones Libres ('. $row1 .') </span>');
		                                }else
		                                {
		                                    $hot_nombre = $_SESSION['hot_nombre'];
		                                    echo ('<span class="card-title">Habitaciones Acupadas del ' . $hot_nombre . ' ('. $row1 .') </span>');
		                                }
		                                
		                                ?>
		                                    <TABLE>
		                                            <THEAD>
		                                                    <th>Id</th>
		                                                    
		                                                    <?php 
		                                                            if($_SESSION['nivel'] == 0)
		                                                            {
		                                                                echo ('<th>Hotel</th>');
		                                                            }
		                                                            ?>
		                                                    <th>Habiacion</th>
		                                                    <th>Imagen</th>
		                                                    <th>Precio</th>
		                                                    <th>Ocupacion</th>
		                                                    <th>Descripcion</th>
		                                                    <th>Bloqueo</th>
		                                                    <th>Editar</th>
		                                                    <th>Eliminar</th>
		                                            </THEAD>
		                                            <?php while($f1 = $sel1->fetch_assoc()){ ?>
		                                                    <tr>
		                                                            <td><?php  echo $f1['hab_id']?></td>
		                                                            <?php 
		                                                            if($_SESSION['nivel'] == 0)
		                                                            {
		                                                                echo ('<td>' . $f1['NombreHotel'] . '</td>');
		                                                            }
		                                                            ?>
		                                                            
		                                                            <td><?php echo $f1['hab_nombre']?></td>
		                                                            <td><?php echo $f1['hab_imagen']?></td>
		                                                            <td><?php echo $f1['hab_precio']?></td>
		                                                            <td><?php echo $f1['hab_ocupacion']?></td>
		                                                            <td><?php echo $f1['hab_descripcion']?></td>
		                                                            <td>
		                                                            <?php if($f1['hab_estado'] == 1): ?>
		                                                                    <a href="#"><i class = "material-icons green-text">lock_open</i></a>
		                                                                    <?php else: ?>
		                                                                    <a href="#"><i class = "material-icons red-text">lock_outline</i></a>
		                                                            <?php endif; ?>
		                                                            </td>
		                                                            <td>
		                                                            
		                                                            <?php if($f1['hab_estado'] == 1): ?>
		                                                                    <!--a href="mlt_habitacion_ver.php?id=<?php //echo $f['hab_id']; ?>" class="btn green accent-3"><i class = "material-icons">edit</i></a-->
		                                                                    <a href="mlt_habitacion_ver.php?id=<?php echo $f1['hab_id']; ?>" class="btn green accent-3"><i class = "material-icons">edit</i></a>
		                                                                    <?php else: ?>
		                                                            <?php endif; ?>
		                                                            </td>
		                                                        </tr>
		                                            <?php } ?>
		                                    </TABLE>
		                            </div>
		                    </div>
		            </div>
		    </div>
			  	
									<p> <?php echo $_SESSION['nombre'];?></p>
									<p> <?php echo $_SESSION['apellido'];?></p>
									<p> <?php echo $_SESSION['nivel'];?></p>

			  </div>


			  <div id="test-swipe-3" class="col s12 white">Test 3

			  	<?php
    if($_SESSION['nivel'] == '0')
    {
        $sel2 = $con->query("SELECT mlt_habitacion.hab_id, mlt_habitacion.hot_id, (select mlt_hotel.hot_nombre from mlt_hotel where hot_id = mlt_habitacion.hot_id) as NombreHotel, mlt_habitacion.hab_nombre, mlt_habitacion.hab_imagen, mlt_habitacion.hab_precio, mlt_habitacion.hab_ocupacion, mlt_habitacion.hab_descripcion, mlt_habitacion.hab_estado FROM mlt_habitacion WHERE mlt_habitacion.hab_ocupacion = 1;");
    }
    else
    {   $hot_id = $_SESSION['hot_id'];
        $sel2 = $con->query("SELECT mlt_habitacion.hab_id, mlt_habitacion.hot_id, (select mlt_hotel.hot_nombre from mlt_hotel where hot_id = mlt_habitacion.hot_id) as NombreHotel, mlt_habitacion.hab_nombre, mlt_habitacion.hab_imagen, mlt_habitacion.hab_precio, mlt_habitacion.hab_ocupacion, mlt_habitacion.hab_descripcion, mlt_habitacion.hab_estado FROM mlt_habitacion WHERE mlt_habitacion.hot_id = $hot_id and mlt_habitacion.hab_ocupacion = 0;");
    }     
            $row2 = mysqli_num_rows($sel2);
    
    ?>
		
			<ul id="tabs-swipe-demo" class="tabs">	
			    <li class="tab col s3"><a class="active" href="#test-swipe-1">Habitaciones Libres</a></li>
			    <li class="tab col s3"><a href="#test-swipe-2">Habitaciones Ocupadas</a></li>
			    <li class="tab col s3"><a href="#test-swipe-3">Reservas</a></li>
			  </ul>
			  <div id="test-swipe-1" class="col s12 white">

			  		<div class="row">
		            <div class="col s12">
		                    <div class="card">
		                            <div class="card-content">
		                            <?php 
		                                if($_SESSION['nivel'] == 0)
		                                {
		                                    echo ('<span class="card-title">Habitaciones Libres ('. $row1 .') </span>');
		                                }else
		                                {
		                                    $hot_nombre = $_SESSION['hot_nombre'];
		                                    echo ('<span class="card-title">Habitaciones Acupadas del ' . $hot_nombre . ' ('. $row2 .') </span>');
		                                }
		                                
		                                ?>
		                                    <TABLE>
		                                            <THEAD>
		                                                    <th>Id</th>
		                                                    
		                                                    <?php 
		                                                            if($_SESSION['nivel'] == 0)
		                                                            {
		                                                                echo ('<th>Hotel</th>');
		                                                            }
		                                                            ?>
		                                                    <th>Habiacion</th>
		                                                    <th>Imagen</th>
		                                                    <th>Precio</th>
		                                                    <th>Ocupacion</th>
		                                                    <th>Descripcion</th>
		                                                    <th>Bloqueo</th>
		                                                    <th>Editar</th>
		                                                    <th>Eliminar</th>
		                                            </THEAD>
		                                            <?php while($f1 = $sel1->fetch_assoc()){ ?>
		                                                    <tr>
		                                                            <td><?php  echo $f2['hab_id']?></td>
		                                                            <?php 
		                                                            if($_SESSION['nivel'] == 0)
		                                                            {
		                                                                echo ('<td>' . $f2['NombreHotel'] . '</td>');
		                                                            }
		                                                            ?>
		                                                            
		                                                            <td><?php echo $f2['hab_nombre']?></td>
		                                                            <td><?php echo $f2['hab_imagen']?></td>
		                                                            <td><?php echo $f2['hab_precio']?></td>
		                                                            <td><?php echo $f2['hab_ocupacion']?></td>
		                                                            <td><?php echo $f2['hab_descripcion']?></td>
		                                                            <td>
		                                                            <?php if($f2['hab_estado'] == 1): ?>
		                                                                    <a href="#"><i class = "material-icons green-text">lock_open</i></a>
		                                                                    <?php else: ?>
		                                                                    <a href="#"><i class = "material-icons red-text">lock_outline</i></a>
		                                                            <?php endif; ?>
		                                                            </td>
		                                                            <td>
		                                                            
		                                                            <?php if($f2['hab_estado'] == 1): ?>
		                                                                    <!--a href="mlt_habitacion_ver.php?id=<?php //echo $f['hab_id']; ?>" class="btn green accent-3"><i class = "material-icons">edit</i></a-->
		                                                                    <a href="mlt_habitacion_ver.php?id=<?php echo $f2['hab_id']; ?>" class="btn green accent-3"><i class = "material-icons">edit</i></a>
		                                                                    <?php else: ?>
		                                                            <?php endif; ?>
		                                                            </td>
		                                                        </tr>
		                                            <?php } ?>
		                                    </TABLE>
		                            </div>
		                    </div>
		            </div>
		    </div>

									<p> <?php echo $_SESSION['correo'];?></p>
									<p> <?php echo $_SESSION['estado'];?></p>	
									<span class="card-title">Planing pero del bravooo!!</span>

			  </div>

</div>

<?php include '../extend/scripts.php'; ?>

</body>
</html>
