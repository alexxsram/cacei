<?php
session_start();
if(!isset($_SESSION['usuario']) && $_SESSION['estado'] != 'Autenticado'){
    header("Location: ../");
}

include ("conexion.php");

$idExamen = $_POST['id_examen'];

try {
    $sql = "DELETE FROM EA_EXAMEN WHERE id_examen = :ide";
    $resultado = $base->prepare($sql);
    $resultado->bindValue(":ide", $idExamen);
    $resultado->execute();
    echo "1";
} catch(Exception $e) {
    echo "Error: ".$e->getMessage();
}
?>