<?php
session_start();
if(!isset($_SESSION['usuario']) && $_SESSION['estado'] != 'Autenticado'){
  header("Location: ../");
}
include ("conexion.php");

$id = $_POST['id'];

try{
    $sql = "DELETE FROM EA_DETALLE_REPORTE WHERE id = :id";
    $resultado = $base->prepare($sql);
    $resultado->bindValue(":id", $id);
    $resultado->execute();
    echo "1";
}catch(Exception $e){
    echo "Linea del error: ".$e->GetMessage();
  }
?>
