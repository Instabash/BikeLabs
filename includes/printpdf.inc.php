<?php

ob_start();
require_once("../orderconfirmation.php");

$php_to_html = ob_get_clean();

$removehead = '<style>
  header {
    display: none;
  }
  .print-remove{
  	display: none;
  }
  footer{
  	padding-top:40px !important;
  }
</style>'.$php_to_html;

// Include autoloader 
require_once '../dompdf/autoload.inc.php'; 
 
// Reference the Dompdf namespace 
use Dompdf\Dompdf; 
 
// Instantiate and use the dompdf class 
$dompdf = new Dompdf();

// Load content from html file 
// $html = file_get_contents("../voucherfile.php"); 
$dompdf->loadHtml($removehead); 
 
// (Optional) Setup the paper size and orientation 
$dompdf->setPaper('A4', 'landscape'); 
 
// Render the HTML as PDF 
$dompdf->render(); 
 
// Output the generated PDF (1 = download and 0 = preview) 
$dompdf->stream("voucher", array("Attachment" => 1));



