<?php
//Iniciamos la sesión
session_start();
//Pedimos el archivo que controla la duración de las sesiones
require('../cacei/model/sesiones.php');

?>

<html lang="es">

    <!-- Archivos de Cabecera (css, js) -->
    <?php include 'head.php' ?>
	<?php include 'header.php' ?>
    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" style="background-color: white!important; margin: 100px auto; padding: 0;">

	<div class="section" style="margin: 20px auto 100px auto;">
        <!-- campos para login -->
        <div class="section">
            <div class="container">
                <div class="row row-centered">
                    <div class="col-md-4 col-centered" style="float:none; margin: 0 auto; max-width: 300px;">
                        <img src="../imagenes\logo-udg.png" class="center-block img-responsive">
                        <form role="form" id="loginForm">
                            <div class="form-group">
                                <label class="control-label" for="profesor">Código</label>
                                <input class="form-control" id="profesor" placeholder="Ingrese su código de profesor"
                                       type="text" name="profesor" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="inputPassword">Contraseña</label>
                                <input class="form-control" id="inputPassword"
                                       placeholder="Ingrese su contraseña" type="password" name="inputPassword" required>
                            </div>
                            <div id="mensaje" class="form-group">
                            </div>
                            <button type="submit" class="btn btn-block btn-default btn-success">Acceder</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
	</div>

    <script type="text/javascript">
        //Guardamos el contenedor con la clase alert
        var mensajeAdd = $("#mensaje");
        //Ocultamos el contenedor
        mensajeAdd.hide();
        $(document).ready(function() {
            $("#loginForm").validate({
                rules: {
                    profesor: {
                        required: true,
                        digits: true
                    },
                    inputPassword: {
                        required: true,
                        
                    }
                },
                messages: {
                    profesor: {
                        required: "Ingrese su código de profesor",
                        digits: "Sólo dígitos"
                    },
                    inputPassword: {
                        required: "Ingrese la contraseña"
                    }
                },

                submitHandler: function(form) {
                    $.ajax({
                        //Definimos la URL del archivo al cual vamos a enviar los datos
                        url: "../cacei/model/acceder.php",
                        //Definimos el tipo de método de envío
                        type: "POST",
                        //Definimos el tipo de datos que vamos a enviar y recibir
                        dataType: "HTML",
                        //Definimos la información que vamos a enviar
                        data: "profesor=" + $("#profesor").val() + "&inputPassword=" + $("#inputPassword").val()
                    }).done(function(echo) {
                        if (echo == '1') {
                            window.location = "principal.php";
                        } else
                            mensajeAdd.html(echo);
                        mensajeAdd.slideDown(500);
                    });

                },
                errorElement: "em",
                errorPlacement: function(error, element) {
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
                success: function(label, element) {
                    if (!$(element).next("span")[0]) {
                        $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>").insertAfter($(element));
                    }
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
                    $(element).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
                    $(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
                }
            });
        });
    </script>
    </body>
</html>
