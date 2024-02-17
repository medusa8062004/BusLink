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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
 .card {
  --main-color:black;
  --submain-color:blue;
  --bg-color:purple;
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  position: relative;
  width:370px;
  height:370px;
  display: flex;
  flex-direction: column;
  align-items: center;
  border-radius: 20px;
  background: var(--bg-color);
  top:150px;
}
body{ 
background-image:url("8924570_2738.jpg");
	image-resolution: from-image 300dpi;
	background-size: cover;
}

</style>

</head><center>
<div class="card">
<body>
<form id="form1" name="form1" method="post" action="">

        <td>Current Password</td> <input type="password" name="txtppass"  placeholder="enter your existing password" />
  <br><br>
        <td>New Password</td>   <input type="text" name="txtnpass"  /></td>
      
      </tr><br><br>
      <tr>
        <td>Confirm Password</td> <input type="text" name="txtcpass" /></td>
    <tr><br><br>
      <td colspan="2"><input type="submit" name="btnsub" value="submit"></td>


</form>
</body>
</div>
</center>
<?php
include('Foot.php');
ob_flush();
?>
</html>