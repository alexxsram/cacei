<?php
 class Materia {
   public $nombre;
   const TABLA = 'EA_MATERIA';

    public function __construct($n) {
        $this->nombre = $n;
    }

      public static function buscarPorId($id){
          include ("conexion.php");
           $consulta = $base->prepare('SELECT nombre FROM ' . self::TABLA . ' WHERE id = :id');
           $consulta->bindParam(':id', $id);
           $consulta->execute();
           $registro = $consulta->fetch();
           if($registro){
              return new self($registro['nombre']);
           }else{
              return false;
           }
        }
/*
    public static function recuperarTodos(){
     include("../server.php");
       $sql = 'SELECT * FROM ' . self::TABLA;
       return $array = $base->query($sql)->fetchAll(PDO::FETCH_OBJ);
    }
    */
 }
?>
