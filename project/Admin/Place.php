<?php 
include("../ASSETS/connections/connection.php");
ob_start();
include('Head.php');?><br><br>
<?php 
if(isset($_GET['did']))
{$dquery="delete from tbl_place where place_id=".$_GET['did'];

$conn->query($dquery);

 }
if(isset($_POST["btnsub"]))
{
	$pname=$_POST["txtname"];

	$dd=$_POST["ddldis"];
  if(($pname==0)||($dd==0))
  { echo "Fill required fields";}
  else{
    $sql_check_duplicate = "SELECT place_name,dis_id FROM tbl_place WHERE place_name='".$pname."'  and dis_id ='".$dd."'";
$result = $conn->query($sql_check_duplicate);
if ($result->num_rows > 0)
 {
  echo "Error : Duplicate data already exists!";
} else {
	 $inquery="insert into tbl_place(place_name,dis_id)values('".$pname."','".$dd."')";
	$conn->query($inquery);}
}
	
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Place</title>
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
    width:100%;
    height:150px;
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
width:200px;
height:40px;}
select option{
background-color:#1e293b;
color:white;}
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<div class="regForm">
  <br><br>
  District Name<sup style="color:red;">*</sup> &nbsp;
     <select name="ddldis" value="">
        <option value=0>---Select District---</option>
        <?php
	$a="select * from tbl_District"; 
	$ares=$conn->query($a);
	while($row=$ares->fetch_assoc())
	{
	?>
        <option value="<?php echo $row['dis_id']?>"> <?php echo $row['dis_name']?></option>
        <?php } ?>
      </select>&nbsp;&nbsp;&nbsp;
     Place Name<sup style="color:red;">*</sup> &nbsp;
      <label for="txtname"></label>
        <input type="text" name="txtname" id="txtname" required="required" pattern="[a-zA-Z]+"  title="Enter letters only" placeholder="Enter place name" />&nbsp;&nbsp;&nbsp;
    
    
        
    <input type="submit" name="btnsub" id="btnsub" value="Submit"class="btn btn-outline-light" />
    <input type="reset" name="btncancel" id="btncancel" value="Cancel" class="btn btn-outline-light"/>
  </div></div>
  <table  border="1" class="table table-dark table-hover">
    <tr>
      <td width="66">Place id</td>
      
      <td width="67">District Name</td>
      <td width="107">Action</td>
    </tr>
    <?php 
    $a="select * from tbl_Place p inner join tbl_district d on d.dis_id=p.dis_id";
	$res=$conn->query($a);
	$i=0;
	while($row=$res->fetch_assoc())
	{$i++;
		?>
   
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row['place_name'];?></td>
     
      <td><?php echo $row['dis_name'];?></td>
      <td><a href="Place.php?did=<?php echo $row['place_id']?>"  class="btn btn-outline-light">Delete</td>
    </tr><?php } ?>
  </table>
</form>
<?php
include('Foot.php');
ob_flush();
?>
</body>
</html>