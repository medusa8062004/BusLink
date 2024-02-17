	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Request Report</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</head>

<body>
<?php
include("../ASSETS/connections/connection.php");
ob_start();
include('Head.php');
?>
<form id="form1" name="form1" method="post" action="">
  <table  border="1"  cellpadding="10" align="center">
    <tr>
      <td>From Date</td>

      <td><label for="txt_f"></label>
      <input type="date" name="txt_f" id="txt_f" /></td>
      <td>To Date</td>
      <td><label for="txt_t"></label>
      <input type="date" name="txt_t" id="txt_t" /></td>
    </tr>
    <tr>
      <td colspan="4" align="center"><input type="submit" name="btnsave" id="btnsave" value="View Results" /></td>
    </tr>
  </table>
  <?php
  if(isset($_POST["btnsave"]))
  {
  ?>
  <div id="pri">
  <table  border="1" cellpadding="10" align="center">
    <tr>
      <td width="41">Sl.no</td>
      <td width="46">Name</td>
      <td width="41">EMail</td>
      <td width="46">Department</td>
      <td width="41">Roll Number</td>
      <td width="46">Contact</td>
      <td width="46">Year of Study</td>
  
     
     
    </tr>
    <?php
	$sel= "SELECT DISTINCT r.stureg_id, r.stu_name, r.stu_mail, dep.dep_name, r.stu_roll, r.stu_contact, r.stu_year
  FROM tbl_payment p
  INNER JOIN tbl_studentreg r ON p.stureg_id = r.stureg_id
  INNER JOIN tbl_department dep ON dep.dep_id = r.dep_id WHERE DATE(p.pay_datetime)  BETWEEN '" . $_POST["txt_f"] . "' AND '" . $_POST["txt_t"] . "' ";
 
	 $row=$conn->query($sel);
	$i=0;
	while($data=$row->fetch_assoc()) {
		$i++;
?>
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data["stu_name"];?></td>
      <td><?php echo $data["stu_name"];?></td>
      <td><?php echo $data["stu_mail"];?></td>
      <td><?php echo $data["dep_name"];?></td>
      <td><?php echo $data["stu_roll"];?></td>
      <td><?php echo $data["stu_contact"];?></td>
      <td><?php echo $data["stu_year"];?></td>
      
     
   
          </tr>
          <?php
	}  
	
		  ?>
  </table>
  </div>
   <center><input type="button" onclick="printDiv('pri')" id="invoice-print"  class="btn btn-success" value="Print" /></center>
  <?php
  }
  ?>
 
</form>
</body>
</html>
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<?php
include('Foot.php');
ob_flush();
?>
