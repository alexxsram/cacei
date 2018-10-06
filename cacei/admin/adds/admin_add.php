<?php
session_start();

if(!isset($_SESSION['admin']) and $_SESSION['estado_a'] != 'Autenticado') {
  header('Location: ../index.php');
}

include ("../../model/conexion.php");

$codigo = $_POST['user'];
$nombre = $_POST['nombre'];
$apellido_m = $_POST['app'];
$apellido_p = $_POST['apm'];
$password = $_POST['pass'];
$padre = $_SESSION['admin'];

$passHash =  password_hash($password,PASSWORD_DEFAULT, array("cost"=>12));

try{
    $sql = "SELECT * FROM C_ADMINISTRADOR WHERE codigo = :user";
    $resultado = $base->prepare($sql);
    $resultado->bindValue(":user", $codigo);
    $resultado->execute();
    $num = $resultado->rowCount();

    if ($num != 0) {
      echo "Error: El código ya está siendo utilizado";
    } else{

      $sql = "INSERT INTO C_ADMINISTRADOR (codigo, nombre, apellido_p, apellido_m, password, admin_padre) VALUES(:u, :n, :p, :m, :pass, :fk)";
      $resultado2 = $base->prepare($sql);
      $resultado2->execute(array(":u"=>$codigo, ":n"=>$nombre ,":p"=>$apellido_p, ":m"=>$apellido_m, ":pass"=>$passHash,":fk"=>$padre ));
      echo "El administrador fue registrado con éxito";
  }
}catch(Exception $e){
    echo "Paso el siguiente error: ".$e->GetMessage();
  }
?>
