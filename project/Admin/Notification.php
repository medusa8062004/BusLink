
<?php  include("../ASSETS/connections/Connection.php");
ob_start();
include('Head.php');
?>  <br><br>
<?php
$updateq="update tbl_stdstp set noti_status=2 where noti_status=1";
$conn->query($updateq);
if(isset($_GET['did'])){
// {$up1="update tbl_stdstp set noti_status=4 where stureg_id=".$_GET['did'];
//   $conn->query($up1); 
$del="delete  from tbl_stdstp where stureg_id=".$_GET['did'];
$conn->query($del);
}
	?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title\>Student Route Information</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="708" border="1" class="table table-hover table-dark">
  <caption></caption>
    <tr>
      <td width="174">Student Name</td>
      <td width="322">Route</td>
      <td width="190">Stop</td>
    </tr>
    <?php $a="select * from tbl_stdstp s inner join tbl_studentreg stu on stu.stureg_id=s.stureg_id inner Join tbl_stop p on p.stop_id=s.stop_id inner join tbl_route r on r.route_id=p.route_id";
	$res=$conn->query($a);
						while($row=$res->fetch_assoc()){?>
    <tr>
      <td><?php echo $row['stu_name']?></td>
      <td><?php echo $row['source_name'],"-",$row['desti_name']?></td>
      <td><?php echo $row['stop_name']?></td>
    </tr><?php  } ?>
  </table>
 Route Change Requests
  <table border="2" class="table table-hover table-dark">
    <tr>
    <td>Student Name</td>
      <td>New Route</td>
      <td>New Stop</td>
      <td>Action</td>
                </tr>
    <?php  $s1="select * from tbl_stdstp s inner join tbl_studentreg stu on stu.stureg_id=s.stureg_id inner Join tbl_stop p on p.stop_id=s.stop_id inner join tbl_route r on r.route_id=p.route_id where s.noti_status=3";
    $res1=$conn->query($s1);
    while($row1=$res1->fetch_assoc()) { ?>
 <tr>
      <td><?php echo $row1['stu_name']?></td>
      <td><?php echo $row1['source_name'],"-",$row1['desti_name']?></td>
      <td><?php echo $row1['stop_name']?></td>
      <td><a href="Notification.php?did=<?php echo $row1['stureg_id'] ?>" class="btn btn-outline-light">Accept</a>
    </tr>
    
         <?php } ?>   </table>
</form>
<?php
include('Foot.php');
ob_flush();
?>
</body>
</html>