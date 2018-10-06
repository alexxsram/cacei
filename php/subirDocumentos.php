<?php
$cantArchivos = count($_FILES['files']['size']);

$mensaje = "";
$subirArchivo = True;

echo "\nAntes del for";

for($i = 0; $i < $cantArchivos and $subirArchivo; $i++)
{
    $tamanioArchivo = $_FILES['files']['size'][$i];
    if($tamanioArchivo > 100000){
        $mensaje = "Tamanio del archivo ".$_FILES['files']['name'][$i]." demasiado grande";
        $subirArchivo = False;
    }
    if($subirArchivo){
        $imagenTipo = $_FILES["files"]['type'][$i];
        if(!($imagenTipo == 'image/pjpeg' OR $imagenTipo == 'image/png' OR $imagenTipo == 'application/pdf'
				OR $imagenTipo == 'image/jpeg')){
				$mensaje = "Formato de archivo no valido, solo se permiten JPEG, PNG o PDF";
				$subirArchivo = False;
        }
    }
    //Redireccionar
    //header('Location: ../index.html');
}

if($subirArchivo){

    for($i = 0; $i < $cantArchivos; $i++){
        $nombreArchivo = eliminarCaractEsp($_FILES['files']['name'][$i]);
        $rutaSinArchivo = "../Archivos/$codigo/";
        $rutaSubir = $rutaSinArchivo.$nombreArchivo;

        //Se comprueba si existe otro archivo con ese nombre
        $nombreSinExtension = substr($nombreArchivo, 0, strpos($nombreArchivo, "."));
        $extension = strrchr($nombreArchivo, ".");

        for($j = 1; file_exists($rutaSubir); $j++)
        {
            $rutaSubir = $rutaSinArchivo.$nombreSinExtension."(".$j.")".$extension;
        }

        if(move_uploaded_file($_FILES['files']['tmp_name'][$i], $rutaSubir))
        {
            //Subida de informacion a base de datos
            $conexion = mysqli_connect("localhost","labsoft04","1234567890", "labsoft04");
            $descripcion = eliminarCaractEsp($_POST['descripcionDocumento']);
            echo $codigo;
            $query = "INSERT INTO `documento` () VALUES ('$codigo', '$descripcion', '$rutaSubir');";
            mysqli_query($conexion, $query);
            mysqli_close($conexion);
        }
    }
}
else{
    echo $mensaje;
}
?>