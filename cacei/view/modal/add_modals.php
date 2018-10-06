<!--Modal agregar/editar datos personales-->
<div class="modal fade bd-example-modal-lg" id="addDatos" tabindex="-1" role="dialog" aria-labelledby="addDatoslLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="addDatosF" method="post" class="form-horizontal">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><strong>Modificar Datos Personales</strong></h4>
                    <button type="button" onclick="ocultarMensajeAdd();" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">Por favor, rellene los campos debajo, revisando que estos <b>sean correctos y correspondan a sus datos reales</b>, ya que estos se usarán para realizar el reporte CACEI(aunque dispondrá de una sección para modificarlos, en caso de que cometa un error o necesite actualizarlos).<strong>Todos los campos son obligatorios</strong>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="nombre">Nombre(s)</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre(s)" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="app">Apellido paterno</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" id="app" name="app" placeholder="Apellido paterno" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="apm">Apellido materno</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" id="apm" name="apm" placeholder="Apellido materno" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="fechaDa">Fecha de nacimiento</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                            <input type="date" class="form-control" id="fechaDa" name="fechaDa" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="codigo">Código</label>
                        <div class="col-sm-5 input-group input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                            <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Ingrese su código de profesor(UDG)" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="puesto">Puesto</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                            <select class="form-control" id="puesto">
                              <option value="2">PROFESOR DE ASIGNATURA A</option>
