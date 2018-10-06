<?php
session_start();
if(!isset($_SESSION['usuario']) && $_SESSION['estado'] != 'Autenticado'){
  header("Location: ../");
}

include ("conexion.php");

$nrcMateria = $_POST['nrc_materia']; //materia a la que el usuario imparte clase
$profesor = $_SESSION['usuario']; //Referencia al usuario que inicia sesión

try{
  $sql = "SELECT * FROM EA_CLASE WHERE nrc = :nrcmat AND fk_profesor = :pro";
  $resultado = $base->prepare($sql);
  $resultado->execute(array(':nrcmat'=>$nrcMateria, ':pro'=>$profesor));
  $datoReporteClase = $resultado->fetch(PDO::FETCH_OBJ);

  $clase = $datoReporteClase->id_clase;
  $fecha = date("Y-m-d");

  $sql = "INSERT INTO EA_REPORTE(fk_clase, fecha) VALUES(:fkc, :fec)";
  $resultado = $base->prepare($sql);
  $resultado->execute(array(":fkc"=>$clase, ":fec"=>$fecha));

  echo "1";
}catch(Exception $e){
  echo "Sucedio este error: ".$e->GetMessage();
  }
?>
