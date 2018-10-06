<?php
$infoMaterias = array();
$codigo = $_POST["editar"];
$conexion = mysqli_connect("localhost","cvmaestros","H52ZhcNUD");
mysqli_select_db($conexion, "cvmaestros_db");
$queryInfoMaterias = "SELECT idMateria, nombre, codigo FROM materia";
$resultadoInfoMaterias = mysqli_query($conexion, $queryInfoMaterias);
while(($rowInfoMateria = mysqli_fetch_assoc($resultadoInfoMaterias)) != NULL){
	$infoMaterias[$rowInfoMateria["idMateria"]] = array($rowInfoMateria["codigo"],$rowInfoMateria["nombre"],);
}

function mostrarMaterias()
{
	global $conexion, $codigo, $infoMaterias;
	$queryConsultaMaestroMateria = "SELECT idMateria FROM maestroMateria WHERE idMaestro = '$codigo'";
	$resultadoConsultaMaestroMateria = mysqli_query($conexion, $queryConsultaMaestroMateria);
	if(mysqli_num_rows($resultadoConsultaMaestroMateria) > 0)
	{
		while(($rowMaestroMaterias = mysqli_fetch_assoc($resultadoConsultaMaestroMateria)) != NULL){    
			$queryConsultaMateria = "SELECT * FROM materia WHERE idMateria = ".$rowMaestroMaterias["idMateria"];
			$resultadoConsultaMateria = mysqli_query($conexion, $queryConsultaMateria);
			if(mysqli_num_rows($resultadoConsultaMateria) > 0)
			{
				while(($rowMateria = mysqli_fetch_assoc($resultadoConsultaMateria)) != NULL){    
					echo '<div class="documento" id="text">
                            <div id="'.$rowMateria["idMateria"].'">'.$rowMateria["nombre"].$rowInfoMateria[$rowMateria["idMateria"]].'
                                <button type="button" class="delete" value="Remove Field" onclick="eliminarMateria(\''.$rowMateria["idMateria"].'\')">        
                                    <i class="glyphicon glyphicon-remove"></i>
                                </button>
                            </div>
                          </div>';
				}
			}
		}
	}   
	else
	{
		echo '<div id="sinMaterias"><div class="documento" id="text">No tiene materias asignadas</div></div>';
	}
}
?>
<div class="row ">
	<div id="infoMaterias">
		<?php 
		mostrarMaterias();
		?>
	</div>
	<center>
		<button type="button" class="linkDocumento" data-toggle="modal" data-target="#modalMateria">Agregar Materia</button>
		<div class="modal fade" id="modalMateria" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content modal-md" id="popupMateria">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Materia</h4>
					</div>
					<div class="modal-body" id="campos">
						<?php echo $string; ?>
					</div>
					<div class="modal-footer">
						<center>
							<button type="button" style="margin-top: 20px" class="btn btn-success" data-dismiss="modal" onclick="mostrarInfoMateria()">Agregar</button>
						</center>
					</div>
				</div>
			</div>
		</div>
	</center>
	<script>
		var idMateria, materia, combo;

		function selectMateria(id, nombre, select) {
			console.log(id);
			console.log(nombre);
			idMateria = id;
			materia = nombre;
			combo = select;
		}

		function eliminarMateria(materia)
		{
			$("#infoMaterias").append('<input type="hidden" name="materiaEliminar[]" value="' + materia + '">');
			$("#"+materia).parent().remove();
		}
		function mostrarInfoMateria()
		{
			//Crear nuevo div para poner la informacion
			var nuevoDiv = document.createElement("DIV");

			if(idMateria != null) {
				nuevoDiv.setAttribute("class","documento");
				nuevoDiv.setAttribute("id", "text");
				nuevoDiv.innerHTML += "<div id='" + idMateria + "'>" + materia  +
				'<input type="hidden" name="idMateria[]" id="idMateria" value="' + idMateria + '" ></div>';
				nuevoDiv.innerHTML += "<div class='button-wrapper'><button type='button' class='delete' value='Remove Field' onclick=\"eliminarHabilidad('"+ idMateria +"')\"><i class='glyphicon glyphicon-remove'></i></button></div>";
				$('#infoMaterias').append(nuevoDiv);
				//Se crea un nuevo div que  reemplazara al anterior con los campos de informacion del idioma
				var nuevoDivCampos = document.createElement("DIV");
				nuevoDivCampos.setAttribute("id","campos");
				nuevoDivCampos.setAttribute("class","modal-body");
				nuevoDivCampos.innerHTML += '<label for="codigoMateria" class="control-label">Codigo</label>';
				nuevoDivCampos.innerHTML += '<input type="text" class="form-control" id="codigMateria" name="codigMateria" placeholder="Codigo">';
				nuevoDivCampos.innerHTML += '<label for="nombreMateria" class="control-label">Nombre</label>';
				nuevoDivCampos.innerHTML += '<input type="text" class="form-control" id="nombrMateria" placeholder="Nombre" name="nombrMateria" disabled>';
				$("#nombrMateria").parent().replaceWith(nuevoDivCampos);
				
				idMateria = null;
				materia = null;
				combo.selectedIndex = 0;
			}

		}
	</script>
</div>