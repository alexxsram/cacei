<!--Tabla de los productos academicos-- Usado en index.php-->
<!--Tabala responsive de productos academicos-->
<?php
session_start();
if(!isset($_SESSION['usuario']) and $_SESSION['estado'] != 'Autenticado') {
  header('Location: ../../index.php');
}
$codigo=$_SESSION['usuario'];
    include ("../../model/conexion.php");
    $sql = "SELECT * FROM C_PRODUCTO_ACAD WHERE fk_profesor=$codigo";
    $arrayProducto = $base->query($sql)->fetchAll(PDO::FETCH_OBJ);
?>
    <table class="table table-bordered">
        <thead>
            <tr class="info">
                <th>Titulo</th>
                <th>Autor</th>
                <th>Fecha publicación</th>
                <th>Lugar publicación</th>
                <th>Número de registro</th>
                <th>Tipo</th>
                <th>Alcance</th>
                <th>Descripción</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($arrayProducto as $producto):?>
            <tr>
                <td>
                    <?php echo $producto->titulo?>
                </td>
                <td>
                    <?php echo $producto->autor?>
                </td>
                <td>
                    <?php echo $producto->fecha_public?>
                </td>
                <td>
                    <?php echo $producto->lugar_public?>
                </td>
                <td>
                    <?php echo $producto->num_registro?>
                </td>
                <td>
                    <?php echo $producto->tipo?>
                </td>
                <td>
                    <?php echo $producto->alcance?>
                </td>
                <td>
                    <?php echo $producto->descripcion?>
                </td>
                <td class="action">
                    <!--boton para llamar al formulario modal, para editar productos academicos-->
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editProducto" data-titulo="<?php echo $producto->titulo?>" data-autor="<?php echo $producto->autor?>" data-fecha="<?php echo $producto->fecha_public ?>" data-lugar="<?php echo $producto->lugar_public?>" data-tipo="<?php echo $producto->tipo?>" data-num="<?php echo $producto->num_registro?>" data-alcance="<?php echo $producto->alcance?>" data-descripcion="<?php echo $producto->descripcion?>" data-id="<?php echo $producto->id_producto?>">Editar</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteProducto" data-id="<?php echo $producto->id_producto?>" data-title="<?php echo $producto->titulo?>">X</button>
                </td>
            </tr>
             <?php
            endforeach;
        ?>
        </tbody>
    </table>
