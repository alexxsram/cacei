<?php

session_start();

$codigo = $_GET["codigo"];
$existe = false;
function revisaEstadoCheckBox($fila ,$nombreCheckbox, $valorSeleccionado)
{
    if($fila[$nombreCheckbox] == $valorSeleccionado)
    {
        return "Si";
    }
    else
    {
        return "No";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
    <?php include 'includes/head.php'; ?>
    
    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
        <?php include 'includes/header.php'; ?>
        <?php
        $conexion = mysqli_connect("localhost","cvmaestros","H52ZhcNUD");
        mysqli_select_db($conexion, "cvmaestros_db");

        if(!empty($codigo))
            $sql = "SELECT * FROM maestro WHERE codigo = " . $codigo;

        $result = $conexion->query($sql);

        if ($result->num_rows == 1) {

            $existe = true;
            $row = $result->fetch_assoc();

            if(!file_exists($row["foto"]))
                $row["foto"] = "http://pingendo.github.io/pingendo-bootstrap/assets/user_placeholder.png";

            echo "  
                    <div class=\"section\" style=\"margin-top: 80px;\">
                        <div class=\"container\">
                            <div class=\"row\">
                                <div class=\"col-md-12\">
                                    <div class=\"container\" style=\"max-width: 400px; margin: 10px auto;\">
                                        <div class=\"academico-container\">
                                            <a>
                                                <div class=\"circle-avatar\" style=\"background-image:url('" . $row['foto'] . "');\"></div>
                                                <h3><center>" . $row['nombre'] . " " . $row['apellidoPaterno'] . " " . $row['apellidoMaterno'] . "</center></h3>
                                                <p></p><center>" . $row['tipoContrato'] . "</center><p></p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            ";

        } else {
            echo "<h1 style=\"color: white;\">404 Not Found</h1>";
        }

        ?>

        <div class="section" style="margin: 20px auto 100px auto;">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <ul class="tab-nav">
                            <li class="tablinks selected" onclick="openCity(event, 'Personal')">
                                <p>Datos Personales</p>
                            </li>
                            <li class="tablinks"  onclick="openCity(event, 'Laboral')">
                                <p>Datos Laborales</p>
                            </li>
                            <?php 
                            $queryConsultaLicenciatura =     "SELECT codigo FROM estudio WHERE codigo = " . $codigo . " AND nivel = 'Licenciatura'";
                            $resultadoConsultaLicenciatura = mysqli_query($conexion, $queryConsultaLicenciatura);
                            if(mysqli_num_rows($resultadoConsultaLicenciatura) == 1) {
                                echo '<li class="tablinks" onclick="openCity(event, \'Licenciatura\')">
                                <p>Licenciatura</p>
                            </li>';
                            }
                            ?>
                            <?php 
                            $queryConsultaMaestria =     "SELECT codigo FROM estudio WHERE codigo = " . $codigo . " AND nivel = 'Maestria'";
                            $resultadoConsultaMaestria = mysqli_query($conexion, $queryConsultaMaestria);
                            if(mysqli_num_rows($resultadoConsultaMaestria) == 1) {
                                echo '<li class="tablinks" onclick="openCity(event, \'Maestria\')">
                                <p>Maestria</p>
                            </li>';
                            }
                            ?>
                            <?php 
                            $queryConsultaDoctorado =     "SELECT codigo FROM estudio WHERE codigo = " . $codigo . " AND nivel = 'Doctorado'";
                            $resultadoConsultaDoctorado = mysqli_query($conexion, $queryConsultaDoctorado);
                            if(mysqli_num_rows($resultadoConsultaMaestria) == 1) {
                                echo '<li class="tablinks" onclick="openCity(event, \'Doctorado\')">
                                <p>Doctorado</p>
                            </li>';
                            }
                            ?>
                            <li class="tablinks" onclick="openCity(event, 'Materias')">
                                <p>Materias</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-9">
                        <div class="infoContainer">

                            <div id="Personal" class="tabcontent">
                                <h2 class="infoContainerTitle">Informaci&oacute;n Personal</h2>
                                <?php

                                if ($existe) {
                                    include 'includes/infoPersonal.php';
                                }

                                ?>
                            </div>

                            <div id="Laboral" class="tabcontent" style="display: none;">
                                <h2 class="infoContainerTitle">Informaci&oacute;n Laboral</h2>
                                <?php

                                if ($existe) {
                                    include 'includes/infoLaboral.php';
                                }

                                ?>
                            </div>

                            <div id="Academica" class="tabcontent" style="display: none;">
                                <h2 class="infoContainerTitle">Informaci&oacute;n Academica</h2>
                                <?php

                                if ($existe) {
                                    include 'includes/infoAcademica.php';
                                }

                                ?>
                            </div>
                            <div id="Materias" class="tabcontent" style="display: none;">
                                <h2 class="infoContainerTitle">Materias</h2>
                                <?php

                                if ($existe) {
                                    include 'includes/infoMaterias.php';
                                }

                                ?>
                            </div>
                            <div id="Licenciatura" class="tabcontent" style="display: none;">
                                <h2 class="infoContainerTitle">Licenciatura</h2>
                                <?php

                                if ($existe) {
                                    include 'includes/infoLicenciatura.php';
                                }

                                ?>
                            </div>
                            <div id="Maestria" class="tabcontent" style="display: none;">
                                <h2 class="infoContainerTitle">Maestria</h2>
                                <?php

                                if ($existe) {
                                    include 'includes/infoMaestria.php';
                                }

                                ?>
                            </div>
                            <div id="Doctorado" class="tabcontent" style="display: none;">
                                <h2 class="infoContainerTitle">Doctorado</h2>
                                <?php

                                if ($existe) {
                                    include 'includes/infoDoctorado.php';
                                }

                                ?>
                            </div>

                            <script>

                                function openCity(evt, cityName) {
                                    // Declare all variables
                                    var i, tabcontent, tablinks;

                                    // Get all elements with class="tabcontent" and hide them
                                    tabcontent = document.getElementsByClassName("tabcontent");
                                    for (i = 0; i < tabcontent.length; i++) {
                                        tabcontent[i].style.display = "none";
                                    }

                                    // Get all elements with class="tablinks" and remove the class "active"
                                    tablinks = document.getElementsByClassName("tablinks");
                                    for (i = 0; i < tablinks.length; i++) {
                                        tablinks[i].className = tablinks[i].className.replace(" selected", "");
                                    }

                                    // Show the current tab, and add an "active" class to the link that opened the tab
                                    document.getElementById(cityName).style.display = "block";
                                    evt.currentTarget.className += " selected";
                                }

                            </script>

                        </div>
                    </div>

                    <div class="col-md-3" style="padding: 0 30px;">

                        <div class="row">
                            <div class="infoContainer topLeftBorderRadius">
                                <h4 class="infoContainerTitle">Documentos</h4>

                                <?php

                                if($existe) {

                                    $sql = "SELECT * FROM documento WHERE codigo = " . $codigo;

                                    $result = $conexion->query($sql);

                                    if ($result->num_rows > 0) {

                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {

                                            echo "<a href=\"" . $row['pathPdf'] . "\" style=\"color: white;\" target='_blank'><h5 class=\"linkDocumento\">" . $row['documento'] ."</h5></a>";

                                        }
                                    }
                                }

                                ?>

                            </div>
                        </div>

                        <div class="row">
                            <div class="infoContainer">
                                <h4 class="infoContainerTitle">Idiomas</h4>
                                <?php

                                if($existe) {

                                    $sql = "SELECT * FROM idioma WHERE codigo = " . $codigo;

                                    $result = $conexion->query($sql);

                                    if ($result->num_rows > 0) {

                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {

                                            include 'includes/infoIdioma.php';

                                        }
                                    }
                                }

                                ?>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="infoContainer">
                                <h4 class="infoContainerTitle">Programas</h4>
                                <?php

                                if($existe) {

                                    $sql = "SELECT * FROM habilidadcomputo WHERE codigo = " . $codigo;

                                    $result = $conexion->query($sql);

                                    if ($result->num_rows > 0) {

                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {

                                            include 'includes/infoHabilidad.php';

                                        }
                                    }
                                }

                                ?>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="infoContainer">
                                <h4 class="infoContainerTitle">Dependientes</h4>
                                <?php

                                if($existe) {

                                    $sql = "SELECT * FROM dependiente WHERE codigo = " . $codigo;

                                    $result = $conexion->query($sql);

                                    if ($result->num_rows > 0) {

                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {

                                            include 'includes/infoDependiente.php';

                                        }
                                    }
                                }

                                ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <?php
                session_start();
                if($_SESSION["username"] == $codigo)
                {
                    echo '<div class="container">
                    <form class="form-horizontal" role="form" action="cambio.php" method="post">
                        <button type="button" class="btn btn-success" data-dismiss="modal" onclick="location=\'cambiarPassword.php\'">Cambiar password</button>
                        <button type="submit" class="btn btn-success" data-dismiss="modal">Modificar información</button>
                        <input type="hidden" id ="editar" name="editar" value="'.$_SESSION["username"].'">
                    </form>
                    </div>';
                }
                else
                {
                    $result = $conexion->query("SELECT codigo FROM administrador WHERE codigo = $username");
                    if ($result->num_rows == 1) {
                        echo '<div class="container">
                        <form class="form-horizontal" role="form" action="cambio.php" method="post">
                            <button type="button" class="btn btn-success" data-dismiss="modal" onclick="location=\'cambiarPassword.php\'">Cambiar password</button>
                            <button type="submit" class="btn btn-success" data-dismiss="modal">Modificar información</button>
                            <input type="hidden" id ="editar" name="editar" value="'.$codigo.'">
                        </form>
                        </div>';
                    }
                }
            ?>
        </div>

        <footer class="section" style="background-color: white; padding: 50px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" style="text-align: center;">
                        <img src="imagenes/logo-udg.png" class="img-responsive" style="max-width: 150px; margin: 0 auto;">
                        <h5>Sistema de Información de Profesores y Académicos</h5>
                        <h4>2016</h4>
                    </div>
                </div>
            </div>
        </footer>

    </body>

</html>