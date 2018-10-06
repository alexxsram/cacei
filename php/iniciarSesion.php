<?php 
include('../includes/conexion.php');
$user = $_POST["username"];
$pass = $_POST["password"];

if(empty($user))
    echo "VACIO";

if(!empty($user) AND !empty($pass))
{
    $query = "SELECT * FROM administrador WHERE codigo = \"" . $user . "\"";
    $resultadoConsulta = mysqli_query($conexion, $query);

    if(mysqli_num_rows($resultadoConsulta) == 1)
    {
        $row = mysqli_fetch_assoc($resultadoConsulta);

        if(md5($pass) == $row["password"])
        {
            session_start();
            //Aqui se indica a usar el codigo ingresado en la variable SESSION
            $_SESSION["username"] = $user;
            echo "sesion iniciada";
            
            //Redireccionar
            header('Location: ../index.php');
        }
		else{
			echo "Contraseña erronea";
		}
    } else {
        $query = "SELECT * FROM maestro WHERE codigo = \"" . $user . "\"";

        $resultadoConsulta = mysqli_query($conexion, $query);

        if(mysqli_num_rows($resultadoConsulta) == 1)
        {
            $row = mysqli_fetch_assoc($resultadoConsulta);

            if(md5($pass) == $row["password"])
            {
                session_start();
                //Aqui se indica a usar el codigo ingresado en la variable SESSION
                $_SESSION["username"] = $user;
                echo "sesion iniciada";
                //Redireccionar
                header('Location: ../academico.php?codigo='.$user);
            }
			else{
				echo "Contraseña erronea";
			}
        } else {
            echo "Usuario o contraseña incorrectos";
        }
    }
} else {
    echo "campos vacios";
}
?>