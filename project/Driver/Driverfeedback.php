<?php
include("../ASSETS/connections/Connection.php"); 
session_start();
if(isset($_POST['btnsub']))
{
	$fb=$_POST['txtfeed']; 
	$id=$_SESSION['did'];
	$ins="insert into tbl_feedback(feed_content,driver_id)values('".$fb."','".$id."')";
	$conn->query($ins);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Driver Feedback</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Feedback</td>
      <td><label for="txtfeed"></label>
     <textarea name="txtfeed" id="txtfeed"  cols="20" rows="5" required></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btnsub" id="btnsub" value="Submit" />
      </div></td>
    </tr>
  </table>
</form>
</body>
</html>