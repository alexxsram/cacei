<?php
//Reanudamos la sesión
session_start();
//Comprobamos si el usario está logueado
//Si no lo está, se le redirecciona al index
//Si lo está, definimos el botón de cerrar sesión y la duración de la sesión
if(!isset($_SESSION['admin']) and $_SESSION['estado_a'] != 'Autenticado') {
	header('Location: index.php');
} else {
	$estado = $_SESSION['usuario'];
	require('../model/sesiones.php');
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>CACEI</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/index_css.css">

    <script>
        window.onload = function() {
            cargar();
        }
        function cargar() {
					 $('#profesorTable').load('view/profesores_table.php');
					 $('#adminTable').load('view/administrador_table.php');
        }
    </script>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
                <a class="navbar-brand" href="#">CACEI Admin</a>
            </div>
            <div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="#section1">Profesores</a>
                        </li>
                        <li>
                            <a href="#section2">Administradores</a>
                        </li>
                    </ul>
                      <ul class="nav navbar-nav navbar-right">
												<!--
      <li><a href="#section1"><span class="glyphicon glyphicon-user"></span> Profesor: </a></li>
		-->
		<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['nombre'] ?> <span class="caret"></span></a>
				<ul class="dropdown-menu">
						<li><a data-toggle="modal" data-target="#editPass" data-id="<?php echo $_SESSION['admin'] ?>">Cambiar contraseña</a></li>
				</ul>
		</li>
      <li><a href="salir_admin.php"><span class="glyphicon glyphicon-log-in"></span> Cerrar sesión</a></li>
    </ul>
                </div>
            </div>

        </div>
    </nav>
    <div class="container">

        <div id="section1">
            <h1>Profesores registrados</h1>
            <!--boton para llamar al formulario modal, para agregar formacion academica-->
            <div class="boton-espacio">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProfesor">Agregar</button>
            </div>
            <!--Tabala responsive de formacion academica-->

            <div class="table-responsive pre-scrollable tabla" id="profesorTable">
            </div>
        </div>

        <div id="section2">
            <h1>Administradores registrados</h1>
            <!--boton para llamar al formulario modal, para agregar gestion academica-->
						<div class="boton-espacio">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addAdmin">Agregar</button>
            </div>
            <!--Tabala responsive de gestion academica-->
            <div class="table-responsive pre-scrollable" id="adminTable">
            </div>
        </div>

    </div>
    <!--llamar a los scripts que contienen los formularios modal ADD-->
    <?php include 'view/add_modal_admin.php'?>
    <!--llamar a los scripts que contienen los formularios modal EDIT-->
    <?php include 'view/edit_modal_admin.php'?>
		<!--llamar a los scripts que contienen los formularios modal DELETE-->
		<?php include 'view/delete_modal_admin.php'?>

    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
		<script src="js/delete_admin.js"></script>
		<script type="text/javascript">
			//Guardamos el contenedor con la clase alert
			var mensajeEdit = $(".alert-info");
			//Ocultamos el contenedor
			mensajeEdit.hide();
			  $('#addProfesor').on('show.bs.modal', function (event) {
					$("#addProfesorF").validate({
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
											minlength: 4,
											digits: true
									},
									pass: {
										required: true,
										minlength: 8
									},
									pass2: {
										required: true,
										minlength: 8,
										equalTo: "#pass"
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
											digits: "Solo se permiten números"
									},
									pass: {
										required: "Ingrese la contraseña",
										minlength: "La contraseña consta de al menos 8 caracteres"
									},
									pass2: {
										equired: "Debe de confirmar la contraseña",
										minlength: "La contraseña consta de al menos 8 caracteres",
										equalTo: "Las contraseñas no coiciden"
									}

							},
							submitHandler: function (form) {
									$.ajax({
											url: "adds/profesor_add.php",
											type: "POST",
											dataType: "HTML",
											data: "nombre=" + $("#nombre").val() + "&app=" + $("#app").val() + "&apm=" + $("#apm").val() + "&puesto=" + $("#puesto").val() + "&codigo=" + $("#codigo").val() + "&pass=" + $("#pass2").val()
									}).done(function (echo) {
										if (echo == "1") {
												mensajeEdit.html("El profesor ha sido registrado con éxito")
												cargarProfesor()
												limpiarProfesor()
										} else {
												mensajeEdit.html(echo)
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
					ocultarMensajeEdit()
				});

				$('#addAdmin').on('show.bs.modal', function (event) {
					$("#addAdminF").validate({
							rules: {
									nombreAdm: {
											required: true,
											minlength: 2,
											maxlength: 255
									},
									appAdm: {
											required: true,
											minlength: 2,
											maxlength: 255
									},
									apmAdm: {
											required: true,
											minlength: 2,
											maxlength: 255
									},
									userAdm: {
										required: true,
										digits: true
									},
									passAdm: {
										required: true,
										minlength: 8
									},
									pass2Adm: {
										required: true,
										minlength: 8,
										equalTo: "#passAdm"
									}
							},
							messages: {
									nombreAdm: {
											required: "Por favor, ingresa tu nombre",
											minlength: "Su nombre debe constar de al menos 2 caracteres",
											maxlength: "Ha sobrepasado el número máximo de caracteres "
									},
									userAdm: {
										required: "Ingrese el nombre de usuario",
										digits: "Solo digitos"
									},
									appAdm: {
											required: "Por favor, ingrese su apellido paterno",
											minlength: "Su epeliido paterno debe constar de al menos 2 caracteres",
											maxlength: "Ha sobrepasado el número máximo de caracteres "
									},
									apmAdm: {
											required: "Por favor, ingrese su apellido materno",
											minlength: "Su apellido materno nombre debe constar de al menos 2 caracteres",
											maxlength: "Ha sobrepasado el número máximo de caracteres "
									},
									passAdm: {
										required: "Ingrese la contraseña",
										minlength: "La contraseña consta de al menos 8 caracteres"
									},
									pass2Adm: {
										equired: "Debe de confirmar la contraseña",
										minlength: "La contraseña consta de al menos 8 caracteres",
										equalTo: "Las contraseñas no coiciden"
									}

							},
							submitHandler: function (form) {
									$.ajax({
											url: "adds/admin_add.php",
											type: "POST",
											dataType: "HTML",
											data: "nombre=" + $("#nombreAdm").val() + "&app=" + $("#appAdm").val() + "&apm=" + $("#apmAdm").val() +
											"&user=" + $("#userAdm").val() + "&pass=" + $("#pass2Adm").val()
									}).done(function (echo) {
										if (echo == "1") {
												mensajeEdit.html("El administrador ha sido registrado con éxito")
												cargarAdmin()
										} else {
												mensajeEdit.html(echo)
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
					ocultarMensajeEdit()
					cargarAdmin()
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
										pass_new2: {
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
										pass_new2: {
												required: "Debe de confirmar la contraseña",
												minlength: "La contraseña consta de al menos 8 caracteres",
												equalTo: "Las contraseñas no coiciden"
										}
								},
								submitHandler: function (form) {
										$.ajax({
												url: "password_edit.php",
												type: "POST",
												dataType: "HTML",
												data: "pass=" + $("#pass_new2").val() + "&id=" + button.data('id')
										}).done(function (echo) {
												if(echo == '1'){
														mensajeEdit.html("La Contraseña ha sido editada con éxito");
														cargarAdmin()
														limpiarPassword()
												}else
														mensajeEdit.html(echo)
												mensajeEdit.slideDown(500)
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
						ocultarMensajeEdit()
					});

					$('#restablecer').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var modal = $(this)
    var titulo = $("#h2Formacion")
    var buttonD = $("#btnFormacion")
		var _id = button.data('id');
    titulo.html("Se restablecera la contraseña al siguiente código: " + _id)
    $( "#restablecerF" ).submit(function( event ) {
    			 $.ajax({
    					type: "POST",
    					url: "password_prof.php",
              dataType: "HTML",
    					data: "id=" + _id +"&pass=" + _id
    			}).done(function (echo){
            if(echo == '1'){
                mensajeEdit.html("La contraseña ha sido restablecida")
                buttonD.hide();
                $("#btnFormacionI").html("Cerrar")
            }else
              mensajeEdit.html(echo);

              mensajeEdit.slideDown(500);
          });
    		  event.preventDefault();
    		});
				ocultarMensajeEdit()
			});

					function ocultarMensajeEdit() {
	            mensajeEdit.hide();
	        }
					function limpiarPassword(){
						$("#pass_new").val("");
						$("#pass_new2").val("");
					}
					function limpiarAdmin(){
						$("#userAdm").val("");
						$("#nombreAdm").val("");
						$("#appAdm").val("");
						$("#apmAdm").val("");
						$("#passAdm").val("");
						$("#pass2Adm").val("");
					}
					function limpiarProfesor(){
						$("#codigo").val("");
						$("#nombre").val("");
						$("#app").val("");
						$("#apm").val("");
						$("#pass").val("");
						$("#pass2").val("");
					}

					function cargarProfesor(){
						 $('#profesorTable').load('view/profesores_table.php');
					}
					function cargarAdmin() {
						$('#adminTable').load('view/administrador_table.php');
					}
		</script>
    <!--
    <script type="text/javascript" src="js/add_validation.js"></script>
		<script type="text/javascript" src="js/registros_delete.js"></script>
  	-->
</body>
</html>
