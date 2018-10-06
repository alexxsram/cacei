<?php
	$codigo = $_POST['codigo'];
	
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
	$datos["fechaNacimiento"] = "'".$_POST["anio-fechaNacimiento"]."-".$_POST["mes-fechaNacimiento"]."-".$_POST["dia-fechaNacimiento"]."'";
    $datos["password"]= "'".md5($codigo)."'";

	#Si no existe la carpeta se crea
	if (!file_exists("../Archivos/$codigo/")) {
		mkdir("../Archivos/$codigo/", 0777, true);
	}
	
	if($_FILES['foto'][name] == "") {
		//No hay archivo para subir
	}
	else{
		$subirArchivo = True;
		$tamanioArchivo = $_FILES['foto'][size];
		$mensaje = "";
		
		//Tamanño maximo que se le permite al archivo para subirlo
		if($tamanioArchivo > 200000){
			$mensaje = "Tamanio del archivo demasiado grande";
			$subirArchivo = False;
		}
		if($subirArchivo){
			//Comprobacion de que el archivo sea en el formato señalado para subir
			if(!($_FILES['foto'][type] == 'image/pjpeg' OR $_FILES['foto'][type] == 'image/png' OR  $_FILES['foto'][type] == 'image/jpeg')){
				$mensaje = "Formato de archivo no valido, solo se permiten JPEG, PNG o PDF";
				$subirArchivo = False;
			}
		}

		if($subirArchivo){			
			$nombreArchivo = eliminarCaractEsp($_FILES['foto'][name]);
			$rutaSinArchivo = "Archivos/$codigo/";
			$nuevoPath = $rutaSinArchivo.$nombreArchivo;
			//Se intenta subir el archivo
			$nombreSinExtension = substr($nombreArchivo, 0, strpos($nombreArchivo, "."));
			$extension = strrchr($nombreArchivo, ".");

			for($i = 1; file_exists("../".$nuevoPath); $i++)
			{
				$nuevoPath = $rutaSinArchivo.$nombreSinExtension."(".$i.")".$extension;
			}
			
			if(move_uploaded_file ($_FILES['foto'][tmp_name], "../".$nuevoPath))
			{
				$datos["foto"] = (darValorAgregar($nuevoPath));
				echo "NUEVO PATH ".$datos["foto"]."<br>";
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
	
	//Se comprueba si los campos Codigo, Nombre, ApellidoPaterno, ApellidoMaterno no estan vacios
	if($datos["codigo"] != '' AND $datos["nombre"] != '' AND $datos["apellidoPaterno"] != '' 
	AND $datos["apellidoMaterno"] != ''){
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
        echo $query;
		queryIdiomas($codigo,$conexion);
		queryDocumentos($codigo,$conexion);
        queryEstudio($codigo, $conexion, "Licenciatura");
        queryEstudio($codigo, $conexion, "Maestria");
        queryEstudio($codigo, $conexion, "Doctorado");
        queryHabilidades($codigo, $conexion);
        queryDependientes($codigo, $conexion);
		queryMeastroMateria($codigo, $conexion);
		mysqli_close($conexion);
		header('Location: ../buscar.php');
		
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
	}
	function queryIdiomas($codigo, $conexion){
		$query = "";
		$cantIdiomas = count($_POST["idioma"]);
		
		$nombresdatosEnteros = array(
		"comprension",
		"lectura",
		"escritura",
		);
		
		$nombresdatosCadena = array(		
			"idioma",
		);
		for($l = 0; $l < $cantIdiomas; $l++){
			for($i = 0, $j = sizeof($nombresdatosCadena); $i < $j; $i++ ){
			$datos[$nombresdatosCadena[$i]] = (darValorAgregar($_POST[$nombresdatosCadena[$i]][$l]));
			}
	
			for($i = 0, $j = sizeof($nombresdatosEnteros); $i < $j; $i++ ){
				$datos[$nombresdatosEnteros[$i]] = (darValorAgregar($_POST[$nombresdatosEnteros[$i]][$l], "entero"));
			}
			$query = "INSERT INTO `idioma` (codigo, ";
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
			echo $query;
			mysqli_query($conexion, $query);
		}
	}
	function queryDocumentos($codigo, $conexion){
		$cantDocumentos = count($_FILES["documentos"][name])-1;
		for($i = 0; $i < $cantDocumentos; $i++)
		{
			$tamanioArchivo = $_FILES['documentos'][size][$i];
			if($tamanioArchivo > 100000){
				echo "Tamanio del archivo ".$_FILES['documentos'][name][$i]." demasiado grande: en imagen ".$_FILES['documentos'][name][$i];
				continue;
			}
			$imagenTipo = $_FILES["documentos"][type][$i];
			if(!($imagenTipo == 'image/pjpeg' OR $imagenTipo == 'image/png' OR $imagenTipo == 'application/pdf'
				OR $imagenTipo == 'image/jpeg')){
					echo $imagenTipo;
				echo "Formato de archivo no valido, solo se permiten JPEG, PNG o PDF: en imagen ".$_FILES['documentos'][name][$i];
				continue;
			}
			$nombreArchivo = eliminarCaractEsp($_FILES['documentos'][name][$i]);
			$rutaSinArchivo = "Archivos/$codigo/";
			$rutaSubir = $rutaSinArchivo.$nombreArchivo;
			
			//Se comprueba si existe otro archivo con ese nombre
			$nombreSinExtension = substr($nombreArchivo, 0, strpos($nombreArchivo, "."));
			$extension = strrchr($nombreArchivo, ".");
            $descripcion = $nombreArchivo;
			for($j = 1; file_exists("../".$rutaSubir); $j++)
			{
				$rutaSubir = $rutaSinArchivo.$nombreSinExtension."(".$j.")".$extension;
                $descripcion = $nombreSinExtension."(".$j.")";
			}
			$query = "INSERT INTO `documento` () VALUES ('$codigo', '".$_FILES['documentos'][name][$i]."', '$rutaSubir');";
			echo $query."<br>";
			if(move_uploaded_file ($_FILES['documentos'][tmp_name][$i], "../".$rutaSubir))
			{
				//Subida de informacion a base de datos
				$conexion = mysqli_connect("localhost","cvmaestros","H52ZhcNUD", "cvmaestros_db");
				$query = "INSERT INTO `documento` () VALUES ('$codigo', '$descripcion', '$rutaSubir');";
				mysqli_query($conexion, $query);
				mysqli_close($conexion);
				echo $query."<br>";
				echo "Subida de archivos hecha ";
			}
		}
	}
    function queryEstudio($codigo, $conexion, $nivel){
        $nombresdatosEnteros = array(
            "cp",
            "telefono",
            "monto",
            "tipoCambio",
        );

        $nombresdatosCadena = array(
            "duracion",
            "nivel",
            "tituloObtenido",
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
        if($_POST["institucion".$nivel] != NULL)
            {   
                for($i = 0, $j = sizeof($nombresdatosCadena); $i < $j; $i++ ){
                    $datos[$nombresdatosCadena[$i]] = (darValorAgregar($_POST[$nombresdatosCadena[$i].$nivel]));
                }

                for($i = 0, $j = sizeof($nombresdatosEnteros); $i < $j; $i++ ){
                    $datos[$nombresdatosEnteros[$i]] = (darValorAgregar($_POST[$nombresdatosEnteros[$i].$nivel], "entero"));
                }

                $datos["fechaInicio"] = "'".$_POST["anio-fechaInicio".$nivel]."-".$_POST["mes-fechaInicio".$nivel]."-".$_POST["dia-fechaInicio".$nivel]."'";
                $datos["fechaFin"] = "'".$_POST["anio-fechaFin".$nivel]."-".$_POST["mes-fechaFin".$nivel]."-".$_POST["dia-fechaFin".$nivel]."'";

                $query = "INSERT INTO `estudio` (codigo, ";
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
                mysqli_query($conexion, $query);
            }
    }
    function queryHabilidades($codigo, $conexion){
        $nombresdatosEnteros = array(
            "porcentaje",
        );

        $nombresdatosCadena = array(		
            "programa",
        );
        for($k = 0, $l = count($_POST["programa"]); $k < $l; $k++)
        {
            for($i = 0, $j = sizeof($nombresdatosCadena); $i < $j; $i++ ){
			     $datos[$nombresdatosCadena[$i]] = (darValorAgregar($_POST[$nombresdatosCadena[$i]][$k]));
			}
	
			for($i = 0, $j = sizeof($nombresdatosEnteros); $i < $j; $i++ ){
				$datos[$nombresdatosEnteros[$i]] = (darValorAgregar($_POST[$nombresdatosEnteros[$i]][$k], "entero"));
			}
			$query = "INSERT INTO `habilidadcomputo` (codigo, ";
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
			mysqli_query($conexion, $query);
        }
    }
    function queryDependientes($codigo, $conexion){
        $nombresdatosCadena = array(		
			"nombre",
			"parentesco",
			"fechaNacimiento",
		);
        for($k = 0, $l = count($_POST["nombreDep"]); $k < $l; $k++)
        {
            for($i = 0, $j = sizeof($nombresdatosCadena); $i < $j; $i++ ){
                $datos[$nombresdatosCadena[$i]] = (darValorAgregar($_POST[$nombresdatosCadena[$i]."Dep"][$k]));
            }
            $query = "INSERT INTO `dependiente` (codigo, ";
            for($i = 0, $j = sizeof($nombresdatosCadena) - 1; $i < $j; $i++ ){
                $query = $query.$nombresdatosCadena[$i].', ';
            }
            $query = $query.$nombresdatosCadena[sizeof($nombresdatosCadena) - 1];
            $query = $query.') VALUES ('.$codigo.', ';
            for($i = 0, $j = sizeof($nombresdatosCadena) - 1; $i < $j; $i++ ){
                $query = $query.$datos[$nombresdatosCadena[$i]].', ';
            }
            $query = $query.$datos[$nombresdatosCadena[sizeof($nombresdatosCadena) - 1]].');';
            mysqli_query($conexion, $query);
        }
    }
	function queryMeastroMateria($codigo, $conexion){
        for($k = 0, $l = count($_POST["materias"]); $k < $l; $k++)
        {
            $query = "INSERT INTO `maestroMateria` (idMaestro, idMateria) VALUES (".$codigo.", ".darValorAgregar($_POST["materias"][$k], "entero").");";
            mysqli_query($conexion, $query);
        }
	}
?>