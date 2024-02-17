


<?php include("../ASSETS/connections/Connection.php");

ob_start();
include('Head.php');?><br><br>
<?php 
use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;	
			 
	require '../ASSETS/phpMail/src/Exception.php';
	require '../ASSETS/phpMail/src/PHPMailer.php';
	require '../ASSETS/phpMail/src/SMTP.php';

  $up1="update tbl_studentreg set noti_status=1 where noti_status=0";
  $conn->query($up1);

if(isset($_GET['did']))
{   
$dq="delete from tbl_studentreg where stureg_id=".$_GET['did'];
$conn->query($dq);
}
if(isset($_GET['acc']))
{   
	  $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'collegebusmanagementsystem@gmail.com'; // Your gmail
    $mail->Password = 'xjeqrhiyibfqgsrn'; // Your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
  
    $mail->setFrom('collegebusmanagementsystem@gmail.com'); // Your gmail
	$s="select * from tbl_studentreg where stureg_id='".$_GET['acc']."' "; 
	$res=$conn->query($s);
	$row=$res->fetch_assoc();
  
    $mail->addAddress($row['stu_mail']);
  
    $mail->isHTML(true);
  
    $mail->Subject = "Confirmation of College Bus Management System Verification";
    $mail->Body = "
    Dear ".$row['stu_name'].",<br>

<p>I hope this email finds you well.
 This is the email to inform you that your verification for access to the College Bus Management System website has been successfully accepted.</p>
 <p>Please take a moment to log in and familiarize yourself with the system. If you encounter any issues or have any questions, don't hesitate to reach out to our support team at <a href=collegebusmanagementsystem@gmail.com>collegebusmanagementsystem@gmail.com</a>.

<p>We believe that the College Bus Management System will greatly enhance your experience and convenience while using college bus services. It will provide real-time information about bus routes, schedules, and any updates related to the bus service.</p>

<p>Thank you for your cooperation in completing the verification process. We look forward to serving you better with this system.</p>
<br>
Login Details:<br>
Email: ".$row['stu_mail']."<br>
Password: ".$row['stu_pass'];

  if($mail->send())
  {
   $up = "UPDATE tbl_studentreg SET stud_status = 1 WHERE stureg_id = " . $_GET['acc'] . " AND stud_status = 0";
$conn->query($up); 
    ?>
    <script>
	window.location="studentverification.php";
    </script>
    <?php
  }
  else
  {
    echo "Failed";
  }

}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Verification</title>

<!-- Include Bootstrap CSS -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<style>
  th {
    font-size: 20px;
    font-weight: bold;
  }
  td {
    font-size: 15px;
    font-family: Sans-serif;
  }
  a {
    color: white;
  }
  a:hover {
    color: cyan;
  }
</style>
</head>

<body>
<div class="container">
  <form id="form1" name="form1" method="post" action="">
    <table class="table table-responsive table-hover table-dark">
        <thead>
            <tr>
                <th>Name</th>
                <th>E-Mail</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Guardian Contact</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $s = "select * from tbl_studentreg "; 
            $res = $conn->query($s);
            while ($row = $res->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $row['stu_name'];?></td>
                <td><?php echo $row['stu_mail'];?></td>
                <td><?php echo $row['stu_dob'];?></td>
                <td><?php echo $row['stu_gen'];?></td>
                <td><?php echo $row['stu_house'];?></td>
                <td><?php echo $row['stu_contact'];?></td>
                <td><?php echo $row['stu_gcon'];?></td>
                <?php
                if($row['stud_status'] == 1) {
                ?>
                <td class="text-success">Accepted &nbsp;<a href="Studentverification.php?did=<?php echo $row['stureg_id']?>" class="btn btn-danger btn-sm">Reject</a></td>
                <?php } else { ?>
                <td><a href="Studentverification.php?acc=<?php echo $row['stureg_id']?>" class="btn btn-success btn-sm">Accept</a>
                    <a href="Studentverification.php?did=<?php echo $row['stureg_id']?>" class="btn btn-danger btn-sm">Reject</a></td>
                <?php } ?>
            </tr>
            <?php } ?>
        </tbody>
    </table>
  </form>
</div>

<!-- Include Bootstrap JavaScript (optional) -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

