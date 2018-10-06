<?php
  session_start();
  require_once 'model/clsMateriaProfesor.php';
  require_once 'model/clsMateria.php';
  $materiasPorProfesor = ProfesorMateria::recuperarTodos($_SESSION['usuario']);
?>

    <div class="modal fade bd-example-modal-lg" id="addAlumno" tabindex="-1" role="dialog" aria-labelledby="addAlumnoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="addAlumnoF" method="post" class="form-horizontal">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel"><strong>Agregar un Alumno</strong></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-warning"> Para prever los posibles problemas de rezago, reprobación o abandono, de los alumnos, es conveniente atender en tiempo y forma los puntos de alerta, por lo que se recomienda reportar solo a los alumnos que están o pueden estar en una de las situaciones siguientes.
                            <strong>Todos los campos son obligatorios</strong>
                        </div>
                        <input type="hidden" id="idGuardado" />
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="codigoA">Código</label>
                            <div class="col-sm-5 input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                <input type="text" id="codigoA" name="codigoA" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="nombre">Nombre: </label>
                            <div class="col-sm-5 input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input  type="text" class="form-control" id="nombre" name="nombre" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Situacion</label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="selectA">(A)</label>
                            <div class="col-sm-5 input-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="A" id="selectA">
                                    <label class="form-check-label" for="selectA">No asiste regularmente a clases, o no ha asistido, o llega tarde a clases</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="selectB">(B)</label>
                            <div class="col-sm-5 input-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="B" id="selectB">
                                    <label class="form-check-label" for="selectB">Tiene rezago académico, o  no hace tareas, o  requiere asesoría</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="selectC">(C)</label>
                            <div class="col-sm-5 input-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="C" id="selectC">
                                    <label class="form-check-label" for="selectC">Es indisciplinado  o distraído</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="motivo">Seleccione el motivo</label>
                            <div class="col-sm-5 input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                <select class="form-control" id="motivo" name="motivo">
                             <option value="PERSONAL">Personal</option>
                             <option value="LABORAL">Laboral</option>
                             <option value="MEDICA">Médico</option>
                             <option value="1">Otro</option>
                             <option value="DESCONOCIDO">Desconocido</option>
                            </select>
                            </div>
                        </div>
                         <div class="form-group" id="otherMotivo">
                            <label class="col-sm-4 control-label" for="otherM">Motivo: </label>
                            <div class="col-sm-5 input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input  type="text" class="form-control" id="otherM" name="otherM" placeholder="ingrese el motivo" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="comentario">Comentario</label>
                            <div class="col-sm-5 input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                <textarea id="comentario" name="comentario" class="form-control" placeholder="Ingresa un comentario sobre la(s) situcaion(es) del alumno"></textarea>
                            </div>
                        </div>
                        <div class="alert alert-info alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Agregar reporte-->
    <div class="modal fade bd-example-modal-lg" id="addReporte" tabindex="-1" role="dialog" aria-labelledby="addReporteLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="addReporteF" method="post" class="form-horizontal">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel"><strong>Agregar un reporte</strong></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-warning">Por favor, rellene los campos debajo, revisando que estos <b>sean correctos y correspondan a datos reales</b>, ya que estos se usarán para realizar el reporte de estado académico (aunque dispondrá de una sección para modificarlos, en caso de que cometa un error o necesite actualizarlos).<strong>Todos los campos son obligatorios</strong>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="codigo">Su código: </label>
                            <div class="col-sm-5 input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                                <input class="form-control" id="codigo" name="codigo" value="<?php echo $_SESSION['usuario']?>" disabled />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="carrera">Carrera: </label>
                            <div class="col-sm-5 input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                                <input class="form-control" id="carrera" name="carrera" value="Ingeniería en Comunicaciones y Electrónica" disabled />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="materia">Materia</label>
                            <div class="col-sm-5 input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                                <select class="form-control" id="materia" name="materia">
                            <?php

                              foreach ($materiasPorProfesor as $materiaProfesor):
                                $materia = Materia::buscarPorId($materiaProfesor->fk_materia);

                              ?>

                              <option value='<?php echo $materiaProfesor->nrc?>'> <?php echo $materia->nombre. '( '.$materiaProfesor->seccion.' )'?> </option>
                            <?php endforeach;?>
                            </select>
                            </div>
                        </div>
                        <div class="alert alert-info alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
