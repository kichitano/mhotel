    <?php include '../extend/header.php';
    include '../extend/permiso.php';
    $nivel = $_SESSION['nivel'];
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

    if($nivel == 0)
    {
        $sel = $con->query("SELECT mlt_extras.ext_id, mlt_extras.hot_id, (select mlt_hotel.hot_nombre from mlt_hotel where mlt_hotel.hot_id = mlt_extras.hot_id) as NombreHotel, mlt_extras.ext_nombre, mlt_extras.ext_descripcion, mlt_extras.ext_precio, mlt_extras.ext_estado FROM mlt_extras");
    }
    else
    {
        $sel = $con->query("SELECT mlt_extras.ext_id, mlt_extras.hot_id, (select mlt_hotel.hot_nombre from mlt_hotel where mlt_hotel.hot_id = mlt_extras.hot_id) as NombreHotel, mlt_extras.ext_nombre, mlt_extras.ext_descripcion, mlt_extras.ext_precio, mlt_extras.ext_estado FROM mlt_extras WHERE hot_id = " . $_SESSION['hot_id'] . ";");
    }
    
    $row = mysqli_num_rows($sel);

    ?>
    <div class="row">
            <div class="col s12">
                    <div class="card">
                            <div class="card-content">
                                    <span class="card-title">Extras (<?php echo $row; ?>) </span>
                                    <TABLE>
                                            <THEAD>
                                                    <th>Id</th>
                                                    <?php 

                                                        if($nivel == "0")
                                                        {
                                                            echo "<th>Hotel</th>";
                                                        }
                                                        else
                                                        {
                                                                  
                                                        }
                                                    ?>
                                                    <th>Nombre</th>
                                                    <th>Descripcion</th>
                                                    <th>Precio</th>
                                                    <th>Bloqueo</th>
                                                    <th>Editar</th>
                                                    <th>Eliminar</th>
                                            </THEAD>
                                            <?php while($f = $sel->fetch_assoc()){ ?>
                                                    <tr>
                                                            <td><?php echo $f['ext_id'];?></td>
                                                            <?php 

                                                                if($nivel == "0")
                                                                {
                                                                    echo "<td>" . $f['NombreHotel'] . "</td>";
                                                                }
                                                                else
                                                                {
                                                                    
                                                                }
                                                            ?>
                                                            <td><?php echo $f['ext_nombre']?></td>
                                                            <td><?php echo $f['ext_descripcion']?></td>
                                                            <td><?php echo $f['ext_precio']?></td>
                                                            <td>
                                                            <?php if($f['ext_estado'] == 1): ?>
                                                                    <a href="controller_mlt_extras.php?op=bloquear_mlt_extras&id=<?php echo $f['ext_id'] ?>&bl=<?php echo $f['ext_estado'] ?>"><i class = "material-icons green-text">lock_open</i></a>
                                                                    <?php else: ?>
                                                                    <a href="controller_mlt_extras.php?op=bloquear_mlt_extras&id=<?php echo $f['ext_id'] ?>&bl=<?php echo $f['ext_estado'] ?>"><i class = "material-icons red-text">lock_outline</i></a>
                                                            <?php endif; ?>
                                                            </td>
                                                            <td>
                                                            
                                                            <?php if($f['ext_estado'] == 1): ?>
                                                                    <a href="mlt_extras_ver.php?id=<?php echo $f['ext_id']; ?>" class="btn green accent-3"><i class = "material-icons">edit</i></a>
                                                                    <?php else: ?>
                                                            <?php endif; ?>
                                                            </td>
                                                            <td>
                                                            <?php if($f['ext_estado'] == 0): ?>
                                                                    
                                                                    <a href="#" onclick="swal({ title: 'Esta seguro que desea eliminar el item?',
                                                                    text: 'Al eliminar no podra recuperarlo', type: 'warning', 
                                                                    showCancelButton: true, 
                                                                    confirmButtonColor: '#3085d6',
                                                                    cancelButtonColor: '#d33',
                                                                    confirmButtonText: 'Si, Eliminarlo'
                                                                    }).then(function () {
                                                                            location.href='controller_mlt_extras.php?op=eliminar_mlt_extras&id=<?php echo $f['ext_id'] ?>';
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
                            <a href="mlt_extras_nuevo.php" class="btn green accent-3">NUEVO EXTRA</a>
                    </div>
            </div>
    </div>
    
    <?php include '../extend/scripts.php'; ?>
    
    <script src="../js/validacion_mlt_extras.js"></script>
    
    </body>
    </html>
