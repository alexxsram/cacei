<html><head>
<style>
	.divBorde
	{
		border-radius : 15px;
		background-color : #282B2D;
		color : #FFFFFF;
		font-size : 120%;
	}
</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://johnafleming.cucei.udg.mx/cvmaestros/js/jquery.min.js"></script>
    <script type="text/javascript" src="http://johnafleming.cucei.udg.mx/cvmaestros/js/bootstrap.min.js"></script>
    <link href="http://johnafleming.cucei.udg.mx/cvmaestros/css/bootstrap.css" rel="stylesheet" type="text/css">
  </head><body>
  <div class="container">
		<h4>Abrir popup</h4>
		<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalProgramaHabilidad">Programa habilidad</button>
		<form action="pruebaPopPH.php" method="post"  role="form">
		<div class="modal fade" id="modalProgramaHabilidad" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content modal-sm" id="popup">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Programa habilidad</h4>
					</div>
					<div class="modal-body" id="campos">
						<label for="programa" class="control-label">Programa</label>
						<input required type="text" class="form-control" id="progr" name="progr" placeholder="Programa">
						<label for="porcentaje" class="control-label">Porcentaje dominado</label>
						<input required type="text" class="form-control" id="porce" placeholder="Porcentaje dominado" name="porce">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="mostrarInfo()">Agregar</button>
					</div>
				<script>
				function eliminar(programa)
				{
					$("#"+programa).remove();
				}
				  function mostrarInfo()
				  {
					//Obtener el div padre
					var divPadre = document.getElementById("divInformacion");
					//Crear nuevo div para poner la informacion
					var nuevoDiv = document.createElement("DIV");
					nuevoDiv.setAttribute("class","divBorde row");
					var programa = document.getElementById("progr").value;
					var porcentaje = document.getElementById("porce").value;
					nuevoDiv.setAttribute("id", programa);
					nuevoDiv.innerHTML += "Programa " + programa  + "<br>";
					nuevoDiv.innerHTML += "Porcentaje " + porcentaje + "<br>";
					nuevoDiv.innerHTML += "<button style='color:blank' ='button' class='btn btn-danger' onclick=\"eliminar('"+ programa +"')\">X</button>";
					nuevoDiv.innerHTML += '<input type="hidden" name="programa[]" id="programa" value="' + programa +'" >';
					nuevoDiv.innerHTML += '<input type="hidden" name="porcentaje[]" id="porcentaje" value="' + porcentaje + '" >';
					divPadre.appendChild(nuevoDiv);
					//Se crea un nuevo div que reemplazara al anterior con los campos de informacion del idioma
					var nuevoDivCampos = document.createElement("DIV");
					nuevoDivCampos.setAttribute("id","campos");
					nuevoDivCampos.setAttribute("class","modal-body");
					nuevoDivCampos.innerHTML += '<label for="programa" class="control-label">Programa</label>';
					nuevoDivCampos.innerHTML += '<input type="text" class="form-control" id="progr" name="progr" placeholder="Programa">';
					nuevoDivCampos.innerHTML += '<label for="porcentaje" class="control-label">Porcentaje dominado</label>';
					nuevoDivCampos.innerHTML += '<input type="text" class="form-control" id="porce" placeholder="Porcentaje dominado" name="porce">';
					document.getElementById("popup").replaceChild(nuevoDivCampos, document.getElementById("campos"));
				  }
				  </script>
				</div>
			</div>
		</div>
		<button type="submit" class="btn btn-primary">Guardar</button>
		<div id="divInformacion">
		</div>
		</form>
	</div>
  </div>
  </body>
  </html>