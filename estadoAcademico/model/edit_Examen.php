<?php
session_start();
if(!isset($_SESSION['usuario']) && $_SESSION['estado'] != 'Autenticado'){
    header("Location: ../");
}

include ("conexion.php");

$idExamen = $_POST['id_examen'];
$fkClase = $_POST['fk_clase'];
$nombre = $_POST['nombre'];
$fecha = $_POST['fecha'];

try {
    $sql = "UPDATE EA_EXAMEN SET nombre = :nom, fecha = :fec WHERE id_examen = :ide AND fk_clase = :fkc";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":nom"=>$nombre, ":fec"=>$fecha, ":ide"=>$idExamen, ":fkc"=>$fkClase));
    echo "1";
} catch(Exception $e) {
    echo "Sucedio este error: ".$e->GetMessage();
}
?>