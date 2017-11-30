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
    
    <?php $sel = $con->query("SELECT mlt_hotel.hot_id, mlt_hotel.idi_id, (select mlt_idioma.idi_nombre from mlt_idioma where mlt_idioma.idi_id = mlt_hotel.idi_id) as NombreIdioma, mlt_hotel.hot_nombre, mlt_hotel.hot_direccion, mlt_hotel.hot_ciudad, mlt_hotel.hot_pais, mlt_hotel.hot_ejex, mlt_hotel.hot_ejey, mlt_hotel.hot_email, mlt_hotel.hot_telefono, mlt_hotel.hot_estrellas, mlt_hotel.hot_imagen, mlt_hotel.hot_descripcion, mlt_hotel.hot_estado FROM mlt_hotel");
            $row = mysqli_num_rows($sel);
    ?>
    <div class="row">
            <div class="col s12">
                    <div class="card">
                            <div class="card-content">
                                    <span class="card-title">Hoteles (<?php echo $row; ?>) </span>
                                    <TABLE>
                                            <THEAD>
                                                    <th>Id</th>
                                                    <th>Idioma</th>
                                                    <th>Nombre</th>
                                                    <th>Direccion</th>
                                                    <th>Ciudad</th>
                                                    <th>Pais</th>
                                                    <th>Latitud</th>
                                                    <th>Longitud</th>
                                                    <th>Email</th>
                                                    <th>Telefono</th>
                                                    <th>Estrellas</th>
                                                    <th>Imagen</th>
                                                    <th>Descripcion</th>
                                                    <th>Bloqueo</th>
                                                    <th>Editar</th>
                                                    <th>Eliminar</th>
                                            </THEAD>
                                            <?php while($f = $sel->fetch_assoc()){ ?>
                                                    <tr>
                                                            <td><?php echo $f['hot_id']?></td>
                                                            <td><?php echo $f['NombreIdioma']?></td>
                                                            <td><?php echo $f['hot_nombre']?></td>
                                                            <td><?php echo $f['hot_direccion']?></td>
                                                            <td><?php echo $f['hot_ciudad']?></td>
                                                            <td><?php echo $f['hot_pais']?></td>
                                                            <td><?php echo $f['hot_ejex']?></td>
                                                            <td><?php echo $f['hot_ejey']?></td>
                                                            <td><?php echo $f['hot_email']?></td>
                                                            <td><?php echo $f['hot_telefono']?></td>
                                                            <td><?php echo $f['hot_estrellas']?></td>
                                                            <td><?php echo $f['hot_imagen']?></td>
                                                            <td><?php echo $f['hot_descripcion']?></td>
                                                            <td>
                                                            <?php
                                                            if($f['hot_id'] == 1)
                                                            {

                                                            }
                                                            else
                                                            {

                                                             if($f['hot_estado'] == 1): ?>
                                                                    <a href="controller_mlt_hotel.php?op=bloquear_mlt_hotel&id=<?php echo $f['hot_id'] ?>&bl=<?php echo $f['hot_estado'] ?>"><i class = "material-icons green-text">lock_open</i></a>
                                                                    <?php else: ?>
                                                                    <a href="controller_mlt_hotel.php?op=bloquear_mlt_hotel&id=<?php echo $f['hot_id'] ?>&bl=<?php echo $f['hot_estado'] ?>"><i class = "material-icons red-text">lock_outline</i></a>
                                                            <?php endif; ?>
                                                            </td>
                                                            <td>
                                                            
                                                            <?php if($f['hot_estado'] == 1): ?>
                                                                    <a href="mlt_hotel_ver.php?id=<?php echo $f['hot_id']; ?>" class="btn green accent-3"><i class = "material-icons">edit</i></a>
                                                                    <?php else: ?>
                                                            <?php endif; ?>
                                                            </td>
                                                            <td>
                                                            <?php if($f['hot_estado'] == 0): ?>
                                                                    
                                                                    <a href="#" onclick="swal({ title: 'Esta seguro que desea eliminar el item?',
                                                                    text: 'Al eliminar no podra recuperarlo', type: 'warning', 
                                                                    showCancelButton: true, 
                                                                    confirmButtonColor: '#3085d6',
                                                                    cancelButtonColor: '#d33',
                                                                    confirmButtonText: 'Si, Eliminarlo'
                                                                    }).then(function () {
                                                                            location.href='controller_mlt_hotel.php?op=eliminar_mlt_hotel&id=<?php echo $f['hot_id'] ?>';
                                                                    })" class = "btn-floating red" ><i class="material-icons">clear</i></a>
                                                                    
                                                                    <?php else: ?>
                                                            <?php endif; 
                                                            }?>
                                                            </td>
                                                        </tr>
                                            <?php } ?>
                                    </TABLE>
                            </div>
                    </div>
            </div>
            <div class="row">
                    <div class = "col s12">
                            <a href="mlt_hotel_nuevo.php" class="btn green accent-3">NUEVO HOTEL</a>
                    </div>
            </div>
    </div>
    
    <?php include '../extend/scripts.php'; ?>
    
    <script src="../js/validacion_mlt_hotel.js"></script>
    
    </body>
    </html>
