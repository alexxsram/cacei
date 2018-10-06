<!--Tabla de experiencia en diseño ingenieril-- Usado en index.php-->
<!--Tabala responsive de Experiencia en diseño ingenieril-->
<?php
session_start();
if(!isset($_SESSION['usuario']) and $_SESSION['estado'] != 'Autenticado') {
  header('Location: ../../index.php');
}
$codigo=$_SESSION['usuario'];
    include ("../../model/conexion.php");
    $sql = "SELECT * FROM C_EXPER_DESING WHERE fk_profesor=$codigo";
    $arrayExperiencia = $base->query($sql)->fetchAll(PDO::FETCH_OBJ);
?>
    <table class="table table-bordered">
        <thead>
            <tr class="info">
                <th scope="col">Organismo</th>
                <th scope="col">Periodo (años)</th>
                <th scope="col">Tipo de experiencia</th>
                <th scope="col">Información extra</th>
                <th scope="col" class="action">Acción</th>
            </tr>
        </thead>
        <tbody>
            <tr>
               <?php foreach($arrayExperiencia as $experiencia):?>
                <td>
                    <?php echo $experiencia->organismo?>
                </td>
                <td>
                    <?php echo $experiencia->periodo?>
                </td>
                <td>
                    <?php echo $experiencia->nivel_exper?>
                </td>
                <td>
                    <?php echo $experiencia->informacion?>
                </td>
                <td class="action">
                    <!--boton para llamar al formulario modal, para editar Experiencia en diseño ingenieril-->
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editExperienciaD" data-organ="<?php echo $experiencia->organismo?>" data-periodo="<?php echo $experiencia->periodo?>" data-nivel="<?php echo $experiencia->nivel_exper?>" data-infor="<?php echo $experiencia->informacion?>" data-id="<?php echo $experiencia->Id_desing?>">Editar</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteExpD" data-id="<?php echo $experiencia->Id_desing?>" data-organ="<?php echo $experiencia->organismo?>">X</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
