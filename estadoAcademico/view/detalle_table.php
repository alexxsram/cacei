<?php
session_start();
require("../model/conexion.php");
try{
  $tableReporte = 'EA_REPORTE AS EAR';
  $tableClase = 'EA_CLASE AS EAC';
  $sql = "SELECT EAR.* FROM ".$tableReporte; 
  $sql .= " INNER JOIN ".$tableClase." ON EAR.fk_clase = EAC.id_clase AND EAC.fk_profesor = :id_profesor";
  $sql .= " WHERE EAR.id_reporte = :id_reporte ORDER BY EAR.id_reporte ASC";
  $resultado = $base->prepare($sql);
  $codigoProfesor = htmlentities(addslashes($_SESSION['usuario']));
  $idReporte = htmlentities(addslashes($_GET['id']));
  $resultado->bindValue(":id_profesor", $codigoProfesor);
  $resultado->bindValue(":id_reporte", $idReporte);
  $resultado->execute();
  $reporte = $resultado->fetch(PDO::FETCH_OBJ);
  
  require_once '../model/clsMateriaProfesor.php';
  require_once '../model/clsMateria.php';
  $nrc = ProfesorMateria::buscarPorId($reporte->fk_clase);
  $materia = Materia::buscarPorId($nrc->materia); 
?>

<div class="container-fluid" style="margin-top: 40px;">
  <h2> <?php echo $materia->id_materia.' '.$materia->nombre.' ('.$nrc->seccion .')'?> </h2>

  <div class="btn-group btn-group-sm" role="group" aria-label="basicExample">
    <div class="btn-group btn-group-sm">
      <button type="button" class="btn btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Opciones de la clase
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" data-toggle="modal" href="#addAlumno" id="<?php echo $reporte->id_reporte?>" data-id="<?php echo $reporte->id_reporte?>">Agregar alumno</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" data-toggle="modal" href="#addDiaAsistencia" id="<?php echo $reporte->fk_clase?>" data-id="<?php echo $reporte->fk_clase?>" data-idreporte="<?php echo $reporte->id_reporte; ?>">Agregar asistencia del día</a>
        <a class="dropdown-item" data-toggle="modal" href="#addActividad" id="<?php echo $reporte->fk_clase?>" data-id="<?php echo $reporte->fk_clase?>" data-idreporte="<?php echo $reporte->id_reporte; ?>">Agregar actividad</a>
        <a class="dropdown-item" data-toggle="modal" href="#addExamen" id="<?php echo $reporte->fk_clase?>" data-id="<?php echo $reporte->fk_clase?>" data-idreporte="<?php echo $reporte->id_reporte; ?>"  >Agregar examen</a>
      </div>
    </div>

    <div class="btn-group btn-group-sm">
      <button type="button" class="btn btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Opciones para alumno
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" data-toggle="modal" href="#takeAsistencia" onclick="">Tomar asistencia</a>
        <a class="dropdown-item" data-toggle="modal" href="#takeActividad">Calificar actividad</a>
        <a class="dropdown-item" data-toggle="modal" href="#takeExamen">Calificar examen</a>
      </div>
    </div>

    <div class="btn-group btn-group-sm">
      <button type="button" class="btn btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Acciones al reporte <span class="caret"></span>
      </button>
      <div class="dropdown-menu" role="menu">
        <a class="dropdown-item" data-toggle="modal" href="#editReporte" data-materia="<?php echo $materia->nombre?>" data-idreporte="<?php echo $reporte->id_reporte?>" data-seccion="<?php echo $nrc->seccion?>">Editar</a>
        <a class="dropdown-item" data-toggle="modal" href="#deleteReporte" data-idreporte="<?php echo $reporte->id_reporte?>" data-title="<?php echo $materia->nombre . ' (' . $nrc->seccion .')' ?>">Eliminar</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="../cacei/examples/ESTADO_ACADEMICO_reporte.php?materia=<?php echo $materia->nombre?>&id=<?php echo $reporte->id_reporte?>&seccion=<?php echo $nrc->seccion?>" target="_blank">Generar PDF</a>
      </div>
    </div>
  </div>

  <div class="table-responsive detalle">
    <table class="table table-hover table-bordered table-striped">
      <tbody>
        <tr class="table-info">
          <td>Materia: <?php echo $materia->nombre?> </td>
          <td>Sección: <?php echo $nrc->seccion?></td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- For de todos los alumnos que estan dentro de este reporte-->
  <?php

  // $sql = "SELECT * FROM EA_DETALLE_REPORTE WHERE fk_reporte = :id ORDER BY alumno DESC";
  // $resultado = $base->prepare($sql);
  // $resultado->bindValue(":id", $reporte->id);
  // $resultado->execute();
  // $arrayDetalle = $resultado->fetchAll(PDO::FETCH_OBJ);

  $tableDetalle = 'EA_DETALLE_REPORTE AS EADR';
	$tableAlumno = 'EA_ALUMNO AS EAAL';
	$select = "SELECT EADR.fk_reporte, EAAL.codigo, EAAL.nombre, EADR.situacion, EADR.motivo, EADR.comentario";
	$sql = $select." FROM ".$tableDetalle;
	$sql .= " INNER JOIN ".$tableAlumno." ON EADR.fk_alumno = EAAL.codigo";
	$sql .= " WHERE EADR.fk_reporte = :id";
	$resultado = $base->prepare($sql);
	$resultado->bindValue(":id", $reporte->id_reporte);
	$resultado->execute();

  $numTuplas = $resultado->rowCount();
  
  if($numTuplas != 0) {
    $arrayDatos = $resultado->fetchAll(PDO::FETCH_OBJ);
  ?>

  <div class="table-responsive" id="Dtable<?php echo $reporte->id_reporte?>">
    <table class="table table-hover table-bordered table-stripped">
      <thead>
        <tr class="table-warning">
          <th class="text-center" width="586"> Asistencia </th>
					<th class="text-center" width="290"> Actividad (es) </th>
					<th class="text-center" width="70"> Examen (es) </th>
          <th class="tex-center"> Opciones </th>
        </tr>
      </thead>
      <tbody>
        <?php 
        foreach($arrayDatos as $detalleReporte): 
        ?>
        <tr>
          <td class="text-left" width="586">
            <?php
            $tableAsiAlumno = 'EA_ASISTENCIA AS EAAS';
						$tableDiaClase = 'EA_DIA_CLASE AS EADC';
						$sql = "SELECT EADC.id_dia, EAAS.fk_alumno, EADC.fecha FROM ".$tableAsiAlumno;
						$sql .= " INNER JOIN ".$tableDiaClase." ON EAAS.fk_dia = EADC.id_dia";
						$sql .= " WHERE EAAS.fk_alumno = :id_alumno";
						$resultado = $base->prepare($sql);
						$resultado->bindValue(":id_alumno", $detalleReporte->codigo);
						$resultado->execute();
						$arrayAsiAlumno = $resultado->fetchAll(PDO::FETCH_OBJ);
            ?>

            <b style="font-size:7;">Nombre alumno: <?php echo $detalleReporte->nombre ?></b>
            <div class="table-responsive">
              <table class="table table-bordered table-hover" cellspacing="0" cellpadding="4">
                <thead>
                  <tr>
                    <?php foreach($arrayAsiAlumno as $asistencias): ?>
                    <th style="font-size:8;" width="14.4" height="5">
                      <?php echo $asistencias->id_dia; ?>
                    </th>
                    <?php endforeach; ?>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php foreach($arrayAsiAlumno as $asistencias): ?>
                    <td style="font-size:8;" width="14.4" height="5">
                      X
                    </td>
                    <?php endforeach; ?>
                  </tr>              
                </tbody>
              </table>
            </div>
          </td>

          <td class="text-left" width="290">
            <?php 
            $tableActAlumno = 'EA_ALUMNO_ACTIVIDAD AS EAAAC';
						$tableActividades = 'EA_ACTIVIDAD AS EAAC';
						$sql = "SELECT EAAAC.fk_actividad, EAAAC.calificacion FROM ".$tableActAlumno;
						$sql .= " INNER JOIN ".$tableActividades." ON EAAAC.fk_actividad = EAAC.id_actividad";
						$sql .= " WHERE EAAAC.fk_alumno = :id_alumno";
						$resultado = $base->prepare($sql);
						$resultado->bindValue(":id_alumno", $detalleReporte->codigo);
						$resultado->execute();
						$arrayActAlumno = $resultado->fetchAll(PDO::FETCH_OBJ);
            ?>

            <div class="table-responsive">
              <table class="table table-bordered hover" cellspacing="0" cellpadding="4">
                <thead>
                  <tr>
                    <?php foreach($arrayActAlumno as $actividades): ?>
                    <th style="font-size:8;" width="14.4" height="5"> 
                      <?php echo $actividades->fk_actividad; ?>
                    </th>
                    <?php endforeach; ?>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php foreach($arrayActAlumno as $actividades): ?>
                    <td style="font-size:8;" width="14.4" height="5">
                      <?php echo $actividades->calificacion; ?>
                    </td>
                    <?php endforeach; ?>
                  </tr>
                </tbody>
              </table>
            </div>
          </td>

          <td class="text-left" width="70">
            <?php
            $tableExaAlumno = 'EA_ALUMNO_EXAMEN AS EAAEX';
						$tableExamen = 'EA_EXAMEN AS EAEX';
						$sql = "SELECT EAAEX.fk_examen, EAAEX.calificacion FROM ".$tableExaAlumno;
						$sql .= " INNER JOIN ".$tableExamen." ON EAAEX.fk_examen = EAEX.id_examen";
						$sql .= " WHERE EAAEX.fk_alumno = :id_alumno";
						$resultado = $base->prepare($sql);
						$resultado->bindValue(":id_alumno", $detalleReporte->codigo);
						$resultado->execute();
						$arrayExaAlumno = $resultado->fetchAll(PDO::FETCH_OBJ);
            ?>

            <div class="table-responsive">
              <table class="table table-bordered hover" cellspacing="0" cellpadding="4">
                <thead>
                  <tr>
                    <?php foreach($arrayExaAlumno as $examenes): ?>
                    <th style="font-size:8;" width="14.4" height="5"> 
                      <?php echo $examenes->fk_examen; ?>
                    </th>
                    <?php endforeach; ?>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php foreach($arrayActAlumno as $actividades): ?>
                    <td style="font-size:8;" width="14.4" height="5">
                      <?php echo $examenes->calificacion; ?>
                    </td>
                    <?php endforeach; ?>
                  </tr>
                </tbody>
              </table>
            </div>
          </td>

          <td class="text-left accion">
            <div class="btn-group" role="group" aria-label="Basic example">
              <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
              data-target="#editAlumno" 
              data-idreporte="<?php echo $reporte->id_reporte?>"
              data-fkreporte="<?php echo $detalleReporte->fk_reporte; ?>"
              data-codigo="<?php echo $detalleReporte->codigo; ?>"
              data-nombre="<?php echo $detalleReporte->nombre; ?>"
              data-motivo="<?php echo $detalleReporte->motivo; ?>"
              data-comentario="<?php echo $detalleReporte->comentario; ?>"> <i class="fas fa-edit"></i> Editar</button>
              
              <!--<button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#deleteAlumno" data-codigo="<?php echo $detalleReporte->codigo?>" data-iddetalle="<?php echo $detalleReporte->fk_reporte?>" data-idreporte="<?php echo $reporte->id_reporte?>"> <i class="fas fa-times"></i> Eliminar</button>-->
            </div>
          </td>
        </tr>
        <?php 
        endforeach;
        ?>
      </tbody>
    </table>
  </div>

  <br><br>

  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th class="table-info" colspan="3">
            Detalles
          </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <?php
            $tableAsistencias = 'EA_DIA_CLASE';
            $sql = "SELECT * FROM ".$tableAsistencias." WHERE fk_clase = :id ORDER BY fecha ASC";
            $resultado = $base->prepare($sql);
            $resultado->bindValue(":id", $reporte->fk_clase);
            $resultado->execute();
            $tuplas = $resultado->rowcount();
            if($tuplas != 0) {
              $arrayAsistencias = $resultado->fetchAll(PDO::FETCH_OBJ);
            ?>
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th># referencia asistencia</th>
                      <th>Fecha</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($arrayAsistencias as $asistencias): ?>
                      <tr>
                        <td><?php echo $asistencias->id_dia; ?></td>
                        <td><?php echo $asistencias->fecha; ?></td>
                        <th>
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editDiaAsistencia" data-idreporte="<?php echo $reporte->id_reporte;?>" data-iddia="<?php echo $asistencias->id_dia;?>" data-fecha="<?php echo $asistencias->fecha;?>" data-fkclase="<?php echo $asistencias->fk_clase;?>"> <i class="fas fa-edit"></i> Editar </button>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteDiaAsistencia" data-idreporte="<?php echo $reporte->id_reporte;?>" data-iddia="<?php echo $asistencias->id_dia;?>" data-fecha="<?php echo $asistencias->fecha;?>"> <i class="fas fa-trash"></i> Eliminar </button>
                        </th>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
            <?php
            }
            ?>
          </td>

          <td>
            <?php 
            $tableActividades = 'EA_ACTIVIDAD';
            $sql = "SELECT * FROM ".$tableActividades." WHERE fk_clase = :id";
            $resultado = $base->prepare($sql);
            $resultado->bindValue(":id", $reporte->fk_clase);
            $resultado->execute();
            $tuplas = $resultado->rowcount();
            if($tuplas != 0) {
              $arrayActividades = $resultado->fetchAll(PDO::FETCH_OBJ);
            ?>
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th># referencia actividad</th>
                      <th>Nombre</th>
                      <th>Fecha entrega</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($arrayActividades as $actividades): ?>
                      <tr>
                        <td><?php echo $actividades->id_actividad; ?></td>
                        <td><?php echo $actividades->nombre; ?></td>
                        <td><?php echo $actividades->fecha; ?></td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editActividad" data-idreporte="<?php echo $reporte->id_reporte;?>" data-idactividad="<?php echo $actividades->id_actividad;?>" data-fkclase="<?php echo $actividades->fk_clase;?>" data-nombre="<?php echo $actividades->nombre;?>" data-fecha="<?php echo $actividades->fecha;?>"> <i class="fas fa-edit"></i> Editar </button>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteActividad" data-idreporte="<?php echo $reporte->id_reporte;?>" data-idactividad="<?php echo $actividades->id_actividad;?>" data-nombre="<?php echo $actividades->nombre;?>" data-fecha="<?php echo $actividades->fecha;?>"> <i class="fas fa-trash"></i> Eliminar </button>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              <?php 
              }
              ?>
            </div>

          </td>
          <td>
            <?php
            $tableActividades = 'EA_EXAMEN';
            $sql = "SELECT * FROM ".$tableActividades." WHERE fk_clase = :id";
            $resultado = $base->prepare($sql);
            $resultado->bindValue(":id", $reporte->fk_clase);
            $resultado->execute();
            $tuplas = $resultado->rowcount();
            if($tuplas != 0) {
              $arrayExamenes = $resultado->fetchAll(PDO::FETCH_OBJ);
            ?>
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th># referencia examen</th>
                      <th>Nombre</th>
                      <th>Fecha aplicación</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($arrayExamenes as $examenes): ?>
                      <tr>
                        <td><?php echo $examenes->id_examen; ?></td>
                        <td><?php echo $examenes->nombre; ?></td>
                        <td><?php echo $examenes->fecha; ?></td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editExamen" data-idreporte="<?php echo $reporte->id_reporte;?>" data-idexamen="<?php echo $examenes->id_examen;?>" data-fkclase="<?php echo $examenes->fk_clase;?>" data-nombre="<?php echo $examenes->nombre;?>" data-fecha="<?php echo $examenes->fecha;?>"> <i class="fas fa-edit"></i> Editar </button>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteExamen" data-idreporte="<?php echo $reporte->id_reporte;?>" data-idexamen="<?php echo $examenes->id_examen;?>" data-nombre="<?php echo $examenes->nombre;?>"> <i class="fas fa-trash"></i> Eliminar </button>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            <?php
            }
            ?>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<?php
  }
}
catch(Exception $e) {
  echo "Linea del error: ".$e->GetMessage();
}
?>
