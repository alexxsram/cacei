<?php
session_start();
if(!isset($_SESSION['usuario']) && $_SESSION['estado'] != 'Autenticado'){
  header("Location: ../../");
}

include ("../conexion.php");

$org = $_POST['org'];
$periodo = $_POST['periodo'];
$nivel = $_POST['nivel'];
$info = $_POST['info'];
$id = $_POST['id'];

try{
    $sql = "UPDATE C_EXPER_DESING SET organismo=:o, periodo=:p, nivel_exper=:n, informacion=:i WHERE Id_desing=:id";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":o"=>$org, ":p"=>$periodo ,":n"=>$nivel, ":i"=>$info, ":id"=>$id));
    echo '1';
}catch(Exception $e){
    echo "Linea del error: ".$e->GetMessage();
  }
?>
