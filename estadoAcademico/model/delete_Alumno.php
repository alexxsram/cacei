<?php
session_start();
if(!isset($_SESSION['usuario']) && $_SESSION['estado'] != 'Autenticado') {
    header("Location: ../");
}

include ("conexion.php");

$codigoAlumno = $_POST['codigo'];

try {
    $sql = "DELETE FROM EA_ALUMNO WHERE codigo = :cod";
    $resultado = $base->prepare($sql);
    $resultado->bindValue(":cod", $codigoAlumno);
    $resultado->execute();
    echo "1";
} catch(Exception $e) {
    echo "Linea del error: ".$e->GetMessage();
}
?>
