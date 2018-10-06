<?php 
	$conexion = mysqli_connect("localhost","cvmaestros","H52ZhcNUD", "cvmaestros_db");
	//Se obtiene el codigo utilizado en la sesion
	SESSION_START();
	$codigo = $_SESSION["codigo"];
	//Se busca en la tabla de administrador para confirmar que tenga permisos de ABC
	$query = "SELECT * FROM administrador WHERE codigo = $codigo";
	$resultadoConsulta = mysqli_query($conexion, $query);
	//Se comprueba primero que solo haya un resultado
	if(mysqli_num_rows($resultadoConsulta) != 1)
	{
		//Al haber un error s redirecciona, y
		header('Location: ../index.html');
	}
?>


<html><head>
<!-- Codigo del formulario para subir un documento y su imagen -->
<style>
    .thumb {
    height: 300px;
    border: 1px solid #000;
    margin: 10px 5px 0 0;
    }
</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://johnafleming.cucei.udg.mx/cvmaestros/js/jquery.min.js"></script>
    <script type="text/javascript" src="http://johnafleming.cucei.udg.mx/cvmaestros/js/bootstrap.min.js"></script>
    <link href="http://johnafleming.cucei.udg.mx/cvmaestros/css/bootstrap.css" rel="stylesheet" type="text/css">
  </head><body>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <form class="form-horizontal" role="form" action="subirDocumento.php" method="POST" enctype="multipart/form-data">
			  <div class="form-group">
                <div class="col-sm-2">
                  <label for="descripcionDocumento" class="control-label">Descripción documento</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="descripcionDocumento" placeholder="Descripción documento" name="descripcionDocumento">
                </div>
                <input required onclick="agregar()" name="files[]" type="file" id="files" multiple>
				<script>
				function agregar() {
					document.getElementById("archivos").innerHTML += '<input name="files[]" type="file" id="files" multiple>';
				}
				</script>	
				<div id="archivos" class="form-group"></div>
				<output id="list"></output>    
				<!-- Sirve para mostrar la imagen seleccionada antes de subirla -->
        <script>
function archivo(evt) {
                  var files = evt.target.files; // FileList object
             
                  // Obtenemos la imagen del campo "file".
                  for (var i = 0, f; f = files[i]; i++) {
                    //Solo admitimos imágenes.
                    if (!f.type.match('image.*')) {
                        continue;
                    }
             
                    var reader = new FileReader();
             
                    reader.onload = (function(theFile) {
						document.getElementById("list").innerHTML ="";
                        return function(e) {
                          // Insertamos la imagen
                         document.getElementById("list").innerHTML += '<img class="thumb" src="'+ e.target.result +'" title="'+ escape(theFile.name)+ '">';
                        };
                    })(f);
             
                    reader.readAsDataURL(f);
                  }
              }
              document.getElementsById('files').addEventListener('change', archivo, false);
      </script>
              </div>
              <br />
              <button type="submit" class="btn btn-default">Subir</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  

</body></html>