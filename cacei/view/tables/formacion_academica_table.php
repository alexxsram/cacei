<!--Tabala responsive de formacion academica usada en index.php-->
<?php
session_start();
$codigo=$_SESSION['usuario'];
if(!isset($_SESSION['usuario']) and $_SESSION['estado'] != 'Autenticado') {
  header('Location: ../../index.php');
}
    include ("../../model/conexion.php");
    $sql = "SELECT * FROM C_FORMACION_ACAD WHERE fk_profesor=$codigo";
    $arrayFormacion = $base->query($sql)->fetchAll(PDO::FETCH_OBJ);
?>
<table class="table table-bordered">
    <thead>
        <tr class="info">
            <th >Nivel</th>
            <th >Nombre</th>
            <th >Intitución</th>
            <th >País</th>
            <th >Año de obtencion</th>
            <th >Cédula Profesional</th>
            <th  class="action">Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($arrayFormacion as $formacion):?>
        <tr>
            <td><?php echo $formacion->nivel?></td>
            <td><?php echo $formacion->nombre?></td>
            <td><?php echo $formacion->institucion?></td>
            <td><?php echo $formacion->pais?></td>
            <td><?php echo $formacion->year?></td>
            <td><?php echo $formacion->cedula?></td>
            <td class="accion">
                <!---boton para llamar al formulario modal, para editar formacion academica-->
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editFormacion" data-nombre="<?php echo $formacion->nombre?>"
                  data-inst="<?php echo $formacion->institucion?>" data-pais="<?php echo $formacion->pais?>" data-year="<?php echo $formacion->year?>"
                  data-cedula="<?php echo $formacion->cedula?>" data-nivel="<?php echo $formacion->nivel?>" data-idf="<?php echo $formacion->id_formacion?>">Editar</button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteFormacion" data-id="<?php echo $formacion->id_formacion?>" data-nombre="<?php echo $formacion->nombre?>">X</button>
            </td>
        </tr>
        <?php
            endforeach;
        ?>
    </tbody>
</table>
