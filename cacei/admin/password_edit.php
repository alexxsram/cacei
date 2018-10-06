<?php

session_start();
if(!isset($_SESSION['admin']) && $_SESSION['estado_a'] != 'Autenticado'){
  header("Location: index.php");
}

include ("../model/conexion.php");

$pass = $_POST['pass'];

$passHash =  password_hash($pass,PASSWORD_DEFAULT, array("cost"=>12));
$codigo = $_POST['id'];
//$codigo = 212091737;
try{
    $sql = "UPDATE C_ADMINISTRADOR SET password = :p WHERE codigo=:id";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":p"=>$passHash, ":id"=>$codigo));
    echo '1';
}catch(Exception $e){
    echo "Error: ".$e->GetMessage();
  }
?>
