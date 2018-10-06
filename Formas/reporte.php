<?php 
	$conexion = mysqli_connect("localhost","cvmaestros","H52ZhcNUD", "cvmaestros_db");
	$query = "SELECT nombre, email, codigo FROM `maestro`";
	$resultadoConsulta = mysqli_query($conexion, $query);
	$codigoHTML = '<head>
	<style>
		table {
			width:50%;
		}
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
		}
		th, td {
			padding: 10px;
			text-align: left;
		}
		table#t01 tr:nth-child(even) {
			background-color: #ddd;
		}
		table#t01 tr:nth-child(odd) {
		   background-color:#fff;
		}
		table#t01 th {
			background-color: black;
			color: white;
		}
		</style>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../Formas/css/bootstrap.css" rel="stylesheet" type="text/css">
		</head>
		<body>
		<br>
		<div align="center">
		<h1>Universidad de Guadalajara</h1>
		<img src="../imagenes/logo-udg.png">
		<br><br><br><br>
		</div>
		<div class="section">
		<div class="container">
		<form class="form-horizontal" role="form" action="generarPdf.php" method="post">';
	$htmlMaestros = "";
	if(mysqli_num_rows($resultadoConsulta) > 0)
	{
		while(($row = mysqli_fetch_assoc($resultadoConsulta)) != NULL){
			$htmlMaestros = $htmlMaestros.'<table id="t01" align="center">
				<tr><th width="10%">Codigo</th><th>'.$row["codigo"].'</th></tr>
				<tr><td width="10%">Nombre</td><td>'.$row["nombre"].' '.$row["apellidoPaterno"].' '.$row["apellidoMaterno"].'</td></tr>
				<tr><td width="10%">Email</td><td>'.$row["email"].'</td></tr>
				</table>
				<br>';
		}
	}
	else
	{
		$htmlMaestros = $htmlMaestros.'<h1>No hay  maestros registrados</h1>';
	}
	$htmlFinal = '
	 <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10" align="center">
                  <button type="submit" class="btn btn-default">Descargar PDF</button>
                </div>
				
				<input type="hidden" name="codigoHTML" value="$htmlMaestros">
              </div>
	</form>
	</div>
	</div>
	</body>';
	
	echo $codigoHTML.$htmlMaestros.$htmlFinal;

?>



<?php
session_start();
	function agregaSelectRango($inicio, $fin)
	{
		for($i = $inicio; $i <= $fin; $i++)
		{
			echo '<option>'.sprintf("%02d", $i).'</option>';
		}
	}
?>

<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Arvo:400,700|Montserrat:400,700"
              rel="stylesheet">
        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../css/general.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../css/navbar.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../css/half-slider.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../css/circle-avatar.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../css/academicos.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="../css/consulta.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <!-- jQuery -->
        <script src="../js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>
        <!-- Scrolling Nav JavaScript -->
        <script src="../js/jquery.easing.min.js"></script>
        <script src="../js/scrolling-nav.js"></script>
        <script src="../js/navbar.js"></script>
        <title>DIVEC | Personal Academico</title>
    </head>

    <body style="background-color: #282B2D; margin: 0 auto; padding: 0;">
        <!-- Navegación (Menu) -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button id="menu" type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar" id="t"></span>
                        <span class="icon-bar" id="m"></span>
                        <span class="icon-bar" id="b"></span>
                    </button>
                    <a class="page-scroll" href="#page-top">
                        <div class="brand-container">
                            <h1 class="divecTitle">DIVEC</h1>
                            <h1 class="divecPipe">|</h1>
                            <h4 class="personalTitle">Personal Academico</h4>
                        </div>
                    </a>
                </div>

                <!-- Toma todos los links del menu para condensar el menu movil -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden">
                            <a class="page-scroll" href="#page-top"></a>
                        </li>
                        <li>
                            <a class="" href="index.php">Inicio</a>
                        </li>
                        <li>
                            <a class="" href="buscar.php">Personal Academico</a>
                        </li>
                        <li>
                            <a class="" href="">Contacto</a>
                        </li>
                        <?php
                        if(empty($_SESSION)) {
                            echo "<li><a class=\"login-button\" id=\"login-button\" href=\"login.php\">Iniciar Sesi&oacute;n</a></li>";
                        } else {
                            echo "<li><a class=\"logout-button\" id=\"logout-button\" href=\"php/logout.php\" style=\"\">Cerrar Sesi&oacute;n</a></li>";
                        }
                        ?>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        
    </body>

</html>
