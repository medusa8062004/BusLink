<?php include("../ASSETS/connections/Connection.php"); 
if(isset($_POST["btnsub"]))
{
	$fname=$_POST["txtname"]; 
	$mail=$_POST["txtmail"]; 
	$dob=$_POST["txtdob"]; 
	$gen=$_POST["gender"]; 
	$year=$_POST["txtyear"]; 
	$house=$_POST["txtadd"];
	 $city =$_POST["txtstreet"];
	  $pin=$_POST["txtpin"];
	$roll=$_POST["txtroll"]; 
	$con=$_POST["txtcon"]; 
	$gname=$_POST["txtgname"]; 
	$gcon=$_POST["txtgcon"];
	$pass=$_POST["txtpass"];
	$dd=$_POST["ddldep"];
  $nbpic=$_FILES["image"]["name"];
  $temppic=$_FILES["image"]["tmp_name"];
  $size=$_FILES["image"]["size"];
  move_uploaded_file($temppic,'../ASSETS/File/User/'.$nbpic);
	$place_id= $_POST["ddlplace"];
   
 
$iqury="insert into tbl_studentreg(stu_name,stu_mail,stu_dob,stu_gen,dep_id,stu_year,stu_city,stu_pin,stu_house,stu_roll,stu_contact,stu_gname,stu_gcon,stu_pass,place_id,stud_status,stu_pic)
values('".$fname."','".$mail."','".$dob."','".$gen."','".$dd."','".$year."','".$city."','".$pin."','".$house."','".$roll."','".$con."','".$gname."','".$gcon."','".$pass."','".$place_id."',0,'".$nbpic."')"; 
$conn->query($iqury);
header("location:../index.php");?>
<script>alert("Your registration will be verified by admin and you'll receive an email");</script>
   <?php }

?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Registration</title>
<!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css"
  rel="stylesheet"
/>
<style>


* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

body {

 
 color:white;
  
  align-items: center;
  justify-content: center;
  padding:30px;
  width:100%;
  height:auto;
  background-size:contain;
  background-color:mediumorchid;
}


	
	.container {
	
  position: relative;

  width: 100%;
  height:auto;
  /* background: #fff; */
  padding: 25px;
  border-radius: 8px;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.7);
  left:400px;
  right:auto;
  backdrop-filter: blur(5px);

		}
		.container form
		{padding:30px; }

.container form {
  margin-top: 30px;
 
}
::placeholder {
    color: white;
}
form{float:left;
right:500px;}
label{float:left;}
.title {
  font-size: 28px;
  color: ghostwhite;
  font-weight: 600;
  letter-spacing: -1px;
  position: relative;
  display: flex;
  align-items: center;
  padding-left:30px;
}

.title::before,.title::after {
  position: absolute;
  content: "";
  height: 16px;
  width: 16px;
  border-radius: 50%;

  left: 0px;
  background-color: whitesmoke;
}

input::file-selector-button {
  font-weight: bold;
  color: dodgerblue;
  padding: 0.5em;
  background-color: mediumorchid;
  border: thin solid grey;
  border-radius: 3px;
}

.title::before {
  width: 18px;
  height: 18px;
  background-color: wheat;
}

.title::after {
  width: 18px;
  height: 18px;
  
  animation: pulse 1s linear infinite;
}

@keyframes pulse {
  from {
    transform: scale(0.9);
    opacity: 1;
  }

  to {
    transform: scale(1.8);
    opacity: 0;
  }
}
input[type="text"],[type="email"],select,[type="password"],[type="date"] 
{background-color: mediumorchid;}


</style>
</head>

<body>
<script>
function validateName() {
    var nameOutput = document.getElementById("usernameError");
    var nameInput = document.getElementById("txtname").value.trim();
    var nameRegex =/^[a-zA-Z\s]+$/;
    if (!nameRegex.test(nameInput)) {
        nameOutput.textContent = "Please use letters";
    } else {
        nameOutput.textContent = ""; // Clear any previous error messages
    }

 
}

