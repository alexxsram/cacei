<?php
require("../model/conexion.php");
try{

  $sql = "SELECT * FROM EA_REPORTE WHERE id = :id ORDER BY id ASC";
  $resultado = $base->prepare($sql);
  $codigo = htmlentities(addslashes($_GET['id']));
  $resultado->bindValue(":id", $codigo);
  $resultado->execute();
  $reporte = $resultado->fetch(PDO::FETCH_OBJ);

  require_once '../model/clsMateriaProfesor.php';
  require_once '../model/clsMateria.php';
  $nrc = ProfesorMateria::buscarPorId($reporte->fk_materia);
  $materia = Materia::buscarPorId($nrc->materia);
    ?>
<div>
<h2><?php echo $materia->nombre . ' (' . $nrc->seccion .')'?></h2>
  <br />

  <div class="btn-group right">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addAlumno" id="<?php echo $reporte->id?>" data-id="<?php echo $reporte->id?>" >Agregar alumno</button>
  <div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    Acciones al reporte <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu">
      <li data-toggle="modal" data-target="#editReporte" data-materia="<?php echo $materia->nombre?>"
      data-idreporte="<?php echo $reporte->id?>" data-seccion="<?php echo $nrc->seccion?>"><a href="#">Editar</a></li>
      <li data-toggle="modal" data-target="#deleteReporte" data-idreporte="<?php echo $reporte->id?>"
        data-title="<?php echo $materia->nombre . ' (' . $nrc->seccion .')' ?>"><a href="#">Eliminar</a></li>
      <li><a href="../cacei/examples/ESTADO_ACADEMICO_reporte.php?materia=<?php echo $materia->nombre?>&id=<?php echo $reporte->id?>&seccion=<?php echo $nrc->seccion?>" target="_blank">Crear Reporte</a></li>
    </ul>
  </div>
  </div>

<div class="table-responsive detalle">
  <table class="table table-bordered">
    <tbody>
      <tr class="success">
        <td>Materia: <?php echo $materia->nombre?> </td>
        <td>Sección: <?php echo $nrc->seccion?></td>
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
        <th class="accion">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($arrayDetalle as $detalle): ?>
      <tr>
        <td> <?php echo $detalle->alumno?> </td>
        <td> <?php echo $detalle->situacion?> </td>
        <td> <?php echo $detalle->comentario?> </td>
        <td class="accion">
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

}catch(Exception $e){
    echo "Linea del error: ".$e->GetMessage();
  }
?>
