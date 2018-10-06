<div class="row ">
    <div class="col-md-10 " style="margin: 0 auto; float: none; ">
            <div class="form-group " id="form-Nivel">
                <label for="nivel" class="control-label" style="color:white; ">NIVEL</label>
                <input type="text" class="form-control input-lg
                                          " id="nivel" name="nivel" placeholder="Nivel" value="<?php echo $row["nivel"];?>">
                <span id="helpNivel" class="help-block"></span>
            </div>
            <div class="form-group" id="form-tituloObtenido">
                <label for="tituloObtenido" style="color: white; " class="control-label ">TITULO OBTENIDO</label>
                <input type="text" class="form-control input-lg" id="tituloObtenido" name="tituloObtenido" placeholder="Titulo obtenido"
                                        value="<?php echo $row["tituloObtenido"];?>">
                <span id="helpTituloObtenido" class="help-block "></span>
            </div>
            <div class="row ">
                <div class="col-sm-6 ">
                    <div class="form-group has-feedback " id="form-institucion">
                        <label for="apellidoPaterno" style="color: white; ">INSTITUCION</label>
                        <input type="text" class="form-control input-lg
                                                  " id="institucion" name="institucion" placeholder="Institucion"
                                                     value="<?php echo $row["institucion"];?>">
                        <span id="helpInstitucion" class="help-block "></span>
                    </div>
                </div>
                <div class="col-sm-6 ">
                    <div class="form-group" id="form-nombrePosgrado">
                        <label for="nombrePosgrado " style="color: white; ">NOMBRE POSGRADO</label>
                        <input type="text" class="form-control input-lg
                                                  " id="nombrePosgrado" name="nombrePosgrado" placeholder="Nombre posgrado "
                                                     value="<?php echo $row["nombrePosgrado"];?>">
                        <span id="helpNombrePosgrado" class="help-block"></span>
                    </div>
                </div>
            </div>
            <div class="form-group" id="form-disciplina">
                <label for="disciplina " class="control-label
                                                     " style="color: white; ">DISCIPLINA</label>
                <input type="text" class="form-control input-lg
                                          " id="disciplina" name="disciplina" placeholder="Disciplina"
                                             value="<?php echo $row["disciplina"];?>">
                <span id="helpDisciplina" class="help-block "></span>
            </div>
            <div class="row">
                <div class="col-sm-6 ">
                    <div class="form-group" id="form-duracion">
                        <label for="duracion" class="control-label
                                                             " style="color: white; ">DURACION</label>
                        <input type="text" class="form-control input-lg
                                                  " id="duracion" name="duracion" placeholder="Duracion"
                                                     value="<?php echo $row["duracion"];?>">
                        <span id="helpDuracion" class="help-block "></span>
                    </div>
                </div>
                <div class="col-sm-6 ">
                    <div class="form-group " id="form-estadoEstudio">
                    <label for="estadoEstudio" class="control-label
                                              " style="color: white; ">ESTADO ESTUDIO</label>
                    <select class="form-control input-lg" name="estadoEstudio">
                        <?php estaActivo("option", "", "", "", "Estado estudio")?>
                        <?php estaActivo("option", "", "A", $row["estadoEstudio"], "A cursar")?>
                        <?php estaActivo("option", "", "C", $row["estadoEstudio"], "Cursando")?>
                        <?php estaActivo("option", "", "G", $row["estadoEstudio"], "Grado obtenido")?>
                    </select>
                    <span id="helpSexo" class="help-block "></span>
                    </div>
                </div>
            </div>
            <div class="row ">
                <center>
                    <label style="color: white; ">FECHA DE INICIO</label>
                </center>
                <div class="col-md-3 ">
                    <div class="form-group " id="form-dia-fechaInicio">
                        <label for="dia-fechaInicio " style="color: white; ">DIA</label>
                        <select class="form-control input-lg " id="dia-fechaInicio" name="dia-fechaInicio">
                            <?php 
                            global $row;
                            agregaSelectRangoSeleccionado(1, 31, explode("-",$row["fechaInicio"])[2]);
                            ?>
                        </select>
                        <span id="helpDia-fechaInicio" class="help-block "></span>
                    </div>
                </div>
                <div class="col-md-5 ">
                    <div class="form-group " id="form-mes-fechaInicio">
                        <label for="mes-fechaInicio " style="color: white; ">MES</label>
                        <select class="form-control input-lg " id="mes-fechaInicio" name="mes-fechaInicio">
                            <?php mostrarMeses("fechaInicio") ?>
                        </select>
                        <span id="helpMes-fechaInicio" class="help-block "></span>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="form-group" id="form-anio-fechaInicio">
                        <label for="anio-fechaInicio " style="color:
                                                                  white; ">AŃO</label>
                        <select class="form-control input-lg " id="anio-fechaInicio" name="anio-fechaInicio">
                            <?php 
                            global $row;
                            agregaSelectRangoSeleccionado(1940, 2016, explode("-",$row["fechaInicio"])[0]);
                            ?>
                        </select>
                        <span id="helpAnio-fechaInicio " class="help-block "></span>
                    </div>
                </div>
            </div>
            <div class="row ">
                <center>
                    <label style="color: white; ">FECHA DE FIN</label>
                </center>
                <div class="col-md-3 ">
                    <div class="form-group " id="form-dia-fechaFin">
                        <label for="dia-fechaFin " style="color: white; ">DIA</label>
                        <select class="form-control input-lg " id="dia-fechaFin" name="dia-fechaFin">
                            <?php 
                            global $row;
                            agregaSelectRangoSeleccionado(1, 31, explode("-",$row["fechaFin"])[2]);
                            ?>
                        </select>
                        <span id="helpDia-fechaFin" class="help-block "></span>
                    </div>
                </div>
                <div class="col-md-5 ">
                    <div class="form-group " id="form-mes-fechaFin">
                        <label for="mes-fechaFin " style="color: white; ">MES</label>
                        <select class="form-control input-lg " id="mes-fechaFin" name="mes-fechaFin">
                            <?php mostrarMeses("fechaFin") ?>
                        </select>
                        <span id="helpMes-fechaFin" class="help-block "></span>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="form-group" id="form-anio-fechaFin">
                        <label for="anio-fechaFin " style="color:
                                                                  white; ">AŃO</label>
                        <select class="form-control input-lg " id="anio-fechaFin" name="anio-fechaFin">
                            <?php 
                            global $row;
                            agregaSelectRangoSeleccionado(1940, 2016, explode("-",$row["fechaFin"])[0]);
                            ?>
                        </select>
                        <span id="helpAnio-fechaFin " class="help-block "></span>
                    </div>
                </div>
            </div>
            <div class="form-group " id="form-grado">
                <label for="grado " class="control-label
                                                  " style="color: white; ">GRADO</label>
                <input type="text " class="form-control input-lg
                                           " id="grado" name="grado" placeholder="Grado"
                                             value="<?php echo $row["nacionalidgradoad"];?>">
                <span id="helpGrado" class="help-block "></span>
            </div>
            <div class="form-group " id="form-nombreTesis">
                <label for="nombreTesis" class="control-label
                                                    " style="color: white; ">NOMBRE TESIS</label>
                <input type="text " class="form-control input-lg
                                           " id="nombreTesis" name="nombreTesis" placeholder="Nombre tesis "
                                            value="<?php echo $row["nombreTesis"];?>">
                <span id="helpNombreTesis" class="help-block "></span>
            </div>
            <div class="form-group " id="form-domicilio">
                <label for="domicilio" class="control-label
                                                      " style="color: white; ">DOMICILIO</label>
                <input type="text " class="form-control input-lg" id="domicilio"
                       name="domicilio" placeholder="Domicilio" value="<?php echo $row["domicilio"];?>">
                <span id="helpDomicilio" class="help-block"></span>
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
            <div class="form-group " id="form-estado">
                <label for="pais" class="control-label
                                           " style="color: white; ">PAIS</label>
                <input type="text " class="form-control input-lg
                                           " id="pais" name="pais" placeholder="Pais" value="<?php echo $row["pais"];?>">
                <span id="helpEstado" class="help-block "></span>
            </div>
            <div class="form-group " id="form-telefono">
                <label for="telefono" class="control-label
                                                       " style="color: white; ">TELEFONO</label>
                <input type="text " class="form-control input-lg
                                           " id="telefono" name="telefono" placeholder="Telefono"
                                            value="<?php echo $row["telefono"];?>">
                <span id="helpTelefono" class="help-block "></span>
            </div>
            <div class="checkbox">
                <label>
                    <?php estaActivo("checkbox", "recibeApoyo", "Si", $row['recibeApoyo'], "RECIBE APOYO");?>
                </label>
                <script>
                    var campo = $("input[name='recibeApoyo']");
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
                        if(!campo.is(':checked'))
                            {
                                deshabilitarYBorrar("#monto");
                                deshabilitarYBorrar("#frecuencia");
                                deshabilitarYBorrar("#tipoCambio");
                                deshabilitarYBorrar("#duracionManutencion");
                                deshabilitarYBorrar("#fuenteFinanciera");
                                deshabilitarYBorrarCheckbox("input[name='manutencion']");
                                deshabilitarYBorrarCheckbox("input[name='transporte']");
                                deshabilitarYBorrarCheckbox("input[name='seguroMedico']");
                                deshabilitarYBorrarCheckbox("input[name='instalacion']");
                                deshabilitarYBorrarCheckbox("input[name='materialBibliografico']");
                            }
                        else{
                                $("#monto").prop('disabled', false);
                                $("#frecuencia").prop('disabled', false);
                                $("#tipoCambio").prop('disabled', false);
                                $("#duracionManutencion").prop('disabled', false);
                                $("#fuenteFinanciera").prop('disabled', false);
                                $("input[name='manutencion']").prop('disabled', false);
                                $("input[name='transporte']").prop('disabled', false);
                                $("input[name='seguroMedico']").prop('disabled', false);
                                $("input[name='instalacion']").prop('disabled', false);
                                $("input[name='materialBibliografico']").prop('disabled', false);
                        } 
                </script>
            </div>
            <div class="form-group " id="form-monto">
                <label for="monto" class="control-label
                                                 " style="color: white; ">MONTO APOYO</label>
                <input type="text " class="form-control input-lg
                                           " id="monto" name="monto" placeholder="Monto apoyo"
                                            value="<?php echo $row["monto"];?>" disabled>
                <span id="helpMonto" class="help-block "></span>
            </div>
             <div class="form-group " id="form-frecuencia">
                <label for="" class="control-label
                                     " style="color: white; ">FRECUENCIA</label>
                <input type="text " class="form-control input-lg
                                           " id="frecuencia" name="frecuencia" placeholder="Frecuencia"
                                            value="<?php echo $row["frecuencia"];?>" disabled>
                <span id="helpFrecuencia" class="help-block "></span>
            </div>
            <div class="form-group " id="form-tipoCambio">
                <label for="" class="control-label
                                     " style="color: white; ">TIPO CAMBIO</label>
                <input type="text " class="form-control input-lg
                                           " id="tipoCambio" name="tipoCambio" placeholder="Tipo cambio"
                                            value="<?php echo $row["tipoCambio"];?>" disabled>
                <span id="helpTipoCambio" class="help-block "></span>
            </div>
            <div class="form-group " id="form-duracionManutencion">
                <label for="" class="control-label
                                     " style="color: white; ">DURACION MANUTENCION</label>
                <input type="text " class="form-control input-lg
                                           " id="duracionManutencion" name="duracionManutencion" placeholder="Duracion manutencion"
                                            value="<?php echo $row["duracionManutencion"];?>" disabled>
                <span id="helpDuracionManutencion" class="help-block "></span>
            </div>
            <div class="form-group " id="form-fuenteFinanciera">
                <label for="" class="control-label
                                     " style="color: white; ">FUENTE FINANCIERA</label>
                <input type="text " class="form-control input-lg
                                           " id="fuenteFinanciera" name="fuenteFinanciera" placeholder="Fuente financiera"
                                            value="<?php echo $row["fuenteFinanciera"];?>" disabled>
                <span id="helpFuenteFinanciera" class="help-block "></span>
            </div>
            <div class="col-sm-4">
                <div class="checkbox">
                    <label>
                        <?php estaActivo("checkbox", "manutencion", "S", $row['manutencion'], "MANUTENCION");?>
                    </label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="checkbox">
                    <label>
                        <?php estaActivo("checkbox", "transporte", "S", $row['transporte'], "TRANSPORTE");?>
                    </label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="checkbox">
                    <label>
                        <?php estaActivo("checkbox", "seguroMedico", "S", $row['seguroMedico'], "SEGURO MEDICO");?>
                    </label>
                </div>
            </div><div class="col-sm-4">
            <div class="checkbox">
                <label>
                    <?php estaActivo("checkbox", "instalacion", "S", $row['instalacion'], "INSTALACION");?>
                </label>
            </div>
            </div>
            <div class="col-sm-4">
                <div class="checkbox">
                    <label>
                        <?php estaActivo("checkbox", "materialBibliografico", "S", $row['materialBibliografico'], "MATERIAL BIBLIOGRAFICO");?>
                    </label>
                </div>
            </div>
    </div>
</div>