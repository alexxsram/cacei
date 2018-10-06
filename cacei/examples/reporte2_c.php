<?php
session_start();

if(!isset($_SESSION['usuario']) and $_SESSION['estado'] != 'Autenticado') {
	header('Location: ../index.php');
} else {
	$estado = $_SESSION['usuario'];
	require('../model/sesiones.php');
}
$idReporte = $_GET['id'];

setlocale("es_MX");
$fecha =  date("d/m/Y");
// Incluye la libreria principal de TCPDF library (search for installation path).
require_once('tcpdf_include.php');
include("../model/conexion.php");

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


try {
	$sql = "SELECT * FROM EA_REPORTE WHERE id = :id";
	$resultado = $base->prepare($sql);
  $resultado->bindValue(":id", $idReporte);
	$resultado->execute();
	$num = $resultado->rowCount();
} catch (Exception $e) {
	  echo "Linea del error: ".$e->GetMessage();
}
if ($num != 0) {

 $reporte = $resultado->fetch(PDO::FETCH_OBJ);
 $sql = "SELECT * FROM EA_DETALLE_REPORTE WHERE fk_reporte = :id ORDER BY alumno DESC";
 $resultado = $base->prepare($sql);
 $resultado->bindValue(":id", $reporte->id);
 $resultado->execute();
 $arrayDetalle = $resultado->fetchAll(PDO::FETCH_OBJ);
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
		<td colspan="7"><b>Carrera: Ingeniería en Comunicaciones y electrónica</b></td>
		<td colspan="4"><b>Fecha: '.$fecha.' </b></td>
	</tr>
		<tr>
		<td colspan="7"><b>Materia: '.$_GET['materia'].'</b></td>
		<td colspan="4"><b>Secci&oacute;n:'.$reporte->seccion.' </b></td>

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
				 </tr>';
				 $alumno = array();
				 foreach ($arrayDetalle as $detalle):
				 	$alumno[] = $detalle->alumno;
				endforeach;
				$i = 0;

				 foreach ($arrayDetalle as $detalle):
				 $html.='<tr>
				 	<td colspan ="5" ><b>'.$alumno[$i++].'</b></td>
					<td colspan ="2" > hola'.'</td>
					<td colspan ="4" > hola'.'</td>
				  </tr>';
				endforeach;

				$html.='<tr>
				<hr />
				<td colspan ="11" align="center"> Nombre y firma del Maestro </td>
				</tr>
          	</table>';


} else {
    }

$pdf->writeHTML($htmla, true, false, true, false, '');
$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Output('reporte.pdf', 'I');
?>
