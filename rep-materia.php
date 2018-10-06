<?php
	session_start();
	$conexion = mysqli_connect("localhost","cvmaestros","H52ZhcNUD");
	mysqli_select_db($conexion, "cvmaestros_db");

	$queryConsulta = "SELECT * FROM materia";
	$resultadoConsulta = mysqli_query($conexion, $queryConsulta);
	$extra = $_GET["codigoMateria"];
	$cantMaterias = 0;
	$string = "<div style='margin: 0 auto;'><select class='form-control input-lg' style='max-width: 80%;' name='materia' id='materia'><option value='Todas'>Todas</option>";

	while($materia = $resultadoConsulta->fetch_assoc()) {
		if($extra == $materia["idMateria"])
		{
			$string = $string . "<option value='" . $materia["idMateria"] . "' selected>" . $materia["nombre"] . "</option>";
		}
		else{
			$string = $string . "<option value='" . $materia["idMateria"] . "'>" . $materia["nombre"] . "</option>";
		}
	}

	$string = $string . "</select>";
	function optionSeleccionado($variable){
		$extra = $_GET["codigoMateria"];
		if($extra != "Todas"){
			
		}
	}
	function imprimirInformacionTabla()
	{
		global $conexion, $cantMaterias;
		$extra = $_GET["codigoMateria"];
		$query = "SELECT materia.codigo codigoMateria, materia.nombre nombreMateria, maestro.codigo, maestro.nombre, maestro.apellidoPaterno, maestro.apellidoMaterno, maestro.email FROM
						materia
						LEFT JOIN maestroMateria
						ON maestroMateria.idMateria=materia.idMateria
						LEFT JOIN maestro
						ON maestro.codigo=maestroMateria.idMaestro";
		if(isset($extra) && $extra != "Todas"){
			$query = $query. " WHERE maestroMateria.idMateria = $extra";
		}
		$resultadoConsulta = mysqli_query($conexion, $query);
		$infoTabla = '<br>\
		<table id="infoMaterias" class="table table-striped table-condensed table-hover">\
        	<tr>\
                <th width="150">Codigo materia</th>\
                <th width="150">Nombre materia</th>\
                <th width="150">Codigo</th>\
            	<th width="300">Nombre</th>\
                <th width="200">Email</th>\
            </tr>';
	$cantMaterias = mysqli_num_rows($resultadoConsulta);
		if($cantMaterias > 0)
		{
			while(($row = mysqli_fetch_assoc($resultadoConsulta)) != NULL){
			 $infoTabla = $infoTabla. '<tr>\
					<td>'.$row['codigoMateria'].'</td>\
					<td>'.$row['nombreMateria'].'</td>\
					<td>'.$row['codigo'].'</td>\
					<td>'.$row["nombre"].' '.$row["apellidoPaterno"].' '.$row["apellidoMaterno"].'</td>\
					<td>'.$row['email'].'</td>\
				</tr>';
			}
			$infoTabla = $infoTabla. '</table>';
		}
		else{
			$infoTabla = $infoTabla.'<td colspan="5" align="center">No hay maestros impartiendo la materia</td>';
		}
		return $infoTabla;
	}
?>

<html>
    <!-- Archivos de Cabecera (css, js) -->
    <?php  include ('includes/head.php');?>

    <!-- Menu -->
    <?php  include ('includes/header.php');?>

<head>
		  <title>Reporte General de Academicos</title>
	      <style>
            .repgral {
                width: auto;
                max-width: 800px;
	    		background: #fff;
            }
            .form-group {
                margin-bottom: 28px;
            }
            #feedbackForm {
                font-size: 12px;
            }
        </style>
		</head>
	<body  id="repgeneral" style="margin: 100px auto; padding: 0; background-color: white;">
       <div class="container repgral">
	   	<div class="row">
         <div class="col-md-9">
                <div class="col-md-3 text-center" >
                    <img src="imagenes/logo-udg.png" class="center-block img-responsive" style="margin: 0px auto;">
                </div>
                <div class="col-md-9 text-center">
				      <br><br><br>
                      <p style="color: #76323F"> Reporte de Información General de Personal Academico<br> -DIVEC-
                      </p>
                 </div>                           
           </div>
        </div>
			<center>
			<form role="form" action="php/generarPdfMateria.php" method="post">
				<div id='textMaterias' style='min-height: 60px; margin: 0 auto; width: 90%;'><?php echo $string; ?></div>
				<script>
					$("#materia").ready(function(){
						var materiaSeleccionada = $("#materia").val();
						$("#infoTabla").html(<?php echo "'".imprimirInformacionTabla()."'";?>);
						
					});
					$("#materia").change(function(){
						var materiaSeleccionada = $("#materia").val();
						document.location.href="http://johnafleming.cucei.udg.mx/cvmaestros/website/rep-materia.php?codigoMateria="+materiaSeleccionada;
					});
				</script>
			</center>
           <center>
				<button id="botonDescargar" type="submit" class="btn btn-lg btn-success" style="float: none; margin: 0 auto;">Descargar</button>
				<br>
				<div id="infoTabla"></div>
		   </form>
           </center>
	</div>
	</body>
	<?php include("includes/footer.php"); ?>
 
</html>


  
