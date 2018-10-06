<?php 
    $queryConsultaDoctorado =     "SELECT * FROM estudio WHERE codigo = " . $codigo . " AND nivel = 'Doctorado'";
    $resultadoConsultaDoctorado = mysqli_query($conexion, $queryConsultaDoctorado);

    if(mysqli_num_rows($resultadoConsultaDoctorado) == 1) {
        $rowDoctorado = $resultadoConsultaDoctorado->fetch_assoc();
    }
?>
<div class="row ">
    <div class="col-md-10 " style="margin: 0 auto; float: none; ">
            <input type="hidden" name="nivelDoctorado" id="nivelDoctorado" value="Doctorado" >
            <div class="form-group" id="form-tituloObtenidoDoctorado">
                <label for="tituloObtenidoDoctorado" style="color: white; " class="control-label ">TITULO OBTENIDO</label>
                <input type="text" class="form-control input-lg" id="tituloObtenidoDoctorado"
                       name="tituloObtenidoDoctorado" placeholder="Titulo obtenido" value="<?php echo $rowDoctorado["tituloObtenido"];?>">
                <span id="helpTituloObtenidoDoctorado" class="help-block "></span>
				<script>
                $("#tituloObtenidoDoctorado").bind('input propertychange', function(){
                    validar("texto", "tituloObtenidoDoctorado", "helpTituloObtenidoDoctorado", 255);
                });
            </script>
            </div>
            <div class="row ">
                <div class="col-sm-6 ">
                    <div class="form-group has-feedback " id="form-institucionDoctorado">
                        <label for="institucionDoctorado" style="color: white; ">INSTITUCION</label>
                        <input type="text" class="form-control input-lg
                                                  " id="institucionDoctorado" name="institucionDoctorado" placeholder="Institucion"
                                                     value="<?php echo $rowDoctorado["institucion"];?>">
                        <span id="helpInstitucionDoctorado" class="help-block "></span>
						<script>
                        $("#institucionDoctorado").bind('input propertychange', function(){
                            validar("texto", "institucionDoctorado", "helpInstitucionDoctorado", 255);
                        });
                    </script>
                    </div>
                </div>
                <div class="col-sm-6 ">
                    <div class="form-group" id="form-nombrePosgradoDoctorado">
                        <label for="nombrePosgradoDoctorado" style="color: white; ">NOMBRE POSGRADO</label>
                        <input type="text" class="form-control input-lg
                                                  " id="nombrePosgradoDoctorado" name="nombrePosgradoDoctorado" placeholder="Nombre posgrado "
                                                     value="<?php echo $rowDoctorado["nombrePosgrado"];?>">
                        <span id="helpNombrePosgradoDoctorado" class="help-block"></span>
						<script>
                        $("#nombrePosgradoDoctorado").bind('input propertychange', function(){
                            validar("texto", "nombrePosgradoDoctorado", "helpNombrePosgradoDoctorado", 255);
                        });
                    </script>
                    </div>
                </div>
            </div>
            <div class="form-group" id="form-disciplinaDoctorado">
                <label for="disciplinaDoctorado" class="control-label
                                                     " style="color: white; ">DISCIPLINA</label>
                <input type="text" class="form-control input-lg
                                          " id="disciplinaDoctorado" name="disciplinaDoctorado" placeholder="Disciplina"
                                             value="<?php echo $rowDoctorado["disciplina"];?>">
                <span id="helpDisciplinaDoctorado" class="help-block "></span>
				<script>
                $("#disciplinaDoctorado").bind('input propertychange', function(){
                    validar("texto", "disciplinaDoctorado", "helpDisciplinaDoctorado", 255);
                });
            </script>
            </div>
            <div class="row">
                <div class="col-sm-6 ">
                    <div class="form-group" id="form-duracionDoctorado">
                        <label for="duracionDoctorado" class="control-label
                                                             " style="color: white; ">DURACION</label>
                        <input type="text" class="form-control input-lg
                                                  " id="duracionDoctorado" name="duracionDoctorado" placeholder="Duracion"
                                                     value="<?php echo $rowDoctorado["duracion"];?>">
                        <span id="helpDuracionDoctorado" class="help-block "></span>
						<script>
                        $("#duracionDoctorado").bind('input propertychange', function(){
                            validar("alfanumericoEspacio", "duracionDoctorado", "helpDuracionDoctorado", 50);
                        });
                    </script>
                    </div>
                </div>
                <div class="col-sm-6 ">
                    <div class="form-group " id="form-estadoEstudioDoctorado">
                    <label for="estadoEstudioDoctorado" class="control-label
                                              " style="color: white; ">ESTADO ESTUDIO</label>
                    <select class="form-control input-lg" name="estadoEstudioDoctorado">
                        <?php estaActivo("option", "", "", "", "Estado estudio")?>
                        <?php estaActivo("option", "", "A", $rowDoctorado["estadoEstudio"], "A cursar")?>
                        <?php estaActivo("option", "", "C", $rowDoctorado["estadoEstudio"], "Cursando")?>
                        <?php estaActivo("option", "", "G", $rowDoctorado["estadoEstudio"], "Grado obtenido")?>
                    </select>
                    <span id="helpEstadoEstudioDoctorado" class="help-block "></span>
                    </div>
                </div>
            </div>
            <div class="row ">
                <center>
                    <label style="color: white; ">FECHA DE INICIO</label>
                </center>
                <div class="col-md-3 ">
                    <div class="form-group " id="form-dia-fechaInicioDoctorado">
                        <label for="dia-fechaInicioDoctorado" style="color: white; ">DIA</label>
                        <select class="form-control input-lg " id="dia-fechaInicioDoctorado" name="dia-fechaInicioDoctorado">
                            <?php 
                            agregaSelectRangoSeleccionado(1, 31, explode("-",$rowDoctorado["fechaInicio"])[2]);
                            ?>
                        </select>
                        <span id="helpDia-fechaInicioDoctorado" class="help-block "></span>
                    </div>
                </div>
                <div class="col-md-5 ">
                    <div class="form-group " id="form-mes-fechaInicioDoctorado">
                        <label for="mes-fechaInicioDoctorado" style="color: white; ">MES</label>
                        <select class="form-control input-lg " id="mes-fechaInicioDoctorado" name="mes-fechaInicioDoctorado">
                            <?php mostrarMeses($rowDoctorado, "fechaInicio") ?>
                        </select>
                        <span id="helpMes-fechaInicioDoctorado" class="help-block "></span>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="form-group" id="form-anio-fechaInicioDoctorado">
                        <label for="anio-fechaInicioDoctorado" style="color:
                                                                  white; ">AŃO</label>
                        <select class="form-control input-lg " id="anio-fechaInicioDoctorado" name="anio-fechaInicioDoctorado">
                            <?php   
                            agregaSelectRangoSeleccionado(1940, 2016, explode("-",$rowDoctorado["fechaInicio"])[0]);
                            ?>
                        </select>
                        <span id="helpAnio-fechaInicioDoctorado" class="help-block "></span>
                    </div>
                </div>
            </div>
            <div class="row ">
                <center>
                    <label style="color: white; ">FECHA DE FIN</label>
                </center>
                <div class="col-md-3 ">
                    <div class="form-group " id="form-dia-fechaFinDoctorado">
                        <label for="dia-fechaFinDoctorado" style="color: white; ">DIA</label>
                        <select class="form-control input-lg " id="dia-fechaFinDoctorado" name="dia-fechaFinDoctorado">
                            <?php 
                            agregaSelectRangoSeleccionado(1, 31, explode("-",$rowDoctorado["fechaFin"])[2]);
                            ?>
                        </select>
                        <span id="helpDia-fechaFinDoctorado" class="help-block "></span>
                    </div>
                </div>
                <div class="col-md-5 ">
                    <div class="form-group " id="form-mes-fechaFinDoctorado">
                        <label for="mes-fechaFinDoctorado" style="color: white; ">MES</label>
                        <select class="form-control input-lg " id="mes-fechaFinDoctorado" name="mes-fechaFinDoctorado">
                            <?php mostrarMeses($rowDoctorado, "fechaFin") ?>
                        </select>
                        <span id="helpMes-fechaFinDoctorado" class="help-block "></span>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="form-group" id="form-anio-fechaFinDoctorado">
                        <label for="anio-fechaFinDoctorado" style="color:
                                                                  white; ">AŃO</label>
                        <select class="form-control input-lg " id="anio-fechaFinDoctorado" name="anio-fechaFinDoctorado">
                            <?php 
                            agregaSelectRangoSeleccionado(1940, 2016, explode("-",$rowDoctorado["fechaFin"])[0]);
                            ?>
                        </select>
                        <span id="helpAnio-fechaFinDoctorado" class="help-block "></span>
                    </div>
                </div>
            </div>
            <div class="form-group " id="form-gradoDoctorado">
                <label for="gradoDoctorado" class="control-label
                                                  " style="color: white; ">GRADO</label>
                <input type="text " class="form-control input-lg
                                           " id="gradoDoctorado" name="gradoDoctorado" placeholder="Grado"
                                             value="<?php echo $rowDoctorado["grado"];?>">
                <span id="helpGradoDoctorado" class="help-block "></span>
				<script>
                $("#gradoDoctorado").bind('input propertychange', function(){
                    validar("texto", "gradoDoctorado", "helpGradoDoctorado", 255);
                });
            </script>
            </div>
			
            <div class="form-group " id="form-nombreTesisDoctorado">
                <label for="nombreTesisDoctorado" class="control-label
                                                    " style="color: white; ">NOMBRE TESIS</label>
                <input type="text " class="form-control input-lg
                                           " id="nombreTesisDoctorado" name="nombreTesisDoctorado" placeholder="Nombre tesis "
                                            value="<?php echo $rowDoctorado["nombreTesis"];?>">
                <span id="helpNombreTesisDoctorado" class="help-block "></span>
				<script>
                $("#nombreTesisDoctorado").bind('input propertychange', function(){
                    validar("texto", "nombreTesisDoctorado", "helpNombreTesisDoctorado", 255);
                });
            </script>
            </div>
            <div class="form-group " id="form-domicilioDoctorado">
                <label for="domicilioDoctorado" class="control-label
                                                      " style="color: white; ">DOMICILIO</label>
                <input type="text " class="form-control input-lg" id="domicilioDoctorado"
                       name="domicilioDoctorado" placeholder="Domicilio" value="<?php echo $rowDoctorado["domicilio"];?>">
                <span id="helpDomicilioDoctorado" class="help-block"></span>
				<script>
                $("#domicilioDoctorado").bind('input propertychange', function(){
                    validar("alfanumerico", "domicilioDoctorado", "helpDomicilioDoctorado", 255);
                });
            </script>
            </div>
            <div class="form-group " id="form-coloniaDoctorado">
                <label for="coloniaDoctorado" class="control-label
                                            " style="color: white; ">COLONIA</label>
                <input type="text " class="form-control input-lg
                                           " id="coloniaDoctorado" name="coloniaDoctorado"
                       placeholder="Colonia" value="<?php echo $rowDoctorado["colonia"];?>">
                <span id="helpColoniaDoctorado" class="help-block "></span>
				<script>
                $("#coloniaDoctorado").bind('input propertychange', function(){
                    validar("texto", "coloniaDoctorado", "helpColoniaDoctorado", 200);
                });
            </script>
            </div>
            <div class="form-group " id="form-cpDoctorado">
                <label for="cpDoctorado" class="control-label
                                     " style="color: white; ">CODIGO POSTAL</label>
                <input type="text " class="form-control input-lg
                                           " id="cpDoctorado" name="cpDoctorado"
                       placeholder="Codigo postal" value="<?php echo $rowDoctorado["cp"];?>">
                <span id="helpCpDoctorado" class="help-block "></span>
				<script>
                $("#cpDoctorado").bind('input propertychange', function(){
                    validar("numero", "cpDoctorado", "helpCpDoctorado", 6);
                });
            </script>
            </div>
            <div class="form-group " id="form-municipioDoctorado">
                <label for="municipioDoctorado" class="control-label
                                              " style="color: white; ">MUNICIPIO</label>
                <input type="text " class="form-control input-lg
                                           " id="municipioDoctorado" name="municipioDoctorado"
                       placeholder="Municipio" value="<?php echo $rowDoctorado["municipio"];?>">
                <span id="helpMunicipioDoctorado" class="help-block "></span>
				<script>
                $("#municipioDoctorado").bind('input propertychange', function(){
                    validar("texto", "municipioDoctorado", "helpMunicipioDoctorado", 200);
                });
            </script>
            </div>
            <div class="form-group " id="form-estadoDoctorado">
                <label for="estadoDoctorado" class="control-label
                                           " style="color: white; ">ESTADO</label>
                <input type="text " class="form-control input-lg
                                           " id="estadoDoctorado" name="estadoDoctorado"
                       placeholder="Estado" value="<?php echo $rowDoctorado["estado"];?>">
                <span id="helpEstadoDoctorado" class="help-block "></span>
				<script>
                $("#estadoDoctorado").bind('input propertychange', function(){
                    validar("texto", "estadoDoctorado", "helpEstadoDoctorado", 150);
                });
            </script>
            </div>
            <div class="form-group " id="form-paisDoctorado">
                <label for="paisDoctorado" class="control-label
                                           " style="color: white; ">PAIS</label>
                <input type="text " class="form-control input-lg
                                           " id="paisDoctorado" name="paisDoctorado"
                       placeholder="Pais" value="<?php echo $rowDoctorado["pais"];?>">
                <span id="helpPaisDoctorado" class="help-block "></span>
				<script>
                $("#paisDoctorado").bind('input propertychange', function(){
                    validar("texto", "paisDoctorado", "helpPaisDoctorado", 150);
                });
            </script>
            </div>
            <div class="form-group " id="form-telefonoDoctorado">
                <label for="telefonoDoctorado" class="control-label
                                                       " style="color: white; ">TELEFONO</label>
                <input type="text " class="form-control input-lg
                                           " id="telefonoDoctorado" name="telefonoDoctorado" placeholder="Telefono"
                                            value="<?php echo $rowDoctorado["telefono"];?>">
                <span id="helpTelefonoDoctorado" class="help-block "></span>
				<script>
                $("#telefonoDoctorado").bind('input propertychange', function(){
                    validar("numero", "telefonoDoctorado", "helpTelefonoDoctorado", 10);
                });
            </script>
            </div>
            <div class="checkbox">
                <label>
                    <?php estaActivo("checkbox", "recibeApoyoDoctorado", "Si", $rowDoctorado['recibeApoyo'], "RECIBE APOYO");?>
                </label>
                <script>
                    var nombreDoctorado = "Doctorado";
                    var campoDoctorado = $("input[name='recibeApoyo"+ nombreDoctorado + "']");
                    campoDoctorado.change(function(){
                        comprobarEstadoCheckbox(campoDoctorado, nombreDoctorado);
                    });
                    campoDoctorado.ready(function(){
                        comprobarEstadoCheckbox(campoDoctorado, nombreDoctorado);
                    });
                </script>
            </div>
            <div class="form-group " id="form-montoDoctorado">
                <label for="montoDoctorado" class="control-label
                                                 " style="color: white; ">MONTO APOYO</label>
                <input type="text " class="form-control input-lg
                                           " id="montoDoctorado" name="montoDoctorado" placeholder="Monto apoyo"
                                            value="<?php echo $rowDoctorado["monto"];?>">
                <span id="helpMontoDoctorado" class="help-block "></span>
				<script>
                $("#montoDoctorado").bind('input propertychange', function(){
                    validar("flotante", "montoDoctorado", "helpMontoDoctorado", 10);
                });
            </script>
            </div>
             <div class="form-group " id="form-frecuenciaDoctorado">
                <label for="frecuenciaDoctorado" class="control-label
                                     " style="color: white; ">FRECUENCIA</label>
                <input type="text " class="form-control input-lg
                                           " id="frecuenciaDoctorado" name="frecuenciaDoctorado" placeholder="Frecuencia"
                                            value="<?php echo $rowDoctorado["frecuencia"];?>">
                <span id="helpFrecuenciaDoctorado" class="help-block "></span>
				<script>
                $("#frecuenciaDoctorado").bind('input propertychange', function(){
                    validar("texto", "frecuenciaDoctorado", "helpFrecuenciaDoctorado", 100);
                });
            </script>
            </div>
            <div class="form-group " id="form-tipoCambioDoctorado">
                <label for="tipoCambioDoctorado" class="control-label
                                     " style="color: white; ">TIPO CAMBIO</label>
                <input type="text " class="form-control input-lg
                                           " id="tipoCambioDoctorado" name="tipoCambioDoctorado" placeholder="Tipo cambio"
                                            value="<?php echo $rowDoctorado["tipoCambio"];?>">
                <span id="helpTipoCambioDoctorado" class="help-block "></span>
				<script>
                $("#tipoCambioDoctorado").bind('input propertychange', function(){
                    validar("flotante", "tipoCambioDoctorado", "helpTipoCambioDoctorado", 10);
                });
            </script>
            </div>
            <div class="form-group " id="form-duracionManutencionDoctorado">
                <label for="duracionManutencionDoctorado" class="control-label
                                     " style="color: white; ">DURACION MANUTENCION</label>
                <input type="text " class="form-control input-lg
                                           " id="duracionManutencionDoctorado" name="duracionManutencionDoctorado"
                       placeholder="Duracion manutencion"
                                            value="<?php echo $rowDoctorado["duracionManutencion"];?>">
                <span id="helpDuracionManutencionDoctorado" class="help-block "></span>
				<script>
                $("#duracionManutencionDoctorado").bind('input propertychange', function(){
                    validar("texto", "duracionManutencionDoctorado", "helpDuracionManutencionDoctorado", 100);
                });
            </script>
            </div>
            <div class="form-group " id="form-fuenteFinancieraDoctorado">
                <label for="fuenteFinancieraDoctorado" class="control-label
                                     " style="color: white; ">FUENTE FINANCIERA</label>
                <input type="text " class="form-control input-lg
                                           " id="fuenteFinancieraDoctorado" name="fuenteFinancieraDoctorado"
                       placeholder="Fuente financiera"
                                            value="<?php echo $rowDoctorado["fuenteFinanciera"];?>">
                <span id="helpFuenteFinancieraDoctorado" class="help-block "></span>
				<script>
                $("#fuenteFinancieraDoctorado").bind('input propertychange', function(){
                    validar("texto", "fuenteFinancieraDoctorado", "helpFuenteFinancieraDoctorado", 100);
                });
            </script>
            </div>
            <div class="col-sm-4">
                <div class="checkbox">
                    <label>
                        <?php estaActivo("checkbox", "manutencionDoctorado", "S", $rowDoctorado['manutencion'], "MANUTENCION");?>
                    </label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="checkbox">
                    <label>
                        <?php estaActivo("checkbox", "transporteDoctorado", "S", $rowDoctorado['transporte'], "TRANSPORTE");?>
                    </label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="checkbox">
                    <label>
                        <?php estaActivo("checkbox", "seguroMedicoDoctorado", "S", $rowDoctorado['seguroMedico'], "SEGURO MEDICO");?>
                    </label>
                </div>
            </div><div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <?php estaActivo("checkbox", "instalacionDoctorado", "S", $rowDoctorado['instalacion'], "INSTALACION");?>
                </label>
            </div>
            </div>
            <div class="col-sm-4">
                <div class="checkbox">
                    <label>
                        <?php estaActivo("checkbox", "materialBibliograficoDoctorado", "S", $rowDoctorado['materialBibliografico'], "MATERIAL BIBLIOGRAFICO");?>
                    </label>
                </div>
            </div>
        
    </div>
</div>