<?php 
    $queryConsultaLicenciatura =     "SELECT * FROM estudio WHERE codigo = " . $codigo . " AND nivel = 'Licenciatura'";
    $resultadoConsultaLicenciatura = mysqli_query($conexion, $queryConsultaLicenciatura);

    if(mysqli_num_rows($resultadoConsultaLicenciatura) == 1) {
        $rowLicenciatura = $resultadoConsultaLicenciatura->fetch_assoc();
    }
?>
<div class="row ">
    <div class="col-md-10 " style="margin: 0 auto; float: none; ">
            <input type="hidden" name="nivelLicenciatura" id="nivelLicenciatura" value="Licenciatura" >
            <div class="form-group" id="form-tituloObtenidoLicenciatura">
                <label for="tituloObtenidoLicenciatura" style="color: white; " class="control-label ">TITULO OBTENIDO</label>
                <input type="text" class="form-control input-lg" id="tituloObtenidoLicenciatura"
                       name="tituloObtenidoLicenciatura" placeholder="Titulo obtenido" value="<?php echo $rowLicenciatura["tituloObtenido"];?>">
                <span id="helpTituloObtenidoLicenciatura" class="help-block "></span>
				<script>
                $("#tituloObtenidoLicenciatura").bind('input propertychange', function(){
                    validar("texto", "tituloObtenidoLicenciatura", "helpTituloObtenidoLicenciatura", 255);
                });
            </script>
            </div>
            <div class="row ">
                <div class="col-sm-6 ">
                    <div class="form-group has-feedback " id="form-institucionLicenciatura">
                        <label for="institucionLicenciatura" style="color: white; ">INSTITUCION</label>
                        <input type="text" class="form-control input-lg
                                                  " id="institucionLicenciatura" name="institucionLicenciatura" placeholder="Institucion"
                                                     value="<?php echo $rowLicenciatura["institucion"];?>">
                        <span id="helpInstitucionLicenciatura" class="help-block "></span>
						<script>
                        $("#institucionLicenciatura").bind('input propertychange', function(){
                            validar("texto", "institucionLicenciatura", "helpInstitucionLicenciatura", 255);
                        });
                    </script>
                    </div>
                </div>
                <div class="col-sm-6 ">
                    <div class="form-group" id="form-nombrePosgradoLicenciatura">
                        <label for="nombrePosgradoLicenciatura" style="color: white; ">NOMBRE POSGRADO</label>
                        <input type="text" class="form-control input-lg
                                                  " id="nombrePosgradoLicenciatura" name="nombrePosgradoLicenciatura" placeholder="Nombre posgrado "
                                                     value="<?php echo $rowLicenciatura["nombrePosgrado"];?>">
                        <span id="helpNombrePosgradoLicenciatura" class="help-block"></span>
						<script>
                        $("#nombrePosgradoLicenciatura").bind('input propertychange', function(){
                            validar("texto", "nombrePosgradoLicenciatura", "helpNombrePosgradoLicenciatura", 255);
                        });
                    </script>
                    </div>
                </div>
            </div>
            <div class="form-group" id="form-disciplinaLicenciatura">
                <label for="disciplinaLicenciatura" class="control-label
                                                     " style="color: white; ">DISCIPLINA</label>
                <input type="text" class="form-control input-lg
                                          " id="disciplinaLicenciatura" name="disciplinaLicenciatura" placeholder="Disciplina"
                                             value="<?php echo $rowLicenciatura["disciplina"];?>">
                <span id="helpDisciplinaLicenciatura" class="help-block "></span>
				<script>
                $("#disciplinaLicenciatura").bind('input propertychange', function(){
                    validar("texto", "disciplinaLicenciatura", "helpDisciplinaLicenciatura", 255);
                });
            </script>
            </div>
            <div class="row">
                <div class="col-sm-6 ">
                    <div class="form-group" id="form-duracionLicenciatura">
                        <label for="duracionLicenciatura" class="control-label
                                                             " style="color: white; ">DURACION</label>
                        <input type="text" class="form-control input-lg
                                                  " id="duracionLicenciatura" name="duracionLicenciatura" placeholder="Duracion"
                                                     value="<?php echo $rowLicenciatura["duracion"];?>">
                        <span id="helpDuracionLicenciatura" class="help-block "></span>
						<script>
                        $("#duracionLicenciatura").bind('input propertychange', function(){
                            validar("alfanumericoEspacio", "duracionLicenciatura", "helpDuracionLicenciatura", 50);
                        });
                    </script>
                    </div>
                </div>
                <div class="col-sm-6 ">
                    <div class="form-group " id="form-estadoEstudioLicenciatura">
                    <label for="estadoEstudioLicenciatura" class="control-label
                                              " style="color: white; ">ESTADO ESTUDIO</label>
                    <select class="form-control input-lg" name="estadoEstudioLicenciatura">
                        <?php estaActivo("option", "", "", "", "Estado estudio")?>
                        <?php estaActivo("option", "", "A", $rowLicenciatura["estadoEstudio"], "A cursar")?>
                        <?php estaActivo("option", "", "C", $rowLicenciatura["estadoEstudio"], "Cursando")?>
                        <?php estaActivo("option", "", "G", $rowLicenciatura["estadoEstudio"], "Grado obtenido")?>
                    </select>
                    <span id="helpEstadoEstudioLicenciatura" class="help-block "></span>
                    </div>
                </div>
            </div>
            <div class="row ">
                <center>
                    <label style="color: white; ">FECHA DE INICIO</label>
                </center>
                <div class="col-md-3 ">
                    <div class="form-group " id="form-dia-fechaInicioLicenciatura">
                        <label for="dia-fechaInicioLicenciatura" style="color: white; ">DIA</label>
                        <select class="form-control input-lg " id="dia-fechaInicioLicenciatura" name="dia-fechaInicioLicenciatura">
                            <?php 
                            agregaSelectRangoSeleccionado(1, 31, explode("-",$rowLicenciatura["fechaInicio"])[2]);
                            ?>
                        </select>
                        <span id="helpDia-fechaInicioLicenciatura" class="help-block "></span>
                    </div>
                </div>
                <div class="col-md-5 ">
                    <div class="form-group " id="form-mes-fechaInicioLicenciatura">
                        <label for="mes-fechaInicioLicenciatura" style="color: white; ">MES</label>
                        <select class="form-control input-lg " id="mes-fechaInicioLicenciatura" name="mes-fechaInicioLicenciatura">
                            <?php mostrarMeses($rowLicenciatura, "fechaInicio") ?>
                        </select>
                        <span id="helpMes-fechaInicioLicenciatura" class="help-block "></span>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="form-group" id="form-anio-fechaInicioLicenciatura">
                        <label for="anio-fechaInicioLicenciatura" style="color:
                                                                  white; ">AŃO</label>
                        <select class="form-control input-lg " id="anio-fechaInicioLicenciatura" name="anio-fechaInicioLicenciatura">
                            <?php   
                            agregaSelectRangoSeleccionado(1940, 2016, explode("-",$rowLicenciatura["fechaInicio"])[0]);
                            ?>
                        </select>
                        <span id="helpAnio-fechaInicioLicenciatura" class="help-block "></span>
                    </div>
                </div>
            </div>
            <div class="row ">
                <center>
                    <label style="color: white; ">FECHA DE FIN</label>
                </center>
                <div class="col-md-3 ">
                    <div class="form-group " id="form-dia-fechaFinLicenciatura">
                        <label for="dia-fechaFinLicenciatura" style="color: white; ">DIA</label>
                        <select class="form-control input-lg " id="dia-fechaFinLicenciatura" name="dia-fechaFinLicenciatura">
                            <?php 
                            agregaSelectRangoSeleccionado(1, 31, explode("-",$rowLicenciatura["fechaFin"])[2]);
                            ?>
                        </select>
                        <span id="helpDia-fechaFinLicenciatura" class="help-block "></span>
                    </div>
                </div>
                <div class="col-md-5 ">
                    <div class="form-group " id="form-mes-fechaFinLicenciatura">
                        <label for="mes-fechaFinLicenciatura" style="color: white; ">MES</label>
                        <select class="form-control input-lg " id="mes-fechaFinLicenciatura" name="mes-fechaFinLicenciatura">
                            <?php mostrarMeses($rowLicenciatura, "fechaFin") ?>
                        </select>
                        <span id="helpMes-fechaFinLicenciatura" class="help-block "></span>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="form-group" id="form-anio-fechaFinLicenciatura">
                        <label for="anio-fechaFinLicenciatura" style="color:
                                                                  white; ">AŃO</label>
                        <select class="form-control input-lg " id="anio-fechaFinLicenciatura" name="anio-fechaFinLicenciatura">
                            <?php 
                            agregaSelectRangoSeleccionado(1940, 2016, explode("-",$rowLicenciatura["fechaFin"])[0]);
                            ?>
                        </select>
                        <span id="helpAnio-fechaFinLicenciatura" class="help-block "></span>
                    </div>
                </div>
            </div>
            <div class="form-group " id="form-gradoLicenciatura">
                <label for="gradoLicenciatura" class="control-label
                                                  " style="color: white; ">GRADO</label>
                <input type="text " class="form-control input-lg
                                           " id="gradoLicenciatura" name="gradoLicenciatura" placeholder="Grado"
                                             value="<?php echo $rowLicenciatura["grado"];?>">
                <span id="helpGradoLicenciatura" class="help-block "></span>
				<script>
                $("#gradoLicenciatura").bind('input propertychange', function(){
                    validar("texto", "gradoLicenciatura", "helpGradoLicenciatura", 255);
                });
            </script>
            </div>
			
            <div class="form-group " id="form-nombreTesisLicenciatura">
                <label for="nombreTesisLicenciatura" class="control-label
                                                    " style="color: white; ">NOMBRE TESIS</label>
                <input type="text " class="form-control input-lg
                                           " id="nombreTesisLicenciatura" name="nombreTesisLicenciatura" placeholder="Nombre tesis "
                                            value="<?php echo $rowLicenciatura["nombreTesis"];?>">
                <span id="helpNombreTesisLicenciatura" class="help-block "></span>
				<script>
                $("#nombreTesisLicenciatura").bind('input propertychange', function(){
                    validar("texto", "nombreTesisLicenciatura", "helpNombreTesisLicenciatura", 255);
                });
            </script>
            </div>
            <div class="form-group " id="form-domicilioLicenciatura">
                <label for="domicilioLicenciatura" class="control-label
                                                      " style="color: white; ">DOMICILIO</label>
                <input type="text " class="form-control input-lg" id="domicilioLicenciatura"
                       name="domicilioLicenciatura" placeholder="Domicilio" value="<?php echo $rowLicenciatura["domicilio"];?>">
                <span id="helpDomicilioLicenciatura" class="help-block"></span>
				<script>
                $("#domicilioLicenciatura").bind('input propertychange', function(){
                    validar("alfanumerico", "domicilioLicenciatura", "helpDomicilioLicenciatura", 255);
                });
            </script>
            </div>
            <div class="form-group " id="form-coloniaLicenciatura">
                <label for="coloniaLicenciatura" class="control-label
                                            " style="color: white; ">COLONIA</label>
                <input type="text " class="form-control input-lg
                                           " id="coloniaLicenciatura" name="coloniaLicenciatura"
                       placeholder="Colonia" value="<?php echo $rowLicenciatura["colonia"];?>">
                <span id="helpColoniaLicenciatura" class="help-block "></span>
				<script>
                $("#coloniaLicenciatura").bind('input propertychange', function(){
                    validar("texto", "coloniaLicenciatura", "helpColoniaLicenciatura", 200);
                });
            </script>
            </div>
            <div class="form-group " id="form-cpLicenciatura">
                <label for="cpLicenciatura" class="control-label
                                     " style="color: white; ">CODIGO POSTAL</label>
                <input type="text " class="form-control input-lg
                                           " id="cpLicenciatura" name="cpLicenciatura"
                       placeholder="Codigo postal" value="<?php echo $rowLicenciatura["cp"];?>">
                <span id="helpCpLicenciatura" class="help-block "></span>
				<script>
                $("#cpLicenciatura").bind('input propertychange', function(){
                    validar("numero", "cpLicenciatura", "helpCpLicenciatura", 6);
                });
            </script>
            </div>
            <div class="form-group " id="form-municipioLicenciatura">
                <label for="municipioLicenciatura" class="control-label
                                              " style="color: white; ">MUNICIPIO</label>
                <input type="text " class="form-control input-lg
                                           " id="municipioLicenciatura" name="municipioLicenciatura"
                       placeholder="Municipio" value="<?php echo $rowLicenciatura["municipio"];?>">
                <span id="helpMunicipioLicenciatura" class="help-block "></span>
				<script>
                $("#municipioLicenciatura").bind('input propertychange', function(){
                    validar("texto", "municipioLicenciatura", "helpMunicipioLicenciatura", 200);
                });
            </script>
            </div>
            <div class="form-group " id="form-estadoLicenciatura">
                <label for="estadoLicenciatura" class="control-label
                                           " style="color: white; ">ESTADO</label>
                <input type="text " class="form-control input-lg
                                           " id="estadoLicenciatura" name="estadoLicenciatura"
                       placeholder="Estado" value="<?php echo $rowLicenciatura["estado"];?>">
                <span id="helpEstadoLicenciatura" class="help-block "></span>
				<script>
                $("#estadoLicenciatura").bind('input propertychange', function(){
                    validar("texto", "estadoLicenciatura", "helpEstadoLicenciatura", 150);
                });
            </script>
            </div>
            <div class="form-group " id="form-paisLicenciatura">
                <label for="paisLicenciatura" class="control-label
                                           " style="color: white; ">PAIS</label>
                <input type="text " class="form-control input-lg
                                           " id="paisLicenciatura" name="paisLicenciatura"
                       placeholder="Pais" value="<?php echo $rowLicenciatura["pais"];?>">
                <span id="helpPaisLicenciatura" class="help-block "></span>
				<script>
                $("#paisLicenciatura").bind('input propertychange', function(){
                    validar("texto", "paisLicenciatura", "helpPaisLicenciatura", 150);
                });
            </script>
            </div>
            <div class="form-group " id="form-telefonoLicenciatura">
                <label for="telefonoLicenciatura" class="control-label
                                                       " style="color: white; ">TELEFONO</label>
                <input type="text " class="form-control input-lg
                                           " id="telefonoLicenciatura" name="telefonoLicenciatura" placeholder="Telefono"
                                            value="<?php echo $rowLicenciatura["telefono"];?>">
                <span id="helpTelefonoLicenciatura" class="help-block "></span>
				<script>
                $("#telefonoLicenciatura").bind('input propertychange', function(){
                    validar("numero", "telefonoLicenciatura", "helpTelefonoLicenciatura", 10);
                });
            </script>
            </div>
            <div class="checkbox">
                <label>
                    <?php estaActivo("checkbox", "recibeApoyoLicenciatura", "Si", $rowLicenciatura['recibeApoyo'], "RECIBE APOYO");?>
                </label>
                <script>
                    var nombreLicenciatura = "Licenciatura";
                    var campoLicenciatura = $("input[name='recibeApoyo"+ nombreLicenciatura + "']");
                    campoLicenciatura.change(function(){
                        comprobarEstadoCheckbox(campoLicenciatura, nombreLicenciatura);
                    });
                    campoLicenciatura.ready(function(){
                        comprobarEstadoCheckbox(campoLicenciatura, nombreLicenciatura);
                    });
                </script>
            </div>
            <div class="form-group " id="form-montoLicenciatura">
                <label for="montoLicenciatura" class="control-label
                                                 " style="color: white; ">MONTO APOYO</label>
                <input type="text " class="form-control input-lg
                                           " id="montoLicenciatura" name="montoLicenciatura" placeholder="Monto apoyo"
                                            value="<?php echo $rowLicenciatura["monto"];?>">
                <span id="helpMontoLicenciatura" class="help-block "></span>
				<script>
                $("#montoLicenciatura").bind('input propertychange', function(){
                    validar("flotante", "montoLicenciatura", "helpMontoLicenciatura", 10);
                });
            </script>
            </div>
             <div class="form-group " id="form-frecuenciaLicenciatura">
                <label for="frecuenciaLicenciatura" class="control-label
                                     " style="color: white; ">FRECUENCIA</label>
                <input type="text " class="form-control input-lg
                                           " id="frecuenciaLicenciatura" name="frecuenciaLicenciatura" placeholder="Frecuencia"
                                            value="<?php echo $rowLicenciatura["frecuencia"];?>">
                <span id="helpFrecuenciaLicenciatura" class="help-block "></span>
				<script>
                $("#frecuenciaLicenciatura").bind('input propertychange', function(){
                    validar("texto", "frecuenciaLicenciatura", "helpFrecuenciaLicenciatura", 100);
                });
            </script>
            </div>
            <div class="form-group " id="form-tipoCambioLicenciatura">
                <label for="tipoCambioLicenciatura" class="control-label
                                     " style="color: white; ">TIPO CAMBIO</label>
                <input type="text " class="form-control input-lg
                                           " id="tipoCambioLicenciatura" name="tipoCambioLicenciatura" placeholder="Tipo cambio"
                                            value="<?php echo $rowLicenciatura["tipoCambio"];?>">
                <span id="helpTipoCambioLicenciatura" class="help-block "></span>
				<script>
                $("#tipoCambioLicenciatura").bind('input propertychange', function(){
                    validar("flotante", "tipoCambioLicenciatura", "helpTipoCambioLicenciatura", 10);
                });
            </script>
            </div>
            <div class="form-group " id="form-duracionManutencionLicenciatura">
                <label for="duracionManutencionLicenciatura" class="control-label
                                     " style="color: white; ">DURACION MANUTENCION</label>
                <input type="text " class="form-control input-lg
                                           " id="duracionManutencionLicenciatura" name="duracionManutencionLicenciatura"
                       placeholder="Duracion manutencion"
                                            value="<?php echo $rowLicenciatura["duracionManutencion"];?>">
                <span id="helpDuracionManutencionLicenciatura" class="help-block "></span>
				<script>
                $("#duracionManutencionLicenciatura").bind('input propertychange', function(){
                    validar("texto", "duracionManutencionLicenciatura", "helpDuracionManutencionLicenciatura", 100);
                });
            </script>
            </div>
            <div class="form-group " id="form-fuenteFinancieraLicenciatura">
                <label for="fuenteFinancieraLicenciatura" class="control-label
                                     " style="color: white; ">FUENTE FINANCIERA</label>
                <input type="text " class="form-control input-lg
                                           " id="fuenteFinancieraLicenciatura" name="fuenteFinancieraLicenciatura"
                       placeholder="Fuente financiera"
                                            value="<?php echo $rowLicenciatura["fuenteFinanciera"];?>">
                <span id="helpFuenteFinancieraLicenciatura" class="help-block "></span>
				<script>
                $("#fuenteFinancieraLicenciatura").bind('input propertychange', function(){
                    validar("texto", "fuenteFinancieraLicenciatura", "helpFuenteFinancieraLicenciatura", 100);
                });
            </script>
            </div>
            <div class="col-sm-4">
                <div class="checkbox">
                    <label>
                        <?php estaActivo("checkbox", "manutencionLicenciatura", "S", $rowLicenciatura['manutencion'], "MANUTENCION");?>
                    </label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="checkbox">
                    <label>
                        <?php estaActivo("checkbox", "transporteLicenciatura", "S", $rowLicenciatura['transporte'], "TRANSPORTE");?>
                    </label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="checkbox">
                    <label>
                        <?php estaActivo("checkbox", "seguroMedicoLicenciatura", "S", $rowLicenciatura['seguroMedico'], "SEGURO MEDICO");?>
                    </label>
                </div>
            </div><div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <?php estaActivo("checkbox", "instalacionLicenciatura", "S", $rowLicenciatura['instalacion'], "INSTALACION");?>
                </label>
            </div>
            </div>
            <div class="col-sm-4">
                <div class="checkbox">
                    <label>
                        <?php estaActivo("checkbox", "materialBibliograficoLicenciatura", "S", $rowLicenciatura['materialBibliografico'], "MATERIAL BIBLIOGRAFICO");?>
                    </label>
                </div>
            </div>
        
    </div>
</div>