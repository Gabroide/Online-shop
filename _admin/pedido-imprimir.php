<?php require_once('../Connections/conexion.php');
RestringirAcceso("1, 10");

$strHTML = $_SESSION["impresion"];

require_once 'dompdf8/autoload.inc.php';

require_once 'dompdf8/lib/html5lib/Parser.php';
require_once 'dompdf8/lib/php-font-lib/src/FontLib/Autoloader.php';
require_once 'dompdf8/lib/php-svg-lib/src/autoload.php';
require_once 'dompdf8/src/Autoloader.php';
Dompdf\Autoloader::register();

$strHTML=str_replace (_strURL."/images/" , "../images/" , $strHTML);

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($strHTML);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("resultado.pdf");
?>