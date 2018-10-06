<?php
session_start();
$existe = false;
$conexion = mysqli_connect("localhost","cvmaestros","H52ZhcNUD");
mysqli_select_db($conexion, "cvmaestros_db");
$codigo = $_GET['editar'];
if (empty($codigo))
    die("Codigo no valido");

$queryConsulta = "SELECT * FROM maestro WHERE codigo = " . $codigo;
$resultadoConsulta = mysqli_query($conexion, $queryConsulta);
global $row;

if(mysqli_num_rows($resultadoConsulta) == 1) {
    $row = $resultadoConsulta->fetch_assoc();
    $existe = true;
}
else
    die("No existe academico");


function agregaSelectRangoSeleccionado($inicio, $fin, $dato)
{
    for($i = $inicio; $i <= $fin; $i++)
    {
        if($i == $dato)
        {
            echo '<option selected>'.sprintf("%02d", $i).'</option>';
        }
        else
        {
            echo '<option>'.sprintf("%02d", $i).'</option>';
        }
    }
}
function agregaSelectRango($inicio, $fin)
{
    for($i = $inicio; $i <= $fin; $i++)
    {
        echo '<option>'.sprintf("%02d", $i).'</option>';
    }
}
function estaActivo($tipo, $nombre, $valor, $dato, $descripcion)
{
    if($dato == $valor)
    {
        if($tipo == "option")
        {
            echo "<option selected value='$valor'>$descripcion</option>";
        }
        else{
            echo "<input type='$tipo' name='$nombre' value='$valor' checked>
                                        <label for='$nombre' class='control-label
                                                                     ' style='color: white;'     >$descripcion</label>";
        }			
    }
    else{
        if($tipo == "option")
        {
            echo "<option value='$valor'>$descripcion</option>";
        }
        else{
            echo "<input type='$tipo' name='$nombre' value='$valor'>
                                        <label for='$nombre' class='control-label
                                                                     ' style='color: white;'>$descripcion</label>";
        }
    }
}
function mostrarIdiomasExistentes()
{
    $codigo = $_POST['editar'];
    global $conexion;
    $queryConsulta = "SELECT * FROM idioma WHERE codigo = " . $codigo;
    $resultadoConsulta = mysqli_query($conexion, $queryConsulta);
    if(mysqli_num_rows($resultadoConsulta) > 0)
	{
        while(($row = mysqli_fetch_assoc($resultadoConsulta)) != NULL){
            $idioma = $row["idioma"];
            $comprension = $row["comprension"];
            $lectura = $row["lectura"];
            $escritura = $row["escritura"];
            echo '
            <div class="documento" id="text">
                <div id="'.$idioma.'">Idioma '.$idioma.'<br>
                        <button type="button" class="delete" value="Remove Field" onclick="eliminar(\''.$idioma.'\')">        
                            <i class="glyphicon glyphicon-remove"></i>
                        </button>
                    Comprensión '.$comprension.'%<br>
                    Lectura '.$lectura.'%<br>
                    Escritura '.$escritura.'%<br>
                    <input type="hidden" name="idioma[]" id="idioma" value="'.$idioma.'" >
                    <input type="hidden" name="comprension[]" id="comprension" value="'.$comprension.'" >
                    <input type="hidden" name="lectura[]" id="lectura" value="'.$lectura.'" >
                    <input type="hidden" name="escritura[]" id="escritura" value="'.$escritura.'"
                    </div>
                </div>
                </div>';
        }
    }
}
function mostrarHabilidadesExistentes()
{
    $codigo = $_POST['editar'];
    global $conexion;
    $queryConsulta = "SELECT * FROM habilidadcomputo WHERE codigo = " . $codigo;
    $resultadoConsulta = mysqli_query($conexion, $queryConsulta);
    if(mysqli_num_rows($resultadoConsulta) > 0)
	{
        while(($row = mysqli_fetch_assoc($resultadoConsulta)) != NULL){
            $programa = $row["programa"];
            $porcentaje = $row["porcentaje"];
            echo '
            <div class="documento" id="text">
                <div id="'.$programa.'">Programa '.$programa.'<br>
                        <button type="button" class="delete" value="Remove Field" onclick="eliminarHabilidad(\''.$programa.'\')">        
                            <i class="glyphicon glyphicon-remove"></i>
                        </button>
                    Porcentaje '.$porcentaje.'%<br>
                    <input type="hidden" name="programa[]" id="programa" value="'.$programa.'" >
                    <input type="hidden" name="porcentaje[]" id="porcentaje" value="'.$porcentaje.'" >
                    </div>
                </div>';
        }
    }
}
function mostrarDependientesExistentes()
{
    $codigo = $_POST['editar'];
    global $conexion;
    $queryConsulta = "SELECT * FROM dependiente WHERE codigo = " . $codigo;
    $resultadoConsulta = mysqli_query($conexion, $queryConsulta);
    if(mysqli_num_rows($resultadoConsulta) > 0)
	{
        while(($row = mysqli_fetch_assoc($resultadoConsulta)) != NULL){
            $nombre = $row["nombre"];
            $parentesco = $row["parentesco"];
            $fechaNacimiento = $row["fechaNacimiento"];
            echo '
            <div class="documento" id="text">
                <div id="'.$nombre.'">Nombre '.$nombre.'<br>
                        <button type="button" class="delete" value="Remove Field" onclick="eliminarDependiente(\''.$nombre.'\')">        
                            <i class="glyphicon glyphicon-remove"></i>
                        </button>
                    Parentesco '.$parentesco.'<br>
                    Fecha nacimiento '.$fechaNacimiento.'<br>
                    <input type="hidden" name="nombreDep[]" id="nombreDep" value="'.$nombre.'" >
                    <input type="hidden" name="parentescoDep[]" id="parentescoDep" value="'.$parentesco.'" >
                    <input type="hidden" name="fechaNacimientoDep[]" id="fechaNacimientoDep" value="'.$fechaNacimiento.'" >
                    </div>
                </div>';
        }
    }
}
function mostrarMeses($variableRow, $nombreVariable)
{
    $mes = explode("-",$variableRow[$nombreVariable]);
    $mes = $mes[1];
     estaActivo("option", "", "01", $mes, "Enero");
     estaActivo("option", "", "02", $mes, "Febrero");
     estaActivo("option", "", "03", $mes, "Marzo");
     estaActivo("option", "", "04", $mes, "Abril");
     estaActivo("option", "", "05", $mes, "Mayo");
     estaActivo("option", "", "06", $mes, "Junio");
     estaActivo("option", "", "07", $mes, "Julio");
     estaActivo("option", "", "08", $mes, "Agosto");
     estaActivo("option", "", "09", $mes, "Septiembre");
     estaActivo("option", "", "10", $mes, "Octubre");
     estaActivo("option", "", "11", $mes, "Noviembre");
     estaActivo("option", "", "12", $mes, "Diciembre");
}
?>

