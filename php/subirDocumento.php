<?php 	
	$subirArchivo = true;
	$tamanioArchivo = $_FILES['files'][size];
	$mensaje = "";
	
	//Se obtiene el codigo utilizado en la sesion
	SESSION_START();
	$codigo = $_SESSION["codigo"];
	if($tamanioArchivo > 200000){
		$mensaje = "Tamanio del archivo demasiado grande";
		$subirArchivo = false;
	}
	if($subirArchivo){
		if(!($_FILES['files'][type] == 'image/pjpeg' OR $_FILES['files'][type] == 'image/png' OR $_FILES['files'][type] == 'application/pdf'
			OR $_FILES['files'][type] == 'image/jpg')){
			$mensaje = "Formato de archivo no valido, solo se permiten JPEG, PNG o PDF";
			$subirArchivo = false;
		}
	}
	if($subirArchivo){
		$nombreArchivo = eliminarCaractEsp($_FILES['files'][name]);
		$rutaSinArchivo = "../Archivos/$codigo/";
		$rutaSubir = $rutaSinArchivo.$nombreArchivo;
		
		//Se comprueba si existe otro archivo con ese nombre
		$nombreSinExtension = substr($nombreArchivo, 0, strpos($nombreArchivo, "."));
		$extension = strrchr($nombreArchivo, ".");

		for($i = 1; file_exists($rutaSubir); $i++)
		{
			$rutaSubir = $rutaSinArchivo.$nombreSinExtension."(".$i.")".$extension;
		}
		
		
		if(move_uploaded_file ($_FILES['files'][tmp_name], $rutaSubir))
		{
			//Subida de informacion a base de datos
			$conexion = mysqli_connect("localhost","cvmaestros","H52ZhcNUD", "cvmaestros_db");
			$descripcion = eliminarCaractEsp($_POST['descripcionDocumento']);
			$query = "INSERT INTO `documento` () VALUES ('$codigo', '$descripcion', '$rutaSubir');";
			mysqli_query($conexion, $query);
			mysqli_close($conexion);
		}
		
		//Redireccionar
	header('Location: ../buscar.php');
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