<?php
session_start();
if(!isset($_SESSION['usuario']) && $_SESSION['estado'] != 'Autenticado'){
  header("Location: ../");
}

include ("conexion.php");

$idReporte = $_POST['id_reporte'];

try{
  $sql = "DELETE FROM EA_REPORTE WHERE id_reporte = :id";
  $resultado = $base->prepare($sql);
  $resultado->bindValue(":id", $idReporte);
  $resultado->execute();
  echo "1";
} catch(Exception $e) {
  echo "Error: ".$e->GetMessage();
}
?>
