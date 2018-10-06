<?php 
	$cantIdiomas =  count($_POST["nombre"]);
	for($i = 0; $i < $cantIdiomas ; $i++)
	{
		echo 'Nombre '.$_POST["nombre"][$i].'<br>';
		echo 'Parentesco '.$_POST["parentesco"][$i].'<br>';
		echo 'Fecha de nacimiento '.$_POST["fechaNacimiento"][$i].'<br>';
	}
?>