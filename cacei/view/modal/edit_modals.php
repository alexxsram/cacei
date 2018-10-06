<?php
  session_start();
 ?>
<!-- Modal Editar Formacion Academica -->
<div class="modal fade bd-example-modal-lg" id="editFormacion" tabindex="-1" role="dialog" aria-labelledby="editFormacionLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="editFormacionF" method="POST" action="" accept-charset="utf-8">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><strong>Editar formación académica</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="ocultarMensajeEdit();">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">Por favor, rellene los campos debajo, revisando que estos <b>sean correctos y correspondan a sus datos reales</b>, ya que estos se usarán para realizar el reporte CACEI(aunque dispondrá de una sección para modificarlos, en caso de que cometa un error o necesite actualizarlos).<strong>Todos los campos son obligatorios</strong>
                    </div>
                    <!-- input oculto para guardar el id de la formacion-->
                    <input id="id_formacionE" type="hidden">
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="nombrefoE">Nombre</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" id="nombrefoE" name="nombrefoE" placeholder="Nombre (incluir especialidad)" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="inst">institución</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" id="instE" name="instE" placeholder="nstitución" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="country">País</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" id="countryE" name="countryE" placeholder="País" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="yearE">Año de obtención</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                            <select class="form-control" id="yearE">
                                <option value="2018">2018</option>
                                <?php
                                    for($i=2017; $i>=1950; $i--){echo "<option value='".$i."'>".$i."</option>";}
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="cedulaE">Cédula Profesional</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                            <input type="text" class="form-control" id="cedulaE" name="cedulaE" placeholder="Ingrese su la cédula profesioal" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="level">Seleccione el nivel</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                            <select class="form-control" id="levelE">
                               <option>Licenciatura</option>
                                    <option>Especialidad</option>
                                    <option>Maestria</option>
                                    <option>Doctorado</option>
                          </select>
                        </div>
                    </div>
                    <div class="alert alert-info alert-dismissible" id="msjAddFormacion">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cargarFormacion();">Cerrar</button>
                    <button type="submit" name="addFormacionF" class="btn btn-primary" onclick="ocultarMensajeEdit();">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Editar gestion Academica -- usado en index.php-->
<div class="modal fade bd-example-modal-lg" id="editGestion" tabindex="-1" role="dialog" aria-labelledby="editGestionLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="editGestionF" method="POST" class="form-horizontal" accept-charset="utf-8">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><strong>Editar gestión académica</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="ocultarMensajeEdit();">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">Por favor, rellene los campos debajo, revisando que estos <b>sean correctos y correspondan a sus datos reales</b>, ya que estos se usarán para realizar el reporte CACEI(aunque dispondrá de una sección para modificarlos, en caso de que cometa un error o necesite actualizarlos).<strong>Todos los campos son obligatorios</strong>
                    </div>
                    <input id="id_gE" type="hidden">
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="actividad_gE">Actividad o puesto</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" id="actividad_gE" name="actividad_gE" placeholder="ingrerese actividad o puesto" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="inst_gE">institución</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                            <input type="text" class="form-control" id="inst_gE" name="inst_gE" placeholder="ingrese la institución" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="de_g">De: </label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            <input type="date" class="form-control" id="de_gE" name="de_gE" placeholder="ingrese el inicio" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="hasta_gE">A: </label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            <input type="date" class="form-control" id="hasta_gE" name="hasta_gE" placeholder="ingrese el fin" />
                        </div>
                    </div>
                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="ocultarMensajeEdit();" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Editar producto usado en index.php-->
