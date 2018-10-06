<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/carousel.js"></script>
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Arvo:400,700|Montserrat:400,700" rel="stylesheet">
    </head>

    <body>
        <div class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><span>Directorio Academico</span></a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-ex-collapse" >
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active">
                            <a href="#">Inicio</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Personal Academico <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">Maestros</a>
                                </li>
                                <li>
                                    <a href="#">Investigadores</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Contacto<br></a>
                        </li>
                        <li>
                            <a href="login.php"><button class="btn btn-success" style="margin: -8px auto;">Iniciar Sesión</button></a>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pruebas <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="formulario.html">Alta</a>
                                </li>
                                <li>
                                    <a href="consultaMaestro.php">Consulta</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

        <div class="section" style="margin: 0 auto; padding: 0;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="fullcarousel-example" data-interval="false" class="carousel slide" data-ride="carousel" style="">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="images/Imagen-cucei.jpg">
                                    <div class="carousel-caption">
                                        <h2></h2>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="images/Imagen-academicos.jpg">
                                    <div class="carousel-caption">
                                        <h2></h2>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                            <a class="left carousel-control" href="#fullcarousel-example" data-slide="prev"><i class="icon-prev fa fa-angle-left"></i></a>
                            <a class="right carousel-control" href="#fullcarousel-example" data-slide="next"><i class="icon-next fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div style="display: table; width: 100%; padding: 0px;">
                            <h1 class="divecTitle">DIVEC |</h1>
                            <h4 class="personalTitle">Personal<br>Academico</h4>
                        </div>
                        <h2 class="hf3">Sistema de Información de Profesores y Académicos</h2>
                        <p style="font-size: 1.3em; font-family: 'Montserrat', sans-serif; font-wight: 400; color: #363636">Nuestro objetivo es brindar información respecto a nuestro personal academico,
                            quienes y cuantos maestros lo conforman, así como su nivel de preparación
                            y que nombramiento posee dentro del DIVEC.
                            <br>
                            <br>División académica consolidada. Se compone por profesores de carrera y
                            de asignatura en su mayoría con estudios de posgrado nacional o internacional,
                            además de técnicos académicos, agrupados a su vez en diferentes unidades
                            de apoyo como: Los laboratorios altamente funcionales y provistos de equipos
                            modernos.
                            <br>
                            <br>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" style="margin-bottom: 40px;">
                        <h2 class="hf3" style="text-align: center;">Algunos de Nuestros Académicos:</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="circle-avatar" style="background-image:url(images/maestros/Hassem-Ruben-Macias-Brambila-800x600.jpg)"></div>
                        <h3 class="text-center">Hassem Ruben Macias Brambila</h3>
                        <p class="text-center">Maestro</p>
                    </div>
                    <div class="col-md-4">
                        <div class="circle-avatar" style="background-image:url(images/maestros/Victor-Manuel-Zamora-Ramos-800x600.jpg)"></div>
                        <h3 class="text-center">Victor Manuel Zamora Ramos</h3>
                        <p class="text-center">Maestro</p>
                    </div>
                    <div class="col-md-4">
                        <div class="circle-avatar" style="background-image:url(images/maestros/Eduardo-Alberto-Campos-Serrano-800x600.jpg)"></div>
                        <h3 class="text-center">Eduardo Alberto Campos Serrano</h3>
                        <p class="text-center">Maestro</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p style="font-size: 1.3em; font-family: 'Montserrat', sans-serif; font-wight: 400; color: #363636">Las coordinaciones con programas de licenciatura acreditados y con maestrías de excelencia que son innovadores y de alto impacto social; así como las academias, en donde participan todos sus integrantes de manera pertinente desempeñando actividades de planeación, ejecución y evaluación. Se encuentra siempre inmerso en la mejora continua de la investigación y la difusión de la ciencia y la tecnología electrónica, así como de la calidad del proceso enseñanza-aprendizaje mediante el uso de la tecnología instruccional de vanguardia. <br><br>

                            Que la comunidad Universitaria conozca a nuestros colaboradores responsables de la formación integral de profesionistas de alto nivel.</p>
                    </div>
                </div>
            </div>
        </div>

        <footer class="section" style="background-color: #bdc3c7;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-md-3 text-center">
                                <img src="images/dr_marco_perez.jpg" class="center-block img-responsive" style="margin: 10px auto;">
                            </div>
                            <div class="col-md-8">
                                <p>UNIVERSIDAD DE GUADALAJARA
                                    <br>División de Electrónica y Computación (DIVEC)
                                    <br>Director: Dr. Marco Antonio Pérez Cisneros
                                    <br>Dirección: Blvd. Marcelino García Barragán #1421, esq Calzada Olímpica
                                    <br>Teléfono: (33) 1378 5912
                                    <br>Conmutador: (33) 1378 5900 Ext: 27720
                                    <br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="images/logo-udg.png" class="img-responsive" style="float: right; max-width: 150px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </body>

</html>