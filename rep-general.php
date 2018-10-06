<?php
	session_start();
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
           <a href="php/generarPdf.php" class="button">Descargar</a>
           </center>
			 <table class="table table-striped table-condensed table-hover">
        	<tr>
                <th width="150">Codigo</th>
            	<th width="300">Nombre</th>
                <th width="200">Email</th>
            </tr>
			<?php 
			$query = "SELECT nombre, email, codigo FROM `maestro`";
			$resultadoConsulta = mysqli_query($conexion, $query);

				if(mysqli_num_rows($resultadoConsulta) > 0)
				{
					while(($row = mysqli_fetch_assoc($resultadoConsulta)) != NULL){
					 echo '<tr>
							<td>'.$row['codigo'].'</td>
							<td>'.$row["nombre"].' '.$row["apellidoPaterno"].' '.$row["apellidoMaterno"].'</td>
							<td>'.$row['email'].'</td>
						</tr>
						<br>';
					}
				}
				else
				{
					$htmlMaestros = $htmlMaestros.'<h1>No hay  maestros registrados</h1>';
				}
			?>
				</table>
	</div>
	</body>
	<?php include("includes/footer.php"); ?>
 
</html>


  
