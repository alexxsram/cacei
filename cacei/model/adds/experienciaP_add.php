<?php
include ("../conexion.php");

function formatDate($fecha){
 $date = str_replace('/', '-', $fecha);
return date('Y-m-d', strtotime($date));
}

$act = $_POST['act'];
$empresa = $_POST['empresa'];
$fechI = formatDate($_POST['de']);
$fechF = formatDate($_POST['hasta']);
session_start();
$fk = $_SESSION['usuario'];

if($fechI >= $fechF){
    echo "La fecha inicial debe ser menor a la fecha final";
}else{
    try{
        $sql = "INSERT INTO C_EXPERIENCIA_PROF (act_puesto, organizacion, fecha_inicio, fecha_fin, fk_profesor) VALUES(:a,:e,:fi,:ff,:fk)";
        $resultado = $base->prepare($sql);
        $resultado->execute(array(":a"=>$act, ":e"=>$empresa ,":fi"=>$fechI, ":ff"=>$fechF,":fk"=>$fk));
        echo "1";
        /*echo "La gestión académica fue registrada con éxito";*/
    }catch(Exception $e){
        echo "Sucedio este error: ".$e->GetMessage();
      }
}
?>
