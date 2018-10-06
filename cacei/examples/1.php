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


// datos de la cabecera
//................................................................................................................
// usa la clase TCPDF
class MYPDF extends TCPDF {

		//Page header
	public function Header() {
		// Logo

		$image_file = K_PATH_IMAGES.'logo_udg.png';
		$this->Image($image_file, 10, 10, 15, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// Set font
		$this->SetFont('helvetica', 'B', 20);
		// Title
		$this->Cell(0, 15, 'UNIVERSIDAD DE GUADALAJARA', 0, false, 'C', 0, '', 0, false, 'M', 'M');

	}
}

//......................................................................................................

//configuraciones básicas del documento
// crea el nuevo documento PDF
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
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
		<br> <br>
		<table border="1" cellspacing="0" cellpadding="4">
	<tr>
		<th colspan="11"><b>Reporte de Estado Acad&eacute;mico </b></th>

	</tr>
	<tr>
		<td colspan="7"><b>Carrera: Ingeniería en Comunicaciones y electrónica </b></td>
		<td colspan="4"><b>Fecha:'.'</b></td>
	</tr>
		<tr>
		<td colspan="7"><b>Materia: '.'</b></td>
		<td colspan="4"><b>Secci&oacute;n: '.' </b></td>

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

				//	foreach ($arrayDetalle as $detalle):
				$html.='<tr><td colspan ="5" align="center">'.'</td>';
					$html.='<td colspan ="2" align="center">'.'</td>';
					$html.='<td colspan ="4" align="center">'.'</td> </tr>';
				//endforeach;

				$html.=
				'<tr>
				<hr />
				<td colspan ="11" align="center"> Nombre y firma del Maestro </td>
				</tr>
          	</table>';

} else {
	echo "hay algo raro";
    }
$pdf->writeHTML($html, true, false, true, false, '');
ob_end_clean();
$pdf->Output('reporte.pdf', 'I');
?>
