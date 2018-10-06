<?php

	session_start();
    include('../includes/conexion.php');
	$query = "SELECT nombre, email, codigo FROM `maestro`";
	$resultadoConsulta = mysqli_query($conexion, $query);
	$codigoHTML = '
	<head>
		  <title>Reporte General de Academicos</title>
	      <style>
			table, td, th, tr{
				border-collapse: collapse;
			}
			tr:nth-child(even) {
				background-color: #fff;
			}
			td, th {
				border-bottom: 1px solid #dddddd;
				border-top: 1px solid #dddddd;
				text-align: left;
				padding: 8px;
			}
			tr{
				background-color: #eeeeee;
				align: left;
			}
			.footer {
				width: 100%;
				text-align: center;
				position: fixed;
				bottom: 0px;
			}
			.pagenum:before {
				content: counter(page);
			}
        </style>
		</head>
	<body style="margin: padding: 0;>
       <div class="container">
	   	<div class="row">
                <div>
                    <img src="../imagenes/logo-udg.png" class="center-block img-responsive" style="margin: 0px auto;" width="150">
                </div>
				<center>
                <div>
				      <br><br><br>
                      <p style="color: #76323F"> Reporte de Información General de Personal Academico<br> -DIVEC-
                      </p>
                 </div>
				</center>
           </div>
		   <div class="footer">
				Pagina <span class="pagenum"></span>
			</div>
			<br>
			 <table>
				<tr>
					<th width="100">Codigo</th>
					<th width="230">Nombre</th>
					<th width="160">Email</th>
				</tr>';
	if(mysqli_num_rows($resultadoConsulta) > 0)
	{
		while(($row = mysqli_fetch_assoc($resultadoConsulta)) != NULL){
			$codigoHTML = $codigoHTML.'
			<tr>
				<td>'.$row['codigo'].'</td>
				<td>'.$row["nombre"].' '.$row["apellidoPaterno"].' '.$row["apellidoMaterno"].'</td>
				<td>'.$row['email'].'</td>
			</tr>
			<br>';
		}
		$codigoHTML = $codigoHTML.'</table>';
	}
	else
	{
		$codigoHTML = $codigoHTML.'<h1>No hay  maestros registrados</h1>';
	}
	$htmlFinal = '

	</div>
	</div>
	</body>
    ';
	require_once('../Formas/dompdf/dompdf_config.inc.php');
	$dompdf=new DOMPDF();
	$dompdf->load_html(utf8_decode($codigoHTML));
	ini_set("memory_limit","128M");
	$dompdf->render();
	$dompdf->stream("Reporte_meastros.pdf");
?>