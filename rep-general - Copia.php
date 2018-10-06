<?php 
    include('./includes/conexion.php');
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
		<link href="./Formas/css/bootstrap.css" rel="stylesheet" type="text/css">
		</head>
		<body>
		<br>
		<div align="center">
		<h1>Universidad de Guadalajara</h1>
		<img src="./imagenes/logo-udg.png">
		<br><br><br><br>
		</div>
		<div class="section">
		<div class="container">
		<form class="form-horizontal" role="form" action="./Formas/generarPdf.php" method="post">';
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
    <!-- Archivos de Cabecera (css, js) -->
    <?php include 'includes/head.php'; ?>

    <body style="background-color: #282B2D; margin: 0 auto; padding: 0;">

        <!-- Menu -->
        <?php include 'includes/header.php'; ?>
        
    </body>

</html>
