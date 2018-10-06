<div class="row ">
    <div class="col-md-10 " style="margin: 0 auto; float: none; ">
        <input type="hidden" name="nivelLicenciatura" id="nivelLicenciatura" value="Licenciatura" >
        <div class="form-group" id="form-tituloObtenidoLicenciatura">
            <label for="tituloObtenido" style="color: white; " class="control-label ">TITULO OBTENIDO</label>
            <input type="text" class="form-control input-lg" id="tituloObtenidoLicenciatura"
                   name="tituloObtenidoLicenciatura" placeholder="Titulo obtenido">
            <span id="helpTituloObtenidoLicenciatura" class="help-block-yellow "/>
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
                                              " id="institucionLicenciatura" name="institucionLicenciatura" placeholder="Institucion">
                    <span id="helpInstitucionLicenciatura" class="help-block-yellow "/>
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
                                              " id="nombrePosgradoLicenciatura" name="nombrePosgradoLicenciatura" placeholder="Nombre posgrado ">
                    <span id="helpNombrePosgradoLicenciatura" class="help-block-yellow"/>
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
                                      " id="disciplinaLicenciatura" name="disciplinaLicenciatura" placeholder="Disciplina">
            <span id="helpDisciplinaLicenciatura" class="help-block-yellow "/>
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
                                              " id="duracionLicenciatura" name="duracionLicenciatura" placeholder="Duracion">
                    <span id="helpDuracionLicenciatura" class="help-block-yellow "/>
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
                        <option>Estado estudio</option>
                        <option value="A">A cursar</option>
                        <option value="C">Cursando</option>
                        <option value="G">Grado obtenido</option>
                    </select>
                    <span id="helpEstadoEstudioLicenciatura" class="help-block-yellow "/>
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
                        agregaSelectRango(1, 31);
                        ?>
                    </select>
                    <span id="helpDia-fechaInicioLicenciatura" class="help-block-yellow "/>
                </div>
            </div>
            <div class="col-md-5 ">
                <div class="form-group " id="form-mes-fechaInicioLicenciatura">
                    <label for="mes-fechaInicioLicenciatura" style="color: white; ">MES</label>
                    <select class="form-control input-lg " id="mes-fechaInicioLicenciatura" name="mes-fechaInicioLicenciatura">
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
                    <span id="helpMes-fechaInicioLicenciatura" class="help-block-yellow "/>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="form-group" id="form-anio-fechaInicioLicenciatura">
                    <label for="anio-fechaInicioLicenciatura" style="color:
                                                                     white; ">AÑO</label>
                    <select class="form-control input-lg " id="anio-fechaInicioLicenciatura" name="anio-fechaInicioLicenciatura">
                        <?php   
                        agregaSelectRango(1940, 2016);
                        ?>
                    </select>
                    <span id="helpAnio-fechaInicioLicenciatura" class="help-block-yellow "/>
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
                        agregaSelectRango(1, 31);
                        ?>
                    </select>
                    <span id="helpDia-fechaFinLicenciatura" class="help-block-yellow "/>
                </div>
            </div>
            <div class="col-md-5 ">
                <div class="form-group " id="form-mes-fechaFinLicenciatura">
                    <label for="mes-fechaFinLicenciatura" style="color: white; ">MES</label>
                    <select class="form-control input-lg " id="mes-fechaFinLicenciatura" name="mes-fechaFinLicenciatura">
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
                    <span id="helpMes-fechaFinLicenciatura" class="help-block-yellow "/>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="form-group" id="form-anio-fechaFinLicenciatura">
                    <label for="anio-fechaFinLicenciatura" style="color:
                                                                  white; ">AÑO</label>
                    <select class="form-control input-lg " id="anio-fechaFinLicenciatura" name="anio-fechaFinLicenciatura">
                        <?php   
                        agregaSelectRango(1940, 2016);
                        ?>
                    </select>
                    <span id="helpAnio-fechaFinLicenciatura" class="help-block-yellow "/>
                </div>
            </div>
        </div>
        <div class="form-group " id="form-gradoLicenciatura">
            <label for="gradoLicenciatura" class="control-label
                                                  " style="color: white; ">GRADO</label>
            <input type="text " class="form-control input-lg
                                       " id="gradoLicenciatura" name="gradoLicenciatura" placeholder="Grado">
            <span id="helpGradoLicenciatura" class="help-block-yellow "/>
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
                                       " id="nombreTesisLicenciatura" name="nombreTesisLicenciatura" placeholder="Nombre tesis ">
            <span id="helpNombreTesisLicenciatura" class="help-block-yellow "/>
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
                   name="domicilioLicenciatura" placeholder="Domicilio">
            <span id="helpDomicilioLicenciatura" class="help-block-yellow"/>
            <script>
                $("#domicilioLicenciatura").bind('input propertychange', function(){
                    validar("alfanumerico", "domicilioLicenciatura", "helpDomicilioLicenciatura", 255);
                });
            </script>
        </div>
        <div class="form-group " id="form-coloniaLicenciatura">
            <label for="coloniaLicenciatura" class="control-label
                                                    " style="color: white; ">COLONIA</label>
            <input type="text " class="form-control input-lg" id="coloniaLicenciatura" name="coloniaLicenciatura"
                   placeholder="Colonia">
            <span id="helpColoniaLicenciatura" class="help-block-yellow "/>
            <script>
                $("#coloniaLicenciatura").bind('input propertychange', function(){
                    validar("texto", "coloniaLicenciatura", "helpColoniaLicenciatura", 200);
                });
            </script>
        </div>
        <div class="form-group " id="form-codigoPostalLicenciatura">
            <label for="" class="control-label" style="color: white; ">CODIGO POSTAL</label>
            <input type="text " class="form-control input-lg" id="cpLicenciatura" name="cpLicenciatura"
                   placeholder="Codigo postal">
            <span id="helpCpLicenciatura" class="help-block-yellow "/>
            <script>
                $("#cpLicenciatura").bind('input propertychange', function(){
                    validar("numero", "cpLicenciatura", "helpCpLicenciatura", 6);
                });
            </script>
        </div>
        <div class="form-group " id="form-municipioLicenciatura">
            <label for="municipioLicenciatura" class="control-label" style="color: white; ">MUNICIPIO</label>
            <input type="text " class="form-control input-lg" id="municipioLicenciatura" name="municipioLicenciatura"
                   placeholder="Municipio">
            <span id="helpMunicipioLicenciatura" class="help-block-yellow "/>
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
                                       " id="estadoLicenciatura" name="estadoLicenciatura" placeholder="Estado">
            <span id="helpEstadoLicenciatura" class="help-block-yellow "/>
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
                                       " id="paisLicenciatura" name="paisLicenciatura" placeholder="Pais">
            <span id="helpPaisLicenciatura" class="help-block-yellow "/>
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
                                       " id="telefonoLicenciatura" name="telefonoLicenciatura" placeholder="Telefono">
            <span id="helpTelefonoLicenciatura" class="help-block-yellow "/>
            <script>
                $("#telefonoLicenciatura").bind('input propertychange', function(){
                    validar("numero", "telefonoLicenciatura", "helpTelefonoLicenciatura", 10);
                });
            </script>
        </div>
        <div class="checkbox">
            <label>
                <input type='checkbox' name='recibeApoyoLicenciatura' value='Si'>
                <label for='recibeApoyoLicenciatura' class='control-label ' style='color: white;'>RECIBE APOYO</label>
            </label>
            <script>
                var nombreLicenciatura = "Licenciatura";
                var campoLicenciatura = $("input[name='recibeApoyo"+ nombreLicenciatura + "']");
                campoLicenciatura.change(function(){
                    comprobarEstadoCheckboxEstudio(campoLicenciatura, nombreLicenciatura);
                });
                campoLicenciatura.ready(function(){
                    comprobarEstadoCheckboxEstudio(campoLicenciatura, nombreLicenciatura);
                });
            </script>
        </div>
        <div class="form-group " id="form-montoLicenciatura">
            <label for="montoLicenciatura" class="control-label
                                                  " style="color: white; ">MONTO APOYO</label>
            <input type="text " class="form-control input-lg
                                       " id="montoLicenciatura" name="montoLicenciatura" placeholder="Monto apoyo">
            <span id="helpMontoLicenciatura" class="help-block-yellow "/>
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
                                       " id="frecuenciaLicenciatura" name="frecuenciaLicenciatura" placeholder="Frecuencia">
            <span id="helpFrecuenciaLicenciatura" class="help-block-yellow "/>
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
                                       " id="tipoCambioLicenciatura" name="tipoCambioLicenciatura" placeholder="Tipo cambio">
            <span id="helpTipoCambioLicenciatura" class="help-block-yellow "/>
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
                   placeholder="Duracion manutencion">
            <span id="helpDuracionManutencionLicenciatura" class="help-block-yellow "/>
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
                   placeholder="Fuente financiera">
            <span id="helpFuenteFinancieraLicenciatura" class="help-block-yellow "/>
            <script>
                $("#fuenteFinancieraLicenciatura").bind('input propertychange', function(){
                    validar("texto", "fuenteFinancieraLicenciatura", "helpFuenteFinancieraLicenciatura", 100);
                });
            </script>
        </div>
        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="manutencionLicenciatura" value="S">
                    <label for="manutencionLicenciatura" class="control-label
                                                                " style="color: white; ">MANUTENCION</label>
                </label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <input type='checkbox' name='transporteLicenciatura' value='S'>
                    <label for='transporteLicenciatura' class='control-label ' style='color: white;'>TRANSPORTE</label>
                </label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <input type='checkbox' name='seguroMedicoLicenciatura' value='S'>
                    <label for='seguroMedicoLicenciatura' class='control-label ' style='color: white;'>SEGURO MEDICO</label>
                </label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <input type='checkbox' name='instalacionLicenciatura' value='S'>
                    <label for='instalacionLicenciatura' class='control-label ' style='color: white;'>INSTALACION</label>
                </label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <input type='checkbox' name='materialBibliograficoLicenciatura' value='S'>
                    <label for='materialBibliograficoLicenciatura' class='control-label ' style='color: white;'>MATERIAL BIBLIOGRAFICO</label>
                </label>
            </div>
        </div>

    </div>
</div>