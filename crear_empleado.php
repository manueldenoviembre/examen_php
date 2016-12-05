<?php

//Llamar la función de conexión con BD
include 'conexion.php';


//Comprobamos que los datos existen y no están vacíos
if(
    isset($_POST['nombre']) && !empty($_POST['nombre']) &&
    isset($_POST['ap_paterno']) && !empty($_POST['ap_paterno']) &&
    isset($_POST['ap_materno']) && !empty($_POST['ap_materno']) &&
    isset($_POST['fechanac']) && !empty($_POST['fechanac']) &&
    isset($_POST['departamento']) && !empty($_POST['departamento']) &&
    isset($_POST['sueldo']) && !empty($_POST['sueldo'])
)
{
    //Variables provenientes del formulario en index.php mediante POST
    
    $nombre  = $_POST['nombre'];
    $paterno  = $_POST['ap_paterno'];
    $materno  = $_POST['ap_materno'];
    $fecha  = $_POST['fechanac'];
    $dep  = $_POST['departamento'];
    $sueldo  = $_POST['sueldo'];

    
    //Conocer el id del departamento mediante su descripción
    
    $query = "SELECT departamento FROM departamentos where descripcion = '$dep'";
    $exec = mysqli_query($conexion, $query);
    $row = mysqli_fetch_assoc($exec);
    ///Id del departamento (departamento)
    $departamento = $row['departamento'];    
        
        
    //Insertar nuevo empleado en la base de datos
    
    $query2 = "INSERT INTO empleados(nombre, ap_paterno, ap_materno, fecnac, departamento, sueldo) VALUES ('$nombre', '$paterno', '$materno', '$fecha', '$departamento', '$sueldo')";
  
    $resultado = mysqli_query($conexion, $query2);
    
    
    if($resultado)
    {
        //Si el registro se logró de manera exitosa volvemos al index
        //echo "Registro exitoso";
        mysqli_close($conexion);
        header('Location: index.php');
    }
    else
    {
        //Si el registro no se logró de manera exitosa volvemos al index se muestra mensaje de error.
        echo "<br><h3>Inserción fallida: No se llevó a cabo el registro.</h3>";
    }
}
else
{
    echo "<br><h4>Algunos datos no fueron llenados en el formulario anterior o no existen, llene detenidamente el formulario a fin de evitar  próximos mensajes de error.</h4>";
}




?>