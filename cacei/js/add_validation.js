        //Guardamos el contenedor con la clase alert
        var mensajeAdd = $(".alert-info");
        //Ocultamos el contenedor
        mensajeAdd.hide();

        /*** VALIDACIONES DE DATOS PERSONALES*/
        $(document).ready(function () {
            //Validando campos de datos personales
            /*$("#addDatosF").validate({
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
                        required: true,
                        minlength: 4,
                        maxlength: 255
                    },
                    codigo: {
                        required: true,
                        minlength: 9,
                        maxlength: 9,
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
                        required: "Por favor, ingrese su puesto en la institución",
                        minlength: "Ingrese mas caracteres",
                        maxlength: "Ha sobrepasado el número máximo de caracteres "
                    },
                    codigo: {
                        required: "Por favor, ingrese su código en la institución",
                        minlength: "El código está incompleto",
                        maxlength: "El código consta de nueve dígitos",
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
                        data: "nombre=" + $("#nombre").val() + "&app=" + $("#app=") + $("#app").val() + "&apm=" + $("#apm").val() + "&puesto=" + $("#puesto").val() + "&codigo=" + $("#codigo").val() + "&fecha=" + $("#fechaDa").val()
                    }).done(function (echo) {
                        mensajeAdd.html(echo);
                        mensajeAdd.slideDown(500);
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
*/
            ///VALIDANDO FORMULARIO DE ADD FORMACION ACADMICA
            $("#addFormacionF").validate({
                rules: {
                    nombrefo: {
                        required: true,
                        minlength: 5,
                        maxlength: 255
                    },
                    inst: {
                        required: true,
                        minlength: 5,
                        maxlength: 255
                    },
                    year: {
                        required: true
                    },
                    cedula: {
                        required: true
                    },
                    level: {
                        required: true
                    },
                    country: {
                        required: true,
                        minlength: 4
                    }
                },
                messages: {
                    nombrefo: {
                        required: "Por favor, ingrese el nombre ",
                        minlength: "El nombre debe constar de al menos 5 caracteres",
                        maxlength: "Ha sobrepasado el número máximo de caracteres "
                    },
                    inst: {
                        required: "Por favor, ingrese el nombre de la institución",
                        minlength: "Debe constar de al menos 5 caracteres",
                        maxlength: "Ha sobrepasado el número máximo de caracteres "
                    },
                    year: {
                        required: "Por favor, seleecione un año"
                    },
                    cedula: {
                        required: "Por favor, ingrese la cédula"
                    },
                    level: {
                        required: "Por favor, seleccione el nivel"
                    },
                    country: {
                        required: "Por favor, ingrese el país",
                        minlength: "Debe de constar de al menos 4 caracteres"
                    }
                },
                submitHandler: function (form) {
                    var nombre = $("#nombrefo").val();
                    var inst = $("#inst").val();
                    var pais = $("#country").val();
                    var year = $("#year").val();
                    var ced = $("#cedula").val();
                    var niv = $("#level").val();
                    //Llamamos a la función AJAX de jQuery
                    $.ajax({
                        //Definimos la URL del archivo al cual vamos a enviar los datos
                        url: "model/adds/formacion_add.php",
                        //Definimos el tipo de método de envío
                        type: "POST",
                        //Definimos el tipo de datos que vamos a enviar y recibir
                        dataType: "HTML",
                        //Definimos la información que vamos a enviar
                        data: "nom=" + nombre + "&inst=" + inst + "&pais=" + pais + "&year=" + year + "&ced=" + ced + "&nivel=" + niv + "&fk=212091737"
                    }).done(function (echo) {
                        //Cuando recibamos respuesta, la mostramos
                        mensajeAdd.html(echo)
                        limpiarFormacion()
                        mensajeAdd.slideDown(500)
                    });
                    cargarFormacion()
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

            /*** VALIDACION DE GESTION ACADEMICA */
            $("#addGestionF").validate({
                rules: {
                    actividad_g: {
                        required: true,
                        minlength: 5,
                        maxlength: 255
                    },
                    inst_g: {
                        required: true,
                        minlength: 5,
                        maxlength: 255
                    },
                    de_g: {
                        required: true
                    },
                    hasta_g: {
                        required: true
                    }
                },
                messages: {
                    actividad_g: {
                        required: "Por favor, ingrese el nombre de la actividad o puesto ",
                        minlength: "El nombre debe constar de al menos 5 caracteres",
                        maxlength: "Ha sobrepasado el número máximo de caracteres "
                    },
                    inst_g: {
                        required: "Por favor, ingrese el nombre de la institución",
                        minlength: "Debe constar de al menos 5 caracteres",
                        maxlength: "Ha sobrepasado el número máximo de caracteres "
                    },
                    de_g: {
                        required: "Por favor, seleecione una fecha",
                    },
                    hasta_g: {
                        required: "Por favor, selecciones una fecha",
                    }
                },
                submitHandler: function (form) {
                    $.ajax({

                        url: "model/adds/gestion_add.php",

                        type: "POST",

                        dataType: "HTML",

                        data: "act=" + $("#actividad_g").val() + "&inst=" + $("#inst_g").val() + "&de=" + $("#de_g").val() + "&hasta=" + $("#hasta_g").val()
                    }).done(function (echo) {

                        if (echo == "1") {
                            mensajeAdd.html("La gestión académica fue registrada con éxito");
                            limpiarGestion();
                        } else {
                            mensajeAdd.html(echo);
                        }
                        mensajeAdd.slideDown(500);
                        cargarGestion()
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

            ///VALIDANDO FORMULARIO addProductoF
            $("#addProdF").validate({
                rules: {
                    titulo_p: {
                        required: true
                    },
                    autor_p: {
                        required: true
                    },
                    lugar_p: {
                        required: true
                    },
                    fecha_p: {
                        required: true
                    },
                    tipo_p: {
                        required: true
                    },
                    numero_p: {
                        required: true,
                        digits: true
                    },
                    alcance_p: {
                        required: true
                    },
                    info_p: {
                        required: true
                    }
                },
                messages: {
                    titulo_p: {
                        required: "Ingresa el titulo de su producto académico"
                    },
                    autor_p: {
                        required: "Ingrese el autor de su producto académico"
                    },
                    lugar_p: {
                        required: "Ingrese donde se creo su producto académico"
                    },
                    fecha_p: {
                        required: "Ingrese la fecha"
                    },
                    tipo_p: {
                        required: "Ingrese el tipo"
                    },
                    numero_p: {
                        required: "Ingrese el número de registro",
                        digits: "Solo ingrese caracteres numericos"
                    },
                    alcance_p: {
                        required: "Ingrese el alcance del producto"
                    },
                    info_p: {
                        required: "Ingrese información extra, pero relevante"
                    }
                },
                submitHandler: function (form) {
                    $.ajax({
                        url: "model/adds/productos_add.php",
                        type: "POST",
                        dataType: "HTML",
                        data: "titulo_p=" + $("#titulo_p").val() + "&autor_p=" + $('#autor_p').val() + "&lugar_p=" + $("#lugar_p").val() + "&fecha_p=" + $("#fecha_p").val() + "&tipo_p=" + $("#tipo_p").val() + "&numero_p=" + $("#numero_p").val() + "&alcance_p=" + $("#alcance_p").val() + "&info_p=" + $("#info_p").val(),
                        success: function (echo) {
                            //Cuando recibamos respuesta, la mostramos
                            if (echo == "1") {
                                mensajeAdd.html("Su producto académico fue registrado con éxito");
                                limpiarProducto();
                            } else {
                                mensajeAdd.html(echo);
                            }
                            mensajeAdd.slideDown(500);
                            cargarProducto();
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

            ///VALIDANDO FORMULARIO addCapacitacionF(se encuentra add_modals.php)
            $("#addCapacitacionF").validate({
                rules: {
                    tipo_c: {
                        required: true
                    },
                    inst_c: {
                        required: true
                    },
                    pais_c: {
                        required: true
                    },
                    year_c: {
                        required: true,
                        digits: true
                    },
                    hora_c: {
                        required: true,
                        digits: true
                    }
                },
                messages: {
                    tipo_c: {
                        required: "Ingresa el tipo de su capacitación"
                    },
                    inst_c: {
                        required: "Ingrese la institución"
                    },
                    pais_c: {
                        required: "Ingrese el país"
                    },
                    year_c: {
                        required: "Seleccione un año",
                        digits: "Solo números"
                    },
                    hora_c: {
                        required: "Ingrese el número de horas",
                        digits: "Solo números"
                    }
                },
                submitHandler: function (form) {
                    $.ajax({
                        //Definimos la URL del archivo al cual vamos a enviar los datos
                        url: "model/adds/capacitacion_add.php",
                        //Definimos el tipo de método de envío
                        type: "POST",
                        //Definimos el tipo de datos que vamos a enviar y recibir
                        dataType: "HTML",
                        //Definimos la información que vamos a enviar
                        data: "tipo=" + $("#tipo_c").val() + "&inst=" + $("#inst_c").val() + "&pais=" + $("#pais_c").val() + "&year=" + $("#year_c").val() + "&hora=" + $("#hora_c").val()
                    }).done(function (echo) {
                        //Cuando recibamos respuesta, la mostramos
                        if (echo == '1') {
                            mensajeAdd.html("Su capacitación fue registrada con éxito");
                            limpiarCapacitacion();
                            cargarCapacitacion();
                        } else
                            mensajeAdd.html(echo);
                        mensajeAdd.slideDown(500);
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

            ///VALIDANDO FORMULARIO addActualizacionF (se encuentra add_modals.php)
            $("#addActualizacionF").validate({
                rules: {
                    tipo_a: {
                        required: true
                    },
                    inst_a: {
                        required: true
                    },
                    pais_a: {
                        required: true
                    },
                    year_a: {
                        required: true,
                        digits: true
                    },
                    hora_a: {
                        required: true,
                        digits: true
                    }
                },
                messages: {
                    tipo_a: {
                        required: "Ingresa el tipo de su actualización disciplinar"
                    },
                    inst_a: {
                        required: "Ingrese la institución"
                    },
                    pais_a: {
                        required: "Ingrese el país"
                    },
                    year_a: {
                        required: "Seleccione un año",
                        digits: "Solo números"
                    },
                    hora_a: {
                        required: "Ingrese el número de horas",
                        digits: "Solo números"
                    }
                },
                submitHandler: function (form) {
                    $.ajax({
                        url: "model/adds/actualizacion_add.php",
                        type: "POST",
                        dataType: "HTML",
                        data: "tipo=" + $("#tipo_a").val() + "&inst=" + $("#inst_a").val() + "&pais=" + $("#pais_a").val() + "&year=" + $("#year_a").val() + "&hora=" + $("#hora_a").val()
                    }).done(function (echo) {
                        if (echo == '1') {
                            mensajeAdd.html("Su actualización doecente fue registrada con éxito");
                            limpiarActualizacion();
                            cargarActualizacion();
                        } else
                            mensajeAdd.html(echo);
                        mensajeAdd.slideDown(500);
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

            ///VALIDANDO FORMULARIO addExperienciaPF (se encuentra add_modals.php)
            $("#addExperienciaPF").validate({
                rules: {
                    act_e: {
                        required: true
                    },
                    empresa_e: {
                        required: true
                    },
                    de_e: {
                        required: true
                    },
                    hasta_e: {
                        required: true
                    }
                },
                messages: {
                    act_e: {
                        required: "Ingrese el nombre de la actividad"
                    },
                    empresa_e: {
                        required: "Ingrese la organización o la empresa"
                    },
                    de_e: {
                        required: "Seleccione la fecha de inicio"
                    },
                    hasta_e: {
                        required: "Seleccione la fecha de fin"
                    }
                },
                submitHandler: function (form) {
                    $.ajax({

                        url: "model/adds/experienciaP_add.php",

                        type: "POST",

                        dataType: "HTML",

                        data: "act=" + $("#act_e").val() + "&empresa=" + $("#empresa_e").val() + "&de=" + $("#de_e").val() + "&hasta=" + $("#hasta_e").val()
                    }).done(function (echo) {

                        if (echo == "1") {
                            mensajeAdd.html("La experiencia profesional fue registrada con éxito");
                            cargarExpP();
                            limpiarExpP();
                        } else {
                            mensajeAdd.html(echo);
                        }
                        mensajeAdd.slideDown(500);
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

            ///addExperienciaDF VALIDANDO FORMULARIO(se encuentra add_modals.php)
            $("#addExperienciaDF").validate({
                rules: {
                    org_d: {
                        required: true
                    },
                    periodo_d: {
                        required: true,
                        digits: true
                    },
                    nivel_d: {
                        required: true
                    }
                },
                messages: {
                    org_d: {
                        required: "Ingrese el nombre del organismo"
                    },
                    periodo_d: {
                        required: "Ingrese el número de años",
                        digits: "Solo números"
                    },
                    nivel_d: {
                        required: "Ingrese el nivel de su experiencia"
                    }
                },
                submitHandler: function (form) {
                    $.ajax({
                        url: "model/adds/experienciaD_add.php",
                        type: "POST",
                        dataType: "HTML",
                        data: "org=" + $("#org_d").val() + "&periodo=" + $("#periodo_d").val() + "&nivel=" + $("#nivel_d").val() + "&info=" + $("#info_d").val()
                    }).done(function (echo) {
                        if (echo == '1') {
                            mensajeAdd.html("Su xperiencia en diseño ingenieril fue registrada con éxito");
                            cargarExpD();
                            limpiarExpD();
                        } else
                            mensajeAdd.html(echo);
                        mensajeAdd.slideDown(500);
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

            ///VALIDANDO FORMULARIO addLogroF (se encuentra add_modals.php)
            $("#addLogroF").validate({
                rules: {
                    titulo_l: {
                        required: true
                    },
                    autor_l: {
                        required: true
                    },
                    nombre_l: {
                        required: true
                    },
                    relev_l: {
                        required: true
                    },
                    lugar_l: {
                        required: true
                    },
                    info_l: {
                        required: true
                    }
                },
                messages: {
                    titulo_l: {
                        required: "Ingrese el titulo de su logro profesional"
                    },
                    autor_l: {
                        required: "Ingrese el autor(es)"
                    },
                    nombre_l: {
                        required: "Ingrese el nombre"
                    },
                    relev_l: {
                        required: "Seleccione la relevancia"
                    },
                    lugar_l: {
                        required: "Ingrese el lugar"
                    },
                    info_l: {
                        required: "Ingrese una descripción"
                    }
                },
                submitHandler: function (form) {
                    $.ajax({

                        url: "model/adds/logros_add.php",
                        type: "POST",
                        dataType: "HTML",
                        data: "titulo=" + $("#titulo_l").val() + "&autor=" + $("#autor_l").val() + "&nombre=" + $("#nombre_l").val() + "&relev=" + $("#relev_l").val() + "&info=" + $("#info_l").val() + "&lugar=" + $("#lugar_l").val()
                    }).done(function (echo) {
                        if (echo == '1') {
                            mensajeAdd.html("Su logro profesional fue registrado con éxito");
                            cargarLogro();
                            limpiarLogro();
                        } else
                            mensajeAdd.html(echo);
                        mensajeAdd.slideDown(500);
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

            ///VALIDANDO FORMULARIO  addMebresoaF (se encuentra add_modals.php)
            $("#addMembresiaF").validate({
                rules: {
                    org_m: {
                        required: true
                    },
                    tipo_m: {
                        required: true
                    },
                    periodo_m: {
                        required: true,
                        digits: true
                    }
                },
                messages: {
                    org_m: {
                        required: "Ingrese el nombre del organismo"
                    },
                    periodo_m: {
                        required: "Ingrese el número de años",
                        digits: "Solo números"
                    },
                    tipo_m: {
                        required: "Ingrese el tipo"
                    }
                },
                submitHandler: function (form) {
                    $.ajax({
                        url: "model/adds/membresia_add.php",
                        type: "POST",
                        dataType: "HTML",
                        data: "org=" + $("#org_m").val() + "&tipo=" + $("#tipo_m").val() + "&periodo=" + $("#periodo_m").val() + "&info=" + $("#info_m").val()
                    }).done(function (echo) {
                        if (echo == '1') {
                            mensajeAdd.html("Su membresía o participación fue registrada con éxito");
                            cargarMembresia();
                            limpiarMembresia();
                        } else
                            mensajeAdd.html(echo);
                        mensajeAdd.slideDown(500);
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
            ///VALIDANDO FORMULARIO  addPremioF (se encuentra add_modals.php)
            $("#addPremioF").validate({
                rules: {
                    org_r: {
                        required: true
                    },
                    nombre_r: {
                        required: true
                    },
                    motivo_r: {
                        required: true
                    },
                    desc_r: {
                        required: true
                    }
                },
                messages: {
                    org_r: {
                        required: "Ingrese el organismo que lo otorga"
                    },
                    nombre_r: {
                        required: "Ingrese el nombre",
                        digits: "Solo números"
                    },
                    motivo_r: {
                        required: "Ingrese el motivo"
                    },
                    desc_r: {
                        required: "Ingrese una descripción"
                    }
                },
                submitHandler: function (form) {
                    $.ajax({
                        url: "model/adds/premio_add.php",
                        type: "POST",
                        dataType: "HTML",
                        data: "nombre=" + $("#nombre_r").val() + "&org=" + $("#org_r").val() + "&motivo=" + $("#motivo_r").val() + "&desc=" + $("#desc_r").val()
                    }).done(function (echo) {
                        if(echo == '1'){
                            mensajeAdd.html("Su premio, distincion, reconocimiento recibido o participación fue registrado con éxito");
                            cargarPremio();
                            limpiarPremio();
                        }else
                            mensajeAdd.html(echo);
                        mensajeAdd.slideDown(500);
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

        $('#addPE').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Botón que activó el modal
            var modal = $(this)
            modal.find('.modal-body #idPEm').val(button.data('id'))
            modal.find('.modal-body #descrip_f').val(button.data('info'))
        ///VALIDANDO FORMULARIO  addPEF (se encuentra add_modals.php)
        $("#addPEF").validate({
            rules: {
                descrip_f: {
                    required: true
                }
            },
            messages: {
                descrip_f: {
                    required: "La descripción es obligatoria"
                }
            },
            submitHandler: function (form) {
                $.ajax({
                    url: "model/edits/PE_edit.php",
                    type: "POST",
                    dataType: "HTML",
                    data: "pe=" + $("#descrip_f").val() + "&id=" + $("#idPEm").val()
                }).done(function (echo) {
                    if(echo == '1'){
                        mensajeAdd.html("Proceso completado");
                        $('#PETable').load('view/tables/PE_table.php');
                    }else
                        mensajeAdd.html(echo);
                    mensajeAdd.slideDown(500);
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
      
        function ocultarMensajeAdd() {
            mensajeAdd.hide();
        }

        function cargarFormacion() {
            $('#formacionTable').load('view/tables/formacion_academica_table.php');
        }

        function limpiarFormacion(){
          $("#nombrefo").val("");
          $("#inst").val("");
          $("#country").val("");
          $("#year").val("");
          $("#cedula").val("");
          $("#level").val("");
        }

        function cargarGestion() {
            $('#gestionTable').load('view/tables/gestion_academica_table.php');
        }

        function limpiarGestion() {
            $('#actividad_g').val("");
            $('#inst_g').val("");
            $('#de_g').val("");
            $('#hasta_g').val("");
        }

        function cargarProducto() {
            $('#productoTable').load('view/tables/producto_academico_table.php');
        }

        function limpiarProducto() {
            $("#titulo_p").val("");
            $("#autor_p").val("");
            $("#lugar_p").val("");
            $("#fecha_p").val("");
            $("#tipo_p").val("");
            $("#numero_p").val("");
            $("#alcance_p").val("");
            $("#info_p").val("");
        }

        function cargarCapacitacion() {
            $('#capacitacionTable').load('view/tables/capacitacion_table.php');
        }

        function limpiarCapacitacion() {
            $('#tipo_c').val("");
            $('#inst_c').val("");
            $('#pais_c').val("");
            $('#year_c').val("");
            $('#hora_c').val("");
        }

        function cargarActualizacion() {
            $('#actualizacionTable').load('view/tables/actualizacion_table.php');
        }

        function limpiarActualizacion() {
            $('#tipo_a').val("");
            $('#inst_a').val("");
            $('#pais_a').val("");
            $('#year_a').val("");
            $('#hora_a').val("");
        }

        function cargarExpP() {
            $('#expPtable').load('view/tables/experienciaP_table.php');
        }

        function limpiarExpP() {
            $('#act_e').val("");
            $('#empresa_e').val("");
            $('#de_e').val("");
            $('#hasta_e').val("");
        }

        function cargarExpD() {
            $('#expDtable').load('view/tables/experienciaD_table.php');
        }

        function limpiarExpD() {
            $('#org_d').val("");
            $('#periodo_d').val("");
            $('#nivel_d').val("");
            $('#info_d').val("");
        }

        function cargarLogro() {
            $('#logroTable').load('view/tables/logro_table.php');
        }

        function limpiarLogro() {
            $('#titulo_l').val("");
            $('#autor_l').val("");
            $('#nombre_l').val("");
            $('#relev_l').val("");
            $('#lugar_l').val("");
            $('#info_l').val("");
        }

        function cargarMembresia() {
            $('#membresiaTable').load('view/tables/membresia_table.php');
        }

        function limpiarMembresia() {
            $('#org_m').val("");
            $('#tipo_m').val("");
            $('#periodo_m').val("");
            $('#info_m').val("");
        }

        function cargarPremio() {
            $('#premioTable').load('view/tables/premio_table.php');
        }

        function limpiarPremio() {
            $('#nombre_r').val("");
            $('#org_r').val("");
            $('#motivo_r').val("");
            $('#desc_r').val("");
        }

        function cargarDatosPersonales() {
          $('#mostrarProfesor').load('view/profesor_informacion.php');
        }
