<?php
include("../ASSETS/connections/Connection.php");
session_start();

if (isset($_POST['change'])) {
    if ($_POST['newPassword'] == $_POST['confirmPassword']) {
        $k = "select * from tbl_studentreg where stu_mail='" . $_SESSION['mail'] . "'";
        $r1 = $conn->query($k);
        
        if ($r1->num_rows > 0) {
            $up1 = "update tbl_studentreg set stu_pass='" . $_POST['confirmPassword'] . "' where stu_mail='" . $_SESSION['mail'] . "'";
            $conn->query($up1);
        } else {
            $k1 = "select * from tbl_driver where driver_mail='" . $_SESSION['mail'] . "'";
            $r2 = $conn->query($k1);
            $row2 = $r2->fetch_assoc();
            
            if ($r2->num_rows > 0) {
                $up2 = "update tbl_driver set driver_pass='" . $_POST['confirmPassword'] . "' where driver_mail='" . $_SESSION['mail'] . "'";
                $conn->query($up2);
            }
        }
        ?>
        <script>
            alert("Password Updated");
        </script>
        <?php
        header("location:../Guest/login.php");
    } else {
     ?> <script> alert("Passwords don't match") </script> <?php
    }
}
?>
<script>
  </SecurityPolicyViolationEvent	 function validatePassword() {
          const passwordInput = document.getElementById("newPassword");
			password=passwordInput.value.trim();
       

            if (password.length < 8) {
                alert("Password must be at least 8 characters long.");
                return false;
            }

            if (!/[A-Z]/.test(password) || !/[a-z]/.test(password)) {
                alert("Password must contain both uppercase and lowercase letters.");
                return false;
            }

            if (!/\d/.test(password)) {
                alert("Password must contain at least one number.");
                return false;
            }

            if (!/[!@#$%^&*]/.test(password)) {
                alert("Password must contain at least one special character: !@#$%^&*");
                return false;
            }
	 }>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Change Password</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form method="post" action="">
                    <div class="form-group">
                        <label for="newPassword">Enter New Password:</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword"  onblur="validatePassword();" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirm New Password:</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                    </div>
                    <input type="submit"  name="change" class="btn btn-primary" value="Change Password"><?php echo $_SESSION['mail'] ?>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
  height:430px;;
   perspective: 1000px;
  
  
background-color:transprent;
  background-size:60%; 
    background-position:270px 170px ;
  right: 5%; /* Adjust margin as needed */
  background-repeat: no-repeat;
  backdrop-filter: blur(3px);

  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 10px black,0 0 25px;
  text-align: center;
  color: white;
  padding:20px;
margin-right:50px;
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

<div class="box">

  <form id="form1" name="form1" method="post" action="">
    <div class="a">
      <div class="input-group">     
      <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Enter new Password"required>             
              </div><br>
              <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Please confirm Password" required>
    </div>
   
    <input type="submit"  name="change" class="btn btn-primary" value="Change Password"><br><br><br>



  
  </form>

  </div>

</body>
</html>