<option value="3">PROFESOR DE ASIGNATURA B</option>
<option value = "4">PROFESOR DE ASIGNATURA HONORIFICO</option>
<option value = "5">PROFESOR DOCENTE ASISTENTE A (40 hrs)</option>
<option value = "6">PROFESOR DOCENTE ASISTENTE B (40 hrs)</option>
<option value = "7">PROFESOR DOCENTE ASISTENTE C (40 hrs)</option>
<option value = "8">PROFESOR DOCENTE ASOCIADO A (40 hrs)</option>
<option value = "9">PROFESOR DOCENTE ASOCIADO B (40 hrs)</option>
<option value = "10">PROFESOR DOCENTE ASOCIADO C (40 hrs)</option>
<option value = "11">PROFESOR DOCENTE TITULAR A (40 hrs)</option>
<option value = "12">PROFESOR DOCENTE TITULAR B (40 hrs)</option>
<option value = "13">PROFESOR DOCENTE TITULAR C (40 hrs)</option>
<option value = "14">PROFESOR INVESTIGADOR ASISTENTE A (40 hrs)</option>
<option value = "15">PROFESOR INVESTIGADOR ASISTENTE B (40 hrs)</option>
<option value = "16">PROFESOR INVESTIGADOR ASISTENTE C (40 hrs)</option>
<option value = "17">PROFESOR INVESTIGADOR ASOCIADO A (40 hrs)</option>
<option value = "18">PROFESOR INVESTIGADOR ASOCIADO B (40 hrs)</option>
<option value = "19">PROFESOR INVESTIGADOR ASOCIADO C (40 hrs)</option>
<option value = "20">PROFESOR INVESTIGADOR TITULAR A (40 hrs)</option>
<option value = "21">PROFESOR INVESTIGADOR TITULAR B (40 hrs)</option>
<option value = "21">PROFESOR INVESTIGADOR TITULAR C (40 hrs)</option>
<option value = "23">PROFESOR DOCENTE ASISTENTE A (20 hrs)</option>
<option value = "24">PROFESOR DOCENTE ASISTENTE B (20 hrs)</option>
<option value = "25">PROFESOR DOCENTE ASISTENTE C (20 hrs)</option>
<option value = "26">PROFESOR DOCENTE ASOCIADO A (20 hrs)</option>
<option value = "27">PROFESOR DOCENTE ASOCIADO B (20 hrs)</option>
<option value = "28">PROFESOR DOCENTE ASOCIADO C (20 hrs)</option>
<option value = "29">PROFESOR DOCENTE TITULAR A (20 hrs)</option>
<option value = "30">PROFESOR DOCENTE TITULAR B (20 hrs)</option>
<option value = "31">PROFESOR DOCENTE TITULAR C (20 hrs)</option>
<option value = "32">PROFESOR INVESTIGADOR ASISTENTE A (20 hrs)</option>
<option value = "33">PROFESOR INVESTIGADOR ASISTENTE B (20 hrs)</option>
<option value = "34">PROFESOR INVESTIGADOR ASISTENTE C (20 hrs)</option>
<option value = "35">PROFESOR INVESTIGADOR ASOCIADO A (20 hrs)</option>
<option value = "36">PROFESOR INVESTIGADOR ASOCIADO B (20 hrs)</option>
<option value = "37">PROFESOR INVESTIGADOR ASOCIADO C (20 hrs)</option>
<option value = "38">PROFESOR INVESTIGADOR TITULAR A (20 hrs)</option>
<option value = "39">PROFESOR INVESTIGADOR TITULAR B (20 hrs)</option>
<option value = "40">PROFESOR INVESTIGADOR TITULAR C (20 hrs)</option>
<option value = "41">TECNICO ACADEMICO ASISTENTE A (40 hrs)</option>
<option value = "42">TECNICO ACADEMICO ASISTENTE B (40 hrs)</option>
<option value = "43">TECNICO ACADEMICO ASISTENTE C (40 hrs)</option>
<option value = "44">TECNICO ACADEMICO ASOCIADO A (40 hrs)</option>
<option value = "45">TECNICO ACADEMICO ASOCIADO B (40 hrs)</option>
<option value = "46">TECNICO ACADEMICO ASOCIADO C (40 hrs)</option>
<option value = "47">TECNICO ACADEMICO TITULAR A (40 hrs)</option>
<option value = "48">TECNICO ACADEMICO TITULAR B (40 hrs)</option>
<option value = "49">TECNICO ACADEMICO TITULAR C (40 hrs)</option>
<option value = "50">TECNICO ACADEMICO ASISTENTE A (20 hrs)</option>
<option value = "51">TECNICO ACADEMICO ASISTENTE B (20 hrs)</option>
<option value = "52">TECNICO ACADEMICO ASISTENTE C (20 hrs)</option>
<option value = "53">TECNICO ACADEMICO ASOCIADO A (20 hrs)</option>
<option value = "54">TECNICO ACADEMICO ASOCIADO B (20 hrs)</option>
<option value = "55">TECNICO ACADEMICO ASOCIADO C (20 hrs)</option>
<option value = "56">TECNICO ACADEMICO TITULAR A (20 hrs)</option>
<option value = "57">TECNICO ACADEMICO TITULAR B (20 hrs)</option>
<option value = "58">TECNICO ACADEMICO TITULAR C (20 hrs)</option>
                            </select>
                        </div>
                    </div>
                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="ocultarMensajeEdit();" >Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Agregar Formacion Academica -->
<div class="modal fade bd-example-modal-lg" id="addFormacion" tabindex="-1" role="dialog" aria-labelledby="addFormacionLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="addFormacionF" method="POST" action="" accept-charset="utf-8">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><strong>Agregar formación académica</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="ocultarMensajeAdd();">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">Por favor, rellene los campos debajo, revisando que estos <b>sean correctos y correspondan a sus datos reales</b>, ya que estos se usarán para realizar el reporte CACEI(aunque dispondrá de una sección para modificarlos, en caso de que cometa un error o necesite actualizarlos).<strong>Todos los campos son obligatorios</strong>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="nombre">Nombre</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" id="nombrefo" name="nombrefo" placeholder="Nombre (incluir especialidad)" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="inst">institución</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" id="inst" name="inst" placeholder="Institución" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="country">País</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" id="country" name="country" placeholder="País" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="year">Año de obtención</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                            <select class="form-control" id="year">
                                <option value="2018">2018</option>
                                <?php
                                    for($i=2017; $i>=1950; $i--){echo "<option value='".$i."'>".$i."</option>";}
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="cedula">Cédula Profesional</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                            <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Ingrese su la cédula profesioal" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="level">Seleccione el nivel</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                            <select class="form-control" id="level">
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
                    <button type="submit" name="addFormacionF" class="btn btn-primary" onclick="ocultarMensajeAdd();">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Agregar gestion Academica -- usado en index.php-->
