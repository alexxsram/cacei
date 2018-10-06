<!--Tabala responsive de actualizacion docente, usada en index.php-->
<?php
    session_start();
    if(!isset($_SESSION['usuario']) and $_SESSION['estado'] != 'Autenticado') {
      header('Location: ../../index.php');
    }
    $codigo=$_SESSION['usuario'];
    include ("../../model/conexion.php");
    $sql = "SELECT * FROM C_ACTUALIZACION_DISCIP WHERE fk_profesor=$codigo";
    $arrayActual = $base->query($sql)->fetchAll(PDO::FETCH_OBJ);
?>
    <table class="table table-bordered">
        <thead>
                <tr class="info">
                    <th>Tipo de actualizacion</th>
                    <th>Intitución</th>
                    <th>País</th>
                    <th>Año de obtencion</th>
                    <th>Horas</th>
                    <th>Acción</th>
                </tr>
        </thead>
        <tbody>
            <?php foreach($arrayActual as $actualizacion):?>
            <tr>
                <td>
                    <?php echo $actualizacion->tipo_actualiz?>
                </td>
                <td>
                    <?php echo $actualizacion->institucion?>
                </td>
                <td>
                    <?php echo $actualizacion->pais?>
                </td>
                <td>
                    <?php echo $actualizacion->year?>
                </td>
                 <td>
                    <?php echo $actualizacion->hora?>
                </td>
                <td class="action">
                    <!---boton para llamar al formulario modal, para editar Actualización docente-->
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editActualizacion" data-inst="<?php echo $actualizacion->institucion?>" data-pais="<?php echo $actualizacion->pais?>" data-year="<?php echo $actualizacion->year?>" data-tipo="<?php echo $actualizacion->tipo_actualiz?>" data-hora="<?php echo $actualizacion->hora?>" data-id="<?php echo $actualizacion->id_actualiz?>">Editar</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteActualiz" data-inst="<?php echo $actualizacion->institucion?>" data-id="<?php echo $actualizacion->id_actualiz?>">X</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
