<?php
include ("conexion.php");
try{
    $sql = "SELECT * FROM C_PROFESOR WHERE pass IS NULL";
    $arrayActual = $base->query($sql)->fetchAll(PDO::FETCH_OBJ);
    foreach ($arrayActual as $profesor) :
      $passHash =  password_hash($profesor->Id_profesor,PASSWORD_DEFAULT, array("cost"=>12));
      $sql = "UPDATE C_PROFESOR SET pass = :p WHERE Id_profesor=:id";
      $resultado = $base->prepare($sql);
      $resultado->execute(array(":p"=>$passHash, ":id"=>$profesor->Id_profesor));
    endforeach;
}catch(Exception $e){
    echo "Error: ".$e->GetMessage();
  }
?>
