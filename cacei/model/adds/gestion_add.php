<?php
include ("../conexion.php");

function formatDate($fecha){
 $date = str_replace('/', '-', $fecha);
return date('Y-m-d', strtotime($date));
}

$act = $_POST['act'];
$inst = $_POST['inst'];
$fechI = formatDate($_POST['de']);
$fechF = formatDate($_POST['hasta']);
session_start();
$fk = $_SESSION['usuario'];
if($fechI >= $fechF){
    echo "La fecha inicial debe ser menor a la fecha final";
}else{
    try{
        $sql = "INSERT INTO C_GESTION_ACAD (actividad, institucion, fecha_inicio, fecha_fin, fk_profesor) VALUES(:a,:i,:fi,:ff,:fk)";
        $resultado = $base->prepare($sql);
        $resultado->execute(array(":a"=>$act, ":i"=>$inst ,":fi"=>$fechI, ":ff"=>$fechF,":fk"=>$fk));
        echo "1";
        /*echo "La gestión académica fue registrada con éxito";*/
    }catch(Exception $e){
        echo "Sucedio este error: ".$e->GetMessage();
      }
}
?>
