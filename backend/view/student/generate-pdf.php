<?php
require '../../../vendor/autoload.php'; // Include the Composer autoload file


// Get parameters from the URL
$name = $_GET['name'] ?? 'No Name';
$surname = $_GET['surname'] ?? 'No Surname';
$course = $_GET['course'] ?? 'No Course';
$year = $_GET['year'] ?? 'No Year';
$usn = $_GET['usn'] ?? 'No USN';
$encodedPhoto = $_GET['photo'] ?? ''; // Get the base64 photo string
$photoMimeType = $_GET['photoMimeType'] ?? 'image/jpeg'; // Default MIME type

// Create new PDF document
$pdf = new TCPDF();
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('E-Card');
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 12);

// Create the HTML content with Flexbox layout
// Create the HTML content using a table layout
$html = '
<style>
    .e-card {
        border: 1px solid #000;
        padding: 20px;
        width: 300px;
        text-align: center;
    }
    .card-content {
        width: 100%;
    }
    .card-table {
        width: 100%;
        border-collapse: collapse; /* Ensure no gaps between cells */
        margin: 0; /* Remove any margin */
        padding: 0; /* Remove any padding */
    }
    .card-details {
        width: 60%; /* Adjust width for details */
        text-align: left; /* Align text to the left */
        padding: 0; /* Remove padding */
    }
    .card-header {
        width: 40%; /* Adjust width for the photo */
        text-align: center; /* Center the image */
        padding: 0; /* Remove padding */
    }
    .card-details h6 {
        margin: 5px 0;
    }
    .card-signature {
        margin-top: 10px;
    }
</style>
<div class="e-card">
    <div class="card-content">
        <table class="card-table">
            <tr>
                <td class="card-details">
                    <img src="/frontend/img/ama-logo2.jpeg" alt="Logo" width="100" height="50" />
                    <h6>NAME: ' . htmlspecialchars($name . ' ' . $surname) . '</h6>
                    <h6>COURSE: ' . htmlspecialchars($course) . '</h6>
                    <h6>YEAR: ' . htmlspecialchars($year) . '</h6>
                    <h6>USN: ' . htmlspecialchars($usn) . '</h6>
                    <h6>MAKATI BRANCH</h6>
                    <div class="card-signature">
                        <span>_____________________________</span>
                        <p>librarian signature</p>
                    </div>
                </td>
                <td class="card-header">';
                
if (!empty($encodedPhoto)) {
    $html .= '<img src="data:' . htmlspecialchars($photoMimeType) . ';base64,' . htmlspecialchars($encodedPhoto) . '" alt="User Photo" width="100" height="130" />';
} else {
    $html .= '<p>No photo available</p>';
}

$html .= '
                </td>
            </tr>
        </table>
    </div>
</div>
';

// Output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document
$pdf->Output('id_card.pdf', 'D');
