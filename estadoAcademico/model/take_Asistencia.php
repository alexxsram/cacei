<?php
session_start();
if(!isset($_SESSION['usuario']) && $_SESSION['estado'] != 'Autenticado'){
    header("Location: ../");
}

include ("conexion.php");

$fkAlumno = $_POST['fk_alumno'];
$fkDia = $_POST['fk_dia'];

try {
    $sql = "INSERT INTO EA_ASISTENCIA (fk_alumno, fk_dia) VALUES (:fka, :fkd)";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":fka"=>$fkAlumno, ":fkd"=>$fkDia));
    echo "1";
} catch(Exception $e) {
    echo "Sucedio este error: ".$e->GetMessage();
}
?>