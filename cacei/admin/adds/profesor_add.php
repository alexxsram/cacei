<?php
//Script para agregar un profesor en la basse de datos

//Reanudamos la sesión
session_start();
//Comprobamos si el usario está logueado
//Si no lo está, se le redirecciona al index
//Si lo está, definimos el botón de cerrar sesión y la duración de la sesión
if(!isset($_SESSION['admin']) and $_SESSION['estado_a'] != 'Autenticado') {
	header('Location: index.php');
} else {
	$estado = $_SESSION['usuario'];
	require('../../model/sesiones.php');
}

include ("../../model/conexion.php");
$nombre = $_POST['nombre'];
$app = $_POST['app'];
$apm = $_POST['apm'];
$puesto = $_POST['puesto'];
$codigo = $_POST['codigo'];
$fecha = $_POST['fecha'];
$pass = $_POST['pass'];
$passHash =  password_hash($pass,PASSWORD_DEFAULT, array("cost"=>12));
try{
    $sql = "INSERT INTO
            C_PROFESOR ( Id_profesor, nombre, apellido_paterno, apellido_materno, pass)
            VALUES(:id, :n, :app, :apm, :p)";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":n"=>$nombre,":app"=>$app, ":apm"=>$apm, ":id"=>$codigo,":p"=>$passHash));
    echo '1';
}catch(Exception $e){
    echo "Error: ".$e->GetMessage();
  }
?>
