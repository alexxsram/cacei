<!DOCTYPE html>
<html lang="es">

    <!-- Archivos de Cabecera (css, js) -->
    <?php include 'includes/head.php'; ?>
	<?php include 'includes/header.php'; ?>

    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" style="background-color: white!important; margin: 100px auto; padding: 0;">

	<div class="section" style="margin: 20px auto 100px auto;">
        <!-- campos para login -->
        <div class="section">
            <div class="container">
                <div class="row row-centered">
                    <div class="col-md-4 col-centered" style="float:none; margin: 0 auto; max-width: 300px;">
                        <img src="imagenes\logo-udg.png" class="center-block img-responsive">
                        <form role="form" method="post" action="php/iniciarSesion.php">
                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">Usuario</label>
                                <input class="form-control" id="exampleInputEmail1" placeholder="Usuario"
                                       type="text" name="username">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="exampleInputPassword1">Password</label>
                                <input class="form-control" id="exampleInputPassword1"
                                       placeholder="Password" type="password" name="password">
                            </div>
                            <button type="Submitr" class="btn btn-block btn-default btn-success">Acceder</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
		<?php include 'includes/footer.php'; ?>
	<div>
    </body>

</html>
