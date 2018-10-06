<?php
session_start();
if(!isset($_SESSION['usuario']) && $_SESSION['estado'] != 'Autenticado'){
    header("Location: ../");
}

include ("conexion.php");

$idDia = $_POST['id_dia'];
$fecha = $_POST['fecha'];
$fkClase = $_POST['fk_clase'];

try {
    $sql = "INSERT INTO EA_DIA_CLASE (id_dia, fecha, fk_clase) VALUES (:idd, :fec, :fkc)";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":idd"=>$idDia, ":fec"=>$fecha, ":fkc"=>$fkClase));
    echo "1";
} catch(Exception $e) {
    echo "Sucedio este error: ".$e->GetMessage();
}

?>