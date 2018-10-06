<?php
$conexion = mysqli_connect("localhost","cvmaestros","H52ZhcNUD");
mysqli_select_db($conexion, "cvmaestros_db");

$queryConsulta = "SELECT * FROM materia";
$resultadoConsulta = mysqli_query($conexion, $queryConsulta);

$string = "<div style='margin: 0 auto;'><select class='form-control input-lg' style='max-width: 80%; float: left;' name='materias[]'>";

while($materia = $resultadoConsulta->fetch_assoc()) {
	$string = $string . "<option value='" . $materia["idMateria"] . "'>" . $materia["nombre"] . "</option>";
}

$string = $string . "</select><div class='button-wrapper' style='width: inherit; float: right;'><button class='delete' value='Remove Field'><i class='glyphicon glyphicon-remove'></i></button></div>";
?>
	
<div class="infoContainer" id="materiasContainer" style="border: none;">

	<div id="container">
		
	</div>

	<center>
		<button type="button" class="linkDocumento" id="labelMateria">Agregar Materia</button>
	</center>
</div>

<script>

	$("#labelMateria").click(function(e) {
		
		$("#materiasContainer #container").last().append("<div id='textMaterias' style='min-height: 60px; margin: 0 auto; width: 90%;'><?php echo $string; ?></div>");

		$(".delete").on('click', function() {
			$(this).parent().parent().parent().remove();
		});

	});

</script>

<style>
	#textMaterias {
		background-color: transparent;
	}
</style>