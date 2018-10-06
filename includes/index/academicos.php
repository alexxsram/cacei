<!-- Sección de Contacto -->
<section id="contact" class="contact-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 style="text-align: center; color: white;">Algunos de Nuestros Académicos:</h1>
				<p style="text-align: center; color: white;">Académicos, Maestros, Doctores e Investigadores.</p>
			</div>
		</div>

		<div class="row">
			<?php
			SESSION_START();
			
			$conexion = mysqli_connect("localhost","cvmaestros","H52ZhcNUD");
			mysqli_select_db($conexion, "cvmaestros_db");
			
			function direccionaBoton($codigo){
				if(isset($_SESSION["username"]))
				{
					return "academico.php?codigo=" . $codigo;
				}
				else{
					return "login.php";
				}
			}
			
			
			$sql = "SELECT * FROM maestro ORDER BY RAND() LIMIT 3";

			$result = $conexion->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {

					if(!file_exists($row["foto"]))
						$row["foto"] = "http://pingendo.github.io/pingendo-bootstrap/assets/user_placeholder.png";


					echo "  
                            <div class=\"col-md-4\" style=\"max-width: 400px; margin: 10px auto;\">
                            <div class=\"academico-container\">
                            <a href='".direccionaBoton($row["codigo"])."'>
                            <div class=\"circle-avatar\" style=\"background-image:url(" . $row["foto"] . "\"></div>
                            <h3><center>" . $row["nombre"] . " " . $row["apellidoPaterno"] . " " . $row["apellidoMaterno"] . "</center></h3>
                            <p><center>" . $row["tipoContrato"] . "</center></p>
                            </a>
                            </div>
                            </div>";
				}
			} else {
				echo "0 results";
			}
			?>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h4 style="text-align: center; color: #CCCCCC; font-style: italic;">Que la comunidad Universitaria conozca a nuestros colaboradores responsables de la formación integral de<br><br>Profesionistas de Alto Nivel.</h4>
			</div>
		</div>
		<!-- /.row -->
	</div>
</section>