<!--Tabala responsive de capacitacion docente-- usada en index.php-->
<?php
    session_start();
    if(!isset($_SESSION['usuario']) and $_SESSION['estado'] != 'Autenticado') {
      header('Location: ../../index.php');
    }
    $codigo=$_SESSION['usuario'];
    include ("../../model/conexion.php");
    $sql = "SELECT * FROM C_CAPACITACION_DOCENTE WHERE fk_profesor=$codigo";
    $arrayCapacitacion = $base->query($sql)->fetchAll(PDO::FETCH_OBJ);
?>
    <table class="table table-bordered">
        <thead>
            <tr class="info">
                <th>Tipo de capacitación</th>
                <th>Intitución</th>
                <th>País</th>
                <th>Año de obtención</th>
                <th>Horas</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($arrayCapacitacion as $capacitacion):?>
            <tr>
                <td>
                    <?php echo $capacitacion->tipo_capcit?>
                </td>
                <td>
                    <?php echo $capacitacion->institucion?>
                </td>
                <td>
                    <?php echo $capacitacion->pais?>
                </td>
                <td>
                    <?php echo $capacitacion->year?>
                </td>
                <td>
                    <?php echo $capacitacion->hora?>
                </td>
                <td class="action">
                    <!--boton para llamar al formulario modal, para agregar capacitacion docente-->
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editCapac" data-inst="<?php echo $capacitacion->institucion?>" data-pais="<?php echo $capacitacion->pais?>" data-year="<?php echo $capacitacion->year?>" data-tipoc="<?php echo $capacitacion->tipo_capcit?>" data-hora="<?php echo $capacitacion->hora?>" data-id="<?php echo $capacitacion->id_capacit ?>">Editar</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteCapacitacion" data-tipo="<?php echo $capacitacion->tipo_capcit?>" data-id="<?php echo $capacitacion->id_capacit ?>">X</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
