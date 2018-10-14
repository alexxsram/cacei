<?php
session_start();
if(!isset($_SESSION['usuario']) && $_SESSION['estado'] != 'Autenticado'){
    header("Location: ../");
}

include ("conexion.php");

$idDia = $_POST['id_dia'];

try {
    $sql = "DELETE FROM EA_DIA_CLASE WHERE id_dia = :idd";
    $resultado = $base->prepare($sql);
    $resultado->bindValue(":idd", $idDia);
    $resultado->execute();
    echo "1";
} catch(Exception $e) {
    echo "Error: ".$e->getMessage();
}
?>