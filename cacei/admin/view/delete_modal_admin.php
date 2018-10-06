<!--modal para la eliminacion de Profesor -->
<div class="modal fade bd-example-modal-lg" id="deleteProfesor" tabindex="-1" role="dialog" aria-labelledby="deleteProfesorLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form id="deleteProfesorF" method="post">
        <div class="modal-header">
            <button type="button"class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
</button>
        <h3 class="modal-title text-center" id="h2Profesor"></h3>
        </div>
          <div class="modal-body">
	  <p class="lead text-muted text-center" style="display: block;margin:10px">Esta acción eliminará de forma permanente el registro. ¿Desea continuar?</p>
    <div class="alert alert-info alert-dismissible">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      </div>
                    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-lg btn-default" id="btnProfesorC"data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-lg btn-danger" id="btnProfesorI">Aceptar</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!--modal para la eliminacion de un Administrador-->
<div class="modal fade bd-example-modal-lg" id="deleteAdministrador" tabindex="-1" role="dialog" aria-labelledby="deleteAdministradorLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form id="deleteAdministradorF" method="post">
        <div class="modal-header">
            <button type="button" class="close" onclick="cargarAdmin();" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
</button>
        <h3 class="modal-title text-center" id="h2Administrador"></h3>
        </div>
          <div class="modal-body">
	  <p class="lead text-muted text-center" style="display: block;margin:10px">Esta acción eliminará de forma permanente el registro. ¿Desea continuar?</p>
    <div class="alert alert-info alert-dismissible">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      </div>
                    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-lg btn-default" id="btnAdministradorC"data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-lg btn-danger" id="btnAdministradorI">Aceptar</button>
      </div>
    </form>
    </div>
  </div>
</div>
