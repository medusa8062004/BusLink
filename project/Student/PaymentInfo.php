<?php include("../ASSETS/connections/Connection.php");
session_start();
ob_start();
include('Head.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Payment Invoice</title>
<style>
a{text-decoration:none;
 }
.box
{ position:relative;
height:370px;
width:470px;
border:2px solid black;
box-shadow:0px 0px 5px black,0px 0px 15px black;
align-items:center;
border-radius:8px;
top:80px;
bottom:0px;
}
 
</style>
</head>

<body>
<center>
  <div class="box">
<form id="form1" name="form1" method="post" action="">
  <div align="center">

  <?php 
  $a="SELECT * from tbl_stdstp st inner join tbl_stop s on s.stop_id=st.stop_id inner join tbl_route r on r.route_id=s.route_id inner join tbl_studentreg reg on reg.stureg_id=st.stureg_id inner join tbl_assign a on a.route_id=r.route_id inner join tbl_bus b on b.bus_id=a.bus_id where st.stureg_id=".$_SESSION['sid'];
  $result=$conn->query($a);
	  if($resrow=$result->fetch_assoc()) {?>
    <p>PAYMENT INFORMATION</p>
      <p>Route Name:  <?php echo $resrow['source_name'],"-",$resrow['desti_name']?></p>
      <p>Stop Name <?php echo $resrow['stop_name'] ?>:</p>
      <p>Student  Name:<?php echo  $resrow['stu_name'] ?></p>
      <p>Bus ID:<?php echo $resrow['bus_regno'] ?></p>
    <?php   if($resrow['stp_no']<=5){ ?>
      <p>Bus Fee:<?php echo  $resrow['route_rate']?></p>
    <?php  } else { ?>
      <p>Bus Fee:<?php echo  $resrow['route_rate']+100;?></p>
      <?php  } ?>
      <p>Payment Date:<?php echo date('Y-m-d'); ?></p>
            <p> Payment Month:<?php echo $_GET['did'] ?></p>

    <p>
      <?php if(isset($_GET['did']))
      $k=$_GET['did'];
	  $m=$_GET['iid'];?>
   <button><a href="Payment.php?did=<?php echo $k?>& iid=<?php echo $m ?>">Payment</a></button>
    </p>
    <?php } else
	echo "No Information Received Yet";?>
   
  </div>
</form>
</div>
</center>
</body>
</html>
<?php
include('Foot.php');
ob_flush();
?>