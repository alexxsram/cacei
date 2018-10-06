<?php 
    $queryConsultaMaestria =     "SELECT * FROM estudio WHERE codigo = " . $codigo . " AND nivel = 'Maestria'";
    $resultadoConsultaMaestria = mysqli_query($conexion, $queryConsultaMaestria);

    if(mysqli_num_rows($resultadoConsultaMaestria) == 1) {
        $rowMaestria = $resultadoConsultaMaestria->fetch_assoc();
    }
?>
<div class="row">
    <div class="col-md-12">
        <div>
            <h5 class="infoLabel">Titulo obtenido</h5>
            <h5 class="info"><?php echo $rowMaestria['tituloObtenido']; ?></h5>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">Institucion</h5>
            <h5 class="info"><?php echo $rowMaestria['institucion']; ?></h5>
        </div>
    </div>
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">Nombre posgrado</h5>
            <h5 class="info"><?php echo $rowMaestria['nombrePosgrado']; ?></h5>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">Disciplina</h5>
            <h5 class="info"><?php echo $rowMaestria['disciplina']; ?></h5>
        </div>
    </div>
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">Duracion</h5>
            <h5 class="info"><?php echo $rowMaestria['duracion']; ?></h5>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div>
            <h5 class="infoLabel">Estado estudio</h5>
            <h5 class="info"><?php switch($rowMaestria['estadoEstudio'])
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
            <h5 class="info"><?php echo $rowMaestria['fechaInicio']; ?></h5>
        </div>
    </div>
    <div class="col-md-4">
        <div>
            <h5 class="infoLabel">Fecha fin</h5>
            <h5 class="info"><?php echo $rowMaestria['fechaFin']; ?></h5>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div>
            <h5 class="infoLabel">Grado</h5>
            <h5 class="info"><?php echo $rowMaestria['grado']; ?></h5>
        </div>
    </div>
    <div class="col-md-8">
        <div>
            <h5 class="infoLabel">Nombre tesis</h5>
            <h5 class="info"><?php echo $rowMaestria['nombreTesis']; ?></h5>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-7">
        <div>
            <h5 class="infoLabel">Domicilio</h5>
            <h5 class="info"><?php echo $rowMaestria['domicilio']; ?></h5>
        </div>
    </div>
    <div class="col-md-5">
        <div>
            <h5 class="infoLabel">Colonia</h5>
            <h5 class="info"><?php echo $rowMaestria['colonia']; ?></h5>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div>
            <h5 class="infoLabel">Codigo postal</h5>
            <h5 class="info"><?php echo $rowMaestria['cp']; ?></h5>
        </div>
    </div>
    <div class="col-md-8">
        <div>
            <h5 class="infoLabel">Municipio</h5>
            <h5 class="info"><?php echo $rowMaestria['municipio']; ?></h5>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">Estado</h5>
            <h5 class="info"><?php echo $rowMaestria['estado']; ?></h5>
        </div>
    </div>
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">Pais</h5>
            <h5 class="info"><?php echo $rowMaestria['pais']; ?></h5>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">Telefono</h5>
            <h5 class="info"><?php echo $rowMaestria['telefono']; ?></h5>
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
            <h5 class="info"><?php echo revisaEstadoCheckBox($rowMaestria ,"recibeApoyo", "Si"); ?></h5>
        </div>
    </div>
    <div class="col-md-4">
        <div>
            <h5 class="infoLabel">Monto apoyo</h5>
            <h5 class="info"><?php echo $rowMaestria['monto']; ?></h5>
        </div>
    </div>
    <div class="col-md-4">
        <div>
            <h5 class="infoLabel">Frecuencia</h5>
            <h5 class="info"><?php echo $rowMaestria['frecuencia']; ?></h5>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">Tipo cambio</h5>
            <h5 class="info"><?php echo $rowMaestria['tipoCambio']; ?></h5>
        </div>
    </div>
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">Duracion manutencion</h5>
            <h5 class="info"><?php echo $rowMaestria['duracionManutencion']; ?></h5>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">Fuente financiera</h5>
            <h5 class="info"><?php echo $rowMaestria['fuenteFinanciera']; ?></h5>
        </div>
    </div>
    <div class="col-md-3">
        <div>
            <h5 class="infoLabel">Manutencion</h5>
            <h5 class="info"><?php echo revisaEstadoCheckBox($rowMaestria ,"manutencion", "S"); ?></h5>
        </div>
    </div>
    <div class="col-md-3">
        <div>
            <h5 class="infoLabel">Transporte</h5>
            <h5 class="info"><?php echo revisaEstadoCheckBox($rowMaestria ,"transporte", "S"); ?></h5>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div>
            <h5 class="infoLabel">Seguro medico</h5>
            <h5 class="info"><?php echo revisaEstadoCheckBox($rowMaestria ,"seguroMedico", "S"); ?></h5>
        </div>
    </div>
    <div class="col-md-3">
        <div>
            <h5 class="infoLabel">Instalacion</h5>
            <h5 class="info"><?php echo revisaEstadoCheckBox($rowMaestria ,"instalacion", "S"); ?></h5>
        </div>
    </div>
    <div class="col-md-3">
        <div>
            <h5 class="infoLabel">Material bibliografico</h5>
            <h5 class="info"><?php echo revisaEstadoCheckBox($rowMaestria ,"materialBibliografico", "S"); ?></h5>
        </div>
    </div>
</div>