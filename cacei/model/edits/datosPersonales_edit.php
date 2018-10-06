<?php
session_start();
if(!isset($_SESSION['usuario']) && $_SESSION['estado'] != 'Autenticado'){
  header("Location: ../../");
}

include ("../conexion.php");
$nombre = strtoupper($_POST['nombre']);
$app = strtoupper($_POST['app']);
$apm = strtoupper($_POST['apm']);
$puesto = $_POST['puesto'];
$codigo = $_POST['codigo'];
$fecha = $_POST['fecha'];
$puesto = $_POST['puesto'];

try{
    $sql = "UPDATE C_PROFESOR SET nombre = :n, apellido_paterno = :app, apellido_materno = :apm, fecha_nacimiento = :f, Id_profesor=:id
    , puesto = :puesto WHERE Id_profesor=:fk";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":n"=>$nombre,":app"=>$app, ":apm"=>$apm, ":f"=>$fecha,
    ":id"=>$codigo,":puesto"=>$puesto, ":fk"=>$codigo));
    echo '1';
}catch(Exception $e){
    echo "Error: ".$e->GetMessage();
  }
?>
