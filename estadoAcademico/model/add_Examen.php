<?php
session_start();
if(!isset($_SESSION['usuario']) && $_SESSION['estado'] != 'Autenticado'){
    header("Location: ../");
}

include ("conexion.php");

$fkClase = $_POST['fk_clase'];
$nombre = $_POST['nombre'];
$fecha = $_POST['fecha'];

try {
    $sql = "INSERT INTO EA_EXAMEN (id_examen, fk_clase, nombre, fecha) VALUES (NULL, :fkc, :nom, :fec)";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":fkc"=>$fkClase, ":nom"=>$nombre, ":fec"=>$fecha));
    echo "1";
} catch(Exception $e) {
    echo "Sucedio este error: ".$e->GetMessage();
}
?>