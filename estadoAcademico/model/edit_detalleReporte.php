<?php
session_start();
if(!isset($_SESSION['usuario']) && $_SESSION['estado'] != 'Autenticado'){
  header("Location: ../");
}

include ("conexion.php");
$A = $_POST['selectA'];
$B = $_POST['selectB'];
$C = $_POST['selectC'];
if($A == " " && $B == " " && $C == " "){
  echo '2';
}
else{
  $fkReporte = $_POST['fk_reporte'];
  $fkAlumno = $_POST['fk_alumno'];
  $nombre = strtoupper($_POST['nombre']);
  $situacion = $A . $B . $C;
  $motivo = $_POST['motivo'];
  $comentario = $_POST['comentario'];
  
  try{

    $sql = "UPDATE EA_ALUMNO SET codigo = :co, nombre = :nom WHERE codigo = :cod";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":co"=>$fkAlumno, ":nom"=>$nombre, ":cod"=>$fkAlumno));

    $sql = "UPDATE EA_DETALLE_REPORTE SET situacion = :sit, motivo = :mot, comentario = :com WHERE fk_reporte = :fkr AND fk_alumno = :fka";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":sit"=>$situacion, ":mot"=>$motivo, ":com"=>$comentario, ":fkr"=>$fkReporte, ":fka"=>$fkAlumno));

    echo '1';
  }catch(Exception $e){
    echo "Sucedio este error: ".$e->GetMessage();
  }
}
?>
