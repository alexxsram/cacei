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
  $alumno = strtoupper($_POST['nombre']);
  $comentario = $_POST['comentario'];
  $id = $_POST['id'];
  $situacion = $A . $B . $C;
  try{
    $sql = "UPDATE EA_DETALLE_REPORTE SET alumno = :a, situacion = :s, comentario = :c WHERE id = :id";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":a"=>$alumno, ":s"=>$situacion, ":c"=>$comentario, ":id"=>$id));
    echo '1';
  }catch(Exception $e){
    echo "Sucedio este error: ".$e->GetMessage();
  }
}
?>
