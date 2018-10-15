<?php
session_start();
if(!isset($_SESSION['usuario']) and $_SESSION['estado'] != 'Autenticado') {
	header('Location: ../index.php');
} else {
	$estado = $_SESSION['usuario'];
 	require('../model/sesiones.php');
}

$idReporte = $_GET['id_reporte'];

// setlocale("es_MX");
// $fecha =  date("d/m/Y");

// Incluye la libreria principal de TCPDF library (search for installation path).
require_once('tcpdf_include.php');

include("../model/conexion.php");

// datos de la cabecera
//................................................................................................................ usa la clase TCPDF
class MYPDF extends TCPDF {
	//Page header
	public function Header() {
		// Logo
		$image_file = K_PATH_IMAGES.'logo_udg.png';
		$this->Image($image_file, 10, 7, 17, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// Set font
		$this->SetFont('helvetica', 'B', 20);
		// Title
		$this->Cell(0, 15, 'UNIVERSIDAD DE GUADALAJARA', 0, false, 'C', 0, '', 0, false, 'M', 'M');
	}
}

//...................................................................................................... configuraciones básicas del documento
// crea el nuevo documento PDF
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

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
$pdf->AddPage('L', 'A4');

// definir efectos de sombra en el texto
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

$table = 'EA_REPORTE';
try {
	$sql = "SELECT * FROM ".$table." WHERE id_reporte = :id";
	$resultado = $base->prepare($sql);
	$resultado->bindValue(":id", $idReporte);
	$resultado->execute();
	$num = $resultado->rowCount();
} catch(Exception $e) {
	echo "Línea de error: " . $e->GetMessage();
}

if($num != 0) {
	$reporte = $resultado->fetch(PDO::FETCH_OBJ);
	
	///para mostrar más datos al reporte, basta con agregar una nueva variable tabla $table<lo que sea>
	$tableClase = 'EA_CLASE AS EAC';
	$tableMateria = 'EA_MATERIA AS EAM';
	$tableCarrera = 'EA_CARRERA AS EACA';
	$select = "SELECT EAC.seccion AS seccion, EAM.nombre AS nombreM, EACA.nombre AS nombreC";
	$sql = $select." FROM ".$tableClase;
	$sql .= " INNER JOIN ".$tableMateria." ON EAM.id_materia = EAC.fk_materia";
	$sql .= " INNER JOIN ".$tableCarrera." ON EACA.id_carrera = EAM.fk_carrera";
	$sql .= " WHERE EAC.id_clase = :id";
	$resultado = $base->prepare($sql);
	$resultado->bindValue(":id", $reporte->fk_clase);
	$resultado->execute();
	$arrayDatos = $resultado->fetchAll(PDO::FETCH_OBJ);

	$html = '';
	$html .= '<br><br>
		<table border="1" cellspacing="0" cellpadding="4">
			<thead>
				<tr>
					<th colspan="11"> <b> Reporte de estado académico </b> </th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td colspan="7"> <b> Carrera: '.$arrayDatos[0]->nombreC.'</b> </td>
					<td colspan="4"> <b> Fecha: '.substr($reporte->fecha, 8, 2).'/'.substr($reporte->fecha, 5, 2).'/'.substr($reporte->fecha, 0, 4).' </b> </td>
				</tr>
				<tr>
					<td colspan="7"> <b> Materia: '.$arrayDatos[0]->nombreM.' </b> </td>
					<td colspan="4"> <b> Sección: '.$arrayDatos[0]->seccion.' </b> </td>
				</tr>
			</tbody>
		</table>';


	// Muestro a los estudiantes de cada reporte dado de alta
	$tableDetalle = 'EA_DETALLE_REPORTE AS EADR';
	$tableAlumno = 'EA_ALUMNO AS EAAL';
	$select = "SELECT EAAL.codigo, EAAL.nombre, EADR.situacion, EADR.motivo, EADR.comentario";
	$sql = $select." FROM ".$tableDetalle;
	$sql .= " INNER JOIN ".$tableAlumno." ON EADR.fk_alumno = EAAL.codigo";
	$sql .= " WHERE EADR.fk_reporte = :id";
	$resultado = $base->prepare($sql);
	$resultado->bindValue(":id", $reporte->id_reporte);
	$resultado->execute();

	$numTuplas = $resultado->rowCount();

	if($numTuplas != 0) {
		$arrayDatos = $resultado->fetchAll(PDO::FETCH_OBJ);
		$html .= '<br><br><br>
			<table border="1" cellspacing="0" cellpadding="4">
				<thead>
					<tr>
						<th align="center" width="586"> Asistencia </th>
						<th align="center" width="290"> Actividad (es) </th>
						<th align="center" width="70"> Examen (es) </th>
					</tr>
				</thead>
				<tbody>';
					foreach($arrayDatos as $detalleReporte):

						///***************************************************** Impriendo las asistencias del alumno
						$tableAsiAlumno = 'EA_ASISTENCIA AS EAAS';
						$tableDiaClase = 'EA_DIA_CLASE AS EADC';
						$sql = "SELECT EADC.id_dia, EAAS.fk_alumno, EADC.fecha FROM ".$tableAsiAlumno;
						$sql .= " INNER JOIN ".$tableDiaClase." ON EAAS.fk_dia = EADC.id_dia";
						$sql .= " WHERE EAAS.fk_alumno = :id_alumno";
						$resultado = $base->prepare($sql);
						$resultado->bindValue(":id_alumno", $detalleReporte->codigo);
						$resultado->execute();
						$arrayAsiAlumno = $resultado->fetchAll(PDO::FETCH_OBJ);

						$htmlAsiAlumno = '';
						$htmlAsiAlumno .= '
							<table border="1" cellspacing="0" cellpadding="4">
								<thead>
									<tr>';
									foreach($arrayAsiAlumno as $asistencias):
										$htmlAsiAlumno .= '<th style="font-size:8;" width="14.4" height="5">'.$asistencias->id_dia.'</th>';
									endforeach;
						$htmlAsiAlumno .= '
										<th style="font-size:8;" width="0.02" height="5"></th>
									</tr>
								</thead>
								<tbody>
									<tr>';
									foreach($arrayAsiAlumno as $asistencias):
										$htmlAsiAlumno .= '<td style="font-size:8;" width="14.4" height="5">x</td>';
									endforeach;
						$htmlAsiAlumno .= '
										<td style="font-size:8;" width="0.02" height="5"></td>
									</tr>
								</tbody>
							</table>';

						///***************************************************** Impriendo las actividades calificadas del alumno
						$tableActAlumno = 'EA_ALUMNO_ACTIVIDAD AS EAAAC';
						$tableActividades = 'EA_ACTIVIDAD AS EAAC';
						$sql = "SELECT EAAAC.fk_actividad, EAAAC.calificacion FROM ".$tableActAlumno;
						$sql .= " INNER JOIN ".$tableActividades." ON EAAAC.fk_actividad = EAAC.id_actividad";
						$sql .= " WHERE EAAAC.fk_alumno = :id_alumno";
						$resultado = $base->prepare($sql);
						$resultado->bindValue(":id_alumno", $detalleReporte->codigo);
						$resultado->execute();
						$arrayActAlumno = $resultado->fetchAll(PDO::FETCH_OBJ);

						$htmlActAlumno = '';
						$htmlActAlumno .= '
							<table border="1" cellspacing="0" cellpadding="4">
								<thead>
									<tr>';
									foreach($arrayActAlumno as $actividades):
										$htmlActAlumno .= '<th style="font-size:8;" width="14.4" height="5">'.$actividades->fk_actividad.'</th>';
									endforeach;
						$htmlActAlumno .= '
										<th style="font-size:8;" width="0.02" height="5"></th>
									</tr>
								</thead>
								<tbody>
									<tr>';
									foreach($arrayActAlumno as $actividades):
										$htmlActAlumno .= '<td style="font-size:8;" width="14.4" height="5">'.$actividades->calificacion.'</td>';
									endforeach;
						$htmlActAlumno .= '
										<td style="font-size:8;" width="0.02" height="5"></td>
									</tr>
								</tbody>
							</table>';


						///***************************************************** Impriendo los examenes calificados del alumno
						$tableExaAlumno = 'EA_ALUMNO_EXAMEN AS EAAEX';
						$tableExamen = 'EA_EXAMEN AS EAEX';
						$sql = "SELECT EAAEX.fk_examen, EAAEX.calificacion FROM ".$tableExaAlumno;
						$sql .= " INNER JOIN ".$tableExamen." ON EAAEX.fk_examen = EAEX.id_examen";
						$sql .= " WHERE EAAEX.fk_alumno = :id_alumno";
						$resultado = $base->prepare($sql);
						$resultado->bindValue(":id_alumno", $detalleReporte->codigo);
						$resultado->execute();
						$arrayExaAlumno = $resultado->fetchAll(PDO::FETCH_OBJ);

						$htmlExaAlumno = '';
						$htmlExaAlumno .= '
							<table border="1" cellspacing="0" cellpadding="4">
								<thead>
									<tr>';
									foreach($arrayExaAlumno as $examenes):
										$htmlExaAlumno .= '<th style="font-size:8;" width="14.4" height="5">'.$examenes->fk_examen.'</th>';
									endforeach;
						$htmlExaAlumno .= '
										<th style="font-size:8;" width="0.02" height="5"></th>
									</tr>
								</thead>
								<tbody>
									<tr>';
									foreach($arrayExaAlumno as $examenes):
										$htmlExaAlumno .= '<td style="font-size:8;" width="14.4" height="5">'.$examenes->calificacion.'</td>';
									endforeach;
						$htmlExaAlumno .= '
										<td style="font-size:8;" width="0.02" height="5"></td>
									</tr>
								</tbody>
							</table>';


						///imprimo en tabla general las asistencias del estudiante, sus actividades calificadas y sus examenes calificados
						$html .= '<tr> 
									<td width="586"> <b style="font-size:7;">Nombre alumno: '.$detalleReporte->nombre.'</b><br>'.$htmlAsiAlumno.'</td>
									<td width="290">'.$htmlActAlumno.'</td>
									<td width="70">'.$htmlExaAlumno.'</td>
								</tr>';
					endforeach;
		$html .= '
				</tbody>
			</table>';


		// ****************************************************************************************************************************
		// Muestro la lista de asistencias durante el semestre
		$tableAsistencias = 'EA_DIA_CLASE';
		$sql = "SELECT * FROM ".$tableAsistencias." WHERE fk_clase = :id";
		$resultado = $base->prepare($sql);
		$resultado->bindValue(":id", $reporte->fk_clase);
		$resultado->execute();
		$arrayAsistencias = $resultado->fetchAll(PDO::FETCH_OBJ);

		$tablaAs = '';
		$tablaAs .= '
			<table border="1" cellspacing="0" cellpadding="1">
					<thead>
						<tr>
							<th width="80" align="center">Asistencia</th>
							<th width="100" align="center">Fecha</th>
						</tr>
					</thead>
						
					<tbody>';
						foreach ($arrayAsistencias as $listaAs):
		$tablaAs .= '			<tr>
								<td width="80" align="center">'.$listaAs->id_dia.'</td>
								<td width="100" align="center">'.$listaAs->fecha.'</td>
							</tr>';
						endforeach;
		$tablaAs .= '	</tbody>
				</table>';

		// Muestro la lista de actividades durante el semestre
		$tableActividades = 'EA_ACTIVIDAD';
		$sql = "SELECT * FROM ".$tableActividades." WHERE fk_clase = :id";
		$resultado = $base->prepare($sql);
		$resultado->bindValue(":id", $reporte->fk_clase);
		$resultado->execute();
		$arrayActividades = $resultado->fetchAll(PDO::FETCH_OBJ);

		$tablaAc .= '';
		$tablaAc .= '
			<table border="1" cellspacing="0" cellpadding="1">
					<thead>
						<tr>
							<th width="80" align="center"># Actividad</th>
							<th width="100" align="center">Nombre</th>
							<th width="100" align="center">Fecha</th>
						</tr>
					</thead>
						
					<tbody>';
						foreach ($arrayActividades as $listaAc):
		$tablaAc .= '			<tr>
								<td width="80" align="center">'.$listaAc->id_actividad.'</td>
								<td width="100" align="center">'.$listaAc->nombre.'</td>
								<td width="100" align="center">'.$listaAc->fecha.'</td>
							</tr>';
						endforeach;
		$tablaAc .= '	</tbody>
				</table>';


		// Muestro la lista de examenes durante el semestre
		$tableActividades = 'EA_EXAMEN';
		$sql = "SELECT * FROM ".$tableActividades." WHERE fk_clase = :id";
		$resultado = $base->prepare($sql);
		$resultado->bindValue(":id", $reporte->fk_clase);
		$resultado->execute();
		$arrayExamenes = $resultado->fetchAll(PDO::FETCH_OBJ);

		$tablaEx .= '';
		$tablaEx .= '
			<table border="1" cellspacing="0" cellpadding="1">
					<thead>
						<tr>
							<th width="80" align="center"># Examen</th>
							<th width="100" align="center">Nombre</th>
							<th width="100" align="center">Fecha</th>
						</tr>
					</thead>
						
					<tbody>';
						foreach ($arrayExamenes as $listaEx):
		$tablaEx .= '			<tr>
								<td width="80" align="center">'.$listaEx->id_examen.'</td>
								<td width="100" align="center">'.$listaEx->nombre.'</td>
								<td width="100" align="center">'.$listaEx->fecha.'</td>
							</tr>';
						endforeach;
		$tablaEx .= '	</tbody>
				</table>';

		// ****************************************************************************************************************************
		// Imprimo los datos generales de asistencias, actividades y examenes 
		$html2 .= '';
		$html2 .= '<br><br>
			<table cellspacing="0" cellpadding="1">	
				<tbody>
					<tr>
						<td style="vertical-align:top;">'.$tablaAs.'</td>
						<td style="vertical-align:top;">'.$tablaAc.'</td>
						<td style="vertical-align:top;">'.$tablaEx.'</td>
					</tr>
				</tbody>
			</table>';

		$html .= $html2;
	}
	
	$pdf->writeHTML($html, true, false, true, false, '');
	ob_end_clean();
	$pdf->Output('reporte_ea.pdf', 'I');
}
else {

	$html = '<br><br>Sin registro de un reporte, generar alguno.';

	$pdf->writeHTML($html, true, false, true, false, '');
	ob_end_clean();
	$pdf->Output('reporte_ea.pdf', 'I');
}
?>
