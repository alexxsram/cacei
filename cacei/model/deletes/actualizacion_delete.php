<?php
include ("../conexion.php");
$id = $_POST['id'];
try{
    $sql = "DELETE FROM C_ACTUALIZACION_DISCIP WHERE id_actualiz=:id";
    $resultado = $base->prepare($sql);
    $resultado->bindValue(":id", $id);
    $resultado->execute();
    echo "1";
}catch(Exception $e){
    echo "Linea del error: ".$e->GetMessage();
  }
?>
