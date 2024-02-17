<?php
include("../ASSETS/connections/connection.php");
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../ASSETS/phpMail/src/Exception.php';
require '../ASSETS/phpMail/src/PHPMailer.php';
require '../ASSETS/phpMail/src/SMTP.php';

if (isset($_POST['btnsub']))
 {
    $email = $_POST['email'];
    $_SESSION['mail']=$email;
    
    $st = "SELECT * FROM tbl_studentreg WHERE stu_mail='" . $email . "'";
    $resst = $conn->query($st);
  
    if ($resst->num_rows > 0)
     {
      
        $otp = rand(100000, 999999);
        $_SESSION['otp'] = $otp;

        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'collegebusmanagementsystem@gmail.com'; // Your Gmail
        $mail->Password = 'xjeqrhiyibfqgsrn'; // Your Gmail app password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('collegebusmanagementsystem@gmail.com'); // Your Gmail
  
            $mail->addAddress($email);
      

        $mail->isHTML(true);

        $mail->Subject = "Reset password";
        $mail->Body = "Here is your OTP for password reset: <br>" . $otp;
        if ($mail->send()) {
            header('Location: Reset.php');
            exit;
        } else {
            echo "Failed to send email.";
        }
     
    } 
     
    



$dr = "SELECT * FROM tbl_driver WHERE driver_mail='" . $email . "'";
$resdr = $conn->query($dr);
if ($resdr->num_rows > 0) 
 {
   
        $otp = rand(100000, 999999);
        $_SESSION['otp'] = $otp;

        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'collegebusmanagementsystem@gmail.com'; // Your Gmail
        $mail->Password = 'xjeqrhiyibfqgsrn'; // Your Gmail app password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('collegebusmanagementsystem@gmail.com'); // Your Gmail
  
            $mail->addAddress($email);
      

        $mail->isHTML(true);

        $mail->Subject = "Reset password";
        $mail->Body = "Here is your OTP for password reset: <br>" . $otp;
        if ($mail->send()) {
            header('Location: Reset.php');
            exit;
        } else {
            echo "Failed to send email.";
        }
    } else {?> <script> alert("Email doesn't exist in any table")</script>;
    <?php }   
}   


?>

<!-- <!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h1>Forgot Password</h1>
    <form method="post" action="">
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <input type="submit" name="btnsub" value="Submit">
    </form>
</body>
</html> -->




<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Login Page</title>
  <script src="https://kit.fontawesome.com/b24d3e17da.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
body {
  display: flex;
  justify-content: flex-end; /* Change to right */
  align-items: center;
  min-height: 100vh;
  background-image: url("../ASSETS/Templates/User/assets/images/1215613_77.jpg");

  background-size:cover;
 


  /* Adjust background size as needed */
  background-repeat:no-repeat;
  background-position:0px -500px;
  background-attachment: fixed;
  /* Adjust the blur as needed */
  margin: 0;
  font-family: Arial, sans-serif;
}

.box {
  width:50%;
  height:430px;
 
  background-position: 270px 170px;
  right: 5%;
  background-repeat: no-repeat;
  backdrop-filter: blur(3px);
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 10px black, 0 0 25px;
  text-align: center;
  color: white;
  padding: 20px;
  margin-right: 50px;
}
    .a {
      display: flex;
      flex-direction: column;
      margin: 30px 0;
    }

    .a input {
      border: 1px solid grey;
      border-radius: 5px;
      padding: 10px;
      width: 100%;
      font-family: Impact, sans-serif;
    }

    .a i {
      float: right;
    }

    input[type="submit"] {
      width:100%;
      height: 40px;
      color: white;
      border: 1px solid purple;
      background: linear-gradient(to right, purple, blue);
      border-radius: 10px;
      font-family: Impact, sans-serif;
      cursor: pointer;
	  float:center;

}


    select {
      float: right;
      background-color: transparent;
      padding: 10px;
      color: Black;
      border: none;
      font-family: Impact, sans-serif;
	 
	    
	}


    select option {
      background-color:transparent;
      font-family: Impact, sans-serif;
	  color:black;
    }

    a {
      text-decoration: none;
      background-color: black;
      float: right;
      color: black;
    }

    form {
     width: 45%;
	 float:left;
  background-color: transparent;
  position: absolute;
  right:400px;
  left:0;
  top: 50%;
  margin:20px;
  transform: translateY(-50%);
  color: purple;
    }


  </style>
</head>
<body>
  <img src="../ASSETS/Templates/Admin/assets/img/[removal.ai]_b24615a2-fa50-4c1d-8f9f-37baefcc68a3_18938574_4jk2_juyi_191127.png" width=300px height=450px>
  <a href="javascript:history.go(-1);" style="background-color: transparent; font-weight: bold; position: absolute; top: 0; right: 150px; padding-top:50px;"  class="back-button">&#9666; Back</a>
<div class="box">

  <form id="form1" name="form1" method="post" action="">
    <div class="a">
      <div class="input-group">
               
      <input type="email" name="email" id="email" placeholder="Enter your registered Email" required>
             
              </div>
    </div>

  <input type="submit" name="btnsub" id="btnsub" value="SUBMIT"><br><br><br>



  
  </form>
  </div>

</body>
</html>