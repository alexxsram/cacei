<?php
session_start();
if(!isset($_SESSION['usuario']) && $_SESSION['estado'] != 'Autenticado'){
  header("Location: ../../");
}

include ("../conexion.php");

$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$nombre = $_POST['nombre'];
$relev = $_POST['relev'];
$info = $_POST['info'];
$lugar = $_POST["lugar"];
$id = $_POST["id"];

try{
  $sql = "UPDATE C_LOGRO_PROF SET titulo=:t, autor=:a, nombre=:n, relevancia=:r, lugar=:l, descripcion=:i WHERE id_logro=:id ";
  $resultado = $base->prepare($sql);
  $resultado->execute(array(":t"=>$titulo, ":a"=>$autor ,":n"=>$nombre,":r"=>$relev, ":l"=>$lugar, ":i"=>$info, ":id"=>$id));
  echo '1';
}catch(Exception $e){
  echo "Linea del error: ".$e->GetMessage();
}
?>
