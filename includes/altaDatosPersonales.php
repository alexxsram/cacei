<div class="row">
    <div class="col-md-10 " style="margin: 0 auto; float: none; ">
        <div class="form-group " id="form-codigo">
            <label for="codigo" class="control-label" style="color:white; ">CÓDIGO</label>
            <input type="text" class="form-control input-lg
                                      " id="codigo" name="codigo" placeholder="Código">
            <span id="helpCodigo" class="help-block-yellow"></span>
            <script>
                $("#codigo").bind('input propertychange', function(){
                    validar("numero", "codigo", "helpCodigo", 8);
                });
            </script>
        </div>
        <div class="form-group" id="form-nombre">
            <label for="nombre" style="color: white; " class="control-label ">NOMBRE</label>
            <input type="text" class="form-control input-lg" id="nombre" name="nombre" placeholder="Nombre(s) " required>
            <span id="helpNombre" class="help-block-yellow "></span>
            <script>
                $("#nombre").bind('input propertychange', function(){
                    validar("texto", "nombre", "helpNombre", 40);
                });
            </script>
        </div>
        <div class="row ">
            <div class="col-sm-6 ">
                <div class="form-group has-feedback " id="form-apellidoPaterno">
                    <label for="apellidoPaterno" style="color: white; ">APELLIDO PATERNO</label>
                    <input type="text" class="form-control input-lg
                                              " id="apellidoPaterno" name="apellidoPaterno" placeholder="Apellido Paterno " required>
                    <span id="helpPaterno" class="help-block-yellow "></span>
                </div>
                <script>
                    $("#apellidoPaterno").bind('input propertychange', function(){
                        validar("texto", "apellidoPaterno", "helpPaterno", 40);
                    });
                </script>
            </div>
            <div class="col-sm-6 ">
                <div class="form-group" id="form-apellidoMaterno">
                    <label for="apellidoMaterno " style="color: white; ">APELLIDO MATERNO</label>
                    <input type="text" class="form-control input-lg
                                              " id="apellidoMaterno" name="apellidoMaterno" placeholder="Apellido Materno " required>
                    <span id="helpMaterno" class="help-block-yellow"></span>
                    <script>
                        $("#apellidoMaterno").bind('input propertychange', function(){
                            validar("texto", "apellidoMaterno", "helpMaterno", 40);
                        });
                    </script>
                </div>
            </div>
        </div>
        <div class="form-group" id="form-lugarNacimiento">
            <label for="lugarNacimiento " class="control-label
                                                 " style="color: white; ">LUGAR DE NACIMIENTO</label>
            <input type="text" class="form-control input-lg
                                      " id="lugarNacimiento" name="lugarNacimiento" placeholder="Lugar de Nacimiento ">
            <span id="helpLugarNacimiento" class="help-block-yellow "></span>
            <script>
                $("#lugarNacimiento").bind('input propertychange', function(){
                    validar("texto", "lugarNacimiento", "helpLugarNacimiento", 150);
                });
            </script>
        </div>
        <div class="row ">
            <center>
                <label style="color: white; ">FECHA DE NACIMIENTO</label>
            </center>
            <div class="col-md-3 ">
                <div class="form-group " id="form-dia-fechaNacimiento">
                    <label for="dia-fechaNacimiento " style="color: white; ">DIA</label>
                    <select class="form-control input-lg " id="dia-fechaNacimiento" name="dia-fechaNacimiento">
                        <?php agregaSelectRango(1, 31)?>
                    </select>
                    <span id="helpDia-fechaNacimiento" class="help-block-yellow "></span>
                </div>
            </div>
            <div class="col-md-5 ">
                <div class="form-group " id="form-mes-fechaNacimiento">
                    <label for="mes-fechaNacimiento " style="color: white; ">MES</label>
                    <select class="form-control input-lg " id="mes-fechaNacimiento" name="mes-fechaNacimiento">
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
                    <span id="helpMes-fechaNacimiento" class="help-block-yellow "></span>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="form-group" id="form-anio-fechaNacimiento ">
                    <label for="anio-fechaNacimiento " style="color:
                                                              white; ">AŃO</label>
                    <select class="form-control input-lg " id="anio-fechaNacimiento" name="anio-fechaNacimiento">
                        <?php agregaSelectRango(1900, 2016)?>
                    </select>
                    <span id="helpAnio-fechaNacimiento " class="help-block-yellow "></span>
                </div>
            </div>
        </div>
        <div class="form-group " id="form-nacionalidad">
            <label for="nacionalidad " class="control-label
                                              " style="color: white; ">NACIONALIDAD</label>
            <input type="text " class="form-control input-lg
                                       " id="nacionalidad" name="nacionalidad" placeholder="Nacionalidad">
            <span id="helpNacionalidad" class="help-block-yellow "></span>
            <script>
                $("#nacionalidad").bind('input propertychange', function(){
                    validar("texto", "nacionalidad", "helpNacionalidad", 100);
                });
            </script>
        </div>
        <div class="form-group " id="form-formaMigratoria">
            <label for="formaMigratoria" class="control-label
                                                " style="color: white; ">FORMA MIGRATORIA</label>
            <input type="text " class="form-control input-lg
                                       " id="formaMigratoria" name="formaMigratoria" placeholder="Forma Migratoria ">
            <span id="helpFormaMigratoria" class="help-block-yellow "></span>
            <script>
                $("#formaMigratoria").bind('input propertychange', function(){
                    validar("texto", "formaMigratoria", "helpFormaMigratoria", 40);
                });
            </script>
        </div>
        <div class="form-group " id="form-sexo">
            <label for="sexo " class="control-label
                                      " style="color: white; ">SEXO</label>
            <select class="form-control input-lg" name="sexo">
                <option value="">Escoge sexo</option>
                <option value="ma">Masculino</option>
                <option value="fe">Femenino</option>
            </select>
            <span id="helpSexo" class="help-block-yellow "></span>
        </div>
        <div class="form-group " id="form-estadoCivil">
            <label for="estadoCivil " class="control-label
                                             " style="color: white; ">ESTADO CIVIL</label>
            <input type="text " class="form-control input-lg
                                       " id="estadoCivil" name="estadoCivil" placeholder="Estado Civil">
            <span id="helpEstadoCivil" class="help-block-yellow "></span>
            <script>
                $("#estadoCivil").bind('input propertychange', function(){
                    validar("texto", "estadoCivil", "helpEstadoCivil", 30);
                });
            </script>
        </div>
        <div class="form-group " id="form-tipoSange">
            <label for="tipoSange" class="control-label
                                          " style="color: white; ">TIPO DE SANGRE</label>
            <select class="form-control input-lg" name="tipoSangre">
                <option value="">Tipo de sangre</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </select>
            <span id="helpTipoSangre" class="help-block-yellow "></span>
        </div>
        <div class="form-group " id="form-domicilioPersonal">
            <label for="domicilioPersonal" class="control-label
                                                  " style="color: white; ">DOMICILIO PERSONAL</label>
            <input type="text " class="form-control input-lg" id="domicilioPersonal"
                   name="domicilioPersonal" placeholder="Domicilio personal">
            <span id="helpDomicilioPersonal" class="help-block-yellow"></span>
            <script>
                $("#domicilioPersonal").bind('input propertychange', function(){
                    validar("alfanumericoEspacio", "domicilioPersonal", "helpDomicilioPersonal", 255);
                });
            </script>
        </div>
        <div class="form-group " id="form-colonia">
            <label for="colonia" class="control-label
                                        " style="color: white; ">COLONIA</label>
            <input type="text " class="form-control input-lg
                                       " id="colonia" name="colonia" placeholder="Colonia">
            <span id="helpColonia" class="help-block-yellow "></span>
            <script>
                $("#colonia").bind('input propertychange', function(){
                    validar("texto", "colonia", "helpColonia", 200);
                });
            </script>
        </div>
        <div class="form-group " id="form-codigoPostal">
            <label for="" class="control-label
                                 " style="color: white; ">CODIGO POSTAL</label>
            <input type="text " class="form-control input-lg
                                       " id="cp" name="cp" placeholder="Codigo postal">
            <span id="helpCp" class="help-block-yellow "></span>
            <script>
                $("#cp").bind('input propertychange', function(){
                    validar("numero", "cp", "helpCp", 6);
                });
            </script>
        </div>
        <div class="form-group " id="form-municipio">
            <label for="municipio" class="control-label
                                          " style="color: white; ">MUNICIPIO</label>
            <input type="text " class="form-control input-lg
                                       " id="municipio" name="municipio" placeholder="Municipio">
            <span id="helpMunicipio" class="help-block-yellow "></span>
            <script>
                $("#municipio").bind('input propertychange', function(){
                    validar("texto", "municipio", "helpMunicipio", 150);
                });
            </script>
        </div>
        <div class="form-group " id="form-estado">
            <label for="estado" class="control-label
                                       " style="color: white; ">ESTADO</label>
            <input type="text " class="form-control input-lg
                                       " id="estado" name="estado" placeholder="Estado">
            <span id="helpEstado" class="help-block-yellow "></span>
            <script>
                $("#estado").bind('input propertychange', function(){
                    validar("texto", "estado", "helpEstado", 150);
                });
            </script>
        </div>
        <div class="form-group " id="form-telParticular">
            <label for="telefonoParticular" class="control-label
                                                   " style="color: white; ">TELEFONO PARTICULAR</label>
            <input type="text " class="form-control input-lg
                                       " id="telParticular" name="telParticular" placeholder="Telefono particular">
            <span id="helpTelParticular" class="help-block-yellow "></span>
            <script>
                $("#telParticular").bind('input propertychange', function(){
                    validar("numero", "telParticular", "helpTelParticular", 10);
                });
            </script>
        </div>
        <div class="form-group " id="form-TelOficina">
            <label for="" class="control-label
                                 " style="color: white; ">TELEFONO OFICINA</label>
            <input type="text " class="form-control input-lg
                                       " id="telOficina" name="telOficina" placeholder="Telefono oficina">
            <span id="helpTelOficina" class="help-block-yellow "></span>
            <script>
                $("#telOficina").bind('input propertychange', function(){
                    validar("numero", "telOficina", "helpTelOficina", 10);
                });
            </script>
        </div>
        <div class="form-group " id="form-celular">
            <label for="" class="control-label
                                 " style="color: white; ">CELULAR</label>
            <input type="text " class="form-control input-lg
                                       " id="celular" name="celular" placeholder="Celular">
            <span id="helpCelular" class="help-block-yellow "></span>
            <script>
                $("#celular").bind('input propertychange', function(){
                    validar("numero", "celular", "helpCelular", 10);
                });
            </script>
        </div>
        <div class="form-group " id="form-email">
            <label for="email" class="control-label
                                      " style="color: white; ">CORREO ELECTRONICO</label>
            <input type="text " class="form-control input-lg
                                       " id="email" name="email" placeholder="Corre electronico">
            <span id="helpEmail" class="help-block-yellow "></span>
            <script>
                $("#email").bind('input propertychange', function(){
                    validar("email", "email", "helpEmail", 60);
                });
            </script>
        </div>
        <div class="form-group " id="form-curp">
            <label for="curp" class="control-label
                                     " style="color: white; ">CURP</label>
            <input type="text " class="form-control input-lg
                                       " id="curp" name="curp" placeholder="CURP">
            <span id="helpCurp" class="help-block-yellow "></span>
            <script>
                $("#curp").bind('input propertychange', function(){
                    validar("alfanumerico", "curp", "helpCurp", 18);
                });
            </script>
        </div>
        <div class="form-group " id="form-rfc">
            <label for="rfc" class="control-label
                                    " style="color: white; ">RFC</label>
            <input type="text " class="form-control input-lg
                                       " id="rfc" name="rfc" placeholder="RFC">
            <span id="helpRfc" class="help-block-yellow "></span>
            <script>
                $("#rfc").bind('input propertychange', function(){
                    validar("alfanumerico", "rfc", "helpRfc", 13);
                });
            </script>
        </div>
        <div class="form-group " id="form-imss">
            <label for="imss" class="control-label
                                     " style="color: white; ">IMSS</label>
            <input type="text " class="form-control input-lg
                                       " id="imss" name="imss" placeholder="IMSS">
            <span id="helpImss" class="help-block-yellow "></span>
            <script>
                $("#imss").bind('input propertychange', function(){
                    validar("numero", "imss", "helpImss", 12);
                });
            </script>
        </div>
        <div class="form-group " id="form-numAfore">
            <label for="numAfore" class="control-label
                                         " style="color: white; ">NUMERO DE AFORE</label>
            <input type="text " class="form-control input-lg
                                       " id="numAfore" name="numAfore" placeholder="Numero de Afore">
            <span id="helpNumAfore" class="help-block-yellow "></span>
            <script>
                $("#numAfore").bind('input propertychange', function(){
                    validar("numero", "numAfore", "helpNumAfore", 30);
                });
            </script>
        </div>
        <div class="form-group " id="form-afore">
            <label for="afore" class="control-label
                                      " style="color: white; ">AFORE</label>
            <input type="text " class="form-control input-lg
                                       " id="afore" name="afore" placeholder="Afore">
            <span id="helpAfore" class="help-block-yellow "></span>
            <script>
                $("#afore").bind('input propertychange', function(){
                    validar("texto", "afore", "helpAfore", 80);
                });
            </script>
        </div>
        <div class="form-group " id="form-dependencia">
            <label for="dependencia" class="control-label
                                            " style="color: white; ">DEPENDENCIA O ADSCRIPCIÓN</label>
            <input type="text " class="form-control input-lg
                                       " id="dependencia" name="dependencia" placeholder="Dependencia" value="División de Electrónica y Computación">
            <span id="helpDependencia" class="help-block-yellow "></span>
            <script>
                $("#dependencia").bind('input propertychange', function(){
                    validar("texto", "dependencia", "helpDependencia", 255);
                });
            </script>
        </div>
        <div class="form-group " id="form-tipoContrato">
            <label for="tipoContrato" class="control-label
                                          " style="color: white; ">TIPO DE CONTRATO</label>
            <select class="form-control input-lg" name="tipoContrato">
                <option value="">Tipo de contrato</option>
                <option value="Docente">Docente</option>
                <option value="Investigador">Investigador</option>
                <option value="Técnico academico">Técnico academico</option>
            </select>
            <span id="helpTipoContrato" class="help-block-yellow "></span>
        </div>
        <div class="form-group " id="form-administrativo">
            <label for="administrativo" class="control-label
                                          " style="color: white; ">ADMINISTRATIVO</label>
            <select class="form-control input-lg" name="administrativo">
                <option value="">Elegir administrativo</option>
                <option value="Directivo">Directivo</option>
                <option value="Sindicalizado">Sindicalizado</option>
            </select>
            <span id="helpAdministrativo" class="help-block-yellow "></span>
        </div>
        <div class="form-group " id="form-directivo">
            <label for="directivo" class="control-label
                                          " style="color: white; ">DIRECTIVO</label>
            <select class="form-control input-lg" name="directivo">
                <option value="">Elegir directivo</option>
                <option value="Mando medio">Mando medio</option>
                <option value="Funcionario">Funcionario</option>
            </select>
            <span id="helpDirectivo" class="help-block-yellow "></span>
        </div>
        <div class="form-group " id="form-categoria">
            <label for="categoria" class="control-label
                                          " style="color: white; ">CATEGORIA	</label>
            <input type="text " class="form-control input-lg
                                       " id="categoria" name="categoria" placeholder="Categoria">
            <span id="helpCategoria" class="help-block-yellow "></span>
            <script>
                $("#categoria").bind('input propertychange', function(){
                    validar("texto", "categoria", "helpCategoria", 60);
                });
            </script>
        </div>
        <div class="form-group " id="form-cargaHoraria">
            <label for="cargaHoraria" class="control-label
                                             " style="color: white; ">CARGA HORARIA</label>
            <input type="text " class="form-control input-lg
                                       " id="cargaHoraria" name="cargaHoraria" placeholder="Carga horaria">
            <span id="helpCargaHoraria" class="help-block-yellow "></span>
            <script>
                $("#cargaHoraria").bind('input propertychange', function(){
                    validar("numero", "cargaHoraria", "helpCargaHoraria", 2);
                });
            </script>
        </div>
        <div class="form-group " id="form-aniosAntiguedad">
            <label for="aniosAntiguedad" class="control-label
                                                " style="color: white; ">AÑOS ANTIGÜEDAD</label>
            <input type="text " class="form-control input-lg
                                       " id="aniosAntiguedad" name="aniosAntiguedad" placeholder="Años antigüedad">
            <span id="helpAniosAntiguedad" class="help-block-yellow "></span>
            <script>
                $("#aniosAntiguedad").bind('input propertychange', function(){
                    validar("numero", "aniosAntiguedad", "helpAniosAntiguedad", 2);
                });
            </script>
        </div>
        <div class="form-group " id="form-creditoInfonavit">
            <label for="creditoInfonavit" class="control-label
                                                 " style="color: white; ">CREDITO INFONAVIT</label>
            <select class="form-control input-lg" name="creditoInfonavit">
                <option value="">Elige opción</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
            </select>
            <span id="helpCreditoInfonavid" class="help-block-yellow "></span>
        </div>
        <div class="form-group " id="form-ingresoAdicional">
            <label for="ingresoAdicional" class="control-label
                                                 " style="color: white; ">INGRESO ADICIONAL</label>
            <select class="form-control input-lg" name="ingresoAdicional">
                <option value="">Elige opción</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
            </select>
            <span id="helpIngresoAdicional" class="help-block-yellow "></span>
        </div>

        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="sinEstudios" value="S">
                    <label for="sinEstudios" class="control-label
                                                    " style="color: white; ">SIN ESTUDIOS</label>
                </label>
            </div>
        </div>
        <script>
                    var campoSinEstudios = $("input[name='sinEstudios']");
                    campoSinEstudios.change(function(){
                        comprobarEstadoCheckboxNivelEstudios(campoSinEstudios);
                    });
                    campoSinEstudios.ready(function(){
                        comprobarEstadoCheckboxNivelEstudios(campoSinEstudios);
                    });
                </script>
        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="primaria" value="S">
                    <label for="primaria" class="control-label
                                                 " style="color: white; ">PRIMARIA</label>
                </label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="secundaria" value="S">
                    <label for="secundaria" class="control-label
                                                   " style="color: white; ">SECUNDARIA</label>
                </label>
            </div>
        </div><div class="col-sm-4">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="bachillerato" value="S">
                <label for="bachillerato" class="control-label
                                                 " style="color: white; ">BACHILLERATO</label>
            </label>
        </div>
        </div>
        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="bachilleratoTec" value="S">
                    <label for="bachilleratoTec" class="control-label
                                                        " style="color: white; ">BACH. TECNICO</label>
                </label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="postTecnico" value="S">
                    <label for="postTecnico" class="control-label
                                                    " style="color: white; ">POST-TECNICO</label>
                </label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="tecnico" value="S">
                    <label for="tecnico" class="control-label
                                                " style="color: white; ">TECNICO</label>
                </label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="tecnicoProfesional" value="S">
                    <label for="tecnicoProfesional" class="control-label
                                                           " style="color: white; ">TECNICO PROFESIONAL</label>
                </label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="tecnicoSinBachillerato" value="S">
                    <label for="tecnicoSinBachillerato" class="control-label
                                                               " style="color: white; ">TEC. SIN BACHILLERATO</label>
                </label>
            </div>
        </div><div class="col-sm-4">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="tecnicoConBachillerato" value="S">
                <label for="tecnicoConBachillerato" class="control-label
                                                           " style="color: white; ">TEC. CON BACHILLERATO</label>
            </label>
        </div>
        </div>
        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="normal" value="S">
                    <label for="normal" class="control-label
                                               " style="color: white; ">NORMAL</label>
                </label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="maestria" value="S">
                    <label for="maestria" class="control-label
                                                 " style="color: white; ">MAESTRIA</label>
                </label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="doctorado" value="S">
                    <label for="doctorado" class="control-label
                                                  " style="color: white; ">DOCTORADO</label>
                </label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="especialidad" value="S">
                    <label for="especialidad" class="control-label
                                                     " style="color: white; ">ESPECIALIDAD</label>
                </label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="licenciatura" value="S">
                    <label for="licenciatura" class="control-label  
                                                     " style="color: white; ">LICENCIATURA</label>
                </label>
            </div>
        </div>

        <label for="" class="control-label
                             " style="color: white; ">EN CASO DE ACCIDENTE AVISAR A:</label>
        <div class="form-group " id="form-nombreAvisar">
            <label for="" class="control-label
                                 " style="color: white; ">NOMBRE</label>
            <input type="text " class="form-control input-lg
                                       " id="nombreAvisar" name="nombreAvisar" placeholder="Nombre">
            <span id="helpNombreAvisar" class="help-block-yellow "></span>
            <script>
                $("#nombreAvisar").bind('input propertychange', function(){
                    validar("texto", "nombreAvisar", "helpNombreAvisar", 60);
                });
            </script>
        </div>
        <div class="form-group " id="form-parentescoAvisar">
            <label for="parentescoAvisar" class="control-label
                                                 " style="color: white; ">PARENTESCO</label>
            <input type="text " class="form-control input-lg
                                       " id="parentescoAvisar" name="parentescoAvisar" placeholder="Parentesco">
            <span id="helpParentescoAvisar" class="help-block-yellow "></span>
            <script>
                $("#parentescoAvisar").bind('input propertychange', function(){
                    validar("texto", "parentescoAvisar", "helpParentescoAvisar", 60);
                });
            </script>
        </div>
        <div class="form-group " id="form-telefonoAvisar">
            <label for="telefonoAvisar" class="control-label
                                               " style="color: white; ">TELEFONO</label>
            <input type="text " class="form-control input-lg
                                       " id="telefonoAvisar" name="telefonoAvisar" placeholder="Telefono">
            <span id="helpTelefonoAvisar" class="help-block-yellow "></span>
            <script>
                $("#telefonoAvisar").bind('input propertychange', function(){
                    validar("numero", "telefonoAvisar", "helpTelefonoAvisar", 10);
                });
            </script>
        </div>
    </div>
</div>