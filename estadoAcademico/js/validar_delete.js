$('#deleteAlumno').on('show.bs.modal', function (event) {
  // mensajeEdit.hide()
  var button = $(event.relatedTarget)
  var modal = $(this)
  var titulo = $("#h2Alumno")
  var buttonD = $("#btnAlumno")
    buttonD.show()
    titulo.html("Se eliminara el Alumno: " + button.data('title'));
    var idReporte = button.data('idreporte')
    var idDetalle = button.data('iddetalle')
    $("#idAlumnoD").val(idDetalle)
    $("#idReporteD").val(idReporte)

    $( "#deleteAlumnoF" ).submit(function( event ) {
    			 $.ajax({
    					type: "POST",
    					url: "model/delete_detalleReporte.php",
              dataType: "HTML",
    					data: "id=" + $("#idAlumnoD").val()
    			}).done(function (echo){
            if(echo == '1'){
              mensajeInfo()
                mensajeEdit.html("El alumno fue retirado del reporte con éxito")
                buttonD.hide();
                $("#btnAlumnoC").html("Cerrar")
                cargarDetalle( $("#idReporteD").val() )
            }else{
              mensajeAlerta()
              mensajeEdit.html("Alumno no eliminado");
            }
              mensajeEdit.slideDown(500)
          });
    		  event.preventDefault()
    		});
	});

$('#deleteReporte').on('show.bs.modal', function(event) {
  mensajeEdit.hide()
  var button = $(event.relatedTarget)
  var modal = $(this)
  var reporteTitulo = $("#reporteTitulo")
  reporteTitulo.html("Se eliminará el reporte: " + button.data('title'))
  var buttonD = $("#btnAceptar")
  buttonD.show()
  $("#idReporteDel").val(button.data("idreporte"))
  $("#deleteReporteF").submit(function(event) {
    $.ajax({
      type: "POST",
      url: "model/delete_reporte.php",
      dataType: "HTML",
      data: "id_reporte=" + $("#idReporteDel").val()
    }).done(function(echo) {
      if(echo == '1') {
        mensajeInfo()
        mensajeEdit.html("El reporte fue eliminado con éxito")
        buttonD.hide()
        $("#btnCerrar").html("Cerrar")
        cargar()
        mensajeEliminado()
      } else {
        mensajeAlerta()
        mensajeEdit.html("El reporte no pudo ser eliminado");
      }
      mensajeEdit.slideDown(500);
    });
    event.preventDefault()
  });
});

function mensajeEliminado() {
  $("#reportesContainer").load("view/eliminado_view.php");
}
