<?php  include("../ASSETS/connections/Connection.php");

ob_start();
include('Head.php');
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body><center>
  
<form id="form1" name="form1" method="post" action="">



              
             
            </div>

<div class="table-responsive" style="margin-top: 70px;">
  <table class="table table-bordered" style="width: 100%;">
    <thead>
      <tr>
        <th>SL.NO</th>
        <th>Student Name</th>
        <th>Stop</th>
        <th>Student Contact</th>
        <th>Student Address</th>
        <th>Guardian Name</th>
        <th>Guardian Contact</th>
        <th>Student Department</th>
        <th>Roll Number</th>
        <th>Year Of Study</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 0;
      $k = "SELECT * from tbl_stdstp st inner join tbl_stop s on s.stop_id=st.stop_id inner join tbl_route r on r.route_id=s.route_id inner join tbl_studentreg reg on reg.stureg_id=st.stureg_id inner join tbl_assign asi on asi.route_id=r.route_id  inner join tbl_department  dep on dep.dep_id=reg.dep_id where r.route_id=asi.route_id";
      $result = $conn->query($k);
      while ($resrow = $result->fetch_assoc()) {
        $i++;
        ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $resrow['stu_name'] ?></td>
          <td><?php echo $resrow['stop_name'] ?></td>
          <td><?php echo $resrow['stu_contact'] ?></td>
          <td><?php echo $resrow['stu_house'] ?></td>
          <td><?php echo $resrow['stu_gname'] ?></td>
          <td><?php echo $resrow['stu_gcon'] ?></td>
          <td><?php echo $resrow['dep_name'] ?></td>
          <td><?php echo $resrow['stu_roll'] ?></td>
          <td><?php echo $resrow['stu_year'] ?></td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</div>

<p>&nbsp;</p>
     
</form></center>
</body>
</html>
<?php
include('Foot.php');
ob_flush();
?>