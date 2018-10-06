<?php
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
$fecha = formatDate($_POST['fecha_p']);
session_start();
$fk = $_SESSION['usuario'];
try{
    $sql = "INSERT INTO C_PRODUCTO_ACAD (titulo, autor, fecha_public, lugar_public, tipo, num_registro, alcance, descripcion, fk_profesor) VALUES(:t, :a, :f, :l, :tipo, :n, :alc, :d, :fk)";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":t"=>$titulo, ":a"=>$aut, ":f"=>$fecha, ":l"=>$lugar, ":tipo"=>$tipo, ":n"=>$num, ":alc"=>$alc, ":d"=>$info, ":fk"=>$fk));
    echo "1";
}catch(Exception $e){
    echo "Linea del error: ".$e->GetMessage();
  }
?>