<div class="modal fade bd-example-modal-lg" id="editProducto" tabindex="-1" role="dialog" aria-labelledby="editProductoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <form id="editProdF" method="POST" class="form-horizontal" accept-charset="utf-8">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><strong>Editar producto académico</strong></h4>
                    <button type="button" class="close" onclick="ocultarMensajeEdit();" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">Por favor, rellene los campos debajo, revisando que estos <b>sean correctos y correspondan a sus datos reales</b>, ya que estos se usarán para realizar el reporte CACEI(aunque dispondrá de una sección para modificarlos, en caso de que cometa un error o necesite actualizarlos).<strong>Todos los campos son obligatorios</strong>
                    </div>
                    <input type="hidden" id="id_pE">
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="titulo_p">Titulo</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" id="titulo_pE" name="titulo_pE" placeholder="ingrerese el titulo del producto" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="autor_p">Autor</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" id="autor_pE" name="autor_pE" placeholder="ingrese el autor del producto" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="lugar_pE">Lugar de publicación</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                            <input type="text" class="form-control" id="lugar_pE" name="lugar_pE" placeholder="ingrese el lugar donde se presento el producto" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="fecha_pE">Fecha de publicación</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            <input type="date" class="form-control" id="fecha_pE" name="fecha_pE" placeholder="ingrese la fecha de publicación" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="tipo_pE">Tipo</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                            <input type="text" class="form-control" id="tipo_pE" name="tipo_pE" placeholder="ingrese el tipo del producto" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="numero_pE">Número de registro</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                            <input type="text" class="form-control" id="numero_pE" name="numero_pE" placeholder="ingrese el número de registro del producto" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="alcance_pE">Alcance</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                            <input type="text" class="form-control" id="alcance_pE" name="alcance_pE" placeholder="ingrese el alcance del producto" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="info_pE">Información extra</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></span>
                            <textarea type="text" class="form-control" id="info_pE" name="info_pE" placeholder="Editar información extra, como alcance, si es para patentes o desarrollos tecnológicos, etc."></textarea>
                        </div>
                    </div>
                </div>
                <div class="alert alert-info alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="ocultarMensajeEdit();" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="registrob" class="btn btn-primary">Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Editar capacitacion docente-->
<div class="modal fade bd-example-modal-lg" id="editCapac" tabindex="-1" role="dialog" aria-labelledby="editCapacLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="editCapacF" method="post" class="form-horizontal">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><strong>Editar capacitación docente</strong></h4>
                    <button type="button" class="close" onclick="ocultarMensajeEdit();" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">Por favor, rellene los campos debajo, revisando que estos <b>sean correctos y correspondan a sus datos reales</b>, ya que estos se usarán para realizar el reporte CACEI(aunque dispondrá de una sección para modificarlos, en caso de que cometa un error o necesite actualizarlos).<strong>Todos los campos son obligatorios</strong>
                    </div>
                    <input type="hidden" id="id_cE">
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="tipo_cE">Tipo</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                            <input type="text" class="form-control" id="tipo_cE" name="tipo_cE" placeholder="ingrese el tipo de la capacitacion" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="inst_cE">institución</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                            <input type="text" class="form-control" id="inst_cE" name="inst_cE" placeholder="ingrese la institución" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="pais_cE">Pais</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                            <input type="text" class="form-control" id="pais_cE" name="pais_cE" placeholder="ingrese el pais donde realizó la capacitación" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="year_cE">Año de obtención</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            <select class="form-control" id="year_cE">
                                <option value="2018">2018</option>
                                <?php
                                    for($i=2017; $i>=1950; $i--){echo "<option value='".$i."'>".$i."</option>";}
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="hora_cE">Horas</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            <input type="text" class="form-control" id="hora_cE" name="hora_cE" placeholder="ingrese las horas que duro la capacitación" />
                        </div>
                    </div>
                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="ocultarMensajeEdit();" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Editar Actualización disciplinar-->
<div class="modal fade bd-example-modal-lg" id="editActualizacion" tabindex="-1" role="dialog" aria-labelledby="editActualizacionLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="editActualizacionF" class="form-horizontal" method="post">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><strong>Editar actualización disciplinar</strong></h4>
                    <button type="button" class="close" onclick="ocultarMensajeEdit();" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">Por favor, rellene los campos debajo, revisando que estos <b>sean correctos y correspondan a sus datos reales</b>, ya que estos se usarán para realizar el reporte CACEI(aunque dispondrá de una sección para modificarlos, en caso de que cometa un error o necesite actualizarlos).<strong>Todos los campos son obligatorios</strong>
                    </div>
                    <input id="id_aE" type="hidden">
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="tipo_aE">Tipo</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                            <input type="text" class="form-control" id="tipo_aE" name="tipo_aE" placeholder="ingrese el tipo de la actualización" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="inst_aE">institución</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                            <input type="text" class="form-control" id="inst_aE" name="inst_aE" placeholder="ingrese la institución en la llevo acabo la actualización" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="pais_aE">Pais</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                            <input type="text" class="form-control" id="pais_aE" name="pais_aE" placeholder="ingrese el pais donde realizó la actualización" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="year_aE">Año de obtención</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            <select class="form-control" id="year_aE" name="year_aE">
                                <option value="2018">2018</option>
                                <?php
                                    for($i=2017; $i>=1950; $i--){echo "<option value='".$i."'>".$i."</option>";}
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="hora_aE">Horas</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            <input type="text" class="form-control" id="hora_aE" name="hora_aE" placeholder="ingrese las horas que duro la actualización" />
                        </div>
                    </div>
                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" onclick="ocultarMensajeEdit();" class="btn btn-primary">Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Editar Experiencia profesional (no académica)-->
