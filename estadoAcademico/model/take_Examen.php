<?php
session_start();
if(!isset($_SESSION['usuario']) && $_SESSION['estado'] != 'Autenticado'){
    header("Location: ../");
}

include ("conexion.php");

$fkExamen = $_POST['fk_examen'];
$fkAlumno = $_POST['fk_alumno'];
$calificacion = $_POST['calificacion'];

try {
    $sql = "SELECT * FROM EA_ALUMNO_EXAMEN WHERE fk_examen = :fkex AND fk_alumno = :fkal";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":fkex"=>$fkExamen, ":fkal"=>$fkAlumno));
    $hayTupla = $resultado->rowCount();
    if($hayTupla == 0) {
        $sql = "INSERT INTO EA_ALUMNO_EXAMEN (fk_examen, fk_alumno, calificacion) VALUES (:fkexa, :fkalu, :cal)";
        $resultado = $base->prepare($sql);
        $resultado->execute(array(":fkexa"=>$fkExamen, ":fkalu"=>$fkAlumno, ":cal"=>$calificacion));
        echo "1";
    }
    if($hayTupla != 0) {
        $sql = "UPDATE EA_ALUMNO_EXAMEN SET calificacion = :cal WHERE fk_examen = :fkexa AND  fk_alumno = :fkalu";
        $resultado = $base->prepare($sql);
        $resultado->execute(array(":cal"=>$calificacion, ":fkexa"=>$fkExamen, ":fkalu"=>$fkAlumno));
        echo "2";
    }
} catch(Exception $e) {
    echo "Sucedio este error: ".$e->GetMessage();
}
?>