function validategName()
{ 
  var nameOutput1 = document.getElementById("guardianNameError");
  var nameInput1 = document.getElementById("txtgname").value.trim();
  var nameRegex1 = /^[a-zA-Z]+$/;
  if (!nameRegex1.test(nameInput1)) {
        nameOutput1.textContent = "Please use letters";
    } else {
        nameOutput1.textContent = ""; // Clear any previous error messages
    }
}

  function validateMail()
  {
  
    var email = document.getElementById('txtmail').value.trim();
    var nameOutput = document.getElementById("emailError");
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email.match(emailRegex)) {
      nameOutput.textContent = "Please enter a valid email";
    }
   else{
	
        nameOutput.textContent = ""; // Clear any previous error messages
   }
            
  }
  


  function validateNum()
  {
    var phoneNumber = document.getElementById('txtcon').value.trim();
   var  nameOutput=document.getElementById('phoneError');
    var phoneRegex =/^\d{10}$/;
    if (!phoneNumber.match(phoneRegex)) {
      nameOutput.textContent = "Please enter a valid phone Number";
    }
    else {
        nameOutput.textContent = ""; // Clear any previous error messages
    }
  }
	
  function validategNum()
  {
    var phoneNumber = document.getElementById('txtgcon').value.trim();
   var  nameOutput=document.getElementById('guardianContactError');
    var phoneRegex =/^\d{10}$/;
    if (!phoneNumber.match(phoneRegex)) {
      nameOutput.textContent = "Please enter a valid phone Number";
    }
    else {
        nameOutput.textContent = ""; // Clear any previous error messages
    }
  }


  function validatePassword() {
    var password = document.getElementById("txtpass").value;
    var nameOutput = document.getElementById("passError");

    if (password.length < 8 || !/[A-Z]/.test(password) || !/[a-z]/.test(password) || !/\d/.test(password) || !/[!@#$%^&*]/.test(password)) {
        nameOutput.innerHTML = '<small>Password must be least 8 characters long,- Contains both uppercase and lowercase letters,- Contains at least one number<br>- Contains at least one special character: !@#$%^&*</small>';
    } else {
        nameOutput.textContent = ""; // Clear any previous error messages
    }
}
	


function validateRollno() {
    var rollno = document.getElementById("txtroll").value.trim();
    var rollError = document.getElementById("RollError");

    var rollRegex = /^\d{2}$/;

    if (!rollRegex.test(rollno)) {
        rollError.textContent = "Invalid roll number!";
    } else {
        rollError.textContent = ""; // Clear error message
    }
}

function validateYear() {
    var rollno = document.getElementById("txtyear").value.trim();
    var rollError = document.getElementById("yearError");

    var rollRegex =  /^(?:19|20)\d{2}$/;

    if (!rollRegex.test(rollno)) {
        rollError.textContent = "Invalid year!";
    } else {
        rollError.textContent = ""; // Clear error message
    }
}


  const today = new Date().toISOString().split('T')[0]; 
  document.getElementById('txtdob').setAttribute('max', today); 
  const currentYear = new Date().getFullYear();


 
function validateAddress() {
  var houseName = document.getElementById("txtadd").value.trim();
  var addError = document.getElementById("addError");
  var houseNameRegex = /^[a-zA-Z0-9().]+$/;
  if (!houseNameRegex.test(houseName)) {
    addError.textContent = "Allows alphanumeric and space";
  } else {
    addError.textContent = "";
  }
}

function validateCity()
{
  var city = document.getElementById("txtstreet").value.trim();
  var streetError = document.getElementById("streetError");
  var cityRegex = /^[a-zA-Z]+$/;
  if (!cityRegex.test(city)) {
    streetError.textContent = "Invalid City. Please use only letters and spaces.";
  } else {
    streetError.textContent = "";
  }
}

function validatePin()
{
  var pincode = document.getElementById("txtpin").value.trim();
  var pinError = document.getElementById("pinError");

  var pincodeRegex = /^\d{6}$/;
  if (!pincodeRegex.test(pincode)) {
    pinError.textContent = "Invalid Pin Code. Please enter a 6-digit numeric value.";
  } else {
    pinError.textContent = "";
  }

}
function validateFileSize() {
    var fileInput = document.getElementById('image');
    
    // Check if a file is selected
    if (fileInput.files.length > 0) {
      var fileSize = fileInput.files[0].size; // in bytes
      var maxSize = 60720; 
      if (fileSize > maxSize) {
        alert('File size exceeds 60 MB. Please choose a smaller file.');
        // Reset the file input to clear the selected file
        fileInput.value = '';
      }
    }
  }


</script>

    <center>
  
           </header><a href="../index.php" style="color:white;font-weight:20px;">HOME</a>
            <header><center><p class="title">STUDENT REGISTRATION &nbsp;&nbsp;&nbsp;&nbsp;</p></center>
            
            <form id="myForm" name="myForm" method="post" action="" enctype="multipart/form-data">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtname">Name</label><br>
                    <p id="usernameError" style="color:white;"></p>
                    <input type="text" name="txtname" id="txtname" class="form-control" placeholder="Enter your full name" oninput="validateName()"  required/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtmail">Email</label><br>
                    <p id="emailError" style="color:white;"></p>
                    <input type="email" name="txtmail" placeholder="Enter your valid email" id="txtmail" class="form-control" oninput="validateMail()" required />
                </div>
  
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtdob">Date Of Birth</label>
                    <input type="date" name="txtdob" id="txtdob" class="form-control"  required/>
                </div>

            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtyear">Year of Studying</label><br>
                     <p id="yearError" style="color:white"></p>
                    <input type="text" name="txtyear" id="txtyear" placeholder="Enter the year of studying" oninput="validateYear()" class="form-control" required/>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Gender</label>
                    <br>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="gender1" value="male" checked>
                        <label class="form-check-label" for="gender1">Male</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="gender2" value="female">
                        <label class="form-check-label" for="gender2">Female</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="gender3" value="others">
                        <label class="form-check-label" for="gender3">Others</label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
    <div class="form-group">
        <label for="txtroll">Roll Number</label><br>
        <p id="RollError" style="color:white"></p>
        <input type="text" name="txtroll" id="txtroll" placeholder="Enter class roll number" oninput="validateRollno()" class="form-control" required />
    </div>
</div>

        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ddldep3">Select Department</label>
                    <select  style="background-color:mediumorchid"  name="ddldep" id="ddldep3" onChange="getCourse(this.value)" class="form-select">
                        <option selected>Select Department</option>
                        <?php
                        $a = "select * from tbl_department ";
                        $res = $conn->query($a);
                        while ($row = $res->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $row["dep_id"] ?>">
                                <?php echo $row["dep_name"] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ddlcourse">Select Course</label>
                    <select  style="background-color:mediumorchid"   name="ddlcourse" id="ddlcourse" class="form-select">
                        <option>--Select--</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="txtadd">Address</label>
            <p id="addError" style="color:white"></p>
            <input type="text" name="txtadd" id="txtadd" placeholder="Enter house name" oninput="validateAddress()"required class="form-control" /><br>
            <p id="streetError" style="color:white"></p>
            <input type="text" name="txtstreet" id="txtstreet" placeholder="Enter your city" oninput="validateCity()" required class="form-control" /><br>
            <p id="pinError" style="color:white"></p>
            <input type="text" name="txtpin" id="txtpin" placeholder="Enter postal code"  oninput="validatePin()" required class="form-control" />
        </div>
        <div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="ddldis">District</label>
            <select name="ddldis" style="background-color: mediumorchid" onChange="getPlace(this.value)" id="ddldis" class="form-select">
                <option>--Select Disrict--</option>
                <?php
                $d = "select * from tbl_district";
                $res = $conn->query($d);
                while ($row = $res->fetch_assoc()) {
                ?>
                    <option value="<?php echo $row["dis_id"] ?>"><?php echo $row["dis_name"] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="ddlplace">Place</label>
            <select style="background-color: mediumorchid" name="ddlplace" id="ddlplace" class="form-control">
                <option>--Select Place--</option>
            </select>
        </div>
    </div>
</div>
<br>

        <div class="form-group">
            <label for="image">Passport pic <small>(File size should less than 60KB)</small></label>
            <input type="file" name="image" id="image" oninput="validateFileSize()" class="form-control-file"  required/>
          
        </div>

        <div class="form-group">
            <label for="txtcon2">Contact</label>
            <p id="phoneError" style="color:white;"></p>
            <input type="tel" name="txtcon" id="txtcon"  style="background-color:mediumorchid" placeholder="Enter your contact" required pattern="[789][0-9]{9}" oninput="validateNum()" class="form-control" />
        </div>

        <div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="txtgname">Guardian Name</label><br>
            <p id="guardianNameError" style="color:white;"></p>
            <input type="text" name="txtgname" id="txtgname" oninput="validategName()" placeholder="Enter Guardian Name" class="form-control" required />
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="txtgcon2">Guardian Contact</label><br>
            <p id="guardianContactError" style="color:white;"></p>
            <input type="tel" name="txtgcon" id="txtgcon" oninput="validategNum()" placeholder="Enter Guardian Contact" style="background-color: mediumorchid" required class="form-control" />
        </div>
    </div>
</div>


        <div class="form-group">
            <label for="txtpass">Password<br></label><br>
            <p id="passError" style="Color:white;"></p>
            <input type="password" class="form-control" name="txtpass" id="txtpass" oninput="validatePassword()" placeholder="Enter Password" required>        
                </div><br>
                <div class="form-group">     
   <input type="submit" name="btnsub" id="btnsub" value="Register" class="btn btn-primary" />&nbsp;&nbsp;
            <input type="reset" name="btncan" id="btncan" value="Cancel" class="btn btn-secondary" />
                </div>
                </div>
                
</form>

      


<div style="padding-bottom:75px;">   
    </center>
</body> 
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"
></script>
  <script src="../ASSETS/JQ/jQuery.js"></script>
  <script>
  function getCourse(did)
  {
	  $.ajax({
		     url:"../ASSETS/Ajaxpages/Ajaxcourse.php?cid="+did,
			 success: function(html)
			 {
				 $("#ddlcourse").html(html);
					 
				 }
		  });
  }
  </script>
		  

    
    
  <script src="../ASSETS/JQ/jQuery.js"></script>
  <script>   
     function getPlace(did)
  {
	  $.ajax({
		     url:"../ASSETS/Ajaxpages/Ajaxplace.php?pid="+did,
			 success: function(html)
			 {
				 $("#ddlplace").html(html);
					 
				 }
		  });
		 
  }
 
 

  </script>
  
</html>