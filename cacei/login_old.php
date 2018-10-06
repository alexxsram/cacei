<?php
//Iniciamos la sesión
session_start();
//Pedimos el archivo que controla la duración de las sesiones
require('model/sesiones.php');

?>
    <html lang="es">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Identificate</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/signin.css" rel="stylesheet">
    </head>

    <body class="text-center">

        <form class="form-signin" id="loginForm" style="background-color: white;border-radius: 15px;">
            <img class="mb-4" src="css/logo.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal" style="color: black">Inicia Sesión</h1>
            <label for="inputEmail" class="sr-only">Código</label>
            <input type="text" id="profesor" name="profesor" class="form-control" placeholder="Ingrese su código de profesor" required autofocus>
            <br />
            <label for="inputPassword" class="sr-only">Contraseña</label>
            <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
            <div id="mensaje" style="border:1px solid #CCC;">
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
            <p class="mt-5 mb-3" style="color: black;">&copy; 2018 Universidad de Guadalajara</p>
        </form>

        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script type="text/javascript">
            //Guardamos el contenedor con la clase alert
            var mensajeAdd = $("#mensaje");
            //Ocultamos el contenedor
            mensajeAdd.hide();
            $(document).ready(function() {
                $("#loginForm").validate({
                    rules: {
                        profesor: {
                            required: true
                        },
                        inputPassword: {
                            required: true
                        }
                    },
                    messages: {
                        profesor: {
                            required: "Ingrese su código de profesor"
                        },
                        inputPassword: {
                            required: "Ingrese la contraseña"
                        }
                    },

                    submitHandler: function(form) {
                        $.ajax({
                            //Definimos la URL del archivo al cual vamos a enviar los datos
                            url: "model/acceder.php",
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
