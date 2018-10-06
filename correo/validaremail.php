<?php
function generarLinkTemporal($idusuario){
   // Se genera una cadena para validar el cambio de contraseña
   $cadena = $idusuario.rand(1,9999999).date('Y-m-d');
   $token = sha1($cadena);

   $conexion = new mysqli('localhost', 'cvmaestros', 'H52ZhcNUD', 'cvmaestros_db');
   // Se inserta el registro en la tabla tblreseteopass
   $sql = "INSERT INTO reseteopass (idusuario, token, creado) VALUES($idusuario,'$token',NOW());";
   $resultado = $conexion->query($sql);
   if($resultado){
      // Se devuelve el link que se enviara al usuario
      $enlace = $_SERVER["SERVER_NAME"].'/pass/restablecer.php?idusuario='.sha1($idusuario).'&token='.$token;
      return $enlace;
   }
   else
      return FALSE;
}

function enviarEmail( $email, $link ){
   $mensaje = '<html>
     <head>
        <title>Restablece tu contraseña</title>
     </head>
     <body>
       <p>Hemos recibido una petición para restablecer la contraseña de tu cuenta.</p>
       <p>Si hiciste esta petición, haz clic en el siguiente enlace, si no hiciste esta petición puedes ignorar este correo.</p>
       <p>
         <strong>Enlace para restablecer tu contraseña</strong><br>
         <a href="'.$link.'"> Restablecer contraseña </a>
       </p>
     </body>
    </html>';

   $cabeceras = 'MIME-Version: 1.0' . "\r\n";
   $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
   $cabeceras .= 'From: Javier <javier.mendezve@gmail.com>' . "\r\n";
   // Se envia el correo al usuario
   mail($email, "Recuperar contraseña", $mensaje, $cabeceras);
}

$codigo = $_POST['codigo'];
$email = $_POST['email'];
$respuesta = new stdClass();

if( $email != "" ){
   $conexion = new mysqli('localhost', 'cvmaestros', 'H52ZhcNUD', 'cvmaestros_db');
   $sql = " SELECT Id_profesor FROM C_PROFESOR WHERE Id_profesor = '$codigo' ";
   $resultado = $conexion->query($sql);
   if($resultado->num_rows > 0){
      $usuario = $resultado->fetch_assoc();
      $linkTemporal = generarLinkTemporal($codigo);
      if($linkTemporal){
        enviarEmail( $email, $linkTemporal );
        $respuesta->mensaje = '<div class="alert alert-info"> Un correo ha sido enviado a su cuenta de email con las instrucciones para restablecer la contraseña </div>';
      }
   }
   else
      $respuesta->mensaje = '<div class="alert alert-warning"> No existe una cuenta asociada a ese correo. </div>';
}
else
   $respuesta->mensaje= "Debes introducir el email de la cuenta";
 echo json_encode( $respuesta );
 ?>
