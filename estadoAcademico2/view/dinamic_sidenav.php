
  <h4>Materias con reportes</h4>
  <ul class="nav nav-pills nav-stacked">
    	<li data-toggle="modal" data-target="#addReporte"><a href="#">Crear un reporte</a></li>
<?php
try{
  session_start();
  require("../model/conexion.php");
  $sql = "SELECT * FROM EA_REPORTE WHERE fk_profesor = :id ORDER BY id ASC";
  $resultado = $base->prepare($sql);
  $codigo = htmlentities(addslashes($_SESSION['usuario']));
  $resultado->bindValue(":id", $codigo);
  $resultado->execute();
  $arrayReporte = $resultado->fetchAll(PDO::FETCH_OBJ);
  $i = 1;
  foreach ($arrayReporte as $reporte):
    /*$sql = "SELECT nombre FROM EA_MATERIA WHERE id = :m";
    $resultado = $base->prepare($sql);
    $resultado->bindValue(":m", $reporte->fk_materia);
    $resultado->execute();
    $materia = $resultado->fetch(PDO::FETCH_OBJ);
    //echo "<li><a href='#'  onclick='cargarTablaS(this);' id='".$reporte->id.">" . $materia->nombre." (".$reporte->seccion.")</a></li>";
    //echo "<li>  <button type='button' id='".$reporte->id."' onclick='cargarTablaS(this);' class='btn btn-default btn-block'>". $materia->nombre."</button></li>";
    */
    require_once '../model/clsMateriaProfesor.php';
    require_once '../model/clsMateria.php';
    $nrc = ProfesorMateria::buscarPorId($reporte->fk_materia);
    $materia = Materia::buscarPorId($nrc->materia);
    ?>

    <li><a href="#" onclick="cargarTablaS(this);" id="<?php echo $reporte->id?>"><?php echo $materia->nombre." (".$nrc->seccion.")"?></a></li>
    <?php
  endforeach;
}catch(Exception $e){
    echo "Linea del error: ".$e->GetMessage();
  }
  ?>
</ul><br>
