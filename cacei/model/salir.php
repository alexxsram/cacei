<?php
//Reanudamos la sesión
session_start();

//Requerimos los datos de la conexión a la BBDD
require('conexion.php');

//Des-establecemos todas las sesiones
unset($_SESSION);

//Destruimos las sesiones
session_destroy();

//Cerramos la conexión con la base de datos
$base = null;

//Redireccionamos a el index
header("Location: ../../");
die();
?>
