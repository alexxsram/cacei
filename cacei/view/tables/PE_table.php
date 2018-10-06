<!--Tabla de Participación en el análisis o actualización del PE, o en actividades extracurriculares relacionadas con el PE-- Usado en index.php-->
<!--Tabala responsive de participacion...-->
<?php
    session_start();
    if(!isset($_SESSION['usuario']) and $_SESSION['estado'] != 'Autenticado') {
      header('Location: ../../index.php');
    }
    $codigo=$_SESSION['usuario'];
    include ("../../model/conexion.php");
    $sql = "SELECT * FROM C_PE WHERE fl_profesor=$codigo";
    $arrayPremio = $base->query($sql)->fetchAll(PDO::FETCH_OBJ);
?>

    <table class="table table-bordered">
        <thead>
            <?php foreach($arrayPremio as $premio):?>
            <tr class="info">
                <th>Participación en el análisis o actualización del PE, o en actividades extracurriculares relacionadas con el PE</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $premio->descripcion?></td>
                <td class="action">
                    <!---boton para llamar al formulario modal, para agregar logros profesionales-->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPE" data-info="<?php echo $premio->descripcion?>" data-id="<?php echo $premio->id_pe?>">Editar</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
