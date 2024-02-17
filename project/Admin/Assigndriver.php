<?php
include("../ASSETS/connections/connection.php");
ob_start();
include('Head.php');
?>  <br><br><?php 

 if(isset($_POST["btnsub"]))
 { $bname=$_POST["ddlbus"];
 $dname=$_POST["ddldriver"];
 $rname=$_POST["ddlroute"];
 if(($bname==0)||($dname==0)||($rname==0))
 {echo "select the required fields";}
 else{
  $sql_check_duplicate = "SELECT bus_id,driver_id,route_id  FROM tbl_assign WHERE bus_id='".$bname."' and route_id='".$rname."' and driver_id='".$dname."'";
  $result =$conn->query($sql_check_duplicate);
if ($result->num_rows > 0)
   {
    echo "Error : Duplicate data already exists!";
  } else{
 $sel="insert into tbl_assign(bus_id,driver_id,route_id)values('".$bname."','".$dname."','".$rname."')";
 $conn->query($sel);
 }
 }
}

 if(isset($_GET['did']))
{$dquery="delete from tbl_assign where assign_id=".$_GET['did'];
$conn->query($dquery);

 }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Assign Driver</title>
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
    width:4000px;
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
width:250px;
height:40px;}
select option{
background-color:#1e293b;
color:white;}
  </style>
</head>

<body>
<form id="form1" name="form1" method="post" action=""><div class="regForm"><br><br>
Bus Registration Number<sup style="color:red;">*</sup>&nbsp;&nbsp;
      <label for="ddlbus"></label>
        <select name="ddlbus" id="ddlbus">
         <option value=0>---Select Bus Number---</option>
        <?php
	$a="select * from tbl_bus"; 
	$ares=$conn->query($a);
	while($row=$ares->fetch_assoc())
	{
	?>
        <option value="<?php echo $row['bus_id']?>"> <?php echo $row['bus_regno']?></option>
        <?php } ?>
      </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  Driver Name<sup style="color:red;">*</sup>
      <label for="ddldriver"></label>
        <select name="ddldriver" id="ddldriver" ForeColor="#FF3300"  >
         <option value=0>---Select Driver Name---</option>
        <?php
	$a="select * from tbl_driver where d_status=1"; 
	$ares=$conn->query($a);
	while($row=$ares->fetch_assoc())
	{
	?>
        <option value="<?php echo $row['driver_id']?>"> <?php echo $row['driver_name']?></option>
        <?php } ?>
      </select>&nbsp;&nbsp;&nbsp;&nbsp;
      Route Name<sup style="color:red;">*</sup>
      <td><label for="ddlroute"></label>
        <select name="ddlroute" id="ddlroute">
         <option value=0>---Select Route Name---</option>
        <?php
	$a="select * from tbl_route"; 
	$ares=$conn->query($a);
	while($row=$ares->fetch_assoc())
	{
	?>
        <option value="<?php echo $row['route_id']?>"> <?php echo $row['source_name'],"-",$row['desti_name']?></option>
        <?php } ?>
      </select><br><br>
  <input type="submit" name="btnsub" id="btnsub" value="Submit"  class="btn btn-outline-light"  />
      <input type="reset" name="btncan" id="btncan" value="Cancel"  class="btn btn-outline-light" />
  </div>
  <p>&nbsp;</p>
  <table width="200" border="1" class="table table-dark table-hover">
    <tr>
      <td>Bus Registration Number</td>
      
      <td> Driver name</td>
      <td> Route Name</td>
      <td>Action</td>
    </tr>
      <?php 
    $a="select * from tbl_assign a inner join tbl_bus b on a.bus_id=b.bus_id inner join tbl_driver d on d.driver_id=a.driver_id inner join tbl_route r on r.route_id=a.route_id;";
					$res=$conn->query($a);
						while($row=$res->fetch_assoc()){?>
                        <tr>
                        <td><?php  echo $row['bus_regno'];?></td>
                         <td><?php echo $row['driver_name'];?></td>
                          <td> <?php echo $row['source_name'],"-",$row['desti_name']?></td>
						  <td><a href="Assigndriver.php?did=<?php echo $row['assign_id']?>"class="btn btn-outline-light">Delete</td><?php  }?>
                          </tr>
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