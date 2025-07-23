<?php

namespace App\Services;

use Mpdf\Mpdf;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;
use Illuminate\Support\Facades\Auth;

class PrescriptionPDFService
{
    protected $mpdf;

    public function __construct()
    {
        $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];

        $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];

        $this->mpdf = new \Mpdf\Mpdf([
            'fontDir' => array_merge($fontDirs, [
                public_path()."/fonts",
            ]),
            'fontdata' => $fontData + [ // lowercase letters only in font key
                'solaimanlipi' => [
                    'R' => 'SolaimanLipi.ttf',
                    'I' => 'SolaimanLipi.ttf',
                    'useOTL' => 0xFF,
                    'useKashida' => 75,
                ]
            ],
            'default_font' => 'solaimanlipi'
        ]);
    }

    public function generatePDF($prescription, $case, $allMedicine)
    {
        // Render the Blade view to HTML
        $html = view('pdfview.mpdf', [
            'patient' => $case,
            'data' => $allMedicine,
            'doctor' => Auth::user(),
            'prescription' => $prescription
        ])->render();

        // Write the HTML content to the PDF
        $this->mpdf->WriteHTML($html);

        // Set the footer after writing the HTML content
        $this->mpdf->SetHTMLFooterByName('page-footer');

        // Define the file path where the PDF will be saved
        $fileName = 'prescription_' . $prescription->id . '.pdf';
        $path = public_path('files/prescriptions');
        $filePath = $path . '/' . $fileName;

        // Ensure the directory exists
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        // Save the PDF file to the server
        $this->mpdf->Output($filePath, \Mpdf\Output\Destination::FILE);

        // Optionally, return the file path for further use or download
        return $filePath;
    }

    public function displayPDF($prescription, $case, $allMedicine)
    {
        // Render the Blade view to HTML
        $html = view('pdfview.mpdf', [
            'patient' => $case,
            'data' => $allMedicine,
            'doctor' => Auth::user(),
            'prescription' => $prescription
        ])->render();

        // Write the HTML content to the PDF
        $this->mpdf->WriteHTML($html);

        // Set the footer after writing the HTML content
        $this->mpdf->SetHTMLFooterByName('page-footer');

        // Display the PDF inline in the browser
        $this->mpdf->Output($prescription->id . '_prescription.pdf', \Mpdf\Output\Destination::INLINE);
    }
}
