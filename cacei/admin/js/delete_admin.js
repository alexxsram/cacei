// Eliminar a un profesor
$('#deleteProfesor').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var modal = $(this)
    var titulo = $("#h2Profesor")
    var buttonD = $("#btnProfesorI")
    titulo.html("Se eliminara al profesor con el código: " + button.data('id'));
    $( "#deleteProfesorF" ).submit(function( event ) {
    			 $.ajax({
    					type: "POST",
    					url: "deletes/profesor_delete.php",
              dataType: "HTML",
    					data: "id=" + button.data('id')
    			}).done(function (echo){
            if(echo == '1'){
                mensajeEdit.html("El Profesor fue eliminado con éxito")
                buttonD.hide();
                $("#btnProfesorC").html("Cerrar")
                cargarProfesor()
            }else
              mensajeEdit.html(echo);

              mensajeEdit.slideDown(500);
          });
    		  event.preventDefault();
    		});
        buttonD.show();
        mensajeEdit.hide();
	});

///Eliminar administrador
$('#deleteAdministrador').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var modal = $(this)
    var titulo = $("#h2Administrador")
    var buttonD = $("#btnAdministradorI")
    titulo.html("Se eliminara al Administrador con el código: " + button.data('id'));
    $( "#deleteAdministradorF" ).submit(function( event ) {
    			 $.ajax({
    					type: "POST",
    					url: "deletes/admin_delete.php",
              dataType: "HTML",
    					data: "id=" + button.data('id')
    			}).done(function (echo){
            if(echo == '1'){
                mensajeEdit.html("El Administrador fue eliminado con éxito")
                buttonD.hide();
                $("#btnAdministradorC").html("Cerrar")

            }else
              mensajeEdit.html(echo);

              mensajeEdit.slideDown(500);
          });
          cargarAdmin()
    		  event.preventDefault();
    		});
        buttonD.show();
        mensajeEdit.hide();
	});
