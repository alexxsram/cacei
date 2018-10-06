<div class="card bg-dark" style="width: 100%;">
  <div class="card-header text-white">
    Nuevos reportes 
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"> <a class="card-link" data-toggle="modal" href="#addReporte"> <i class="fas fa-plus"></i> Crear</a> </li>
  </ul>
</div>

<br>
<div class="card bg-success" style="width: 100%;">
  <div class="card-header">
    Listado de reportes
  </div>
  <ul class="list-group list-group-flush">
<?php
try {
  session_start();
  require("../model/conexion.php");

  $tableReporte = 'EA_REPORTE AS EAR';
  $tableClase = 'EA_CLASE AS EAC';
  $sql = "SELECT EAR.* FROM ".$tableReporte; 
  $sql .= " INNER JOIN ".$tableClase." ON EAR.fk_clase = EAC.id_clase AND EAC.fk_profesor = :id ORDER BY EAR.id_reporte ASC";
  $resultado = $base->prepare($sql);
  $codigo = htmlentities(addslashes($_SESSION['usuario']));
  $resultado->bindValue(":id", $codigo);
  $resultado->execute();
  $arrayReporte = $resultado->fetchAll(PDO::FETCH_OBJ);
  foreach ($arrayReporte as $reporte):
    require_once '../model/clsMateriaProfesor.php';
    require_once '../model/clsMateria.php';
    $nrc = ProfesorMateria::buscarPorId($reporte->fk_clase);
    $materia = Materia::buscarPorId($nrc->materia);
?>
    <li class="list-group-item"> <a class="card-link" href="#" onclick="cargarTablaS(this);" id="<?php echo $reporte->id_reporte?>"> <?php echo $materia->id_materia." ".$materia->nombre." (".$nrc->seccion.")"?> </a> </li>
<?php
  endforeach;
}
catch(Exception $e) {
  echo "Linea del error: ".$e->GetMessage();
}
?>
  </ul>
</div>
