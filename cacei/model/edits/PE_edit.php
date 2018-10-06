<?php

session_start();
if(!isset($_SESSION['usuario']) && $_SESSION['estado'] != 'Autenticado'){
  header("Location: ../../");
}

include ("../conexion.php");
$pe = $_POST['pe'];
$fk = $_POST['id'];

try{
    $sql = "UPDATE C_PE SET descripcion = :d WHERE id_pe=:fk";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":d"=>$pe, ":fk"=>$fk));
    echo '1';
}catch(Exception $e){
    echo "Error: ".$e->GetMessage();
  }
?>
