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
    
    <?php $sel = $con->query("SELECT mlt_cliente.cli_id, mlt_cliente.cli_nombre, mlt_cliente.cli_apellido, mlt_cliente.cli_dni, mlt_cliente.cli_sexo, mlt_cliente.cli_empresa, mlt_cliente.cli_ciudad, mlt_cliente.cli_pais, mlt_cliente.cli_codigopostal, mlt_cliente.cli_fechanacimiento, mlt_cliente.cli_telefono, mlt_cliente.cli_email, mlt_cliente.cli_pass, mlt_cliente.cli_estado FROM mlt_cliente");
            $row = mysqli_num_rows($sel);
    ?>
    <div class="row">
            <div class="col s12">
                    <div class="card">
                            <div class="card-content">
                                    <span class="card-title">Cliente (<?php echo $row; ?>) </span>
                                    <TABLE>
                                            <THEAD>
                                                    <th>Id</th>
                                                    <th>Nombre</th>
                                                    <th>Apellido</th>
                                                    <th>DNI</th>
                                                    <th>Sexo</th>
                                                    <th>Empresa</th>
                                                    <th>Ciudad</th>
                                                    <th>Pais</th>
                                                    <th>Codigo Postal</th>
                                                    <th>Decha Nacimiento</th>
                                                    <th>Telefono</th>
                                                    <th>Email</th>
                                                    <th>Bloqueo</th>
                                                    <th>Editar</th>
                                                    <th>Eliminar</th>
                                            </THEAD>
                                            <?php while($f = $sel->fetch_assoc()){ ?>
                                                    <tr>
                                                            <td><?php echo $f['cli_id']?></td>
                                                            <td><?php echo $f['cli_nombre']?></td>
                                                            <td><?php echo $f['cli_apellido']?></td>
                                                            <td><?php echo $f['cli_dni']?></td>
                                                            <td><?php echo $f['cli_sexo']?></td>
                                                            <td><?php echo $f['cli_empresa']?></td>
                                                            <td><?php echo $f['cli_ciudad']?></td>
                                                            <td><?php echo $f['cli_pais']?></td>
                                                            <td><?php echo $f['cli_codigopostal']?></td>
                                                            <td><?php echo $f['cli_fechanacimiento']?></td>
                                                            <td><?php echo $f['cli_telefono']?></td>
                                                            <td><?php echo $f['cli_email']?></td>                                                            
                                                            <td>
                                                            <?php if($f['cli_estado'] == 1): ?>
                                                                    <a href="controller_mlt_cliente.php?op=bloquear_mlt_cliente&id=<?php echo $f['cli_id'] ?>&bl=<?php echo $f['cli_estado'] ?>"><i class = "material-icons green-text">lock_open</i></a>
                                                                    <?php else: ?>
                                                                    <a href="controller_mlt_cliente.php?op=bloquear_mlt_cliente&id=<?php echo $f['cli_id'] ?>&bl=<?php echo $f['cli_estado'] ?>"><i class = "material-icons red-text">lock_outline</i></a>
                                                            <?php endif; ?>
                                                            </td>
                                                            <td>
                                                            
                                                            <?php if($f['cli_estado'] == 1): ?>
                                                                    <a href="mlt_cliente_ver.php?id=<?php echo $f['cli_id']; ?>" class="btn green accent-3"><i class = "material-icons">edit</i></a>
                                                                    <?php else: ?>
                                                            <?php endif; ?>
                                                            </td>
                                                            <td>
                                                            <?php if($f['cli_estado'] == 0): ?>
                                                                    
                                                                    <a href="#" onclick="swal({ title: 'Esta seguro que desea eliminar el item?',
                                                                    text: 'Al eliminar no podra recuperarlo', type: 'warning', 
                                                                    showCancelButton: true, 
                                                                    confirmButtonColor: '#3085d6',
                                                                    cancelButtonColor: '#d33',
                                                                    confirmButtonText: 'Si, Eliminarlo'
                                                                    }).then(function () {
                                                                            location.href='controller_mlt_cliente.php?op=eliminar_mlt_cliente&id=<?php echo $f['cli_id'] ?>';
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
                            <a href="mlt_cliente_nuevo.php" class="btn green accent-3">NUEVO CLIENTE</a>
                    </div>
            </div>
    </div>
    
    <?php include '../extend/scripts.php'; ?>
    
    <script src="../js/validacion_mlt_cliente.js"></script>
    
    </body>
    </html>
