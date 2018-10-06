<?php
include ("conexion.php");
try{
    $sql = "SELECT * FROM C_PROFESOR WHERE Id_profesor = :id";
    $resultado = $base->prepare($sql);
    $codigo = htmlentities(addslashes($_POST['profesor']));
    $pass = htmlentities(addslashes($_POST['inputPassword']));
    $resultado->bindValue(":id", $codigo);
    $resultado->execute();
    $num = $resultado->rowCount();
    if($num != 0){
        session_start();
        $profesor = $resultado->fetch(PDO::FETCH_OBJ);
        if(password_verify($pass,$profesor->pass)){
          $_SESSION['nombre'] = $profesor->nombre." ".$profesor->apellido_paterno;
          $_SESSION['usuario'] = $codigo;
          $_SESSION['estado'] = 'Autenticado';
          echo "1";
        }
        else {
          echo "Contraseña incorrecta";
        }
    }else{
        echo "Código no encontrado";
    }
}catch(Exception $e){
    die("Error: ". $e->getMessage());
}
?>
