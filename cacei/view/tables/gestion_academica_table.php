<!--Tabla de gestion academica,Usado en index.php-->
<!--Tabala responsive de gestion academica-->
<?php
session_start();
if(!isset($_SESSION['usuario']) and $_SESSION['estado'] != 'Autenticado') {
  header('Location: ../../index.php');
}
$codigo=$_SESSION['usuario'];
    include ("../../model/conexion.php");
    $sql = "SELECT * FROM C_GESTION_ACAD WHERE fk_profesor=$codigo";
    $arrayGestion = $base->query($sql)->fetchAll(PDO::FETCH_OBJ);
?>
    <table class="table table-bordered">
        <thead>
            <tr class="info">
                <th scope="col">Actividad o puesto</th>
                <th scope="col">Intitución</th>
                <th scope="col">De: (mes y año)</th>
                <th scope="col">A: (mes y año)</th>
                <th scope="col" class="action">Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($arrayGestion as $gestion):?>
            <tr>
                <td><?php echo $gestion->actividad ?></td>
                <td><?php echo $gestion->institucion ?></td>
                <td><?php echo $gestion->fecha_inicio ?></td>
                <td><?php echo $gestion->fecha_fin ?></td>
                <td class="action">
                    <!---boton para llamar al formulario modal, para editar gestion academica-->
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editGestion" data-act="<?php echo $gestion->actividad ?>" data-inst="<?php echo $gestion->institucion?>" data-fechai="<?php echo $gestion->fecha_inicio ?>" data-fechaf="<?php echo $gestion->fecha_fin ?>" data-id="<?php echo $gestion->id_gestion ?>">Editar</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteGestion" data-act="<?php echo $gestion->actividad ?>" data-id="<?php echo $gestion->id_gestion ?>">X</button>
                </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
    </table>
