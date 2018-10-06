<?php 
	//Se obtiene el codigo utilizado en la sesion
	SESSION_START();
	$codigo = $_SESSION["codigo"];
	$nombresdatosEnteros = array(
		"duracion",
		"cp",
		"telefono",
		"monto",
		"tipoCambio",
	);
	
	$nombresdatosCadena = array(
		"nivel",
		"tituloObtenido",
		"fecha",
		"institucion",
		"estadoEstudio",
		"nombrePosgrado",
		"disciplina",
		"fechaInicio",
		"fechaFin",
		"grado",
		"nombreTesis",
		"domicilio",
		"colonia",
		"municipio",
		"estado",
		"pais",
		"recibeApoyo",
		"frecuencia",
		"duracionManutencion",
		"fuenteFinanciera",
		"manutencion",
		"transporte",
		"seguroMedico",
		"instalacion",
		"materialBibliografico",
	);
	
	$datos = array();
	
	for($i = 0, $j = sizeof($nombresdatosCadena); $i < $j; $i++ ){
		$datos[$nombresdatosCadena[$i]] = (darValorAgregar($_POST[$nombresdatosCadena[$i]]));
	}
	
	for($i = 0, $j = sizeof($nombresdatosEnteros); $i < $j; $i++ ){
		$datos[$nombresdatosEnteros[$i]] = (darValorAgregar($_POST[$nombresdatosEnteros[$i]], "entero"));
	}
	
		$conexion = mysqli_connect("localhost","cvmaestros","H52ZhcNUD", "cvmaestros_db");
		//Se forma el query que se utilizara con la base de datos
		$query = "INSERT INTO `estudio` (codigo, ";
		//Se agregan los nombres de las columnas
				for($i = 0, $j = sizeof($nombresdatosCadena); $i < $j; $i++ ){
			$query = $query.$nombresdatosCadena[$i].', ';
		}
	
		for($i = 0, $j = (sizeof($nombresdatosEnteros) - 1); $i < $j; $i++ ){
			$query = $query.$nombresdatosEnteros[$i].', ';
		}
		$query = $query.$nombresdatosEnteros[sizeof($nombresdatosEnteros) - 1];
		$query = $query.') VALUES ('.$codigo.', ';
		for($i = 0, $j = sizeof($nombresdatosCadena); $i < $j; $i++ ){
			$query = $query.$datos[$nombresdatosCadena[$i]].', ';
		}
	
		for($i = 0, $j = (sizeof($nombresdatosEnteros) - 1); $i < $j; $i++ ){
			$query = $query.$datos[$nombresdatosEnteros[$i]].', ';
		}
		$query = $query.$datos[$nombresdatosEnteros[sizeof($nombresdatosEnteros) - 1]].');';
		echo '<br>'.$query.'<br>';
		//Se ejecuta el query
		mysqli_query($conexion, $query);
		mysqli_close($conexion);
	
		//Redireccionar
		header('Location: ../index.html');
	
	
	function eliminarCaractEsp($dato){
	$dato = trim($dato);
	$dato = stripslashes($dato);
	$dato = htmlspecialchars($dato);
	return $dato;
	}
	function darValorAgregar($dato,  $tipo){
		$dato = eliminarCaractEsp($dato);
		if(empty($dato))
		{
			$dato = 'NULL';
		}
		else{
			if($tipo != "entero"){
				$dato = "'".$dato."'";
			}
		}
		return $dato;
	}
?>