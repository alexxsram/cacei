<!--Tabla de experiencia profesional-- Usado en index.php-->
<!--Tabala responsive de experiencia profesional-->
<?php
session_start();
if(!isset($_SESSION['usuario']) and $_SESSION['estado'] != 'Autenticado') {
  header('Location: ../../index.php');
}
$codigo=$_SESSION['usuario'];
    include ("../../model/conexion.php");
    $sql = "SELECT * FROM C_EXPERIENCIA_PROF WHERE fk_profesor=$codigo";
    $arrayExperiencia = $base->query($sql)->fetchAll(PDO::FETCH_OBJ);
?>
    <table class="table table-bordered">
        <thead>
            <tr class="info">
                <th>Actividad o puesto</th>
                <th>Organización o empresa</th>
                <th>De: (mes y año)</th>
                <th>A: (mes y año)</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($arrayExperiencia as $experiencia):?>
            <tr>
                <td>
                    <?php echo $experiencia->act_puesto?>
                </td>
                <td>
                    <?php echo $experiencia->organizacion?>
                </td>
                <td>
                    <?php echo $experiencia->fecha_inicio?>
                </td>
                <td>
                    <?php echo $experiencia->fecha_fin?>
                </td>
                <td class="action">
                    <!--boton para llamar al formulario modal, para editar Experiencia profesional-->
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editExperienciaP" data-actividad="<?php echo $experiencia->act_puesto?>" data-organ="<?php echo $experiencia->organizacion?>" data-fechai="<?php echo $experiencia->fecha_inicio?>" data-fechaf="<?php echo $experiencia->fecha_fin?>" data-id="<?php echo $experiencia->id_exper?>">Editar</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteExpP" data-actividad="<?php echo $experiencia->act_puesto?>"  data-id="<?php echo $experiencia->id_exper?>">X</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
