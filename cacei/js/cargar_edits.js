        //Guardamos el contenedor con la clase alert
        var mensajeEdit = $(".alert-info");
        //Ocultamos el contenedor
        mensajeEdit.hide();
          $('#addDatos').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Botón que activó el modal
            var modal = $(this)
            modal.find('.modal-body #nombre').val(button.data('nombre'))
            modal.find('.modal-body #app').val(button.data('ap'))
            modal.find('.modal-body #apm').val(button.data('am'))
            modal.find('.modal-body #fechaDa').val(button.data('fecha'))
              modal.find('.modal-body #puesto').val(button.data('puesto'))
            modal.find('.modal-body #codigo').val(button.data('id'))

            $("#addDatosF").validate({
                rules: {
                    nombre: {
                        required: true,
                        minlength: 2,
                        maxlength: 255
                    },
                    app: {
                        required: true,
                        minlength: 2,
                        maxlength: 255
                    },
                    apm: {
                        required: true,
                        minlength: 2,
                        maxlength: 255
                    },
                    puesto: {
                        required: true
                    },
                    codigo: {
                        required: true,
                        digits: true
                    },
                    fechaDa: {
                        required: true
                    }
                },
                messages: {
                    nombre: {
                        required: "Por favor, ingresa tu nombre",
                        minlength: "Su nombre debe constar de al menos 2 caracteres",
                        maxlength: "Ha sobrepasado el número máximo de caracteres "
                    },
                    app: {
                        required: "Por favor, ingrese su apellido paterno",
                        minlength: "Su epeliido paterno debe constar de al menos 2 caracteres",
                        maxlength: "Ha sobrepasado el número máximo de caracteres "
                    },
                    apm: {
                        required: "Por favor, ingrese su apellido materno",
                        minlength: "Su apellido materno nombre debe constar de al menos 2 caracteres",
                        maxlength: "Ha sobrepasado el número máximo de caracteres "
                    },
                    puesto: {
                        required: "Por favor, ingrese su puesto en la institución"
                    },
                    codigo: {
                        required: "Por favor, ingrese su código en la institución",
                        digits: "Solo se permiten números"
                    },
                    fechaDa: {
                        required: "Ingrese su fecha de nacimiento"
                    }

                },
                submitHandler: function (form) {
                    $.ajax({
                        url: "model/edits/datosPersonales_edit.php",
                        type: "POST",
                        dataType: "HTML",
                        data: "nombre=" + $("#nombre").val() + "&app=" + $("#app").val() + "&apm=" + $("#apm").val() + "&puesto=" + $("#puesto").val()
                        + "&codigo=" + $("#codigo").val() + "&fecha=" + $("#fechaDa").val() + "&puesto=" + $("#puesto").val()
                    }).done(function (echo) {
                      if (echo == "1") {
                          mensajeEdit.html("sus datos personales fueron editados con éxito");
                          cargarDatosPersonales()
                      } else {
                          mensajeEdit.html(echo);
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

                    // Add the span element, if doesn't exists, and apply the icon classes to it.
                    if (!element.next("span")[0]) {
                        $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>").insertAfter(element);
                    }
                },
                success: function (label, element) {
                    // Add the span element, if doesn't exists, and apply the icon classes to it.
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

        $('#editFormacion').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Botón que activó el modal
            var nombre = button.data('nombre') // Extraer la información de atributos de datos
            var nivel = button.data('nivel')
            var year = button.data('year')
            var inst = button.data('inst')
            var cedula = button.data('cedula')
            var pais = button.data('pais')
            var idf = button.data('idf');
            var modal = $(this)
            modal.find('.modal-body #nivelE').val(nivel)
            modal.find('.modal-body #yearE').val(year)
            modal.find('.modal-body #instE').val(inst)
            modal.find('.modal-body #cedulaE').val(cedula)
            modal.find('.modal-body #countryE').val(pais)
            modal.find('.modal-body #nombrefoE').val(nombre)
            modal.find('.modal-body #id_formacionE').val(idf)

            ///VALIDANDO FORMULARIO DE ADD FORMACION ACADMICA
            $("#editFormacionF").validate({
                rules: {
                    nombrefoE: {
                        required: true,
                        minlength: 5,
                        maxlength: 255
                    },
                    instE: {
                        required: true,
                        minlength: 5,
                        maxlength: 255
                    },
                    yearE: {
                        required: true
                    },
                    cedulaE: {
                        required: true
                    },
                    levelE: {
                        required: true
                    },
                    countryE: {
                        required: true,
                        minlength: 4
                    }
                },
                messages: {
                    nombrefoE: {
                        required: "Por favor, ingrese el nombre ",
                        minlength: "El nombre debe constar de al menos 5 caracteres",
                        maxlength: "Ha sobrepasado el número máximo de caracteres "
                    },
                    instE: {
                        required: "Por favor, ingrese el nombre de la institución",
                        minlength: "Debe constar de al menos 5 caracteres",
                        maxlength: "Ha sobrepasado el número máximo de caracteres "
                    },
                    yearE: {
                        required: "Por favor, seleecione un año"
                    },
                    cedulaE: {
                        required: "Por favor, ingrese la cédula"
                    },
                    levelE: {
                        required: "Por favor, seleccione el nivel"
                    },
                    countryE: {
                        required: "Por favor, ingrese el país",
                        minlength: "Debe de constar de al menos 4 caracteres"
                    }
                },
                submitHandler: function (form) {
                    var nombre = $("#nombrefoE").val();
                    var inst = $("#instE").val();
                    var pais = $("#countryE").val();
                    var year = $("#yearE").val();
                    var ced = $("#cedulaE").val();
                    var niv = $("#levelE").val();
                    $.ajax({
                        url: "model/edits/formacion_edit.php",
                        type: "POST",
                        dataType: "HTML",
                        data: "nom=" + nombre + "&inst=" + inst + "&pais=" + pais + "&year=" + year + "&ced=" + ced + "&nivel=" + niv + "&id=" + $("#id_formacionE").val()
                    }).done(function (echo) {
                        if (echo == '1') {
                            mensajeEdit.html("Su formación academica fue editada con éxito");
                            cargarFormacion();
                        } else
                            mensajeEdit.html(echo);
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

        $('#editGestion').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Botón que activó el modal
            var modal = $(this)
            var fechaI = button.data("fechai");
            var fechaF = button.data("fechaf");
            modal.find('.modal-body #actividad_gE').val(button.data('act'))
            modal.find('.modal-body #inst_gE').val(button.data('inst'))
            modal.find('.modal-body #de_gE').val(fechaI)
            modal.find('.modal-body #hasta_gE').val(fechaF)
            modal.find('.modal-body #id_gE').val(button.data('id'))

            /*** VALIDACION DE GESTION ACADEMICA */
            $("#editGestionF").validate({
                rules: {
                    actividad_gE: {
                        required: true,
                        minlength: 5,
                        maxlength: 255
                    },
                    inst_gE: {
                        required: true,
                        minlength: 5,
                        maxlength: 255
                    },
                    de_gE: {
                        required: true
                    },
                    hasta_gE: {
                        required: true
                    }
                },
                messages: {
                    actividad_gE: {
                        required: "Por favor, ingrese el nombre de la actividad o puesto ",
                        minlength: "El nombre debe constar de al menos 5 caracteres",
                        maxlength: "Ha sobrepasado el número máximo de caracteres "
                    },
                    inst_gE: {
                        required: "Por favor, ingrese el nombre de la institución",
                        minlength: "Debe constar de al menos 5 caracteres",
                        maxlength: "Ha sobrepasado el número máximo de caracteres "
                    },
                    de_gE: {
                        required: "Por favor, seleecione una fecha",
                    },
                    hasta_gE: {
                        required: "Por favor, selecciones una fecha",
                    }
                },
                submitHandler: function (form) {
                    $.ajax({
                        url: "model/edits/gestion_edit.php",
                        type: "POST",
                        dataType: "HTML",
                        data: "act=" + $("#actividad_gE").val() + "&inst=" + $("#inst_gE").val() + "&de=" + $("#de_gE").val() + "&hasta=" + $("#hasta_gE").val() + "&id=" + $("#id_gE").val()
                    }).done(function (echo) {

                        if (echo == "1") {
                            mensajeAdd.html("La gestión académica fue editada con éxito");
                        } else {
                            mensajeAdd.html(echo);
                        }
                        mensajeAdd.slideDown(500);
                        cargarGestion();
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

        $('#editProducto').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var modal = $(this)
            modal.find('.modal-body #titulo_pE').val(button.data('titulo'))
            modal.find('.modal-body #autor_pE').val(button.data('autor'))
            modal.find('.modal-body #lugar_pE').val(button.data('lugar'))
            modal.find('.modal-body #fecha_pE').val(button.data('fecha'))
            modal.find('.modal-body #tipo_pE').val(button.data('tipo'))
            modal.find('.modal-body #numero_pE').val(button.data('num'))
            modal.find('.modal-body #alcance_pE').val(button.data('alcance'))
            modal.find('.modal-body #info_pE').val(button.data('descripcion'))
            modal.find('.modal-body #id_pE').val(button.data('id'))

            ///VALIDANDO FORMULARIO addProductoF
            $("#editProdF").validate({
                rules: {
                    titulo_pE: {
                        required: true
                    },
                    autor_pE: {
                        required: true
                    },
                    lugar_pE: {
                        required: true
                    },
                    fecha_pE: {
                        required: true
                    },
                    tipo_pE: {
                        required: true
                    },
                    numero_pE: {
                        required: true,
                        digits: true
                    },
                    alcance_pE: {
                        required: true
                    },
                    info_pE: {
                        required: true
                    }
                },
                messages: {
                    titulo_pE: {
                        required: "Ingresa el titulo de su producto académico"
                    },
                    autor_pE: {
                        required: "Ingrese el autor de su producto académico"
                    },
                    lugar_pE: {
                        required: "Ingrese donde se creo su producto académico"
                    },
                    fecha_pE: {
                        required: "Ingrese la fecha"
                    },
                    tipo_pE: {
                        required: "Ingrese el tipo"
                    },
                    numero_pE: {
                        required: "Ingrese el número de registro",
                        digits: "Solo ingrese caracteres numericos"
                    },
                    alcance_pE: {
                        required: "Ingrese el alcance del producto"
                    },
                    info_pE: {
                        required: "Ingrese información extra, pero relevante"
                    }
                },
                submitHandler: function (form) {
                    $.ajax({
                        url: "model/edits/producto_edit.php",
                        type: "POST",
                        dataType: "HTML",
                        data: "titulo_p=" + $("#titulo_pE").val() + "&autor_p=" + $('#autor_pE').val() + "&lugar_p=" + $("#lugar_pE").val() + "&fecha_p=" + $("#fecha_pE").val() + "&tipo_p=" + $("#tipo_pE").val() + "&numero_p=" + $("#numero_pE").val() +
                        "&alcance_p=" + $("#alcance_pE").val() + "&info_p=" + $("#info_pE").val() + "&id=" + $("#id_pE").val(),
                        success: function (echo) {
                            //Cuando recibamos respuesta, la mostramos
                            if (echo == "1") {
                                mensajeEdit.html("Su producto académico fue editado con éxito");
                                cargarProducto();
                            } else {
                                mensajeEdit.html(echo);
                            }
                            mensajeEdit.slideDown(500);
                        }
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

        $('#editCapac').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var modal = $(this)
            modal.find('.modal-body #tipo_cE').val(button.data('tipoc'))
            modal.find('.modal-body #inst_cE').val(button.data('inst'))
            modal.find('.modal-body #pais_cE').val(button.data('pais'))
            modal.find('.modal-body #year_cE').val(button.data('year'))
            modal.find('.modal-body #hora_cE').val(button.data('hora'))
            modal.find('.modal-body #id_cE').val(button.data('id'))
            $("#editCapacF").validate({
                rules: {
                    tipo_cE: {
                        required: true
                    },
                    inst_cE: {
                        required: true
                    },
                    pais_cE: {
                        required: true
                    },
                    year_cE: {
                        required: true,
                        digits: true
                    },
                    hora_cE: {
                        required: true,
                        digits: true
                    }
                },
                messages: {
                    tipo_cE: {
                        required: "Ingresa el tipo de su capacitación"
                    },
                    inst_cE: {
                        required: "Ingrese la institución"
                    },
                    pais_cE: {
                        required: "Ingrese el país"
                    },
                    year_cE: {
                        required: "Seleccione un año",
                        digits: "Solo números"
                    },
                    hora_cE: {
                        required: "Ingrese el número de horas",
                        digits: "Solo números"
                    }
                },
                submitHandler: function (form) {
                    $.ajax({
                        url: "model/edits/capacitacion_edit.php",
                        type: "POST",
                        dataType: "HTML",
                        data: "tipo=" + $("#tipo_cE").val() + "&inst=" + $("#inst_cE").val() + "&pais=" + $("#pais_cE").val() + "&year=" + $("#year_cE").val() + "&id=" + $("#id_cE").val() + "&hora=" + $("#hora_cE").val()
                    }).done(function (echo) {
                        //Cuando recibamos respuesta, la mostramos
                        if (echo == '1') {
                            mensajeEdit.html("Su capacitación fue editada con éxito");
                            cargarCapacitacion();
                        } else
                            mensajeEdit.html(echo);
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

        $('#editActualizacion').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var modal = $(this)
            modal.find('.modal-body #tipo_aE').val(button.data('tipo'))
            modal.find('.modal-body #inst_aE').val(button.data('inst'))
            modal.find('.modal-body #pais_aE').val(button.data('pais'))
            modal.find('.modal-body #year_aE').val(button.data('year'))
            modal.find('.modal-body #hora_aE').val(button.data('hora'))
            modal.find('.modal-body #id_aE').val(button.data('id'))

            ///VALIDANDO FORMULARIO addActualizacionF (se encuentra edit_modals.php)
            $("#editActualizacionF").validate({
                rules: {
                    tipo_aE: {
                        required: true
                    },
                    inst_aE: {
                        required: true
                    },
                    pais_aE: {
                        required: true
                    },
                    year_aE: {
                        required: true,
                        digits: true
                    },
                    hora_aE: {
                        required: true,
                        digits: true
                    }
                },
                messages: {
                    tipo_aE: {
                        required: "Ingresa el tipo de su actualización disciplinar"
                    },
                    inst_aE: {
                        required: "Ingrese la institución"
                    },
                    pais_aE: {
                        required: "Ingrese el país"
                    },
                    year_aE: {
                        required: "Seleccione un año",
                        digits: "Solo números"
                    },
                    hora_aE: {
                        required: "Ingrese el número de horas",
                        digits: "Solo números"
                    }
                },
                submitHandler: function (form) {
                    $.ajax({
                        url: "model/edits/actualizacion_edit.php",
                        type: "POST",
                        dataType: "HTML",
                        data: "tipo=" + $("#tipo_aE").val() + "&inst=" + $("#inst_aE").val() + "&pais=" + $("#pais_aE").val() + "&year=" + $("#year_aE").val() + "&hora=" + $("#hora_aE").val() +
                        "&id=" + $("#id_aE").val()
                    }).done(function (echo) {
                        if (echo == '1') {
                            mensajeEdit.html("Su actualización doecente fue editada con éxito");
                            cargarActualizacion();
                        } else
                            mensajeEdit.html(echo);
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

          $('#editExperienciaP').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget) // Botón que activó el modal
              var modal = $(this)
              modal.find('.modal-body #act_eE').val(button.data('actividad'))
              modal.find('.modal-body #empresa_eE').val(button.data('organ'))
              modal.find('.modal-body #de_eE').val(button.data('fechai'))
              modal.find('.modal-body #hasta_eE').val(button.data('fechaf'))
              modal.find('.modal-body #id_eE').val(button.data('id'))
              ///VALIDANDO FORMULARIO editExperienciaPF (se encuentra edit_modals.php)
              $("#editExperienciaPF").validate({
                  rules: {
                      act_eE: {
                          required: true
                      },
                      empresa_eE: {
                          required: true
                      },
                      de_eE: {
                          required: true
                      },
                      hasta_eE: {
                          required: true
                      }
                  },
                  messages: {
                      act_eE: {
                          required: "Ingrese el nombre de la actividad"
                      },
                      empresa_eE: {
                          required: "Ingrese la organización o la empresa"
                      },
                      de_eE: {
                          required: "Seleccione la fecha de inicio"
                      },
                      hasta_eE: {
                          required: "Seleccione la fecha de fin"
                      }
                  },
                  submitHandler: function (form) {
                      $.ajax({

                          url: "model/edits/experienciaP_edit.php",

                          type: "POST",

                          dataType: "HTML",

                          data: "act=" + $("#act_eE").val() + "&empresa=" + $("#empresa_eE").val() + "&de=" + $("#de_eE").val() + "&hasta=" + $("#hasta_eE").val() + "&id=" + $("#id_eE").val()
                      }).done(function (echo) {

                          if (echo == "1") {
                              mensajeEdit.html("Su experiencia profesional fue editada con éxito");
                              cargarExpP();
                          } else {
                              mensajeEdit.html(echo);
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

            $('#editExperienciaD').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Botón que activó el modal
                var modal = $(this)
                modal.find('.modal-body #org_dE').val(button.data('organ'))
                modal.find('.modal-body #periodo_dE').val(button.data('periodo'))
                modal.find('.modal-body #nivel_dE').val(button.data('nivel'))
                modal.find('.modal-body #info_dE').val(button.data('infor'))
                modal.find('.modal-body #id_dE').val(button.data('id'))

                ///addExperienciaDF VALIDANDO FORMULARIO(se encuentra edit_modals.php)
                $("#editExperienciaDF").validate({
                    rules: {
                        org_dE: {
                            required: true
                        },
                        periodo_dE: {
                            required: true,
                            digits: true
                        },
                        nivel_dE: {
                            required: true
                        }
                    },
                    messages: {
                        org_dE: {
                            required: "Ingrese el nombre del organismo"
                        },
                        periodo_dE: {
                            required: "Ingrese el número de años",
                            digits: "Solo números"
                        },
                        nivel_dE: {
                            required: "Ingrese el nivel de su experiencia"
                        }
                    },
                    submitHandler: function (form) {
                        $.ajax({
                            url: "model/edits/experienciaD_edit.php",
                            type: "POST",
                            dataType: "HTML",
                            data: "org=" + $("#org_dE").val() + "&periodo=" + $("#periodo_dE").val() + "&nivel=" + $("#nivel_dE").val() + "&info=" + $("#info_dE").val() +
                            "&id=" + $("#id_dE").val()
                        }).done(function (echo) {
                            if (echo == '1') {
                                mensajeEdit.html("Su experiencia en diseño ingenieril fue editada con éxito");
                                cargarExpD();
                            } else
                                mensajeEdit.html(echo);
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
              $('#editLogro').on('show.bs.modal', function (event) {
                  var button = $(event.relatedTarget) // Botón que activó el modal
                  var modal = $(this)
                  modal.find('.modal-body #titulo_lE').val(button.data('titulo'))
                  modal.find('.modal-body #autor_lE').val(button.data('autor'))
                  modal.find('.modal-body #nombre_lE').val(button.data('nombre'))
                  modal.find('.modal-body #relev_lE').val(button.data('relevancia'))
                  modal.find('.modal-body #lugar_lE').val(button.data('lugar'))
                  modal.find('.modal-body #info_lE').val(button.data('descrip'))
                  modal.find('.modal-body #id_lE').val(button.data('id'))

                  ///VALIDANDO FORMULARIO editLogroF (se encuentra edit_modals.php)
                  $("#editLogroF").validate({
                      rules: {
                          titulo_lE: {
                              required: true
                          },
                          autor_lE: {
                              required: true
                          },
                          nombre_lE: {
                              required: true
                          },
                          relev_lE: {
                              required: true
                          },
                          lugar_lE: {
                              required: true
                          },
                          info_lE: {
                              required: true
                          }
                      },
                      messages: {
                          titulo_lE: {
                              required: "Ingrese el titulo de su logro profesional"
                          },
                          autor_lE: {
                              required: "Ingrese el autor(es)"
                          },
                          nombre_lE: {
                              required: "Ingrese el nombre"
                          },
                          relev_lE: {
                              required: "Seleccione la relevancia"
                          },
                          lugar_lE: {
                              required: "Ingrese el lugar"
                          },
                          info_lE: {
                              required: "Ingrese una descripción"
                          }
                      },
                      submitHandler: function (form) {
                          $.ajax({

                              url: "model/edits/logro_edit.php",
                              type: "POST",
                              dataType: "HTML",
                              data: "titulo=" + $("#titulo_lE").val() + "&autor=" + $("#autor_lE").val() + "&nombre=" + $("#nombre_lE").val() + "&relev=" + $("#relev_lE").val() + "&info=" + $("#info_lE").val() + "&lugar=" + $("#lugar_lE").val() +
                              "&id=" + $("#id_lE").val()
                          }).done(function (echo) {
                              if (echo == '1') {
                                  mensajeEdit.html("Su logro profesional fue editado con éxito");
                                  cargarLogro();
                              } else
                                  mensajeEdit.html(echo);
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

                $('#editMembresia').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget) // Botón que activó el modal
                    var modal = $(this)
                    modal.find('.modal-body #org_mE').val(button.data('organ'))
                    modal.find('.modal-body #periodo_mE').val(button.data('years'))
                    modal.find('.modal-body #tipo_mE').val(button.data('tipo'))
                    modal.find('.modal-body #info_mE').val(button.data('info'))
                    modal.find('.modal-body #id_mE').val(button.data('id'))
                    ///VALIDANDO FORMULARIO  addMebresoaF (se encuentra add_modals.php)

                    $("#editMembresiaF").validate({
                        rules: {
                            org_mE: {
                                required: true
                            },
                            tipo_mE: {
                                required: true
                            },
                            periodo_mE: {
                                required: true,
                                digits: true
                            }
                        },
                        messages: {
                            org_mE: {
                                required: "Ingrese el nombre del organismo"
                            },
                            periodo_mE: {
                                required: "Ingrese el número de años",
                                digits: "Solo números"
                            },
                            tipo_mE: {
                                required: "Ingrese el tipo"
                            }
                        },
                        submitHandler: function (form) {
                            $.ajax({
                                url: "model/edits/membresia_edit.php",
                                type: "POST",
                                dataType: "HTML",
                                data: "org=" + $("#org_mE").val() + "&tipo=" + $("#tipo_mE").val() + "&periodo=" + $("#periodo_mE").val() + "&info=" + $("#info_mE").val() +
                                "&id=" + $("#id_mE").val()
                            }).done(function (echo) {
                                if (echo == '1') {
                                    mensajeEdit.html("Su membresía o participación fue editada con éxito");
                                    cargarMembresia();
                                } else
                                    mensajeEdit.html(echo);
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

                  $('#editPremio').on('show.bs.modal', function (event) {
                      var button = $(event.relatedTarget) // Botón que activó el modal
                      var modal = $(this)
                      modal.find('.modal-body #nombre_rE').val(button.data('nombre'))
                      modal.find('.modal-body #org_rE').val(button.data('organ'))
                      modal.find('.modal-body #motivo_rE').val(button.data('motivo'))
                      modal.find('.modal-body #desc_rE').val(button.data('info'))
                      modal.find('.modal-body #id_rE').val(button.data('id'))

                      ///VALIDANDO FORMULARIO  editPremioF (se encuentra edit_modals.php)
                      $("#editPremioF").validate({
                          rules: {
                              org_rE: {
                                  required: true
                              },
                              nombre_rE: {
                                  required: true
                              },
                              motivo_rE: {
                                  required: true
                              },
                              desc_rE: {
                                  required: true
                              }
                          },
                          messages: {
                              org_rE: {
                                  required: "Ingrese el organismo que lo otorga"
                              },
                              nombre_rE: {
                                  required: "Ingrese el nombre",
                                  digits: "Solo números"
                              },
                              motivo_rE: {
                                  required: "Ingrese el motivo"
                              },
                              desc_rE: {
                                  required: "Ingrese una descripción"
                              }
                          },
                          submitHandler: function (form) {
                              $.ajax({
                                  url: "model/edits/premio_edit.php",
                                  type: "POST",
                                  dataType: "HTML",
                                  data: "nombre=" + $("#nombre_rE").val() + "&org=" + $("#org_rE").val() + "&motivo=" + $("#motivo_rE").val() + "&desc=" + $("#desc_rE").val() +
                                  "&id=" + $("#id_rE").val()
                              }).done(function (echo) {
                                  if(echo == '1'){
                                      mensajeEdit.html("Su premio, distincion, reconocimiento recibido o participación fue editado con éxito");
                                      cargarPremio();
                                  }else
                                      mensajeEdit.html(echo);
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
                                    url: "model/edits/password_edit.php",
                                    type: "POST",
                                    dataType: "HTML",
                                    data: "pass=" + $("#pass2").val() + "&id=" + $("#codigoPass").val()
                                }).done(function (echo) {
                                    if(echo == '1'){
                                        mensajeEdit.html("Su Contraseña ha sido editada con éxito");
                                    //    cargarPass()
                                    }else
                                        mensajeEdit.html(echo);
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

        function ocultarMensajeEdit() {
            mensajeEdit.hide();
        }

        function cargarPass(){
          $('#modalPass').load('view/modal/modal_pass.php');
        }
