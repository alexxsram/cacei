<?php
//Reanudamos la sesión
session_start();
//Comprobamos si el usario está logueado
//Si no lo está, se le redirecciona al index
//Si lo está, definimos el botón de cerrar sesión y la duración de la sesión
if(!isset($_SESSION['usuario']) and $_SESSION['estado'] != 'Autenticado') {
	header('Location: index.php');
} else {
	$estado = $_SESSION['usuario'];
	require('../cacei/model/sesiones.php');
}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Reporte de estado académico</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style>
            /* Set height of the grid so .sidenav can be 100% (adjust if needed) */

            .row.content {
                height: 1500px
            }

            /* Set gray background color and 100% height */

            .sidenav {
                padding-top: 50px;
                background-color: #f1f1f1;
                height: 100%;
            }

            .reportesContainer {
                padding-top: 100px;
            }

            /* On small screens, set height to 'auto' for sidenav and grid */

            @media screen and (max-width: 767px) {
                .sidenav {
                    height: auto;
                    padding: 15px;
                }
                .row.content {
                    height: auto;
                }
            }

            .detalle {
                padding-top: 50px;
            }

            table th,
            tr,
            td {
                text-align: center;
            }

            .accion {
                width: 180px;
            }

        </style>
    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <!--Collapsing The Navigation Bar-->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
                    <a class="navbar-brand" href="#">Estado académico</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Estado académico</a></li>
                        <li><a href="../cacei/">CACEI</a></li>
                        <li><a href="../">Inicio</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['nombre'] ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li data-toggle="modal" data-target="#editPass"><a href="#">Cambiar contraseña</a></li>
                            </ul>
                        </li>
                        <li><a href="../cacei/model/salir.php"><span class="glyphicon glyphicon-log-out"></span> Cerrar sesión</a></li>
                    </ul>
                </div>
        </nav>

        <div class="container-fluid">
            <div class="row content">
                <div class="col-sm-2 sidenav" id="sidenavD">
                </div>

                <div class="col-sm-10 reportesContainer" id="reportesContainer">
                </div>
            </div>
        </div>


        <?php
	include("view/add_modals_reporte.php");
	include("view/edit_modal_reporte.php");
	include("view/delete_modal_reporte.php");
?>
        <script src="../cacei/js/jquery-3.3.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="../cacei/js/jquery.validate.min.js"></script>
        <script>
            $(document).ready(function() {
                $('[data-toggle="tooltip"]').tooltip();
                var otherM = $("#otherMotivo");
                otherM.hide();
                
                $('#motivo').change(function() {
                    if ($('#motivo option:selected').val() == 1) {
                          otherM.show();
                    } else {
                        otherM.hide();
                    }
                });
            });
            window.onload = function() {
                $('#sidenavD').load('view/dinamic_sidenav.php');

            }

            function cargar() {
                $('#sidenavD').load('view/dinamic_sidenav.php');
                //$('#reportesContainer').load('view/reporte_table.php');
            }

        </script>
        <script src="js/validar_formularios.js" type="text/javascript"></script>
        <script src="js/validar_delete.js" type="text/javascript"></script>
    </body>

    </html>
