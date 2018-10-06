//Guardamos el contenedor con la clase alert
var mensajeDelete = $(".alert-danger");
//Ocultamos el contenedor
mensajeDelete.hide();

  $('#deleteProducto').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var modal = $(this)
    var titulo = $("#h2Producto")
    var buttonD = $("#btnProducto")
    titulo.html("Se eliminara el producto: " + button.data('title'));
    $( "#deleteProductoF" ).submit(function( event ) {
    			 $.ajax({
    					type: "POST",
    					url: "model/deletes/producto_delete.php",
              dataType: "HTML",
    					data: "id=" + button.data('id')
    			}).done(function (echo){
            if(echo == '1'){
                mensajeDelete.html("El producto académico fue eliminado con éxito")
                buttonD.hide();
                $("#btnProductoC").html("Cerrar")
                cargarProducto()
            }else
              mensajeDelete.html(echo);

              mensajeDelete.slideDown(500);
          });
    		  event.preventDefault();
    		});
	});

  $('#deleteFormacion').on('show.bs.modal', function (event) {
    mensajeDelete.hide()
    var buttonD = $("#btnFormacion")
    var buttonI = $("#btnFormacionI")
    buttonD.show()
    buttonI.html("Cancelar")
    var button = $(event.relatedTarget)
    var modal = $(this)
    var titulo = $("#h2Formacion")
    titulo.html("Formación académica con nombre: " + button.data('nombre'));
    $( "#deleteFormacionF" ).submit(function( event ) {
           $.ajax({
              type: "POST",
              url: "model/deletes/formacion_delete.php",
              dataType: "HTML",
              data: "id=" + button.data('id')
          }).done(function (echo){
            if(echo == '1'){
                mensajeDelete.html("La formación académica fue eliminada con éxito")
                buttonD.hide()
                buttonI.html("Cerrar")
                cargarFormacion()
            }else
              mensajeDelete.html(echo)
              mensajeDelete.slideDown(500)
          });
          event.preventDefault();
        });
  });

  $('#deleteGestion').on('show.bs.modal', function (event) {
    mensajeDelete.hide()
    var buttonD = $("#btnGestion")
    var buttonI = $("#btnGestionI")
    buttonD.show()
    buttonI.html("Cancelar")
    var button = $(event.relatedTarget)
    var modal = $(this)
    var titulo = $("#h2Gestion")
    titulo.html("Gestión académica: " + button.data('act'));
    $( "#deleteGestionF" ).submit(function( event ) {
           $.ajax({
              type: "POST",
              url: "model/deletes/gestion_delete.php",
              dataType: "HTML",
              data: "id=" + button.data('id')
          }).done(function (echo){
            if(echo == '1'){
                mensajeDelete.html("La gestión académica fue eliminada con éxito")
                buttonD.hide()
                buttonI.html("Cerrar")
                cargarGestion()
            }else
              mensajeDelete.html(echo)
              mensajeDelete.slideDown(500)
          });
          event.preventDefault();
        });
  });

  $('#deleteCapacitacion').on('show.bs.modal', function (event) {
    mensajeDelete.hide()
    var buttonD = $("#btnCapacitacion")
    var buttonI = $("#btnCapacitacionI")
    buttonD.show()
    buttonI.html("Cancelar")
    var button = $(event.relatedTarget)
    var modal = $(this)
    var titulo = $("#h2Capacitacion")
    titulo.html("Capacitación docente con el tipo: " + button.data('tipo'));
    $( "#deleteCapacitacionF" ).submit(function( event ) {
           $.ajax({
              type: "POST",
              url: "model/deletes/capacitacion_delete.php",
              dataType: "HTML",
              data: "id=" + button.data('id')
          }).done(function (echo){
            if(echo == '1'){
                mensajeDelete.html("La capacitación docente fue eliminada con éxito")
                buttonD.hide()
                buttonI.html("Cerrar")
                cargarCapacitacion()
            }else
              mensajeDelete.html(echo)
              mensajeDelete.slideDown(500)
          });
          event.preventDefault();
        });
  });

  $('#deleteActualiz').on('show.bs.modal', function (event) {
    mensajeDelete.hide()
    var buttonD = $("#btnActualiz")
    var buttonI = $("#btnActualizI")
    buttonD.show()
    buttonI.html("Cancelar")
    var button = $(event.relatedTarget)
    var modal = $(this)
    var titulo = $("#h2Actualiz")
    titulo.html("Actualización docente en la institución: " + button.data('inst'));
    $( "#deleteActualizF" ).submit(function( event ) {
           $.ajax({
              type: "POST",
              url: "model/deletes/actualizacion_delete.php",
              dataType: "HTML",
              data: "id=" + button.data('id')
          }).done(function (echo){
            if(echo == '1'){
                mensajeDelete.html("La actualización docente fue eliminada con éxito")
                buttonD.hide()
                buttonI.html("Cerrar")
                cargarActualizacion()
            }else
              mensajeDelete.html(echo)
              mensajeDelete.slideDown(500)
          });
          event.preventDefault();
        });
  });

  $('#deleteExpP').on('show.bs.modal', function (event) {
    mensajeDelete.hide()
    var buttonD = $("#btnExpP")
    var buttonI = $("#btnExpPI")
    buttonD.show()
    buttonI.html("Cancelar")
    var button = $(event.relatedTarget)
    var modal = $(this)
    var titulo = $("#h2ExpP")
    titulo.html("Experiencia profesional con el puesto o actividad: " + button.data('actividad'));
    $( "#deleteExpPF" ).submit(function( event ) {
           $.ajax({
              type: "POST",
              url: "model/deletes/experienciaP_delete.php",
              dataType: "HTML",
              data: "id=" + button.data('id')
          }).done(function (echo){
            if(echo == '1'){
                mensajeDelete.html("La experiencia profesional fue eliminada con éxito")
                buttonD.hide()
                buttonI.html("Cerrar")
                cargarExpP()
            }else
              mensajeDelete.html(echo)
              mensajeDelete.slideDown(500)
          });
          event.preventDefault();
        });
  });

  $('#deleteExpD').on('show.bs.modal', function (event) {
    mensajeDelete.hide()
    var buttonD = $("#btnExpD")
    var buttonI = $("#btnExpDI")
    buttonD.show()
    buttonI.html("Cancelar")
    var button = $(event.relatedTarget)
    var modal = $(this)
    var titulo = $("#h2ExpD")
    titulo.html("Experiencia en diseño ingenieril con el puesto o actividad: " + button.data('organ'));
    $( "#deleteExpDF" ).submit(function( event ) {
           $.ajax({
              type: "POST",
              url: "model/deletes/experienciaD_delete.php",
              dataType: "HTML",
              data: "id=" + button.data('id')
          }).done(function (echo){
            if(echo == '1'){
                mensajeDelete.html("La Experiencia en diseño ingenieril fue eliminada con éxito")
                buttonD.hide()
                buttonI.html("Cerrar")
                cargarExpD()
            }else
              mensajeDelete.html(echo)
              mensajeDelete.slideDown(500)
          });
          event.preventDefault();
        });
  });

  $('#deleteLogro').on('show.bs.modal', function (event) {
    mensajeDelete.hide()
    var buttonD = $("#btnLogro")
    var buttonI = $("#btnLogroI")
    buttonD.show()
    buttonI.html("Cancelar")
    var button = $(event.relatedTarget)
    var modal = $(this)
    var titulo = $("#h2Logro")
    titulo.html("El logro profesional con el #: " + button.data('num'))
    $( "#deleteLogroF" ).submit(function( event ) {
           $.ajax({
              type: "POST",
              url: "model/deletes/logro_delete.php",
              dataType: "HTML",
              data: "id=" + button.data('id')
          }).done(function (echo){
            if(echo == '1'){
                mensajeDelete.html("El logro profesional fue eliminado con éxito")
                buttonD.hide()
                buttonI.html("Cerrar")
                cargarLogro()
            }else
              mensajeDelete.html(echo)
              mensajeDelete.slideDown(500)
          });
          event.preventDefault();
        });
  });

  $('#deleteMembresia').on('show.bs.modal', function (event) {
    mensajeDelete.hide()
    var buttonD = $("#btnMembresia")
    var buttonI = $("#btnMembresiaI")
    buttonD.show()
    buttonI.html("Cancelar")
    var button = $(event.relatedTarget)
    var modal = $(this)
    var titulo = $("#h2Membresia")
    titulo.html("La membresía o participación con el actual #: " + button.data('num'))
    $( "#deleteMembresiaF" ).submit(function( event ) {
           $.ajax({
              type: "POST",
              url: "model/deletes/membresia_delete.php",
              dataType: "HTML",
              data: "id=" + button.data('id')
          }).done(function (echo){
            if(echo == '1'){
                mensajeDelete.html("La membresía o participación fue eliminada con éxito")
                buttonD.hide()
                buttonI.html("Cerrar")
                cargarMembresia()
            }else
              mensajeDelete.html(echo)
              mensajeDelete.slideDown(500)
          });
          event.preventDefault();
        });
  });

  $('#deletePremio').on('show.bs.modal', function (event) {
    mensajeDelete.hide()
    var buttonD = $("#btnPremio")
    var buttonI = $("#btnPremioI")
    buttonD.show()
    buttonI.html("Cancelar")
    var button = $(event.relatedTarget)
    var modal = $(this)
    var titulo = $("#h2Premio")
    titulo.html("Premio, distincion o reconocimiento con el actual #: " + button.data('num'))
    $( "#deletePremioF" ).submit(function( event ) {
           $.ajax({
              type: "POST",
              url: "model/deletes/premio_delete.php",
              dataType: "HTML",
              data: "id=" + button.data('id')
          }).done(function (echo){
            if(echo == '1'){
                mensajeDelete.html("El premio, distincion o reconocimiento fue eliminado con éxito")
                buttonD.hide()
                buttonI.html("Cerrar")
                cargarPremio()
            }else
              mensajeDelete.html(echo)
              mensajeDelete.slideDown(500)
          });
          event.preventDefault();
        });
  });
