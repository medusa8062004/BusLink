<?php 
include("../ASSETS/connections/Connection.php");

ob_start();
include('Head.php');
if(isset($_POST["btnsub"]))
{
	$ct=$_POST['txttitle'];
	$cc=$_POST['txtcontent'];
	$cd=$_SESSION['did'];
  $k="select * from tbl_complaints where cmp_title='".$ct."' and cmp_content ='".$cd."'";
 $r1=$conn->query($k);
if($r1->num_rows < 0){


	$ins="insert into tbl_complaints(cmp_title,cmp_content,driver_id,cmp_date)values('".$ct."','".$cc."','".$cd."',now())";
	$conn->query($ins);
}
	 
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Driver Complaints</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    /* Custom CSS for styling the table */
    .table-dark.table-bordered {
        border-collapse: collapse;
    }

    .table-dark.table-bordered, 
    .table-dark.table-bordered th, 
    .table-dark.table-bordered td {
        border: 1px solid #333;
    }

    .table-dark.table-bordered th,
    .table-dark.table-bordered td {
        background-color: #343a40; /* Dark background color */
        color: #fff; /* Text color */
    }

    .table-dark.table-bordered a {
        color: #17a2b8; /* Link color */
    }

    /* Bootstrap hover effect */
    .table-dark.table-bordered tbody tr:hover {
        background-color: #212529; /* Dark background color on hover */
    }
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table class="table table-dark table-bordered" width="317">
   
    <tr>
      <td width="167">Complaint Title</td>
      <td><input type="text" class="form-control" name="txttitle" id="txttitle" required /></td>
    </tr>
    <tr>
      <td>Complaint Content</td>
      <td><textarea class="form-control" name="txtcontent" id="txtcontent" cols="20" rows="5" required></textarea></td>
    </tr>
    <tr>
      <td>Complaint Date</td>
      <?php 
       date_default_timezone_set('Asia/Kolkata');
      $date=date('d-m-y H:i'); ?>
      <td><?php  echo $date;?></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" class="btn btn-primary" name="btnsub" id="btnsub" value="Submit" />
      </div></td>
    </tr>
  </table>

  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table class="table table-dark table-bordered" width="797">
    <tr>
      <th width="94">Complaint Title</th>
      <th width="170">Complaint Content</th>
      <th width="252">Complaint Given Date and Time</th>
      <th width="253">Replay</th>
    </tr>
    <?php 
    $ins="select * from tbl_complaints where driver_id=".$_SESSION['did'];
    $res=$conn->query($ins);
    while($row=$res->fetch_assoc()) {?>
    <tr>
      <td><?php echo $row['cmp_title'] ?></td>
      <td><?php echo $row['cmp_content'] ?></td>
      <td><?php echo $row['cmp_date'] ?></td>
     <?php  if($row['cmp_status']==0) { ?>
      <td><?php echo "Waiting.." ?></td>
    <?php }  else {?>
      <td><?php echo $row['cmp_replay'] ?></td>
      <?php }  } ?>
    </tr>
  </table>
</form>
</body>
</html>
<?php
include('Foot.php');
ob_flush();
?>
