<div class="row ">
    <div class="col-md-10 " style="margin: 0 auto; float: none; ">
        <input type="hidden" name="nivelMaestria" id="nivelMaestria" value="Maestria" >
        <div class="form-group" id="form-tituloObtenidoMaestria">
            <label for="tituloObtenido" style="color: white; " class="control-label ">TITULO OBTENIDO</label>
            <input type="text" class="form-control input-lg" id="tituloObtenidoMaestria"
                   name="tituloObtenidoMaestria" placeholder="Titulo obtenido">
            <span id="helpTituloObtenidoMaestria" class="help-block-yellow "/>
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
                                              " id="institucionMaestria" name="institucionMaestria" placeholder="Institucion">
                    <span id="helpInstitucionMaestria" class="help-block-yellow "/>
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
                                              " id="nombrePosgradoMaestria" name="nombrePosgradoMaestria" placeholder="Nombre posgrado ">
                    <span id="helpNombrePosgradoMaestria" class="help-block-yellow"/>
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
                                      " id="disciplinaMaestria" name="disciplinaMaestria" placeholder="Disciplina">
            <span id="helpDisciplinaMaestria" class="help-block-yellow "/>
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
                                              " id="duracionMaestria" name="duracionMaestria" placeholder="Duracion">
                    <span id="helpDuracionMaestria" class="help-block-yellow "/>
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
                        <option>Estado estudio</option>
                        <option value="A">A cursar</option>
                        <option value="C">Cursando</option>
                        <option value="G">Grado obtenido</option>
                    </select>
                    <span id="helpEstadoEstudioMaestria" class="help-block-yellow "/>
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
                        agregaSelectRango(1, 31);
                        ?>
                    </select>
                    <span id="helpDia-fechaInicioMaestria" class="help-block-yellow "/>
                </div>
            </div>
            <div class="col-md-5 ">
                <div class="form-group " id="form-mes-fechaInicioMaestria">
                    <label for="mes-fechaInicioMaestria" style="color: white; ">MES</label>
                    <select class="form-control input-lg " id="mes-fechaInicioMaestria" name="mes-fechaInicioMaestria">
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
                    <span id="helpMes-fechaInicioMaestria" class="help-block-yellow "/>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="form-group" id="form-anio-fechaInicioMaestria">
                    <label for="anio-fechaInicioMaestria" style="color:
                                                                     white; ">AÑO</label>
                    <select class="form-control input-lg " id="anio-fechaInicioMaestria" name="anio-fechaInicioMaestria">
                        <?php   
                        agregaSelectRango(1940, 2016);
                        ?>
                    </select>
                    <span id="helpAnio-fechaInicioMaestria" class="help-block-yellow "/>
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
                        agregaSelectRango(1, 31);
                        ?>
                    </select>
                    <span id="helpDia-fechaFinMaestria" class="help-block-yellow "/>
                </div>
            </div>
            <div class="col-md-5 ">
                <div class="form-group " id="form-mes-fechaFinMaestria">
                    <label for="mes-fechaFinMaestria" style="color: white; ">MES</label>
                    <select class="form-control input-lg " id="mes-fechaFinMaestria" name="mes-fechaFinMaestria">
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
                    <span id="helpMes-fechaFinMaestria" class="help-block-yellow "/>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="form-group" id="form-anio-fechaFinMaestria">
                    <label for="anio-fechaFinMaestria" style="color:
                                                                  white; ">AÑO</label>
                    <select class="form-control input-lg " id="anio-fechaFinMaestria" name="anio-fechaFinMaestria">
                        <?php   
                        agregaSelectRango(1940, 2016);
                        ?>
                    </select>
                    <span id="helpAnio-fechaFinMaestria" class="help-block-yellow "/>
                </div>
            </div>
        </div>
        <div class="form-group " id="form-gradoMaestria">
            <label for="gradoMaestria" class="control-label
                                                  " style="color: white; ">GRADO</label>
            <input type="text " class="form-control input-lg
                                       " id="gradoMaestria" name="gradoMaestria" placeholder="Grado">
            <span id="helpGradoMaestria" class="help-block-yellow "/>
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
                                       " id="nombreTesisMaestria" name="nombreTesisMaestria" placeholder="Nombre tesis ">
            <span id="helpNombreTesisMaestria" class="help-block-yellow "/>
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
                   name="domicilioMaestria" placeholder="Domicilio">
            <span id="helpDomicilioMaestria" class="help-block-yellow"/>
            <script>
                $("#domicilioMaestria").bind('input propertychange', function(){
                    validar("alfanumerico", "domicilioMaestria", "helpDomicilioMaestria", 255);
                });
            </script>
        </div>
        <div class="form-group " id="form-coloniaMaestria">
            <label for="coloniaMaestria" class="control-label
                                                    " style="color: white; ">COLONIA</label>
            <input type="text " class="form-control input-lg" id="coloniaMaestria" name="coloniaMaestria"
                   placeholder="Colonia">
            <span id="helpColoniaMaestria" class="help-block-yellow "/>
            <script>
                $("#coloniaMaestria").bind('input propertychange', function(){
                    validar("texto", "coloniaMaestria", "helpColoniaMaestria", 200);
                });
            </script>
        </div>
        <div class="form-group " id="form-codigoPostalMaestria">
            <label for="" class="control-label" style="color: white; ">CODIGO POSTAL</label>
            <input type="text " class="form-control input-lg" id="cpMaestria" name="cpMaestria"
                   placeholder="Codigo postal">
            <span id="helpCpMaestria" class="help-block-yellow "/>
            <script>
                $("#cpMaestria").bind('input propertychange', function(){
                    validar("numero", "cpMaestria", "helpCpMaestria", 6);
                });
            </script>
        </div>
        <div class="form-group " id="form-municipioMaestria">
            <label for="municipioMaestria" class="control-label" style="color: white; ">MUNICIPIO</label>
            <input type="text " class="form-control input-lg" id="municipioMaestria" name="municipioMaestria"
                   placeholder="Municipio">
            <span id="helpMunicipioMaestria" class="help-block-yellow "/>
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
                                       " id="estadoMaestria" name="estadoMaestria" placeholder="Estado">
            <span id="helpEstadoMaestria" class="help-block-yellow "/>
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
                                       " id="paisMaestria" name="paisMaestria" placeholder="Pais">
            <span id="helpPaisMaestria" class="help-block-yellow "/>
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
                                       " id="telefonoMaestria" name="telefonoMaestria" placeholder="Telefono">
            <span id="helpTelefonoMaestria" class="help-block-yellow "/>
            <script>
                $("#telefonoMaestria").bind('input propertychange', function(){
                    validar("numero", "telefonoMaestria", "helpTelefonoMaestria", 10);
                });
            </script>
        </div>
        <div class="checkbox">
            <label>
                <input type='checkbox' name='recibeApoyoMaestria' value='Si'>
                <label for='recibeApoyoMaestria' class='control-label ' style='color: white;'>RECIBE APOYO</label>
            </label>
            <script>
                var nombreMaestria = "Maestria";
                var campoMaestria = $("input[name='recibeApoyo"+ nombreMaestria + "']");
                campoMaestria.change(function(){
                    comprobarEstadoCheckboxEstudio(campoMaestria, nombreMaestria);
                });
                campoMaestria.ready(function(){
                    comprobarEstadoCheckboxEstudio(campoMaestria, nombreMaestria);
                });
            </script>
        </div>
        <div class="form-group " id="form-montoMaestria">
            <label for="montoMaestria" class="control-label
                                                  " style="color: white; ">MONTO APOYO</label>
            <input type="text " class="form-control input-lg
                                       " id="montoMaestria" name="montoMaestria" placeholder="Monto apoyo">
            <span id="helpMontoMaestria" class="help-block-yellow "/>
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
                                       " id="frecuenciaMaestria" name="frecuenciaMaestria" placeholder="Frecuencia">
            <span id="helpFrecuenciaMaestria" class="help-block-yellow "/>
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
                                       " id="tipoCambioMaestria" name="tipoCambioMaestria" placeholder="Tipo cambio">
            <span id="helpTipoCambioMaestria" class="help-block-yellow "/>
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
                   placeholder="Duracion manutencion">
            <span id="helpDuracionManutencionMaestria" class="help-block-yellow "/>
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
                   placeholder="Fuente financiera">
            <span id="helpFuenteFinancieraMaestria" class="help-block-yellow "/>
            <script>
                $("#fuenteFinancieraMaestria").bind('input propertychange', function(){
                    validar("texto", "fuenteFinancieraMaestria", "helpFuenteFinancieraMaestria", 100);
                });
            </script>
        </div>
        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="manutencionMaestria" value="S">
                    <label for="manutencionMaestria" class="control-label
                                                                " style="color: white; ">MANUTENCION</label>
                </label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <input type='checkbox' name='transporteMaestria' value='S'>
                    <label for='transporteMaestria' class='control-label ' style='color: white;'>TRANSPORTE</label>
                </label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <input type='checkbox' name='seguroMedicoMaestria' value='S'>
                    <label for='seguroMedicoMaestria' class='control-label ' style='color: white;'>SEGURO MEDICO</label>
                </label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <input type='checkbox' name='instalacionMaestria' value='S'>
                    <label for='instalacionMaestria' class='control-label ' style='color: white;'>INSTALACION</label>
                </label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <input type='checkbox' name='materialBibliograficoMaestria' value='S'>
                    <label for='materialBibliograficoMaestria' class='control-label ' style='color: white;'>MATERIAL BIBLIOGRAFICO</label>
                </label>
            </div>
        </div>

    </div>
</div>