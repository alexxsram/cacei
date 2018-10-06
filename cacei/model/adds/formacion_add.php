<?php
include ("../conexion.php");
$nombre = $_POST['nom'];
$inst = $_POST['inst'];
$pais = $_POST['pais'];
$year = $_POST['year'];
$ced = $_POST['ced'];
$nivel = $_POST['nivel'];
session_start();
$fk = $_SESSION['usuario'];

try{
    $sql = "INSERT INTO C_FORMACION_ACAD (nombre, institucion, pais, year, cedula, nivel, fk_profesor) VALUES(:n,:i,:p,:y,:c,:ni,:fk)";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":n"=>$nombre, ":i"=>$inst ,":p"=>$pais, ":y"=>$year, ":c"=>$ced, ":ni"=>$nivel, ":fk"=>$fk));
    echo "Su formación academica fue registrada con éxito";
}catch(Exception $e){
    echo "Linea del error: ".$e->GetMessage();
  }
?>
