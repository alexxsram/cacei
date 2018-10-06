<?php 
//Codigo para cerrra sesion
	SESSION_START();
	unset($_SESSION["codigo"]);
	echo "Sesion cerrada";
	
	//Redireccionar
	header('Location: ../index.html');
?>