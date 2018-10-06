<?php
session_start();
if(!isset($_SESSION['usuario']) && $_SESSION['estado'] != 'Autenticado'){
  header("Location: ../");
}

include ("conexion.php");

$materia = $_POST['materia'];
session_start();
$profesor = $_SESSION['usuario'];
try{
  $sql = "INSERT INTO EA_REPORTE (fk_profesor, fk_materia) VALUES(:p, :m)";
  $resultado = $base->prepare($sql);
  $resultado->execute(array(":p"=>$profesor, ":m"=>$materia));
  echo "1";
}catch(Exception $e){
  echo "Sucedio este error: ".$e->GetMessage();
  }
?>
