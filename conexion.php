<?php

$host = "mysql8.000webhost.com";
$user = "a2293397_root";
$pw = "D3s4rr0ll0";
$db = "a2293397_examen";

$conexion = mysqli_connect($host, $user, $pw, $db);
if(!$conexion)
{
    echo "<br>Error al conectar a la base de datos";
}
else
{
    //echo "<br>Conectado a la base de datos";
}

?>