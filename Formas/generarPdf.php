<?php

	$conexion = mysqli_connect("localhost","cvmaestros","H52ZhcNUD", "cvmaestros_db");
	$query = "SELECT nombre, email, codigo FROM `maestro`";
	$resultadoConsulta = mysqli_query($conexion, $query);
	$codigoHTML = '
	<style>
	table {
		font-family: arial, sans-serif;
		width:100%;
		border-radius: 5px;
	}
	table, th, td {
		border: 1px solid black;
		border-collapse: collapse;
	}
	th, td {
		padding: 5px;
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
	.header,
	.footer {
		width: 100%;
		text-align: center;
		position: fixed;
	}
	.header {
		top: 0px;
	}
	.footer {
		bottom: 0px;
	}
	.pagenum:before {
		content: counter(page);
	}
	</style>
	<div align="center">
	<h1>Universidad de Guadalajara</h1>
		<img src="../imagenes/logo-udg.png">
		<br>
	</div>
	 <table class="table table-striped table-condensed table-hover">
        	<tr>
                <th width="150">Codigo</th>
            	<th width="300">Nombre</th>
                <th width="200">Email</th>
            </tr>
	</table>
	<div class="footer">
		Pagina <span class="pagenum"></span>
	</div>';
	if(mysqli_num_rows($resultadoConsulta) > 0)
	{
		while(($row = mysqli_fetch_assoc($resultadoConsulta)) != NULL){
			$codigoHTML = $codigoHTML.'
			<table id="t01">
			<tr><th width="10%">Codigo</th><th>'.$row["codigo"].'</th></tr>
			<tr><td width="10%">Nombre</td><td>'.$row["nombre"].' '.$row["apellidoPaterno"].' '.$row["apellidoMaterno"].'</td></tr>
			<tr><td width="10%">Email</td><td>'.$row["email"].'</td></tr>
			</table>
			<br>';
		}
	}
	else
	{
		$codigoHTML = $codigoHTML.'<h1>No hay  maestros registrados</h1>';
	}

	require_once('dompdf/dompdf_config.inc.php');
	$dompdf=new DOMPDF();
	$dompdf->load_html($codigoHTML);
	ini_set("memory_limit","128M");
	$dompdf->render();
	$dompdf->stream("Reporte_meastros.pdf");
?>