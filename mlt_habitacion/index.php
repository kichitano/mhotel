    <?php include '../extend/header.php';
    include '../extend/permiso.php';
    ?>
    
    <div class="row">
            <div class = "col s12">
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
    
    <?php
    if($_SESSION['nivel'] == '0')
    {
        $sel = $con->query("SELECT mlt_habitacion.hab_id, mlt_habitacion.hot_id, (select mlt_hotel.hot_nombre from mlt_hotel where hot_id = mlt_habitacion.hot_id) as NombreHotel, mlt_habitacion.hab_nombre, mlt_habitacion.hab_imagen, mlt_habitacion.hab_precio, mlt_habitacion.hab_ocupacion, mlt_habitacion.hab_descripcion, mlt_habitacion.hab_estado FROM mlt_habitacion");
    }
    else
    {   $hot_id = $_SESSION['hot_id'];
        $sel = $con->query("SELECT mlt_habitacion.hab_id, mlt_habitacion.hot_id, (select mlt_hotel.hot_nombre from mlt_hotel where hot_id = mlt_habitacion.hot_id) as NombreHotel, mlt_habitacion.hab_nombre, mlt_habitacion.hab_imagen, mlt_habitacion.hab_precio, mlt_habitacion.hab_ocupacion, mlt_habitacion.hab_descripcion, mlt_habitacion.hab_estado FROM mlt_habitacion WHERE mlt_habitacion.hot_id = $hot_id");
    }     
            $row = mysqli_num_rows($sel);
    
    ?>
    <div class="row">
            <div class="col s12">
                    <div class="card">
                            <div class="card-content">
                            <?php 
                                if($_SESSION['nivel'] == 0)
                                {
                                    echo ('<span class="card-title">Habitaciones ('. $row .') </span>');
                                }else
                                {
                                    $hot_nombre = $_SESSION['hot_nombre'];
                                    echo ('<span class="card-title">Habitaciones del ' . $hot_nombre . ' ('. $row .') </span>');
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
                                                                    <a href="controller_mlt_habitacion.php?op=bloquear_mlt_habitacion&id=<?php echo $f['hab_id'] ?>&bl=<?php echo $f['hab_estado'] ?>"><i class = "material-icons green-text">lock_open</i></a>
                                                                    <?php else: ?>
                                                                    <a href="controller_mlt_habitacion.php?op=bloquear_mlt_habitacion&id=<?php echo $f['hab_id'] ?>&bl=<?php echo $f['hab_estado'] ?>"><i class = "material-icons red-text">lock_outline</i></a>
                                                            <?php endif; ?>
                                                            </td>
                                                            <td>
                                                            
                                                            <?php if($f['hab_estado'] == 1): ?>
                                                                    <a href="mlt_habitacion_ver.php?id=<?php echo $f['hab_id']; ?>" class="btn green accent-3"><i class = "material-icons">edit</i></a>
                                                                    <?php else: ?>
                                                            <?php endif; ?>
                                                            </td>
                                                            <td>
                                                            <?php if($f['hab_estado'] == 0): ?>
                                                                    
                                                                    <a href="#" onclick="swal({ title: 'Esta seguro que desea eliminar el item?',
                                                                    text: 'Al eliminar no podra recuperarlo', type: 'warning', 
                                                                    showCancelButton: true, 
                                                                    confirmButtonColor: '#3085d6',
                                                                    cancelButtonColor: '#d33',
                                                                    confirmButtonText: 'Si, Eliminarlo'
                                                                    }).then(function () {
                                                                            location.href='controller_mlt_habitacion.php?op=eliminar_mlt_habitacion&id=<?php echo $f['hab_id'] ?>';
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
                            <a href="mlt_habitacion_nuevo.php" class="btn green accent-3">NUEVA HABITACION</a>
                    </div>
            </div>
    </div>
    
    <?php include '../extend/scripts.php'; ?>
    
    <script src="../js/validacion_mlt_habitacion.js"></script>
    
    </body>
    </html>
