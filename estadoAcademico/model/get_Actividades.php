<?php
session_start();
if(!isset($_SESSION['usuario']) && $_SESSION['estado'] != 'Autenticado'){
    header("Location: ../");
}

include ("conexion.php");

$fkClase = $_POST['fk_clase'];

try {
    $sql = "SELECT * FROM EA_ACTIVIDAD WHERE fk_clase = :fkc";
    $resultado = $base->prepare($sql);
    $resultado->bindValue(":fkc", $fkClase);
    $resultado->execute();
    $listaActividades = $resultado->fetchAll(PDO::FETCH_OBJ);

    echo "<option value=''>Selecciona una actividad...</option>";
    foreach ($listaActividades as $actividades):
        echo "<option value='" . $actividades->id_actividad . "'>" . $actividades->id_actividad . " - Nombre Actividad: " . $actividades->nombre . "</option>";
    endforeach;
} catch(Exception $e) {
    echo "Error: ".$e->getMessage();
}
?>
