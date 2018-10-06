        function mensajeAlerta(){
          mensajeEdit.removeClass("alert-info");
          mensajeEdit.addClass("alert-danger");
        }
        function mensajeInfo(){
          mensajeEdit.removeClass("alert-danger");
          mensajeEdit.addClass("alert-info");
        }
        //Guardamos el contenedor con la clase alert
        var mensajeEdit = $(".alert-dismissible");
        //Ocultamos el contenedor
        mensajeEdit.hide();

        //VALIDACION DEL FORMULARIO addAlumnoF
    $('#addAlumno').on('hide.bs.modal', function (event) {
       $("#otherMotivo").hide();    
  });
          $('#addAlumno').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Botón que activó el modal
            var modal = $(this)
            var idReporte = button.data('id')
            $("#idGuardado").val(idReporte)
            $("#addAlumnoF").validate({
                rules: {
                    nombre: {
                        required: true,
                        minlength: 10
                    },
                    codigoA: {
                      required: true,
                        minlength: 5,
                        digits: true
                    },
                    selectA: {
                        required: true
                    },
                    selectB: {
                        required: true
                    },
                    selectC: {
                        required: true
                    },
                    motivo: {
                      required: true  
                    },
                    comentario: {
                        required: true
                    }
                },
                messages: {
                    nombre: {
                        required: "Ingrese un nombre",
                        minlength: "Ingrese el nombre completo"
                    },
                      codigoA: {
                      required: "Ingrese el código del alumno",
                        minlength: "Ingrese más de cinco números",
                        digits: "Solo números"
                    },
                    selectA: {
                        required: "Seleccione una opción"
                    },
                    selectB: {
                        required: "Seleccione una opción"
                    },
                    selectC: {
                        required: "Seleccione una opción"
                    },
                    motivo: {
                        required: "Seleccione una categoria"
                    },
                    comentario: {
                        required: "Ingresa un comentario"
                    }
                },
                submitHandler: function (form) {
                  revisarCheck()
                    $.ajax({
                        url: "model/add_detalleReporte.php",
                        type: "POST",
                        dataType: "HTML",
                        data: "nombre=" + $("#nombre").val() + "&selectA=" + $("#selectA").val() +
                        "&selectB=" + $("#selectB").val() + "&selectC=" + $("#selectC").val() +
                        "&comentario=" + $("#comentario").val() + "&fk=" + $("#idGuardado").val() + "&motivo=" + ("#motivo").val()
                        + "&other=" + ("#otherM").val() +  "&codigo="  + ("#codigoA").val()
                        
                    }).done(function (echo) {
                      if (echo == "1") {
                        mensajeInfo()
                          mensajeEdit.html("El alumno ha sido agregado al reporte")
                          limpiarAlumno()
                          cargarDetalle( $("#idGuardado").val() )
                        }
                          else if(echo == '2'){
                            mensajeAlerta()
                            mensajeEdit.html("Alumno no agregado, al parecer no está en ninguna de las situaciones")
                          }
                          else if (echo != '1' && echo != '2'){
                            mensajeAlerta()
                              mensajeEdit.html("El alumno ya se encuentra registrado en el reporte")
                          }
                          mensajeEdit.slideDown(500)
                    });

                },
                errorElement: "em",
                errorPlacement: function (error, element) {
                    // Add the `help-block` class to the error element
                    error.addClass("help-block");

                    // Add `has-feedback` class to the parent div.form-group
                    // in order to add icons to inputs
                    element.parents(".col-sm-5").addClass("has-feedback");

                    if (element.prop("type") === "checkbox") {
                        error.insertAfter(element.parent("label"));
                    } else {
                        error.insertAfter(element);
                    }

                    // Add the span element, if doesn't exists, and materialy the icon classes to it.
                    if (!element.next("span")[0]) {
                        $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>").insertAfter(element);
                    }
                },
                success: function (label, element) {
                    // Add the span element, if doesn't exists, and materialy the icon classes to it.
                    if (!$(element).next("span")[0]) {
                        $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>").insertAfter($(element));
                    }
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
                    $(element).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
                    $(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
                }
            });
              mensajeEdit.hide();
          });

          //VALIDACION DEL FORMULARIO addReporteF
          $('#addReporte').on('show.bs.modal', function (event) {
            $("#addReporteF").validate({
                rules: {
                    materia: {
                        required: true
                    }
                },
                messages: {
                    materia: {
                        required: "Por favor, selecciona una materia"
                    }
                },
                submitHandler: function (form) {
                    $.ajax({
                        url: "model/add_reporte.php",
                        type: "POST",
                        dataType: "HTML",
                        data: "materia=" + $("#materia").val()

                    }).done(function (echo) {
                      if (echo == "1") {
                          mensajeInfo()
                          mensajeEdit.html("Su reporte se ha generado, puede agregar alumnos");
                          limpiarReporte()
                          cargar()
                      } else {
                          mensajeAlerta()
                          mensajeEdit.html("Hubo un error, asegúrese de haber seleccionado una materia o no tener un reporte con la materia que seleccionó");
                      }
                      mensajeEdit.slideDown(500);
                    });

                },
                errorElement: "em",
                errorPlacement: function (error, element) {
                    // Add the `help-block` class to the error element
                    error.addClass("help-block");

                    // Add `has-feedback` class to the parent div.form-group
                    // in order to add icons to inputs
                    element.parents(".col-sm-5").addClass("has-feedback");

                    if (element.prop("type") === "checkbox") {
                        error.insertAfter(element.parent("label"));
                    } else {
                        error.insertAfter(element);
                    }

                    // Add the span element, if doesn't exists, and materialy the icon classes to it.
                    if (!element.next("span")[0]) {
                        $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>").insertAfter(element);
                    }
                },
                success: function (label, element) {
                    // Add the span element, if doesn't exists, and materialy the icon classes to it.
                    if (!$(element).next("span")[0]) {
                        $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>").insertAfter($(element));
                    }
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
                    $(element).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
                    $(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
                }
            });
              mensajeEdit.hide();
          });

          //VALIDACION DEL FORMULARIO editAlumnoF
          $('#editAlumno').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Botón que activó el modal
            var modal = $(this)
            modal.find('.modal-body #nombreE').val(button.data('nombre'))
            modal.find('.modal-body #comentarioE').val(button.data('com'))
            modal.find('.modal-body #idGuardadoE').val(button.data('idreporte'))
            modal.find('.modal-body #idGuardadoAE').val(button.data('iddetalle'))
            $("#editAlumnoF").validate({
                rules: {
                    nombreE: {
                        required: true,
                        minlength: 10
                    },
                    selectAE: {
                        required: true
                    },
                    selectBE: {
                        required: true
                    },
                    selectCE: {
                        required: true
                    },
                    comentarioE: {
                        required: true
                    }
                },
                messages: {
                    nombreE: {
                        required: "Ingrese un nombre",
                        minlength: "Ingrese el nombre completo"
                    },
                    selectAE: {
                        required: "Seleccione una opción"
                    },
                    selectBE: {
                        required: "Seleccione una opción"
                    },
                    selectCE: {
                        required: "Seleccione una opción"
                    },
                    comentarioE: {
                        required: "Ingresa un comentario"
                    }
                },
                submitHandler: function (form) {
                  revisarCheckE()
                    $.ajax({
                        url: "model/edit_detalleReporte.php",
                        type: "POST",
                        dataType: "HTML",
                        data: "nombre=" + $("#nombreE").val() + "&selectA=" + $("#selectAE").val() +
                        "&selectB=" + $("#selectBE").val() + "&selectC=" + $("#selectCE").val() +
                        "&comentario=" + $("#comentarioE").val() + "&id=" + $("#idGuardadoAE").val()

                    }).done(function (echo) {
                      if (echo == '1') {
                        mensajeInfo()
                          mensajeEdit.html("El alumno ha sido editado en el reporte")
                          limpiarAlumnoE()
                          cargarDetalle( $("#idGuardadoE").val() )
                      }
                      else if(echo == '2'){
                        mensajeAlerta()
                        mensajeEdit.html("Alumno no editado, al parecer no está en ninguna de las situaciones")
                      }
                      else if (echo != '1' && echo != '2'){
                        mensajeAlerta()
                          mensajeEdit.html("El alumno ya se encuentra registrado en el reporte")
                      }
                      mensajeEdit.slideDown(500)
                    });

                },
                errorElement: "em",
                errorPlacement: function (error, element) {
                    // Add the `help-block` class to the error element
                    error.addClass("help-block");

                    // Add `has-feedback` class to the parent div.form-group
                    // in order to add icons to inputs
                    element.parents(".col-sm-5").addClass("has-feedback");

                    if (element.prop("type") === "checkbox") {
                        error.insertAfter(element.parent("label"));
                    } else {
                        error.insertAfter(element);
                    }

                    // Add the span element, if doesn't exists, and materialy the icon classes to it.
                    if (!element.next("span")[0]) {
                        $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>").insertAfter(element);
                    }
                },
                success: function (label, element) {
                    // Add the span element, if doesn't exists, and materialy the icon classes to it.
                    if (!$(element).next("span")[0]) {
                        $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>").insertAfter($(element));
                    }
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
                    $(element).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
                    $(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
                }
            });
              mensajeEdit.hide()
          });

