<?php
try{
  session_start();
  require("conexion.php");
  $sql = "SELECT * FROM EA_REPORTE WHERE fk_profesor = :id";
  $resultado = $base->prepare($sql);
  $codigo = htmlentities(addslashes($_SESSION['usuario']));
  $resultado->bindValue(":id", $codigo);
  $resultado->execute();
  $arrayReporte = $resultado->fetchAll(PDO::FETCH_OBJ);
}catch(Exception $e){
    echo "Linea del error: ".$e->GetMessage();
  }
?>
