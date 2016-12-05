<?php

//Llamar la función de conexión con BD
include 'conexion.php';


//Recibimos el valor que fue enviado de index.php mediante GET a $variable
$clave_emp = $_GET["id"];


//Query para eliminar empleado

$query = "DELETE FROM empleados WHERE clave_emp = '$clave_emp'";

//Ejecutar la consulta para eliminar empleado
$resultado= mysqli_query($conexion, $query);

//Comprobamos los resultados
if($resultado)
{
    //Si la eliminación se hizo de manera correcta
    mysqli_close($conexion);
    header('Location: index.php');
}
else
{
    //Si ela eliminación no se logró de manera exitosa se muestra mensaje de error.
    echo "<br><h3>Inserción fallida: No se llevó a cabo el registro.</h3>";
}





?>