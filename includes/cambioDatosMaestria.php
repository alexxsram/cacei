<?php 
    $queryConsultaMaestria =     "SELECT * FROM estudio WHERE codigo = " . $codigo . " AND nivel = 'Maestria'";
    $resultadoConsultaMaestria = mysqli_query($conexion, $queryConsultaMaestria);

    if(mysqli_num_rows($resultadoConsultaMaestria) == 1) {
        $rowMaestria = $resultadoConsultaMaestria->fetch_assoc();
    }
?>
<div class="row ">
    <div class="col-md-10 " style="margin: 0 auto; float: none; ">
            <input type="hidden" name="nivelMaestria" id="nivelMaestria" value="Maestria" >
            <div class="form-group" id="form-tituloObtenidoMaestria">
                <label for="tituloObtenidoMaestria" style="color: white; " class="control-label ">TITULO OBTENIDO</label>
                <input type="text" class="form-control input-lg" id="tituloObtenidoMaestria"
                       name="tituloObtenidoMaestria" placeholder="Titulo obtenido" value="<?php echo $rowMaestria["tituloObtenido"];?>">
                <span id="helpTituloObtenidoMaestria" class="help-block "></span>
				<script>
                $("#tituloObtenidoMaestria").bind('input propertychange', function(){
                    validar("texto", "tituloObtenidoMaestria", "helpTituloObtenidoMaestria", 255);
                });
            </script>
            </div>
            <div class="row ">
                <div class="col-sm-6 ">
                    <div class="form-group has-feedback " id="form-institucionMaestria">
                        <label for="institucionMaestria" style="color: white; ">INSTITUCION</label>
                        <input type="text" class="form-control input-lg
                                                  " id="institucionMaestria" name="institucionMaestria" placeholder="Institucion"
                                                     value="<?php echo $rowMaestria["institucion"];?>">
                        <span id="helpInstitucionMaestria" class="help-block "></span>
						<script>
                        $("#institucionMaestria").bind('input propertychange', function(){
                            validar("texto", "institucionMaestria", "helpInstitucionMaestria", 255);
                        });
                    </script>
                    </div>
                </div>
                <div class="col-sm-6 ">
                    <div class="form-group" id="form-nombrePosgradoMaestria">
                        <label for="nombrePosgradoMaestria" style="color: white; ">NOMBRE POSGRADO</label>
                        <input type="text" class="form-control input-lg
                                                  " id="nombrePosgradoMaestria" name="nombrePosgradoMaestria" placeholder="Nombre posgrado "
                                                     value="<?php echo $rowMaestria["nombrePosgrado"];?>">
                        <span id="helpNombrePosgradoMaestria" class="help-block"></span>
						<script>
                        $("#nombrePosgradoMaestria").bind('input propertychange', function(){
                            validar("texto", "nombrePosgradoMaestria", "helpNombrePosgradoMaestria", 255);
                        });
                    </script>
                    </div>
                </div>
            </div>
            <div class="form-group" id="form-disciplinaMaestria">
                <label for="disciplinaMaestria" class="control-label
                                                     " style="color: white; ">DISCIPLINA</label>
                <input type="text" class="form-control input-lg
                                          " id="disciplinaMaestria" name="disciplinaMaestria" placeholder="Disciplina"
                                             value="<?php echo $rowMaestria["disciplina"];?>">
                <span id="helpDisciplinaMaestria" class="help-block "></span>
				<script>
                $("#disciplinaMaestria").bind('input propertychange', function(){
                    validar("texto", "disciplinaMaestria", "helpDisciplinaMaestria", 255);
                });
            </script>
            </div>
            <div class="row">
                <div class="col-sm-6 ">
                    <div class="form-group" id="form-duracionMaestria">
                        <label for="duracionMaestria" class="control-label
                                                             " style="color: white; ">DURACION</label>
                        <input type="text" class="form-control input-lg
                                                  " id="duracionMaestria" name="duracionMaestria" placeholder="Duracion"
                                                     value="<?php echo $rowMaestria["duracion"];?>">
                        <span id="helpDuracionMaestria" class="help-block "></span>
						<script>
                        $("#duracionMaestria").bind('input propertychange', function(){
                            validar("alfanumericoEspacio", "duracionMaestria", "helpDuracionMaestria", 50);
                        });
                    </script>
                    </div>
                </div>
                <div class="col-sm-6 ">
                    <div class="form-group " id="form-estadoEstudioMaestria">
                    <label for="estadoEstudioMaestria" class="control-label
                                              " style="color: white; ">ESTADO ESTUDIO</label>
                    <select class="form-control input-lg" name="estadoEstudioMaestria">
                        <?php estaActivo("option", "", "", "", "Estado estudio")?>
                        <?php estaActivo("option", "", "A", $rowMaestria["estadoEstudio"], "A cursar")?>
                        <?php estaActivo("option", "", "C", $rowMaestria["estadoEstudio"], "Cursando")?>
                        <?php estaActivo("option", "", "G", $rowMaestria["estadoEstudio"], "Grado obtenido")?>
                    </select>
                    <span id="helpEstadoEstudioMaestria" class="help-block "></span>
                    </div>
                </div>
            </div>
            <div class="row ">
                <center>
                    <label style="color: white; ">FECHA DE INICIO</label>
                </center>
                <div class="col-md-3 ">
                    <div class="form-group " id="form-dia-fechaInicioMaestria">
                        <label for="dia-fechaInicioMaestria" style="color: white; ">DIA</label>
                        <select class="form-control input-lg " id="dia-fechaInicioMaestria" name="dia-fechaInicioMaestria">
                            <?php 
                            agregaSelectRangoSeleccionado(1, 31, explode("-",$rowMaestria["fechaInicio"])[2]);
                            ?>
                        </select>
                        <span id="helpDia-fechaInicioMaestria" class="help-block "></span>
                    </div>
                </div>
                <div class="col-md-5 ">
                    <div class="form-group " id="form-mes-fechaInicioMaestria">
                        <label for="mes-fechaInicioMaestria" style="color: white; ">MES</label>
                        <select class="form-control input-lg " id="mes-fechaInicioMaestria" name="mes-fechaInicioMaestria">
                            <?php mostrarMeses($rowMaestria, "fechaInicio") ?>
                        </select>
                        <span id="helpMes-fechaInicioMaestria" class="help-block "></span>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="form-group" id="form-anio-fechaInicioMaestria">
                        <label for="anio-fechaInicioMaestria" style="color:
                                                                  white; ">AŃO</label>
                        <select class="form-control input-lg " id="anio-fechaInicioMaestria" name="anio-fechaInicioMaestria">
                            <?php   
                            agregaSelectRangoSeleccionado(1940, 2016, explode("-",$rowMaestria["fechaInicio"])[0]);
                            ?>
                        </select>
                        <span id="helpAnio-fechaInicioMaestria" class="help-block "></span>
                    </div>
                </div>
            </div>
            <div class="row ">
                <center>
                    <label style="color: white; ">FECHA DE FIN</label>
                </center>
                <div class="col-md-3 ">
                    <div class="form-group " id="form-dia-fechaFinMaestria">
                        <label for="dia-fechaFinMaestria" style="color: white; ">DIA</label>
                        <select class="form-control input-lg " id="dia-fechaFinMaestria" name="dia-fechaFinMaestria">
                            <?php 
                            agregaSelectRangoSeleccionado(1, 31, explode("-",$rowMaestria["fechaFin"])[2]);
                            ?>
                        </select>
                        <span id="helpDia-fechaFinMaestria" class="help-block "></span>
                    </div>
                </div>
                <div class="col-md-5 ">
                    <div class="form-group " id="form-mes-fechaFinMaestria">
                        <label for="mes-fechaFinMaestria" style="color: white; ">MES</label>
                        <select class="form-control input-lg " id="mes-fechaFinMaestria" name="mes-fechaFinMaestria">
                            <?php mostrarMeses($rowMaestria, "fechaFin") ?>
                        </select>
                        <span id="helpMes-fechaFinMaestria" class="help-block "></span>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="form-group" id="form-anio-fechaFinMaestria">
                        <label for="anio-fechaFinMaestria" style="color:
                                                                  white; ">AŃO</label>
                        <select class="form-control input-lg " id="anio-fechaFinMaestria" name="anio-fechaFinMaestria">
                            <?php 
                            agregaSelectRangoSeleccionado(1940, 2016, explode("-",$rowMaestria["fechaFin"])[0]);
                            ?>
                        </select>
                        <span id="helpAnio-fechaFinMaestria" class="help-block "></span>
                    </div>
                </div>
            </div>
            <div class="form-group " id="form-gradoMaestria">
                <label for="gradoMaestria" class="control-label
                                                  " style="color: white; ">GRADO</label>
                <input type="text " class="form-control input-lg
                                           " id="gradoMaestria" name="gradoMaestria" placeholder="Grado"
                                             value="<?php echo $rowMaestria["grado"];?>">
                <span id="helpGradoMaestria" class="help-block "></span>
				<script>
                $("#gradoMaestria").bind('input propertychange', function(){
                    validar("texto", "gradoMaestria", "helpGradoMaestria", 255);
                });
            </script>
            </div>
			
            <div class="form-group " id="form-nombreTesisMaestria">
                <label for="nombreTesisMaestria" class="control-label
                                                    " style="color: white; ">NOMBRE TESIS</label>
                <input type="text " class="form-control input-lg
                                           " id="nombreTesisMaestria" name="nombreTesisMaestria" placeholder="Nombre tesis "
                                            value="<?php echo $rowMaestria["nombreTesis"];?>">
                <span id="helpNombreTesisMaestria" class="help-block "></span>
				<script>
                $("#nombreTesisMaestria").bind('input propertychange', function(){
                    validar("texto", "nombreTesisMaestria", "helpNombreTesisMaestria", 255);
                });
            </script>
            </div>
            <div class="form-group " id="form-domicilioMaestria">
                <label for="domicilioMaestria" class="control-label
                                                      " style="color: white; ">DOMICILIO</label>
                <input type="text " class="form-control input-lg" id="domicilioMaestria"
                       name="domicilioMaestria" placeholder="Domicilio" value="<?php echo $rowMaestria["domicilio"];?>">
                <span id="helpDomicilioMaestria" class="help-block"></span>
				<script>
                $("#domicilioMaestria").bind('input propertychange', function(){
                    validar("alfanumerico", "domicilioMaestria", "helpDomicilioMaestria", 255);
                });
            </script>
            </div>
            <div class="form-group " id="form-coloniaMaestria">
                <label for="coloniaMaestria" class="control-label
                                            " style="color: white; ">COLONIA</label>
                <input type="text " class="form-control input-lg
                                           " id="coloniaMaestria" name="coloniaMaestria"
                       placeholder="Colonia" value="<?php echo $rowMaestria["colonia"];?>">
                <span id="helpColoniaMaestria" class="help-block "></span>
				<script>
                $("#coloniaMaestria").bind('input propertychange', function(){
                    validar("texto", "coloniaMaestria", "helpColoniaMaestria", 200);
                });
            </script>
            </div>
            <div class="form-group " id="form-cpMaestria">
                <label for="cpMaestria" class="control-label
                                     " style="color: white; ">CODIGO POSTAL</label>
                <input type="text " class="form-control input-lg
                                           " id="cpMaestria" name="cpMaestria"
                       placeholder="Codigo postal" value="<?php echo $rowMaestria["cp"];?>">
                <span id="helpCpMaestria" class="help-block "></span>
				<script>
                $("#cpMaestria").bind('input propertychange', function(){
                    validar("numero", "cpMaestria", "helpCpMaestria", 6);
                });
            </script>
            </div>
            <div class="form-group " id="form-municipioMaestria">
                <label for="municipioMaestria" class="control-label
                                              " style="color: white; ">MUNICIPIO</label>
                <input type="text " class="form-control input-lg
                                           " id="municipioMaestria" name="municipioMaestria"
                       placeholder="Municipio" value="<?php echo $rowMaestria["municipio"];?>">
                <span id="helpMunicipioMaestria" class="help-block "></span>
				<script>
                $("#municipioMaestria").bind('input propertychange', function(){
                    validar("texto", "municipioMaestria", "helpMunicipioMaestria", 200);
                });
            </script>
            </div>
            <div class="form-group " id="form-estadoMaestria">
                <label for="estadoMaestria" class="control-label
                                           " style="color: white; ">ESTADO</label>
                <input type="text " class="form-control input-lg
                                           " id="estadoMaestria" name="estadoMaestria"
                       placeholder="Estado" value="<?php echo $rowMaestria["estado"];?>">
                <span id="helpEstadoMaestria" class="help-block "></span>
				<script>
                $("#estadoMaestria").bind('input propertychange', function(){
                    validar("texto", "estadoMaestria", "helpEstadoMaestria", 150);
                });
            </script>
            </div>
            <div class="form-group " id="form-paisMaestria">
                <label for="paisMaestria" class="control-label
                                           " style="color: white; ">PAIS</label>
                <input type="text " class="form-control input-lg
                                           " id="paisMaestria" name="paisMaestria"
                       placeholder="Pais" value="<?php echo $rowMaestria["pais"];?>">
                <span id="helpPaisMaestria" class="help-block "></span>
				<script>
                $("#paisMaestria").bind('input propertychange', function(){
                    validar("texto", "paisMaestria", "helpPaisMaestria", 150);
                });
            </script>
            </div>
            <div class="form-group " id="form-telefonoMaestria">
                <label for="telefonoMaestria" class="control-label
                                                       " style="color: white; ">TELEFONO</label>
                <input type="text " class="form-control input-lg
                                           " id="telefonoMaestria" name="telefonoMaestria" placeholder="Telefono"
                                            value="<?php echo $rowMaestria["telefono"];?>">
                <span id="helpTelefonoMaestria" class="help-block "></span>
				<script>
                $("#telefonoMaestria").bind('input propertychange', function(){
                    validar("numero", "telefonoMaestria", "helpTelefonoMaestria", 10);
                });
            </script>
            </div>
            <div class="checkbox">
                <label>
                    <?php estaActivo("checkbox", "recibeApoyoMaestria", "Si", $rowMaestria['recibeApoyo'], "RECIBE APOYO");?>
                </label>
                <script>
                    var nombreMaestria = "Maestria";
                    var campoMaestria = $("input[name='recibeApoyo"+ nombreMaestria + "']");
                    campoMaestria.change(function(){
                        comprobarEstadoCheckbox(campoMaestria, nombreMaestria);
                    });
                    campoMaestria.ready(function(){
                        comprobarEstadoCheckbox(campoMaestria, nombreMaestria);
                    });
                </script>
            </div>
            <div class="form-group " id="form-montoMaestria">
                <label for="montoMaestria" class="control-label
                                                 " style="color: white; ">MONTO APOYO</label>
                <input type="text " class="form-control input-lg
                                           " id="montoMaestria" name="montoMaestria" placeholder="Monto apoyo"
                                            value="<?php echo $rowMaestria["monto"];?>">
                <span id="helpMontoMaestria" class="help-block "></span>
				<script>
                $("#montoMaestria").bind('input propertychange', function(){
                    validar("flotante", "montoMaestria", "helpMontoMaestria", 10);
                });
            </script>
            </div>
             <div class="form-group " id="form-frecuenciaMaestria">
                <label for="frecuenciaMaestria" class="control-label
                                     " style="color: white; ">FRECUENCIA</label>
                <input type="text " class="form-control input-lg
                                           " id="frecuenciaMaestria" name="frecuenciaMaestria" placeholder="Frecuencia"
                                            value="<?php echo $rowMaestria["frecuencia"];?>">
                <span id="helpFrecuenciaMaestria" class="help-block "></span>
				<script>
                $("#frecuenciaMaestria").bind('input propertychange', function(){
                    validar("texto", "frecuenciaMaestria", "helpFrecuenciaMaestria", 100);
                });
            </script>
            </div>
            <div class="form-group " id="form-tipoCambioMaestria">
                <label for="tipoCambioMaestria" class="control-label
                                     " style="color: white; ">TIPO CAMBIO</label>
                <input type="text " class="form-control input-lg
                                           " id="tipoCambioMaestria" name="tipoCambioMaestria" placeholder="Tipo cambio"
                                            value="<?php echo $rowMaestria["tipoCambio"];?>">
                <span id="helpTipoCambioMaestria" class="help-block "></span>
				<script>
                $("#tipoCambioMaestria").bind('input propertychange', function(){
                    validar("flotante", "tipoCambioMaestria", "helpTipoCambioMaestria", 10);
                });
            </script>
            </div>
            <div class="form-group " id="form-duracionManutencionMaestria">
                <label for="duracionManutencionMaestria" class="control-label
                                     " style="color: white; ">DURACION MANUTENCION</label>
                <input type="text " class="form-control input-lg
                                           " id="duracionManutencionMaestria" name="duracionManutencionMaestria"
                       placeholder="Duracion manutencion"
                                            value="<?php echo $rowMaestria["duracionManutencion"];?>">
                <span id="helpDuracionManutencionMaestria" class="help-block "></span>
				<script>
                $("#duracionManutencionMaestria").bind('input propertychange', function(){
                    validar("texto", "duracionManutencionMaestria", "helpDuracionManutencionMaestria", 100);
                });
            </script>
            </div>
            <div class="form-group " id="form-fuenteFinancieraMaestria">
                <label for="fuenteFinancieraMaestria" class="control-label
                                     " style="color: white; ">FUENTE FINANCIERA</label>
                <input type="text " class="form-control input-lg
                                           " id="fuenteFinancieraMaestria" name="fuenteFinancieraMaestria"
                       placeholder="Fuente financiera"
                                            value="<?php echo $rowMaestria["fuenteFinanciera"];?>">
                <span id="helpFuenteFinancieraMaestria" class="help-block "></span>
				<script>
                $("#fuenteFinancieraMaestria").bind('input propertychange', function(){
                    validar("texto", "fuenteFinancieraMaestria", "helpFuenteFinancieraMaestria", 100);
                });
            </script>
            </div>
            <div class="col-sm-4">
                <div class="checkbox">
                    <label>
                        <?php estaActivo("checkbox", "manutencionMaestria", "S", $rowMaestria['manutencion'], "MANUTENCION");?>
                    </label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="checkbox">
                    <label>
                        <?php estaActivo("checkbox", "transporteMaestria", "S", $rowMaestria['transporte'], "TRANSPORTE");?>
                    </label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="checkbox">
                    <label>
                        <?php estaActivo("checkbox", "seguroMedicoMaestria", "S", $rowMaestria['seguroMedico'], "SEGURO MEDICO");?>
                    </label>
                </div>
            </div><div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <?php estaActivo("checkbox", "instalacionMaestria", "S", $rowMaestria['instalacion'], "INSTALACION");?>
                </label>
            </div>
            </div>
            <div class="col-sm-4">
                <div class="checkbox">
                    <label>
                        <?php estaActivo("checkbox", "materialBibliograficoMaestria", "S", $rowMaestria['materialBibliografico'], "MATERIAL BIBLIOGRAFICO");?>
                    </label>
                </div>
            </div>
        
    </div>
</div>