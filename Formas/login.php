<html>
<!-- Codigo para iniciar sesion -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <link href="http://johnafleming.cucei.udg.mx/cvmaestros/css/bootstrap.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <div class="section">
            <div class="container">
                <div class="row row-centered">
                    <div class="col-md-4 col-centered" style="float:none; margin: 0 auto; max-width: 300px;">
                        <img src="../images/logo-udg.png" class="center-block img-responsive">
                        <form role="form" action="inicioSesion.php" method="post">
                            <div class="form-group">
                                <label class="control-label" for="codigo">Usuario</label>
                                <input class="form-control" id="codigo" placeholder="Usuario"
                                       name="codigo" type="text">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input class="form-control" id="password" name="password"
                                       placeholder="Password" type="password">
                            </div>
                            <button type="Submit" class="btn btn-block btn-default btn-success">Acceder</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>