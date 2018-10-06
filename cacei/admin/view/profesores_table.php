<?php
    session_start();
    if(!isset($_SESSION['admin']) and $_SESSION['estado_a'] != 'Autenticado') {
      header('Location: index.php');
    }

    include ("../../model/conexion.php");
    $sql = "SELECT * FROM C_PROFESOR ORDER BY nombre ASC";
    $arrayProfesor = $base->query($sql)->fetchAll(PDO::FETCH_OBJ);
?>
    <table class="table table-bordered">
        <thead>
            <tr class="info">
                <th>Código</th>
                <th>Nombre</th>
                <th>
                  fecha de nacimiento
                </th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($arrayProfesor as $profesor):?>
            <tr>
                <td>
                    <?php echo $profesor->Id_profesor?>
                </td>
                <td>
                    <?php echo $profesor->nombre . " ".$profesor->apellido_paterno ." " .$profesor->apellido_materno?>
                </td>
                <td>
                  <?php echo $profesor->fecha_nacimiento ?>
                </td>
                <td class="action">
                    <!--boton para llamar al formulario modal, para agregar capacitacion docente-->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteProfesor" data-id="<?php echo $profesor->Id_profesor ?>">X</button>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#restablecer" data-id="<?php echo $profesor->Id_profesor ?>">Restablecer contraseña</button>

                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