<div class="modal fade bd-example-modal-lg" id="editExperienciaP" tabindex="-1" role="dialog" aria-labelledby="editExperienciaPLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="editExperienciaPF" class="form-horizontal">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><strong>Editar experiencia profesional(no académica)</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="ocultarMensajeEdit();">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">Por favor, rellene los campos debajo, revisando que estos <b>sean correctos y correspondan a sus datos reales</b>, ya que estos se usarán para realizar el reporte CACEI(aunque dispondrá de una sección para modificarlos, en caso de que cometa un error o necesite actualizarlos).<strong>Todos los campos son obligatorios</strong>
                    </div>
                    <input id="id_eE" type="hidden">
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="act_eE">Actividad o puesto</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" id="act_eE" name="act_eE" placeholder="ingrerese actividad o puesto" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="empresa_eE">Organización o empresa</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                            <input type="text" class="form-control" id="empresa_eE" name="empresa_eE" placeholder="ingrese la organización o empresa" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="de_eE">De: </label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            <input type="date" class="form-control" id="de_eE" name="de_eE" placeholder="ingrese el inicio" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="hasta_eE">A: </label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            <input type="date" class="form-control" id="hasta_eE" name="hasta_eE" placeholder="ingrese el fin" />
                        </div>
                    </div>
                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="ocultarMensajeEdit();">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Editar Experiencia en diseño ingenieril-->
<div class="modal fade bd-example-modal-lg" id="editExperienciaD" tabindex="-1" role="dialog" aria-labelledby="editExperienciaDLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="editExperienciaDF" class="form-horizontal" method="post">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><strong>Editar experiencia en diseño ingenieril</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="ocultarMensajeEdit();">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">Por favor, rellene los campos debajo, revisando que estos <b>sean correctos y correspondan a sus datos reales</b>, ya que estos se usarán para realizar el reporte CACEI(aunque dispondrá de una sección para modificarlos, en caso de que cometa un error o necesite actualizarlos).
                        <br><b>Todos los campos son obligatorios</b>, a excepción de aquellos marcados <strong>(*)</strong> como opcionales.
                    </div>
                      <input id="id_dE" type="hidden">
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="org_dE">Organismo</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                            <input type="text" class="form-control" id="org_dE" name="org_dE" placeholder="ingrerese el organismo" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="periodo_dE">Periodo (años)</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            <input type="text" class="form-control" id="periodo_dE" name="periodo_dE" placeholder="ingrese los años que desempeño" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="nivel_dE">Nivel de experiencia</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-equalizer"></i></span>
                            <select class="form-control" id="nivel_dE" name="nivel_dE">
                                <option value="alta">Alta</option>
                                <option value="media">Media</option>
                                <option value="baja">Baja</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="info_dE">Información extra(Relevante)*</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <textarea class="form-control" id="info_dE" name="info_dE" placeholder="ingrese el fin"></textarea>
                        </div>
                    </div>
                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="ocultarMensajeEdit();">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Editar logros profesionales (no académicos)-->
