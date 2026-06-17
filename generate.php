<?php
require_once __DIR__ . '/vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// Configure dompdf
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', false);
$options->set('defaultFont', 'DejaVu Sans');
$options->set('chroot', __DIR__);

$dompdf = new Dompdf($options);

// Load HTML
$html = file_get_contents(__DIR__ . '/offerte.html');
$dompdf->loadHtml($html);

// Set paper size: A4 portrait
$dompdf->setPaper('A4', 'portrait');

// Render PDF
$dompdf->render();

// Save to file
$outputPath = __DIR__ . '/offerte-ritmebox-2026.pdf';
file_put_contents($outputPath, $dompdf->output());

echo "✅ PDF generated successfully!\n";
echo "📄 Output: " . $outputPath . "\n";
echo "📏 Pages: " . $dompdf->getCanvas()->get_page_count() . "\n";
