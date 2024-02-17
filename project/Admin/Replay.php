
<?php
include("../ASSETS/connections/connection.php");
 if(isset($_POST['btnsub']))
{
if(isset($_GET['did']))
{

$replay=$_POST['txtreplay'];
$ins="update tbl_complaints set cmp_status=1,cmp_replay='".$replay."'where cmp_id=".$_GET['did'];
$conn->query($ins);
}}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Replay</td>
      <td><label for="txtreplay2"></label>
      <input type="textarea" name="txtreplay" id="txtreplay2" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btnsub" id="btnsub" value="Give Replay" />
      </div></td>
    </tr>
  </table>
</form>
</body>
</html>