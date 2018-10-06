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
		<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalIdioma">Idioma</button>
		<form action="pruebaPop.php" method="post"  role="form">
		<div class="modal fade" id="modalIdioma" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content modal-sm" id="popup">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Idioma</h4>
					</div>
					<div class="modal-body" id="campos">
								<label for="idioma" class="control-label">Idioma</label>
								<input required type="text" class="form-control" id="idiom" name="idiom" placeholder="Idioma">
								<label for="comprension" class="control-label">Comprensión</label>
								<input required type="text" class="form-control" id="compre" placeholder="Comprensión" name="compre">
								<label for="lectura" class="control-label">Lectura</label>
								<input required type="text" class="form-control" id="lectu" placeholder="Lectura" name="lectu">
								<label for="escritura" class="control-label">Escritura</label>
								<input required type="text" class="form-control" placeholder="Escritura" id="escri" name="escri">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="mostrarInfo()">Agregar</button>
					</div>
				<script>
				function eliminar(idioma)
				{
					$("#"+idioma).remove();
				}
				  function mostrarInfo()
				  {
					//Obtener el div padre
					var divPadre = document.getElementById("divInformacion");
					//Crear nuevo div para poner la informacion
					var nuevoDiv = document.createElement("DIV");
					nuevoDiv.setAttribute("class","divBorde row");
					var idioma = document.getElementById("idiom").value;
					var escritura = document.getElementById("escri").value;
					var comprension = document.getElementById("compre").value;
					var lectura = document.getElementById("lectu").value;
					nuevoDiv.setAttribute("id", idioma);
					nuevoDiv.innerHTML += "Idioma " + idioma  + "<br>";
					nuevoDiv.innerHTML += "Comprensión " + comprension + "<br>";
					nuevoDiv.innerHTML += "Lectura " + lectura + "<br>";
					nuevoDiv.innerHTML += "Escritura " + escritura + "<br>";
					nuevoDiv.innerHTML += "<button style='color:blank' ='button' class='btn btn-danger' onclick=\"eliminar('"+ idioma +"')\">X</button>";
					nuevoDiv.innerHTML += '<input type="hidden" name="idioma[]" id="idioma" value="' + idioma +'" >';
					nuevoDiv.innerHTML += '<input type="hidden" name="comprension[]" id="comprension" value="' + comprension + '" >';
					nuevoDiv.innerHTML += '<input type="hidden" name="lectura[]" id="lectura" value="' + lectura + '" >';
				    nuevoDiv.innerHTML += '<input type="hidden" name="escritura[]" id="escritura" value="' + escritura+ '">';
					divPadre.appendChild(nuevoDiv);
					//Se crea un nuevo div que reemplazara al anterior con los campos de informacion del idioma
					var nuevoDivCampos = document.createElement("DIV");
					nuevoDivCampos.setAttribute("id","campos");
					nuevoDivCampos.setAttribute("class","modal-body");
					nuevoDivCampos.innerHTML += '<label for="idioma" class="control-label">Idioma</label>';
					nuevoDivCampos.innerHTML += '<input type="text" class="form-control" id="idiom" name="idiom" placeholder="Idioma">';
					nuevoDivCampos.innerHTML += '<label for="comprension" class="control-label">Comprensión</label>';
					nuevoDivCampos.innerHTML += '<input type="text" class="form-control" id="compre" placeholder="Comprensión" name="compre">';
					nuevoDivCampos.innerHTML += '<label for="lectura" class="control-label">Lectura</label>';
					nuevoDivCampos.innerHTML += '<input type="text" class="form-control" id="lectu" placeholder="Lectura" name="lectu">';
					nuevoDivCampos.innerHTML += '<label for="escritura" class="control-label">Escritura</label>';
					nuevoDivCampos.innerHTML += '<input type="text" class="form-control" placeholder="Escritura" id="escri" name="escri">';
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