<div class="modal fade bd-example-modal-lg" id="addGestion" tabindex="-1" role="dialog" aria-labelledby="addGestionLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="addGestionF" method="POST" class="form-horizontal" accept-charset="utf-8">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><strong>Agregar gestión académica</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="ocultarMensajeAdd();">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">Por favor, rellene los campos debajo, revisando que estos <b>sean correctos y correspondan a sus datos reales</b>, ya que estos se usarán para realizar el reporte CACEI(aunque dispondrá de una sección para modificarlos, en caso de que cometa un error o necesite actualizarlos).<strong>Todos los campos son obligatorios</strong>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="actividad_g">Actividad o puesto</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" id="actividad_g" name="actividad_g" placeholder="ingrerese actividad o puesto" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="inst_g">institución</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                            <input type="text" class="form-control" id="inst_g" name="inst_g" placeholder="ingrese la institución" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="de_g">De: </label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            <input type="date" class="form-control" id="de_g" name="de_g" placeholder="ingrese el inicio" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="hasta_g">A: </label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            <input type="date" class="form-control" id="hasta_g" name="hasta_g" placeholder="ingrese el fin" />
                        </div>
                    </div>
                    <div class="alert alert-info alert-dismissible" id="msjAddGestion">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="ocultarMensajeAdd();" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Agregar producto usado en index.php-->
<div class="modal fade bd-example-modal-lg" id="addProd" tabindex="-1" role="dialog" aria-labelledby="addProductoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <form id="addProdF" method="POST" class="form-horizontal" accept-charset="utf-8">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><strong>Agregar producto académico</strong></h4>
                    <button type="button" class="close" onclick="ocultarMensajeAdd();" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">Por favor, rellene los campos debajo, revisando que estos <b>sean correctos y correspondan a sus datos reales</b>, ya que estos se usarán para realizar el reporte CACEI(aunque dispondrá de una sección para modificarlos, en caso de que cometa un error o necesite actualizarlos).<strong>Todos los campos son obligatorios</strong>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="titulo_p">Titulo</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" id="titulo_p" name="titulo_p" placeholder="ingrerese el titulo del producto" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="autor_p">Autor</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" id="autor_p" name="autor_p" placeholder="ingrese el autor del producto" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="lugar_p">Lugar de publicación</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                            <input type="text" class="form-control" id="lugar_p" name="lugar_p" placeholder="ingrese el lugar donde se presento el producto" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="fecha_p">Fecha de publicación</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            <input type="date" class="form-control" id="fecha_p" name="fecha_p" placeholder="ingrese la fecha de publicación" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="tipo_p">Tipo</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                            <input type="text" class="form-control" id="tipo_p" name="tipo_p" placeholder="ingrese el tipo del producto" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="numero_p">Número de registro</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                            <input type="text" class="form-control" id="numero_p" name="numero_p" placeholder="ingrese el número de registro del producto" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="alcance_p">Alcance</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                            <input type="text" class="form-control" id="alcance_p" name="alcance_p" placeholder="ingrese el alcance del producto" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="info_p">Información extra</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></span>
                            <textarea type="text" class="form-control" id="info_p" name="info_p" placeholder="Agregar información extra, como alcance, si es para patentes o desarrollos tecnológicos, etc."></textarea>
                        </div>
                    </div>
                </div>
                <div class="alert alert-info alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="ocultarMensajeAdd();" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="registrob" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Agregar capacitacion docente-->
