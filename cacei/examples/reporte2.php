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

// datos de la cabecera
//................................................................................................................
// usa la clase TCPDF

class MYPDF extends TCPDF {

}

//......................................................................................................

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

$sql = "SELECT


	WHERE C_PROFESOR.Id_profesor = $codigoProfesor
	";
$result = $conn->query($sql);


//tablas
//............................................................................................................................................................................................................................................

//tabla datos
 if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
	$html='';
		$html.='
		<table border="1" cellspacing="0" cellpadding="4">
	<tr>
		<th colspan="11" align = "center"><b>C&eacute;dula 0 - Curr&iacute;culum Vitae Resumido</b></th>

	</tr>
	<tr>
		<th colspan="11"><b>Reporte de Estado Acad&eacute;mico </b></th>

	</tr>
	<tr>
		<td colspan="7"><b>Carrera: '/*Aqui mismo se ponen los datos dle campo*/' </b></td>
		<td colspan="4"><b>Fecha:'/*Aqui mismo se ponen los datos dle campo*/' </b></td>
	</tr>
		<tr>
		<td colspan="7"><b>Materia: '/*Aqui mismo se ponen los datos dle campo*/'</b></td>
		<td colspan="4"><b>Secci&oacute;n:'/*Aqui mismo se ponen los datos dle campo*/' </b></td>

	</tr>

	<tr>
	<td colspan ="11">Para preever los posibles problemas de rezago, reprobaci&oacute;n o abandono, de los alumnos,  es conveniente atender en tiempo y forma los puntos de alerta, por lo que<u><b>se recomienda reportar  solo  a los alumnos que est&aacute;n o pueden estar en una de las situaciones siguientes. </b></u>
	<br><b>Situaci&oacute;n <br>
	A= no asiste regularmente a clases, no ha asistido, o llega tarde a clases <br>
	B= tiene rezago acad&eacute;mico, o  no hace tareas, o  requiere asesor&iacute;a <br>
	C= es indisciplinado  o distra&iacute;do</b>
	</td>
	</tr>
				 <tr>
				 	<td colspan ="5"><b>Nombre del Alumno </b>  </td>
					<td colspan ="2"><b>Situaci&oacute;n (A, B , C) </b> </td>
					<td colspan ="4"><b> Comentario </b></td>
				 </tr>


				 <tr>
				 	<td colspan ="5" align="center"> '/*aqui se itera la informacion de la tabla    */'</td>
					<td colspan ="2" align="center"> '/*aqui se itera la informacion de la tabla    */'</td>
					<td colspan ="4" align="center"> '/*aqui se itera la informacion de la tabla    */'</td>
				  </tr>

				<tr>
				<hr />
				<td colspan ="11" align="center"> Nombre y firma del Maestro </td>
				</tr>
          	</table>';
}

} else {
    }

$pdf->writeHTML($htmla, true, false, true, false, '');
$pdf->writeHTML($html, true, false, true, false, '');



// start table and first tr


 $conn->close();



 ob_end_clean();
$pdf->Output('reporte.pdf', 'I');
