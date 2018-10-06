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
	require('model/sesiones.php');
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>CACEI</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index_css.css">

    <script>
        window.onload = function() {
            cargar();
        }

        function cargar() {
					 $('#mostrarProfesor').load('view/profesor_informacion.php');
            $('#formacionTable').load('view/tables/formacion_academica_table.php');
            $('#gestionTable').load('view/tables/gestion_academica_table.php');
            $('#productoTable').load('view/tables/producto_academico_table.php');
            $('#capacitacionTable').load('view/tables/capacitacion_table.php');
            $('#actualizacionTable').load('view/tables/actualizacion_table.php');
            $('#expPtable').load('view/tables/experienciaP_table.php');
            $('#expDtable').load('view/tables/experienciaD_table.php');
            $('#logroTable').load('view/tables/logro_table.php');
            $('#membresiaTable').load('view/tables/membresia_table.php');
            $('#premioTable').load('view/tables/premio_table.php');
            $('#PETable').load('view/tables/PE_table.php');
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
                <a class="navbar-brand" href="#">CACEI</a>
            </div>
            <div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Académica <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#section21">Formación</a></li>
                                <li><a href="#section22">Gestión</a></li>
                                <li><a href="#section23">Productos</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#section3">Capacitación</a>
                        </li>
                        <li>
                            <a href="#section4">Actualización</a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Experiencia <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#section51">Profesional</a></li>
                                <li><a href="#section52">Diseño ingenieril</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#section6">Logros</a>
                        </li>
                        <li>
                            <a href="#section7">Membresía</a>
                        </li>
                        <li>
                            <a href="#section8">Premios</a>
                        </li>
                        <li>
                            <a href="#section9">Participación</a>
                        </li>

                    </ul>
                      <ul class="nav navbar-nav navbar-right">
												<!--
      <li><a href="#section1"><span class="glyphicon glyphicon-user"></span> Profesor: </a></li>
		-->
		<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['nombre'] ?> <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li>
						<a href="../estadoAcademico/">Estado académico</a>
					</li>
						<li><a data-toggle="modal" data-target="#editPass">Cambiar contraseña</a></li>
						<li><a href="examples/CACEI_reporte.php" target="_blank"> Crear reporte </a></li>
				</ul>
		</li>
      <li><a href="model/salir.php"><span class="glyphicon glyphicon-log-in"></span> Cerrar sesión</a></li>
    </ul>
                </div>
            </div>

        </div>
    </nav>
    <div class="container">
        <div id="section1" class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1>Datos personales</h1>

                <!--Form datos personales-->
								<div id="mostrarProfesor">
							</div>
						</div>
        </div>

        <div id="section21">
            <h1>Formación académica</h1>
            <!--boton para llamar al formulario modal, para agregar formacion academica-->
							<div class="boton-espacio">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addFormacion">Agregar</button>
            <!--Tabala responsive de formacion academica-->
					</div>
						<div class="table-responsive pre-scrollable" id="formacionTable">
            </div>
        </div>

        <div id="section22">
            <h1>Gestión académica</h1>
            <p>Anotar las actividades o puestos académicos desempeñados</p>
							<div class="boton-espacio">
						<!--boton para llamar al formulario modal, para agregar gestion academica-->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addGestion">Agregar</button>
					</div>
						<!--Tabala responsive de gestion academica-->

            <div class="table-responsive pre-scrollable" id="gestionTable">
            </div>
        </div>

        <div id="section23">
            <h1>Productos académicos relevantes</h1>
            <p>Productos académicos relevantes en los últimos cinco (5) años, relacionados con el PE</p>
            <!--boton para llamar al formulario modal, para agregar productos academicos-->
						<div class="boton-espacio">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProd">Agregar</button>
						</div>
            <!--Tabala responsive de los productos academicos-->
            <div id="productoTable" class="table-responsive pre-scrollable">
            </div>
        </div>
        <div id="section3">
            <h1>Capacitación docente</h1>
						<div class="boton-espacio">
						<!--boton para llamar al formulario modal, para agregar capacitacion docente-->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCapacitacion">Agregar</button>
						</div>
						<!--Tabala responsive de capacitaciones docentes-->
            <div class="table-responsive pre-scrollable" id="capacitacionTable"></div>
        </div>
        <div id="section4">
            <h1>Actualización docente</h1>
            <!--boton para llamar al formulario modal, para agregar Actualización docente-->
							<div class="boton-espacio">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addActualizacion">Agregar</button>
            <!--Tabala responsive de Actualizaciónes docentes-->
					</div>
						<div id="actualizacionTable" class="table-responsive pre-scrollable">
            </div>
        </div>
        <div id="section51">
            <h1>Experiencia profesional (no académica)</h1>
            <p>Anotar las actividades o puestos desempeñados en orden cronológico decreciente: primero la más reciente (o actual) y de último la más antigüa</p>
            <!--boton para llamar al formulario modal, para agregar Experiencia profesional (no académica)-->
							<div class="boton-espacio">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addExperienciaP">Agregar</button>
            <!--Tabala responsive de experiencia profesional-->
					</div>
						<div id="expPtable" class="table-responsive pre-scrollable">
            </div>
        </div>
        <div id="section52">
            <h1>Experiencia en diseño ingenieril</h1>
            <p>Anotar el tipo de experiencia en diseño, el lugar donde se realizó, el número de años y, en su caso, asi alguna otra información relevante.</p>
							<div class="boton-espacio">
						<!--boton para llamar al formulario modal, para agregar Experiencia en diseño ingenieril-->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addExperienciaD">Agregar</button>
					</div>
						<!--Tabala responsive de Experiencia en diseño ingenieril-->
            <div id="expDtable" class="table-responsive pre-scrollable">
            </div>
        </div>
        <div id="section6">
            <h1>Logros profesionales (no académicos)</h1>
            <p>Relevantes en los últimos cinco (5) años, relacionados con el PE</p>
							<div class="boton-espacio">
						<!--boton para llamar al formulario modal, para agregar logros profesionales-->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addLogro">Agregar</button>
					</div>
						<!--Tabala responsive de Experiencia en diseño ingenieril-->
            <div id="logroTable" class="table-responsive pre-scrollable">
            </div>
        </div>
        <div id="section7">
            <h1>Membresía o participación</h1>
            <p>En en Colegios, Cámaras, asociaciones científicas o algún otro tipo de organismo profesional</p>
							<div class="boton-espacio">
						<!--boton para llamar al formulario modal, para agregar logros profesionales-->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMembresia">Agregar</button>
					</div>
						<!--Tabala responsive de mebresias...-->
            <div id="membresiaTable" class="table-responsive pre-scrollable">
            </div>
        </div>
        <div id="section8">
            <h1>Premios, distinciones o reconocimientos recibidos</h1>
							<div class="boton-espacio">
						<!--boton para llamar al formulario modal, para agregar Premios, distinciones o reconocimientos recibidos-->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPremio">Agregar</button>
					</div>
						<!--Tabala responsive de Premios, distinciones...-->
            <div id="premioTable" class="table-responsive pre-scrollable">
            </div>
        </div>
        <div id="section9">
            <h1>PE</h1>
            <p>Participación en el análisis o actualización del PE, o en actividades extracurriculares relacionadas con el PE</p>
            <!--Tabala responsive de Premios, distinciones...-->
            <div id="PETable" class="table-responsive pre-scrollable">
            </div>
        </div>
    </div>
    <!--llamar a los scripts que contienen los formularios modal ADD-->
    <?php include 'view/modal/add_modals.php'?>
    <!--llamar a los scripts que contienen los formularios modal EDIT-->
    <?php include 'view/modal/edit_modals.php'?>
		<!--llamar a los scripts que contienen los formularios modal DELETE-->
		<?php include 'view/modal/delete_modals.php'?>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/add_validation.js"></script>
    <script type="text/javascript" src="js/cargar_edits.js"></script>
		<script type="text/javascript" src="js/registros_delete.js"></script>
</body>
</html>
