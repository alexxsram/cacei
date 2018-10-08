<?php
//Reanudamos la sesión
session_start();
//Comprobamos si el usario está logueado
//Si no lo está, se le redirecciona al index
//Si lo está, definimos el botón de cerrar sesión y la duración de la sesión
if(!isset($_SESSION['usuario']) and $_SESSION['estado'] != 'Autenticado') {
	header('Location: index.php');
} 
else {
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
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css">
  <style type="text/css">
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {
			height: 1500px;
		}

    /* Set gray background color and 100% height */
    .sidenav {
			padding-top: 100px;
      background-color: #f1f1f1;
      height: 100%;
    }
		.reportesContainer {
			padding-top: 50px;
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

		table th, tr, td {
			text-align: center;
		}

		.accion {
	    width: 180px;
	  }
  </style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<a class="navbar-brand" href="principal.php">Estado académico</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar" aria-controls="myNavbar" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="principal.php">Estado académico</a>
				</li>
				
				<li class="nav-item">
					<a class="nav-link" href="../cacei">CACEI</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="../">Inicio</a>
				</li>
			</ul>

			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-user"></i> <?php echo $_SESSION['nombre'] ?> 
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" data-toggle="modal" href="#editPass">Cambiar contraseña</a>
					</div>
				</li>
				<li class="nav-item">
        	<a class="nav-link" href="../cacei/model/salir.php"> <i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
      	</li>
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
	include("view/add_modal_reporte.php");
	include("view/edit_modal_reporte.php");
	include("view/delete_modal_reporte.php");
?>
	<!-- <script src="../cacei/js/jquery-3.3.1.min.js"></script> -->
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
	<!-- <script src="../cacei/js/jquery.validate.min.js"></script> -->

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>

	<script>
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();
		});

		window.onload = function() {
			$('#sidenavD').load('view/dinamic_sidenav.php');
		}

		function cargar() {
			$('#sidenavD').load('view/dinamic_sidenav.php');
		}

	</script>
	<script src="js/validar_formularios.js" type="text/javascript"></script>
	<script src="js/validar_delete.js" type="text/javascript"></script>
</body>
</html>
