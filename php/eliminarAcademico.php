<?php
$codigo = $_POST['eliminar'];
$conexion = mysqli_connect("localhost","cvmaestros","H52ZhcNUD");
mysqli_select_db($conexion, "cvmaestros_db");

$queryConsulta = "SELECT * FROM maestro WHERE codigo = " . $codigo;
$resultadoConsulta = mysqli_query($conexion, $queryConsulta);

if(mysqli_num_rows($resultadoConsulta) == 1)
{
    //Se muestran los datos por cada fila del resultado
    $queryEliminar = "DELETE FROM maestro WHERE codigo = " . $codigo;
    mysqli_query($conexion, $queryEliminar);
    eliminarDir("../Archivos/$codigo");
}

function eliminaEspacioEnBlanco($cadena)
{
    return str_replace(' ', '', $cadena);
}

//Redireccionar
header('Location: ../buscar.php');

function eliminarDir($carpeta)
{
    $files = glob($carpeta.'/*'); // obtiene todos los archivos
    foreach($files as $file){
        if(is_file($file)) // si se trata de un archivo
        {
            unlink($file); // lo elimina
        }
    }
    rmdir($carpeta);

}

?>