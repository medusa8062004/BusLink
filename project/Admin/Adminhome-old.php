
<?php 
 session_start();
 include("../ASSETS/connections/connection.php");
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Panel</title>
</head>

<body>
<center><b>ADMIN HOMEPAGE</b></center>
<form method="post" action="">
<i>Welcome</i><h4><?php echo $_SESSION['aname']; ?></h4>
<a href="bus.php">Manage Bus</a><br>
<?php
$selQry='select count(noti_status) as notification from tbl_stdstp where noti_status=0';
$res=$conn->query($selQry);
$data=$res->fetch_assoc();
$notification_count=$data['notification'];
?>

<a href="notification.php">Notifications (<?php echo $notification_count ?>)</a><br>
<a href="Assigndriver.php">Assign Drivers</a><br>
<a href="studentpayment.php">Students Payments</a><br>
<a href="route.php">Add Routes</a><br>
<a href="stop.php">Add stops</a><br>
<a href="Place.php">Add Place</a><br>
<a href="Studentverification.php">Verify Student</a><br>
<a href="driververification.php">verify Driver</a><br>
<a href="department.php">Add Departments</a><br>
<a href="course.php">Add Courses</a><br>
<a href="driveralerts.php">Driver alerts</a><br>
COMPLAINTS<br>
<?php 
$sQry='select count(driver_id) as notification1 from tbl_complaints where cmp_status=0&&stureg_id=0';
$res=$conn->query($sQry);
$row=$res->fetch_assoc();
$d1notification_count=$row['notification1'];

$s1Qry='select count(stureg_id) as notification2 from tbl_complaints where cmp_status=0&&driver_id=0';
$res=$conn->query($s1Qry);
$row=$res->fetch_assoc();
$d2notification_count=$row['notification2'];


?>

<a href="complaints.php">Driver Complaints(<?php echo $d1notification_count ?>)</a><br>
<a href="scomplaint.php">Student Complaints(<?php echo $d2notification_count ?>)</a><br>
<a href="feedback.php">Feedbacks</a>


</form>
</body>
</html>