<?php  include("../ASSETS/connections/Connection.php");
session_start();
if(isset($_POST["btnsub"]))
{
	$uname=$_POST["txtuname"]; 
	$upass=$_POST["txtpass"];
	$ad="select * from tbl_admin where admin_mail='".$uname."' and admin_pass='".$upass."'";
	$st="select * from tbl_studentreg where stu_mail='".$uname."' and stu_pass='".$upass."' and stud_status=1";
	$dr="select * from tbl_driver where driver_mail='".$uname."' and  driver_pass='".$upass."'and d_status=1";
	$resad=$conn->query($ad);
	$resst=$conn->query($st);
	$resdr=$conn->query($dr);
	
	
	if($resad->num_rows>0)
{
	
	$row=$resad->fetch_assoc();
	$_SESSION['aid']=$row["admin_id"]; 
	$_SESSION['aname']=$row["admin_name"]; 
		header("location:../Admin/Adminhome.php");
}
else if($resst->num_rows>0)
{ 
$row=$resst->fetch_assoc();
	$_SESSION['sid']=$row["stureg_id"]; 
		$_SESSION['sname']=$row["stu_name"]; 
		header("location:../Student/studenthome.php");
}

else if($resdr->num_rows>0)
{ 
$row=$resdr->fetch_assoc();
	$_SESSION['did']=$row["driver_id"]; 
		$_SESSION['dname']=$row["driver_name"]; 
	header("location:../Driver/HomepageDriver.php");
}
else
?>
<script>
alert('No user found')
</script>
<?php 
}
?>
<script>
function togglePasswordVisibility() 
{
	
            var passwordInput = document.getElementById("txtpass");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
}

</script>
<?php if(isset($_POST["chk1"]))
 {
setcookie("user_login",$_POST["txtuname"],time()+ (10 * 365 * 24 * 60 * 60));
setcookie("userpassword",$_POST["txtpass"],time()+ (10 * 365 * 24 * 60 * 60));
} 
else
 {
if(isset($_COOKIE["user_login"]))
{
setcookie ("user_login","");
}
if(isset($_COOKIE["userpassword"])) 
{
setcookie ("userpassword","");
}
 }?>

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
  height: 60%;
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
      width: 80%;
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
<a style="background-color: transparent; font-weight: bold; position: absolute; top: 0; right: 150px; padding-top:50px;" href="../index.php">-> HOME</a>

  <img src="../ASSETS/Templates/Admin/assets/img/[removal.ai]_b24615a2-fa50-4c1d-8f9f-37baefcc68a3_18938574_4jk2_juyi_191127.png" width=300px height=450px>

<div class="box">

  <form id="form1" name="form1" method="post" action="">
    <div class="a">
      <div class="input-group">
               
                <input type="text" name="txtuname" id="txtuname" class="form-control" required placeholder="EMAIL">
                 <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
              </div>
    </div>

    <div class="a">
          <div class="input-group">
                <input type="password" name="txtpass" id="txtpass" class="form-control" required placeholder="PASSWORD">
                <span onClick="togglePasswordVisibility()" class="input-group-text"><i class="fa-solid fa-key"></i></span>
              </div>
    </div>   <input type="submit" name="btnsub" id="btnsub" value="LOGIN"><br><br><br>
<div style="float: left; font-family: Impact, sans-serif; color: black; margin-bottom:30px">    <a href="ForgotPassword.php" style="background-color:transparent;">Forgot password ?</a></div>


    <select name="selad" id="selad" onchange="location = this.value;">
      <option value="login.php">Sign up</option>
      <option value="Studentregistration.php">Student</option>
      <option value="driverregistration.php">Driver</option>
    </select>
  </form>
  </div>

</body>
</html>
