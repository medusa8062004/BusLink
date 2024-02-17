<?php
include("../ASSETS/connections/Connection.php"); 
session_start();
ob_start();
include('Head.php');

if(isset($_POST['btnsub']))
{
$current=$_POST['txtppass'];
$new=$_POST['txtnpass'];
$confirm=$_POST['txtcpass'];
$sel="select * from tbl_studentreg  where stureg_id=".$_SESSION['sid'];
$res=$conn->query($sel);
$row=$res->fetch_assoc();
$old=$row['stu_pass'];
if($old==$current)
{
	if($new==$confirm)
    {
	$u="update tbl_studentreg set stu_pass='".$confirm."' where stureg_id=".$_SESSION['sid'];
	$conn->query($u);
	header("location:../Student/studentprofile.php");
	}
}
else
{
    {
    ?>
    <script>
	alert("Passwords doesn't match")
	</script>
    <?php
     }

}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Password Change Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-4">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4>Password Change</h4>
          </div>
          <div class="card-body">
            <form id="passwordChangeForm">
              <div class="form-group">
                <label for="currentPassword">Current Password</label>
                <input type="password" class="form-control"  name="txtppass" required>
              </div>
              <div class="form-group">
                <label for="newPassword">New Password</label>
                <input type="password" class="form-control"  name="txtnpass" required>
              </div>
              <div class="form-group">
                <label for="confirmPassword">Confirm New Password</label>
                <input type="password" class="form-control"  name="txtcpass" required>
              </div>
              <button type="submit" name="btnsub" class="btn btn-primary">Change Password</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS and jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    // JavaScript for form validation
    document.getElementById('passwordChangeForm').addEventListener('submit', function(event) {
      event.preventDefault();
      
      var currentPassword = document.getElementById('currentPassword').value;
      var newPassword = document.getElementById('newPassword').value;
      var confirmPassword = document.getElementById('confirmPassword').value;

      // Perform basic validation
      if (currentPassword === '' || newPassword === '' || confirmPassword === '') {
        alert('Please fill in all fields.');
        return;
      }

      if (newPassword !== confirmPassword) {
        alert('New password and confirmation do not match.');
        return;
      }

      // Additional logic to change password (could be an API call, etc.)
      // Here you can add your logic to handle the password change process
      
      alert('Password changed successfully!');
      
      // Reset the form
      document.getElementById('passwordChangeForm').reset();
    });
  </script>
</body>
</html>
<?php
include('Foot.php');
ob_flush();
?>
