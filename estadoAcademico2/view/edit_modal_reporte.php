<?php
  session_start();
  require_once 'model/clsMateriaProfesor.php';
  require_once 'model/clsMateria.php';
  $materiasPorProfesor = ProfesorMateria::recuperarTodos($_SESSION['usuario']);
?>

<div class="modal fade bd-example-modal-lg" id="editAlumno" tabindex="-1" role="dialog" aria-labelledby="addAlumnoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="editAlumnoF" method="post" class="form-horizontal">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><strong>Editar Alumno</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning"> Para prever  los posibles problemas de rezago, reprobación o abandono, de los alumnos,  es conveniente atender en tiempo y forma los puntos de alerta,
                        por lo que se recomienda reportar  solo  a los alumnos que están o pueden estar en una de las situaciones siguientes.
                      <strong>Todos los campos son obligatorios</strong>
                    </div>
                    <input type="hidden" class="form-control" id="idGuardadoE" name="idGuardadoE" />
                    <input type="hidden" class="form-control" id="idGuardadoAE" name="idGuardadoAE" />
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="nombreE">Nombre: </label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input class="form-control" id="nombreE" name="nombreE" />
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Situacion</label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="selectAE">(A)</label>
                        <div class="col-sm-5 input-group">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="A" id="selectAE">
                            <label class="form-check-label" for="selectAE">No asiste regularmente a clases, o no ha asistido, o llega tarde a clases</label>
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="selectBE">(B)</label>
                        <div class="col-sm-5 input-group">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="B" id="selectBE">
                            <label class="form-check-label" for="selectBE">Tiene rezago académico, o  no hace tareas, o  requiere asesoría</label>
                          </div>
                        </div>
                    </div>
                      <div class="form-group">
                          <label class="col-sm-4 control-label" for="selectCE">(C)</label>
                          <div class="col-sm-5 input-group">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="C" id="selectCE">
                              <label class="form-check-label" for="selectCE">Es indisciplinado  o distraído</label>
                            </div>
                          </div>
                      </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="comentarioE">Comentario</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                          <textarea id="comentarioE" name="comentarioE" class="form-control" placeholder="Ingresa un comentario sobre la(s) situcaion(es) del alumno"></textarea>
                        </div>
                    </div>
                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal de editar reporte -->

<div class="modal fade bd-example-modal-lg" id="editReporte" tabindex="-1" role="dialog" aria-labelledby="addReporteLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="editReporteF" method="post" class="form-horizontal">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><strong>Editar reporte</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                  <input type="hidden" id="reporteEditar"/>
                    <div class="alert alert-warning">Por favor, rellene los campos debajo, revisando que estos <b>sean correctos y correspondan a datos reales</b>, ya que estos se usarán para realizar el reporte de
                      estado académico (aunque dispondrá de una sección para modificarlos, en caso de que cometa un error o necesite actualizarlos).<strong>Todos los campos son obligatorios</strong>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="codigoM">Su código: </label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                            <input class="form-control" id="codigoM" name="codigoM" value="<?php echo $_SESSION['usuario']?>" disabled />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="carreraM">Carrera: </label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                            <input class="form-control" id="carreraM" name="carreraM" value="Ingeniería en Comunicaciones y Electrónica" disabled />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="materiaE">Materia</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                            <select class="form-control" id="materiaE" name="materiaE">
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
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Editar contraseña-->
<div class="modal fade bd-example-modal-lg" id="editPass" tabindex="-1" role="dialog" aria-labelledby="editPassLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="editPassF" class="form-horizontal">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><strong>Cambiemos su contraseña</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="ocultarMensajeEdit();">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <input id="codigoPass" type="hidden" value= "<?php echo $_SESSION['usuario']?>">
                    <input value="<?php echo $_SESSION['contra']?>" type="hidden" id="originalPass">
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="pass_new">Nueva contraseña</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                            <input type="password" class="form-control" id="pass_new" name="pass_new"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="pass2">Repita su nueva contraseña</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                            <input type="password" class="form-control" id="pass2" name="pass2"/>
                        </div>
                    </div>
                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="ocultarMensajeEdit();">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Cambiar contraseña</button>
                </div>
            </form>
        </div>
    </div>
</div>
