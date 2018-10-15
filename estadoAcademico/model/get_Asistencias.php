<?php
session_start();
if(!isset($_SESSION['usuario']) && $_SESSION['estado'] != 'Autenticado'){
    header("Location: ../");
}

include ("conexion.php");

$fkClase = $_POST['fk_clase'];

try {
    $sql = "SELECT * FROM EA_DIA_CLASE WHERE fk_clase = :fkc";
    $resultado = $base->prepare($sql);
    $resultado->bindValue(":fkc", $fkClase);
    $resultado->execute();
    $diasAsistencia = $resultado->fetchAll(PDO::FETCH_OBJ);

    echo "<option value=''>Selecciona una fecha...</option>";
    foreach ($diasAsistencia as $asistencias):
        echo "<option value='" . $asistencias->id_dia . "'>" . $asistencias->id_dia . ".- Día de clase: " . $asistencias->fecha . "</option>";
    endforeach;
} catch(Exception $e) {
    echo "Error: ".$e->getMessage();
}
?>
