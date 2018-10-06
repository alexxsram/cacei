<?php 
	$conexion = mysqli_connect("localhost","cvmaestros","H52ZhcNUD", "cvmaestros_db");
	//Se obtiene el codigo utilizado en la sesion
	SESSION_START();
	$codigo = $_SESSION["codigo"];
	$query = "SELECT programa FROM habilidadcomputo WHERE codigo = $codigo";
	$resultadoConsulta = mysqli_query($conexion, $query);
	//Se comprueba que el resultado del query tenga una fila como resultado
	$html = '<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
		    <link href="http://johnafleming.cucei.udg.mx/cvmaestros/css/bootstrap.css" rel="stylesheet" type="text/css">		  </head>
	      <div class="container">';
	//Se comprueba primero que haya un resultado de la consulta
	if(mysqli_num_rows($resultadoConsulta) > 0)
	{
		$html = $html.'<form class="form-horizontal" role="form" action="modificarProgramaHabilidad.php" method="post">
	<label>Programas</label>';
		//Se muestran los datos por cada fila del resultado
		while(($row = mysqli_fetch_assoc($resultadoConsulta)) != NULL){
			$html = $html.'
	                <div class="col-md-12  panel-default">
		        <label>
                        <input required type="radio" name="programaSeleccionado" value="'.$row["programa"].'">'.$row["programa"].'</label>
	                </div>';
		}
		$html = $html.'<div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default">Modificar</button>
                </div>
	</form>';
	}
	else
	{
		$html = $html.'<div align="center">
		<img src="../images/logo-udg.png">
		<h1>No tiene habilidades de computo</h1>
		</div>';
	}
	$html = $html.'</div>';
	echo $html;

	function eliminaEspacioEnBlanco($cadena)
	{
		return str_replace(' ', '', $cadena);
	}
?>