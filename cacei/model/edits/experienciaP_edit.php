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
$empresa = $_POST['empresa'];
$fechI = formatDate($_POST['de']);
$fechF = formatDate($_POST['hasta']);
$id = $_POST['id'];

if($fechI >= $fechF){
    echo "La fecha inicial debe ser menor a la fecha final";
}else{
    try{
        $sql = "UPDATE C_EXPERIENCIA_PROF SET act_puesto=:a, organizacion=:e, fecha_inicio=:fi, fecha_fin=:ff WHERE id_exper=:id";
        $resultado = $base->prepare($sql);
        $resultado->execute(array(":a"=>$act, ":e"=>$empresa ,":fi"=>$fechI, ":ff"=>$fechF,":id"=>$id));
        echo "1";
        /*echo "La gestión académica fue registrada con éxito";*/
    }catch(Exception $e){
        echo "Sucedio este error: ".$e->GetMessage();
      }
}
?>
