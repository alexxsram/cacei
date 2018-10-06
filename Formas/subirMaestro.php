<?php
//Pagina con el codigo para dar de alta un nuevo maestro
	/*$codigo = $_POST['codigo'];
	
		$nombresdatosEnteros = array(
		"codigo",
		"cp",		
		"telParticular",
		"telOficina",
		"celular",		
		"imss",
		"numAfore",
		"telefonoAvisar",		
		"cargaHoraria",
		"aniosAntiguedad",
		);
		
		$nombresdatosCadena = array(		
			"nombre",
			"password",
			"apellidoPaterno",
			"apellidoMaterno",
			"lugarNacimiento",
			"fechaNacimiento",
			"nacionalidad",
			"formaMigratoria",
			"sexo",
			"estadoCivil",
			"tipoSangre",
			"domicilioPersonal",
			"colonia",
			"municipio",
			"estado",
			"email",
			"curp",
			"rfc",
			"afore",
			"dependencia",
			"tipoContrato",
			"administrativo",  
			"directivo",
			"categoria",
			"creditoInfonavit",
			"ingresoAdicional",
			"sinEstudios",
			"primaria",
			"secundaria",
			"bachillerato",
			"bachilleratoTec",
			"postTecnico",
			"tecnico",
			"tecnicoProfesional",
			"tecnicoSinBachillerato",
			"tecnicoConBachillerato",
			"normal",
			"licenciatura",
			"maestria",
			"doctorado",
			"especialidad",
			"nombreAvisar",
			"parentescoAvisar",
			"foto",
		);
		
	$datos = array();
	
	for($i = 0, $j = sizeof($nombresdatosCadena); $i < $j; $i++ ){
		$datos[$nombresdatosCadena[$i]] = (darValorAgregar($_POST[$nombresdatosCadena[$i]]));
	}
	
	for($i = 0, $j = sizeof($nombresdatosEnteros); $i < $j; $i++ ){
		$datos[$nombresdatosEnteros[$i]] = (darValorAgregar($_POST[$nombresdatosEnteros[$i]], "entero"));
	}
	
	if($_FILES['files'][name] == "") {
		//No hay archivo para subir
	}
	else{
		$subirArchivo = True;
		$tamanioArchivo = $_FILES['files'][size];
		$mensaje = "";
		
		//Tamanño maximo que se le permite al archivo para subirlo
		if($tamanioArchivo > 200000){
			$mensaje = "Tamanio del archivo demasiado grande";
			$subirArchivo = False;
		}
		if($subirArchivo){
			//Comprobacion de que el archivo sea en el formato señalado para subir
			if(!($_FILES['files'][type] == 'image/pjpeg' OR $_FILES['files'][type] == 'image/png')){
				$mensaje = "Formato de archivo no valido, solo se permiten JPEG, PNG o PDF";
				$subirArchivo = False;
			}
		}

		if($subirArchivo){			
			$nombreArchivo = eliminarCaractEsp($_FILES['files'][name]);
			$rutaSinArchivo = "../Archivos/$codigo/";
			$nuevoPath = $rutaSinArchivo.$nombreArchivo;
			//Se intenta subir el archivo
			$nombreSinExtension = substr($nombreArchivo, 0, strpos($nombreArchivo, "."));
			$extension = strrchr($nombreArchivo, ".");

			for($i = 1; file_exists($nuevoPath); $i++)
			{
				$nuevoPath = $rutaSinArchivo.$nombreSinExtension."(".$i.")".$extension;
			}
			
			if(move_uploaded_file ($_FILES['files'][tmp_name], $nuevoPath))
			{
				$datos["foto"] = (darValorAgregar($nuevoPath));
				echo "Subida de archivo exitosa";
			}
			else {
				echo "Error al subir el archivo";
			}
		}
		else{
			echo $mensaje;
		}
	}
	
	#Si no existe la carpeta se crea
	if (!file_exists("../Archivos/$codigo/")) {
		mkdir("../Archivos/$codigo/", 0777, true);
	}
	
	//Se comprueba si los campos Codigo, Nombre, ApellidoPaterno, ApellidoMaterno no estan vacios
	if($datos["codigo"] != '' AND $datos["nombre"] != '' AND $datos["apellidoPaterno"] != '' 
	AND $datos["apellidoMaterno"] != '' AND $datos["password"] != ''){
		//Se conecta a la base de datos
		$conexion = mysqli_connect("localhost","cvmaestros","H52ZhcNUD", "cvmaestros_db");

		//Se crea el query para usar con la base de datos
		$query = "INSERT INTO `maestro` (";
		for($i = 0, $j = sizeof($nombresdatosCadena); $i < $j; $i++ ){
			$query = $query.$nombresdatosCadena[$i].', ';
		}
		for($i = 0, $j = (sizeof($nombresdatosEnteros) - 1); $i < $j; $i++ ){
			$query = $query.$nombresdatosEnteros[$i].', ';
		}
		$query = $query.$nombresdatosEnteros[sizeof($nombresdatosEnteros) - 1];
		$query = $query.') VALUES (';
		for($i = 0, $j = sizeof($nombresdatosCadena); $i < $j; $i++ ){
			$query = $query.$datos[$nombresdatosCadena[$i]].', ';
		}
	
		for($i = 0, $j = (sizeof($nombresdatosEnteros) - 1); $i < $j; $i++ ){
			$query = $query.$datos[$nombresdatosEnteros[$i]].', ';
		}
		$query = $query.$datos[$nombresdatosEnteros[sizeof($nombresdatosEnteros) - 1]].');';
		mysqli_query($conexion, $query);
		mysqli_close($conexion);
		
		//Redireccionar
		header('Location: ../index.html');
		
	}
	else{
		echo 'Faltan datos necesarios';
	}
		
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
	function darSexoElegido($dato){
		$dato = eliminarCaractEsp($dato);
		if(empty($dato)){
			return 'NULL';
		}
		return $dato;
	}*/
	echo $_POST["sexo"];
?>