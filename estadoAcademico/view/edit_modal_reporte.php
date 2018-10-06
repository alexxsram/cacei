<?php
  session_start();
  require_once 'model/clsMateriaProfesor.php';
  require_once 'model/clsMateria.php';
  $materiasPorProfesor = ProfesorMateria::recuperarTodos($_SESSION['usuario']);
?>

<!-- Modal Editar contraseña -->
<div class="modal fade" id="editPass" tabindex="-1" role="dialog" aria-labelledby="editPassLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="exampleModalLabel"><strong>Cambiemos su contraseña</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="ocultarMensajeEdit();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="editPassF" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" id="codigoPass" type="hidden" value= "<?php echo $_SESSION['usuario']?>">
                    </div>

                    <div class="form-group">
                        <input class="form-control" id="originalPass" type="hidden" value="<?php echo $_SESSION['contra']?>">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="pass_new">Nueva contraseña</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-key"></i>
                                </div>
                            </div>
                            <input class="form-control" type="password" id="pass_new" name="pass_new"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="pass2">Repitir nueva contraseña</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-key"></i>
                                </div>
                            </div>
                            <input type="password" class="form-control" id="pass2" name="pass2"/>
                        </div>
                    </div>

                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div> 
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="ocultarMensajeEdit();"> <i class="fas fa-window-close"></i> Cerrar</button>
                    <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Cambiar contraseña</button>
                </div>
            </form>  
        </div>
    </div>
</div>

<!-- Modal de editar reporte -->
<div class="modal fade" id="editReporte" tabindex="-1" role="dialog" aria-labelledby="addReporteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="exampleModalLabel"><strong>Editar reporte</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="editReporteF" method="POST">
                <div class="modal-body">
                    <div class="alert alert-info text-justify">Por favor, rellene los campos debajo, revisando que estos <b>sean correctos y correspondan a datos reales</b>, ya que estos se usarán para realizar el reporte de
                      estado académico (aunque dispondrá de una sección para modificarlos, en caso de que cometa un error o necesite actualizarlos).
                      <br><strong>Todos los campos son obligatorios</strong>
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="hidden" id="reporteEditar"/>  
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="codigo">Nueva contraseña</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-tag"></i>
                                </div>
                            </div>
                            <input class="form-control" type="text" id="codigo" name="codigo" value="<?php echo $_SESSION['usuario']?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="carrera">Carrera: </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-tag"></i>
                                </div>
                            </div>
                            <input class="form-control" type="text" id="carrera" name="carrera" value="Ingeniería en Comunicaciones y Electrónica" disabled/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="materiaE">Materia</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-chalkboard"></i>
                                </div>
                            </div>
                            <select class="custom-select" id="materiaE" name="materiaE">
                            <?php
                            foreach ($materiasPorProfesor as $materiaProfesor):
                                $materia = Materia::buscarPorId($materiaProfesor->fk_materia);
                            ?>
                                <option value='<?php echo $materiaProfesor->nrc?>'> <?php echo $materia->nombre. '( '.$materiaProfesor->seccion.' )'?> </option>
                            <?php 
                            endforeach; 
                            ?>
                            </select>
                        </div>
                    </div>

                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fas fa-window-close"></i> Cerrar</button>
                    <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal editar alumno -->
<div class="modal fade" id="editAlumno" tabindex="-1" role="dialog" aria-labelledby="addAlumnoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="exampleModalLabel"><strong>Editar Alumno</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="editAlumnoF" method="POST">
                <div class="modal-body">
                    <div class="alert alert-info text-justify" role="alert">
                        Para prever  los posibles problemas de rezago, reprobación o abandono, de los alumnos,  es conveniente atender en tiempo y forma los puntos de alerta,
                        por lo que se recomienda reportar  solo  a los alumnos que están o pueden estar en una de las situaciones siguientes.
                        <br><strong>Todos los campos son obligatorios</strong>
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="hidden" id="idReporteE" name="idReporteE" disabled/>
                    </div>
                    
                    <div class="form-group">
                        <input class="form-control" type="hidden" id="fkReporteAE" name="fkReporteAE" disabled/>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="codigoAE">Código: </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-barcode"></i>
                                </div>
                            </div>
                            <input class="form-control" type="number" id="codigoAE" name="codigoAE" min="1" disabled/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="nombreE">Nombre: </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                            <input class="form-control" type="text" id="nombreE" name="nombreE" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Situación</label>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                <input class="custom-control-input" type="checkbox" value="A" id="selectAE">
                                <label class="custom-control-label" for="selectAE"> (A) No asiste regularmente a clases, o no ha asistido, o llega tarde a clase.</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                <input class="custom-control-input" type="checkbox" value="B" id="selectBE">
                                <label class="custom-control-label" for="selectBE"> (B) Tiene rezago académico, o  no hace tareas, o  requiere asesoría.</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                <input class="custom-control-input" type="checkbox" value="C" id="selectCE">
                                <label class="custom-control-label" for="selectCE">(C) Es indisciplinado  o distraído.</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="motivoE">Motivo: </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-pencil-alt"></i>
                                </div>
                            </div>
                            <input class="form-control" type="text" id="motivoE" name="motivoE" />
                        </div>
                    </div>

            
                    <div class="form-group">
                        <label class="col-form-label" for="comentarioE">Comentario</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-pencil-alt"></i>
                                </div>
                            </div>
                            <textarea class="form-control" id="comentarioE" name="comentarioE" placeholder="Ingresa un comentario sobre la(s) situcaion(es) del alumno"></textarea>
                        </div>
                    </div>

                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fas fa-times"></i> Cerrar</button>
                    <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
