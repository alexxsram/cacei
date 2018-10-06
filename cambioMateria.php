<!-- Inicio de Sesión -->
<?php
	session_start(); 
	$conexion = mysqli_connect("localhost","cvmaestros","H52ZhcNUD");
	mysqli_select_db($conexion, "cvmaestros_db");
	
	//Comprobar que sea un administrador
	$queryConsulta = "SELECT codigo FROM administrador WHERE codigo = " . $_SESSION["username"];
	$resultadoConsulta = mysqli_query($conexion, $queryConsulta);
	if(mysqli_num_rows($resultadoConsulta) == 0) {
		die("No tiene permiso de acceder a la pagina");
	}
	
	//Guardar informacion de los departamentos en una variable
	$queryConsultaDep = "SELECT * FROM departamento";
	$resultadoConsultaDep = mysqli_query($conexion, $queryConsultaDep);
	$infoDepartamentos = "<div style='margin: 0 auto;'><select class='form-control' id='departamento' name='departamento'>";
	while($departamento = $resultadoConsultaDep->fetch_assoc()) {
			$infoDepartamentos = $infoDepartamentos . "<option value='" . $departamento["idDepartamento"] . "'>" . $departamento["nombre"] . "</option>";
	}
	$infoDepartamentos = $infoDepartamentos . "</select></div>";
	function mostrarMaterias()
	{
		global $conexion;
		$queryConsulta = "SELECT * FROM materia";
		$resultadoConsulta = mysqli_query($conexion, $queryConsulta);
		while($materia = $resultadoConsulta->fetch_assoc()) {
			echo '<div class="documento" id="text">
					<div id="'.$materia["idMateria"].'">'.$materia["codigo"]." - ".$materia["nombre"].'
						<button type="button" class="delete" value="Remove Field" onclick="eliminarMateria(\''.$materia["idMateria"].'\')">        
							<i class="glyphicon glyphicon-remove"></i>
						</button>
					</div>
				  </div>';
		}
	}
		
?>

