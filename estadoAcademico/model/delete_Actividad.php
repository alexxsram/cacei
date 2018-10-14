<?php
session_start();
if(!isset($_SESSION['usuario']) && $_SESSION['estado'] != 'Autenticado'){
    header("Location: ../");
}

include ("conexion.php");

$idActividad = $_POST['id_actividad'];

try {
    $sql = "DELETE FROM EA_ACTIVIDAD WHERE id_actividad = :ida";
    $resultado = $base->prepare($sql);
    $resultado->bindValue(":ida", $idActividad);
    $resultado->execute();
    echo "1";
} catch(Exception $e) {
    echo "Error: ".$e->getMessage();
}
?>