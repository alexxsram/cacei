<?php
	$conexion = mysqli_connect("localhost","cvmaestros","H52ZhcNUD", "cvmaestros_db");
	$mensaje = "";
	
	//Datos de materia
	$nombresdatosEnteros = array(
		"idDepartamento",
		);
		
		$nombresdatosCadena = array(		
			"codigo",
			"nombre",
		);
	
	//Eliminar las materias indicadas
	borrarMaterias($conexion);
	
	//Agregar materias nuevas
	for($k = 0, $l = count($_POST["codigo"]); $k < $l; $k++)
        {
            $query = "SELECT codigo FROM materia WHERE codigo = '".$_POST["codigo"][$k]."'";
            $resultadoConsulta = mysqli_query($conexion, $query);
            if(mysqli_num_rows($resultadoConsulta) == 0)
            {
                subirMateria($conexion, $nombresdatosCadena, $nombresdatosEnteros, $k);
            }
			else{
				$mensaje = $mensaje."Codigo de materia repetido: ".$_POST["codigo"][$k];
			}
        }
	
	mysqli_close($conexion);
	
	if($mensaje == ""){
		header('Location: ../index.php');
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
	
	//Empiezan funciones
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
	
	function subirMateria($conexion, $nombresdatosCadena, $nombresdatosEnteros, $k){
        for($i = 0, $j = sizeof($nombresdatosCadena); $i < $j; $i++ ){
			$datos[$nombresdatosCadena[$i]] = (darValorAgregar($_POST[$nombresdatosCadena[$i]][$k]));
			}
	
			for($i = 0, $j = sizeof($nombresdatosEnteros); $i < $j; $i++ ){
				$datos[$nombresdatosEnteros[$i]] = (darValorAgregar($_POST[$nombresdatosEnteros[$i]][$k], "entero"));
			}
			$query = "INSERT INTO `materia` (";
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
    }
	
	function borrarMaterias($conexion){
        for($k = 0, $l = count($_POST["materiaEliminar"]); $k < $l; $k++)
        {
            mysqli_query($conexion, "DELETE FROM materia WHERE idMateria = '".$_POST["materiaEliminar"][$k]."'");
        }
    }
	
?>