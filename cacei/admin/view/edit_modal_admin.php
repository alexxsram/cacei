<?php session_start() ?>
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
                    <input id="codigoPass" type="hidden" value= "<?php echo $_SESSION['admin']?>">
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="pass_new">Nueva contraseña</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                            <input type="password" class="form-control" id="pass_new" name="pass_new"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="pass_new2">Repita su nueva contraseña</label>
                        <div class="col-sm-5 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                            <input type="password" class="form-control" id="pass_new2" name="pass_new2"/>
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

<!--modal para la eliminacion de FORMACION ACADMICA-->
<div class="modal fade bd-example-modal-lg" id="restablecer" tabindex="-1" role="dialog" aria-labelledby="restablecerLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form id="restablecerF" method="post">
        <div class="modal-header">
            <button type="button"class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
</button>
        <h3 class="modal-title text-center" id="h2Formacion"></h3>
        </div>
          <div class="modal-body">
	  <p class="lead text-muted text-center" style="display: block;margin:10px">Esta acción restablecera su contraseña según su código. ¿Desea continuar?</p>
    <div class="alert alert-info alert-dismissible">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      </div>
                    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-lg btn-default" id="btnFormacionI"data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-lg btn-danger" id="btnFormacion">Aceptar</button>
      </div>
    </form>
    </div>
  </div>
</div>
