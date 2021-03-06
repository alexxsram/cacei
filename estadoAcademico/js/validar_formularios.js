//Guardamos el contenedor con la clase alert
var mensajeEdit = $(".alert-dismissible");

//Ocultamos el contenedor
mensajeEdit.hide();

function mensajeAlerta() {
    mensajeEdit.removeClass("alert-info");
    mensajeEdit.addClass("alert-danger");
}

function mensajeInfo() {
    mensajeEdit.removeClass("alert-danger");
    mensajeEdit.addClass("alert-info");
}

//Validación del formulario de editar password con el termino "editPass"
$('#editPass').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Botón que activó el modal
    var modal = $(this)
    $("#editPassF").validate( {
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
        submitHandler: function(form) {
            $.ajax( {
                url: "../cacei/model/edits/password_edit.php",
                type: "POST",
                dataType: "HTML",
                data: "pass=" + $("#pass2").val() + "&id=" + $("#codigoPass").val()
            }).done(function (echo) {
                if(echo == '1') {
                    mensajeInfo()
                    mensajeEdit.html("Su contraseña se ha modificado con éxito")
                    limpiarPass()
                } else {
                    mensajeAlerta()
                    mensajeEdit.html(echo)
                }
                mensajeEdit.slideDown(500);
            });
        },
        errorElement: "em",
        errorPlacement: function(error, element) {
            // Add the `help-block` class to the error element
            error.addClass("invalid-feedback");

            if(element.prop("type") === "checkbox") {
                error.insertAfter(element.parent("label"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        }
    });
});

//Validación del formulario de agregar alumnos con el termino "addAlumnoF"
$('#addAlumno').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Botón que activó el modal
    var modal = $(this)

    var idReporte = button.data('id')
    $("#idReporte").val(idReporte)

    $("#addAlumnoF").validate( {
        rules: {
            codigo: {
                required: true,
                minlength: 9
            },
            nombre: {
                required: true
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
            codigo: {
                required: "Ingresa el codigo",
                minlength: "Ingresa el código de 9 dÍgitos"
            },
            nombre: {
                required: "Ingrese un nombre",
                minlength: "Ingrese el nombre completo"
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
                required: "Ingresa un motivo"
            },
            comentario: {
                required: "Ingresa un comentario"
            }
        },
        submitHandler: function(form) {
            revisarCheck()
            $.ajax({
                url: "model/add_detalleReporte.php",
                type: "POST",
                dataType: "HTML",
                data: "fk_alumno=" + $("#codigoA").val() + "&nombre=" + $("#nombre").val() + "&selectA=" + $("#selectA").val() + "&selectB=" + $("#selectB").val() + "&selectC=" + $("#selectC").val() + "&motivo=" + $("#motivo").val() + "&comentario=" + $("#comentario").val() + "&fk_reporte=" + $("#idReporte").val()
            }).done(function(echo) {
                if(echo == "1") {
                    mensajeInfo()
                    mensajeEdit.html("El alumno ha sido agregado al reporte")
                    limpiarAlumno()
                    cargarDetalle($("#idReporte").val())
                }
                else if(echo == '2') {
                    mensajeAlerta()
                    mensajeEdit.html("Alumno no agregado, al parecer no está en ninguna de las situaciones")
                }
                else if(echo != '1' && echo != '2') {
                    mensajeAlerta()
                    mensajeEdit.html("El alumno ya se encuentra registrado en el reporte")
                }
                mensajeEdit.slideDown(500)
            });
        },
        errorElement: "em",
        errorPlacement: function(error, element) {
            // Add the `help-block` class to the error element
            error.addClass("invalid-feedback");

            if(element.prop("type") === "checkbox") {
                // error.insertAfter(element.parent("label"));
                error.addClass("invalid-feedback");
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        }
    });
    mensajeEdit.hide();
});

//Validación del formulario de editar alumnos con el termino "editAlumnoF"
$('#editAlumno').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Botón que activó el modal
    var modal = $(this)

    modal.find('.modal-body #idReporteE').val(button.data('idreporte'))
    modal.find('.modal-body #fkReporteAE').val(button.data('fkreporte'))
    modal.find('.modal-body #codigoAE').val(button.data("codigo"))
    modal.find('.modal-body #nombreE').val(button.data('nombre'))
    modal.find('.modal-body #motivoE').val(button.data('motivo'))
    modal.find('.modal-body #comentarioE').val(button.data('comentario'))

    $("#editAlumnoF").validate( {
        rules: {
            codigoAE: {
                required: true,
                minlength: 9
            },
            nombreE: {
                required: true
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
            motivoE: {
                required: true
            },
            comentarioE: {
                required: true
            }
        },
        messages: {
            codigoAE: {
                required: "Ingresa el código del estudiante",
                minlength: "Ingresa el código de 9 dÍgitos"
            },
            nombreE: {
                required: "Ingrese un nombre",
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
            motivoE: {
                required: "Ingresa el motivo"
            },
            comentarioE: {
                required: "Ingresa un comentario"
            }
        },
        // Termimar el javascript de edición del alumno
        submitHandler: function(form) {
            revisarCheckE()
            $.ajax( {
                url: "model/edit_detalleReporte.php",
                type: "POST",
                dataType: "HTML",
                data: "fk_alumno=" + $("#codigoAE").val() + "&nombre=" + $("#nombreE").val() + "&selectA=" + $("#selectAE").val() + "&selectB=" + $("#selectBE").val() + "&selectC=" + $("#selectCE").val() + "&motivo=" + $("#motivoE").val() + "&comentario=" + $("#comentarioE").val() + "&fk_reporte=" + $("#fkReporteAE").val()
            }).done(function(echo) {
                if(echo == '1') {
                    mensajeInfo()
                    mensajeEdit.html("El alumno ha sido editado en el reporte")
                    limpiarAlumnoE()
                    cargarDetalle( $("#idReporteE").val() )
                }
                else if(echo == '2') {
                    mensajeAlerta()
                    mensajeEdit.html("Alumno no editado, al parecer no está en ninguna de las situaciones")
                }
                else if(echo != '1' && echo != '2') {
                    mensajeAlerta()
                    mensajeEdit.html("El alumno ya se encuentra registrado en el reporte")
                }
                mensajeEdit.slideDown(500)
            });
        },
        errorElement: "em",
        errorPlacement: function(error, element) {
            // Add the `help-block` class to the error element
            error.addClass("invalid-feedback");

            if(element.prop("type") === "checkbox") {
                // error.insertAfter(element.parent("label"));
                error.addClass("invalid-feedback");
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        }
    });
    mensajeEdit.hide()
});

//Validación del formulario de agregar reportes con el termino "addReporteF"
$('#addReporte').on('show.bs.modal', function(event) {
    $("#addReporteF").validate( {
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
        submitHandler: function(form) {
            $.ajax({
                url: "model/add_reporte.php",
                type: "POST",
                dataType: "HTML",
                data: "nrc_materia=" + $("#materia").val()
            }).done(function(echo) {
                if(echo == "1") {
                    mensajeInfo()
                    mensajeEdit.html("Su reporte se ha generado, puede agregar alumnos");
                    limpiarReporte()
                    cargar()
                } else {
                    mensajeAlerta()
                    mensajeEdit.html("Hubo un error, asegúrese de haber seleccionado una materia o no tener un reporte con la materia que seleccionó ");
                }
                mensajeEdit.slideDown(500);
            });
        },
        errorElement: "em",
        errorPlacement: function(error, element) {
            // Add the `help-block` class to the error element
            error.addClass("invalid-feedback");

            if(element.prop("type") === "checkbox") {
                error.insertAfter(element.parent("label"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        }
    });
    mensajeEdit.hide();
});

//Validación del formulario de editar reporte con el termino "addReporteF"
$('#editReporte').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Botón que activó el modal
    var modal = $(this)
    modal.find('.modal-body #materiaE').val(button.data('materia'))
    modal.find('.modal-body #seccionE').val(button.data('seccion'))
    modal.find('.modal-body #reporteEditar').val(button.data('idreporte'))
    $("#editReporteF").validate( {
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
        submitHandler: function(form) {
            $.ajax( {
                url: "model/edit_reporte.php",
                type: "POST",
                dataType: "HTML",
                data: "nrc_materia=" + $("#materiaE").val() + "&id_reporte=" + $("#reporteEditar").val()
            }).done(function(echo) {
                if (echo == "1") {
                    mensajeInfo()
                    mensajeEdit.html("Su reporte se ha editado con éxito");
                    limpiarReporteE()
                    cargar()
                    cargarDetalle( $("#reporteEditar").val() )
                } else {
                    mensajeAlerta()
                    mensajeEdit.html("Hubo un error, asegúrese de haber seleccionado una materia o no tener un reporte con la materia que seleccionó " + echo);
                }
                mensajeEdit.slideDown(500);
            });
        },
        errorElement: "em",
        errorPlacement: function(error, element) {
            // Add the `help-block` class to the error element
            error.addClass("invalid-feedback");

            if(element.prop("type") === "checkbox") {
                error.insertAfter(element.parent("label"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        }
    });
    mensajeEdit.hide();
});

///************************************************************************************************************* agregado por Alex */
//Validación del formulario de agregar días de asistencia con el termino "addDiaAsistencia"
$('#addDiaAsistencia').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Botón que activó el modal
    var modal = $(this)

    var idReporteAs = button.data('idreporte');
    $('#idReporteAs').val(idReporteAs)

    var idClaseAs = button.data('id')
    $('#idClaseAs').val(idClaseAs)

    $('#addDiaAsistenciaF').validate( {
        rules: {
            numeroAs: {
                required: true
            },
            fechaAs: {
                required: true
            }
        },
        messages: {
            numeroAs: {
                required: "Agregar el número de asistencia"
            },
            fechaAs: {
                required: "Agrega la fecha de la asistencia"
            }
        },
        submitHandler: function(form) {
            revisarCheck()
            $.ajax( {
                url: "model/add_diaAsistencia.php",
                type: "POST",
                dataType: "HTML",
                data: "id_dia=" + $("#numeroAs").val() + "&fecha=" + $("#fechaAs").val() + "&fk_clase=" + $("#idClaseAs").val()
            }).done(function(echo) {
                if(echo == "1") {
                    mensajeInfo()
                    mensajeEdit.html("El día de asistencia ha sido agregado")
                    limpiarDiaAsistencia()
                    cargarDetalle($("#idReporteAs").val())
                }
                else if(echo == '2') {
                    mensajeAlerta()
                    mensajeEdit.html("Día de asistencia no agregado")
                }
                else if(echo != '1' && echo != '2') {
                    mensajeAlerta()
                    mensajeEdit.html("El día ya se encuentra registrado")
                }
                mensajeEdit.slideDown(500)
            });
        },
        errorElement: "em",
        errorPlacement: function(error, element) {
            // Add the `help-block` class to the error element
            error.addClass("invalid-feedback");

            if(element.prop("type") === "checkbox") {
                // error.insertAfter(element.parent("label"));
                error.addClass("invalid-feedback");
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        }
    });
    mensajeEdit.hide();
});

//Validación del formulario de editar días de asistencia con el termino "editDiaAsistencia"
$('#editDiaAsistencia').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Botón que activó el modal
    var modal = $(this)

    modal.find('.modal-body #idReporteAsE').val(button.data('idreporte'))
    modal.find('.modal-body #numeroAsE').val(button.data('iddia'))
    modal.find('.modal-body #fechaAsE').val(button.data('fecha'))
    modal.find('.modal-body #idClaseAsE').val(button.data('fkclase'))

    $('#editDiaAsistenciaF').validate( {
        rules: {
            fechaAsE: {
                required: true
            }
        },
        messages: {
            fechaAsE: {
                required: "Ingresa la nueva fecha"
            }
        },
        submitHandler: function(form) {
            $.ajax( {
                url: "model/edit_diaAsistencia.php",
                type: "POST",
                dataType: "HTML",
                data: "id_dia=" + $("#numeroAsE").val() + "&fecha=" + $("#fechaAsE").val() + "&fk_clase=" + $("#idClaseAsE").val()
            }).done(function(echo) {
                if (echo == "1") {
                    mensajeInfo()
                    mensajeEdit.html("El día de asistencia se ha editado con éxito");
                    limpiarDiaAsistenciaE()
                    cargarDetalle( $("#idReporteAsE").val() )
                } else {
                    mensajeAlerta()
                    mensajeEdit.html("Hubo un error al editar el día de asistencia");
                }
                mensajeEdit.slideDown(500);
            });
        },
        errorElement: "em",
            errorPlacement: function(error, element) {
            // Add the `help-block` class to the error element
            error.addClass("invalid-feedback");

            if(element.prop("type") === "checkbox") {
                error.insertAfter(element.parent("label"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        }
    });
    mensajeEdit.hide()
});

//Validación del formulario para tomar asistencia con el termino "takeDiaAsistencia"
$('#takeAsistencia').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Botón que activó el modal
    var modal = $(this)

    var idReporte = button.data('idreporte');
    $('#idReporteAsi').val(idReporte)

    var fkClase = button.data('fkclase');

    ejecutarSelectAjax('POST', 'get_Asistencias.php', 'fk_clase='+fkClase, '#selectFechaAsi');
    ejecutarSelectAjax('POST', 'get_Alumnos.php', 'fk_clase='+fkClase, '#selectAlumnoAsi');

    $('#takeAsistenciaF').validate( {
        rules: {
            selectFechaAsi: {
                required: true
            },
            selectAlumnoAsi: {
                required: true
            }
        },
        messages: {
            selectFechaAsi: {
                required: "Selecciona el día de asistencia"
            },
            selectAlumnoAsi: {
                required: "Selecciona al alumno"
            }
        },
        submitHandler: function(form) {
            $.ajax( {
                url: "model/take_Asistencia.php",
                type: "POST",
                dataType: "HTML",
                data: "fk_dia=" + $("#selectFechaAsi").val() + "&fk_alumno=" + $("#selectAlumnoAsi").val()
            }).done(function(echo) {
                if (echo == "1") {
                    mensajeInfo()
                    mensajeEdit.html("La asistencia fue tomada al alumno");
                    limpiarTomaAsistencia()
                    cargarDetalle( $("#idReporteAsi").val() )
                } else {
                    mensajeAlerta()
                    mensajeEdit.html("Hubo un error al tomar la asistencia");
                }
                mensajeEdit.slideDown(500);
            });
        },
        errorElement: "em",
        errorPlacement: function(error, element) {
            // Add the `help-block` class to the error element
            error.addClass("invalid-feedback");

            if(element.prop("type") === "checkbox") {
                error.insertAfter(element.parent("label"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        }
    });
});

//Validación del formulario de agregar actividades con el termino "addActividad"
$('#addActividad').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Botón que activó el modal
    var modal = $(this)

    var idReporteAc = button.data('idreporte');
    $('#idReporteAc').val(idReporteAc)

    var idClaseAc = button.data('id');
    $('#idClaseAc').val(idClaseAc)

    $('#addActividadF').validate( {
        rules: {
            nombreAc: {
                required: true
            },
            fechaAc: {
                required: true
            }
        },
        messages: {
            nombreAc: {
                required: "Agrega el nombre de la actividad"
            },
            fechaAc: {
                required: "Agrega la fecha de entrega"
            }
        },
        submitHandler: function(form) {
            revisarCheck()
            $.ajax( {
                url: "model/add_Actividad.php",
                type: "POST",
                dataType: "HTML",
                data: "nombre=" + $("#nombreAc").val() + "&fecha=" + $("#fechaAc").val() + "&fk_clase=" + $("#idClaseAc").val()
            }).done(function(echo) {
                if(echo == "1") {
                    mensajeInfo()
                    mensajeEdit.html("La actividad ha sido agregada")
                    limpiarActividad()
                    cargarDetalle($("#idReporteAc").val())
                }
                else if(echo == '2') {
                    mensajeAlerta()
                    mensajeEdit.html("Actividad no agregada")
                }
                else if(echo != '1' && echo != '2') {
                    mensajeAlerta()
                    mensajeEdit.html("La actividad ya se encuentra registrada")
                }
                mensajeEdit.slideDown(500)
            });
        },
        errorElement: "em",
        errorPlacement: function(error, element) {
            // Add the `help-block` class to the error element
            error.addClass("invalid-feedback");

            if(element.prop("type") === "checkbox") {
                // error.insertAfter(element.parent("label"));
                error.addClass("invalid-feedback");
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        }
    });
    mensajeEdit.hide();
});

//Validación del formulario de editar actividades con el termino "editActividad"
$('#editActividad').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Botón que activó el modal
    var modal = $(this)

    modal.find('.modal-body #idReporteAcE').val(button.data('idreporte'))
    modal.find('.modal-body #numeroAcE').val(button.data('idactividad'))
    modal.find('.modal-body #idClaseAcE').val(button.data('fkclase'))
    modal.find('.modal-body #nombreAcE').val(button.data('nombre'))
    modal.find('.modal-body #fechaAcE').val(button.data('fecha'))

    $('#editActividadF').validate( {
        rules: {
            nombreAcE: {
                required: true
            },
            fechaAcE: {
                required: true
            }
        },
        messages: {
            nombreAcE: {
                required: "Ingresa el nuevo nombre de la actividad"
            },
            fechaAcE: {
                required: "Ingresa la nueva fecha"
            }
        },
        submitHandler: function(form) {
            $.ajax( {
                url: "model/edit_Actividad.php",
                type: "POST",
                dataType: "HTML",
                data: "id_actividad=" + $("#numeroAcE").val() + "&fk_clase=" + $("#idClaseAcE").val() + "&nombre=" + $("#nombreAcE").val() + "&fecha=" + $("#fechaAcE").val()
            }).done(function(echo) {
                if (echo == "1") {
                    mensajeInfo()
                    mensajeEdit.html("La actividad se ha editado con éxito");
                    limpiarActividadE()
                    cargarDetalle( $("#idReporteAcE").val() )
                } else {
                    mensajeAlerta()
                    mensajeEdit.html("Hubo un error al editar la actividad");
                }
                mensajeEdit.slideDown(500);
            });
        },
        errorElement: "em",
        errorPlacement: function(error, element) {
            // Add the `help-block` class to the error element
            error.addClass("invalid-feedback");

            if(element.prop("type") === "checkbox") {
                error.insertAfter(element.parent("label"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        }
    });
    mensajeEdit.hide()
});

//Validación del formulario para calificar actividades con el termino "takeActividad"
$('#takeActividad').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Botón que activó el modal
    var modal = $(this)

    var idReporte = button.data('idreporte');
    $('#idReporteAct').val(idReporte)

    var fkClase = button.data('fkclase');

    ejecutarSelectAjax('POST', 'get_Actividades.php', 'fk_clase='+fkClase, '#selectActividadAct');
    ejecutarSelectAjax('POST', 'get_Alumnos.php', 'fk_clase='+fkClase, '#selectAlumnoAct');

    $('#takeActividadF').validate( {
        rules: {
            selectActividadAct: {
                required: true
            },
            selectAlumnoAct: {
                required: true
            },
            calificacionAct: {
                required: true
            }
        },
        messages: {
            selectActividadAct: {
                required: "Selecciona la actividad"
            },
            selectAlumnoAct: {
                required: "Selecciona al alumno"
            },
            calificacionAct: {
                required: "Ingresa la calificación"
            }
        },
        submitHandler: function(form) {
            $.ajax( {
                url: "model/take_Actividad.php",
                type: "POST",
                dataType: "HTML",
                data: "fk_actividad=" + $("#selectActividadAct").val() + "&fk_alumno=" + $("#selectAlumnoAct").val() + "&calificacion=" + $("#calificacionAct").val()
            }).done(function(echo) {
                if (echo == "1") {
                    mensajeInfo()
                    mensajeEdit.html("La actividad fue calificada al alumno");
                    limpiarCalificacionActividad()
                    cargarDetalle( $("#idReporteAct").val() )
                } else if (echo == "2") {
                    mensajeInfo()
                    mensajeEdit.html("Se actualizo la calificación de la actividad al alumno");
                    limpiarCalificacionActividad()
                    cargarDetalle( $("#idReporteAct").val() )
                } else {
                    mensajeAlerta()
                    mensajeEdit.html("Hubo un error al calificar la actividad");
                }
                mensajeEdit.slideDown(500);
            });
        },
        errorElement: "em",
        errorPlacement: function(error, element) {
            // Add the `help-block` class to the error element
            error.addClass("invalid-feedback");

            if(element.prop("type") === "checkbox") {
                error.insertAfter(element.parent("label"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        }
    });
});

//Validación del formulario de agregar examenes con el termino "addExamen"
$('#addExamen').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Botón que activó el modal
    var modal = $(this)

    var idReporteEx = button.data('idreporte')
    $('#idReporteEx').val(idReporteEx)

    var idClaseEx = button.data('id')
    $('#idClaseEx').val(idClaseEx)

    $('#addExamenF').validate( {
        rules: {
            nombreEx: {
                required: true
            },
            fechaEx: {
                required: true
            }
        },
        messages: {
            nombreEx: {
                required: "Agrega el nombre del examen"
            },
            fechaEx: {
                required: "Agrega la fecha de aplicación"
            }
        },
        submitHandler: function(form) {
            revisarCheck()
            $.ajax( {
                url: "model/add_Examen.php",
                type: "POST",
                dataType: "HTML",
                data: "nombre=" + $("#nombreEx").val() + "&fecha=" + $("#fechaEx").val() + "&fk_clase=" + $("#idClaseEx").val()
            }).done(function(echo) {
                if(echo == "1") {
                    mensajeInfo()
                    mensajeEdit.html("El examen ha sido agregado")
                    limpiarExamen()
                    cargarDetalle($("#idReporteEx").val())
                }
                else if(echo == '2') {
                    mensajeAlerta()
                    mensajeEdit.html("Examen no agregado")
                }
                else if(echo != '1' && echo != '2') {
                    mensajeAlerta()
                    mensajeEdit.html("El examen ya se encuentra registrado")
                }
                mensajeEdit.slideDown(500)
            });
        },
        errorElement: "em",
        errorPlacement: function(error, element) {
            // Add the `help-block` class to the error element
            error.addClass("invalid-feedback");

            if(element.prop("type") === "checkbox") {
                // error.insertAfter(element.parent("label"));
                error.addClass("invalid-feedback");
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        }
    });
});

//Validación del formulario de editar examenes con el termino "editExamen"
$('#editExamen').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Botón que activó el modal
    var modal = $(this)

    modal.find('.modal-body #idReporteExE').val(button.data('idreporte'))
    modal.find('.modal-body #numeroExE').val(button.data('idexamen'))
    modal.find('.modal-body #idClaseExE').val(button.data('fkclase'))
    modal.find('.modal-body #nombreExE').val(button.data('nombre'))
    modal.find('.modal-body #fechaExE').val(button.data('fecha'))

    $('#editExamenF').validate( {
        rules: {
            nombreExE: {
                required: true
            },
            fechaExE: {
                required: true
            }
        },
        messages: {
            nombreExE: {
                required: "Ingresa el nuevo nombre del examen"
            },
            fechaExE: {
                required: "Ingresa la nueva fecha"
            }
        },
        submitHandler: function(form) {
            $.ajax( {
                url: "model/edit_Examen.php",
                type: "POST",
                dataType: "HTML",
                data: "id_examen=" + $("#numeroExE").val() + "&fk_clase=" + $("#idClaseExE").val() + "&nombre=" + $("#nombreExE").val() + "&fecha=" + $("#fechaExE").val()
            }).done(function(echo) {
                if (echo == "1") {
                    mensajeInfo()
                    mensajeEdit.html("El examen se ha editado con éxito");
                    limpiarExamenE()
                    cargarDetalle( $("#idReporteExE").val() )
                } else {
                    mensajeAlerta()
                    mensajeEdit.html("Hubo un error al editar el examen");
                }
                mensajeEdit.slideDown(500);
            });
        },
        errorElement: "em",
        errorPlacement: function(error, element) {
            // Add the `help-block` class to the error element
            error.addClass("invalid-feedback");

            if(element.prop("type") === "checkbox") {
                error.insertAfter(element.parent("label"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        }
    });
    mensajeEdit.hide()
});

//Validación del formulario para calificar examenes con el termino "takeExamen"
$('#takeExamen').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Botón que activó el modal
    var modal = $(this)

    var idReporte = button.data('idreporte');
    $('#idReporteExa').val(idReporte)

    var fkClase = button.data('fkclase');

    ejecutarSelectAjax('POST', 'get_Examenes.php', 'fk_clase='+fkClase, '#selectExamenExa');
    ejecutarSelectAjax('POST', 'get_Alumnos.php', 'fk_clase='+fkClase, '#selectAlumnoExa');

    $('#takeExamenF').validate( {
        rules: {
            selectExamenExa: {
                required: true
            },
            selectAlumnoExa: {
                required: true
            },
            calificacionExa: {
                required: true
            }
        },
        messages: {
            selectExamenExa: {
                required: "Selecciona el examen"
            },
            selectAlumnoExa: {
                required: "Selecciona al alumno"
            },
            calificacionExa: {
                required: "Ingresa la calificación"
            }
        },
        submitHandler: function(form) {
            $.ajax( {
                url: "model/take_Examen.php",
                type: "POST",
                dataType: "HTML",
                data: "fk_examen=" + $("#selectExamenExa").val() + "&fk_alumno=" + $("#selectAlumnoExa").val() + "&calificacion=" + $("#calificacionExa").val()
            }).done(function(echo) {
                if (echo == "1") {
                    mensajeInfo()
                    mensajeEdit.html("El examen fue calificado al alumno");
                    limpiarCalificacionExamen()
                    cargarDetalle( $("#idReporteExa").val() )
                } else if (echo == "2") {
                    mensajeInfo()
                    mensajeEdit.html("Se actualizo la calificación del examen al alumno");
                    limpiarCalificacionExamen()
                    cargarDetalle( $("#idReporteExa").val() )
                } else {
                    mensajeAlerta()
                    mensajeEdit.html("Hubo un error al calificar el examen");
                }
                mensajeEdit.slideDown(500);
            });
        },
        errorElement: "em",
        errorPlacement: function(error, element) {
            // Add the `help-block` class to the error element
            error.addClass("invalid-feedback");

            if(element.prop("type") === "checkbox") {
                error.insertAfter(element.parent("label"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        }
    });
});

function revisarCheck() {
    if(!$('#selectA').prop('checked')) {
        $('#selectA').val(" ");
    } else {
        $('#selectA').val("A");
    }
    if(!$('#selectB').prop('checked')) {
        $('#selectB').val(" ");
    } else {
        $('#selectB').val("B");
    }
    if(!$('#selectC').prop('checked')) {
        $('#selectC').val(" ");
    } else {
        $('#selectC').val("C");
    }
}

function revisarCheckE() {
    if(!$('#selectAE').prop('checked')) {
        $('#selectAE').val(" ");
    } else {
        $('#selectAE').val("A");
    }
    if(!$('#selectBE').prop('checked')) {
        $('#selectBE').val(" ");
    } else {
        $('#selectBE').val("B");
    }
    if(!$('#selectCE').prop('checked')) {
        $('#selectCE').val(" ");
    } else {
        $('#selectCE').val("C");
    }
}

function limpiarPass() {
    $("#pass_new").val("");
    $("#pass2").val("");
}

function cargarTablaS(comp) {
    var idReporte = comp.id;
    $("#reportesContainer").load("view/detalle_table.php?id_reporte=" + idReporte)
}

function limpiarReporte() {
    $("#materia").val("");
}

function limpiarAlumno() {
    $("#codigoA").val("");
    $("#nombre").val("");
    $("#selectA").prop('checked', false);
    $("#selectB").prop('checked', false);
    $("#selectC").prop('checked', false);
    $("#motivo").val("");
    $("#comentario").val("");
}

function limpiarDiaAsistencia() {
    $("#numeroAs").val("");
    $("#fechaAs").val("");
}

function limpiarActividad() {
    $("#nombreAc").val("");
    $("#fechaAc").val("");
}

function limpiarExamen() {
    $("#nombreEx").val("");
    $("#fechaEx").val("");
}

function limpiarReporteE() {
    $("#materiaE").val("");
}

function limpiarAlumnoE() {
    $("#codigoAE").val("");
    $("#nombreE").val("");
    $("#selectAE").prop('checked', false);
    $("#selectBE").prop('checked', false);
    $("#selectCE").prop('checked', false);
    $("#motivoE").val("");
    $("#comentarioE").val("");
}

function limpiarDiaAsistenciaE() {
    $("#numeroAsE").val("");
    $("#fechaAsE").val("");
}

function limpiarActividadE() {
    $("#nombreAcE").val("");
    $("#fechaAcE").val("");
}

function limpiarExamenE() {
    $("#nombreExE").val("");
    $("#fechaExE").val("");
}

function limpiarTomaAsistencia() {
    $("#selectFechaAsi").val("");
    $("#selectAlumnoAsi").val("");
}

function limpiarCalificacionActividad() {
    $("#selectActividadAct").val("")
    $("#selectAlumnoAct").val("")
    $("#calificacionAct").val("")
}

function limpiarCalificacionExamen() {
    $("#selectExamenExa").val("")
    $("#selectAlumnoExa").val("")
    $("#calificacionExa").val("")
}

function cargarDetalle(idReporte) {
    $("#reportesContainer").load("view/detalle_table.php?id_reporte=" + idReporte)
}

function cargar() {
    $('#sidenavD').load('view/dinamic_sidenav.php');
}

function ejecutarSelectAjax(metodo, archivoPHP, datos, idEtiqueta) {
    $.ajax({
        type: metodo,
        url: "model/" + archivoPHP,
        dataType: "HTML",
        data: datos,
        success: function(response) {
            // alert(response);
            $(idEtiqueta).html(response).fadeIn();
        }
    });
}