<!DOCTYPE html>
<html>
<head>
    <title>Listado de Empleados</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    
    <!-- Icono de la empresa -->
    <link rel="icon" href="img/favicon.png" type="image/png">
    
    
    <!-- CSS -->
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    
    <!-- JS y Scripts -->
    <script type="text/javascript" src="js/jquery-3.1.1.js"></script>
    <script type="text/javascript">
        function abrirModal2(){
            $(".ventana2").slideDown("slow");
        }
    </script>
    
    
    
    
    <!-- Fuentes -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet">
    
</head>
<body onLoad="setTimeout('abrirModal2()',500);">
    
    
    <!-- Incluir función para la conexión con la base de datos -->
    <!-- Consulta a base de datos ->
    <?php
        include 'conexion.php';
        $consulta = "SELECT * FROM empleados";
        $contador = mysqli_query($conexion, $consulta);
        $contador = mysqli_num_rows($contador);

        $clave_emp  = $_POST['clave_emp'];

        $consulta2 = "SELECT * FROM empleados where clave_emp = '$clave_emp'";
        $empleado = mysqli_query($conexion, $consulta2);
        $datos = mysqli_fetch_assoc($empleado);

        $nombre = $datos['nombre'];
        $ap_paterno = $datos['ap_paterno'];
        $ap_materno = $datos['ap_materno'];
        $fecnac = $datos['fecnac'];
        $departamento = $datos['departamento'];
        $sueldo = $datos['sueldo'];       

    ?>
    
    
    
    <!-- Ventana Modal con formulario para edicion de empleados -->
    <div class="ventana2">
        <div class="form">
            <div class="cerrar"><a style="text-decoration: none; color: black;" href="index.php">Cerrar &times;</a></div>
            <h3>Registro de empleado  #<?php echo $clave_emp; ?></h3>
            <form action="editar_empleado.php" method="post" name="form" style="margin-top: -20px;">
                <input type="text" name="clave_emp" style="display: none;" value="<?php echo $clave_emp; ?>">
                <table border="0px" style="border-collapse: separate; border-spacing: 3px;"> <!-- Lo cambiaremos por CSS -->
                    <tr>
                        <td>
                            <br><h5>Nombre:</h5>
                            <input class="caja_texto" type="text" name="nombre" required value="<?php echo $nombre; ?>">
                        </td>
                        <td>
                            <br><h5>Apellido paterno:</h5>
                            <input class="caja_texto" type="text" name="ap_paterno" required value="<?php echo $ap_paterno; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <br><h5>Apellido materno:</h5>
                            <input class="caja_texto" type="text" name="ap_materno" required value="<?php echo $ap_materno; ?>">
                        </td>
                        <td>
                            <br><h5>Fecha de nacimiento:</h5>
                            <input class="caja_texto" type="date" name="fechanac" required value="<?php echo $fecnac; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <br><h5>Departamento:</h5>
                            <select class="caja_texto" type="text" name="departamento" required>
                            <?php
                                //Consulta a base de datos
                                $sql3="SELECT descripcion FROM departamentos where departamento = '$departamento'";
                                //Almacenamos resultados en res2
                                $res3 = mysqli_query($conexion, $sql3);
                                //Mostramos la descripcion del departamento
                                $row3 = mysqli_fetch_assoc($res3);
                                $departamento = $row3['descripcion'];    
                            ?> 
                            <?php                           
                                //Consulta a base de datos
                                $sql="SELECT * from departamentos";
                                //Almacenamos resultados en res
                                $res = mysqli_query($conexion, $sql);
                                //Mostramos cada fila de la consulta
                                while($row = mysqli_fetch_assoc($res))
                                {
                                    if($row['descripcion'] == $departamento)
                                    {
                                    echo "<option selected>".$row['descripcion']."</option>";
                                    }
                                    else
                                    {
                                      echo "<option>".$row['descripcion']."</option>";  
                                    }
                                }
                                
                            ?>
                            </select> 
                        </td>
                        <td>
                            <br><h5>Sueldo:</h5>
                            <input class="caja_texto" type="text" name="sueldo" required onkeypress="return valida(event)" placeholder="$" value="<?php echo $sueldo; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <br>
                            <input class="btn btn_submit" type="submit" value="Registrar empleado">&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php" class="btn btn_delete" style="color: white; text-decoration: none;">Cerrar</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    
    
    

    
    
    <!-- Cabecera -->
    <section class="cabecera">
    <!-- Logo -->
        <img src="img/logo.png" width="150px" height="35px" class="logo">
    
    </section>
    
    
    
    <!-- Cuerpo -->
    <section style="margin 0px; padding: 0px;">
        <div class="herramientas">
            <br><br><br><br>
            <div class="marca" style="text-transform: uppercase;">
                <i class="fa fa-child fa-2x" aria-hidden="true" style="color: #0089FE; font-size: 20px; margin-left: 20px; margin-right: 15px;"></i>
                <a href="javascript:abrirModal();" style="color: #ffffff; font-size: 12px; text-decoration:none">registrar empleado</a>
            </div>
            <div class="marca" style="text-transform: uppercase;">
                <i class="fa fa-users fa-2x" aria-hidden="true" style="color: #7EA00E; font-size: 20px; margin-left: 20px; margin-right: 15px;"></i>
                <a href="#" style="color: #ffffff; font-size: 12px; text-decoration:none">empleados registrados&nbsp;&nbsp;&nbsp;&nbsp;
                    <label style="background: #C61B1C; padding: 2px; font-size: 16px; border-radius: 4px;">
                        <?php echo $contador; ?>
                    </label>
                </a>
            </div>
        
        </div>
        <div class="workspace" >
            <div style="margin-top: 90px; font-size: 20px; font-weight: 700;">Lista de empleados registrados&nbsp;&nbsp;<a class="btn btn_submit" href="javascript:abrirModal();" style="text-decoration: none; font-size: 16px;">Nuevo</a></div>
            <br><br>
            <table>
                <thead>
                    <tr>
                        <th style="width: 100px; text-align: left;">Nombre</th>
                        <th style="width: 150px; text-align: left;">Apellido Paterno</th>
                        <th style="width: 150px; text-align: left;">Apellido Materno</th>
                        <th style="width: 170px; text-align: left;">Fecha de nacimiento</th>
                        <th style="width: 150px; text-align: left;">Departamento</th>
                        <th style="width: 120px; text-align: left;">Sueldo</th>
                        <th style="width: 280px; text-align: left;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //Consulta a base de datos
                    $sql="SELECT * from empleados";
                    //Almacenamos resultados en res
                    $res = mysqli_query($conexion, $sql);
                    //Mostramos cada fila de la consulta
                    while($row = mysqli_fetch_assoc($res))
                    {
                        ?>
                    <tr style="height: 50px;">
                        <td><?php echo $row['nombre'] ?></td>
                        <td><?php echo $row['ap_paterno'] ?></td>
                        <td><?php echo $row['ap_materno'] ?></td>
                        <?php $fecha = $row['fecnac']; ?>
                            <?php $fecha_formateada = str_replace('-', '/', $fecha); ?>
                        <td><?php echo date('d/m/Y', strtotime($fecha_formateada)); ?></td>
                        <!-- Mostrar descripcion del departamento consultándolo mediante su identificador (departamento) -->
                        <td>                        
                            <?php
                                //Consulta a base de datos
                                $sql2="SELECT descripcion FROM departamentos where departamento = '$row[departamento]'";
                                //Almacenamos resultados en res2
                                $res2 = mysqli_query($conexion, $sql2);
                                //Mostramos la descripcion del departamento
                                $row2 = mysqli_fetch_assoc($res2);
                                echo $row2['descripcion'];    
                            ?>       
                        </td>
                        <td><?php echo "$".$row['sueldo'] ?></td>
                        <td>
                            <form action="#" method="post" name="form" style="margin-top: 0px; padding: 0px; display: inline;">
                                <input type="text" name="clave_emp" style="display: none;" value="<?php echo $row['clave_emp'] ?>">
                                <input class="btn btn_submit" type="submit" value="Editar">
                            </form>
                            &nbsp;&nbsp;
                            <a class="btn btn_delete" style="color: white; text-decoration: none; font-size: 13px;">Eliminar</a></td>
                    </tr>
                    <?php    
                    }
                    ?>
                </tbody>
            </table> 
            <br><br><br>
        </div>
    </section>
    

    
    <!-- Footer -->
    <section class="footer">
        <div class="texto_footer">Powered By Tecnika Global SA. de CV </div>
        <div class="texto_footer">© 2013 - 2015 -Tecnika.mx - Todos los Derechos Reservados - </div>
    </section>
    
    <!-- Scripts -->
    <script>
        function valida(e){
            tecla = (document.all) ? e.keyCode : e.which;

            //Tecla de retroceso para borrar, siempre la permite
            if (tecla==8){
                return true;
            }

            // Patron de entrada, en este caso sólo acepta números para cumplir con la validación de sueldo
            patron =/[0-9]/;
            tecla_final = String.fromCharCode(tecla);
            return patron.test(tecla_final);
        }
    </script>
    

</body>
</html>

