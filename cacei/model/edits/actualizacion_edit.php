<?php

session_start();
if(!isset($_SESSION['usuario']) && $_SESSION['estado'] != 'Autenticado'){
  header("Location: ../../");
}

include ("../conexion.php");

$tipo = $_POST['tipo'];
$inst = $_POST['inst'];
$pais = $_POST['pais'];
$year = $_POST['year'];
$hora = $_POST['hora'];
$id = $_POST['id'];

try{
    $sql = "UPDATE C_ACTUALIZACION_DISCIP SET tipo_actualiz=:tipo, institucion=:inst, pais=:p, year=:y, hora=:h WHERE id_actualiz=:id";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":tipo"=>$tipo, ":inst"=>$inst ,":p"=>$pais, ":y"=>$year, ":h"=>$hora, ":id"=>$id));
    echo '1';
}catch(Exception $e){
    echo "Ocuriio el siguiente error: ".$e->GetMessage();
  }
?>
