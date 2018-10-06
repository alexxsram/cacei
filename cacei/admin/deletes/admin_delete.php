<?php

session_start();
if(!isset($_SESSION['admin']) && $_SESSION['estado_a'] != 'Autenticado'){
  header("Location: index.php");
}

include ("../../model/conexion.php");
$id = $_POST['id'];
try{
    $sql = "DELETE FROM C_ADMINISTRADOR WHERE codigo = :id";
    $resultado = $base->prepare($sql);
    $resultado->bindValue(":id", $id);
    $resultado->execute();
    echo "1";
}catch(Exception $e){
    echo "Error: ".$e->GetMessage();
  }
?>
