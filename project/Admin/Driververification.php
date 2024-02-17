
<?php include("../ASSETS/connections/connection.php");
ob_start();
include('Head.php');?><br><br>
<?php 
use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;	
			 
	require '../ASSETS/phpMail/src/Exception.php';
	require '../ASSETS/phpMail/src/PHPMailer.php';
	require '../ASSETS/phpMail/src/SMTP.php';

  $updateq="update tbl_driver set noti_status=1 where noti_status=0 ";
  $conn->query($updateq);
  if(isset($_GET['did']))
{   
$dq="delete from tbl_driver where driver_id=".$_GET['did'];
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
	$s="select * from tbl_driver where driver_id='".$_GET['acc']."' "; 
	$res=$conn->query($s);
	$row=$res->fetch_assoc();
  
    $mail->addAddress($row['driver_mail']);
  
    $mail->isHTML(true);
  
    $mail->Subject = "Driver Verification Accepted - College Bus Management System Website";
    $mail->Body = "
   
Dear ".$row['driver_name'].", <br>

<p>We are pleased to inform you that your driver verification for the College Bus Management System website has been successfully accepted.
Upon logging in, you will find a user-friendly interface that allows you to perform various tasks related to your role as a bus driver. 
If you encounter any issues while accessing the system or have any questions, please do not hesitate to contact our support team .Congratulations on becoming an authorized driver for our college bus services.</p><br>

Here are the details of your verification:<br><br>

Driver's Name: ".$row['driver_name']." <br>
Driver's License Number:".$row['driver_license']."<br><br>
Thankyou
";
  if($mail->send())
  { 
  $up="update tbl_driver set d_status=1 where d_status=0";
  $conn->query($up);  
    ?>
    <script>
	window.location="driververification.php";
    </script>

<?php }
  else 
  {
    echo "Failed";
  }

}?>
	 
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Driver Verification</title>
<style>
  th{ font:20px Seif;
  font-weight:10px;}
  td{font:16px Sans-serif;}
  a{color:white;}
  a:hover
  {color:cyan;}
  </style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" class="table table-dark table-hover">
    <tr>
      <td>DriverName</td>
      <td>E-Mail</td>
      <td>Contact</td>
      <td>Licence Number</td>
     <td>Years of Experience</td>
      <td>Action</td>
    </tr>
    <?php 
	$d_status=0;
	$s="select * from tbl_driver"; 
	$res=$conn->query($s);
	while($row=$res->fetch_assoc())
	{
	?><tr>
      <td><?php echo $row['driver_name'];?></td>
      <td><?php echo $row['driver_mail'];?></td>
      <td><?php echo $row['driver_phone'];?></td>
      <td><?php echo $row['driver_license'];?></td>
      <td><?php echo $row['driver_exp'];?></td>
      <?php
      if($row['d_status']==1){
     ?><td><?php  echo "accepted";?>&nbsp;<a href="driververification.php?did=<?php echo $row['driver_id']?>">Reject</a></td><?php }else { ?>
      <td><a href="driververification.php?acc=<?php  echo $row['driver_id']?>" class="btn btn-success btn-sm">Accept</a>
     <a href="driververification.php?did=<?php echo $row['driver_id']?>" class="btn btn-danger btn-sm">Reject</a></td>
     <?php } ?>
     </tr>
    <?php  } ?>
   </table>
  

 
</form>
<p>&nbsp;</p>
<?php
include('Foot.php');
ob_flush();
?>
</body>
</html>