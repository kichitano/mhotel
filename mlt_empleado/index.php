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
    
    <?php $sel = $con->query("SELECT mlt_empleado.emp_id, mlt_empleado.hot_id, (select mlt_hotel.hot_nombre from mlt_hotel where mlt_hotel.hot_id = mlt_empleado.hot_id) as NombreHotel, mlt_empleado.emp_nombre, mlt_empleado.emp_apellido, mlt_empleado.emp_dni, mlt_empleado.emp_sexo, mlt_empleado.emp_ciudad, mlt_empleado.emp_pais, mlt_empleado.emp_codigopostal, mlt_empleado.emp_fechanacimiento, mlt_empleado.emp_telefono, mlt_empleado.emp_email, mlt_empleado.emp_fechacontrato, mlt_empleado.emp_usuario, mlt_empleado.emp_pass, mlt_empleado.emp_cargo, mlt_empleado.emp_estado FROM mlt_empleado");
            $row = mysqli_num_rows($sel);
    ?>
    <div class="row">
            <div class="col s12">
                    <div class="card">
                            <div class="card-content">
                                    <span class="card-title">Empleado (<?php echo $row; ?>) </span>
                                    <TABLE>
                                            <THEAD>
                                                    <th>Id</th>
                                                    <th>Hotel</th>
                                                    <th>Nombres</th>
                                                    <th>Apellidos</th>
                                                    <th>Dni</th>
                                                    <th>Sexo</th>
                                                    <th>Ciudad</th>
                                                    <th>Pais</th>
                                                    <th>Codigo Postal</th>
                                                    <th>Fecha Nacimiento</th>
                                                    <th>Telefono</th>
                                                    <th>Email</th>
                                                    <th>Fecha Contrato</th>
                                                    <th>Usuario</th>
                                                    <th>Cargo</th>
                                                    <th>Bloqueo</th>
                                                    <th>Editar</th>
                                                    <th>Eliminar</th>
                                            </THEAD>
                                            <?php while($f = $sel->fetch_assoc()){ ?>
                                                    <tr>
                                                            <td><?php echo $f['emp_id']?></td>
                                                            <td><?php echo $f['NombreHotel']?></td>
                                                            <td><?php echo $f['emp_nombre']?></td>
                                                            <td><?php echo $f['emp_apellido']?></td>
                                                            <td><?php echo $f['emp_dni']?></td>
                                                            <td><?php echo $f['emp_sexo']?></td>
                                                            <td><?php echo $f['emp_ciudad']?></td>
                                                            <td><?php echo $f['emp_pais']?></td>
                                                            <td><?php echo $f['emp_codigopostal']?></td>
                                                            <td><?php echo $f['emp_fechanacimiento']?></td>
                                                            <td><?php echo $f['emp_telefono']?></td>
                                                            <td><?php echo $f['emp_email']?></td>
                                                            <td><?php echo $f['emp_fechacontrato']?></td>
                                                            <td><?php echo $f['emp_usuario']?></td>
                                                            <td><?php echo $f['emp_cargo']?></td>
                                                            <td>
                                                            <?php

                                                            if($f['emp_cargo'] == 0)
                                                            {

                                                            }
                                                            else
                                                            {

                                                             if($f['emp_estado'] == 1): ?>
                                                                    <a href="controller_mlt_empleado.php?op=bloquear_mlt_empleado&id=<?php echo $f['emp_id'] ?>&bl=<?php echo $f['emp_estado'] ?>"><i class = "material-icons green-text">lock_open</i></a>
                                                                    <?php else: ?>
                                                                    <a href="controller_mlt_empleado.php?op=bloquear_mlt_empleado&id=<?php echo $f['emp_id'] ?>&bl=<?php echo $f['emp_estado'] ?>"><i class = "material-icons red-text">lock_outline</i></a>
                                                            <?php endif; ?>
                                                            </td>
                                                            <td>
                                                            
                                                            <?php if($f['emp_estado'] == 1): ?>
                                                                    <a href="mlt_empleado_ver.php?id=<?php echo $f['emp_id']; ?>" class="btn green accent-3"><i class = "material-icons">edit</i></a>
                                                                    <?php else: ?>
                                                            <?php endif; ?>
                                                            </td>
                                                            <td>
                                                            <?php if($f['emp_estado'] == 0): ?>
                                                                    
                                                                    <a href="#" onclick="swal({ title: 'Esta seguro que desea eliminar el item?',
                                                                    text: 'Al eliminar no podra recuperarlo', type: 'warning', 
                                                                    showCancelButton: true, 
                                                                    confirmButtonColor: '#3085d6',
                                                                    cancelButtonColor: '#d33',
                                                                    confirmButtonText: 'Si, Eliminarlo'
                                                                    }).then(function () {
                                                                            location.href='controller_mlt_empleado.php?op=eliminar_mlt_empleado&id=<?php echo $f['emp_id'] ?>';
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
                            <a href="mlt_empleado_nuevo.php" class="btn green accent-3">NUEVO EMPLEADO</a>
                    </div>
            </div>
    </div>
    
    <?php include '../extend/scripts.php'; ?>
    
    <script src="../js/validacion_mlt_empleado.js"></script>
    
    </body>
    </html>
