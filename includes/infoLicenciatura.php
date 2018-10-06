<?php 
    $queryConsultaLicenciatura =     "SELECT * FROM estudio WHERE codigo = " . $codigo . " AND nivel = 'Licenciatura'";
    $resultadoConsultaLicenciatura = mysqli_query($conexion, $queryConsultaLicenciatura);

    if(mysqli_num_rows($resultadoConsultaLicenciatura) == 1) {
        $rowLicenciatura = $resultadoConsultaLicenciatura->fetch_assoc();
    }
?>
<div class="row">
    <div class="col-md-12">
        <div>
            <h5 class="infoLabel">Titulo obtenido</h5>
            <h5 class="info"><?php echo $rowLicenciatura['tituloObtenido']; ?></h5>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">Institucion</h5>
            <h5 class="info"><?php echo $rowLicenciatura['institucion']; ?></h5>
        </div>
    </div>
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">Nombre posgrado</h5>
            <h5 class="info"><?php echo $rowLicenciatura['nombrePosgrado']; ?></h5>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">Disciplina</h5>
            <h5 class="info"><?php echo $rowLicenciatura['disciplina']; ?></h5>
        </div>
    </div>
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">Duracion</h5>
            <h5 class="info"><?php echo $rowLicenciatura['duracion']; ?></h5>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div>
            <h5 class="infoLabel">Estado estudio</h5>
            <h5 class="info"><?php switch($rowLicenciatura['estadoEstudio'])
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
            <h5 class="info"><?php echo $rowLicenciatura['fechaInicio']; ?></h5>
        </div>
    </div>
    <div class="col-md-4">
        <div>
            <h5 class="infoLabel">Fecha fin</h5>
            <h5 class="info"><?php echo $rowLicenciatura['fechaFin']; ?></h5>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div>
            <h5 class="infoLabel">Grado</h5>
            <h5 class="info"><?php echo $rowLicenciatura['grado']; ?></h5>
        </div>
    </div>
    <div class="col-md-8">
        <div>
            <h5 class="infoLabel">Nombre tesis</h5>
            <h5 class="info"><?php echo $rowLicenciatura['nombreTesis']; ?></h5>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-7">
        <div>
            <h5 class="infoLabel">Domicilio</h5>
            <h5 class="info"><?php echo $rowLicenciatura['domicilio']; ?></h5>
        </div>
    </div>
    <div class="col-md-5">
        <div>
            <h5 class="infoLabel">Colonia</h5>
            <h5 class="info"><?php echo $rowLicenciatura['colonia']; ?></h5>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div>
            <h5 class="infoLabel">Codigo postal</h5>
            <h5 class="info"><?php echo $rowLicenciatura['cp']; ?></h5>
        </div>
    </div>
    <div class="col-md-8">
        <div>
            <h5 class="infoLabel">Municipio</h5>
            <h5 class="info"><?php echo $rowLicenciatura['municipio']; ?></h5>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">Estado</h5>
            <h5 class="info"><?php echo $rowLicenciatura['estado']; ?></h5>
        </div>
    </div>
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">Pais</h5>
            <h5 class="info"><?php echo $rowLicenciatura['pais']; ?></h5>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">Telefono</h5>
            <h5 class="info"><?php echo $rowLicenciatura['telefono']; ?></h5>
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
            <h5 class="info"><?php echo revisaEstadoCheckBox($rowLicenciatura ,"recibeApoyo", "Si"); ?></h5>
        </div>
    </div>
    <div class="col-md-4">
        <div>
            <h5 class="infoLabel">Monto apoyo</h5>
            <h5 class="info"><?php echo $rowLicenciatura['monto']; ?></h5>
        </div>
    </div>
    <div class="col-md-4">
        <div>
            <h5 class="infoLabel">Frecuencia</h5>
            <h5 class="info"><?php echo $rowLicenciatura['frecuencia']; ?></h5>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">Tipo cambio</h5>
            <h5 class="info"><?php echo $rowLicenciatura['tipoCambio']; ?></h5>
        </div>
    </div>
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">Duracion manutencion</h5>
            <h5 class="info"><?php echo $rowLicenciatura['duracionManutencion']; ?></h5>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">Fuente financiera</h5>
            <h5 class="info"><?php echo $rowLicenciatura['fuenteFinanciera']; ?></h5>
        </div>
    </div>
    <div class="col-md-3">
        <div>
            <h5 class="infoLabel">Manutencion</h5>
            <h5 class="info"><?php echo revisaEstadoCheckBox($rowLicenciatura ,"manutencion", "S"); ?></h5>
        </div>
    </div>
    <div class="col-md-3">
        <div>
            <h5 class="infoLabel">Transporte</h5>
            <h5 class="info"><?php echo revisaEstadoCheckBox($rowLicenciatura ,"transporte", "S"); ?></h5>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div>
            <h5 class="infoLabel">Seguro medico</h5>
            <h5 class="info"><?php echo revisaEstadoCheckBox($rowLicenciatura ,"seguroMedico", "S"); ?></h5>
        </div>
    </div>
    <div class="col-md-3">
        <div>
            <h5 class="infoLabel">Instalacion</h5>
            <h5 class="info"><?php echo revisaEstadoCheckBox($rowLicenciatura ,"instalacion", "S"); ?></h5>
        </div>
    </div>
    <div class="col-md-3">
        <div>
            <h5 class="infoLabel">Material bibliografico</h5>
            <h5 class="info"><?php echo revisaEstadoCheckBox($rowLicenciatura ,"materialBibliografico", "S"); ?></h5>
        </div>
    </div>
</div>