<!DOCTYPE html>
<html lang="es">
	<script>
		function validar(tipo, idInput, idSpan, tamanioMaximo){
			var campo = $("#"+idInput);
			var valor = campo.val();
			var mensaje;
			var expresion;
			switch (tipo){
				case 'numero':
					expresion = /\D/;
					mensaje = "Solo se admiten enteros";
					break;
				case 'flotante':
					expresion = /[^0-9.]/;
					mensaje = "Solo se admiten números";
					break;
				case 'texto':
					expresion = /[^A-Za-záéíóúÁÉÍÓÚñÑ ]/;
					mensaje = "Solo se admiten letras";
					break;
				case 'email':
					expresion = /[^A-Za-z0-9_@.]/;
					mensaje = "Caracter no válido";
					break;
				case 'alfanumericoEspacio':
					expresion = /[^A-Za-záéíóúÁÉÍÓÚñÑ 0-9.]/;
					mensaje = "Caracter no válido";
					break;
				case 'alfanumerico':
					expresion = /\W|_/;
					mensaje = "Caracter no válido";
					break;
				default:
					alert("algo no esta bien");
					break;
			}
			if(expresion.test(valor)){
				campo.val(valor.replace(expresion, ""));
				$("#"+idSpan).text(mensaje);
			}
			else{
				$("#"+idSpan).text("");
			}
			var valor = campo.val();
			if(valor.length > tamanioMaximo)
			{
				campo.val(valor.substr(0, tamanioMaximo));
				$("#"+idSpan).text("Limite de caracteres alcanzado");
			}
		}
	</script>
	<!-- Archivos de Cabecera (css, js) -->
	<?php include 'includes/head.php'; ?>
	
	<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

		<!-- Menu -->
		<?php include 'includes/header.php'; ?>

		<div class="section" style="margin-top: 100px; margin-bottom: 300px;">
			<div class="container">
				<form class="form-horizontal" role="orm" action="php/subeMateria.php" method="post">
					<div class="infoContainer">
						<div id="infoMaterias">
							<?php mostrarMaterias(); ?>
						</div>
						<div class="infoContainer" id="materia">
									<h4 class="infoContainerTitle ">Materia</h4>
									<center>
										<button type="button" class="linkDocumento" data-toggle="modal" data-target="#modalMateria">Agregar Materia</button>
										<div class="modal fade" id="modalMateria" role="dialog">
											<div class="modal-dialog">
												<div class="modal-content modal-sm" id="popup">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title">Materia</h4>
													</div>
													<div class="modal-body" id="campos">
														<label for="codigo" class="control-label">Codigo</label>
														<input type="text" class="form-control" id="codig" name="codig" placeholder="Codigo">
														<span id="helpCodig" class="help-block"></span>
														<label for="nombre" class="control-label">Nombre</label>
														<input type="text" class="form-control" id="nombr" placeholder="Nombre" name="nombr">
														<span id="helpNombr" class="help-block"></span>
														<label for="departamento" class="control-label">Departamento</label>
														<?php echo $infoDepartamentos; ?>
														<!-- Aqui poner un select para los departamentos -->
														<script>
															cargarValidarMateria();
															function cargarValidarMateria()
															{
																$("#codig").bind('input propertychange', function(){
																	validar("alfanumerico", "codig", "helpCodig", 10);
																});
																$("#nombr").bind('input propertychange', function(){
																	validar("texto", "nombr", "helpNombr", 100);
																});
															}
														</script>
													</div>
													<div class="modal-footer">
														<center>
															<button type="button" class="btn btn-success" data-dismiss="modal" onclick="mostrarInfoMateria()">Agregar</button>
														</center>
													</div>
													<script>
                                                        function eliminarMateria(materia)
														{
															$("#infoMaterias").append('<input type="hidden" name="materiaEliminar[]" value="' + materia + '">');
															$("#"+materia).parent().remove();
														}
                                                        function mostrarInfoMateria()
                                                        {
                                                            //Crear nuevo div para poner la informacion
                                                            var nuevoDiv = document.createElement("DIV");
                                                            var codigo = document.getElementById("codig").value;
                                                            var nombre = document.getElementById("nombr").value;
                                                            var idDepartamento = document.getElementById("departamento").value;
                                                            var nombreDepartamento = document.getElementById("departamento").text;
                                                            if(codigo != "" && nombre != "" && idDepartamento != ""){
                                                                nuevoDiv.setAttribute("class","documento");
                                                                nuevoDiv.setAttribute("id", "text");
                                                                nuevoDiv.innerHTML += "<div id='"+ codigo +"'>" + codigo + " - " + nombre +
                                                                '<input type="hidden" name="codigo[]" id="codigo" value="' + codigo +'" >'+
                                                                '<input type="hidden" name="nombre[]" id="nombre" value="' + nombre + '" >'+
                                                                '<input type="hidden" name="idDepartamento[]" id="idDepartamento" value="' + idDepartamento + '" >'+
																'<button type="button" class="delete" value="Remove Field" onclick="eliminarMateria(\'' + codigo + '\')">'+
																'<i class="glyphicon glyphicon-remove"></i>'+
																'</button>'+
																'</div>';
																
                                                                $('#infoMaterias').append(nuevoDiv);
                                                                //Se crea un nuevo div que reemplazara al anterior con los campos de informacion del idioma
                                                                var nuevoDivCampos = document.createElement("DIV");
                                                                nuevoDivCampos.setAttribute("id","campos");
																nuevoDivCampos.setAttribute("class","modal-body");
																nuevoDivCampos.innerHTML += '<label for="codigo" class="control-label">Codigo</label>'+
																'<input type="text" class="form-control" id="codig" name="codig" placeholder="Codigo">'+
																'<span id="helpCodig" class="help-block"></span>'+
																'<label for="nombre" class="control-label">Nombre</label>'+
																'<input type="text" class="form-control" id="nombr" placeholder="Nombre" name="nombr">'+
																'<span id="helpNombr" class="help-block"></span>'+
																'<label for="departamento" class="control-label">Departamento</label>'+
																"<?php echo $infoDepartamentos; ?>";
																$("#codig").parent().replaceWith(nuevoDivCampos);
																cargarValidarMateria();
                                                            }
                                                        }
                                                    </script>
												</div>
											</div>
										</div>
									</center>
								</div>
							</div>
							<center>
								<button align="right" type="submit" class="btn btn-lg btn-success" style="float: none; margin: 0 auto;">Modificar Academico</button>
							</center>
					</form>
			</div>
		</div>

		<!-- Footer -->
		<?php include 'includes/footer.php'; ?>

	</body>

</html>