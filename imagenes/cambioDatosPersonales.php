<div class="row ">
    <div class="col-md-10 " style="margin: 0 auto; float: none; ">
        <div class="form-group " id="form-codigo">
            <label for="codigo" class="control-label" style="color:white; ">CÓDIGO</label>
            <input type="text" class="form-control input-lg
                                      " id="codigo" name="codigo" placeholder="Código" value="<?php echo $row["codigo"];?>">
            <span id="helpCodigo" class="help-block"></span>
        </div>
        <div class="form-group" id="form-nombre">
            <label for="nombre" style="color: white; " class="control-label ">NOMBRE</label>
            <input type="text" class="form-control input-lg" id="nombre" name="nombre" placeholder="Nombre(s) "
                                    value="<?php echo $row["nombre"];?>">
            <span id="helpNombre" class="help-block "></span>
        </div>
        <div class="row ">
            <div class="col-sm-6 ">
                <div class="form-group has-feedback " id="form-apellidoPaterno">
                    <label for="apellidoPaterno" style="color: white; ">APELLIDO PATERNO</label>
                    <input type="text" class="form-control input-lg
                                              " id="apellidoPaterno" name="apellidoPaterno" placeholder="Apellido Paterno "
                                                 value="<?php echo $row["apellidoPaterno"];?>">
                    <span id="helpPaterno" class="help-block "></span>
                </div>
            </div>
            <div class="col-sm-6 ">
                <div class="form-group" id="form-apellidoMaterno">
                    <label for="apellidoMaterno " style="color: white; ">APELLIDO MATERNO</label>
                    <input type="text" class="form-control input-lg
                                              " id="apellidoMaterno" name="apellidoMaterno" placeholder="Apellido Materno "
                                                 value="<?php echo $row["apellidoMaterno"];?>">
                    <span id="helpMaterno" class="help-block"></span>
                </div>
            </div>
        </div>
        <div class="form-group" id="form-lugarNacimiento">
            <label for="lugarNacimiento " class="control-label
                                                 " style="color: white; ">LUGAR DE NACIMIENTO</label>
            <input type="text" class="form-control input-lg
                                      " id="lugarNacimiento" name="lugarNacimiento" placeholder="Lugar de Nacimiento "
                                         value="<?php echo $row["lugarNacimiento"];?>">
            <span id="helpLugarNacimiento" class="help-block "></span>
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
                    <span id="helpDia-fechaNacimiento" class="help-block "></span>
                </div>
            </div>
            <div class="col-md-5 ">
                <div class="form-group " id="form-mes-fechaNacimiento">
                    <label for="mes-fechaNacimiento " style="color: white; ">MES</label>
                    <select class="form-control input-lg " id="mes-fechaNacimiento" name="mes-fechaNacimiento">
                        <?php mostrarMeses("fechaNacimiento") ?>
                    </select>
                    <span id="helpMes-fechaNacimiento" class="help-block "></span>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="form-group" id="form-anio-fechaNacimiento ">
                    <label for="anio-fechaNacimiento " style="color:
                                                              white; ">AŃO</label>
                    <select class="form-control input-lg " id="anio-fechaNacimiento" name="anio-fechaNacimiento">
                        <?php 
                        global $row;
                        agregaSelectRangoSeleccionado(1940, 2016, explode("-",$row["fechaNacimiento"])[0]);
                        ?>
                    </select>
                    <span id="helpAnio-fechaNacimiento " class="help-block "></span>
                </div>
            </div>
        </div>
        <div class="form-group " id="form-nacionalidad">
            <label for="nacionalidad " class="control-label
                                              " style="color: white; ">NACIONALIDAD</label>
            <input type="text " class="form-control input-lg
                                       " id="nacionalidad" name="nacionalidad" placeholder="Nacionalidad"
                                         value="<?php echo $row["nacionalidad"];?>">
            <span id="helpNacionalidad" class="help-block "></span>
        </div>
        <div class="form-group " id="form-formaMigratoria">
            <label for="formaMigratoria" class="control-label
                                                " style="color: white; ">FORMA MIGRATORIA</label>
            <input type="text " class="form-control input-lg
                                       " id="formaMigratoria" name="formaMigratoria" placeholder="Forma Migratoria "
                                        value="<?php echo $row["formaMigratoria"];?>">
            <span id="helpFormaMigratoria" class="help-block "></span>
        </div>
        <div class="form-group " id="form-sexo">
            <label for="sexo " class="control-label
                                      " style="color: white; ">SEXO</label>
            <select class="form-control input-lg" name="sexo">
                <?php estaActivo("option", "", "", "", "Escoge sexo")?>
                <?php estaActivo("option", "", "ma", $row["sexo"], "Masculino")?>
                <?php estaActivo("option", "", "fe", $row["sexo"], "Femenino")?>
            </select>
            <span id="helpSexo" class="help-block "></span>
        </div>
        <div class="form-group " id="form-estadoCivil">
            <label for="estadoCivil " class="control-label
                                             " style="color: white; ">ESTADO CIVIL</label>
            <input type="text " class="form-control input-lg
                                       " id="estadoCivil" name="estadoCivil" placeholder="Estado Civil"
                                        value="<?php echo $row["estadoCivil"];?>">
            <span id="helpEstadoCivil" class="help-block "></span>										 
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
            <span id="helpTipoSangre" class="help-block "></span>
        </div>
        <div class="form-group " id="form-domicilioPersonal">
            <label for="domicilioPersonal" class="control-label
                                                  " style="color: white; ">DOMICILIO PERSONAL</label>
            <input type="text " class="form-control input-lg" id="domicilioPersonal"
                   name="domicilioPersonal" placeholder="Domicilio personal" value="<?php echo $row["domicilioPersonal"];?>">
            <span id="helpDomicilioPersonal" class="help-block"></span>
        </div>
        <div class="form-group " id="form-colonia">
            <label for="colonia" class="control-label
                                        " style="color: white; ">COLONIA</label>
            <input type="text " class="form-control input-lg
                                       " id="colonia" name="colonia" placeholder="Colonia" value="<?php echo $row["colonia"];?>">
            <span id="helpColonia" class="help-block "></span>
        </div>
        <div class="form-group " id="form-codigoPostal">
            <label for="" class="control-label
                                 " style="color: white; ">CODIGO POSTAL</label>
            <input type="text " class="form-control input-lg
                                       " id="cp" name="cp" placeholder="Codigo postal" value="<?php echo $row["cp"];?>">
            <span id="helpCp" class="help-block "></span>
        </div>
        <div class="form-group " id="form-municipio">
            <label for="municipio" class="control-label
                                          " style="color: white; ">MUNICIPIO</label>
            <input type="text " class="form-control input-lg
                                       " id="municipio" name="municipio" placeholder="Municipio" value="<?php echo $row["municipio"];?>">
            <span id="helpMunicipio" class="help-block "></span>
        </div>
        <div class="form-group " id="form-estado">
            <label for="estado" class="control-label
                                       " style="color: white; ">ESTADO</label>
            <input type="text " class="form-control input-lg
                                       " id="estado" name="estado" placeholder="Estado" value="<?php echo $row["estado"];?>">
            <span id="helpEstado" class="help-block "></span>
        </div>
        <div class="form-group " id="form-telParticular">
            <label for="telefonoParticular" class="control-label
                                                   " style="color: white; ">TELEFONO PARTICULAR</label>
            <input type="text " class="form-control input-lg
                                       " id="telParticular" name="telParticular" placeholder="Telefono particular"
                                        value="<?php echo $row["telParticular"];?>">
            <span id="helpTelParticular" class="help-block "></span>
        </div>
        <div class="form-group " id="form-TelOficina">
            <label for="" class="control-label
                                 " style="color: white; ">TELEFONO OFICINA</label>
            <input type="text " class="form-control input-lg
                                       " id="telOficina" name="telOficina" placeholder="Telefono oficina"
                                        value="<?php echo $row["telOficina"];?>">
            <span id="helpTelOficina" class="help-block "></span>
        </div>
        <div class="form-group " id="form-celular">
            <label for="" class="control-label
                                 " style="color: white; ">CELULAR</label>
            <input type="text " class="form-control input-lg
                                       " id="celular" name="celular" placeholder="Celular" value="<?php echo $row["celular"];?>">
            <span id="helpCelular" class="help-block "></span>
        </div>
        <div class="form-group " id="form-email">
            <label for="email" class="control-label
                                      " style="color: white; ">CORREO ELECTRONICO</label>
            <input type="text " class="form-control input-lg
                                       " id="email" name="email" placeholder="Corre electronico"
                                        value="<?php echo $row["email"];?>">
            <span id="helpEmail" class="help-block "></span>
        </div>
        <div class="form-group " id="form-curp">
            <label for="curp" class="control-label
                                     " style="color: white; ">CURP</label>
            <input type="text " class="form-control input-lg
                                       " id="curp" name="curp" placeholder="CURP" value="<?php echo $row["curp"];?>">
            <span id="helpCurp" class="help-block "></span>
        </div>
        <div class="form-group " id="form-rfc">
            <label for="rfc" class="control-label
                                    " style="color: white; ">RFC</label>
            <input type="text " class="form-control input-lg
                                       " id="rfc" name="rfc" placeholder="RFC" value="<?php echo $row["rfc"];?>">
            <span id="helpRfc" class="help-block "></span>
        </div>
        <div class="form-group " id="form-imss">
            <label for="imss" class="control-label
                                     " style="color: white; ">IMSS</label>
            <input type="text " class="form-control input-lg
                                       " id="imss" name="imss" placeholder="IMSS" value="<?php echo $row["imss"];?>">
            <span id="helpImss" class="help-block "></span>
        </div>
        <div class="form-group " id="form-numAfore">
            <label for="numAfore" class="control-label
                                         " style="color: white; ">NUMERO DE AFORE</label>
            <input type="text " class="form-control input-lg
                                       " id="numAfore" name="numAfore" placeholder="Numero de Afore"
                                        value="<?php echo $row["numAfore"];?>">
            <span id="helpNumAfore" class="help-block "></span>
        </div>
        <div class="form-group " id="form-afore">
            <label for="afore" class="control-label
                                      " style="color: white; ">AFORE</label>
            <input type="text " class="form-control input-lg
                                       " id="afore" name="afore" placeholder="Afore" value="<?php echo $row["afore"];?>">
            <span id="helpAfore" class="help-block "></span>
        </div>
        <div class="form-group " id="form-dependencia">
            <label for="dependencia" class="control-label
                                            " style="color: white; ">DEPENDENCIA</label>
            <input type="text " class="form-control input-lg
                                       " id="dependencia" name="dependencia" placeholder="Dependencia"
                                        value="<?php echo $row["dependencia"];?>">
            <span id="helpDependencia" class="help-block "></span>
        </div>
        <div class="form-group " id="form-tipoContrato">
            <label for="tipoContrato" class="control-label
                                             " style="color: white; ">TIPO DE CONTRATO</label>
            <input type="text " class="form-control input-lg
                                       " id="tipoContrato" name="tipoContrato" placeholder="Tipo de contrato"
                                        value="<?php echo $row["tipoContrato"];?>">
            <span id="helTipoContrato" class="help-block "></span>
        </div>
        <div class="form-group " id="form-administrativo">
            <label for="administrativo" class="control-label
                                               " style="color: white; ">ADMINISTRATIVO</label>
            <input type="text " class="form-control input-lg
                                       " id="administrativo" name="administrativo" placeholder="Administrativo"
                                        value="<?php echo $row["administrativo"];?>">
            <span id="helpAdministrativo" class="help-block "></span>
        </div>
        <div class="form-group " id="form-directivo">
            <label for="directivo" class="control-label
                                          " style="color: white; ">DIRECTIVO</label>
            <input type="text " class="form-control input-lg
                                       " id="directivo" name="directivo" placeholder="Directivo"
                                        value="<?php echo $row["directivo"];?>">
            <span id="helpDirectivo" class="help-block "></span>
        </div>
        <div class="form-group " id="form-categoria">
            <label for="categoria" class="control-label
                                          " style="color: white; ">CATEGORIA	</label>
            <input type="text " class="form-control input-lg
                                       " id="categoria" name="categoria" placeholder="Categoria"
                                        value="<?php echo $row["categoria"];?>">
            <span id="helpCategoria" class="help-block "></span>
        </div>
        <div class="form-group " id="form-cargaHoraria">
            <label for="cargaHoraria" class="control-label
                                             " style="color: white; ">CARGA HORARIA</label>
            <input type="text " class="form-control input-lg
                                       " id="cargaHoraria" name="cargaHoraria" placeholder="Carga horaria"
                                        value="<?php echo $row["cargaHoraria"];?>">
            <span id="helpCargaHoraria" class="help-block "></span>
        </div>
        <div class="form-group " id="form-aniosAntiguedad">
            <label for="aniosAntiguedad" class="control-label
                                                " style="color: white; ">AÑOS ANTIGÜEDAD</label>
            <input type="text " class="form-control input-lg
                                       " id="aniosAntiguedad" name="aniosAntiguedad" placeholder="Años antigüedad"
                                        value="<?php echo $row["aniosAntiguedad"];?>">
            <span id="helpAniosAntiguedad" class="help-block "></span>
        </div>
        <div class="form-group " id="form-creditoInfonavit">
            <label for="creditoInfonavit" class="control-label
                                                 " style="color: white; ">CREDITO INFONAVIT</label>
            <input type="text " class="form-control input-lg
                                       " id="creditoInfonavit" name="creditoInfonavit" placeholder="Credito Infonavit"
                                        value="<?php echo $row["creditoInfonavit"];?>">
            <span id="helpCreditoInfonavid" class="help-block "></span>
        </div>
        <div class="form-group " id="form-ingresoAdicional">
            <label for="ingresoAdicional" class="control-label
                                                 " style="color: white; ">INGRESO ADICIONAL</label>
            <input type="text " class="form-control input-lg
                                       " id="ingresoAdicional" name="ingresoAdicional" placeholder="Ingreso adicional"
                                        value="<?php echo $row["ingresoAdicional"];?>">
            <span id="helpIngresoAdicional" class="help-block "></span>
        </div>

        <div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <?php estaActivo("checkbox", "sinEstudios", "S", $row['sinEstudios'], "SIN ESTUDIOS");?>
                </label>
            </div>
        </div>
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
                             " style="color: white; ">En caso de accidente avisar a:</label>
        <div class="form-group " id="form-nombreAvisar">
            <label for="" class="control-label
                                 " style="color: white; ">NOMBRE</label>
            <input type="text " class="form-control input-lg
                                       " id="nombreAvisar" name="nombreAvisar" placeholder="Nombre"
                                        value="<?php echo $row["nombreAvisar"];?>">
            <span id="help" class="help-block "></span>
        </div>
        <div class="form-group " id="form-parentescoAvisar">
            <label for="parentescoAvisar" class="control-label
                                                 " style="color: white; ">PARENTESCO</label>
            <input type="text " class="form-control input-lg
                                       " id="parentescoAvisar" name="parentescoAvisar" placeholder="Parentesco"
                                        value="<?php echo $row["parentescoAvisar"];?>">
            <span id="helpParentescoAvisar" class="help-block "></span>
        </div>
        <div class="form-group " id="form-telefonoAvisar">
            <label for="telefonoAvisar" class="control-label
                                               " style="color: white; ">TELEFONO</label>
            <input type="text " class="form-control input-lg
                                       " id="telefonoAvisar" name="telefonoAvisar" placeholder="Telefono"
                                        value="<?php echo $row["telefonoAvisar"];?>">
            <span id="helpTelefonoAvisar" class="help-block "></span>
        </div>
    </div>
</div>