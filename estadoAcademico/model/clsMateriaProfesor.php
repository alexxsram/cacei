<?php
 class ProfesorMateria {
   public $materia;
   public $seccion;
   const TABLA = 'EA_CLASE';

    public function __construct($m, $s) {
        $this->materia = $m;
        $this->seccion = $s;
    }

    public static function buscarPorId($id) {
        include ("conexion.php");
        $consulta = $base->prepare('SELECT fk_materia, seccion FROM ' . self::TABLA . ' WHERE id_clase = :id');
        $consulta->bindParam(':id', $id);
        $consulta->execute();
        $registro = $consulta->fetch();
        if($registro) {
            return new self($registro['fk_materia'], $registro['seccion']);
        }
        else{
            return false;
        }
    }

    public static function recuperarTodos($id) {
      /*include ("conexion.php");
       $sql = 'SELECT  * FROM ' . self::TABLA. 'WHERE fk_profesor= :id' ;
       $resultado = $base->prepare($sql);
       $resultado->bindValue(":id", $id);
       $resultado->execute();
       $array = $resultado->fetchAll(PDO::FETCH_OBJ);
       return $array;
       */
        include ("conexion.php");
        $sql = "SELECT * FROM ".self::TABLA." WHERE fk_profesor =".$id;
        return $base->query($sql)->fetchAll(PDO::FETCH_OBJ);
    }

 }

?>
