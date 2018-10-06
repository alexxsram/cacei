<?php
include ("../model/conexion.php");
try{
    $sql = "SELECT * FROM C_ADMINISTRADOR WHERE codigo = :user";
    $resultado = $base->prepare($sql);
    $user = htmlentities(addslashes($_POST['admin']));
    $pass = htmlentities(addslashes($_POST['inputPassword']));
    $resultado->bindValue(":user", $user);
    $resultado->execute();
    $num = $resultado->rowCount();
    if($num != 0){
        session_start();
        $admin = $resultado->fetch(PDO::FETCH_OBJ);
        if(password_verify($pass, $admin->password)){
          $_SESSION['nombre'] = $admin->nombre ." ". $profesor->apellido_paterno;
          $_SESSION['admin'] = $user;
          $_SESSION['estado_a'] = 'Autenticado';
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
