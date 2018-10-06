<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Arvo:400,700|Montserrat:400,700" rel="stylesheet">

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/general.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/navbar.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/half-slider.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/circle-avatar.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/academicos.css" rel="stylesheet">

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Scrolling Nav JavaScript -->
        <script src="js/jquery.easing.min.js"></script>
        <script src="js/scrolling-nav.js"></script>
        <script src="js/navbar.js"></script>

        <title>DIVEC | Personal Academico</title> 
    </head>

    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

        <!-- Navegación (Menu) -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button id="menu" type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar" id="t"></span>
                        <span class="icon-bar" id="m"></span>
                        <span class="icon-bar" id="b"></span>
                    </button>
                    <a class="page-scroll" href="#page-top">
                        <div class="brand-container">
                            <h1 class="divecTitle">DIVEC</h1>
                            <h1 class="divecPipe">|</h1>
                            <h4 class="personalTitle">Personal Academico</h4>
                        </div>
                    </a>
                </div>

                <!-- Toma todos los links del menu para condensar el menu movil -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden">
                            <a class="page-scroll" href="#page-top"></a>
                        </li>
                        <li>
                            <a class="" href="">Inicio</a>
                        </li>
                        <li>
                            <a class="" href="">Personal Academico</a>
                        </li>
                        <li>
                            <a class="" href="">Contacto</a>
                        </li>
                        <li>
                           <?php
                                if(empty($_SESSION)) {
                                    echo "<a class=\"login-button\" id=\"login-button\" href=\"login.php\">Iniciar Sesi&oacute;n</a>";
                                } else {
                                    echo "<a href=\"#user\">" . $_SESSION["username"] . "</a>";
                                }
                            
                            ?>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

    </body>

</html>