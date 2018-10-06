<?php 
	$cantIdiomas =  count($_POST["idioma"]);
	for($i = 0; $i < $cantIdiomas ; $i++)
	{
		echo 'Idioma '.$_POST["idioma"][$i].'<br>';
		echo 'Escritura '.$_POST["escritura"][$i].'<br>';
		echo 'Lectura '.$_POST["lectura"][$i].'<br>';
		echo 'Comprension '.$_POST["comprension"][$i].'<br>';
	}
?>