<?php
//============================================================+
// File name   : example_001.php
// Begin       : 2018-02-26
// Last Update : 2018-02-26
//
// Description : Reporte de prueba de plantilla PDF
//               Default Header and Footer
//
// Author: Luis Miguel Ramirez Amezcua
//
//============================================================+

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


// contenido a mostrar
//---------------------------------------------------------------------------------------------------------------------------------------------------

/*
$html = <<<EOD
<br></br>
//<h1>Reporte de prueba <a  style="text-decoration:none;color:black;">&nbsp;<span style="color:black;">Reporte</span><span style="color:white;">Prueba</span>&nbsp;</a>!</h1>
<i>Ejemplo.</i>

EOD;*/
/*
//conexion
$servername = "localhost";
$username = "cvmaestros";
$password = "H52ZhcNUD";
$dbname = "cvmaestros_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
*/

include("../model/conexion.php"); //javier

/*
$sql = "SELECT C_PROFESOR.nombre, C_PROFESOR.apellido_paterno, C_PROFESOR.apellido_materno,C_PROFESOR.fecha_nacimiento, C_PROFESOR.id_profesor,
	C_PUESTO.nombre_puesto
	FROM C_PROFESOR
	INNER JOIN C_PROFESOR_PUESTO ON C_PROFESOR.Id_profesor = C_PROFESOR_PUESTO.fk_profesor
	INNER JOIN C_PUESTO ON fk_puesto = C_PUESTO.id_puesto
	WHERE C_PROFESOR.Id_profesor = $codigoProfesor
	";
$result = $conn->query($sql);
*/

//javier
//Obtener los datos de la tabla C_Profesor
$sql = "SELECT * FROM C_PROFESOR";
try {
	$sql = "SELECT * FROM C_PROFESOR WHERE Id_profesor =".$codigoProfesor;
	$resultado = $base->prepare($sql);
	$resultado->bindValue(":id",$codigo);
	$resultado->execute();
} catch (\Exception $e) {
	  echo "Linea del error: ".$e->GetMessage();
}

//tablas
//............................................................................................................................................................................................................

