<?php include("../ASSETS/connections/connection.php"); 
ob_start();
include('Head.php');?><br><br>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Feedbacks</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">

<table width="753" border="1" class="table table-hover table-dark">
  <tr>
    <td width="180">Student Name</td>
    <td width="303">Feedback Content</td>
    <td width="248">&nbsp;</td>
  </tr>
  <?php  
  $s="select * from tbl_feedback f inner join tbl_studentreg r on r.stureg_id=f.stureg_id";
  $res=$conn->query($s);
  while($row=$res->fetch_assoc()) {?>
  <tr>
    <td><?php  echo $row['stu_name'];?></td>
    <td><?php echo $row['feed_content'] ?></td>
    <td>&nbsp;</td>
  </tr>
  <?php  } ?>

</table>
<p>&nbsp;</p>
<table width="753" border="1" class="table table-hover table-dark">

  <tr>
    <td width="224">Driver Name</td>
    <td width="255">Feedback Content</td>
    <td width="252">&nbsp;</td>
  </tr>
 <?php  
  $s="select * from tbl_feedback f inner join tbl_driver r on r.driver_id=f.driver_id";
  $res=$conn->query($s);
  while($row=$res->fetch_assoc()) {?>
  <tr>
    <td><?php  echo $row['driver_name'];?></td>
    <td><?php echo $row['feed_content'] ?></td>
    <td>&nbsp;</td>
  </tr>
  <?php  } ?>
</table>

<p>&nbsp;</p>
</form>
<?php
include('Foot.php');
ob_flush();
?>
</body>
</html>