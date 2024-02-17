<?php include("../ASSETS/connections/connection.php");
ob_start();
include('Head.php');?><br><br><?php
if(isset($_POST["btnsub"]))
{
  $dd=$_POST["ddlrname"];
  $stp=$_POST['txtstp'];
  $sno=$_POST['stpno'];
if($dd==0)
{
echo "Please select a  Route";
}
else
{
    $sql_check_duplicate = "SELECT route_id,stp_no  FROM tbl_stop WHERE route_id='".$dd."' and  stp_no='".$sno."' ";
  $result =$conn->query($sql_check_duplicate);
if ($result->num_rows > 0)
   {
    echo "Error : Stop Number of Same Route already exists!";
  } else
  {
    $i="insert into tbl_stop(stop_name,route_id,stp_no)values('".$stp."','".$dd."','".$sno."')"; 
    $conn->query($i);
  }
}
}



if(isset($_GET['did']))
{$dquery="delete from tbl_stop where stop_id=".$_GET['did'];

if($conn->query($dquery))
{
  header('location:Stop.php');
}

 }
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Stops</title>
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
    width:95%;
    height:200px;
    border-radius:10px;
    padding-left:10px;
    font:16px Serif ;
    color:white;
}
input[type="text"],select,input[type="number"]
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
<form id="form1" name="form1" method="post" action=""><div class="regForm"><br>
Route&nbsp;<sup style="color:red;">*</sup>
         <label for="ddlrname"></label>
           <select name="ddlrname" id="ddlrname">
            <option value=0>---Select Route---</option>
        <?php
	$a="select * from tbl_route"; 
	$ares=$conn->query($a);
	while($row=$ares->fetch_assoc())
	{
	?>
        <option value="<?php echo $row['route_id']?>"> <?php echo $row['source_name'],"-",$row['desti_name']?></option>
        <?php } ?>
         </select>&nbsp;&nbsp;&nbsp;Stop<sup style="color:red;">*</sup>&nbsp;<input type="text" name="txtstp" pattern="[a-zA-Z ]+"title="Enter letters only" placeholder="Enter stop name" required>&nbsp;&nbsp;
         Stop Number<sup style="color:red;">*</sup>&nbsp;<input type="number" name="stpno" title="Enterstop number" placeholder="Enter stop Number" required><br><br>
   <center><input type="submit" name="btnsub" id="btnsub" value="Submit" class="btn btn-outline-light" />&nbsp;&nbsp;<input type="reset" name="btncan" id="btncan" value="Cancel"  class="btn btn-outline-light"/></center></div>
  <p>&nbsp;</p>
  <table width="200" border="1" class="table table-hover table-dark">
    <tr>
      <td>Route Name</td>
      <td>Stop Name</td>
      <td>Stop Number</td>
      <td>Action</td>
    </tr>
    <?php  
    $a="select * from tbl_stop p inner join tbl_route d on d.route_id=p.route_id";
	$ares=$conn->query($a);
	while($row=$ares->fetch_assoc())
	{
	?>
    <tr>
      <td><?php  echo $row['source_name'],"-",$row['desti_name']?></td>
      <td><?php  echo $row['stop_name'];?></td>
      <td><?php  echo $row['stp_no']; ?>
        <td><a href="Stop.php?did=<?php echo $row['stop_id']?>"  class="btn btn-outline-light">Delete</td>

    </tr>
     <?php } ?>
  </table>
  <p>&nbsp;</p>
</form>
<?php
include('Foot.php');
ob_flush();
?>
</body>
</html>
