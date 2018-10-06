<?php

session_start();
if(!isset($_SESSION['usuario']) && $_SESSION['estado'] != 'Autenticado'){
  header("Location: ../../");
}

function formatDate($fecha){
$date = str_replace('/', '-', $fecha);
return date('Y-m-d', strtotime($date));
}

include ("../conexion.php");
$titulo = $_POST['titulo_p'];
$aut = $_POST['autor_p'];
$lugar = $_POST['lugar_p'];
$tipo = $_POST['tipo_p'];
$num = $_POST['numero_p'];
$info = $_POST['info_p'];
$alc = $_POST['alcance_p'];
$id = $_POST['id'];
$fecha = formatDate($_POST['fecha_p']);

try{
    $sql = "UPDATE C_PRODUCTO_ACAD SET titulo=:t, autor=:a, fecha_public=:f, lugar_public=:l, tipo=:tipo, num_registro=:n, alcance=:alc, descripcion=:d WHERE id_producto=:id";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":t"=>$titulo, ":a"=>$aut, ":f"=>$fecha, ":l"=>$lugar, ":tipo"=>$tipo, ":n"=>$num, ":alc"=>$alc, ":d"=>$info, ":id"=>$id));
    echo "1";
}catch(Exception $e){
    echo "Linea del error: ".$e->GetMessage();
  }
?>
