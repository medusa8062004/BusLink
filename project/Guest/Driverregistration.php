<?php 
include("../ASSETS/connections/Connection.php");

if(isset($_POST['btnsub']))
{
	$dname=$_POST['txtdname'];
	$mail=$_POST['txtdmail'];
	$phone=$_POST['txtdnum'];
	$lno=$_POST['txtdlno'];
	$dexp= $_POST['txtdexp'];
	$place_id= $_POST["ddlplace"];
	$dpass=$_POST['txtdpass'];
 $d=$_POST['ddldis'];
 $nbpic=$_FILES["image"]["name"];
 $temppic=$_FILES["image"]["tmp_name"];
 move_uploaded_file($temppic,'../ASSETS/File/User/'.$nbpic);
 $sel = "select * from tbl_driver where driver_mail='" . $mail . "'";
 $r = $conn->query($sel);
 if ($row = $r->fetch_assoc()) {
   ?>
   <script>
     alert("Account already exists for this email");
     window.location = "Driverregistration.php";
   </script> <?php }
  if(($d==0)||($place_id==0))
  echo "Select a district and place";
else{
	$in="insert into tbl_driver(driver_name,driver_mail,driver_phone,driver_license,driver_exp,driver_pass,place_id,d_status,driver_pic)values('".$dname."','".$mail."','".$phone."','".$lno."','".$dexp."','".$dpass."','".$place_id."',0,'".$nbpic."')";
	$conn->query($in);
}
	
}
?>
<script>
function validateName() {
    var nameOutput = document.getElementById("usernameError");
    var nameInput = document.getElementById("txtdname").value.trim();
    var nameRegex = /^[a-zA-Z]+$/;
    if (!nameInput.match(nameRegex)) {
        nameOutput.textContent = "Please use letters";
    }
        else {
        nameOutput.textContent =""; // Clear any previous error messages
    }
}
   
  function validateMail()
  {
  
    var email = document.getElementById('txtdmail').value.trim();
    var nameOutput = document.getElementById("emailError");
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email.match(emailRegex)) {
      nameOutput.textContent = "Please enter a valid email";
    } else {
        nameOutput.textContent = ""; // Clear any previous error messages
    }
  }
  function validateNum()
  {
    var phoneNumber = document.getElementById('txtdnum').value.trim();
   var  nameOutput=document.getElementById('phoneError');
    var phoneRegex = /^\d+$/;
    if (!phoneNumber.match(phoneRegex)) {
      nameOutput.textContent = "Please enter a valid phone Number";
    }
    else {
        nameOutput.textContent = ""; // Clear any previous error messages
    }
  }
  function validateExp() {
    var phoneNumber = document.getElementById('txtdexp').value.trim();
    var nameOutput=document.getElementById('expError');
    var phoneRegex = /\d{1,2}/;
    if (!phoneNumber.match(phoneRegex)) {
      nameOutput.textContent = "Please enter number of year";
    } 
    else {
        nameOutput.textContent = ""; // Clear any previous error messages
    }
}
function validateDl() {
    var phoneNumber = document.getElementById('txtdlno').value.trim();
    var nameOutput=document.getElementById('dlError');
    var phoneRegex =/^KL\d{2}\s\d{11}$/;
    if (!phoneNumber.match(phoneRegex)) {
      nameOutput.textContent = "Please enter a valid Driving License Number";
    } 
    else {
        nameOutput.textContent = ""; // Clear any previous error messages
    }
}
function validatePassword() {
    var password = document.getElementById("txtdpass").value;
    var nameOutput = document.getElementById("passError");

    if (password.length < 8 || !/[A-Z]/.test(password) || !/[a-z]/.test(password) || !/\d/.test(password) || !/[!@#$%^&*]/.test(password)) {
        nameOutput.innerHTML = '<small>Password must meet the following criteria:<br>- At least 8 characters long<br>- Contains both uppercase and lowercase letters<br>- Contains at least one number<br>- Contains at least one special character: !@#$%^&*</small>';
    } else {
        nameOutput.textContent = ""; // Clear any previous error messages
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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Driver Registration</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
 body {
      background-color: mediumorchid;
      padding: 30px;
    }

    .container {
      width: 50%;
      margin: 0 auto;
      background-color:mediumorchid;
      padding: 25px;
      border-radius: 8px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.7);
      backdrop-filter: blur(5px);
    }

    label {
      color:white;
    }
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
container.error-message {
            color: red;
           font-size: 100%;
        }
</style>
</head>
<body>
  
</header><a href="../index.php" style="color:white;font-weight:20px;">HOME</a>
            <header>
<p class="title">DRIVER REGISTRATION &nbsp;&nbsp;&nbsp;&nbsp;</p>

  <div class="container">


    <form action="" method="post" enctype="multipart/form-data"  name="form1" id="form1">
    <div class="form-group">
    <label for="txtdname">Name</label><br>
    <p id="usernameError" style="color:white;"></p>
    <input type="text" class="form-control" name="txtdname" id="txtdname" oninput="validateName();" placeholder="Enter Your Name" pattern="[a-zA-Z\s]+" title="Please enter alphabets only" required>
</div>

      <div class="form-group">
        <label for="txtdmail">E-mail</label>
        <p id="emailError" style="color:white;"></p>
        <input type="text" class="form-control" oninput="validateMail()" name="txtdmail"  placeholder="Enter Your EMail"id="txtdmail" pattern="^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" title="Enter valid Email" required>
      </div>

      <div class="form-group">
        <label for="txtdnum">Mobile Number</label>
        <p id="phoneError" style="color:white;"></p>
        <input type="text" class="form-control" oninput="validateNum()" name="txtdnum"  id="txtdnum" pattern="^[789]\d{9}$" title="Please enter a valid mobile number" placeholder="Enter Your mobile Number" required>
      </div>

      <div class="form-group">
        <label for="ddldis">District</label>
        <select class="form-control" name="ddldis"   style="background-color:mediumorchid"  onchange="getPlace(this.value)" id="ddldis">
          <option value="0">--Select District--</option>
          <?php
          $d = "select * from tbl_district";
          $res = $conn->query($d);
          while ($row = $res->fetch_assoc()) {
          ?>
            <option value="<?php echo $row["dis_id"] ?>"><?php echo $row["dis_name"] ?></option>
          <?php } ?>
        </select>
      </div>

      <div class="form-group">
        <label for="ddlplace">Place</label>
        <select class="form-control"  style="background-color:mediumorchid"  name="ddlplace" id="ddlplace">
          <option value="0">--Select Place--</option>
        </select>
      </div>

      <div class="form-group">
        <label for="txtdlno">License Number</label>
        <p id="dlError" style="color:white;"></p>
        <input type="text" oninput="validateDl()" class="form-control" name="txtdlno" title="eg: KL-44-2023XXXXXXX" id="txtdlno" placeholder="Enter Your DL No. in Driving License eg.KL44 XXXXXXXXXXX" required>
      </div>

      <div class="form-group">
        <label for="txtdexp">Experience</label>
        <p id="expError" style="color:white;"></p>
        <input type="text" oninput="validateExp() " class="form-control" name="txtdexp" id="txtdexp" pattern="^[0-9]+$" title="Enter a number" placeholder="Enter the Year of Experience in Driving" required>
      </div>
      <div class="form-group">
            <label for="image">Passport pic <small>(File size should less than 60KB)</small></label>
            <input type="file" name="image" id="image" onsubmit="validateFileSize()" class="form-control-file" required />
        </div>
      <div class="form-group">
        <label for="txtdpass">Password<br>
        <p id="passError" style="color:white;"></p>
        </label>
        <input type="password" class="form-control" name="txtdpass" id="txtdpass" oninput="validatePassword()" placeholder="Enter Password" required>
      </div>
<center>
      <button type="submit" class="btn btn-primary" name="btnsub" id="btnsub">Submit</button>
      <button type="reset" class="btn btn-secondary" name="btncan" id="btncan">Cancel</button>
          </center>
    </form>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
          </div>
</body>

 <script src="../ASSETS/JQ/jQuery.js"></script>
  <script>
  function getCourse(did)
  {
	  $.ajax({
		     url:"../ASSETS/Ajaxpages/Ajaxcourse.php?pid="+did,
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