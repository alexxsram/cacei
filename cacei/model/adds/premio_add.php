<?php
include ("../conexion.php");

$org = $_POST['org'];
$nombre = $_POST['nombre'];
$motivo = $_POST['motivo'];
$info = $_POST['desc'];
session_start();
$fk = $_SESSION['usuario'];
try{
    $sql = "INSERT INTO C_PDR_RECIBIDOS (nombre, organismo, motivo, descripcion, fk_profesor) VALUES(:n,:o,:m,:d,:fk)";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":n"=>$nombre, ":o"=>$org, ":m"=>$motivo, ":d"=>$info, ":fk"=>$fk));
    echo '1';
}catch(Exception $e){
    echo "Linea del error: ".$e->GetMessage();
  }
?>
