<?php
session_start();
if(!isset($_SESSION['usuario']) && $_SESSION['estado'] != 'Autenticado'){
  header("Location: ../../");
}

include ("../conexion.php");

$pass = $_POST['pass'];
$passHash =  password_hash($pass,PASSWORD_DEFAULT, array("cost"=>12));
$codigo = $_POST['id'];

/*
try {
  $sql = "UPDATE C_PROFESOR SET pass = :p WHERE Id_profesor=:id";
  $resultado = $base->prepare($sql);
  $resultado->execute(array(":p"=>$passHash, ":id"=>$codigo));
  echo '1';
  $_POST['contra'] = $pass;
} catch(Exception $e) {
  echo "Error: ".$e->GetMessage();
}
*/
?>
