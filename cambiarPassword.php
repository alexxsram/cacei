<?php
session_start();
function agregaSelectRango($inicio, $fin)
{
    for($i = $inicio; $i <= $fin; $i++)
    {
        echo '<option>'.sprintf("%02d", $i).'</option>';
    }
}
?>

<html>

    <?php include 'includes/head.php'; ?>

    <body style="background-color: #282B2D; margin: 0 auto; padding: 0;">
        <!-- Navegación (Menu) -->
        <?php include 'includes/header.php'; ?>
        
        <form enctype="multipart/form-data" class="form-horizontal" role="form" action="php/cambiaPassword.php" method="post">
            <div class="section" style="margin: 100px 0px;">
                <div class="container">
                    <div class="row">
                    </div>
                        
                    <div class="row ">
                        <div class="col-md-10">
                            <div class="form-group" id="form-antiguoPassword">
                                    <label for="nombre" style="color: white; " class="control-label ">ANTIGUO PASSWORD</label>
                                    <input type="password" class="form-control input-lg" id="antiguoPassword" name="antiguoPassword" placeholder="ANTIGUO PASSWORD">
                                    <span id="helpAntiguoPassword" class="help-block "></span>
                                </div>
                            <div class="form-group" id="form-nuevoPassword">
                                    <label for="nombre" style="color: white; " class="control-label ">NUEVO PASSWORD</label>
                                    <input type="password" class="form-control input-lg" id="nuevoPassword" name="nuevoPassword" placeholder="NUEVO PASSWORD">
                                    <span id="helpNuevoPassword" class="help-block "></span>
                                </div>
                            <div class="form-group" id="form-confirmaPassword">
                                    <label for="nombre" style="color: white; " class="control-label ">CONFIRMAR NUEVO PASSWORD</label>
                                    <input type="password" class="form-control input-lg" id="confirmaPassword" name="confirmaPassword" placeholder="CONFIRMAR NUEVO PASSWORD">
                                    <span id="helpConfirmaPassword" class="help-block "></span>
                                </div>
                        </div>
                    </div>

                    <div class="row" style="margin: 30px 0px;">
                        <div class="col-md-10 text-center">
                            <button type="submit" class="btn btn-lg btn-success" style="float: none; margin: 0 auto;">CAMBIAR PASSWORD</button>
                        </div>
                    </div>



                </div>
            </div>
        </form>
    </body>

</html>