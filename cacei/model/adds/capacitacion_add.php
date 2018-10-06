<?php
include ("../conexion.php");

$tipo = $_POST['tipo'];
$inst = $_POST['inst'];
$pais = $_POST['pais'];
$year = $_POST['year'];
$hora = $_POST['hora'];
session_start();
$fk = $_SESSION['usuario'];
try{
    $sql = "INSERT INTO C_CAPACITACION_DOCENTE (tipo_capcit, institucion, pais, year, hora, fk_profesor) VALUES(:tipo,:inst,:p,:y,:h,:fk)";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":tipo"=>$tipo, ":inst"=>$inst ,":p"=>$pais, ":y"=>$year, ":h"=>$hora, ":fk"=>$fk));
    echo '1';
}catch(Exception $e){
    echo "Ocuriio el siguiente error: ".$e->GetMessage();
  }
?>
