<?php
	//Se obtiene el codigo usado en la sesion
	SESSION_START();
	$codigo = $_SESSION["codigo"];
	
	/*Se separan los nombre de las variables dependiendo del tipo que son (en este caso solo
	hay de tipo cadena)*/

	$nombresdatosCadena = array(		
		"nombre",
		"parentesco",
		"fechaNacimiento",
	);
	
	$datos = array();
	
	for($i = 0, $j = sizeof($nombresdatosCadena); $i < $j; $i++ ){
		$datos[$nombresdatosCadena[$i]] = (darValorAgregar($_POST[$nombresdatosCadena[$i]]));
	}
	
	
	
		$conexion = mysqli_connect("localhost","cvmaestros","H52ZhcNUD", "cvmaestros_db");
		//Se forma el query que se utilizara con la base de datos
		$query = "INSERT INTO `dependiente` (codigo, ";
		//Se agregan los nombres de las columnas
		for($i = 0, $j = (sizeof($nombresdatosCadena) - 1); $i < $j; $i++ ){
			$query = $query.$nombresdatosCadena[$i].', ';
		}
		$query = $query.$nombresdatosCadena[sizeof($nombresdatosCadena) - 1];

		$query = $query.$nombresdatosEnteros[sizeof($nombresdatosEnteros) - 1];
		$query = $query.') VALUES ('.$codigo.', ';
		//Se agregan los valores de las columnas al query
		for($i = 0, $j = (sizeof($nombresdatosCadena) - 1); $i < $j; $i++ ){
			$query = $query.$datos[$nombresdatosCadena[$i]].', ';
		}
		$query = $query.$datos[$nombresdatosCadena[sizeof($nombresdatosCadena) - 1]].');';
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