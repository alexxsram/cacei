<?php
session_start();
if(!isset($_SESSION['usuario']) && $_SESSION['estado'] != 'Autenticado'){
    header("Location: ../");
}

include ("conexion.php");

$fkClase = $_POST['fk_clase'];

try {
    $sql = "SELECT * FROM EA_EXAMEN WHERE fk_clase = :fkc";
    $resultado = $base->prepare($sql);
    $resultado->bindValue(":fkc", $fkClase);
    $resultado->execute();
    $listaExamenes = $resultado->fetchAll(PDO::FETCH_OBJ);

    echo "<option value=''>Selecciona un examen...</option>";
    foreach ($listaExamenes as $examenes):
        echo "<option value='" . $examenes->id_examen . "'>" . $examenes->id_examen . " - Nombre Examen: " . $examenes->nombre . "</option>";
    endforeach;
} catch(Exception $e) {
    echo "Error: ".$e->getMessage();
}
?>
