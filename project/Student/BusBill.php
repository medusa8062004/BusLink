<?php
include("../ASSETS/connections/Connection.php");
require('C:\xampp\htdocs\BusLink\project\ASSETS\fpdf186\fpdf.php');
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../ASSETS/phpMail/src/Exception.php';
require '../ASSETS/phpMail/src/PHPMailer.php';
require '../ASSETS/phpMail/src/SMTP.php';
class PDF extends FPDF
{
    function Header()
    {
        $this->Ln(10);
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(0, 10, 'BASELIOS POULOSE II CATHOLICOS COLLEGE PIRAVOM', 0, 1, 'C'); // Changed height to 10
    
        $imageWidth = 30;
        $xCoordinate = 40; // Adjusted x-coordinate for image positioning
        $yCoordinate = $this->GetY(); // Get current y-coordinate after last cell
    
        $this->Image('../ASSETS/Templates/User/assets/images/bpc.png', $xCoordinate, $yCoordinate, $imageWidth);
        
        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 10, 'PIRAVOM-686664,Ph: 0485-2243474,2243424', 0, 1, 'C');
        $this->Cell(0, 10, 'collegebusmanagementsystem@gmail.com', 0, 0, 'C');  // Changed height to 10
        $this->Ln(10); // Add extra vertical space after the header
    }
    
    function footer()
    {
        // Footer content
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}


$pdf = new PDF();
$pdf->AddPage();

// Set fonts and styles
$pdf->SetFont('Arial', '', 12);
$pdf->SetLineWidth(0.9);
$pdf->Rect(10, 10, 190, 275, 'D');

// Database connection code (assuming you have already connected to the database)

$a = "SELECT * FROM tbl_stdstp st INNER JOIN tbl_stop s ON s.stop_id = st.stop_id INNER JOIN tbl_route r ON r.route_id = s.route_id INNER JOIN tbl_studentreg reg ON reg.stureg_id = st.stureg_id INNER JOIN tbl_assign a ON a.route_id = r.route_id INNER JOIN tbl_bus b ON b.bus_id = a.bus_id INNER JOIN tbl_department dep ON reg.dep_id = dep.dep_id
 INNER JOIN tbl_payment p ON p.stureg_id = st.stureg_id WHERE st.stureg_id =" . $_SESSION['sid'];
$result = $conn->query($a);

if ($resrow = $result->fetch_assoc()) {
    if (isset($_GET['iid'])) {
        $k = $_GET['iid'];

    }
    $pdf->Ln(10);
    
    $pdf->SetX(140);
    $pdf->Cell(50, 10, 'Bill Number: ' . $resrow['bill_no'], 0, 1);
    $pdf->SetX(140);
    $pdf->Cell(50, 10, 'Date: ' .date('Y-m-d'), 0, 1);
    $pdf->Cell(0, 10, 'To,', 0, 1);
    $pdf->Cell(0, 10, $resrow['stu_name'], 0, 1);
    $pdf->Cell(0, 10, $resrow['dep_name'], 0, 1);
    $pdf->Cell(0, 10, 'Roll Number: ' . $resrow['stu_roll'], 0, 1); 
    $pdf->Ln(10);
    
  
    $pdf->Cell(0, 10, 'Payment Date: ' . $resrow['pay_datetime'], 0, 1);
    $pdf->Cell(0, 10, 'Paid Month:'.$resrow['pay_month'], 0,1);
    $pdf->Cell(0, 10, 'Payment Status: Paid', 0, 1);
    $pdf->Ln(10);

$route = 'Route';
$stop = 'Stop';
$busID = 'Bus ID';
$busFee = 'Bus Fee';

$resrow = array(
    'source_name' => 'Source',
    'desti_name' => 'Destination',
    'stop_name' => 'Stop Name',
    'bus_regno' => 'Bus Registration',
    'stp_no' => 6, // Sample value, change as needed
    'route_rate' => 200 // Sample value, change as needed
);



// Set the x-coordinate for the table
$pdf->SetX(30);


// Set font for table headers
$pdf->SetFont('Arial', 'B', 9);

// Output table headers
$pdf->Cell(40, 10, $route, 1, 0, 'C');
$pdf->Cell(40, 10, $stop, 1, 0, 'C');
$pdf->Cell(40, 10, $busID, 1, 0, 'C');
$pdf->Cell(30, 10, $busFee, 1, 1, 'C');


// Set font for table content
$pdf->SetX(30);

$pdf->SetFont('Arial', '', 10);

// Output table content


$pdf->Cell(40, 10, $resrow['source_name'] . ' to ' . $resrow['desti_name'], 1, 0, 'C');
$pdf->Cell(40, 10, $resrow['stop_name'], 1, 0, 'C');
$pdf->Cell(40, 10, $resrow['bus_regno'], 1, 0, 'C');

if ($resrow['stp_no'] <= 5) {
    $pdf->Cell(30, 10, '$' . $resrow['route_rate'], 1, 1, 'C');
    $pdf->Cell(0, 10, 'Total amount:'. ($resrow['route_rate'] + 100).'only', 0, 1);
$pdf->Ln(10);

} else {
    $pdf->Cell(30, 10, '$' . ($resrow['route_rate'] + 100), 1, 1, 'C');
    $pdf->Cell(0, 10, 'Total amount:'. ($resrow['route_rate'] + 100).'only', 0, 1);
$pdf->Ln(10);

}


$pdf->Output('BusBill.pdf', 'F');

}
$mail = new PHPMailer(true);

try {
   $s1="select stu_mail from tbl_studentreg r where  r.stureg_id =" . $_SESSION['sid']; 
   $r1=$conn->query($s1);
   $resrow=$r1->fetch_assoc();


    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'collegebusmanagementsystem@gmail.com'; // Your gmail
    $mail->Password = 'xjeqrhiyibfqgsrn'; // Your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;


    $mail->setFrom('collegebusmanagementsystem@gmail.com'); // Your gmail
    $mail->addAddress($resrow['stu_mail'], 'BusBill');

    // Content
    $mail->isHTML(false);
    $mail->Subject = 'PDF Attachment';
     $mail->Body = 'Please find the attached PDF.';
  $mail->addAttachment('BusBill.pdf', 'BusBill.pdf');
  

    // Send email
  $mail->send();
  unlink('BusBill.pdf');


 
?>
  <script>alert("Bill is sent to your Email.Please Check.");

         window.location.href="studenthome.php"</script>
 <?php 
 

} catch(Exception $e) {
    echo 'Email sending failed: ' . $e->getMessage();
}



?>