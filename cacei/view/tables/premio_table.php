<!--Tabla de Premios, distinciones o reconocimientos recibidos
-- Usado en index.php-->
<!--Tabala responsive de premios...-->
<?php
session_start();
if(!isset($_SESSION['usuario']) and $_SESSION['estado'] != 'Autenticado') {
  header('Location: ../../index.php');
}
$codigo=$_SESSION['usuario'];
    include ("../../model/conexion.php");
    $sql = "SELECT * FROM C_PDR_RECIBIDOS WHERE fk_profesor=$codigo";
    $arrayPremio = $base->query($sql)->fetchAll(PDO::FETCH_OBJ);
?>
    <table class="table table-bordered">
        <thead>
            <tr class="info">
                <th>#</th>
                <th>Nombre</th>
                <th>Organismo</th>
                <th>Motivo</th>
                <th>Descripción</th>
                <th class="action">Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $contador = 1;
            foreach($arrayPremio as $premio):?>
            <tr>
                <td><?php echo $contador?>
                <td>
                    <?php echo $premio->nombre?>
                </td>
                <td>
                    <?php echo $premio->organismo?>
                </td>
                <td>
                    <?php echo $premio->motivo?>
                </td>
                <td>
                    <?php echo $premio->descripcion?>
                </td>
                <td class="action">
                    <!--boton para llamar al formulario modal, para editar Premios, distinciones o reconocimientos recibidos-->
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editPremio" data-organ="<?php echo $premio->organismo?>" data-nombre="<?php echo $premio->nombre?>" data-motivo="<?php echo $premio->motivo?>" data-info="<?php echo $premio->descripcion?>" data-id="<?php echo $premio->id_pdr?>">Editar</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletePremio" data-num="<?php echo $contador?>" data-id="<?php echo $premio->id_pdr?>">X</button>
                </td>
            </tr>
            <?php
            $contador++;
          endforeach; ?>
        </tbody>
    </table>
