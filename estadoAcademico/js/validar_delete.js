$('#deleteAlumno').on('show.bs.modal', function(event) {
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

    $( "#deleteAlumnoF" ).submit( function(event) {
        $.ajax( {
            type: "POST",
            url: "model/delete_detalleReporte.php",
            dataType: "HTML",
            data: "id=" + $("#idAlumnoD").val()
        }).done(function(echo) {
            if(echo == '1') {
                mensajeInfo()
                mensajeEdit.html("El alumno fue retirado del reporte con éxito")
                buttonD.hide();
                $("#btnAlumnoC").html("Cerrar")
                cargarDetalle( $("#idReporteD").val() )
            } else {
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
    $.ajax( {
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

$('#deleteDiaAsistencia').on('show.bs.modal', function(event) {
    mensajeEdit.hide()
    var button = $(event.relatedTarget)
    var modal = $(this)
    var reporteTitulo = $("#tituloDiaAsistencia")
    reporteTitulo.html("Se eliminará el día de asistencia: " + button.data('fecha'))
    var buttonD = $("#btnAceptar")
    buttonD.show()
    $("#idReporteAsDel").val(button.data("idreporte"))
    $("#numeroAsDel").val(button.data("iddia"))
    $("#deleteDiaAsistenciaF").submit(function(event) {
        $.ajax( {
            type: "POST",
            url: "model/delete_diaAsistencia.php",
            dataType: "HTML",
            data: "id_dia=" + $("#numeroAsDel").val()
        }).done(function(echo) {
            if(echo == '1') {
                mensajeInfo()
                mensajeEdit.html("El día de asistencia fue eliminado con éxito")
                buttonD.hide()
                $("#btnCerrar").html("Cerrar")
                cargarDetalle( $("#idReporteAsDel").val() )
            } else {
                mensajeAlerta()
                mensajeEdit.html("El día de asistencia no pudo ser eliminado");
            }
            mensajeEdit.slideDown(500);
        });
        event.preventDefault()
    });
});

$('#deleteActividad').on('show.bs.modal', function(event) {
    mensajeEdit.hide()
    var button = $(event.relatedTarget)
    var modal = $(this)
    var reporteTitulo = $("#tituloActividad")
    reporteTitulo.html("Se eliminará la actividad: " + button.data('nombre'))
    var buttonD = $("#btnAceptar")
    buttonD.show()
    $("#idReporteAcDel").val(button.data("idreporte"))
    $("#numeroAcDel").val(button.data("idactividad"))
    $("#deleteActividadF").submit(function(event) {
        $.ajax( {
            type: "POST",
            url: "model/delete_Actividad.php",
            dataType: "HTML",
            data: "id_actividad=" + $("#numeroAcDel").val()
        }).done(function(echo) {
            if(echo == '1') {
                mensajeInfo()
                mensajeEdit.html("La actividad fue eliminada con éxito")
                buttonD.hide()
                $("#btnCerrar").html("Cerrar")
                cargarDetalle( $("#idReporteAcDel").val() )
            } else {
                mensajeAlerta()
                mensajeEdit.html("La actividad no pudo ser eliminada");
            }
            mensajeEdit.slideDown(500);
        });
        event.preventDefault()
    });
});

$('#deleteExamen').on('show.bs.modal', function(event) {
    mensajeEdit.hide()
    var button = $(event.relatedTarget)
    var modal = $(this)
    var reporteTitulo = $("#tituloExamen")
    reporteTitulo.html("Se eliminará el examen: " + button.data('nombre'))
    var buttonD = $("#btnAceptar")
    buttonD.show()
    $("#idReporteExDel").val(button.data("idreporte"))
    $("#numeroExDel").val(button.data("idexamen"))
    $("#deleteExamenF").submit(function(event) {
        $.ajax( {
            type: "POST",
            url: "model/delete_Examen.php",
            dataType: "HTML",
            data: "id_examen=" + $("#numeroExDel").val()
        }).done(function(echo) {
            if(echo == '1') {
                mensajeInfo()
                mensajeEdit.html("El examen fue eliminado con éxito")
                buttonD.hide()
                $("#btnCerrar").html("Cerrar")
                cargarDetalle( $("#idReporteExDel").val() )
            } else {
                mensajeAlerta()
                mensajeEdit.html("El examen no pudo ser eliminado");
            }
            mensajeEdit.slideDown(500);
        });
        event.preventDefault()
    });
});

function mensajeEliminado() {
  $("#reportesContainer").load("view/eliminado_view.php");
}
