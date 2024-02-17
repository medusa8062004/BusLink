<?php 
include("../ASSETS/connections/Connection.php");
ob_start();
include('Head.php');
?>
<br><br>
<?php  if(isset($_GET['did']))
{ $dq="delete from tbl_alert where alert_id=".$_GET['did'];
  $conn->query($dq);}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Driver Alerts</title>
<style>
  th{ font:20px Seif;
  font-weight:10px;}
  td{font:16px Sans-serif;}
  a{color:white;}
  a:hover
  {color:cyan;}
  </style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="382" border="1" class="table table-dark table-hover">
    <tr>
      <td width="58">Driver Name</td>
      <td width="124"><p>AssignedRoute </p></td>
      <td width="86">Alert Given</td>
      <td width="86">Date and Time of Alert</td>
      <td width="50">Action</td>
    </tr><tr>
   <?php $k="select * from tbl_alert a inner join tbl_route r on r.route_id=a.route_id inner join tbl_assign asi on asi.route_id=r.route_id inner join tbl_driver d on d.driver_id=a.driver_id";
	 $res=$conn->query($k);
	  while($row=$res->fetch_assoc()){?>
      <td><?php echo $row['driver_name'] ?></td>
      <td><?php echo $row['route_name'] ?></td>
      <td><?php echo $row['alert_detail'] ?></td>
      <td><?php echo $row['alert_datetime'] ?></td>
      <td><a href="Driveralerts.php?did=<?php echo  $row['alert_id']?>"class="btn btn-outline-light">Delete</a></td>
    </tr><?php  }?>
  </table>
</form>
<?php
include('Foot.php');
ob_flush();
?>
</body>
</html>