
<style>

	.table th {
		background-color: #282B2D;
		color: white;
	}
	
	.table tr td {
		background-color: white;
		color: black;
	}
	
</style>

<table class="table" style="margin-top: 30px;">
	<thead>
		<tr>
			<th>C&oacute;digo</th>
			<th>Materia</th>
			<th>Departamento</th>
		</tr>
	</thead>
	<tbody>
		<?php
		mysql_set_charset("UTF8");

		if(!empty($codigo))
			$sqlMaestroMaterias = "SELECT * FROM maestroMateria WHERE idMaestro = " . $codigo;

		$resultMaestroMaterias = $conexion->query($sqlMaestroMaterias);

		if ($resultMaestroMaterias->num_rows > 0) {

			while($rowMaestroMateria = $resultMaestroMaterias->fetch_assoc()) {
				$sqlMateria = "SELECT * FROM materia WHERE idMateria = " . $rowMaestroMateria["idMateria"];
				$resultMateria = $conexion->query($sqlMateria);

				if($resultMateria->num_rows == 1) {
					$rowMateria = $resultMateria->fetch_assoc();

					$sqlDepartamento = "SELECT * FROM departamento WHERE idDepartamento = " . $rowMateria["idDepartamento"];
					$resultDepartamento = $conexion->query($sqlDepartamento);
					$rowDepartamento = $resultDepartamento->fetch_assoc();

					echo "<tr><td>" . $rowMateria["codigo"] . "</td><td>" . $rowMateria["nombre"] . "</td><td>" . $rowDepartamento["nombre"] . "</td></tr>";
				}
			}
		}
		?>
	</tbody>
</table>