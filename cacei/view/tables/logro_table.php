<!--Tabla de los Logros profesionales (no académicos)-- Usado en index.php-->
<!--Tabala responsive de los logros profesionales (no académicos)-->
<?php
session_start();
if(!isset($_SESSION['usuario']) and $_SESSION['estado'] != 'Autenticado') {
  header('Location: ../../index.php');
}
$codigo=$_SESSION['usuario'];
    include ("../../model/conexion.php");
    $sql = "SELECT * FROM C_LOGRO_PROF WHERE fk_profesor=$codigo";
    $arrayLogro= $base->query($sql)->fetchAll(PDO::FETCH_OBJ);
?>

    <table class="table table-bordered">
        <thead>
            <tr class="info">
                <th>#</th>
                <th>Titulo</th>
                <th>Autor</th>
                <th>Nombre</th>
                <th>Relevancia</th>
                <th>Acción</th>
                <th>Lugar</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            <?php
              $contador = 1;
            foreach($arrayLogro as $logro):?>
            <tr>
              <td><?php echo $contador?>
                <td>
                    <?php echo $logro->titulo?>
                </td>
                <td>
                    <?php echo $logro->autor?>
                </td>
                <td>
                    <?php echo $logro->nombre?>
                </td>
                <td>
                    <?php echo $logro->relevancia?>
                </td>
                 <td>
                    <?php echo $logro->lugar?>
                </td>
                  <td>
                    <?php echo $logro->descripcion;?>
                </td>
                <td class="action">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editLogro" data-titulo="<?php echo $logro->titulo?>" data-autor="<?php echo $logro->autor?>" data-nombre="<?php echo $logro->nombre?>" data-relevancia="<?php echo $logro->relevancia?>" data-lugar="<?php echo $logro->lugar?>" data-descrip="<?php echo $logro->descripcion?>" data-id="<?php echo $logro->id_logro?>">Editar</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteLogro" data-num="<?php echo $contador?>" data-id="<?php echo $logro->id_logro?>">X</button>
                </td>
            </tr>
            <?php
              $contador++;
          endforeach; ?>
        </tbody>
    </table>
