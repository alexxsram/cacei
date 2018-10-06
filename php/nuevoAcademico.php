<?php
$codigo = eliminarCaractEsp($_POST['codigo']);
$nombre = darValorAgregar($_POST['nombre']);
$apellidoPaterno = darValorAgregar($_POST['apellidoPaterno']);
$apellidoMaterno = darValorAgregar($_POST['apellidoMaterno']);
$lugarNacimiento = darValorAgregar($_POST['lugarNacimiento']);
$fechaNacimiento= darValorAgregar($_POST['fechaNacimiento']);
$nacionalidad = darValorAgregar($_POST['nacionalidad']);
$formaMigratoria = darValorAgregar($_POST['formaMigratoria']);
$sexo = darSexoElegido($_POST['sexo']);
$estadoCivil = darValorAgregar($_POST['estadoCivil']);
$tipoSangre = darValorAgregar($_POST['tipoSangre']);
$domicilioPersonal = darValorAgregar($_POST['domicilioPersonal']);
$colonia = darValorAgregar($_POST['colonia']);
$cp = darValorAgregar($_POST['cp']);
$municipio = darValorAgregar($_POST['municipio']);
$estado = darValorAgregar($_POST['estado']);
$telParticular = darValorAgregar($_POST['telParticular']);
$telOficina = darValorAgregar($_POST['telOficina']);
$celular = darValorAgregar($_POST['celular']);
$email = darValorAgregar($_POST['email']); 
$curp = darValorAgregar($_POST['curp']);
$rfc = darValorAgregar($_POST['rfc']);
$imss = darValorAgregar($_POST['imss']);
$numAfore = darValorAgregar($_POST['numAfore']);
$afore = darValorAgregar($_POST['afore']);
$dependencia = darValorAgregar($_POST['dependencia']);
$tipoContrato = darValorAgregar($_POST['tipoContrato']);
$administrativo = darValorAgregar($_POST['administrativo']);
$directivo = darValorAgregar($_POST['directivo']);
$categoria = darValorAgregar($_POST['categoria']);
$cargaHoraria = darValorAgregar($_POST['cargaHoraria']);
$aniosAntiguedad = darValorAgregar($_POST['aniosAntiguedad']);
$creditoInfovanit = darValorAgregar($_POST['creditoInfovanit']);
$ingresoAdicional = darValorAgregar($_POST['ingresoAdicional']);
$sinEstudios = darValorAgregar($_POST['sinEstudios']);
$primaria = darValorAgregar($_POST['primaria']);
$secundaria = darValorAgregar($_POST['secundaria']);
$bachillerato = darValorAgregar($_POST['bachillerato']);
$bachTec = darValorAgregar($_POST['bachTec']);
$postTec = darValorAgregar($_POST['postTec']);
$tecnico = darValorAgregar($_POST['tecnico']);
$tecProfesional = darValorAgregar($_POST['tecProfesional']);
$tecSinBach = darValorAgregar($_POST['tecSinBach']);
$tecConBach = darValorAgregar($_POST['tecConBach']);
$normal = darValorAgregar($_POST['normal']);
$licenciatura = darValorAgregar($_POST['licenciatura']);
$maestria = darValorAgregar($_POST['maestria']);
$doctor = darValorAgregar($_POST['doctor']);
$especialidad = darValorAgregar($_POST['especialidad']);
$nombreAvisar = darValorAgregar($_POST['nombreAvisar']);
$parentescoAvisar = darValorAgregar($_POST['parentescoAvisar']);
$telefonoAvisar = darValorAgregar($_POST['telefonoAvisar']);
$rutaFoto = 'NULL';

if($_FILES['foto'][name] == "") {
    echo "No hay archivo";
}
else{
    $subirArchivo = True;
    $tamanioArchivo = $_FILES['foto'][size];
    $mensaje = "";
    if($tamanioArchivo > 200000){
        $mensaje = "Tamanio del archivo demasiado grande";
        $subirArchivo = False;
    }
    if($subirArchivo){
        if(!($_FILES['foto'][type] == 'image/jpeg' OR $_FILES['foto'][type] == 'image/png')){
            $mensaje = "Formato de archivo no valido, solo se permiten JPEG, PNG o PDF";
            $subirArchivo = False;
        }
    }
    if($subirArchivo){

        $nombreArchivo = $_FILES['foto'][name];

        $rutaSubir = '../Archivos/' . $codigo;
        $rutaYArchivo = $rutaSubir.'/'.$nombreArchivo;

        #Si no existe la carpeta se crea
        if (!file_exists($rutaSubir)) {
            mkdir($rutaSubir, 0777, true);
        }

        #Checa si existe un archivo con ese nombre
        for($i = 1, $indicePunto = strpos($nombreArchivo, "."), $formato = substr($nombreArchivo, $indicePunto), $nombreSinFor = substr($nombreArchivo, 0, $indicePunto);file_exists($rutaYArchivo); $i++)
        {
            $rutaYArchivo = $rutaSubir.'/'.$nombreSinFor.'('.$i.')'.$formato;
        }

        if(move_uploaded_file ($_FILES['foto'][tmp_name], $rutaYArchivo))
        {
            $rutaFoto = substr($rutaYArchivo, 3);
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

if($codigo != '' AND $nombre != '' AND $apellidoPaterno != '' AND $apellidoMaterno != ''){
    $conexion = mysqli_connect("localhost","labsoft04","1234567890");
    mysqli_select_db($conexion,"labsoft04");
    $query = "INSERT INTO `maestro` () VALUES ($codigo, $nombre, $apellidoPaterno,
		$apellidoMaterno, '$rutaFoto', $fechaNacimiento, $lugarNacimiento, $nacionalidad,
		$formaMigratoria, '$sexo', $estadoCivil, $tipoSangre, $domicilioPersonal, $colonia,
		$cp, $municipio, $estado, $telParticular, $telOficina, $celular, $email, $curp, $rfc,
		$imss, $numAfore, $afore, $dependencia, $tipoContrato, $administrativo, $directivo,
		$categoria, $cargaHoraria, $aniosAntiguedad, $creditoInfovanit, $ingresoAdicional,
		$sinEstudios, $primaria, $secundaria, $bachillerato, $bachTec, $postTec, $tecnico,
		$tecProfesional, $tecSinBach, $tecConBach, $normal, $licenciatura, $maestria, $doctor,
		$especialidad, $nombreAvisar, $parentescoAvisar, $telefonoAvisar);";
    mysqli_query($conexion, $query);
    mysqli_close($conexion);

    echo "Antes de include";

    //require 'subirDocumentos.php';


    echo "Despues de include";

    //header('Location: ../buscar.php');
    exit;
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
function darValorAgregar($dato){
    $dato = eliminarCaractEsp($dato);
    if(empty($dato))
    {
        $dato = 'NULL';
    }
    else{
        $dato = "'".$dato."'";
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
?>