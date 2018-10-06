<?php
session_start();
if(!isset($_SESSION['usuario']) and $_SESSION['estado'] != 'Autenticado') {
  header('Location: index.php');
} else {
  $codigo = $_SESSION['usuario'];
  require('../model/sesiones.php');
  include ("../model/conexion.php");
  try {
    $sql = "SELECT * FROM C_PROFESOR WHERE Id_profesor=:id";
    $resultado = $base->prepare($sql);
    $resultado->bindValue(":id",$codigo);
    $resultado->execute();
    $profesor = $resultado->fetch(PDO::FETCH_OBJ);
    $sql = "SELECT nombre_puesto FROM C_PUESTO WHERE id_puesto = :puesto";
    $resultado = $base->prepare($sql);
    $resultado->bindValue(":puesto", $profesor->puesto);
    $resultado->execute();
    $puesto = $resultado->fetch(PDO::FETCH_OBJ);

  } catch (Exception $e) {
      echo "Linea del error: ".$e->GetMessage();
  }

}
?>
<ul class="list-group">
    <li class="list-group-item">Nombre: <?php echo $profesor->nombre." ".$profesor->apellido_paterno." ".$profesor->apellido_materno?></li>
    <li class="list-group-item">Fecha de nacimiento (aaaa/mm/dd): <?php echo $profesor->fecha_nacimiento?></li>
    <li class="list-group-item">Puesto en la institución: <?php echo $puesto->nombre_puesto?> </li>
    <li class="list-group-item">Código: <?php echo $profesor->Id_profesor?></li>
</ul>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDatos"
data-id="<?php echo $profesor->Id_profesor?>" data-nombre="<?php echo $profesor->nombre?>" data-ap="<?php echo $profesor->apellido_paterno?>"
data-am="<?php echo $profesor->apellido_materno?>" data-fecha="<?php echo $profesor->fecha_nacimiento?>"
data-puesto="<?php echo $profesor->puesto?>">Editar</button>
