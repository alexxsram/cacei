<?php
session_start();
if(!isset($_SESSION['usuario']) && $_SESSION['estado'] != 'Autenticado'){
    header("Location: ../");
}

include ("conexion.php");

$fkClase = $_POST['fk_clase'];

try {
    $sql = "SELECT EAAL.codigo, EAAL.nombre 
    FROM EA_REPORTE AS EAR
    INNER JOIN EA_DETALLE_REPORTE AS EADR ON EADR.fk_reporte = EAR.id_reporte
    INNER JOIN EA_ALUMNO AS EAAL ON EAAL.codigo = EADR.fk_alumno
    WHERE EAR.fk_clase = :fkc";
    $resultado = $base->prepare($sql);
    $resultado->bindValue(":fkc", $fkClase);
    $resultado->execute();
    $listaAlumnos = $resultado->fetchAll(PDO::FETCH_OBJ);

    echo "<option value=''>Selecciona un alumno...</option>";
    foreach ($listaAlumnos as $alumnos):
        echo "<option value='" . $alumnos->codigo . "'>" . $alumnos->codigo . ".- Nombre: " . $alumnos->nombre . "</option>";
    endforeach;
} catch(Exception $e) {
    echo "Error: ".$e->getMessage();
}
?>
