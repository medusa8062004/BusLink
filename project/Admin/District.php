
<?php
include("../ASSETS/connections/Connection.php"); 
ob_start();
include('Head.php');
?>  <br><br>
<?php
 if(isset($_POST["btnsub"]))
 {$dname=$_POST["txtdis"];
//new
  $sql_check_duplicate = "SELECT * FROM tbl_district WHERE dis_name ='".$dname."' ";
$result = $conn->query($sql_check_duplicate);
if ($result->num_rows > 0)
 {
  echo "Error : Duplicate data already exists!";
} else {//new
 $inquery="insert into tbl_district(dis_name)values('".$dname."')";
 $conn->query($inquery);
 }
}
?>
<?php
if(isset($_GET['did']))
{
$dq="delete from tbl_district where dis_id=".$_GET['did'];
$conn->query($dq);
}



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Districts</title>
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
    width:300px;
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

 District <sup style="color:red;">*</sup>  <input type="text" name="txtdis" id="txtdis" required="required" pattern="[a-zA-Z]+"  title="Enter letters only" placeholder="Enter District Name"/><br><br><div align="center">
            <input type="submit" name="btnsub" id="btnsub" value="Submit" class="btn btn-outline-light"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="reset" name="btncancel" id="btncancel" value="Cancel" class="btn btn-outline-light" />
          </div></div>
</form>
<br><br>
<table width="200" border="1" class="table table-dark table-hover">
  <tr>
    <th>District No</th>
    <th>District</th>
    <th>Action</th>
  </tr>
  <?php $squry="select * from tbl_district";
  $res=$conn->query($squry);
  $i=0;
  while($row=$res->fetch_assoc())
  {
  $i++;
  ?>
  <tr>
    <td><?php echo $i ;?></td>
    <td><?php  echo $row['dis_name']?></td>
    <td><a href="District.php?did=<?php echo  $row['dis_id']?>"class="btn btn-outline-light">Delete</a></td>
  </tr>
  <?php 
   }?>
</table>
<?php
include('Foot.php');
ob_flush();
?>
</body>
</html>