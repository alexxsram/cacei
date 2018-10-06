<!--Tabla de Membresía o participación en Colegios, Cámaras, asociaciones científicas o algún otro tipo de organismo profesional-- Usado en index.php-->
<!--Tabala responsive de membresia...-->
<?php
session_start();
if(!isset($_SESSION['usuario']) and $_SESSION['estado'] != 'Autenticado') {
  header('Location: ../../index.php');
}
$codigo=$_SESSION['usuario'];
    include ("../../model/conexion.php");
    $sql = "SELECT * FROM C_MEMBRESIA WHERE fk_profesor=$codigo";
    $arrayMembresia = $base->query($sql)->fetchAll(PDO::FETCH_OBJ);
?>
   <table class="table table-bordered">
        <thead>
            <tr class="info">
                <th>#</th>
                <th>Organismo</th>
                <th>Número de años</th>
                <th>tipo</th>
                <th>Información relevante</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $contador = 1;
            foreach($arrayMembresia as $membresia):?>
            <tr>
                <td><?php echo $contador?></td>
                <td>
                    <?php echo $membresia->organismo?>
                </td>
                <td>
                    <?php echo $membresia->num_years?>
                </td>
                <td>
                    <?php echo $membresia->tipo?>
                </td>
                <td>
                    <?php echo $membresia->info_extra?>
                </td>
                <td class="action">
                    <!--boton para llamar al formulario modal, para editar logros profesionales-->
                     <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editMembresia" data-organ="<?php echo $membresia->organismo?>" data-years="<?php echo $membresia->num_years?>" data-tipo="<?php echo $membresia->tipo?>" data-info="<?php echo $membresia->info_extra?>" data-id="<?php echo $membresia->id_membresia?>">Editar</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteMembresia" data-num="<?php echo $contador?>" data-id="<?php echo $membresia->id_membresia?>">X</button>
                </td>
            </tr>
             <?php
             $contador++;
           endforeach; ?>
        </tbody>
    </table>