<div class="modal fade bd-example-modal-lg" id="addCapacitacion" tabindex="-1" role="dialog" aria-labelledby="addCapacitacionLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="addCapacitacionF" method="post" class="form-horizontal">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><strong>Agregar capacitación docente</strong></h4>
                    <button type="button" class="close" onclick="ocultarMensajeAdd();" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">Por favor, rellene los campos debajo, revisando que estos <b>sean correctos y correspondan a sus datos reales</b>, ya que estos se usarán para realizar el reporte CACEI(aunque dispondrá de una sección para modificarlos, en caso de que cometa un error o necesite actualizarlos).<strong>Todos los campos son obligatorios</strong>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="tipo_c">Tipo</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                            <input type="text" class="form-control" id="tipo_c" name="tipo_c" placeholder="ingrese el tipo de la capacitacion" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="inst_c">institución</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                            <input type="text" class="form-control" id="inst_c" name="inst_c" placeholder="ingrese la institución" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="pais_c">Pais</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                            <input type="text" class="form-control" id="pais_c" name="pais_c" placeholder="ingrese el pais donde realizó la capacitación" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="year_c">Año de obtención</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            <select class="form-control" id="year_c">
                                <option value="2018">2018</option>
                                <?php
                                    for($i=2017; $i>=1950; $i--){echo "<option value='".$i."'>".$i."</option>";}
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="hora_c">Horas</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            <input type="text" class="form-control" id="hora_c" name="hora_c" placeholder="ingrese las horas que duro la capacitación" />
                        </div>
                    </div>
                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="ocultarMensajeAdd();" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Agregar Actualización disciplinar-->
<div class="modal fade bd-example-modal-lg" id="addActualizacion" tabindex="-1" role="dialog" aria-labelledby="addActualizacionLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="addActualizacionF" class="form-horizontal" method="post">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><strong>Agregar actualización disciplinar</strong></h4>
                    <button type="button" class="close" onclick="ocultarMensajeAdd();" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">Por favor, rellene los campos debajo, revisando que estos <b>sean correctos y correspondan a sus datos reales</b>, ya que estos se usarán para realizar el reporte CACEI(aunque dispondrá de una sección para modificarlos, en caso de que cometa un error o necesite actualizarlos).<strong>Todos los campos son obligatorios</strong>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="tipo_a">Tipo</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                            <input type="text" class="form-control" id="tipo_a" name="tipo_a" placeholder="ingrese el tipo de la actualización" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="inst_a">institución</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                            <input type="text" class="form-control" id="inst_a" name="inst_a" placeholder="ingrese la institución en la llevo acabo la actualización" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="pais_a">Pais</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                            <input type="text" class="form-control" id="pais_a" name="pais_a" placeholder="ingrese el pais donde realizó la actualización" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="year_a">Año de obtención</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            <select class="form-control" id="year_a" name="year_a">
                                <option value="2018">2018</option>
                                <?php
                                    for($i=2017; $i>=1950; $i--){echo "<option value='".$i."'>".$i."</option>";}
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="hora_a">Horas</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            <input type="text" class="form-control" id="hora_a" name="hora_a" placeholder="ingrese las horas que duro la actualización" />
                        </div>
                    </div>
                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" onclick="ocultarMensajeAdd();" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Agregar Experiencia profesional (no académica)-->
<div class="modal fade bd-example-modal-lg" id="addExperienciaP" tabindex="-1" role="dialog" aria-labelledby="addExperienciaPLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="addExperienciaPF" class="form-horizontal">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><strong>Agregar experiencia profesional(no académica)</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="ocultarMensajeAdd();">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">Por favor, rellene los campos debajo, revisando que estos <b>sean correctos y correspondan a sus datos reales</b>, ya que estos se usarán para realizar el reporte CACEI(aunque dispondrá de una sección para modificarlos, en caso de que cometa un error o necesite actualizarlos).<strong>Todos los campos son obligatorios</strong>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="act_e">Actividad o puesto</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" id="act_e" name="act_e" placeholder="ingrerese actividad o puesto" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="empresa_e">Organización o empresa</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                            <input type="text" class="form-control" id="empresa_e" name="empresa_e" placeholder="ingrese la organización o empresa" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="de_e">De: </label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            <input type="date" class="form-control" id="de_e" name="de_e" placeholder="ingrese el inicio" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="hasta_e">A: </label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            <input type="date" class="form-control" id="hasta_e" name="hasta_e" placeholder="ingrese el fin" />
                        </div>
                    </div>
                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="ocultarMensajeAdd();">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Agregar Experiencia en diseño ingenieril-->
