<?php
include("conexion.php");

$sql = "SELECT * FROM EA_REPORTE WHERE id = :id";
$resultado = $base->prepare($sql);
$resultado->bindValue(":id", $_GET['id']);
$resultado->execute();
$reporte = $resultado->fetch(PDO::FETCH_OBJ);

    $sql = "SELECT nombre FROM EA_MATERIA WHERE id = :m";
    $resultado = $base->prepare($sql);
    $resultado->bindValue(":m", $reporte->fk_materia);
    $resultado->execute();
    $materia = $resultado->fetch(PDO::FETCH_OBJ);
    ?>
<div id="section<?php echo $i?>">
<h2>Reporte de Estado Académico: <?php echo $i++ ?> </h2>
  <br />

  <div class="btn-group">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addAlumno" data-id="<?php echo $reporte->id?>" >Agregar alumno</button>
  <button type="button" class="btn btn-success" data-id=<?php $materia->id?> >Exportar reporte</button>
</div>

<div class="table-responsive">
  <table class="table table-bordered">
    <tbody>
      <tr class="success">
        <td>Materia: <?php echo $materia->nombre?> </td>
        <td>Sección: <?php echo $reporte->seccion?></td>
      </tr>
    </tbody>
  </table>
  </div>

  <!-- For de todos los alumnos que estan dentro de este reporte-->
  <?php
  $sql = "SELECT * FROM EA_DETALLE_REPORTE WHERE fk_reporte = :id ORDER BY alumno DESC";
  $resultado = $base->prepare($sql);
  $resultado->bindValue(":id", $reporte->id);
  $resultado->execute();
  $arrayDetalle = $resultado->fetchAll(PDO::FETCH_OBJ);
  ?>
<div class="table-responsive" id="Dtable<?php echo $reporte->id?>">
  <table class="table table-hover table-bordered">
    <thead>
      <tr class="warning">
        <th>Nombre del Alumno</th>
        <th>Situación (
          <a href="#" data-toggle="tooltip" data-placement="bottom" title="No asiste regularmente a clases, o no a asistido, o llega tarde a clases"> A </a>,
          <a href="#" data-toggle="tooltip" data-placement="bottom" title="Tiene rezago académico, o  no hace tareas, o  requiere asesoría"> B </a>,
          <a href="#" data-toggle="tooltip" data-placement="bottom" title="Es indisciplinado  o distraído"> C </a>)
        </th>
        <th>Comentario</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($arrayDetalle as $detalle): ?>
      <tr>
        <td> <?php echo $detalle->alumno?> </td>
        <td> <?php echo $detalle->situacion?> </td>
        <td> <?php echo $detalle->comentario?> </td>
        <td>
          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editAlumno"
          data-nombre="<?php echo $detalle->alumno?>" data-com="<?php echo $detalle->comentario?>" data-iddetalle="<?php echo $detalle->id?>"
          data-idReporte="<?php echo $reporte->id ?>">Editar</button>
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteAlumno" data-iddetalle="<?php echo $detalle->id ?>"
            data-idReporte="<?php echo $reporte->id?>" data-title="<?php echo $detalle->alumno?>">Eliminar</button>
        </td>
      </tr>
      <?php
      //Cierre del foreach del query de alumnos
      endforeach;
      ?>

    </tbody>
  </table>
</div>
</div>
<?php
//Cierre del foreach del query de reportes

}catch(Exception $e){
    echo "Linea del error: ".$e->GetMessage();
  }
?>