//tabla datos de profesor
//mo
 if ($resultado->rowCount() != 0) {
	 //calculo de la fecha
	 //Lo ingrese dentro del if, porque afuera de este no tenia mucho sentido
	 $profesor = $resultado->fetch(PDO::FETCH_OBJ);
	 $fecha_nacimiento = new DateTime($profesor->fecha_nacimiento);
	 $hoy = new DateTime();
	 $annos = $hoy->diff($fecha_nacimiento);
	 echo $annos->y;
//    while($row = $result->fetch_assoc()) {
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
		<td colspan="6">Puesto</td>
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
/*
$sql = "SELECT
	C_FORMACION_ACAD.nombre AS 'nomb_form', C_FORMACION_ACAD.cedula, C_FORMACION_ACAD.year, C_FORMACION_ACAD.institucion, C_FORMACION_ACAD.pais, C_FORMACION_ACAD.nivel
	FROM C_PROFESOR
	INNER JOIN C_FORMACION_ACAD ON  C_PROFESOR.Id_profesor = C_FORMACION_ACAD.fk_profesor
	WHERE C_PROFESOR.Id_profesor = $codigoProfesor
	";
$resultFA = $conn->query($sql);
while ($row2 = $resultFA->fetch_assoc())  {

	 $html.= '<tr> <td colspan="2">'.$row2["nivel"].'</td> ';
	 $html.= ' <td colspan="3">'.$row2["nomb_form"].' </td> ';
	 $html.= '<td colspan="3">'.$row2["institucion"].' , '.$row2["pais"].'</td> ';
     $html.= ' <td colspan="1">'.$row2["year"].' </td> ';
	 $html.= '<td colspan="2">'.$row2["cedula"].'</td> </tr>';

}
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

$sql = "SELECT
	C_CAPACITACION_DOCENTE.tipo_capcit, C_CAPACITACION_DOCENTE.institucion AS 'institucion_CD', C_CAPACITACION_DOCENTE.year AS 'year_CD', C_CAPACITACION_DOCENTE.pais AS 'pais_CD', C_CAPACITACION_DOCENTE.hora
	FROM C_PROFESOR
	INNER JOIN C_CAPACITACION_DOCENTE ON C_PROFESOR.Id_profesor = C_CAPACITACION_DOCENTE.fk_profesor
	WHERE C_PROFESOR.Id_profesor = $codigoProfesor
	";
$resultado = $conn->query($sql);
while ($row1 = $resultado->fetch_assoc())  {

	$html.= '<tr> <td colspan="4">' . $row1['tipo_capcit'] . '</td> ';
	 $html.= ' <td colspan="3">' . $row1['institucion_CD'] .','. $row1['pais_CD'] . '</td> ';
	 $html.= ' <td colspan="2">' . $row1['year_CD'] . '</td> ';
   $html.= ' <td colspan="2">' . $row1['hora'] . '</td> </tr>';

}
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

$sql = "SELECT
C_ACTUALIZACION_DISCIP.tipo_actualiz AS 'tipoAD', C_ACTUALIZACION_DISCIP.institucion AS 'institucionAD', C_ACTUALIZACION_DISCIP.year AS 'yearAD', C_ACTUALIZACION_DISCIP.pais AS 'Adpais',		C_ACTUALIZACION_DISCIP.hora AS 'horaAD'

	FROM C_PROFESOR
	INNER JOIN C_ACTUALIZACION_DISCIP ON C_PROFESOR.Id_profesor = C_ACTUALIZACION_DISCIP.fk_profesor
	WHERE C_PROFESOR.Id_profesor = $codigoProfesor
	";
$resultadoAD = $conn->query($sql);
while ($row3 = $resultadoAD->fetch_assoc())  {

	$html.= '<tr> <td colspan="4">' . $row3['tipoAD'] . '</td> ';
	 $html.= ' <td colspan="3">' . $row3['institucionAD'] .','. $row3['Adpais'] . '</td> ';
	 $html.= ' <td colspan="2">' . $row3['yearAD'] . '</td> ';
   $html.= ' <td colspan="2">' . $row3['horaAD'] . '</td> </tr>';

}
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

$sql = "SELECT
C_GESTION_ACAD.actividad AS 'actividadGA', C_GESTION_ACAD.institucion AS 'institucionGA', C_GESTION_ACAD.fecha_inicio AS 'fechaInicioGA', C_GESTION_ACAD.fecha_fin AS 'fechaFinGA'
	FROM C_PROFESOR
	INNER JOIN C_GESTION_ACAD ON C_PROFESOR.Id_profesor = C_GESTION_ACAD.fk_profesor
	WHERE C_PROFESOR.Id_profesor = $codigoProfesor
	";
$resultadoAD = $conn->query($sql);
while ($row4 = $resultadoAD->fetch_assoc())  {

	$html.= '<tr> <td colspan="4">' . $row4['actividadGA'] . '</td> ';
	 $html.= ' <td colspan="3">' . $row4['institucionGA'] . '</td> ';
	 $html.= ' <td colspan="2">' . $row4['fechaInicioGA'] . '</td> ';
   $html.= ' <td colspan="2">' . $row4['fechaFinGA'] . '</td> </tr>';

}
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

$sql = "SELECT
C_PRODUCTO_ACAD.titulo AS 'tituloPA', C_PRODUCTO_ACAD.autor AS 'autorPA', C_PRODUCTO_ACAD.fecha_public AS 'fechaPA', C_PRODUCTO_ACAD.lugar_public AS 'lugarPA', C_PRODUCTO_ACAD.tipo AS 'tipoPA', C_PRODUCTO_ACAD.num_registro AS 'numeroPA', C_PRODUCTO_ACAD.alcance AS 'alcancePA', C_PRODUCTO_ACAD.descripcion AS 'descripcionPA'
	FROM C_PROFESOR
	INNER JOIN C_PRODUCTO_ACAD ON C_PROFESOR.Id_profesor = C_PRODUCTO_ACAD.fk_profesor
	WHERE C_PROFESOR.Id_profesor = $codigoProfesor
	";
$resultadoAD = $conn->query($sql);
while ($row4 = $resultadoAD->fetch_assoc())  {

	$html.= '<tr> <td colspan="11"><b>Titulo: </b>' . $row4['tituloPA'] .'<b> Autor: </b>'. $row4['autorPA'] .'<b> Lugar: </b>'. $row4['lugarPA'] .'<b> Fecha de publicaci&oacute;n: </b>' . $row4['fechaPA'] .'<b> Tipo </b>'. $row4['tipoPA'] .'<b> N&uacute;mero de registro: </b>'. $row4['numeroPA'] .'<b> Alcance: </b>'. $row4['alcancePA'] .'<b> Descripci&oacute;n: </b>'. $row4['descripcionPA'] .  '</td> </tr>';

}

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

$sql = "SELECT
C_EXPERIENCIA_PROF.act_puesto AS 'actividadEP', C_EXPERIENCIA_PROF.organizacion AS 'organizacionPE', C_EXPERIENCIA_PROF.fecha_inicio AS 'fechaInicioPE', C_EXPERIENCIA_PROF.fecha_fin AS 'fechaFinPE'
	FROM C_PROFESOR
	INNER JOIN C_EXPERIENCIA_PROF ON C_PROFESOR.Id_profesor = C_EXPERIENCIA_PROF.fk_profesor
	WHERE C_PROFESOR.Id_profesor = $codigoProfesor
	";
$resultadoAD = $conn->query($sql);
while ($row4 = $resultadoAD->fetch_assoc())  {

	$html.= '<tr> <td colspan="4">' . $row4['actividadEP'] . '</td> ';
	 $html.= ' <td colspan="3">' . $row4['organizacionPE'] . '</td> ';
	 $html.= ' <td colspan="2">' . $row4['fechaInicioPE'] . '</td> ';
   $html.= ' <td colspan="2">' . $row4['fechaFinPE'] . '</td> </tr>';

}

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

$sql = "SELECT
C_EXPER_DESING.organismo AS 'organismoED', C_EXPER_DESING.periodo AS 'periodoED', C_EXPER_DESING.nivel_exper AS 'nivelExp'
	FROM C_PROFESOR
	INNER JOIN C_EXPER_DESING ON C_PROFESOR.Id_profesor = C_EXPER_DESING.fk_profesor
	WHERE C_PROFESOR.Id_profesor = $codigoProfesor
	";
$resultadoAD = $conn->query($sql);
while ($row4 = $resultadoAD->fetch_assoc())  {

	$html.= '<tr> <td colspan="7">' . $row4['organismoED'] . '</td> ';
	 $html.= ' <td colspan="2">' . $row4['periodoED'] . '</td> ';
	 $html.= ' <td colspan="2">' . $row4['nivelExp'] . '</td> </tr>';
}

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

$sql = "SELECT
C_LOGRO_PROF.nombre AS 'nombreLP', C_LOGRO_PROF.autor AS 'autorLP', C_LOGRO_PROF.lugar AS 'lugarLP', C_LOGRO_PROF.titulo AS 'tituloLP', C_LOGRO_PROF.relevancia AS 'relevanciaLP', C_LOGRO_PROF.descripcion AS 'descripcionLP'
	FROM C_PROFESOR
	INNER JOIN C_LOGRO_PROF ON C_PROFESOR.Id_profesor = C_LOGRO_PROF.fk_profesor
	WHERE C_PROFESOR.Id_profesor = $codigoProfesor
	";
$resultadoAD = $conn->query($sql);
while ($row4 = $resultadoAD->fetch_assoc())  {

	$html.= '<tr> <td colspan="11"> <b>Nombre: </b>' . $row4['nombreLP'] .'<b> Titulo: </b>' . $row4['tituloLP'] .'<b> Autor: </b>'. $row4['autorLP'] .'<b> Lugar: </b>'. $row4['lugarLP'] .'<b> Relevancia: </b>' . $row4['relevanciaLP'] .'<b> Descripci&oacute;n: </b>'. $row4['descripcionLP'] .  '</td> </tr>';


}

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

$sql = "SELECT
C_MEMBRESIA.organismo AS 'organismoM', C_MEMBRESIA.num_years AS 'yearsM', C_MEMBRESIA.tipo AS 'tipoM'
	FROM C_PROFESOR
	INNER JOIN C_MEMBRESIA ON C_PROFESOR.Id_profesor = C_MEMBRESIA.fk_profesor
	WHERE C_PROFESOR.Id_profesor = $codigoProfesor
	";
$resultadoAD = $conn->query($sql);
while ($row4 = $resultadoAD->fetch_assoc())  {

	$html.= '<tr> <td colspan="7">' . $row4['organismoM'] . '</td> ';
	$html.= ' <td colspan="2">' . $row4['yearsM'] . '</td> ';
	$html.= ' <td colspan="2">' . $row4['tipoM'] . '</td> </tr>';

}

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

$sql = "SELECT
C_PDR_RECIBIDOS.nombre AS 'nombrePremio', C_PDR_RECIBIDOS.organismo AS 'organismoPremio', C_PDR_RECIBIDOS.motivo AS 'motivoPremio', C_PDR_RECIBIDOS.descripcion AS 'descPremio'
	FROM C_PROFESOR
	INNER JOIN C_PDR_RECIBIDOS ON C_PROFESOR.Id_profesor = C_PDR_RECIBIDOS.fk_profesor
	WHERE C_PROFESOR.Id_profesor = $codigoProfesor
	";
$resultadoAD = $conn->query($sql);
while ($row4 = $resultadoAD->fetch_assoc())  {

	$html.= '<tr> <td colspan="11"> <b>Nombre: </b>' . $row4['nombrePremio'] .'<b> Organismo: </b>' . $row4['organismoPremio'] .'<b> Motivo: </b>'. $row4['motivoPremio'] .'<b> Descripci&oacute;n: </b>'. $row4['descPremio'] . '</td> </tr>';

}

				 $html.= '

<tr>
<td colspan="11"><b>Participaci&oacute;n en el an&aacute;lisis o actualizaci&oacute;n del PE, o en actividades extracurriculares relacionadas con el PE</b><br></td>
</tr>
<tr>
<td colspan="11"><font size="-1">Con un m&aacute;ximo de 200 palabras, rese&ntilde;e cu&aacute;l ha sido su participaci&oacute;n en actividades relevantes del PE, tales como: dise&ntilde;o el PE, dise&ntilde;o de asignatura(s) del PE, an&aacute;lisis de indicadores del PE, participaci&oacute;n en cuerpos colegiados del PE, participaci&oacute;n en grupos de mejora continua del PE, etc.; en actividades extracurriculares relacionadas con el PE; o en ambos tipos de actividades.</font></td>
</tr>
';

$sql = "SELECT
C_PE.descripcion AS 'descripcionP'
	FROM C_PROFESOR
	INNER JOIN C_PE ON C_PROFESOR.Id_profesor = C_PE.fl_profesor
	WHERE C_PROFESOR.Id_profesor = $codigoProfesor
	";
$resultadoAD = $conn->query($sql);
while ($row4 = $resultadoAD->fetch_assoc())  {


	$html.= '<tr> <td colspan="11">' . $row4['descripcionP'] . '</td> </tr>';

}
*/
				 $html.= '

          	</table>';
//}habia cierre de while

} else {
    }

$pdf->writeHTML($htmla, true, false, true, false, '');
$pdf->writeHTML($html, true, false, true, false, '');






// start table and first tr


 $conn->close();



 ob_end_clean();
$pdf->Output('reporte.pdf', 'I');

?>
