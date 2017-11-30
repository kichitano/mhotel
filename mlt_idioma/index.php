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
    
    <?php $sel = $con->query("SELECT mlt_idioma.idi_id, mlt_idioma.idi_nombre, mlt_idioma.idi_abreviatura, mlt_idioma.idi_descripcion, mlt_idioma.idi_estado FROM mlt_idioma");
            $row = mysqli_num_rows($sel);
    ?>
    <div class="row">
            <div class="col s12">
                    <div class="card">
                            <div class="card-content">
                                    <span class="card-title">Idioma (<?php echo $row; ?>) </span>
                                    <TABLE>
                                            <THEAD>
                                                    <th>Id</th>
                                                    <th>Nombre</th>
                                                    <th>Abreviatura</th>
                                                    <th>Descripcion</th>
                                                    <th>Bloqueo</th>
                                                    <th>Editar</th>
                                                    <th>Eliminar</th>
                                            </THEAD>
                                            <?php while($f = $sel->fetch_assoc()){ ?>
                                                    <tr>
                                                            <td><?php echo $f['idi_id']?></td>
                                                            <td><?php echo $f['idi_nombre']?></td>
                                                            <td><?php echo $f['idi_abreviatura']?></td>
                                                            <td><?php echo $f['idi_descripcion']?></td>
                                                            <td>
                                                            <?php if($f['idi_estado'] == 1): ?>
                                                                    <a href="controller_mlt_idioma.php?op=bloquear_mlt_idioma&id=<?php echo $f['idi_id'] ?>&bl=<?php echo $f['idi_estado'] ?>"><i class = "material-icons green-text">lock_open</i></a>
                                                                    <?php else: ?>
                                                                    <a href="controller_mlt_idioma.php?op=bloquear_mlt_idioma&id=<?php echo $f['idi_id'] ?>&bl=<?php echo $f['idi_estado'] ?>"><i class = "material-icons red-text">lock_outline</i></a>
                                                            <?php endif; ?>
                                                            </td>
                                                            <td>
                                                            
                                                            <?php if($f['idi_estado'] == 1): ?>
                                                                    <a href="mlt_idioma_ver.php?id=<?php echo $f['idi_id']; ?>" class="btn green accent-3"><i class = "material-icons">edit</i></a>
                                                                    <?php else: ?>
                                                            <?php endif; ?>
                                                            </td>
                                                            <td>
                                                            <?php if($f['idi_estado'] == 0): ?>
                                                                    
                                                                    <a href="#" onclick="swal({ title: 'Esta seguro que desea eliminar el item?',
                                                                    text: 'Al eliminar no podra recuperarlo', type: 'warning', 
                                                                    showCancelButton: true, 
                                                                    confirmButtonColor: '#3085d6',
                                                                    cancelButtonColor: '#d33',
                                                                    confirmButtonText: 'Si, Eliminarlo'
                                                                    }).then(function () {
                                                                            location.href='controller_mlt_idioma.php?op=eliminar_mlt_idioma&id=<?php echo $f['idi_id'] ?>';
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
                            <a href="mlt_idioma_nuevo.php" class="btn green accent-3">NUEVO IDIOMA</a>
                    </div>
            </div>
    </div>
    
    <?php include '../extend/scripts.php'; ?>
    
    <script src="../js/validacion_mlt_idioma.js"></script>
    
    </body>
    </html>
