<?php
session_start();
if(!isset($_SESSION['usuario']) && $_SESSION['estado'] != 'Autenticado'){
    header("Location: ../");
}

include ("conexion.php");

$fkAlumno = $_POST['fk_alumno'];
$fkDia = $_POST['fk_dia'];

try {
    $sql = "SELECT * FROM EA_ASISTENCIA WHERE fk_alumno = :fka AND fk_dia = :fkd";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":fka"=>$fkAlumno, ":fkd"=>$fkDia));

    $hayTupla = $resultado->rowCount();

    if($hayTupla == 0) {
        $sql = "INSERT INTO EA_ASISTENCIA (fk_alumno, fk_dia) VALUES (:fka, :fkd)";
        $resultado = $base->prepare($sql);
        $resultado->execute(array(":fka" => $fkAlumno, ":fkd" => $fkDia));
        echo "1";
    }
    else {
        echo "2";
    }
} catch(Exception $e) {
    echo "Sucedio este error: ".$e->GetMessage();
}
?>