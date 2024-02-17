
<?php 
include("../ASSETS/connections/Connection.php");
session_start();
ob_start();
include('Head.php');
if(isset($_POST["btnsub"]))
{
	$ct=$_POST['txttitle'];
	$cc=$_POST['txtcontent'];
	$cd=$_SESSION['sid'];
	if($ct==0)
	{echo "Select a complaint title";}
	else
	{
	$ins="insert into tbl_complaints(cmp_title,cmp_content,stureg_id,cmp_date)values('".$ct."','".$cc."','".$cd."',now())";
	$conn->query($ins);}
	 
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Complaints</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="474" border="1">
<caption>Complaints  </caption>
    <tr>
      <td width="133">Complaint Title</td>
      <td width="325"><label for="txttitle"></label>
      <select id="txttitle" name="txttitle" required>
            <option value="0">---Select Complaint Title---</option>
            <option value="bus-delay">Bus Delay</option>
            <option value="bus-cancellation">Bus Cancellation</option>
            <option value="bus-overcrowding">Bus Overcrowding</option>
            <option value="bus-condition">Bus Condition</option>
            <option value="other">Other</option>
        </select></td>
    </tr>
    <tr>
      <td>Complaint Content</td>
      <td><label for="txtcontent"></label>
      <textarea name="txtcontent" id="txtcontent" cols="25" rows="5" required="required" ></textarea></td>
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
        <input type="submit" name="btnsub" id="btnsub" value="Submit" />
      </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="797" border="1">
    <tr>
    
      <td width="94">Complaint Title</td>
      <td width="170">Complaint Content</td>
      <td width="252">Complaint Given Date and Time</td>
      <td width="253">Replay</td>
    </tr>
    <?php 
	$ins="select * from tbl_complaints where stureg_id=".$_SESSION['sid'];
	$res=$conn->query($ins);
	while($row=$res->fetch_assoc()) {?>
    <tr>
      <td><?php echo $row['cmp_title'] ?></td>
      <td><?php echo $row['cmp_content'] ?></td>
      <td><?php echo $row['cmp_date'] ?></td>
      <td><?php echo $row['cmp_replay'] ?></td>
      <?php  } ?>
    </tr>
  </table>
</form>
</body>
</html>