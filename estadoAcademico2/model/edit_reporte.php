<?php
session_start();
if(!isset($_SESSION['usuario']) && $_SESSION['estado'] != 'Autenticado'){
  header("Location: ../");
}

include ("conexion.php");
$materia = $_POST['materia'];
$id = $_POST['id'];
session_start();
$profesor = $_SESSION['usuario'];
try{
  $sql = "UPDATE EA_REPORTE SET fk_profesor = :p, fk_materia = :m WHERE id = :id";
  $resultado = $base->prepare($sql);
  $resultado->execute(array(":p"=>$profesor, ":m"=>$materia, ":id"=>$id));
  echo "1";
}catch(Exception $e){
  echo "Sucedio este error: ".$e->GetMessage();
  }
?>
