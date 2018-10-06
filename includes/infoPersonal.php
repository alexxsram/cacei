<div class="row">
    <div class="col-md-12">
        <div>
            <h5 class="infoLabel">C&oacute;digo</h5>
            <h5 class="info"><?php echo $row['codigo']; ?></h5>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">Fecha de Nacimiento</h5>
            <h5 class="info breakWord"><?php echo $row['fechaNacimiento']; ?></h5>
        </div>
    </div>
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">Lugar de Nacimiento</h5>
            <h5 class="info breakWord"><?php echo $row['lugarNacimiento']; ?></h5>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">Nacionalidad</h5>
            <h5 class="info breakWord"><?php echo $row['nacionalidad']; ?></h5>
        </div>
    </div>
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">Forma Migratoria</h5>
            <h5 class="info breakWord"><?php echo $row['formaMigratoria']; ?></h5>
        </div>
    </div>
</div>


<div class="row"  style="margin-top: 50px;">
    <div class="col-md-4">
        <div>
            <h5 class="infoLabel">Genero</h5>
            <h5 class="info breakWord"><?php switch($row['sexo'])
                {
    case "ma":
        echo "Masculino";
        break;
    case "fe":
        echo "Femenino";
        break;
            }?></h5>
        </div>
    </div>
    <div class="col-md-4">
        <div>
            <h5 class="infoLabel">Estado Civil</h5>
            <h5 class="info breakWord"><?php echo $row['estadoCivil']; ?></h5>
        </div>
    </div>
    <div class="col-md-4">
        <div>
            <h5 class="infoLabel">Tipo Sanguineo</h5>
            <h5 class="info breakWord"><?php echo $row['tipoSangre']; ?></h5>
        </div>
    </div>
</div>


<div class="row"  style="margin-top: 50px;">
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">Domicilio Personal</h5>
            <h5 class="info breakWord"><?php echo $row['domicilioPersonal']; ?></h5>
        </div>
    </div>
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">Colonia</h5>
            <h5 class="info breakWord"><?php echo $row['colonia']; ?></h5>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div>
            <h5 class="infoLabel">Codigo Postal</h5>
            <h5 class="info breakWord"><?php echo $row['cp']; ?></h5>
        </div>
    </div>
    <div class="col-md-4">
        <div>
            <h5 class="infoLabel">Municipio</h5>
            <h5 class="info breakWord"><?php echo $row['municipio']; ?></h5>
        </div>
    </div>
    <div class="col-md-4">
        <div>
            <h5 class="infoLabel">Estado</h5>
            <h5 class="info breakWord"><?php echo $row['estado']; ?></h5>
        </div>
    </div>
</div>


<div class="row" style="margin-top: 50px;">
    <div class="col-md-4">
        <div>
            <h5 class="infoLabel">Telefono Paricular</h5>
            <h5 class="info breakWord"><?php echo $row['telParticular']; ?></h5>
        </div>
    </div>
    <div class="col-md-4">
        <div>
            <h5 class="infoLabel">Telefono Oficina</h5>
            <h5 class="info breakWord"><?php echo $row['telOficina']; ?></h5>
        </div>
    </div>
    <div class="col-md-4">
        <div>
            <h5 class="infoLabel">Celular</h5>
            <h5 class="info breakWord"><?php echo $row['celular']; ?></h5>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div>
            <h5 class="infoLabel">Correo</h5>
            <h5 class="info breakWord"><?php echo $row['email']; ?></h5>
        </div>
    </div>
</div>


<div class="row" style="margin-top: 50px;">
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">CURP</h5>
            <h5 class="info breakWord"><?php echo $row['curp']; ?></h5>
        </div>
    </div>
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">No. de Seguro Social</h5>
            <h5 class="info breakWord"><?php echo $row['imss']; ?></h5>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">No. de Afore</h5>
            <h5 class="info breakWord"><?php echo $row['numAfore']; ?></h5>
        </div>
    </div>
    <div class="col-md-6">
        <div>
            <h5 class="infoLabel">Instituci&oacute;n de la Afore</h5>
            <h5 class="info breakWord"><?php echo $row['afore']; ?></h5>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div>
            <h5 class="infoLabel">RFC</h5>
            <h5 class="info breakWord"><?php echo $row['rfc']; ?></h5>
        </div>
    </div>
</div>