// Validar formulario de editar reporte
//VALIDACION DEL FORMULARIO addReporteF
$('#editReporte').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Botón que activó el modal
  var modal = $(this)
  modal.find('.modal-body #materiaE').val(button.data('materia'))
  modal.find('.modal-body #seccionE').val(button.data('seccion'))
  modal.find('.modal-body #reporteEditar').val(button.data('idreporte'))
  $("#editReporteF").validate({
      rules: {

          materiaE: {
              required: true
          }
      },
      messages: {

          materiaE: {
              required: "Por favor, selecciona una materia"
          }
      },
      submitHandler: function (form) {
          $.ajax({
              url: "model/edit_reporte.php",
              type: "POST",
              dataType: "HTML",
              data: "materia=" + $("#materiaE").val() + "&id=" + $("#reporteEditar").val()

          }).done(function (echo) {
            if (echo == "1") {
                mensajeInfo()
                mensajeEdit.html("Su reporte se ha editado con éxito");
                limpiarReporteE()
                cargar()
                cargarDetalle( $("#reporteEditar").val() )
            } else {
              mensajeAlerta()
                mensajeEdit.html("Hubo un error, asegúrese de haber seleccionado una materia o no tener un reporte con la materia que seleccionó");

            }
            mensajeEdit.slideDown(500);
          });

      },
      errorElement: "em",
      errorPlacement: function (error, element) {
          // Add the `help-block` class to the error element
          error.addClass("help-block");

          // Add `has-feedback` class to the parent div.form-group
          // in order to add icons to inputs
          element.parents(".col-sm-5").addClass("has-feedback");

          if (element.prop("type") === "checkbox") {
              error.insertAfter(element.parent("label"));
          } else {
              error.insertAfter(element);
          }

          // Add the span element, if doesn't exists, and materialy the icon classes to it.
          if (!element.next("span")[0]) {
              $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>").insertAfter(element);
          }
      },
      success: function (label, element) {
          // Add the span element, if doesn't exists, and materialy the icon classes to it.
          if (!$(element).next("span")[0]) {
              $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>").insertAfter($(element));
          }
      },
      highlight: function (element, errorClass, validClass) {
          $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
          $(element).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");
      },
      unhighlight: function (element, errorClass, validClass) {
          $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
          $(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
      }
  });
    mensajeEdit.hide();
});
$('#editPass').on('show.bs.modal', function (event) {
                      var button = $(event.relatedTarget) // Botón que activó el modal
                      var modal = $(this)
                        $("#editPassF").validate({
                            rules: {
                                pass_new: {
                                    required: true,
                                    minlength: 8
                                },
                                pass2: {
                                    required: true,
                                    minlength: 8,
                                    equalTo: "#pass_new"
                                }
                            },
                            messages: {
                                pass_new: {
                                    required: "Ingrese la contraseña",
                                    minlength: "La contraseña consta de al menos 8 caracteres"
                                },
                                pass2: {
                                    required: "Debe de confirmar la contraseña",
                                    minlength: "La contraseña consta de al menos 8 caracteres",
                                    equalTo: "Las contraseñas no coiciden"
                                }
                            },
                            submitHandler: function (form) {
                                $.ajax({
                                    url: "../cacei/model/edits/password_edit.php",
                                    type: "POST",
                                    dataType: "HTML",
                                    data: "pass=" + $("#pass2").val() + "&id=" + $("#codigoPass").val()
                                }).done(function (echo) {
                                    if(echo == '1'){
                                      mensajeInfo()
                                      mensajeEdit.html("Su contraseña se ha modificado con éxito")
                                      limpiarPass()
                                    }else{
                                      mensajeAlerta()
                                      mensajeEdit.html(echo)
                                    }
                                    mensajeEdit.slideDown(500);
                                });

                            },
                            errorElement: "em",
                            errorPlacement: function (error, element) {
                                error.addClass("help-block");
                                element.parents(".col-sm-5").addClass("has-feedback");
                                if (element.prop("type") === "checkbox") {
                                    error.insertAfter(element.parent("label"));
                                } else {
                                    error.insertAfter(element);
                                }
                                if (!element.next("span")[0]) {
                                    $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>").insertAfter(element);
                                }
                            },
                            success: function (label, element) {
                                if (!$(element).next("span")[0]) {
                                    $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>").insertAfter($(element));
                                }
                            },
                            highlight: function (element, errorClass, validClass) {
                                $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
                                $(element).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");
                            },
                            unhighlight: function (element, errorClass, validClass) {
                                $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
                                $(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
                            }
                        });
                      });

function revisarCheck(){
  if( !$('#selectA').prop('checked')){
    $('#selectA').val(" ");
  }
  else{
    $('#selectA').val("A");
  }
  if( !$('#selectB').prop('checked')){
    $('#selectB').val(" ");
  }
  else{
    $('#selectB').val("B");
  }
  if( !$('#selectC').prop('checked')){
    $('#selectC').val(" ");
  }
  else{
    $('#selectC').val("C");
  }
}

function revisarCheckE(){
  if( !$('#selectAE').prop('checked')){
    $('#selectAE').val(" ");
  }
  else{
    $('#selectAE').val("A");
  }
  if( !$('#selectBE').prop('checked')){
    $('#selectBE').val(" ");
  }
  else{
    $('#selectBE').val("B");
  }
  if( !$('#selectCE').prop('checked')){
    $('#selectCE').val(" ");
  }
  else{
    $('#selectCE').val("C");
  }
}
function limpiarPass(){
    $("#pass_new").val("");
    $("#pass2").val("");
}
function cargarTablaS(comp){
  var idReporte = comp.id;
  $("#reportesContainer").load("view/detalle_table.php?id=" + idReporte)
}

function limpiarReporte()
{
  $("#materia").val("");
}

function limpiarReporteE()
{
  $("#materiaE").val("");
}
function limpiarAlumno()
{
  $("#nombre").val("");
  $("#selectA").prop('checked', false);
  $("#selectB").prop('checked', false);
  $("#selectC").prop('checked', false);
  $("#comentario").val("");
}
function limpiarAlumnoE()
{
  $("#nombreE").val("");
  $("#selectAE").prop('checked', false);
  $("#selectBE").prop('checked', false);
  $("#selectCE").prop('checked', false);
  $("#comentarioE").val("");
}

function cargarDetalle(idReporte){
    $("#reportesContainer").load("view/detalle_table.php?id=" + idReporte)
}

function cargar() {
   $('#sidenavD').load('view/dinamic_sidenav.php');
 }
