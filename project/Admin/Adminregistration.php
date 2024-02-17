
<?php
include("../ASSETS/connections/connection.php");

$messages="";
if(isset($_POST["btnsub"]))
{    
    
	$adname=$_POST["txtname"];
	$admail=$_POST["txtmail"];
	$adpass=$_POST["txtpass"];
  $nbpic=$_FILES["image"]["name"];
  $temppic=$_FILES["image"]["tmp_name"];
  $size=$_FILES["image"]["size"];
  move_uploaded_file($temppic,'../ASSETS/File/User/'.$nbpic);
$inquery="insert into tbl_admin(admin_name,admin_mail,admin_pass,admin_pic)values('".$adname."','".$admail."','".$adpass."','".$nbpic."')";
$conn->query($inquery);

}
?>
  <script>
  
function validate()
{

	var username=document.getElementById("txtname"); 
		var email=document.getElementById("txtmail"); 
			var password=document.getElementById("txtpass"); 
			if(username.value==""||email.value==""||password.value=="")
			{
				alert('fill out all fields'); 
				return false;
			}
			true;
}

    
    
    function validateUsername() {
	
      const usernameInput = document.getElementById("txtname");
      const usernameError = document.getElementById("usernameError");
	 const firstCharacter = usernameInput.value.charAt(0);
      const username = usernameInput.value.trim();
	       if (username.length <3) {
        usernameError.textContent = "Username must be at least 3 characters long.";
      } else if (username.length >8) {
        usernameError.textContent = "Username cannot exceed 8 characters.";
      } else if (!/^[a-zA-Z0-9_-]+$/.test(username)) {
        usernameError.textContent = "Username can only contain letters, numbers, hyphens, and underscores.";
      } else if(!/^[A-Za-z]+$/.test(firstCharacter)){
	    usernameError.textContent ="Name start with letter only";	  
	  }else {
        usernameError.textContent = ""; // Clear error message
      }
	}
	
	
    function validateEmail() {
      const emailInput = document.getElementById("txtmail");
      const emailError = document.getElementById("emailError");
      const email = emailInput.value.trim();

      // Regular expression pattern for basic email validation
      const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

      if (!emailPattern.test(email)) {
        emailError.textContent = "Please enter a valid email address.";
      } else {
        emailError.textContent = ""; // Clear error message
      }
	}
    
	
	
	 function validatePassword() {
            var password = document.getElementById("txtpass").value;
       

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

           
            

            return true;
	 }
	/* function confirmPassword()
	 {
		  var password = document.getElementById("txtpass").value;
            var confirmPassword = document.getElementById("txtcpass").value;
		  if (password !== confirmPassword)
                alert("Passwords do not match.");
                return false;
				}*/
        
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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Adminregistration.php</title>
<script src="https://kit.fontawesome.com/b24d3e17da.js" crossorigin="anonymous"></script>

<style>
body
{display:flex;
justify-content:center;
align-items:center;
min-height:100vh;
background-color: purple;
color:white;
}

.box
{ 
position:relative;
width:370px;
height:500px;

padding:10px;
border-radius:9px;
box-shadow:0 0 5px blue,0 0 25px cyan,0 0 50px white ;

}

input[type="submit"]
{width:100%;
height:40px;
color:white;
background:linear-gradient(to left,cyan,blue,cyan);
border-color:cyan;
border-radius:10px;
}


input[type="submit"]:hover
{width:100%;
height:40px;
color:white;
background:linear-gradient(to left,cyan,darkblue,cyan);
box-shadow:0 0 5px cyan,0 0 25px cyan,0 0 50px cyan,0 0 100px cyan,0 0 200px cyan;
transform:scaleY(-10px);
border-color:cyan;
border-radius:10px;
}
input[type="reset"]
{ 
width:30%;
height:20px;
color:white;
background:linear-gradient(to left,cyan,blue,cyan);
border-color:cyan;
border-radius:6px;
align:right;
}
/*input[type="password"]:invalid
 {
  animation: justshake 0.3s forwards;
  color:red;
}

@keyframes justshake {
  25% {
    transform: translateX(5px);
  }

  50% {
    transform: translateX(-5px);
  }

  75% {
    transform: translateX(5px);
  }

  100% {
    transform: translateX-(5px);
  }
}*/
</style>
</head>

<body>

<div class="box">
<form name="myForm" method="post" action=""  enctype="multipart/form-data" onsubmit=" return validate()" >
 <center><h2>Admin</h2></center>
      Name<br>
      <input type="text" name="txtname" id="txtname" onBlur="validateUsername()" required="required" /><br><br>
      <p id="usernameError" style="color:white;"></p>
 <hr>

 Image<br>
 <input type="file" name="image" id="image"   required/>

      
 <hr>
   Email<br>
     <label for="txtmail"></label>
      <input  type="email" name="txtmail" id="txtmail" onBlur="validateEmail()" required="required" /><br><br>
      <p id="emailError" style="color:white;"></p>
  <hr>
     Password<br>
      <label for="txtpass"></label>
      <input type="password" name="txtpass" id="txtpass"onblur=" validatePassword()"   required="required"  />	
  <i onClick="togglePasswordVisibility()" class="far fa-eye"></i>
      <br><br>
      <p id="passError" style="color:white;">
     
      
        <input type="submit" name="btnsub" id="btnsub" value="Submit" /><br>
        <br>
        <input type="reset" name="btncancel" id="btncancel" value="Cancel" />
     
   
  
</form>
</div>
</body>
</html>