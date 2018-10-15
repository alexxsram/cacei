<?php
session_start();
if(!isset($_SESSION['usuario']) && $_SESSION['estado'] != 'Autenticado'){
    header("Location: ../");
}

include ("conexion.php");

$fkActividad = $_POST['fk_actividad'];
$fkAlumno = $_POST['fk_alumno'];
$calificacion = $_POST['calificacion'];

try {
    $sql = "SELECT * FROM EA_ALUMNO_ACTIVIDAD WHERE fk_actividad = :fkac AND fk_alumno = :fkal";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":fkac"=>$fkActividad, ":fkal"=>$fkAlumno));
    $hayTupla = $resultado->rowCount();
    if($hayTupla == 0) {
        $sql = "INSERT INTO EA_ALUMNO_ACTIVIDAD (fk_actividad, fk_alumno, calificacion) VALUES (:fkact, :fkalu, :cal)";
        $resultado = $base->prepare($sql);
        $resultado->execute(array(":fkact"=>$fkActividad, ":fkalu"=>$fkAlumno, ":cal"=>$calificacion));
        echo "1";
    }
    if($hayTupla != 0) {
        $sql = "UPDATE EA_ALUMNO_ACTIVIDAD SET calificacion = :cal WHERE fk_actividad = :fkact AND  fk_alumno = :fkalu";
        $resultado = $base->prepare($sql);
        $resultado->execute(array(":cal"=>$calificacion, ":fkact"=>$fkActividad, ":fkalu"=>$fkAlumno));
        echo "2";
    }
} catch(Exception $e) {
    echo "Sucedio este error: ".$e->GetMessage();
}
?>