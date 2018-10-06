<?php
    session_start();
    if(!isset($_SESSION['admin']) and $_SESSION['estado_a'] != 'Autenticado') {
      header('Location: index.php');
    }

    include ("../../model/conexion.php");
    $sql = "SELECT * FROM C_ADMINISTRADOR WHERE NOT codigo = 212091737";
    $arrayAdmin = $base->query($sql)->fetchAll(PDO::FETCH_OBJ);
?>
    <table class="table table-bordered">
        <thead>
            <tr class="info">
                <th>Código</th>
                <th>Nombre real</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($arrayAdmin as $admin):?>
            <tr>
                <td>
                    <?php echo $admin->codigo?>
                </td>
                <td>
                    <?php echo $admin->nombre . " ". $admin->apellido_p . " ".$admin->apellido_m?>
                </td>
                <td class="action">
                    <!--boton para llamar al formulario modal, para agregar capacitacion docente-->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteAdministrador" data-id="<?php echo $admin->codigo ?>">X</button>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editPass" data-id="<?php echo $admin->codigo ?>">Editar contraseña</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
