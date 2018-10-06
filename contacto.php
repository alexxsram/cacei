<!-- Inicio de Sesión -->
<?php session_start(); ?>

<!DOCTYPE html>

        <!-- Archivos de Cabecera (css, js) -->
        <?php include 'includes/head.php'; ?>
        <!-- Menu -->
        <?php include 'includes/header.php'; ?>
        <!-- Mapa -->
        <?php include 'includes/mapa.php'; ?>        
        
<html lang="es">
        <!-- EXTRACT ADDITIONAL STYLING HERE =======> -->

    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
        <div id="contacto" class="fondo-section" style="margin: 0 auto; padding: 0;">
            <div class="container">
                <div class="row">
                  <div class="col-md-9">
                       <div class="contacto-section">
                        <h2>Contáctenos</h2>
                        <form role="form" id="feedbackForm">
                            <div class="form-group">
                                <label class="control-label" for="name">Nombres *</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Introduzca su nombre" />
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-unchecked form-control-feedback"></i></span>
                                </div>
                                <span class="help-block" style="display: none;">Por favor, escriba su nombre.</span>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="email">Motivo de Contacto*</label>
                                <select name="reason" class="form-control">
                                    <option value="Consulta General">Consulta General</option>
                                    <option value="Aviso Informacion">Aviso Informacion</option>
                                    <option value="Informe un problema">Informe un problema</option>
                                </select>
                                <span class="help-block" style="display: none;">Por favor, introduce una dirección de correo electrónico válida.</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="email">Dirección de Correo Electrónico *</label>
                                <div class="input-group">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Introduzca su correo electrónico" />
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-unchecked form-control-feedback"></i></span>
                                </div>
                                <span class="help-block" style="display: none;">Por favor, introduzca una dirección de correo electrónico válida.</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="message">Mensaje *</label>
                                <div class="input-group">
                                    <textarea rows="5" cols="30" class="form-control" id="message" name="message" placeholder="Introduzca su mensaje" ></textarea>
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-unchecked form-control-feedback"></i></span>
                                </div>
                                <span class="help-block" style="display: none;">Por favor, introduzca un mensaje.</span>
                            </div>
                            <img id="captcha" src="library/vender/securimage/securimage_show.php" alt="CAPTCHA Image" />
                            <a href="#" onclick="document.getElementById('captcha').src = 'library/vender/securimage/securimage_show.php?' + Math.random(); return false" class="btn btn-info btn-sm">Mostrar una imagen diferente</a><br/>
                            <div class="form-group" style="margin-top: 10px;">
                                <label class="control-label" for="captcha_code">Texto dentro de la Imagen *</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="captcha_code" id="captcha_code" placeholder="Por razones de seguridad, por favor ingrese el código que aparece en el cuadro." />
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-unchecked form-control-feedback"></i></span>
                                </div>
                                <span class="help-block" style="display: none;">Por favor introduce el código que aparece en la imagen.</span>
                            </div>
                            <span class="help-block" style="display: none;">Por favor ingrese el código de la seguridad.</span>
                            <button type="submit" id="feedbackSubmit" class="btn btn-primary btn-lg" data-loading-text="Enviando..." style="display: block; margin-top: 10px;">Enviar comentarios</button>
                        </form>
                   </div><!--/span-->
                   </div>
                   <div class="col-md-3">
                   <p style="margin-top: 100px; font-size: 1.0em; font-family: 'Montserrat', sans-serif; font-wight: 400; color: #363636;  text-align: justify;">Por favor, llenar todos los campos. <br><br>Gracias por escribirnos.<br>Pronto responderemos su consulta.<br></p>
                   </div>
                </div><!--/row--> 
            </div>
        </div>
        <hr>
        <!-- <======= UP TO HERE -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="assets/vender/intl-tel-input/js/intlTelInput.min.js"></script>
        <script src="assets/js/contact-form.js"></script>
        <!-- <======= google maps -->
        <script src="https://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false&amp;key=AIzaSyAg1jLhf7mNVa6a65xc9tCmqQB3khUcVMg"></script>
        <script src="maps/custom.js"></script>

    </body>
     <!-- Pie de pagina -->
     <?php include 'includes/footer.php'; ?>

</html>