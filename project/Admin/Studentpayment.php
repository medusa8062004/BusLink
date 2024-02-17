<?php include("../ASSETS/connections/connection.php");
ob_start();
include('Head.php');
?>  <br><br>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Payment</title>
<style>
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
  </style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">

  
<table width="200" border="1" class="table table-dark table-hover">
  <tr>
    <td>Student Name</td>
    <td>Department</td>
    <td>Year</td>
    <td>Roll Number</td>
    <td>Payment Status</td>
  </tr>
  
  <?php 
  $s = "SELECT * FROM tbl_studentreg s 
        INNER JOIN tbl_payment p ON s.stureg_id = p.stureg_id 
        INNER JOIN tbl_department dep ON dep.dep_id = s.dep_id";
  $res = $conn->query($s);
  
  while ($row = $res->fetch_assoc()) { 
  ?> 
    <tr>
      <td><?php echo $row['stu_name']; ?></td>
      <td><?php echo $row['dep_name']; ?></td> <!-- Assuming dep_name is the name of the department column -->
      <td><?php echo $row['stu_year']; ?></td> <!-- Assuming year is the name of the year column -->
      <td><?php echo $row['stu_roll']; ?></td>
      <td>
        <?php 
        if ($row['pay_status'] == 1) {
          echo "Payment Received";
        } else {
          echo "Payment not yet Received";
        }
        ?>
      </td>
     
    </tr>
  <?php 
  } 
  ?>
</table>

</form>
<?php
include('Foot.php');
ob_flush();
?>
</body>
</html>