<html>
    <script>
        function deshabilitarYBorrar(nombre)
            {
                var campo = $(nombre);
                campo.prop('disabled', true);
                campo.val("");
            }
            function deshabilitarYBorrarCheckbox(nombre)
            {
                var campo = $(nombre);
                campo.prop('checked', false);
                campo.prop('disabled', true);
            }
            function comprobarEstadoCheckbox(campo, nombre){
                if(!campo.is(':checked'))
                {
                    deshabilitarYBorrar("#monto"+nombre);
                    deshabilitarYBorrar("#frecuencia"+nombre);
                    deshabilitarYBorrar("#tipoCambio"+nombre);
                    deshabilitarYBorrar("#duracionManutencion"+nombre);
                    deshabilitarYBorrar("#fuenteFinanciera"+nombre);
                    deshabilitarYBorrarCheckbox("input[name='manutencion"+nombre+"']");
                    deshabilitarYBorrarCheckbox("input[name='transporte"+nombre+"']");
                    deshabilitarYBorrarCheckbox("input[name='seguroMedico"+nombre+"']");
                    deshabilitarYBorrarCheckbox("input[name='instalacion"+nombre+"']");
                    deshabilitarYBorrarCheckbox("input[name='materialBibliografico"+nombre+"']");
                }
                else{
                        $("#monto"+nombre).prop('disabled', false);
                        $("#frecuencia"+nombre).prop('disabled', false);
                        $("#tipoCambio"+nombre).prop('disabled', false);
                        $("#duracionManutencion"+nombre).prop('disabled', false);
                        $("#fuenteFinanciera"+nombre).prop('disabled', false);
                        $("input[name='manutencion"+nombre+"']").prop('disabled', false);
                        $("input[name='transporte"+nombre+"']").prop('disabled', false);
                        $("input[name='seguroMedico"+nombre+"']").prop('disabled', false);
                        $("input[name='instalacion"+nombre+"']").prop('disabled', false);
                        $("input[name='materialBibliografico"+nombre+"']").prop('disabled', false);
                }
            }
    </script>
    <?php include 'includes/head.php'; ?>
    <body style="background-color: #282B2D; margin: 0 auto; padding: 0;">
        <!-- Navegación (Menu) -->
        <?php include 'includes/header.php'; ?>

        <form enctype="multipart/form-data" class="form-horizontal" role="form" action="php/aplicaCambios.php" method="post">
            <div class="section" style="margin: 100px 0px;">
                <div class="container">
                    <div class="row">
                        <h1 style="color: white; text-align: center; margin-bottom: 20px;">Modificar Academico</h1>
                        <div class="col-md-4" style="padding: 0;">
                            <div class="container" style="max-width: 300px; margin: 0 auto;">
                                <div class="academico-container">
                                    <a>
                                        <div id="mostrarFoto" class="circle-avatar" style="<?php echo "background-image: url('" . $row["foto"] . "');"; ?>"></div>
                                    </a>
                                    <center>
                                        <label class="btn btn-success" style="margin: 20px" for="foto">Cambiar Foto</label>
                                        <input class="btn btn-success" style="display: none;" type="file" name="foto" id="foto">
                                    </center>

                                    <script>
                                        document.getElementById("foto").onchange = function () {
                                            var reader = new FileReader();

                                            reader.onload = function (e) {
                                                // get loaded data and render thumbnail.
                                                document.getElementById("mostrarFoto").style.backgroundImage = "url('".concat(e.target.result).concat("')");
                                            };

                                            // read the image file as a data URL.
                                            reader.readAsDataURL(this.files[0]);
                                        };
                                    </script>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                        <div class="col-md-6">
                            <div class="infoContainer" id="documentos">
                                <h4 class="infoContainerTitle ">Documentos</h4>
                                <script>
                                    function eliminarDocumento(div, descripcion)
                                    {
                                        $(div).parent().parent().parent().append('<input type="hidden" name="documentoEliminar[]" value="'+descripcion+'">');
                                        $(div).parent().parent().remove();
                                    }
                                </script>
                                <?php
                                $queryConsulta = "SELECT * FROM documento WHERE codigo = " . $codigo;
                                $resultadoConsulta = mysqli_query($conexion, $queryConsulta);
                                while($documentos = $resultadoConsulta->fetch_assoc()) {
                                    $pathDocumento = $documentos['pathPdf'];
                                    $nombreDocumento = explode('.',$documentos['documento'])[0];
                                    echo "<div id='text'><p class='documento'>" . $nombreDocumento . "</p><div class='button-wrapper'><button class='delete' value='Remove Field' type='button' onclick='eliminarDocumento(this, \"".$pathDocumento."\")'><i class='glyphicon glyphicon-remove'></i></button></div></div>";
                                }
                                ?>

                                <div id="text">
                                    <input type="file" id="upload-1" name="documentos[]">
                                </div>

                                <center>
                                    <label for="upload-1" class="linkDocumento" id="label">Agregar Documento</label>
                                </center>
                            </div>

                        <script>
                            var file = 1;

                            $("#documentos").on("change", "input[type='file']", function(e) {
                                if ($(this).val()) {

                                    error = false;

                                    var filename = e.target.files[0].name;

                                    $("#documentos #text").last().append("<p class='documento'>" + filename + "</p><div class='button-wrapper'><button class='delete' value='Remove Field'><i class='glyphicon glyphicon-remove'></i></button>");
                                    $('#documentos').find('#label').last().remove();

                                    file++;

                                    $("#documentos").append("<center><label for='upload-" + file + "' class='linkDocumento' id='label'>Agregar Documento</label></center><div id='text''><input type='file' id='upload-" + file + "' name='documentos[]'></div>");

                                    $(".delete").on('click', function() {
                                        console.log("Hola");
                                        $(this).parent().parent().remove();
                                    });

                                    if (error) {
                                        parent.addClass('error').prepend.after('<div class="alert alert-error">' + error + '</div>');
                                    }
                                }

                                else {
                                    console.log("Error");
                                }
                            });
                        </script>

                            <div class="infoContainer" id="idiomas">
                                <div id="infoIdiomas">
                                    <?php mostrarIdiomasExistentes(); ?>
                                </div>
                                <h4 class="infoContainerTitle ">Idiomas</h4>
                                <center>
                                    <button type="button" class="linkDocumento" data-toggle="modal" data-target="#modalIdioma">Agregar Idioma</button>
                                    <div class="modal fade" id="modalIdioma" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content modal-sm" id="popupIdioma">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Idioma</h4>
                                                </div>
                                                <div class="modal-body" id="campos">
                                                    <label for="idioma" class="control-label">Idioma</label>
                                                    <input type="text" class="form-control" id="idiom" name="idiom" placeholder="Idioma">
                                                    <label for="comprension" class="control-label">Comprensión</label>
                                                    <input type="text" class="form-control" id="compre" placeholder="Comprensión" name="compre">
                                                    <label for="lectura" class="control-label">Lectura</label>
                                                    <input type="text" class="form-control" id="lectu" placeholder="Lectura" name="lectu">
                                                    <label for="escritura" class="control-label">Escritura</label>
                                                    <input type="text" class="form-control" placeholder="Escritura" id="escri" name="escri">
                                                </div>
                                                <div class="modal-footer">
                                                    <center>
                                                        <button type="button" class="btn btn-success" data-dismiss="modal" onclick="mostrarInfoIdioma()">Agregar</button>
                                                    </center>
                                                </div>
                                                <script>
                                                    function eliminar(idioma)
                                                    {
                                                        $("#infoIdiomas").append('<input type="hidden" name="idiomaEliminar[]" value="'+idioma+'">');
                                                        $("#"+idioma).parent().remove();
                                                    }
                                                    function mostrarInfoIdioma()
                                                    {
                                                        //Crear nuevo div para poner la informacion
                                                        var nuevoDiv = document.createElement("DIV");
                                                        var idioma = document.getElementById("idiom").value;
                                                        var escritura = document.getElementById("escri").value;
                                                        var comprension = document.getElementById("compre").value;
                                                        var lectura = document.getElementById("lectu").value;
                                                        if(idioma != "" && escritura != "" && lectura != "" && comprension != ""){
                                                            nuevoDiv.setAttribute("class","documento");
                                                            nuevoDiv.setAttribute("id", "text");
                                                            nuevoDiv.innerHTML += "<div id='"+idioma+"'>Idioma " + idioma  + "<br><button class='delete' value='Remove Field' onclick=\"eliminar('"+ idioma +"')\"><i class='glyphicon glyphicon-remove'></i></button>";
                                                            nuevoDiv.innerHTML += "Comprensión " + comprension + "%<br>";
                                                            nuevoDiv.innerHTML += "Lectura " + lectura + "%<br>";
                                                            nuevoDiv.innerHTML += "Escritura " + escritura + "%<br>";
                                                            nuevoDiv.innerHTML += '<input type="hidden" name="idioma[]" id="idioma" value="' + idioma +'" >';
                                                            nuevoDiv.innerHTML += '<input type="hidden" name="comprension[]" id="comprension" value="' + comprension + '" >';
                                                            nuevoDiv.innerHTML += '<input type="hidden" name="lectura[]" id="lectura" value="' + lectura + '" >';
                                                            nuevoDiv.innerHTML += '<input type="hidden" name="escritura[]" id="escritura" value="' + escritura+ '"</div>';
                                                            $('#infoIdiomas').append(nuevoDiv);
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
                                                            document.getElementById("popupIdioma").replaceChild(nuevoDivCampos, document.getElementById("campos"));
                                                        }
                                                    }
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </center>
                            </div>
                        </div>
                        
                        
                        <div class="col-md-6">
                            <div class="infoContainer" id="habilidades">
                                <div id="infoHabilidades">
                                    <?php mostrarHabilidadesExistentes(); ?>
                                </div>
                                <h4 class="infoContainerTitle ">Habilidades computo</h4>
                                <center>
                                    <button type="button" class="linkDocumento" data-toggle="modal" data-target="#modalHabilidades">Agregar Habilidad</button>
                                    <div class="modal fade" id="modalHabilidades" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content modal-sm" id="popupHabilidad">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Habilidades computo</h4>
                                                </div>
                                                <div class="modal-body" id="campos">
                                                    <label for="programa" class="control-label">Programa</label>
                                                    <input type="text" class="form-control" id="progr" name="progr" placeholder="Programa">
                                                    <label for="porcentaje" class="control-label">Porcentaje dominio</label>
                                                    <input type="text" class="form-control" id="porce" placeholder="Porcentaje" name="porce">
                                                </div>
                                                <div class="modal-footer">
                                                    <center>
                                                        <button type="button" class="btn btn-success" data-dismiss="modal" onclick="mostrarInfoHabilidad()">Agregar</button>
                                                    </center>
                                                </div>
                                                <script>
                                                    function eliminarHabilidad(programa)
                                                    {
                                                        $("#infoHabilidades").append('<input type="hidden" name="habilidadEliminar[]" value="'+programa+'">');
                                                        $("#"+programa).parent().remove();
                                                    }
                                                    function mostrarInfoHabilidad()
                                                    {
                                                        //Crear nuevo div para poner la informacion
                                                        var nuevoDiv = document.createElement("DIV");
                                                        var programa = document.getElementById("progr").value;
                                                        var porcentaje = document.getElementById("porce").value;
                                                        if(programa != "" && porcentaje != ""){
                                                            nuevoDiv.setAttribute("class","documento");
                                                            nuevoDiv.setAttribute("id", "text");
                                                            nuevoDiv.innerHTML += "<div id='"+programa+"'>Idioma " + programa  + "<br><button class='delete' value='Remove Field' onclick=\"eliminarHabilidad('"+ programa +"')\"><i class='glyphicon glyphicon-remove'></i></button>";
                                                            nuevoDiv.innerHTML += "Porcentaje " + porcentaje + "%<br>";
                                                            nuevoDiv.innerHTML += '<input type="hidden" name="programa[]" id="programa" value="' + programa +'" >';
                                                            nuevoDiv.innerHTML += '<input type="hidden" name="porcentaje[]" id="porcentaje" value="' + porcentaje + '" >';
                                                            $('#infoHabilidades').append(nuevoDiv);
                                                            //Se crea un nuevo div que reemplazara al anterior con los campos de informacion del idioma
                                                            var nuevoDivCampos = document.createElement("DIV");
                                                            nuevoDivCampos.setAttribute("id","campos");
                                                            nuevoDivCampos.setAttribute("class","modal-body");
                                                            nuevoDivCampos.innerHTML += '<label for="programa" class="control-label">Programa</label>';
                                                            nuevoDivCampos.innerHTML += '<input type="text" class="form-control" id="progr" name="progr" placeholder="Programa">';
                                                            nuevoDivCampos.innerHTML += '<label for="porcentaje" class="control-label">Porcentaje dominio</label>';
                                                            nuevoDivCampos.innerHTML += '<input type="text" class="form-control" id="porce" placeholder="Porcentaje" name="porce">';
                                                            $("#progr").parent().replaceWith(nuevoDivCampos);
                                                        }
                                                    }
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </center>
                            </div>
                            <div class="infoContainer" id="dependientes">
                                <div id="infoDependientes">
                                    <?php mostrarDependientesExistentes(); ?>
                                </div>
                                <h4 class="infoContainerTitle ">Dependientes</h4>
                                <center>
                                    <button type="button" class="linkDocumento" data-toggle="modal" data-target="#modalDependiente">Agregar Dependiente</button>
                                    <div class="modal fade" id="modalDependiente" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content modal-sm" id="popupDependiente">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Dependiente</h4>
                                                </div>
                                                <div class="modal-body" id="campos">
                                                    <label for="nombre" class="control-label">Nombre</label>
                                                    <input type="text" class="form-control" id="nombr" name="nombr" placeholder="Nombre">
                                                    <label for="parentesco" class="control-label">Parentesco</label>
                                                    <input type="text" class="form-control" id="paren" placeholder="Parentesco" name="paren">
                                                    <label class="control-label" >Fecha de nacimiento</label>
                                                    <br>
                                                    <label for="dia-fechaNacimientoDep" class="control-label" >Día</label>
                                                    <select class="form-control" id="dia-fechaNacimientoDep" name="dia-fechaNacimientoDep">
                                                        <?php agregaSelectRango(1, 31)?>
                                                    </select>
                                                    <label for="mes-fechaNacimientoDep " class="control-label">Mes</label>
                                                    <select class="form-control" id="mes-fechaNacimientoDep" name="mes-fechaNacimientoDep">
                                                        <option value='01'>Enero</option>
                                                        <option value='02'>Febrero</option>
                                                        <option value='03'>Marzo</option>
                                                        <option value='04'>Abril</option>
                                                        <option value='05'>Mayo</option>
                                                        <option value='06'>Junio</option>
                                                        <option value='07'>Julio</option>
                                                        <option value='08'>Agosto</option>
                                                        <option value='09'>Septiembre</option>
                                                        <option value='10'>Octubre</option>
                                                        <option value='11'>Noviembre</option>
                                                        <option value='12'>Diciembre</option>
                                                    </select>
                                                    <label for="anio-fechaNacimientoDep" class="control-label">Año</label>
                                                    <select class="form-control" id="anio-fechaNacimientoDep" name="anio-fechaNacimientoDep">
                                                        <?php agregaSelectRango(1940, 2016)?>
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <center>
                                                        <button type="button" class="btn btn-success" data-dismiss="modal" onclick="mostrarInfoDependiente()">Agregar</button>
                                                    </center>
                                                </div>
                                                <script>
                                                    function eliminarDependiente(nombre)
                                                    {
                                                        $("#infoDependientes").append('<input type="hidden" name="dependienteEliminar[]" value="'+nombre+'">');
                                                        $("#"+nombre).parent().remove();
                                                    }
                                                    function mostrarInfoDependiente()
                                                    {
                                                        //Crear nuevo div para poner la informacion
                                                        var nuevoDiv = document.createElement("DIV");
                                                        var nombre = document.getElementById("nombr").value;
                                                        var parentesco = document.getElementById("paren").value;
                                                        var fechaNacimiento = document.getElementById("anio-fechaNacimientoDep").value + "-" + document.getElementById("mes-fechaNacimientoDep").value + "-" + document.getElementById("dia-fechaNacimientoDep").value ;
                                                        if(nombre != "" && parentesco != ""){
                                                            nuevoDiv.setAttribute("class","documento");
                                                            nuevoDiv.setAttribute("id", "text");
                                                            nuevoDiv.innerHTML += "<div id='"+nombre+"'>Nombre " + nombre  + "<br><button class='delete' value='Remove Field' onclick=\"eliminarDependiente('"+ nombre +"')\"><i class='glyphicon glyphicon-remove'></i></button>";
                                                            nuevoDiv.innerHTML += "Parentesco " + parentesco + "<br>";
                                                            nuevoDiv.innerHTML += "Fecha nacimiento " + fechaNacimiento + "<br>";
                                                            nuevoDiv.innerHTML += '<input type="hidden" name="nombreDep[]" id="nombreDep" value="' + nombre +'" >';
                                                            nuevoDiv.innerHTML += '<input type="hidden" name="parentescoDep[]" id="paretescoDep" value="' + parentesco + '" >';
                                                            nuevoDiv.innerHTML += '<input type="hidden" name="fechaNacimientoDep[]" id="fechaNacimientoDep" value="' + fechaNacimiento + '" >';
                                                            $('#infoDependientes').append(nuevoDiv);
                                                            //Se crea un nuevo div que reemplazara al anterior con los campos de informacion del idioma
                                                            var nuevoDivCampos = document.createElement("DIV");
                                                            nuevoDivCampos.setAttribute("id","campos");
                                                            nuevoDivCampos.setAttribute("class","modal-body");
                                                            nuevoDivCampos.innerHTML += '<label for="nombre" class="control-label">Nombre</label>';
                                                            nuevoDivCampos.innerHTML += '<input type="text" class="form-control" id="nombr" name="nombr" placeholder="Nombre">';
                                                            nuevoDivCampos.innerHTML += '<label for="parentesco" class="control-label">Parentesco</label>';
                                                            nuevoDivCampos.innerHTML += '<input type="text" class="form-control" id="paren" placeholder="Parentesco" name="paren">';
                                                            nuevoDivCampos.innerHTML += '<label class="control-label" >Fecha de nacimiento</label>\
                                                            <br>\
                                                            <label for="dia-fechaNacimientoDep" class="control-label" >Día</label>\
                                                            <select class="form-control" id="dia-fechaNacimientoDep" name="dia-fechaNacimientoDep">\
                                                                <?php agregaSelectRango(1, 31)?>\
                                                            </select>\
                                                            <label for="mes-fechaNacimientoDep " class="control-label">Mes</label>\
                                                            <select class="form-control" id="mes-fechaNacimientoDep" name="mes-fechaNacimientoDep">\
                                                                <option value="01">Enero</option>\
                                                                <option value="02">Febrero</option>\
                                                                <option value="03v>Marzo</option>\
                                                                <option value="04">Abril</option>\
                                                                <option value="05">Mayo</option>\
                                                                <option value="06">Junio</option>\
                                                                <option value="07">Julio</option>\
                                                                <option value="08">Agosto</option>\
                                                                <option value="09">Septiembre</option>\
                                                                <option value="10">Octubre</option>\
                                                                <option value="11">Noviembre</option>\
                                                                <option value="12">Diciembre</option>\
                                                            </select>\
                                                            <label for="anio-fechaNacimientoDep" class="control-label">Año</label>\
                                                            <select class="form-control" id="anio-fechaNacimientoDep" name="anio-fechaNacimientoDep">\
                                                                <?php agregaSelectRango(1940, 2016)?>\
                                                            </select>';
                                                            $("#nombr").parent  ().replaceWith(nuevoDivCampos);
                                                        }
                                                    }
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </center>
                            </div>
                        </div>
                        </div>
                        

                    </div>

                    <div class="row">
                    <div class="col-md-12">
                        <ul class="tab-nav">
                            <li class="tablinks selected" onclick="openCity(event, 'Personal')">
                                <p>Datos Personales</p>
                            </li>
                            <li class="tablinks" onclick="openCity(event, 'Licenciatura')">
                                <p>Datos Licenciatura</p>
                            </li>
                            <li class="tablinks" onclick="openCity(event, 'Maestria')">
                                <p>Datos Maestria</p>
                            </li>
                            <li class="tablinks" onclick="openCity(event, 'Doctorado')">
                                <p>Datos Doctorado</p>
                            </li>
                        </ul>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-md-12   ">
                            <div class="infoContainer">
                                <div id="Personal" class="tabcontent">
                                    <h2 class="infoContainerTitle">Informaci&oacute;n Personal</h2>
                                    <?php

                                if ($existe) {
                                    include 'includes/cambioDatosPersonales.php';
                                }

                                ?>
                                </div>
                                <div id="Licenciatura" class="tabcontent" style="display:none;">
                                    <h2 class="infoContainerTitle">Informaci&oacute;n Licenciatura</h2>
                                    <?php

                                if ($existe) {
                                    include 'includes/cambioDatosLicenciatura.php';
                                }

                                ?>
                                </div>
                                <div id="Maestria" class="tabcontent" style="display:none;">
                                    <h2 class="infoContainerTitle">Informaci&oacute;n Maestria</h2>
                                    <?php

                                if ($existe) {
                                    include 'includes/cambioDatosMaestria.php';
                                }

                                ?>
                                </div><div id="Doctorado" class="tabcontent" style="display:none;">
                                    <h2 class="infoContainerTitle">Informaci&oacute;n Doctorado</h2>
                                    <?php

                                if ($existe) {
                                    include 'includes/cambioDatosDoctorado.php';
                                }

                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>

                                function openCity(evt,  cityName) {
                                    // Declare all variables
                                    var i, tabcontent, tablinks;

                                    // Get all elements with class="tabcontent" and hide them
                                    tabcontent = document.getElementsByClassName("tabcontent");
                                    for (i = 0; i < tabcontent.length; i++) {
                                        tabcontent[i].style.display = "none";
                                    }

                                    // Get all elements with class="tablinks" and remove the class "active"
                                    tablinks = document.getElementsByClassName("tablinks");
                                    for (i = 0; i < tablinks.length; i++) {
                                        tablinks[i].className = tablinks[i].className.replace(" selected", "");
                                    }

                                    // Show the current tab, and add an "active" class to the link that opened the tab
                                    document.getElementById(cityName).style.display = "block";
                                    evt.currentTarget.className += " selected";
                                }

                            </script>

                    <div class="row" style="margin: 30px 0px;">
                        <div class="col-md-10 text-center" style="margin: 0 auto; float: none;">
                            <button type="submit" class="btn btn-lg btn-success" style="float: none; margin: 0 auto;">Modificar Academico</button>
                        </div>
                    </div>
                    <input type="hidden" name="maestroSeleccionado" value="<?php echo $row['codigo'];?>">


                </div>
            </div>
        </form>
    </body>

</html>