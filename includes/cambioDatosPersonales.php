<div class="row ">
    <div class="col-md-10 " style="margin: 0 auto; float: none; ">
        <div class="form-group " id="form-codigo">
            <label for="codigo" class="control-label" style="color:white; ">CODIGO</label>
            <input type="text" class="form-control input-lg
                                      " id="codigo" name="codigo" placeholder="Código" value="<?php echo $row["codigo"];?>" readonly>
            <span id="helpCodigo" class="help-block-yellow"></span>
			<script>
                $("#codigo").bind('input propertychange', function(){
                    validar("numero", "codigo", "helpCodigo", 8);
                });
            </script>
        </div>
        <div class="form-group" id="form-nombre">
            <label for="nombre" style="color: white; " class="control-label ">NOMBRE</label>
            <input type="text" class="form-control input-lg" id="nombre" name="nombre" placeholder="Nombre(s) "
                                    value="<?php echo $row["nombre"];?>">
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
                                              " id="apellidoPaterno" name="apellidoPaterno" placeholder="Apellido Paterno "
                                                 value="<?php echo $row["apellidoPaterno"];?>">
                    <span id="helpPaterno" class="help-block-yellow "></span>
					<script>
                    $("#apellidoPaterno").bind('input propertychange', function(){
                        validar("texto", "apellidoPaterno", "helpPaterno", 40);
                    });
                </script>
                </div>
            </div>
            <div class="col-sm-6 ">
                <div class="form-group" id="form-apellidoMaterno">
                    <label for="apellidoMaterno " style="color: white; ">APELLIDO MATERNO</label>
                    <input type="text" class="form-control input-lg
                                              " id="apellidoMaterno" name="apellidoMaterno" placeholder="Apellido Materno "
                                                 value="<?php echo $row["apellidoMaterno"];?>">
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
                                      " id="lugarNacimiento" name="lugarNacimiento" placeholder="Lugar de Nacimiento "
                                         value="<?php echo $row["lugarNacimiento"];?>">
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
                        <?php 
                        global $row;
                        agregaSelectRangoSeleccionado(1, 31, explode("-",$row["fechaNacimiento"])[2]);
                        ?>
                    </select>
                    <span id="helpDia-fechaNacimiento" class="help-block-yellow "></span>
                </div>
            </div>
            <div class="col-md-5 ">
                <div class="form-group " id="form-mes-fechaNacimiento">
                    <label for="mes-fechaNacimiento " style="color: white; ">MES</label>
                    <select class="form-control input-lg " id="mes-fechaNacimiento" name="mes-fechaNacimiento">
                        <?php mostrarMeses($row, "fechaNacimiento") ?>
                    </select>
                    <span id="helpMes-fechaNacimiento" class="help-block-yellow "></span>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="form-group" id="form-anio-fechaNacimiento ">
                    <label for="anio-fechaNacimiento " style="color:
                                                              white; ">AŃO</label>
                    <select class="form-control input-lg " id="anio-fechaNacimiento" name="anio-fechaNacimiento">
                        <?php 
                        global $row;
                        agregaSelectRangoSeleccionado(1900, 2016, explode("-",$row["fechaNacimiento"])[0]);
                        ?>
                    </select>
                    <span id="helpAnio-fechaNacimiento " class="help-block-yellow "></span>
                </div>
            </div>
        </div>
        <div class="form-group " id="form-nacionalidad">
            <label for="nacionalidad " class="control-label
                                              " style="color: white; ">NACIONALIDAD</label>
            <input type="text " class="form-control input-lg
                                       " id="nacionalidad" name="nacionalidad" placeholder="Nacionalidad"
                                         value="<?php echo $row["nacionalidad"];?>">
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
                                       " id="formaMigratoria" name="formaMigratoria" placeholder="Forma Migratoria "
                                        value="<?php echo $row["formaMigratoria"];?>">
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
                <?php estaActivo("option", "", "", "", "Escoge sexo")?>
                <?php estaActivo("option", "", "ma", $row["sexo"], "Masculino")?>
                <?php estaActivo("option", "", "fe", $row["sexo"], "Femenino")?>
            </select>
            <span id="helpSexo" class="help-block-yellow "></span>
        </div>
        <div class="form-group " id="form-estadoCivil">
            <label for="estadoCivil " class="control-label
                                             " style="color: white; ">ESTADO CIVIL</label>
            <input type="text " class="form-control input-lg
                                       " id="estadoCivil" name="estadoCivil" placeholder="Estado Civil"
                                        value="<?php echo $row["estadoCivil"];?>">
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
                <?php estaActivo("option", "", "", "", "Tipo de sangre")?>
                <?php estaActivo("option", "", "A+", $row["tipoSangre"], "A+")?>
                <?php estaActivo("option", "", "A-", $row["tipoSangre"], "A-")?>
                <?php estaActivo("option", "", "B+", $row["tipoSangre"], "B+")?>
                <?php estaActivo("option", "", "B-", $row["tipoSangre"], "B-")?>
                <?php estaActivo("option", "", "AB+", $row["tipoSangre"], "AB+")?>
                <?php estaActivo("option", "", "AB-", $row["tipoSangre"], "AB-")?>
                <?php estaActivo("option", "", "O+", $row["tipoSangre"], "O+")?>
                <?php estaActivo("option", "", "O-", $row["tipoSangre"], "O-")?>
            </select>
            <span id="helpTipoSangre" class="help-block-yellow "></span>
        </div>
        <div class="form-group " id="form-domicilioPersonal">
            <label for="domicilioPersonal" class="control-label
                                                  " style="color: white; ">DOMICILIO PERSONAL</label>
            <input type="text " class="form-control input-lg" id="domicilioPersonal"
                   name="domicilioPersonal" placeholder="Domicilio personal" value="<?php echo $row["domicilioPersonal"];?>">
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
                                       " id="colonia" name="colonia" placeholder="Colonia" value="<?php echo $row["colonia"];?>">
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
                                       " id="cp" name="cp" placeholder="Codigo postal" value="<?php echo $row["cp"];?>">
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
                                       " id="municipio" name="municipio" placeholder="Municipio" value="<?php echo $row["municipio"];?>">
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
                                       " id="estado" name="estado" placeholder="Estado" value="<?php echo $row["estado"];?>">
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
                                       " id="telParticular" name="telParticular" placeholder="Telefono particular"
                                        value="<?php echo $row["telParticular"];?>">
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
                                       " id="telOficina" name="telOficina" placeholder="Telefono oficina"
                                        value="<?php echo $row["telOficina"];?>">
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
                                       " id="celular" name="celular" placeholder="Celular" value="<?php echo $row["celular"];?>">
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
                                       " id="email" name="email" placeholder="Corre electronico"
                                        value="<?php echo $row["email"];?>">
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
                                       " id="curp" name="curp" placeholder="CURP" value="<?php echo $row["curp"];?>">
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
                                       " id="rfc" name="rfc" placeholder="RFC" value="<?php echo $row["rfc"];?>">
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
                                       " id="imss" name="imss" placeholder="IMSS" value="<?php echo $row["imss"];?>">
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
                                       " id="numAfore" name="numAfore" placeholder="Numero de Afore"
                                        value="<?php echo $row["numAfore"];?>">
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
                                       " id="afore" name="afore" placeholder="Afore" value="<?php echo $row["afore"];?>">
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
                                       " id="dependencia" name="dependencia" placeholder="Dependencia"
                                        value="<?php echo $row["dependencia"];?>">
            <span id="helpDependencia" class="help-block-yellow "></span>
			<script>
                $("#dependencia").bind('input propertychange', function(){
                    validar("texto", "dependencia", "helpDependencia", 255);
                });
            </script>
        </div>
        <div class="form-group " id="form-tipoContrato">
            <label for="tipoContrato " class="control-label
                                      " style="color: white; ">TIPO DE CONTRATO</label>
            <select class="form-control input-lg" name="tipoContrato">
                <?php estaActivo("option", "", "", "", "Tipo de contrato")?>
                <?php estaActivo("option", "", "Docente", $row["tipoContrato"], "Docente")?>
                <?php estaActivo("option", "", "Investigador", $row["tipoContrato"], "Investigador")?>
                <?php estaActivo("option", "", "Técnico academico", $row["tipoContrato"], "Técnico academico")?>
            </select>
            <span id="helpTipoContrato" class="help-block-yellow "></span>
        </div>
        <div class="form-group " id="form-administrativo">
            <label for="administrativo " class="control-label
                                      " style="color: white; ">ADMINISTRATIVO</label>
            <select class="form-control input-lg" name="administrativo">
                <?php estaActivo("option", "", "", "", "Elegir administrativo")?>
                <?php estaActivo("option", "", "Directivo", $row["administrativo"], "Directivo")?>
                <?php estaActivo("option", "", "Sindicalizado", $row["administrativo"], "Sindicalizado")?>
            </select>
            <span id="helpAdministrativo" class="help-block-yellow "></span>
        </div>
        <div class="form-group " id="form-directivo">
            <label for="directivo " class="control-label
                                      " style="color: white; ">DIRECTIVO</label>
            <select class="form-control input-lg" name="directivo">
                <?php estaActivo("option", "", "", "", "Elegir directivo")?>
                <?php estaActivo("option", "", "Mando medio", $row["directivo"], "Mando medio")?>
                <?php estaActivo("option", "", "Funcionario", $row["directivo"], "Funcionario")?>
            </select>
            <span id="helpDirectivo" class="help-block-yellow "></span>
        </div>
        <div class="form-group " id="form-categoria">
            <label for="categoria" class="control-label
                                          " style="color: white; ">CATEGORIA	</label>
            <input type="text " class="form-control input-lg
                                       " id="categoria" name="categoria" placeholder="Categoria"
                                        value="<?php echo $row["categoria"];?>">
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
                                       " id="cargaHoraria" name="cargaHoraria" placeholder="Carga horaria"
                                        value="<?php echo $row["cargaHoraria"];?>">
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
                                       " id="aniosAntiguedad" name="aniosAntiguedad" placeholder="Años antigüedad"
                                        value="<?php echo $row["aniosAntiguedad"];?>">
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
                <?php estaActivo("option", "", "", "", "Elige opción")?>
                <?php estaActivo("option", "", "Si", $row["creditoInfonavit"], "Si")?>
                <?php estaActivo("option", "", "No", $row["creditoInfonavit"], "No")?>
            </select>
            <span id="helpCreditoInfonavid" class="help-block-yellow "></span>
        </div>
        <div class="form-group " id="form-ingresoAdicional">
            <label for="ingresoAdicional" class="control-label
                                                 " style="color: white; ">INGRESO ADICIONAL</label>
            <select class="form-control input-lg" name="ingresoAdicional">
                <?php estaActivo("option", "", "", "", "Elige opción")?>
                <?php estaActivo("option", "", "Si", $row["ingresoAdicional"], "Si")?>
                <?php estaActivo("option", "", "No", $row["ingresoAdicional"], "No")?>
            </select>
            <span id="helpIngresoAdicional" class="help-block-yellow "></span>
        </div>

        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <?php estaActivo("checkbox", "sinEstudios", "S", $row['sinEstudios'], "SIN ESTUDIOS");?>
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
                    <?php estaActivo("checkbox", "primaria", "S", $row['primaria'], "PRIMARIA");?>
                </label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <?php estaActivo("checkbox", "secundaria", "S", $row['secundaria'], "SECUNDARIA");?>
                </label>
            </div>
        </div><div class="col-sm-4">
        <div class="checkbox">
            <label>
                <?php estaActivo("checkbox", "bachillerato", "S", $row['bachillerato'], "BACHILLERATO");?>
            </label>
        </div>
        </div>
        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <?php estaActivo("checkbox", "bachilleratoTec", "S", $row['bachilleratoTec'], "BACH. TECNICO");?>
                </label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <?php estaActivo("checkbox", "postTecnico", "S", $row['postTecnico'], "POST-TECNICO");?>
                </label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <?php estaActivo("checkbox", "tecnico", "S", $row['tecnico'], "TECNICO");?>
                </label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <?php estaActivo("checkbox", "tecnicoProfesional", "S", $row['tecnicoProfesional'], "TECNICO PROFESIONAL");?>
                </label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <?php estaActivo("checkbox", "tecnicoSinBachillerato", "S", $row['tecnicoSinBachillerato'], "TEC. SIN BACHILLERATO");?>
                </label>
            </div>
        </div><div class="col-sm-4">
        <div class="checkbox">
            <label>
                <?php estaActivo("checkbox", "tecnicoConBachillerato", "S", $row['tecnicoConBachillerato'], "TEC. CON BACHILLERATO");?>
            </label>
        </div>
        </div>
        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <?php estaActivo("checkbox", "normal", "S", $row['normal'], "NORMAL");?>
                </label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <?php estaActivo("checkbox", "maestria", "S", $row['maestria'], "MAESTRIA");?>
                </label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <?php estaActivo("checkbox", "doctorado", "S", $row['doctorado'], "DOCTORADO");?>
                </label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <?php estaActivo("checkbox", "especialidad", "S", $row['especialidad'], "ESPECIALIDAD");?>
                </label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <?php estaActivo("checkbox", "licenciatura", "S", $row['licenciatura'], "LICENCIATURA");?>
                </label>
            </div>
        </div>

        <label for="" class="control-label
                             " style="color: white; ">EN CASO DE ACCIDENTE AVISAR A:</label>
        <div class="form-group " id="form-nombreAvisar">
            <label for="" class="control-label
                                 " style="color: white; ">NOMBRE</label>
            <input type="text " class="form-control input-lg
                                       " id="nombreAvisar" name="nombreAvisar" placeholder="Nombre"
                                        value="<?php echo $row["nombreAvisar"];?>">
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
                                       " id="parentescoAvisar" name="parentescoAvisar" placeholder="Parentesco"
                                        value="<?php echo $row["parentescoAvisar"];?>">
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
                                       " id="telefonoAvisar" name="telefonoAvisar" placeholder="Telefono"
                                        value="<?php echo $row["telefonoAvisar"];?>">
            <span id="helpTelefonoAvisar" class="help-block-yellow "></span>
			<script>
                $("#telefonoAvisar").bind('input propertychange', function(){
                    validar("numero", "telefonoAvisar", "helpTelefonoAvisar", 10);
                });
            </script>
        </div>
    </div>
</div>