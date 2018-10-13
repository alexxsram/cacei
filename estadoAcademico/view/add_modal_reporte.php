<?php
  session_start();
  require_once 'model/clsMateriaProfesor.php';
  require_once 'model/clsMateria.php';
  $materiasPorProfesor = ProfesorMateria::recuperarTodos($_SESSION['usuario']);
?>

<!-- Modal Agregar reporte-->
<div class="modal fade" id="addReporte" tabindex="-1" role="dialog" aria-labelledby="addReporteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="exampleModalLabel"><strong>Agregar reporte</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="addReporteF" method="post">
                <div class="modal-body">
                    <div class="alert alert-info text-justify" role="alert">
                        Por favor, rellene los campos debajo, revisando que estos <b>sean correctos y correspondan a datos reales</b>, ya que estos se usarán para realizar el reporte de 
                        estado académico (aunque dispondrá de una sección para modificarlos, en caso de que cometa un error o necesite actualizarlos).
                        <br><strong>Todos los campos son obligatorios</strong>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="codigo">Su código: </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-tag"></i>
                                </div>
                            </div>
                            <input class="form-control" type="text" id="codigo" name="codigo" value="<?php echo $_SESSION['usuario']?>" disabled />
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
                            <input class="form-control" type="text" id="carrera" name="carrera" value="Ingeniería en Comunicaciones y Electrónica" disabled />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="materia">Materia:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-book"></i>
                                </div>
                            </div>
                            <select class="custom-select" id="materia" name="materia">
                            <option value=''> Selecciona una materia </option>
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
                    <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal agregar alumno -->
<div class="modal fade" id="addAlumno" tabindex="-1" role="dialog" aria-labelledby="addAlumnoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="exampleModalLabel"><strong>Agregar alumno</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="addAlumnoF" method="post">
                <div class="modal-body">
                    <div class="alert alert-info text-justify" role="alert"> 
                        Para prever  los posibles problemas de rezago, reprobación o abandono, de los alumnos,  es conveniente atender en tiempo y forma los puntos de alerta,
                        por lo que se recomienda reportar  solo  a los alumnos que están o pueden estar en una de las situaciones siguientes.
                        <br><strong>Todos los campos son obligatorios</strong>
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="hidden" id="idReporte" name="idReporte">
                    </div>
                    
                    <div class="form-group">
                        <label class="col-form-label" for="codigoA">Código: </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-barcode"></i>
                                </div>
                            </div>
                            <input class="form-control" type="number" id="codigoA" name="codigoA" min="1"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-form-label" for="nombre">Nombre: </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                            <input class="form-control" type="text" id="nombre" name="nombre" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Situacion</label>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                <input class="custom-control-input" type="checkbox" value="A" id="selectA">
                                <label class="custom-control-label" for="selectA"> (A) No asiste regularmente a clases, o no ha asistido, o llega tarde a clase.</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                <input class="custom-control-input" type="checkbox" value="B" id="selectB">
                                <label class="custom-control-label" for="selectB"> (B) Tiene rezago académico, o  no hace tareas, o  requiere asesoría.</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                <input class="custom-control-input" type="checkbox" value="C" id="selectC">
                                <label class="custom-control-label" for="selectC">(C) Es indisciplinado  o distraído.</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="motivo">Motivo</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-pencil-alt"></i>
                                </div>
                            </div>
                            <input class="form-control" type="text" id="motivo" name="motivo"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="comentario">Comentario</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-pencil-alt"></i>
                                </div>
                            </div>
                            <textarea class="form-control"  id="comentario" name="comentario" placeholder="Ingresa un comentario sobre la(s) situcaion(es) del alumno"></textarea>
                        </div>
                    </div>

                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fas fa-window-close"></i> Cerrar</button>
                    <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal agregar asistencia -->
<div class="modal fade" id="addDiaAsistencia" tabindex="-1" role="dialog" aria-labelledby="addAlumnoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="exampleModalLabel"><strong>Agregar asistencia</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="addDiaAsistenciaF" method="post" class="form-horizontal">
                <div class="modal-body">
                    <div class="alert alert-info text-justify" role="alert"> 
                        La captura de asistencias es importante para así llevar un control de cuando asiste el alumno y el día.
                        <br><strong>Todos los campos son obligatorios</strong>
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="hidden" id="idReporteAs" name="idReporteAs" disabled>
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="hidden" id="idClaseAs" name="idClaseAs" disabled>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-form-label" for="numeroAs"># asistencia: </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-edit"></i>
                                </div>
                            </div>
                            <input class="form-control" type="number" id="numeroAs" name="numeroAs"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-form-label" for="fechaAs">Fecha: </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-calendar"></i>
                                </div>
                            </div>
                            <input class="form-control" type="date" id="fechaAs" name="fechaAs"/>
                        </div>
                    </div>

                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fas fa-window-close"></i> Cerrar</button>
                    <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal agregar actividad -->
