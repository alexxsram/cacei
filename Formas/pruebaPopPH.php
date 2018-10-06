<?php 
	$cantIdiomas =  count($_POST["programa"]);
	for($i = 0; $i < $cantIdiomas ; $i++)
	{
		echo 'Programa '.$_POST["programa"][$i].'<br>';
		echo 'Porcentaje '.$_POST["porcentaje"][$i].'<br>';
	}
?>