<?php
// Incluye la libreria principal de TCPDF library (search for installation path).
require_once('tcpdf_include.php');

session_start();
//Comprobamos si el usario está logueado
//Si no lo está, se le redirecciona al index
//Si lo está, definimos el botón de cerrar sesión y la duración de la sesión
if(!isset($_SESSION['usuario']) and $_SESSION['estado'] != 'Autenticado') {
	header('Location: ../index.php');
} else {
	$estado = $_SESSION['usuario'];
	require('../model/sesiones.php');
}

$codigoProfesor = $_SESSION['usuario'];
// datos de la cabecera
//................................................................................................................
// usa la clase TCPDF

class MYPDF extends TCPDF {

}

//configuraciones básicas del documento
// crea el nuevo documento PDF
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// definir escalado de imagenes
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// definir algunas cadenas dependientes de lenguaje (opcional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// definir modo de fuente subopcional
$pdf->setFontSubsetting(true);

// definir fuente
$pdf->SetFont('dejavusans', '', 9, '', true);

// Añadir una pagina
// Este metodo tiene mucha sopciones, revisar documentación para mas información
$pdf->AddPage();


// definir efectos de sombra en el texto
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

include("../model/conexion.php"); //javier

//Obtener los datos de la tabla C_Profesor

try {
	$sql = "SELECT * FROM C_PROFESOR WHERE Id_profesor =".$codigoProfesor;
	$resultado = $base->prepare($sql);
	$resultado->execute();
	$num = $resultado->rowCount();
} catch (Exception $e) {
	  echo "Linea del error: ".$e->GetMessage();
}

 if ($num != 0) {
	 //calculo de la fecha
	 //Lo ingrese dentro del if, porque afuera de este no tenia mucho sentido
	 $profesor = $resultado->fetch(PDO::FETCH_OBJ);
		 $fecha_nacimiento = new DateTime($profesor->fecha_nacimiento);
		 $hoy = new DateTime();
		 $annos = $hoy->diff($fecha_nacimiento);
		 $sql = "SELECT nombre_puesto FROM C_PUESTO WHERE id_puesto = :puesto";
     $resultado = $base->prepare($sql);
     $resultado->bindValue(":puesto", $profesor->puesto);
     $resultado->execute();
     $puesto = $resultado->fetch(PDO::FETCH_OBJ);
	$html='';
		$html.='
		<table border="1" cellspacing="0" cellpadding="4">
	<tr>
		<th colspan="11" align = "center"><b>C&eacute;dula 0 - Curr&iacute;culum Vitae Resumido</b></th>

	</tr>
	<tr>
		<th colspan="7"><b>IMPORTANTE:</b> El CV debe limitarse a una extensi&oacute;n m&aacute;xima de dos (2) cuartillas, no se aceptar&aacute;n documentos adicionales.</th>
		<th colspan="2"><b>N&uacute;mero de profesor<br>(de 001 a 999)</b></th>
		<td colspan="2"> </td>
	</tr>
	<tr>
		<th colspan="3" align="center"> <b>Apellido paterno</b> </th>
		<th colspan="4" align="center"> <b>Apellido materno</b> </th>
		<th colspan="4" align="center"> <b>Nombre(s)</b></th>
	</tr>
	<tr>
		<td colspan="3">'.$profesor->apellido_paterno.'</td>
		<td colspan="4">'.$profesor->apellido_materno.'</td>
		<td colspan="4">'.$profesor->nombre.'</td>
	</tr>

	<tr>
		<th colspan="1" align="center"><b>Edad</b> </th>
		<th colspan="4" align="center"><b>Fecha de nacimiento(dd/mm/aaaa)</b> </th>
		<th colspan="6" align="center"><b>Puesto en la instituci&oacute;n</b> </th>
	</tr>
	<tr>
		<td colspan="1">'.$annos->y.'</td>
		<td colspan="4">'.$profesor->fecha_nacimiento.'</td>
		<td colspan="6">'.$puesto->nombre_puesto.'</td>
	</tr>

	<tr>
	<td colspan ="11"><b>Formaci&oacute;n acad&eacute;mica</b></td>
	</tr>
	<tr>
		<th colspan ="2" align="center"><b>Nivel</b></th>
		<th colspan ="3" align="center"><b>Nombre (incluir especialidad)</b></th>
		<th colspan ="3" align="center"><b>Instituci&oacute;n y pa&iacute;s</b></th>
		<th colspan ="1" align="center"><b>a&ntilde;o de obtenci&oacute;n</b></th>
		<th colspan ="2" align="center"><b>C&eacute;dula profesional</b></th>
	</tr>';

	$sql = "SELECT * FROM C_FORMACION_ACAD WHERE fk_profesor=".$codigoProfesor;
	$arrayFormacion = $base->query($sql)->fetchAll(PDO::FETCH_OBJ);

foreach($arrayFormacion as $formacion):

	 $html.= '<tr> <td colspan="2">'.$formacion->nivel.'</td> ';
	 $html.= ' <td colspan="3">'.$formacion->nombre.' </td> ';
	 $html.= '<td colspan="3">'.$formacion->institucion.' , '.$formacion->pais.'</td> ';
     $html.= ' <td colspan="1">'.$formacion->year.' </td> ';
	 $html.= '<td colspan="2">'.$formacion->cedula.'</td> </tr>';
endforeach;

				 $html.= '

	<tr>
	<td colspan="11"><b>Capacitaci&oacute;n docente</b></td>
	</tr>


	<tr>
		<th colspan ="4" align="center"><b>Tipo de capacitaci&oacute;n</b></th>
		<th colspan ="3" align="center"><b>Instituci&oacute;n y pa&iacute;s</b></th>
		<th colspan ="2" align="center"><b>a&ntilde;o de obtenci&oacute;n</b></th>
		<th colspan ="2" align="center"><b>Horas</b></th>
	</tr> ';

	$sql = "SELECT * FROM C_CAPACITACION_DOCENTE WHERE fk_profesor=".$codigoProfesor;
	$arrayCapacitacion = $base->query($sql)->fetchAll(PDO::FETCH_OBJ);

	foreach ($arrayCapacitacion as $capacitacion):

	$html.= '<tr> <td colspan="4">' . $capacitacion->tipo_capcit . '</td> ';
	 $html.= ' <td colspan="3">' . $capacitacion->institucion.','. $capacitacion->pais . '</td> ';
	 $html.= ' <td colspan="2">' . $capacitacion->year . '</td> ';
   $html.= ' <td colspan="2">' . $capacitacion->hora . '</td> </tr>';

 endforeach;

				 $html.= '

<tr>
	<td colspan="11"><b>Actualizaci&oacute;n disciplinar</b></td>
	</tr>


	<tr>
		<th colspan ="4" align="center"><b>Tipo de Actualizaci&oacute;n</b></th>
		<th colspan ="3" align="center"><b>Instituci&oacute;n y pa&iacute;s</b></th>
		<th colspan ="2" align="center"><b>a&ntilde;o de obtenci&oacute;n</b></th>
		<th colspan ="2" align="center"><b>Horas</b></th>
	</tr> ';

	$sql = "SELECT * FROM C_ACTUALIZACION_DISCIP WHERE fk_profesor=".$codigoProfesor;
	$arrayActual = $base->query($sql)->fetchAll(PDO::FETCH_OBJ);

foreach ($arrayActual as $actualizacion) :
	$html.= '<tr> <td colspan="4">' . $actualizacion->tipo_actualiz .'</td> ';
	 $html.= ' <td colspan="3">' . $actualizacion->institucion .','. $actualizacion->pais . '</td> ';
	 $html.= ' <td colspan="2">' . $actualizacion->year . '</td> ';
   $html.= ' <td colspan="2">' . $actualizacion->hora . '</td> </tr>';

endforeach;


				 $html.= '

<tr>
	<td colspan="11"><b>Gesti&oacute;n acad&eacute;mica</b></td>
</tr>

<tr>
<td colspan="11"><font size="-1">Anotar las actividades o puestos acad&eacute;micos desempe&ntilde;ados en orden cronol&oacute;gico decreciente: primero la m&aacute;s reciente (o actual) y de &uacute;ltimo la m&aacute;s antig&uuml;a.</font><br><br></td>

</tr>

<b></b> <br><br>
	<tr>
		<th colspan ="4" align="center"><b>Actividad o puesto</b></th>
		<th colspan ="3" align="center"><b>Instituci&oacute;n</b></th>
		<th colspan ="2" align="center"><b>De: (mes y a&ntilde;o)</b></th>
		<th colspan ="2" align="center"><b>De: (mes y a&ntilde;o)</b></th>
	</tr>
';

$sql = "SELECT * FROM C_GESTION_ACAD WHERE fk_profesor=" . $codigoProfesor;
$arrayGestion = $base->query($sql)->fetchAll(PDO::FETCH_OBJ);

foreach ($arrayGestion as $gestion):

	$html.= '<tr> <td colspan="4">' . $gestion->actividad . '</td> ';
	 $html.= ' <td colspan="3">' . $gestion->institucion . '</td> ';
	 $html.= ' <td colspan="2">' . $gestion->fecha_inicio  . '</td> ';
   $html.= ' <td colspan="2">' . $gestion->fecha_fin . '</td> </tr>';

endforeach;

				 $html.= '

<tr>
<td colspan="11"><b>Productos acad&eacute;micos relevantes en los &uacute;ltimos cinco (5) a&ntilde;os, relacionados con el PE</b><br></td>
</tr>
<tr>
<td colspan="11"><font size="-1">Incluir los datos relevantes, tales como: para publicaciones titulo, autor(es), d&oacute;nde se public&oacute; o present&oacute;, fecha de publicaci&oacute;n o presentaci&oacute;n, etc.; para patentes o desarrollos tecnol&oacute;gicos, tipo, n&uacute;mero de registro, alcance, etc.</font></td>
</tr>
	<tr>
		<th colspan ="2" align="center"><b>Num.</b></th>
		<th colspan ="9" align="center"><b>Descripci&oacute;n del producto acad&eacute;mico</b></th>
	</tr>

';

$sql = "SELECT * FROM C_PRODUCTO_ACAD WHERE fk_profesor=" . $codigoProfesor;
$arrayProducto = $base->query($sql)->fetchAll(PDO::FETCH_OBJ);

foreach($arrayProducto as $producto):

	$html.= '<tr> <td colspan="11"><b>Titulo: </b>' . $producto->titulo .
	'<b> Autor: </b>'. $producto->autor .'
	<b> Lugar: </b>'. $producto->lugar_public .'
	<b> Fecha de publicaci&oacute;n: </b>' . $producto->fecha_public .
	'<b> Tipo </b>'. $producto->tipo .
	'<b> N&uacute;mero de registro: </b>'. $producto->num_registro .
	'<b> Alcance: </b>'. $producto->alcance .
	'<b> Descripci&oacute;n: </b>'. $producto->descripcion .
	'</td> </tr>';

endforeach;

				 $html.= '

<tr>
<td colspan="11"><b>Experiencia profesional (no acad&eacute;mica)</b><br></td>
</tr>
<tr>
<td colspan="11"><font size="-1">Anotar las actividades o puestos desempe&ntilde;ados en orden cronol&oacute;gico decreciente: primero la m&aacute;s reciente (o actual) y de &uacute;ltimo la m&aacute;s antig&uuml;a.</font></td>
</tr>
	<tr>
		<th colspan ="4" align="center"><b>Actividad o puesto</b></th>
		<th colspan ="3" align="center"><b>Instituci&oacute;n</b></th>
		<th colspan ="2" align="center"><b>De: (mes y a&ntilde;o)</b></th>
		<th colspan ="2" align="center"><b>De: (mes y a&ntilde;o)</b></th>
	</tr>
';

$sql = "SELECT * FROM C_EXPERIENCIA_PROF WHERE fk_profesor = $codigoProfesor";
$arrayExperiencia = $base->query($sql)->fetchAll(PDO::FETCH_OBJ);

foreach ($arrayExperiencia as $experiencia):

	$html.= '<tr> <td colspan="4">' . $experiencia->act_puesto . '</td> ';
	 $html.= ' <td colspan="3">' . $experiencia->organizacion . '</td> ';
	 $html.= ' <td colspan="2">' . $experiencia->fecha_inicio . '</td> ';
   $html.= ' <td colspan="2">' . $experiencia->fecha_fin . '</td> </tr>';

endforeach;

				 $html.= '

<tr>
<td colspan="11"><b>Experiencia en dise&ntilde;o ingenieril</b><br></td>
</tr>
	<tr>
		<th colspan ="7" align="center"><b>Organismo</b></th>
		<th colspan ="2" align="center"><b>Periodo (a&ntilde;os)</b></th>
		<th colspan ="2" align="center"><b>Nivel de experiencia</b></th>
	</tr>
	';

	$sql = "SELECT * FROM C_EXPER_DESING WHERE fk_profesor=$codigoProfesor";
	$arrayExperienciaD = $base->query($sql)->fetchAll(PDO::FETCH_OBJ);
	foreach ($arrayExperienciaD as $experiencia):

	$html.= '<tr> <td colspan="7">' . $experiencia->organismo . '</td> ';
	 $html.= ' <td colspan="2">' . $experiencia->periodo . '</td> ';
	 $html.= ' <td colspan="2">' . $experiencia->nivel_exper . '</td> </tr>';
endforeach;

				 $html.= '

<tr>
<td colspan="11"><b>Logros profesionales (no acad&eacute;micos)relevantes en los &uacute;ltimos cinco (5) a&ntilde;os, relacionados con el PE</b><br></td>
</tr>
<tr>
<td colspan="11"><font size="-1">Incluir los datos relevantes, tales como: titulo, autor(es), nombre del logro, relevancia, d&oacute;nde se realiz&oacute;, etc.   </font></td>
</tr>
	<tr>
		<th colspan ="11" align="center"><b>Descripci&oacute;n del logro</b></th>
	</tr>
	';

	$sql = "SELECT * FROM C_LOGRO_PROF WHERE fk_profesor = $codigoProfesor";
	$arrayLogro= $base->query($sql)->fetchAll(PDO::FETCH_OBJ);

	foreach ($arrayLogro as $logro) :

	$html.= '<tr> <td colspan="11"> <b>Nombre: </b>' . $logro->nombre .
	'<b> Titulo: </b>' . $logro->titulo .
	'<b> Autor: </b>'. $logro->autor .
	'<b> Lugar: </b>'. $logro->lugar .
	'<b> Relevancia: </b>' . $logro->relevancia .
	'<b> Descripci&oacute;n: </b>'. $logro->descripcion .
	'</td> </tr>';
endforeach;

				 $html.= '

<tr>
<td colspan="11"><b>Membres&iacute;a o participaci&oacute;n en Colegios, C&aacute;maras, asociaciones cient&iacute;ficas o alg&uacute;n otro tipo de organismo profesional</b></td>
</tr>
<tr>
<td colspan="11"><font size="-1">Anotar el nombre del organismo, el tipo de membres&iacute;a o participaci&oacute;n, el n&uacute;mero de a&ntilde;os y, en su caso, alguna otra informaci&oacute;n relevante.</font></td>
</tr>
	<tr>
		<th colspan ="7" align="center"><b>Organismo</b></th>
		<th colspan ="2" align="center"><b>Periodo (a&ntilde;os)</b></th>
		<th colspan ="2" align="center"><b>Nivel de participaci&oacute;n</b></th>
	</tr>
	';

	$sql = "SELECT * FROM C_MEMBRESIA WHERE fk_profesor = $codigoProfesor";
	$arrayMembresia = $base->query($sql)->fetchAll(PDO::FETCH_OBJ);
foreach ($arrayMembresia as $membresia) :
	$html.= '<tr> <td colspan="7">' . $membresia->organismo . '</td> ';
	$html.= ' <td colspan="2">' . $membresia->num_years . '</td> ';
	$html.= ' <td colspan="2">' .$membresia->tipo . '</td> </tr>';
endforeach;

				 $html.= '

<tr>
<td colspan="11"><b>Premios, distinciones o reconocimientos recibidos</b><br></td>
</tr>
<tr>
<td colspan="11"><font size="-1">Incluir los datos relevantes, nombre del premio, organismo que lo otorga, motivos por se otorga, etc.</font></td>
</tr>
	<tr>
		<th colspan ="11" align="center"><b>Descripci&oacute;n del reconocimiento</b></th>
	</tr>
	';

$sql = "SELECT * FROM C_PDR_RECIBIDOS WHERE fk_profesor = $codigoProfesor";
$arrayPremio = $base->query($sql)->fetchAll(PDO::FETCH_OBJ);
foreach ($arrayPremio as $premio) :

	$html.= '<tr> <td colspan="11"> <b>Nombre: </b>' . $premio->nombre .
	'<b> Organismo: </b>' . $premio->organismo .
	'<b> Motivo: </b>'. $premio->motivo .
	'<b> Descripci&oacute;n: </b>'. $premio->descripcion .
	'</td> </tr>';
endforeach;

				 $html.= '

<tr>
<td colspan="11"><b>Participaci&oacute;n en el an&aacute;lisis o actualizaci&oacute;n del PE, o en actividades extracurriculares relacionadas con el PE</b><br></td>
</tr>
<tr>
<td colspan="11"><font size="-1">Con un m&aacute;ximo de 200 palabras, rese&ntilde;e cu&aacute;l ha sido su participaci&oacute;n en actividades relevantes del PE, tales como: dise&ntilde;o el PE, dise&ntilde;o de asignatura(s) del PE, an&aacute;lisis de indicadores del PE, participaci&oacute;n en cuerpos colegiados del PE, participaci&oacute;n en grupos de mejora continua del PE, etc.; en actividades extracurriculares relacionadas con el PE; o en ambos tipos de actividades.</font></td>
</tr>
';

$sql = "SELECT * FROM C_PE WHERE fl_profesor=".$codigoProfesor;
$resultado = $base->prepare($sql);
$resultado->execute();
 $PE = $resultado->fetch(PDO::FETCH_OBJ);
	$html.= '<tr> <td colspan="11">' . $PE->descripcion . '</td> </tr>';

				 $html.= '

          	</table>';

} else {
    }

$pdf->writeHTML($htmla, true, false, true, false, '');
$pdf->writeHTML($html, true, false, true, false, '');


$pdf->Output('reporte.pdf', 'I');
?>