<div class="modal fade" id="addActividad" tabindex="-1" role="dialog" aria-labelledby="addActividadLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="exampleModalLabel"><strong>Agregar actividad</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="addActividadF" method="POST" class="form-horizontal">
                <div class="modal-body">
                    <div class="alert alert-info text-justify" role="alert">
                        El registrar las actividades, permite administrar que actividad es dada en una clase.
                        <br><strong>Todos los campos son obligatorios</strong>
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="hidden" id="idReporteAc" name="idReporteAc" disabled>
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="hidden" id="idClaseAc" name="idClaseAc" disabled>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-form-label" for="nombreAc">Nombre: </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-edit"></i>
                                </div>
                            </div>
                            <input class="form-control" type="text" id="nombreAc" name="nombreAc"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-form-label" for="fechaAc">Fecha de entrega: </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-calendar"></i>
                                </div>
                            </div>
                            <input class="form-control" type="date" id="fechaAc" name="fechaAc"/>
                        </div>
                    </div>

                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fas fa-window-close"></i> Cerrar</button>
                    <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal agregar examen -->
<div class="modal fade" id="addExamen" tabindex="-1" role="dialog" aria-labelledby="addAlumnoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="exampleModalLabel"><strong>Agregar examen</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="addExamenF" method="POST">
                <div class="modal-body">
                    <div class="alert alert-info text-justify" role="alert"> 
                        El registrar los examenes, permite administrar que examen se va a impartir en tal fecha.
                        <br><strong>Todos los campos son obligatorios</strong>
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="hidden" id="idReporteEx" name="idReporteEx" disabled>
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="hidden" id="idClaseEx" name="idClaseEx" disabled>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-form-label" for="nombreEx">Nombre: </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-edit"></i>
                                </div>
                            </div>
                            <input class="form-control" type="text" id="nombreEx" name="nombreEx"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="fechaEx">Fecha de aplicación: </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-calendar"></i>
                                </div>
                            </div>
                            <input class="form-control" type="date" id="fechaEx" name="fechaEx"/>
                        </div>
                    </div>

                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fas fa-window-close"></i> Cerrar</button>
                    <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- ****************************************************************** Extra -->
<!-- Modal tomar asistencia -->
<div class="modal fade" id="takeAsistencia" tabindex="-1" role="dialog" aria-label="takeAsistanceLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="exampleModalLabel"> <strong>Tomar asistencia</strong> </h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="takeAsistanceF" action="POST">
                <div class="modal-body">
                    
                    <div class="form-group">
                        <label class="col-form-label" for="selectFecha">Fecha de asistencia: </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-calendar"></i>
                                </div>
                            </div>
                            <select name="selectFecha" id="selectFecha" class="custom-select">
                                <option value=''> Selecciona una fecha </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="selectAlumnoAsi">Nombre alumno: </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                            <select name="selectAlumnoAsi" id="selectAlumnoAsi" class="custom-select">
                                <option value=''> Selecciona un alumno </option>
                            </select>
                        </div>
                    </div>

                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fas fa-window-close"></i> Cerrar</button>
                    <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Agregar asistencia</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal calificar actividad -->
<div class="modal fade" id="takeActividad" tabindex="-1" role="dialog" aria-label="takeAsistanceLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="exampleModalLabel"> <strong>Calificar actividad</strong> </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="takeActividadF" action="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label" for="selectActividad">Nombre de la actividad: </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-book-open"></i>
                                </div>
                            </div>
                            <select name="selectActividad" id="selectActividad" class="custom-select">
                                <option value=''> Selecciona una actividad </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="selectAlumnoAct">Nombre alumno: </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                            <select name="selectAlumnoAct" id="selectAlumnoAct" class="custom-select">
                                <option value=''> Selecciona un alumno </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="calificacionAct">Calificación: </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-calculator"></i>
                                </div>
                            </div>
                            <input class="form-control" type="number" name="calificacionAct" id="calificacionAct" min="0"/>
                        </div>
                    </div>

                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fas fa-window-close"></i> Cerrar</button>
                    <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Agregar calificación</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal editar examen -->
<div class="modal fade" id="takeExamen" tabindex="-1" role="dialog" aria-label="takeAsistanceLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="exampleModalLabel"> <strong>Calificar examen</strong> </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="takeExamenF" action="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label" for="selectExamen">Nombre del examen: </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                            </div>
                            <select name="selectExamen" id="selectExamen" class="custom-select">
                                <option value=''> Selecciona un examen </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="selectAlumnoExa">Nombre alumno: </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                            <select name="selectAlumnoExa" id="selectAlumnoExa" class="custom-select">
                                <option value=''> Selecciona un alumno </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="calificacionExa">Calificación: </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-calculator"></i>
                                </div>
                            </div>
                            <input class="form-control" type="number" name="calificacionExa" id="calificacionExa" min="0"/>
                        </div>
                    </div>

                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fas fa-window-close"></i> Cerrar</button>
                    <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Agregar calificación</button>
                </div>
            </form>
        </div>
    </div>
</div>