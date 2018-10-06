<?php
session_start();
if(!isset($_SESSION['usuario']) && $_SESSION['estado'] != 'Autenticado'){
  header("Location: ../../");
}

include ("../conexion.php");

$org = $_POST['org'];
$periodo = $_POST['periodo'];
$tipo = $_POST['tipo'];
$info = $_POST['info'];
$id = $_POST['id'];

try{
    $sql = "UPDATE C_MEMBRESIA SET organismo=:o, num_years=:p, tipo=:t, info_extra=:i WHERE id_membresia=:id";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":o"=>$org, ":p"=>$periodo ,":t"=>$tipo, ":i"=>$info, ":id"=>$id));
    echo '1';
}catch(Exception $e){
    echo "Linea del error: ".$e->GetMessage();
  }
?>
