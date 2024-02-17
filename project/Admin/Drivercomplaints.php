<?php include("../ASSETS/connections/connection.php");
ob_start();
include('Head.php');?><br><br>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Driver Complaints</title>
<style>
  th{ font:20px Seif;
  font-weight:10px;}
  td{font:16px Sans-serif;}
  </style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" class="table table-hover table-dark">
    <tr>
      <td>Driver Name</td>
      <td>Complaint Title</td>
      <td><p>Complaint Content</td>
      <td>Submitted Date</td>
      <td>Give Replay</td>
    </tr>
    <?php  $sel="select * from  tbl_complaints c inner join tbl_driver d on d.driver_id= c.driver_id";
	$res=$conn->query($sel);
	while($row=$res->fetch_assoc()) {?>
    <tr>
      <td><?php  echo $row['driver_name']?></td>
      <td><?php  echo $row['cmp_title']?></td>
      <td><?php  echo $row['cmp_content']?></td>
      <td><?php  echo $row['cmp_date']?></td>
      <?php  if($row['cmp_status']==0) {?>
      <td><a href="replay.php?did=<?php echo $row['cmp_id']?>" class="btn btn-outline-light">Give Replay</a></td>
      <?php } else { ?>
      <td><?php echo $row['cmp_replay']; }?></td>
     </tr>
     <?php  } ?>
  </table>
</form><?php
include('Foot.php');
ob_flush();
?>
</body>
</html>