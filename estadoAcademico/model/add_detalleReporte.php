<?php
session_start();
if(!isset($_SESSION['usuario']) && $_SESSION['estado'] != 'Autenticado') {
  header("Location: ../");
}

include ("conexion.php");
$A = $_POST['selectA'];
$B = $_POST['selectB'];
$C = $_POST['selectC'];

if($A == " " && $B == " " && $C == " ") {
  echo '2';
} else {
  $fkReporte = $_POST['fk_reporte'];
  $fkAlumno = $_POST['fk_alumno'];
  $nombre = strtoupper($_POST['nombre']);
  $situacion = $A . $B . $C;
  $motivo = $_POST['motivo'];
  $comentario = $_POST['comentario'];

  try {
    $sql = "INSERT INTO EA_ALUMNO(codigo, nombre) VALUES(:cod, :nom)";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":cod"=>$fkAlumno, ":nom"=>$nombre));

    $sql = "INSERT INTO EA_DETALLE_REPORTE(id, fk_reporte, fk_alumno, situacion, motivo, comentario) VALUES(NULL, :fkr, :fka, :sit, :mot, :com)";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":fkr"=>$fkReporte, ":fka"=>$fkAlumno, ":sit"=>$situacion, ":mot"=>$motivo, ":com"=>$comentario));
    echo "1";
  }  catch(Exception $e) {
    echo "Sucedio este error: ".$e->GetMessage();
  }
}
?>
