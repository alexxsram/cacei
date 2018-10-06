<?php
session_start();
if(!isset($_SESSION['usuario']) && $_SESSION['estado'] != 'Autenticado'){
  header("Location: ../../");
}

include ("../conexion.php");

$org = $_POST['org'];
$nombre = $_POST['nombre'];
$motivo = $_POST['motivo'];
$info = $_POST['desc'];
$id = $_POST['id'];

try{
    $sql = "UPDATE C_PDR_RECIBIDOS SET nombre=:n, organismo=:o, motivo=:m, descripcion=:d WHERE id_pdr=:id";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":n"=>$nombre, ":o"=>$org, ":m"=>$motivo, ":d"=>$info, ":id"=>$id));
    echo '1';
}catch(Exception $e){
    echo "Linea del error: ".$e->GetMessage();
  }
?>
