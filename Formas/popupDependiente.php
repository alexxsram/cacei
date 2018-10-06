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
		<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalDependiente">Dependiente</button>
		<form action="pruebaPopDependiente.php" method="post"  role="form">
		<div class="modal fade" id="modalDependiente" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content modal-sm" id="popup">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Dependiente</h4>
					</div>
					<div class="modal-body" id="campos">
						<label for="nombre" class="control-label">Nombre</label>
						<input required type="text" class="form-control" id="nombr" name="nombr" placeholder="Nombre">
						<label for="parentesco" class="control-label">Parentesco</label>
						<input required type="text" class="form-control" id="paren" placeholder="Parentesco" name="paren">
						<label for="fechaNacimiento" class="control-label">Fecha nacimiento</label>
						<input required type="text" class="form-control" id="fecha" placeholder="aaaa-mm-dd" name="fecha">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="mostrarInfo()">Agregar</button>
					</div>
				<script>
				function eliminar(nombre)
				{
					$("#"+nombre).remove();
				}
				  function mostrarInfo()
				  {
					//Obtener el div padre
					var divPadre = document.getElementById("divInformacion");
					//Crear nuevo div para poner la informacion
					var nuevoDiv = document.createElement("DIV");
					nuevoDiv.setAttribute("class","divBorde row");
					var nombre = document.getElementById("nombr").value;
					var parentesco = document.getElementById("paren").value;
					var fechaNacimiento = document.getElementById("fecha").value;
					nuevoDiv.setAttribute("id", nombre);
					nuevoDiv.innerHTML += "Nombre " + nombre  + "<br>";
					nuevoDiv.innerHTML += "Parentesco " + parentesco + "<br>";
					nuevoDiv.innerHTML += "Fecha de nacimiento " + fechaNacimiento + "<br>";
					nuevoDiv.innerHTML += "<button style='color:blank' ='button' class='btn btn-danger' onclick=\"eliminar('"+ nombre +"')\">X</button>";
					nuevoDiv.innerHTML += '<input type="hidden" name="nombre[]" id="nombre" value="' + nombre +'" >';
					nuevoDiv.innerHTML += '<input type="hidden" name="parentesco[]" id="parentesco" value="' + parentesco + '" >';
					nuevoDiv.innerHTML += '<input type="hidden" name="fechaNacimiento[]" id="fechaNacimiento" value="' + fechaNacimiento + '" >';
					divPadre.appendChild(nuevoDiv);
					//Se crea un nuevo div que reemplazara al anterior con los campos de informacion del idioma
					var nuevoDivCampos = document.createElement("DIV");
					nuevoDivCampos.setAttribute("id","campos");
					nuevoDivCampos.setAttribute("class","modal-body");
					nuevoDivCampos.innerHTML += '<label for="nombre" class="control-label">Nombre</label>';
					nuevoDivCampos.innerHTML += '<input type="text" class="form-control" id="nombr" name="nombr" placeholder="Nombre">';
					nuevoDivCampos.innerHTML += '<label for="parentesco" class="control-label">Parentesco</label>';
					nuevoDivCampos.innerHTML += '<input type="text" class="form-control" id="paren" placeholder="Parentesco" name="paren">';
					nuevoDivCampos.innerHTML += '<label for="fechaNacimiento" class="control-label">Fecha nacimiento</label>';
					nuevoDivCampos.innerHTML += '<input type="text" class="form-control" id="fecha" placeholder="aaaa-mm-dd" name="fecha">';
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