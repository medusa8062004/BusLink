
<?php   include("../ASSETS/connections/connection.php"); 
ob_start();
include('Head.php');?><br><br><?php
if(isset($_POST["btnsub"]))
{

$dd=$_POST["ddldep"];
$c=$_POST["txtname"];
if($dd==0)
{
echo "Please select a Department";
}
else
{
$sql_check_duplicate = "SELECT * FROM tbl_course WHERE course_name ='".$c."' ";
 $result = $conn->query($sql_check_duplicate);
if ($result->num_rows > 0)
   {
    echo "Error : Duplicate data already exists!";
  } else
  {
$i="insert into tbl_course(course_name,dep_id) values ('".$c."','".$dd."')";
$conn->query($i);
  }
}

}


if(isset($_GET['id']))
{
$d="delete from tbl_course where course_id=".$_GET['id'];
$conn->query($d);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Course</title>
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
    width:400px;
    height:190px;
    border-radius:10px;
    padding-left:5px;
    font:16px Serif ;
    color:white;
}
input[type="text"],select
{border:1px solid;
  border-color:white;
background-color:transparent;
color:white;
border-radius:7px;
width:250px;
height:40px;}
select option{
background-color:#1e293b;
color:white;}


  </style>
  
  

</head>
<body>
<form id="form1" name="form1" method="post" action="">
  <div class="regForm"><br>
 Department<sup style="color:red;">*</sup> &nbsp; &nbsp;  <select name="ddldep" id="ddldep" value="">
 <center> <option value=0 selected>---Select Department---</option></center>
  <?php
  $s="select * from tbl_department "; 
  $r=$conn->query($s);
  while($row=$r->fetch_assoc())
  {
  ?>
   <option value="<?php  echo $row['dep_id']?>"> <?php  echo $row['dep_name']?> </option>
  <?php } ?>
 </select><br><br>
  Course Name<sup style="color:red;">*</sup>
      <label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" required="required" pattern="[a-zA-Z .]+" title="Please enter on alphabets only."/>
    <br><br><center>
     <input type="submit" name="btnsub" id="btnsub" value="Submit" class="btn btn-outline-light"/>
      <input type="reset" name="btncan" id="btncan" value="Cancel" class="btn btn-outline-light" /></center>
  </div><br><br>
  
  
  <table width="200" border="1" class="table table-hover table-dark">
    <tr>
      <td>Course ID</td>
      <td> Department Name</td>
      <td>Course Name</td>
      <td><p>Action</p></td>
    </tr>
  
    <?php
	  $i=0;
	$s="select * from tbl_course s inner join tbl_department c on s.dep_id=c.dep_id";
	$res=$conn->query($s);
	while($row=$res->fetch_assoc())
	{$i++;  
	?>
    <tr>
      <td> <?php echo $i;?></td>
      <td><?php  echo $row['dep_name'];?></td>
      <td><?php  echo $row['course_name'];?></td>
      <td><a href="course.php?id=<?php echo $row['course_id'];?>" class="btn btn-outline-light">Delete</a></td>
    </tr>
    <?php  }?>
  </table>

</form>
<?php
include('Foot.php');
ob_flush();
?>
</body>
</html>