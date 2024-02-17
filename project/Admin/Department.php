

<?php 
include("../ASSETS/connections/Connection.php");
ob_start();
include('Head.php');?><br><br><?php 
if(isset($_POST["btnsub"]))
{
$dname=$_POST["txtname"];
$sql_check_duplicate = "SELECT * FROM tbl_department WHERE dep_name ='".$dname."' ";
$result = $conn->query($sql_check_duplicate);
if ($result->num_rows > 0)
 {
  echo "Error : Duplicate data already exists!";
} 
else{
$in="insert into tbl_department(dep_name)values('".$dname."')";
$conn->query($in);}
}


if(isset($_GET['did']))
{
	$d="delete from tbl_department where dep_id=".$_GET['did'];
	$conn->query($d); 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
   a{color:white;}
  a:hover
  {color:cyan;}
  th{ font:20px Seif;
  font-weight:10px;}
  td{font:16px Sans-serif;}
  .regForm {
    background-color:#1e293b;
    border:solid 2px;
    width:350px;
    height:130px;
    border-radius:10px;
    padding-left:5px;
    font:16px Serif ;
    color:white;
}
input[type="text"]
{border:1px solid;
  border-color:white;
background-color:transparent;
color:white;
border-radius:7px;
width:250px;
height:40px;}
  </style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Departments</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <div class="regForm"><br>
  Department<sup style="color:red;">*</sup>
   <label for="txtname"></label>
      <input type="text" name="txtname" id="txtname"  required="required" pattern="[a-zA-Z]+(\s[a-zA-Z]+)*" placeholder="Enter the department name" title="Please enter on alphabets only."/><br><br>
    <div align="center"><input type="submit" name="btnsub" id="txtbtn" value="Submit" class="btn btn-outline-light" />&nbsp;&nbsp;&nbsp;
      <input type="reset" name="btncan" id="btncan" value="Cancel"  class="btn btn-outline-light"/></div>
</div><br>
    
  <table width="200" border="1" class="table table-hover table-dark">
    <tr>
      <td>Department ID</td>
      <td>Department Name</td>
     <td>Action</td>
    </tr>
    <?php 
	$i=0;
	$squry="select * from tbl_department";
	$res=$conn->query($squry);
	while($row=$res->fetch_assoc())
	{
		$i++;
		?>
    <tr>
      <td><?php echo $i;?></td>
      <td><?php  echo $row['dep_name'];?></td>
      <td><a href="department.php?did=<?php echo $row['dep_id'];?>" value="btn btn-outline-light"class="btn btn-outline-light">Delete</a></td>
    </tr>
    <?php } ?>
  </table>
</form>
<?php
include('Foot.php');
ob_flush();
?>

</body>
</html>