<div class="modal fade bd-example-modal-lg" id="editLogro" tabindex="-1" role="dialog" aria-labelledby="editLogroLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="editLogroF" class="form-horizontal">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><strong>Editar logros profesionales (no académicos)</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="ocultarMensajeEdit();">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">Por favor, rellene los campos debajo, revisando que estos <b>sean correctos y correspondan a sus datos reales</b>, ya que estos se usarán para realizar el reporte CACEI(aunque dispondrá de una sección para modificarlos, en caso de que cometa un error o necesite actualizarlos).
                        <br><b>Todos los campos son obligatorios</b>
                    </div>
                    <input id="id_lE" type="hidden">
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="titulo_lE">Titulo</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                            <input type="text" class="form-control" id="titulo_lE" name="titulo_lE" placeholder="ingrerese el titulo del logro" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="autor_lE">Autor</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                            <input type="text" class="form-control" id="autor_lE" name="autor_lE" placeholder="ingrese el nombre del autor del logro" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="nombre_lE">Nombre</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                            <input type="text" class="form-control" id="nombre_lE" name="nombre_lE" placeholder="ingrese el nombre del logro" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="relev_lE">Seleccione la relevancia</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-signal"></i></span>
                            <select class="form-control" id="relev_lE" name="relev_lE">
                                <option value="alta">Alta</option>
                                <option value="media">Media</option>
                                <option value="baja">Baja</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="lugar_lE">Dónde se realizó</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-global"></i></span>
                            <input class="form-control" id="lugar_lE" name="lugar_lE" placeholder="Ingrese el lugar dónde se realizó" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="info_lE">Descripción</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <textarea class="form-control" id="info_lE" name="info_lE" placeholder="Ingrese una descripción breve del logro"></textarea>
                        </div>
                    </div>
                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="ocultarMensajeEdit();">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Editar Membresía o participación en Colegios, Cámaras, asociaciones científicas o algún otro tipo de organismo profesional-->
<div class="modal fade bd-example-modal-lg" id="editMembresia" tabindex="-1" role="dialog" aria-labelledby="editMembresiaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="editMembresiaF" class="form-horizontal">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><strong>Editar membresía o participación</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="ocultarMensajeEdit();">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">Por favor, rellene los campos debajo, revisando que estos <b>sean correctos y correspondan a sus datos reales</b>, ya que estos se usarán para realizar el reporte CACEI(aunque dispondrá de una sección para modificarlos, en caso de que cometa un error o necesite actualizarlos).
                        <br><b>Todos los campos son obligatorios</b>, a excepción de aquellos marcados <strong>(*)</strong> como opcionales.
                    </div>
                    <input id="id_mE" type="hidden">
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="org_mE">Organismo</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                            <input type="text" class="form-control" id="org_mE" name="org_mE" placeholder="ingrerese el organismo" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="tipo_mE">Tipo</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                            <input type="text" class="form-control" id="tipo_mE" name="tipo_mE" placeholder="ingrese el tipo de membresía o participación" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="periodo_mE">Años</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            <input type="text" class="form-control" id="periodo_mE" name="periodo_mE" placeholder="ingrese el número de años" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="info_mE">Información extra(Relevante)*</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <textarea class="form-control" id="info_mE" name="info_mE" placeholder="ingrese informacion relevante sobre la membresía o participación en Colegios, Cámaras, asociaciones científicas o algún otro tipo de organismo profesional"></textarea>
                        </div>
                    </div>
                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="ocultarMensajeEdit();">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Editar Premios, distinciones o reconocimientos recibidos-->
<div class="modal fade bd-example-modal-lg" id="editPremio" tabindex="-1" role="dialog" aria-labelledby="editPremioLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="editPremioF" class="form-horizontal">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><strong>Editar premios, distinciones o reconocimientos recibidos</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="ocultarMensajeEdit();">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">Por favor, rellene los campos debajo, revisando que estos <b>sean correctos y correspondan a sus datos reales</b>, ya que estos se usarán para realizar el reporte CACEI(aunque dispondrá de una sección para modificarlos, en caso de que cometa un error o necesite actualizarlos).<strong>Todos los campos son obligatorios</strong>
                    </div>
                    <input id="id_rE" type="hidden">
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="nombre_rE">Nombre</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                            <input type="text" class="form-control" id="nombre_rE" name="nombre_rE" placeholder="ingrese el nombre del premio" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="org_rE">Organismo</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                            <input type="text" class="form-control" id="org_rE" name="org_rE" placeholder="ingrese el organismo que lo otorga" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="motivo_rE">Motivo(s)</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                            <input type="text" class="form-control" id="motivo_rE" name="motivo_rE" placeholder="ingrese el(los) Motivo(s) por el que se le otorga" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="desc_rE">Descripción</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                            <textarea class="form-control" id="desc_rE" name="desc_rE" placeholder="Ingrese uns descripción">
                            </textarea>
                        </div>
                    </div>
                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="ocultarMensajeEdit();">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Editar</button>
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
