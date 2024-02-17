<?php
include("../ASSETS/connections/Connection.php"); 
session_start();
if(isset($_POST['btnsub']))
{
$current=$_POST['txtppass'];
$new=$_POST['txtnpass'];
$confirm=$_POST['txtcpass'];
$sel="select * from tbl_driver  where driver_id=".$_SESSION['did'];
$res=$conn->query($sel);
$row=$res->fetch_assoc();
if($row['driver_pass']==$current)
{
	if($new==$confirm)
     {
	$u="update tbl_driver set driver_pass='".$confirm."' where driver_id=".$_SESSION['did'];
	$conn->query($u);
	header("location:../Driver/driverprofile.php");	
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
body
{display:flex;
justify-content:center;
align-items:center;
min-height:100vh;
background:white;
}
.box
{ 
position:relative;
width:370px;
height:370px;
background-color:hotpink;
padding:10px;
border-radius:9px
border-color:black;
 ;

}
</style>

</head>
<div class="box">
<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Current Password</td>
      <td> <input type="password" name="txtppass"  placeholder="enter your existing password" /></td>
      
    

    </tr>
    <tr>
      <td>New Password</td>
      <td><label for="txtnpass"></label>
      <input type="text" name="txtnpass"  /></td>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td><label for="txtcpass"></label>
      <input type="text" name="txtcpass" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btnsub" value="submit"></td>
    </tr>
  </table>

</form>
</body>
</div>
</html>