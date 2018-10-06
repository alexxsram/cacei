<?php 
	$codigoDado = $_POST["codigo"];
	$passwordDado =  $_POST["password"];
	if($codigoDado != "" AND $passwordDado != "")
	{
		$conexion = mysqli_connect("localhost","cvmaestros","H52ZhcNUD", "cvmaestros_db");
		$query = "SELECT * FROM maestro WHERE codigo = ".$codigoDado;
		$resultadoConsulta = mysqli_query($conexion, $query);
		if(mysqli_num_rows($resultadoConsulta) == 1)
		{
			$row = mysqli_fetch_assoc($resultadoConsulta);
			if($passwordDado == $row["password"])
			{
				SESSION_START();
				//Aqui se indica a usar el codigo ingresado en la variable SESSION
				$_SESSION["codigo"] = $codigoDado;
				echo "sesion iniciada";
			}
		}
		
		else{
			//Al no ser un meastro se busca en la tabla de administradores
			$query = "SELECT * FROM administrador WHERE codigo = ".$codigoDado;
			$resultadoConsulta = mysqli_query($conexion, $query);
			if(mysqli_num_rows($resultadoConsulta) == 1)
			{
				$row = mysqli_fetch_assoc($resultadoConsulta);
				if($passwordDado == $row["password"])
				{
					SESSION_START();
					//Aqui se indica a usar el codigo ingresado en la variable SESSION
					$_SESSION["codigo"] = $codigoDado;
					echo "sesion iniciada";
				}
			}
		}
	}
	//Redireccionar
	header('Location: ../index.html');
?>