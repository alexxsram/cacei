<div class="row ">
    <div class="col-md-10 " style="margin: 0 auto; float: none; ">
        <input type="hidden" name="nivelDoctorado" id="nivelDoctorado" value="Doctorado" >
        <div class="form-group" id="form-tituloObtenidoDoctorado">
            <label for="tituloObtenido" style="color: white; " class="control-label ">TITULO OBTENIDO</label>
            <input type="text" class="form-control input-lg" id="tituloObtenidoDoctorado"
                   name="tituloObtenidoDoctorado" placeholder="Titulo obtenido">
            <span id="helpTituloObtenidoDoctorado" class="help-block-yellow "/>
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
                                              " id="institucionDoctorado" name="institucionDoctorado" placeholder="Institucion">
                    <span id="helpInstitucionDoctorado" class="help-block-yellow "/>
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
                                              " id="nombrePosgradoDoctorado" name="nombrePosgradoDoctorado" placeholder="Nombre posgrado ">
                    <span id="helpNombrePosgradoDoctorado" class="help-block-yellow"/>
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
                                      " id="disciplinaDoctorado" name="disciplinaDoctorado" placeholder="Disciplina">
            <span id="helpDisciplinaDoctorado" class="help-block-yellow "/>
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
                                              " id="duracionDoctorado" name="duracionDoctorado" placeholder="Duracion">
                    <span id="helpDuracionDoctorado" class="help-block-yellow "/>
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
                        <option>Estado estudio</option>
                        <option value="A">A cursar</option>
                        <option value="C">Cursando</option>
                        <option value="G">Grado obtenido</option>
                    </select>
                    <span id="helpEstadoEstudioDoctorado" class="help-block-yellow "/>
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
                        agregaSelectRango(1, 31);
                        ?>
                    </select>
                    <span id="helpDia-fechaInicioDoctorado" class="help-block-yellow "/>
                </div>
            </div>
            <div class="col-md-5 ">
                <div class="form-group " id="form-mes-fechaInicioDoctorado">
                    <label for="mes-fechaInicioDoctorado" style="color: white; ">MES</label>
                    <select class="form-control input-lg " id="mes-fechaInicioDoctorado" name="mes-fechaInicioDoctorado">
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
                    <span id="helpMes-fechaInicioDoctorado" class="help-block-yellow "/>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="form-group" id="form-anio-fechaInicioDoctorado">
                    <label for="anio-fechaInicioDoctorado" style="color:
                                                                     white; ">AÑO</label>
                    <select class="form-control input-lg " id="anio-fechaInicioDoctorado" name="anio-fechaInicioDoctorado">
                        <?php   
                        agregaSelectRango(1940, 2016);
                        ?>
                    </select>
                    <span id="helpAnio-fechaInicioDoctorado" class="help-block-yellow "/>
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
                        agregaSelectRango(1, 31);
                        ?>
                    </select>
                    <span id="helpDia-fechaFinDoctorado" class="help-block-yellow "/>
                </div>
            </div>
            <div class="col-md-5 ">
                <div class="form-group " id="form-mes-fechaFinDoctorado">
                    <label for="mes-fechaFinDoctorado" style="color: white; ">MES</label>
                    <select class="form-control input-lg " id="mes-fechaFinDoctorado" name="mes-fechaFinDoctorado">
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
                    <span id="helpMes-fechaFinDoctorado" class="help-block-yellow "/>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="form-group" id="form-anio-fechaFinDoctorado">
                    <label for="anio-fechaFinDoctorado" style="color:
                                                                  white; ">AÑO</label>
                    <select class="form-control input-lg " id="anio-fechaFinDoctorado" name="anio-fechaFinDoctorado">
                        <?php   
                        agregaSelectRango(1940, 2016);
                        ?>
                    </select>
                    <span id="helpAnio-fechaFinDoctorado" class="help-block-yellow "/>
                </div>
            </div>
        </div>
        <div class="form-group " id="form-gradoDoctorado">
            <label for="gradoDoctorado" class="control-label
                                                  " style="color: white; ">GRADO</label>
            <input type="text " class="form-control input-lg
                                       " id="gradoDoctorado" name="gradoDoctorado" placeholder="Grado">
            <span id="helpGradoDoctorado" class="help-block-yellow "/>
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
                                       " id="nombreTesisDoctorado" name="nombreTesisDoctorado" placeholder="Nombre tesis ">
            <span id="helpNombreTesisDoctorado" class="help-block-yellow "/>
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
                   name="domicilioDoctorado" placeholder="Domicilio">
            <span id="helpDomicilioDoctorado" class="help-block-yellow"/>
            <script>
                $("#domicilioDoctorado").bind('input propertychange', function(){
                    validar("alfanumerico", "domicilioDoctorado", "helpDomicilioDoctorado", 255);
                });
            </script>
        </div>
        <div class="form-group " id="form-coloniaDoctorado">
            <label for="coloniaDoctorado" class="control-label
                                                    " style="color: white; ">COLONIA</label>
            <input type="text " class="form-control input-lg" id="coloniaDoctorado" name="coloniaDoctorado"
                   placeholder="Colonia">
            <span id="helpColoniaDoctorado" class="help-block-yellow "/>
            <script>
                $("#coloniaDoctorado").bind('input propertychange', function(){
                    validar("texto", "coloniaDoctorado", "helpColoniaDoctorado", 200);
                });
            </script>
        </div>
        <div class="form-group " id="form-codigoPostalDoctorado">
            <label for="" class="control-label" style="color: white; ">CODIGO POSTAL</label>
            <input type="text " class="form-control input-lg" id="cpDoctorado" name="cpDoctorado"
                   placeholder="Codigo postal">
            <span id="helpCpDoctorado" class="help-block-yellow "/>
            <script>
                $("#cpDoctorado").bind('input propertychange', function(){
                    validar("numero", "cpDoctorado", "helpCpDoctorado", 6);
                });
            </script>
        </div>
        <div class="form-group " id="form-municipioDoctorado">
            <label for="municipioDoctorado" class="control-label" style="color: white; ">MUNICIPIO</label>
            <input type="text " class="form-control input-lg" id="municipioDoctorado" name="municipioDoctorado"
                   placeholder="Municipio">
            <span id="helpMunicipioDoctorado" class="help-block-yellow "/>
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
                                       " id="estadoDoctorado" name="estadoDoctorado" placeholder="Estado">
            <span id="helpEstadoDoctorado" class="help-block-yellow "/>
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
                                       " id="paisDoctorado" name="paisDoctorado" placeholder="Pais">
            <span id="helpPaisDoctorado" class="help-block-yellow "/>
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
                                       " id="telefonoDoctorado" name="telefonoDoctorado" placeholder="Telefono">
            <span id="helpTelefonoDoctorado" class="help-block-yellow "/>
            <script>
                $("#telefonoDoctorado").bind('input propertychange', function(){
                    validar("numero", "telefonoDoctorado", "helpTelefonoDoctorado", 10);
                });
            </script>
        </div>
        <div class="checkbox">
            <label>
                <input type='checkbox' name='recibeApoyoDoctorado' value='Si'>
                <label for='recibeApoyoDoctorado' class='control-label ' style='color: white;'>RECIBE APOYO</label>
            </label>
            <script>
                var nombreDoctorado = "Doctorado";
                var campoDoctorado = $("input[name='recibeApoyo"+ nombreDoctorado + "']");
                campoDoctorado.change(function(){
                    comprobarEstadoCheckboxEstudio(campoDoctorado, nombreDoctorado);
                });
                campoDoctorado.ready(function(){
                    comprobarEstadoCheckboxEstudio(campoDoctorado, nombreDoctorado);
                });
            </script>
        </div>
        <div class="form-group " id="form-montoDoctorado">
            <label for="montoDoctorado" class="control-label
                                                  " style="color: white; ">MONTO APOYO</label>
            <input type="text " class="form-control input-lg
                                       " id="montoDoctorado" name="montoDoctorado" placeholder="Monto apoyo">
            <span id="helpMontoDoctorado" class="help-block-yellow "/>
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
                                       " id="frecuenciaDoctorado" name="frecuenciaDoctorado" placeholder="Frecuencia">
            <span id="helpFrecuenciaDoctorado" class="help-block-yellow "/>
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
                                       " id="tipoCambioDoctorado" name="tipoCambioDoctorado" placeholder="Tipo cambio">
            <span id="helpTipoCambioDoctorado" class="help-block-yellow "/>
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
                   placeholder="Duracion manutencion">
            <span id="helpDuracionManutencionDoctorado" class="help-block-yellow "/>
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
                   placeholder="Fuente financiera">
            <span id="helpFuenteFinancieraDoctorado" class="help-block-yellow "/>
            <script>
                $("#fuenteFinancieraDoctorado").bind('input propertychange', function(){
                    validar("texto", "fuenteFinancieraDoctorado", "helpFuenteFinancieraDoctorado", 100);
                });
            </script>
        </div>
        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="manutencionDoctorado" value="S">
                    <label for="manutencionDoctorado" class="control-label
                                                                " style="color: white; ">MANUTENCION</label>
                </label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <input type='checkbox' name='transporteDoctorado' value='S'>
                    <label for='transporteDoctorado' class='control-label ' style='color: white;'>TRANSPORTE</label>
                </label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <input type='checkbox' name='seguroMedicoDoctorado' value='S'>
                    <label for='seguroMedicoDoctorado' class='control-label ' style='color: white;'>SEGURO MEDICO</label>
                </label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <input type='checkbox' name='instalacionDoctorado' value='S'>
                    <label for='instalacionDoctorado' class='control-label ' style='color: white;'>INSTALACION</label>
                </label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <input type='checkbox' name='materialBibliograficoDoctorado' value='S'>
                    <label for='materialBibliograficoDoctorado' class='control-label ' style='color: white;'>MATERIAL BIBLIOGRAFICO</label>
                </label>
            </div>
        </div>

    </div>
</div>