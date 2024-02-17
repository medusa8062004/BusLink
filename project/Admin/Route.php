
<?php
include("../ASSETS/connections/connection.php");
ob_start();
include('Head.php');
?>  <br><br>
<?php


if(isset($_POST['btnsub']))
{$sroute=$_POST['txtrname'];
  $droute=$_POST['txtdname'];
  $rate=$_POST['txtrate'];
  $sql_check_duplicate = "SELECT source_name,desti_name,route_rate FROM tbl_route WHERE source_name ='".$sroute."' and  desti_name ='".$droute."' and route_rate='".$rate."' ";
 $result = $conn->query($sql_check_duplicate);
if ($result->num_rows > 0)
   {
    echo "Error : Duplicate data already exists!";
  } else{
    $sql_check_duplicate = "SELECT source_name,desti_name FROM tbl_route WHERE source_name ='".$sroute."' and desti_name ='".$droute."' ";
    $result = $conn->query($sql_check_duplicate);
    if ($result->num_rows > 0){echo "Same route already exists";}
    else{

$s="insert into tbl_route(source_name,desti_name,route_rate)values('".$sroute."','".$droute."','".$rate."')";
$conn->query($s);}}
}
if(isset($_GET['id']))
{
	$k="delete from tbl_route where route_id=".$_GET['id']; 
	$conn->query($k);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Routes</title>
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
    width:;
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
width:200px;
height:40px;}

  </style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <div class="regForm"><br>
      Source Route<sup style="color:red;">*</sup>&nbsp; 
      <label for="txtrname"></label>
      <input type="text" name="txtrname" id="txtrname"placeholder="Enter the source route name" pattern="[A-Za-z]+-?[A-Za-z]*" title="eg:Piravom-Kakkanad" required />&nbsp;&nbsp;&nbsp; &nbsp;  
      Destination<sup style="color:red;">*</sup>&nbsp; 
      <input type="text" name="txtdname" id="txtrname"placeholder="Enter the destination route name" pattern="[A-Za-z]+-?[A-Za-z]*" title="eg:Piravom-Kakkanad" required />&nbsp; &nbsp; &nbsp; &nbsp; 
 Minimum charge For first 5 stops in the route<sup style="color:red;">*</sup>&nbsp; <input type="text" name="txtrate" placeholder="Enter rate for route" pattern="^\d{1,4}$" title="please enter a valid rate" required>
      <br><br>
      <div align="left"><input type="submit" name="btnsub" id="btnsub" value="Submit" class="btn btn-outline-light" />
      
      <input type="reset" name="btncan" id="btncan" value="Cancel"  class="btn btn-outline-light"/>
     </div></div>
  <p>&nbsp;</p>
 
  <table width="200" border="1" class="table table-dark table-hover">
    <tr>
      <td>Route Name</td>
      <td>Route Rate</td>
      <td>Action</td>
    </tr>
    <?php   

	 $s="select * from tbl_route"; 
  $r=$conn->query($s);
  while($row=$r->fetch_assoc())
  { ?>
    <tr>
      <td><?php echo  $row['source_name'],"-",$row['desti_name'] ?></td>
      <td><?php  echo $row['route_rate'];?></td>
     <td><a href="route.php?id=<?php echo $row['route_id']?>"  class="btn btn-outline-light">Delete</td>
    </tr>
   <?php } ?>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<?php
include('Foot.php');
ob_flush();
?>
</body>
</html> 

   
