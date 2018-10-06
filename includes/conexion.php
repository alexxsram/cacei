<?php
	$conexion = mysqli_connect("localhost","cvmaestros","H52ZhcNUD", "cvmaestros_db");
	
	function fechadia($fecha){
		$fechahoy = date('d/m/y',strtotime($fecha));
		return $fechahoy;
    }
?>