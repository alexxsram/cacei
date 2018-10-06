<?php
	SESSION_START();
	$codigo = 3;
	
	$cantArchivos = count($_FILES['files'][size]);
	$mensaje = "";
	$subirArchivo = True;	
		
	for($i = 0; $i < $cantArchivos and $subirArchivo; $i++)
	{
		$tamanioArchivo = $_FILES['files'][size][$i];
		if($tamanioArchivo > 100000){
			$mensaje = "Tamanio del archivo ".$_FILES['files'][name][$i]." demasiado grande";
			$subirArchivo = False;
		}
		if($subirArchivo){
			$imagenTipo = $_FILES["files"][type][$i];
			if(!($imagenTipo == 'image/pjpeg' OR $imagenTipo == 'image/png' OR $imagenTipo == 'application/pdf'
				OR $imagenTipo == 'image/jpeg')){
					echo $imagenTipo;
				$mensaje = "Formato de archivo no valido, solo se permiten JPEG, PNG o PDF";
				$subirArchivo = False;
			}
		}
		//Redireccionar
	//header('Location: ../index.html');
	}
	if($subirArchivo){
		for($i = 0; $i < $cantArchivos; $i++){
			$nombreArchivo = eliminarCaractEsp($_FILES['files'][name][$i]);
			$rutaSinArchivo = "../Archivos/$codigo/";
			$rutaSubir = $rutaSinArchivo.$nombreArchivo;
			
			//Se comprueba si existe otro archivo con ese nombre
			$nombreSinExtension = substr($nombreArchivo, 0, strpos($nombreArchivo, "."));
			$extension = strrchr($nombreArchivo, ".");

			for($j = 1; file_exists($rutaSubir); $j++)
			{
				$rutaSubir = $rutaSinArchivo.$nombreSinExtension."(".$j.")".$extension;
			}
			if(move_uploaded_file ($_FILES['files'][tmp_name][$i], $rutaSubir))
			{
				//Subida de informacion a base de datos
				$conexion = mysqli_connect("localhost","cvmaestros","H52ZhcNUD", "cvmaestros_db");
				$descripcion = eliminarCaractEsp($_POST['descripcionDocumento']);
				$query = "INSERT INTO `documento` () VALUES ('$codigo', '$descripcion', '$rutaSubir');";
				mysqli_query($conexion, $query);
				mysqli_close($conexion);
				echo $query."<br>";
				echo "Subida de archivos hecha ";
			}
		}
	}
	else{
		echo $mensaje;
	}
	function eliminarCaractEsp($dato){
		$dato = trim($dato);
		$dato = stripslashes($dato);
		$dato = htmlspecialchars($dato);
		return $dato;
	}
?>