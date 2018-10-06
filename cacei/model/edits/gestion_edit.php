<?php
session_start();
if(!isset($_SESSION['usuario']) && $_SESSION['estado'] != 'Autenticado'){
  header("Location: ../../");
}

include ("../conexion.php");

function formatDate($fecha){
 $date = str_replace('/', '-', $fecha);
return date('Y-m-d', strtotime($date));
}

$act = $_POST['act'];
$inst = $_POST['inst'];
$fechI = formatDate($_POST['de']);
$fechF = formatDate($_POST['hasta']);
$id = $_POST['id'];

if($fechI >= $fechF){
    echo "La fecha inicial debe ser menor a la fecha final";
}else{
    try{
        $sql = "UPDATE C_GESTION_ACAD SET actividad=:a, institucion=:i, fecha_inicio=:fi, fecha_fin=:ff WHERE id_gestion=:id";
        $resultado = $base->prepare($sql);
        $resultado->execute(array(":a"=>$act, ":i"=>$inst ,":fi"=>$fechI, ":ff"=>$fechF,":id"=>$id));
        echo "1";
        /*echo "La gestión académica fue registrada con éxito";*/
    }catch(Exception $e){
        echo "Sucedio este error: ".$e->GetMessage();
      }
}
?>
