<?php
class Materia {
    public $id_materia;
    public $nombre;
    
    const TABLA = 'EA_MATERIA';

    public function __construct($i, $n) {
        $this->id_materia = $i;
        $this->nombre = $n;
    }

    public static function buscarPorId($id){
        include ("conexion.php");
        $consulta = $base->prepare('SELECT id_materia, nombre FROM ' . self::TABLA . ' WHERE id_materia = :id');
        $consulta->bindParam(':id', $id);
        $consulta->execute();
        $registro = $consulta->fetch();
        if($registro){
            return new self($registro['id_materia'], $registro['nombre']);
        }
        else{
            return false;
        }
    }

    /*public static function recuperarTodos(){
        include("../server.php");
        $sql = 'SELECT * FROM ' . self::TABLA;
        return $array = $base->query($sql)->fetchAll(PDO::FETCH_OBJ);
    }*/
}
?>
