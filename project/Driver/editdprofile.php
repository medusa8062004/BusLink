
<?php 
include("../ASSETS/connections/Connection.php");
session_start();
if(isset($_POST['editbtn']))
{
$a=$_POST['txtname'];
$b=$_POST['txtmail'];
$c=$_POST['txtnum'];
$uqry="update tbl_driver set driver_name='".$a."',driver_mail='".$b."',driver_phone='".$c."' where driver_id=".$_SESSION['did'];
$conn->query($uqry);
header("location:../Driver/driverprofile.php");
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
<div class=box>
<body>
<form method="post" action="" >
<?php  

$pid=$_SESSION['did'];

 $squry="select * from tbl_driver u inner join tbl_place c on u.place_id = c.place_id inner join tbl_district d on c.dis_id=d.dis_id where driver_id='".$pid."' ";
$res=$conn->query($squry);
while($row=$res->fetch_assoc())
{
?>
<td>Name</td><br>
<td><input type="text"name="txtname"  value="<?php echo $row['driver_name']?>" ></td></tr><br><br>
<hr>
<td>Address </td><br>
<td><input type="text" name="txtadd"  value="<?php echo $row['driver_mail']?>" ></td></tr><br><br><hr>
<td>Email</td><br>
<td><input type="text" name="txtmail"  value="<?php echo $row['driver_phone']?>"  ></td></tr>
<br><br>
<?php  } ?>
<input type="submit" name="editbtn" value="update">

</form>

</body>
</div>
</html>