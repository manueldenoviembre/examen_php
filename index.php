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
    <link rel="stylesheet" href="css/sweetalert.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    
    <!-- JS y Scripts -->
    <script type="text/javascript">
        function abrirModal(){
            $(".ventana").slideDown("slow");
        }
        
        function cerrarModal(){
            $(".ventana").slideUp("slow");
        }
    </script>
    
    
    <!-- Fuentes -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet">
    
</head>
<body>
    
    
    <!-- Incluir función para la conexión con la base de datos -->
    <?php
        include 'conexion.php';
        $consulta = "SELECT * FROM empleados";
        $contador = mysqli_query($conexion, $consulta);
        $contador = mysqli_num_rows($contador);
    ?>
    
    
    
    <!-- Ventana Modal con formulario para registro de empleados -->
    <div class="ventana">
        <div class="form">
            <div class="cerrar"><a style="text-decoration: none; color: black;" href="javascript:cerrarModal();">Cerrar &times;</a></div>
            <h3>Nuevo registro de empleado</h3>
            <form id="formulario_empleado" action="crear_empleado.php" method="post" name="form" style="margin-top: -20px;">
                <table border="0px" style="border-collapse: separate; border-spacing: 3px;"> <!-- Lo cambiaremos por CSS -->
                    <tr>
                        <td>
                            <br><h5>Nombre:</h5>
                            <input class="caja_texto" type="text" name="nombre" required>
                        </td>
                        <td>
                            <br><h5>Apellido paterno:</h5>
                            <input class="caja_texto" type="text" name="ap_paterno" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <br><h5>Apellido materno:</h5>
                            <input class="caja_texto" type="text" name="ap_materno" required>
                        </td>
                        <td>
                            <br><h5>Fecha de nacimiento:</h5>
                            <input class="caja_texto" type="date" name="fechanac" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <br><h5>Departamento:</h5>
                            <select class="caja_texto" type="text" name="departamento" required>
                            <?php                           
                                //Consulta a base de datos
                                $sql="SELECT * from departamentos";
                                //Almacenamos resultados en res
                                $res = mysqli_query($conexion, $sql);
                                //Mostramos cada fila de la consulta
                                while($row = mysqli_fetch_assoc($res))
                                {
                                    echo "<option>".$row['descripcion']."</option>";
                                }
                                
                            ?>
                            </select> 
                        </td>
                        <td>
                            <br><h5>Sueldo:</h5>
                            <input class="caja_texto" type="text" name="sueldo" required=true onkeypress="return valida(event)" placeholder="$">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <br>
                            <input class="btn btn_submit" type="submit" value="Registrar empleado">&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:cerrarModal();" class="btn btn_delete" style="color: white; text-decoration: none;">Cerrar</a>
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
                            <form action="obtener_datos.php" method="post" name="form" style="margin-top: 0px; padding: 0px; display: inline;">
                                <input type="text" name="clave_emp" style="display: none;" value="<?php echo $row['clave_emp'] ?>">
                                <input class="btn btn_submit" type="submit" value="Editar">
                            </form>
                            &nbsp;&nbsp;
                            <a class="btn btn_delete" href="#" style="color: white; text-decoration: none; font-size: 13px;" onclick=eliminar(<?php echo $row['clave_emp'] ?>)>Eliminar</a></td>
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
    <script type="text/javascript" src="js/jquery-3.1.1.js"></script>
    <script src="js/sweetalert.min.js"></script>

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
    <script>
        document.querySelector("#formulario_empleado").addEventListener('submit', function(e){
            var form = this;
            e.preventDefault();

        
            swal({
                title: "Alerta de confirmación",
                text: "¿Desea proceder al registro de empleado?",
                type: "warning",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,                    
            },
            function(){
                swal("¡Muy bien!", "Un nuevo empleado ha sido registrado exitosamente", "success")

                setTimeout(function(){
                    form.submit();
                }, 2000);

            });
        });

    </script>
    <script>
        function eliminar(id) {
            var id2 = id;
            console.log("El id es: " + id2);
            
            swal({
              title: "Alerta de confirmación",
              text: "¿Desea quitar este empleado del registro?",
              type: "warning",
              showCancelButton: true,
              closeOnConfirm: false,
              showLoaderOnConfirm: true,
            },
            function(){
                swal("Hecho", "El empleado ha sido removido del registro de manera exitosa.", "success")
                  setTimeout(function(){
                    document.location.href= "eliminar_empleado.php?id=" + id2;
                  }, 2500);
            });
        }
    </script>
    

</body>
</html>

