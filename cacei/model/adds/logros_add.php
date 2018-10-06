  <?php
include ("../conexion.php");

$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$nombre = $_POST['nombre'];
$relev = $_POST['relev'];
$info = $_POST['info'];
$lugar = $_POST["lugar"];
session_start();
$fk = $_SESSION["usuario"];

try{
    $sql = "INSERT INTO C_LOGRO_PROF (titulo, autor, nombre, relevancia, lugar, descripcion, fk_profesor) VALUES(:t,:a,:n,:r,:l,:i,:fk)";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":t"=>$titulo, ":a"=>$autor ,":n"=>$nombre,":r"=>$relev, ":l"=>$lugar, ":i"=>$info, ":fk"=>$fk));
    echo '1';
}catch(Exception $e){
    echo "Linea del error: ".$e->GetMessage();
  }
?>
