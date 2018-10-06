<?php

session_start();
if(!isset($_SESSION['usuario']) && $_SESSION['estado'] != 'Autenticado'){
  header("Location: ../../");
}

include ("../conexion.php");

$nombre = $_POST['nom'];
$inst = $_POST['inst'];
$pais = $_POST['pais'];
$year = $_POST['year'];
$ced = $_POST['ced'];
$nivel = $_POST['nivel'];
$id = $_POST['id'];

try{
    $sql = "UPDATE C_FORMACION_ACAD SET nombre=:n, institucion=:i, pais=:p, year=:y, cedula=:c, nivel=:ni WHERE id_formacion=:id";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":n"=>$nombre, ":i"=>$inst ,":p"=>$pais, ":y"=>$year, ":c"=>$ced, ":ni"=>$nivel, ":id"=>$id));
    echo '1';
}catch(Exception $e){
    echo "Linea del error: ".$e->GetMessage();
  }
?>
