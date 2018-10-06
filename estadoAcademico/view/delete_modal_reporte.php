<!--modal para la eliminacion de reporte-->
<div class="modal fade" id="deleteReporte" tabindex="-1" role="dialog" aria-labeledby="deleteReporteLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-white" id="reporteTitulo"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form id="deleteReporteF" method="POST">
        <div class="modal-body">

          <div class="form-group">
            <input class="form-control" type="hidden" id="idReporteDel" disabled/>
          </div>

          <p class="lead text-muted">
            Esta acción eliminará el reporte y su contenido.
            <br>¿Desea continuar?
          </p>

          <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCerrar"> <i class="fas fa-times"></i> Close</button>
          <button type="submit" class="btn btn-danger" id="btnAceptar"> <i class="fas fa-trash"></i> Aceptar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!--modal para la eliminacion de Alumno ACADMICA-->
<div class="modal fade bd-example-modal-lg" id="deleteAlumno" tabindex="-1" role="dialog" aria-labelledby="deleteAlumnoLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form id="deleteAlumnoF" method="post">
        <div class="modal-header">
            <button type="button"class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
</button>
        <h3 class="modal-title text-center" id="h2Alumno"></h3>
        </div>
          <div class="modal-body">
            <input  type="hidden" id="idAlumnoD"/>
              <input  type="hidden" id="idReporteD"/>
	  <p class="lead text-muted text-center" style="display: block;margin:10px">Esta acción retirará al alumno del reporte. ¿Desea continuar?</p>
    <div class="alert alert-danger alert-dismissible">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      </div>
                    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-lg btn-default" id="btnAlumnoC" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-lg btn-danger" id="btnAlumno">Aceptar</button>
      </div>
    </form>
    </div>
  </div>
</div>


