<?php 
    include('../includes/conexion.php');
    session_start();
    $user = $_SESSION["username"];
    $antiguoPassword = $_POST["antiguoPassword"];
    $nuevoPassword = $_POST["nuevoPassword"];
    $confirmaPassword = $_POST["confirmaPassword"];
    if($nuevoPassword === $confirmaPassword){
        $nuevoPassword = md5($nuevoPassword);
        $antiguoPassword = md5($antiguoPassword);
        $query = "SELECT * FROM maestro WHERE codigo = \"" . $user . "\" AND password = \"". $antiguoPassword . "\"";
        $resultadoConsulta = mysqli_query($conexion, $query);
        if(mysqli_num_rows($resultadoConsulta) == 1)
        {
            $queryCambio = "UPDATE  maestro SET password = \"" . $nuevoPassword . "\" WHERE codigo = \"" . $user . "\"";
            $resultadoConsulta = mysqli_query($conexion, $queryCambio);
            header('Location: ../academico.php?codigo='.$user);
            
        }
        else
        {
            echo "Password antiguo incorrecto";
        }
    }
    else
    {
        echo "Password de confirmacion no coincide";
    }
?>