<?php 
header('Content-Type: text/html; charset=UTF-8');
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// Configure Dompdf
$options = new Options();
$options->set('isRemoteEnabled', true);
$options->set('isHtml5ParserEnabled', true);
$options->set('defaultFont', 'DejaVu Sans');

$dompdf = new Dompdf($options);



$html = file_get_contents('http://art.local:2124/form_pdf.php?XfsadrtTTSd2=dc104753956f3754cbdc5ef417104a0f');

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'landscape');

$dompdf->render();
$dompdf->stream("document.pdf", [
    "Attachment" => false // Set to false for inline display
]);
$output = $dompdf->output();



// require_once 'mpdf/src/Mpdf.php';

// $mpdf = new \Mpdf\Mpdf([
//     'default_font' => 'DejaVuSans', // For Urdu or Unicode fonts
// ]);

// $html = '<html>
// <body style="direction: rtl; text-align: right; font-family: DejaVu Sans;">
// یہ اردو میں ایک نمونہ متن ہے۔
// </body>
// </html>';
// $html = file_get_contents('http://art.local:2124/form.php?XfsadrtTTSd2=dc104753956f3754cbdc5ef417104a0f');

// $mpdf->WriteHTML($html);
// $mpdf->Output('urdu_document.pdf', 'I'); // D for download

// require_once __DIR__ . '/tcpdf/tcpdf.php';


// // Create new PDF instance
// $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// // Set document information
// $pdf->SetCreator(PDF_CREATOR);
// $pdf->SetAuthor('Your Name');
// $pdf->SetTitle('Urdu PDF');
// $pdf->SetSubject('TCPDF Urdu Support');

// // Set default monospaced font
// $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// // Set margins
// $pdf->SetMargins(10, 10, 10);

// // Add a page
// $pdf->AddPage();

// // Set custom Urdu font
// $pdf->SetFont('JameelNooriNastaleeq', '', 12); // Use the font name you added
// $urduFont = 'dejavusans'; // Or any Urdu-compatible font
// $pdf->SetFont($urduFont, '', 12);
// // Add Urdu content
// $html = <<<EOD


// <div style="text-align: right; direction: rtl; font-family: 'Jameel Noori Nastaleeq', DejaVuSans, sans-serif;">
//     <h1>یہ اردو متن کا نمونہ ہے۔</h1>
//     <p>یہ متن PDF میں TCPDF کا استعمال کرتے ہوئے بنایا گیا ہے۔</p>
// </div>
// EOD;

// // Write the HTML content to the PDF
// $pdf->writeHTML($html, true, false, true, false, '');

// // Output the PDF
// // $pdf->Output('UrduContent.pdf', 'D'); // 'D' will force download

// // Output the PDF
// $pdf->Output('UrduContent.pdf', 'I'); // D = Download
?>