<div class="modal fade bd-example-modal-lg" id="addExperienciaD" tabindex="-1" role="dialog" aria-labelledby="addExperienciaDLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="addExperienciaDF" class="form-horizontal" method="post">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><strong>Agregar experiencia en diseño ingenieril</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="ocultarMensajeAdd();">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">Por favor, rellene los campos debajo, revisando que estos <b>sean correctos y correspondan a sus datos reales</b>, ya que estos se usarán para realizar el reporte CACEI(aunque dispondrá de una sección para modificarlos, en caso de que cometa un error o necesite actualizarlos).
                        <br><b>Todos los campos son obligatorios</b>, a excepción de aquellos marcados <strong>(*)</strong> como opcionales.
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="org_d">Organismo</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                            <input type="text" class="form-control" id="org_d" name="org_d" placeholder="ingrerese el organismo" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="periodo_d">Periodo (años)</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            <input type="text" class="form-control" id="periodo_d" name="periodo_d" placeholder="ingrese los años que desempeño" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="nivel_d">Nivel de experiencia</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-equalizer"></i></span>
                            <input type="text" class="form-control" id="nivel_d" name="nivel_d" placeholder="ingrese el nivel de experiencia obtenido" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="info_d">Información extra(Relevante)*</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <textarea class="form-control" id="info_d" name="info_d" placeholder="ingrese el fin"></textarea>
                        </div>
                    </div>
                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="ocultarMensajeAdd();">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Agregar logros profesionales (no académicos)-->
<div class="modal fade bd-example-modal-lg" id="addLogro" tabindex="-1" role="dialog" aria-labelledby="addLogroLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="addLogroF" class="form-horizontal">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><strong>Agregar logros profesionales (no académicos)</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="ocultarMensajeAdd();">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">Por favor, rellene los campos debajo, revisando que estos <b>sean correctos y correspondan a sus datos reales</b>, ya que estos se usarán para realizar el reporte CACEI(aunque dispondrá de una sección para modificarlos, en caso de que cometa un error o necesite actualizarlos).
                        <br><b>Todos los campos son obligatorios</b>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="titulo_l">Titulo</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                            <input type="text" class="form-control" id="titulo_l" name="titulo_l" placeholder="ingrerese el titulo del logro" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="autor_l">Autor</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                            <input type="text" class="form-control" id="autor_l" name="autor_l" placeholder="ingrese el nombre del autor del logro" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="nombre_l">Nombre</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                            <input type="text" class="form-control" id="nombre_l" name="nombre_l" placeholder="ingrese el nombre del logro" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="relev_l">Seleccione la relevancia</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-signal"></i></span>
                            <select class="form-control" id="relev_l" name="relev_l">
                                <option value="alta">Alta</option>
                                <option value="media">Media</option>
                                <option value="baja">Baja</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="lugar_l">Dónde se realizó</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-global"></i></span>
                            <input class="form-control" id="lugar_l" name="lugar_l" placeholder="Ingrese el lugar dónde se realizó" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="info_l">Descripción</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <textarea class="form-control" id="info_l" name="info_l" placeholder="Ingrese una descripción breve del logro"></textarea>
                        </div>
                    </div>
                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="ocultarMensajeAdd();">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Agregar Membresía o participación en Colegios, Cámaras, asociaciones científicas o algún otro tipo de organismo profesional-->
