<?php
include_once "../PDF/dompdf/autoload.inc.php";
use Dompdf\Dompdf;
$pdf = new Dompdf();
ob_start();
include_once("PDF.php");
$html = ob_get_clean();
$pdf ->loadHtml($html);
$pdf -> setPaper ("A4","handScape");
$pdf -> render();
$pdf -> stream();
?>