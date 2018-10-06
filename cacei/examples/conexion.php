<?php


require_once('tcpdf_include.php');


// extend TCPF with custom functions
class MYPDF extends TCPDF {

			function fetch_data()
			{
			$output = '';  

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
	$sql ="";
$sql = "SELECT nombre, apellido_paterno, apellido_materno FROM C_PROFESOR";
$query = mysqli_query($con, $sql) or die (mysqli_error($con));  


			 $output .= '<tr>  
                        			  	 <td style="border-bottom:1px thin #666"; align="center">holi'</td>  
			               </tr>  
			                          ';  
						
					
			return $output;
					}

	
}


$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// Añadir una pagina
// Este metodo tiene mucha sopciones, revisar documentación para mas información

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$pdf->SetFont('times', '', 12);

$pdf->AddPage();


$content = ''; 

      $content .= '  

      <table border="1"><tr><td width="100%">
      <table border="0">
           <tr>' ;  

        $content .= '  
                <th width="30%" align="center">Nombre</th>  
                <th width="30%" align="center">Apellido1</th>  
                <th width="40%" align="center">Apellido2</th>    
           </tr>  
      '; 
       
      $content .= $html='</table></td></tr></table>';  
	$content .= fetch_data(); 
	$pdf->writeHTML($content); 
	//Close and output PDF document
	$pdf->Output('example_01we1.pdf', 'I');

