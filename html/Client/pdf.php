<?php 

require_once '../dompdf/autoload.inc.php'; 
 
use Dompdf\Dompdf;
 
// instantiate and use the dompdf class
$dompdf = new Dompdf();


$html = file_get_contents('../viewTicket.php');
$dompdf->loadHtml($html);
 
 
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');
  
// Render the HTML as PDF
$dompdf->render();
  
// Output the generated PDF to Browser
$dompdf->stream();

$dompdf->set_option('enable_remote', TRUE);
$dompdf->loadHtmlFile('URL_OF_HTML_FILE');
  
// Render the HTML as PDF
$dompdf->render();
  
// Output the generated PDF to Browser
// Output the generated PDF to Browser
$pdf = $dompdf->output();
file_put_contents("newfile.pdf", $pdf);
 
?>