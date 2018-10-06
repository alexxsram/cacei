<?php
class Detalle {
    public $id;
    public $fk_reporte;
    public $alumno;
    public $situacion;
    public $comentario;
    const TABLA = 'EA_DETALLE_REPORTE';

    public function __construct($i, $fk, $a, $s, $c) {
        $this->nombre = $n;
        $this->fk_reporte = $fk;
        $this->alumno = $a;
        $this->situacion = $s;
        $this->comentario = $c;
    }

    public static function buscarPorId($id){
        include ("conexion.php");
        $consulta = $base->prepare('SELECT nombre FROM ' . self::TABLA . ' WHERE id = :id');
        $consulta->bindParam(':id', $id);
        $consulta->execute();
        $registro = $consulta->fetch();
        if($registro){
            return new self($registro['nombre']);
        }
        else{
            return false;
        }
    }

    public static function recuperarTodos(){
        include("conexion.php");
        $sql = 'SELECT * FROM ' . self::TABLA;
        return $array = $base->query($sql)->fetchAll(PDO::FETCH_OBJ);
    }

 }
?>