<div class="modal fade bd-example-modal-lg" id="addMembresia" tabindex="-1" role="dialog" aria-labelledby="addMembresiaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="addMembresiaF" class="form-horizontal">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><strong>Agregar membresía o participación</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="ocultarMensajeAdd();">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">Por favor, rellene los campos debajo, revisando que estos <b>sean correctos y correspondan a sus datos reales</b>, ya que estos se usarán para realizar el reporte CACEI(aunque dispondrá de una sección para modificarlos, en caso de que cometa un error o necesite actualizarlos).
                        <br><b>Todos los campos son obligatorios</b>, a excepción de aquellos marcados <strong>(*)</strong> como opcionales.
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="org_m">Organismo</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                            <input type="text" class="form-control" id="org_m" name="org_m" placeholder="ingrerese el organismo" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="tipo_m">Tipo</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                            <input type="text" class="form-control" id="tipo_m" name="tipo_m" placeholder="ingrese el tipo de membresía o participación" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="periodo_m">Años</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            <input type="text" class="form-control" id="periodo_m" name="periodo_m" placeholder="ingrese el número de años" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="info_m">Información extra(Relevante)*</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <textarea class="form-control" id="info_m" name="info_m" placeholder="ingrese informacion relevante sobre la membresía o participación en Colegios, Cámaras, asociaciones científicas o algún otro tipo de organismo profesional"></textarea>
                        </div>
                    </div>
                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="ocultarMensajeAdd();">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Agregar Premios, distinciones o reconocimientos recibidos-->
<div class="modal fade bd-example-modal-lg" id="addPremio" tabindex="-1" role="dialog" aria-labelledby="addPremioLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="addPremioF" class="form-horizontal">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><strong>Agregar premios, distinciones o reconocimientos recibidos</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="ocultarMensajeAdd();">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">Por favor, rellene los campos debajo, revisando que estos <b>sean correctos y correspondan a sus datos reales</b>, ya que estos se usarán para realizar el reporte CACEI(aunque dispondrá de una sección para modificarlos, en caso de que cometa un error o necesite actualizarlos).<strong>Todos los campos son obligatorios</strong>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="nombre_r">Nombre</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                            <input type="text" class="form-control" id="nombre_r" name="nombre_r" placeholder="ingrese el nombre del premio" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="organismo">Organismo</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                            <input type="text" class="form-control" id="org_r" name="org_r" placeholder="ingrese el organismo que lo otorga" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="motivo_r">Motivo(s)</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                            <input type="text" class="form-control" id="motivo_r" name="motivo_r" placeholder="ingrese el(los) Motivo(s) por el que se le otorga" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="desc_r">Descripción</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                            <textarea class="form-control" id="desc_r" name="desc_r" placeholder="Ingrese uns descripción">
                            </textarea>
                        </div>
                    </div>
                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="ocultarMensajeAdd();">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal editar Participación en el análisis o actualización del PE, o en actividades extracurriculares relacionadas con el PE-->
<div class="modal fade bd-example-modal-lg" id="addPE" tabindex="-1" role="dialog" aria-labelledby="addPELabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="addPEF" class="form-horizontal">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><strong>Editar PE</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="ocultarMensajeAdd();">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">Con un <strong>máximo de 200 palabras</strong>, reseñe cuál ha sido su <strong>participación en actividades relevantes del PE</strong>, tales como: diseño el PE, diseño de asignatura(s) del PE, análisis de indicadores del PE, participación en cuerpos colegiados del PE, participación en grupos de mejora continua del PE, etc.; <strong>en actividades extracurriculares relacionadas con el PE</strong>; o en <strong>ambos tipos de actividades</strong>.
                    </div>
                    <input type="hidden" id="idPEm"/>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="descrip_f">Descripción</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-info-pencil"></i></span>
                            <textarea class="form-control" id="descrip_f" name="descrip_f" placeholder="ingrese la una reseñena de su participación en actividades relevantes del PE"></textarea>
                        </div>
                    </div>
                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="ocultarMensajeAdd();">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
