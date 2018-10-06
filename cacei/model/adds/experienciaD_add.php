<?php
include ("../conexion.php");

$org = $_POST['org'];
$periodo = $_POST['periodo'];
$nivel = $_POST['nivel'];
$info = $_POST['info'];
session_start();
$fk = $_SESSION['usuario'];

try{
    $sql = "INSERT INTO C_EXPER_DESING (organismo, periodo, nivel_exper, informacion, fk_profesor) VALUES(:o,:p,:n,:i,:fk)";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":o"=>$org, ":p"=>$periodo ,":n"=>$nivel, ":i"=>$info, ":fk"=>$fk));
    echo '1';
}catch(Exception $e){
    echo "Linea del error: ".$e->GetMessage();
  }
?>
