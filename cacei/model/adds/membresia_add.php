<?php
include ("../conexion.php");

$org = $_POST['org'];
$periodo = $_POST['periodo'];
$tipo = $_POST['tipo'];
$info = $_POST['info'];
session_start();
$fk = $_SESSION['usuario'];
try{
    $sql = "INSERT INTO C_MEMBRESIA (organismo, num_years, tipo, info_extra, fk_profesor) VALUES(:o,:p,:t,:i,:fk)";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":o"=>$org, ":p"=>$periodo ,":t"=>$tipo, ":i"=>$info, ":fk"=>$fk));
    echo '1';
}catch(Exception $e){
    echo "Linea del error: ".$e->GetMessage();
  }
?>
