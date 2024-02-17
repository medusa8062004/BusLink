
<?php 
include("../ASSETS/connections/Connection.php");
session_start();
if(isset($_POST['editbtn']))
{
$a=$_POST['txtname'];
$b=$_POST['txtadd'];
$c=$_POST['txtmail'];
$uqry="update tbl_studentreg set stu_name='".$a."',stu_add='".$b."',stu_mail='".$c."' where stureg_id=".$_SESSION['sid'];
$conn->query($uqry);
header("location:../Student/studentprofile.php");
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
  height: 600px;
  display: flex;
  flex-direction: column;
  align-items: center;
  border-radius: 20px;
  background: var(--bg-color);
}
body{ 
background-image:url("8924570_2738.jpg");
	image-resolution: from-image 300dpi;
	background-size: cover;
}
.card__img svg {
  height: 100%;
  border-radius: 20px 20px 0 0;

}
.card__img {
  height: 192px;
  width: 100%;
}
.circle {
    background: lightblue;
    border-radius: 50%;
    width: 100px;
    height: 100px;
	 position: absolute;
  top:150px;
  right:130px;
  border: 10px solid white;
}form
{

   position: absolute;
   width:350px;
  top:130px;
  right:-130px;
  text-align:left;

}
 input
{ 
border-color:transparent;
text-decoration:underline;
color:white;
width:100%;
height:30px;
caret-color:magenta;
background:transparent;
border-radius:8px;
}
hr
{width:100%;}


</style>

</head>

<center>
<div class="card">
<body>
     <div class="card__img"><svg xmlns="http://www.w3.org/2000/svg" width="100%"><rect fill="red" width="540" height="450"></rect></svg> <div class="circle">
<form method="post" action="" >
<?php  

$pid=$_SESSION['sid'];

 $squry="select * from tbl_studentreg u inner join tbl_place c on u.place_id = c.place_id inner join tbl_district d on c.dis_id=d.dis_id where stureg_id='".$pid."' ";
$res=$conn->query($squry);
while($row=$res->fetch_assoc())
{
?>
<td>Name  </td><br>
<input type="text"name="txtname"  value="<?php echo $row['stu_name']?>" >
<br>
<hr>
<td>Address </td><br>
<input type="text" name="txtadd"  value="<?php echo $row['stu_add']?>" >
<br>
<hr>
<td>Email</td><br>
<input type="text" name="txtmail"  value="<?php echo $row['stu_mail']?>"  >
<br><br>
<?php  } ?>
<input type="submit" name="editbtn" value="update">

</form>
</div>
</div>
</body>
</div>
</center>
</html>