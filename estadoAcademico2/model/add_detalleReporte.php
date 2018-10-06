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
$fk = $_POST['fk'];
$situacion = $A . $B . $C;
$motivo = $_POST["motivo"];
    if($motivo == 1){
        $motivo = $_POST["other"];
    }
$codigo = $_POST["codigo"];
try{
  $sql = "INSERT INTO EA_DETALLE_REPORTE (codigo, fk_reporte, alumno, situacion, motivo, comentario) VALUES(:cod, :fk, :a, :s, :m, :c)";
  $resultado = $base->prepare($sql);
  $resultado->execute(array(":cod"=>$codigo, ":fk"=>$fk, ":a"=>$alumno, ":s"=>$situacion, ":m"=>$motivo, ":c"=>$comentario));
  echo "1";
}catch(Exception $e){
  echo "Sucedio este error: ".$e->GetMessage();
  }
}
?>
