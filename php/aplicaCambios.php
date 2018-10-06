<?php
/*Codigo para actulizar datos de un maestro que ya esta registrado*/
	$conexion = mysqli_connect("localhost","cvmaestros","H52ZhcNUD");
    mysqli_select_db($conexion, "cvmaestros_db");
	SESSION_START();
	//Se comprueba el tipo de usuario
	$codigo = $_SESSION["username"];
	$resultadoConsultaTipoUsuario = mysqli_query($conexion, "SELECT codigo FROM administrador WHERE codigo = $codigo");
	if(mysqli_num_rows($resultadoConsultaTipoUsuario) == 1)
	{
		//Si es un administrador se toma el codigo que se le pasa en el input
		$codigo = $_POST["maestroSeleccionado"];
	}
	$query = "SELECT codigo FROM maestro WHERE codigo = $codigo";
	$resultadoConsulta = mysqli_query($conexion, $query);
	if(mysqli_num_rows($resultadoConsulta) == 1)
	{
		$row = mysqli_fetch_assoc($resultadoConsulta);
		
		//Se separan los nombres de los datos segun el tipo que deben de ser
		
		$nombresdatosEnteros = array(
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
				
		$antiguosDatos = array();
		$nuevosDatos = array();
		
		//Se obtienen los datos que ya tenia el maestro y los nuevos para compararlos y ver cuales han cambiado
		
		for($i = 0, $j = sizeof($nombresdatosCadena); $i < $j; $i++ ){
			$antiguosDatos[$nombresdatosCadena[$i]] = (darValorAgregar($row[$nombresdatosCadena[$i]]));
			$nuevosDatos[$nombresdatosCadena[$i]] = (darValorAgregar($_POST[$nombresdatosCadena[$i]]));
		}
		
		for($i = 0, $j = sizeof($nombresdatosEnteros); $i < $j; $i++ ){
			$antiguosDatos[$nombresdatosEnteros[$i]] = (darValorAgregar($row[$nombresdatosEnteros[$i]], "entero"));
			$nuevosDatos[$nombresdatosEnteros[$i]] = (darValorAgregar($_POST[$nombresdatosEnteros[$i]], "entero"));
		}
		
        //Se hace para en caso de no haber cambio en la foto, que no intente hacer un cambio al estar el input vacio
		$nuevosDatos["foto"] = $antiguosDatos["foto"];
        $nuevosDatos["fechaNacimiento"] = "'".$_POST["anio-fechaNacimiento"]."-".$_POST["mes-fechaNacimiento"]."-".$_POST["dia-fechaNacimiento"]."'";
		
		if($_FILES['foto'][size] != 0){
				unlink("../".$row["foto"]);
				#Checa si existe un archivo con ese nombre
				$nombreArchivo = eliminarCaractEsp($_FILES['foto'][name]);
				$rutaSinArchivo = "Archivos/$codigo/";
				$nuevoPath = $rutaSinArchivo.$nombreArchivo;
				
				//Se comprueba si existe otro archivo con ese nombre
				$nombreSinExtension = substr($nombreArchivo, 0, strpos($nombreArchivo, "."));
				$extension = strrchr($nombreArchivo, ".");

				for($i = 1; file_exists("../".$nuevoPath); $i++)
				{
					$nuevoPath = $rutaSinArchivo.$nombreSinExtension."(".$i.")".$extension;
				}
				if(move_uploaded_file ($_FILES['foto'][tmp_name], "../".$nuevoPath))
				{
					$nuevosDatos["foto"] = (darValorAgregar($nuevoPath));
					echo "Subida de archivo exitosa";
				}
				else {
					echo "Error al subir el archivo";
				}
			}


		$huboCambio = false;
		$sentencia = "UPDATE  maestro SET ";
		for($i = 0, $j = sizeof($nombresdatosCadena); $i < $j; $i++ ){
			if($antiguosDatos[$nombresdatosCadena[$i]] != $nuevosDatos[$nombresdatosCadena[$i]])
			{
				//Si hubo un cambio se agrega a la sentencia de actualizacion
				if($huboCambio)
				{
					$sentencia = $sentencia.', ';
				}
				$huboCambio = true;
				//Se agrega a la sentencia nombreVariable = nuevoDato
				$sentencia = $sentencia.$nombresdatosCadena[$i].' = '.$nuevosDatos[$nombresdatosCadena[$i]].' ';
			}
		}
		
		for($i = 0, $j = sizeof($nombresdatosEnteros); $i < $j; $i++ ){
			if($antiguosDatos[$nombresdatosEnteros[$i]] != $nuevosDatos[$nombresdatosEnteros[$i]])
			{
				//Si hubo un cambio se agrega a la sentencia de actualizacion
				if($huboCambio)
				{
					$sentencia = $sentencia.', ';
				}
				$huboCambio = true;
				//Se agrega a la sentencia nombreVariable = nuevoDato
				$sentencia = $sentencia.$nombresdatosEnteros[$i].' = '.$nuevosDatos[$nombresdatosEnteros[$i]].' ';
			}
		}
		
		if($huboCambio){
			$sentencia = $sentencia.'WHERE codigo = '.$codigo.';';
			mysqli_query($conexion, $sentencia);
		}
        actualizarIdiomas($conexion, $codigo);    
        actualizarDocumentos($conexion, $codigo);    
        actualizarHabilidades($conexion, $codigo);
        actualizarDependientes($conexion, $codigo);
        actualizarEstudio($conexion, $codigo, "Licenciatura");
        actualizarEstudio($conexion, $codigo, "Maestria");
        actualizarEstudio($conexion, $codigo, "Doctorado");
		actualizarMaestroMateria($conexion, $codigo);
	}
	mysqli_close($conexion);
    header('Location: ../academico.php?codigo='.$codigo);

	function eliminarCaractEsp($dato){
	$dato = trim($dato);
	$dato = stripslashes($dato);
	$dato = htmlspecialchars($dato);
	return $dato;
	}
    function actualizarEstudio($conexion, $codigo, $nivel){
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

        $queryEstudio = "SELECT codigo FROM estudio WHERE codigo = $codigo AND nivel = '$nivel'";
        $resultadoConsultaEstudio = mysqli_query($conexion, $queryEstudio);
        if(mysqli_num_rows($resultadoConsultaEstudio) == 1){
            $rowEstudio = mysqli_fetch_assoc($resultadoConsultaEstudio);
            $antiguosDatos = array();
            $nuevosDatos = array();

            //Se obtienen los datos que ya tenia el maestro y los nuevos para compararlos y ver cuales han cambiado

            for($i = 0, $j = sizeof($nombresdatosCadena); $i < $j; $i++ ){
                $antiguosDatos[$nombresdatosCadena[$i]] = (darValorAgregar($rowEstudio[$nombresdatosCadena[$i]]));
                $nuevosDatos[$nombresdatosCadena[$i]] = (darValorAgregar($_POST[$nombresdatosCadena[$i].$nivel]));
            }

            for($i = 0, $j = sizeof($nombresdatosEnteros); $i < $j; $i++ ){
                $antiguosDatos[$nombresdatosEnteros[$i]] = (darValorAgregar($rowEstudio[$nombresdatosEnteros[$i]], "entero"));
                $nuevosDatos[$nombresdatosEnteros[$i]] = (darValorAgregar($_POST[$nombresdatosEnteros[$i].$nivel], "entero"));
            }

            //Las fechas se asignan despues porque se obtienen de diferente manera al ser resultado de varios input
            $nuevosDatos["fechaInicio"] = "'".$_POST["anio-fechaInicio".$nivel]."-".$_POST["mes-fechaInicio".$nivel]."-".$_POST["dia-fechaInicio".$nivel]."'";
            $nuevosDatos["fechaFin"] = "'".$_POST["anio-fechaFin".$nivel]."-".$_POST["mes-fechaFin".$nivel]."-".$_POST["dia-fechaFin".$nivel]."'";
            $huboCambio = false;
            $sentencia = "UPDATE  estudio SET ";
            for($i = 0, $j = sizeof($nombresdatosCadena); $i < $j; $i++ ){
                if($antiguosDatos[$nombresdatosCadena[$i]] != $nuevosDatos[$nombresdatosCadena[$i]])
                {
                    //Si hubo un cambio se agrega a la sentencia de actualizacion
                    if($huboCambio)
                    {
                        $sentencia = $sentencia.', ';
                    }
                    $huboCambio = true;
                    //Se agrega a la sentencia nombreVariable = nuevoDato
                    $sentencia = $sentencia.$nombresdatosCadena[$i].' = '.$nuevosDatos[$nombresdatosCadena[$i]].' ';
                }
            }

            for($i = 0, $j = sizeof($nombresdatosEnteros); $i < $j; $i++ ){
                if($antiguosDatos[$nombresdatosEnteros[$i]] != $nuevosDatos[$nombresdatosEnteros[$i]])
                {
                    //Si hubo un cambio se agrega a la sentencia de actualizacion
                    if($huboCambio)
                    {
                        $sentencia = $sentencia.', ';
                    }
                    $huboCambio = true;
                    //Se agrega a la sentencia nombreVariable = nuevoDato
                    $sentencia = $sentencia.$nombresdatosEnteros[$i].' = '.$nuevosDatos[$nombresdatosEnteros[$i]].' ';
                }
            }

            if($huboCambio){
                $sentencia = $sentencia."WHERE codigo = $codigo and nivel =  '$nivel';";
                echo $sentencia;
                mysqli_query($conexion, $sentencia);
            }
        }
        else{
            if($_POST["institucion".$nivel] != NULL)
            {   
                subirEstudio($conexion, $codigo, $nombresdatosCadena, $nombresdatosEnteros, $nivel);
            }
        }
    }
    function subirEstudio($conexion, $codigo, $nombresdatosCadena, $nombresdatosEnteros, $nivel){
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
	function darValorAgregar($dato, $tipo){
		$dato = eliminarCaractEsp($dato);
		if(empty($dato))
		{
			$dato = 'NULL';
		}
		else{
			//En caso de que no sea un entero se le agrega comilla simple al inicio y al final
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
    function subirIdioma($conexion, $codigo, $nombresdatosCadena, $nombresdatosEnteros, $k){
        for($i = 0, $j = sizeof($nombresdatosCadena); $i < $j; $i++ ){
			$datos[$nombresdatosCadena[$i]] = (darValorAgregar($_POST[$nombresdatosCadena[$i]][$k]));
        }

        for($i = 0, $j = sizeof($nombresdatosEnteros); $i < $j; $i++ ){
            $datos[$nombresdatosEnteros[$i]] = (darValorAgregar($_POST[$nombresdatosEnteros[$i]][$k], "entero"));
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
        mysqli_query($conexion, $query);
    }
    function actualizarIdiomas($conexion, $codigo){
        $nombresdatosEnteros = array(
            "comprension",
            "lectura",
            "escritura",
        );

        $nombresdatosCadena = array(		
            "idioma",
        );
        borrarIdiomas($conexion, $codigo);
        for($k = 0, $l = count($_POST["idioma"]); $k < $l; $k++)
        {
            $complementoQuery = " AND idioma = '".$_POST["idioma"][$k]."'";
            $query = "SELECT codigo FROM idioma WHERE codigo = $codigo".$complementoQuery;
            $resultadoConsulta = mysqli_query($conexion, $query);
            if(mysqli_num_rows($resultadoConsulta) == 0)
            {
                subirIdioma($conexion, $codigo, $nombresdatosCadena, $nombresdatosEnteros, $k);
            }
        }
    }
    function borrarIdiomas($conexion, $codigo){
        for($k = 0, $l = count($_POST["idiomaEliminar"]); $k < $l; $k++)
        {
            mysqli_query($conexion, "delete from idioma where codigo = '".$codigo."' and idioma = '".$_POST["idiomaEliminar"][$k]."'");
        }
    }
    function borrarHabilidades($conexion, $codigo){
        for($k = 0, $l = count($_POST["habilidadEliminar"]); $k < $l; $k++)
        {
            mysqli_query($conexion, "delete from habilidadcomputo where codigo = '".$codigo."' and programa = '".$_POST["habilidadEliminar"][$k]."'");
        }
    }
    function subirHabilidad($conexion, $codigo, $nombresdatosCadena, $nombresdatosEnteros, $k){
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
    function actualizarHabilidades($conexion, $codigo){
        $nombresdatosEnteros = array(
            "porcentaje",
        );

        $nombresdatosCadena = array(		
            "programa",
        );
        borrarHabilidades($conexion, $codigo);
        for($k = 0, $l = count($_POST["programa"]); $k < $l; $k++)
        {
            $complementoQuery = " AND programa = '".$_POST["programa"][$k]."'";
            $query = "SELECT codigo FROM habilidadcomputo WHERE codigo = $codigo".$complementoQuery;
            $resultadoConsulta = mysqli_query($conexion, $query);
            if(mysqli_num_rows($resultadoConsulta) == 0)
            {
                subirHabilidad($conexion, $codigo, $nombresdatosCadena, $nombresdatosEnteros, $k);
            }
        }
    }
    function borrarDocumentos($conexion, $codigo){
        //Codigo para eliminar documentos
        for($k = 0, $l = count($_POST["documentoEliminar"]); $k < $l; $k++)
        {
            $pathPdf = $_POST["documentoEliminar"][$k];
            mysqli_query($conexion, "delete from documento where codigo = '".$codigo."' and pathPdf = '".$pathPdf."'");
            //Se agrega ../ porque aqui se esta una carpeta adentro
            unlink("../".$pathPdf);
        }
    }
    function actualizarDocumentos($conexion, $codigo){
        //Empieza codigo para subir documentos
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
			if(move_uploaded_file ($_FILES['documentos'][tmp_name][$i], "../".$rutaSubir))
			{
				//Subida de informacion a base de datos
				$conexion = mysqli_connect("localhost","cvmaestros","H52ZhcNUD", "cvmaestros_db");
				$query = "INSERT INTO `documento` () VALUES ('$codigo', '$descripcion', '$rutaSubir');";
				mysqli_query($conexion, $query);
				mysqli_close($conexion);
				echo "Subida de archivos hecha ";
			}
		}
        borrarDocumentos($conexion, $codigo);
	}
    function borrarDependientes($conexion, $codigo){
        for($k = 0, $l = count($_POST["dependienteEliminar"]); $k < $l; $k++)
        {
            mysqli_query($conexion, "delete from dependiente where codigo = '".$codigo."' and nombre = '".$_POST["dependienteEliminar"][$k]."'");
        }
    }
    function subirDependiente($conexion, $codigo, $nombresdatosCadena, $k){
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
    function actualizarDependientes($conexion, $codigo){
        $nombresdatosCadena = array(		
			"nombre",
			"parentesco",
			"fechaNacimiento",
		);
        borrarDependientes($conexion, $codigo);
        for($k = 0, $l = count($_POST["nombreDep"]); $k < $l; $k++)
        {
            $complementoQuery = " AND nombre = '".$_POST["nombreDep"][$k]."'";
            $query = "SELECT codigo FROM dependiente WHERE codigo = $codigo".$complementoQuery;
            $resultadoConsulta = mysqli_query($conexion, $query);
            if(mysqli_num_rows($resultadoConsulta) == 0)
            {
                subirDependiente($conexion, $codigo, $nombresdatosCadena, $k);
            }
        }
    }
	function borrarMaestroMateria($conexion, $codigo){
		for($k = 0, $l = count($_POST["materiaEliminar"]); $k < $l; $k++)
        {
            mysqli_query($conexion, "delete from maestroMateria where idMaestro = '".$codigo."' and idMateria = '".$_POST["materiaEliminar"][$k]."'");
        }
	}
	function actualizarMaestroMateria($conexion, $codigo){
		borrarMaestroMateria($conexion, $codigo);
		for($k = 0, $l = count($_POST["idMateria"]); $k < $l; $k++)
        {
			$complementoQuery = " AND idMateria = '".$_POST["idMateria"][$k]."'";
            $query = "SELECT idMateria FROM maestroMateria WHERE idMaestro = $codigo".$complementoQuery;
            $resultadoConsulta = mysqli_query($conexion, $query);
            if(mysqli_num_rows($resultadoConsulta) == 0)
            {
                $query = "INSERT INTO `maestroMateria` (idMaestro, idMateria) VALUES (".$codigo.", ".darValorAgregar($_POST["idMateria"][$k], "entero").");";
				mysqli_query($conexion, $query);
            }
        }
    }
?>