<!-- Sección para Mostrar resultados de busqueda para academicos -->
<section id="contact" class="contact-section" style="min-height: 60%; padding-top: 20px;">
	<div class="container">
		<div class="row">
			<?php
			$conexion = mysqli_connect("localhost","cvmaestros","H52ZhcNUD");
			mysqli_select_db($conexion, "cvmaestros_db");

			if(empty($_GET["codigo"]))
				$sql = "SELECT * FROM maestro ORDER BY nombre";
			else
				$sql = "SELECT * FROM maestro WHERE nombre LIKE '%" . $_GET["codigo"] . "%'"  . " OR apellidoPaterno LIKE '%" . $_GET["codigo"] . "%'"  . " OR apellidoMaterno LIKE '%" . $_GET["codigo"] . "%'"  . " OR tipoContrato = '" . $_GET["codigo"] . "'" . " OR codigo = '" . $_GET["codigo"] . "'";

			$result = $conexion->query($sql);

			if ($result->num_rows > 0) {

				if(!empty($_GET["codigo"]))
					echo "<h3 style=\"color: white;\">Resultados para: " . $_GET["codigo"] . "</h3>";
				// output data of each row
				while($row = $result->fetch_assoc()) {

					if(!file_exists($row["foto"]))
						$row["foto"] = "http://pingendo.github.io/pingendo-bootstrap/assets/user_placeholder.png";


					echo    "<div class='col-md-4' style='max-width: 400px; margin: 10px auto;'>
								<div class='academico-container'>";

					if(!empty($_SESSION)) {
						echo    "<form id=\"eliminar\" method=\"post\" action=\"php/eliminarAcademico.php\">
                                            <button class=\"eliminar\" type=\"button\" data-toggle=\"modal\" data-target=\"#myModal" . $row["codigo"] . "\">
                                                <i class=\"glyphicon glyphicon-remove\"></i>
                                            </button>
											<!-- Modal -->
											<div id=\"myModal" . $row["codigo"] . "\" class=\"modal fade\" role=\"dialog\">
											  <div class=\"modal-dialog\">

												<!-- Modal content-->
												<div class=\"modal-content\">
												  <div class=\"modal-header\">
													<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
													<h4 class=\"modal-title\" style='color: black;'>Eliminar Academico</h4>
												  </div>
												  <div class=\"modal-body\">
													<p style='color: black;'>Estas seguro de quere eliminar al academico con el codigo:" . $row["codigo"] . "?</p>
												  </div>
												  <div class=\"modal-footer\">
													<button type=\"submit\" name=\"eliminar\" value=\"" . $row["codigo"] . "\" class=\"btn btn-default\">Si</button>
													<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">No</button>
												  </div>
												</div>

											  </div>
											</div>
                                        </form>

                                        <form id=\"cambio\" method=\"post\" action=\"cambio.php\">
                                            <button class=\"editar\" type=\"submit\"  name=\"editar\" value=\"" . $row["codigo"] . "\" >
                                                <i class=\"glyphicon glyphicon-edit\"></i>
                                            </button>
                                        </form>";
					}
					
					if($row['tipoContrato'] == '')
						$row['tipoContrato'] = 'Sin contrato';

					echo    "<a href='academico.php?codigo=" . $row['codigo'] . "'>
                                            <div class='btn circle-avatar' style='background-image:url(\"" . $row['foto'] . "\")'></div>
                                            <div style='display: table; width: 100%; min-height: 80px; max-height: 80px; margin: 5px 0 5px 0;'><h3 style='display: table-cell; vertical-align: middle;'>" . $row['nombre'] . " " . $row['apellidoPaterno'] . " " . $row['apellidoMaterno'] . "</h3></div>
                                            <p>" . $row["tipoContrato"] . "</p>
                                            </a>
                                        </div>
                                    </div>";
				}
			} else {
				echo "<h1 style=\"color: white;\">0 resultados</h1>";
			}
			?>
		</div>

		<!-- /.row -->
	</div>
</section>