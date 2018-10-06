<?php 
    $queryConsultaDoctorado =     "SELECT * FROM estudio WHERE codigo = " . $codigo . " AND nivel = 'Doctorado'";
    $resultadoConsultaDoctorado = mysqli_query($conexion, $queryConsultaDoctorado);

    if(mysqli_num_rows($resultadoConsultaDoctorado) == 1) {
        $rowDoctorado = $resultadoConsultaDoctorado->fetch_assoc();
    }
?>
<div class="row">
    <div class="col-md-12">
        <div>
            <h5 class="infoLabel">Titulo obtenido</h5>
            <h5 class="info"><?php echo $rowDoctorado['tituloObtenido']; ?></h5>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">Institucion</h5>
            <h5 class="info"><?php echo $rowDoctorado['institucion']; ?></h5>
        </div>
    </div>
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">Nombre posgrado</h5>
            <h5 class="info"><?php echo $rowDoctorado['nombrePosgrado']; ?></h5>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">Disciplina</h5>
            <h5 class="info"><?php echo $rowDoctorado['disciplina']; ?></h5>
        </div>
    </div>
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">Duracion</h5>
            <h5 class="info"><?php echo $rowDoctorado['duracion']; ?></h5>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div>
            <h5 class="infoLabel">Estado estudio</h5>
            <h5 class="info"><?php switch($rowDoctorado['estadoEstudio'])
                                {
                                case "A":
                                    echo "A cursar";
                                    break;
                                case "G":
                                    echo "Grado obtenido";
                                    break;
                                case "C":
                                    echo "Cursando";
                                    break;
                                default:
                                    echo "No especificado";
                                    break;
                                }?></h5>
        </div>
    </div>
    <div class="col-md-4">
        <div>
            <h5 class="infoLabel">Fecha inicio</h5>
            <h5 class="info"><?php echo $rowDoctorado['fechaInicio']; ?></h5>
        </div>
    </div>
    <div class="col-md-4">
        <div>
            <h5 class="infoLabel">Fecha fin</h5>
            <h5 class="info"><?php echo $rowDoctorado['fechaFin']; ?></h5>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div>
            <h5 class="infoLabel">Grado</h5>
            <h5 class="info"><?php echo $rowDoctorado['grado']; ?></h5>
        </div>
    </div>
    <div class="col-md-8">
        <div>
            <h5 class="infoLabel">Nombre tesis</h5>
            <h5 class="info"><?php echo $rowDoctorado['nombreTesis']; ?></h5>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-7">
        <div>
            <h5 class="infoLabel">Domicilio</h5>
            <h5 class="info"><?php echo $rowDoctorado['domicilio']; ?></h5>
        </div>
    </div>
    <div class="col-md-5">
        <div>
            <h5 class="infoLabel">Colonia</h5>
            <h5 class="info"><?php echo $rowDoctorado['colonia']; ?></h5>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div>
            <h5 class="infoLabel">Codigo postal</h5>
            <h5 class="info"><?php echo $rowDoctorado['cp']; ?></h5>
        </div>
    </div>
    <div class="col-md-8">
        <div>
            <h5 class="infoLabel">Municipio</h5>
            <h5 class="info"><?php echo $rowDoctorado['municipio']; ?></h5>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">Estado</h5>
            <h5 class="info"><?php echo $rowDoctorado['estado']; ?></h5>
        </div>
    </div>
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">Pais</h5>
            <h5 class="info"><?php echo $rowDoctorado['pais']; ?></h5>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">Telefono</h5>
            <h5 class="info"><?php echo $rowDoctorado['telefono']; ?></h5>
        </div>
    </div>
</div>
<div class="row">
    <h2 class="infoContainerTitle">Apoyo</h2>
</div>
<div class="row">
    <div class="col-md-4">
        <div>
            <h5 class="infoLabel">Recibe apoyo</h5>
            <h5 class="info"><?php echo revisaEstadoCheckBox($rowDoctorado ,"recibeApoyo", "Si"); ?></h5>
        </div>
    </div>
    <div class="col-md-4">
        <div>
            <h5 class="infoLabel">Monto apoyo</h5>
            <h5 class="info"><?php echo $rowDoctorado['monto']; ?></h5>
        </div>
    </div>
    <div class="col-md-4">
        <div>
            <h5 class="infoLabel">Frecuencia</h5>
            <h5 class="info"><?php echo $rowDoctorado['frecuencia']; ?></h5>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">Tipo cambio</h5>
            <h5 class="info"><?php echo $rowDoctorado['tipoCambio']; ?></h5>
        </div>
    </div>
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">Duracion manutencion</h5>
            <h5 class="info"><?php echo $rowDoctorado['duracionManutencion']; ?></h5>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">Fuente financiera</h5>
            <h5 class="info"><?php echo $rowDoctorado['fuenteFinanciera']; ?></h5>
        </div>
    </div>
    <div class="col-md-3">
        <div>
            <h5 class="infoLabel">Manutencion</h5>
            <h5 class="info"><?php echo revisaEstadoCheckBox($rowDoctorado ,"manutencion", "S"); ?></h5>
        </div>
    </div>
    <div class="col-md-3">
        <div>
            <h5 class="infoLabel">Transporte</h5>
            <h5 class="info"><?php echo revisaEstadoCheckBox($rowDoctorado ,"transporte", "S"); ?></h5>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div>
            <h5 class="infoLabel">Seguro medico</h5>
            <h5 class="info"><?php echo revisaEstadoCheckBox($rowDoctorado ,"seguroMedico", "S"); ?></h5>
        </div>
    </div>
    <div class="col-md-3">
        <div>
            <h5 class="infoLabel">Instalacion</h5>
            <h5 class="info"><?php echo revisaEstadoCheckBox($rowDoctorado ,"instalacion", "S"); ?></h5>
        </div>
    </div>
    <div class="col-md-3">
        <div>
            <h5 class="infoLabel">Material bibliografico</h5>
            <h5 class="info"><?php echo revisaEstadoCheckBox($rowDoctorado ,"materialBibliografico", "S"); ?></h5>
        </div>
    </div>
</div>