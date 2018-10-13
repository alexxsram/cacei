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
    $sql = "UPDATE EA_DIA_CLASE SET fecha = :fec WHERE id_dia = :idd AND fk_clase = :fkc";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":fec"=>$fecha, ":idd"=>$idDia, ":fkc"=>$fkClase));
    echo "1";
} catch(Exception $e) {
    echo "Sucedio este error: ".$e->GetMessage();
}
?>