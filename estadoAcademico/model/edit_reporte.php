<?php
session_start();
if(!isset($_SESSION['usuario']) && $_SESSION['estado'] != 'Autenticado'){
  header("Location: ../");
}

include ("conexion.php");

$idReporte = $_POST['id_reporte'];
$nrcMateria = $_POST['nrc_materia'];
$profesor = $_SESSION['usuario'];

try{
  $sql = "SELECT * FROM EA_CLASE WHERE nrc = :nrcmat AND fk_profesor = :pro";
  $resultado = $base->prepare($sql);
  $resultado->execute(array(':nrcmat'=>$nrcMateria, ':pro'=>$profesor));
  $datoReporteClase = $resultado->fetch(PDO::FETCH_OBJ);

  $clase = $datoReporteClase->id_clase;

  $sql = "UPDATE EA_REPORTE SET fk_clase = :fkc WHERE id_reporte = :idr";
  $resultado = $base->prepare($sql);
  $resultado->execute(array(":fkc"=>$clase, ":idr"=>$idReporte));
  echo "1";
}catch(Exception $e){
  echo "Sucedio este error: ".$e->GetMessage();
  }
?>
