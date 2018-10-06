<!--Modal agregar profesor-->
<div class="modal fade bd-example-modal-lg" id="addProfesor" tabindex="-1" role="dialog" aria-labelledby="addProfesorlLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="addProfesorF" method="post" class="form-horizontal">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><strong>Agragar profesor</strong></h4>
                    <button type="button" class="close" onclick="ocultarMensajeEdit();" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">Por favor, rellene los campos debajo, revisando que estos <b>sean correctos y correspondan a sus datos reales</b>, ya que estos se usarán para realizar el reporte CACEI(aunque dispondrá de una sección para modificarlos, en caso de que cometa un error o necesite actualizarlos).<strong>Todos los campos son obligatorios</strong>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="codigo">Codigo</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Ingrese el código del profesor" />
                        </div>
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
                        <label class="col-sm-4 control-label" for="pass">contraseña</label>
                        <div class="col-sm-5 input-group input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                            <input type="password" class="form-control" id="pass" name="pass" placeholder="Ingrese la contraseña" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="pass2">Confirma la contraseña</label>
                        <div class="col-sm-5 input-group input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                            <input type="password" class="form-control" id="pass2" name="pass2" placeholder="Confirme la contraseña" />
                        </div>
                    </div>
                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="ocultarMensajeEdit();" class="btn btn-secondary" data-dismiss="modal" >Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Modal agregar Admin-->
<div class="modal fade bd-example-modal-lg" id="addAdmin" tabindex="-1" role="dialog" aria-labelledby="addAdminlLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="addAdminF" method="post" class="form-horizontal">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><strong>Agragar administrador</strong></h4>
                    <button type="button" onclick="ocultarMensajeEdit(); cargarAdmin();" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">Por favor, rellene los campos debajo, revisando que estos <b>sean correctos y correspondan a sus datos reales</b>, ya que estos se usarán para realizar el reporte CACEI(aunque dispondrá de una sección para modificarlos, en caso de que cometa un error o necesite actualizarlos).<strong>Todos los campos son obligatorios</strong>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="userAdm">Código</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" id="userAdm" name="userAdm" placeholder="Ingrese el código de académico" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="nombreAdm">Nombre(s)</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" id="nombreAdm" name="nombreAdm" placeholder="Ingrese nombre(s) reales" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="appAdm">Apellido paterno</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" id="appAdm" name="appAdm" placeholder="Apellido paterno" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="apmAdm">Apellido materno</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" id="apmAdm" name="apmAdm" placeholder="Apellido materno" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="passAdm">contraseña</label>
                        <div class="col-sm-5 input-group input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                            <input type="password" class="form-control" id="passAdm" name="passAdm" placeholder="Ingrese la contraseña" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="pass2Adm">Confirma la contraseña</label>
                        <div class="col-sm-5 input-group input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                            <input type="password" class="form-control" id="pass2Adm" name="pass2Adm" placeholder="Confirme la contraseña" />
                        </div>
                    </div>
                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="ocultarMensajeEdit(); cargarAdmin();" class="btn btn-secondary" data-dismiss="modal" >Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
