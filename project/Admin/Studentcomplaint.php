<?php include("../ASSETS/connections/connection.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Student Name</td>
      <td><p>Complaint</p>
      <p>Title </p></td>
      <td><p>Complaint</p>
      <p>Content</p></td>
      <td>Submitted Date</td>
      <td>Give Replay</td>
    </tr>
    <?php  $sel="select * from  tbl_complaints c inner join tbl_studentreg d on d.stureg_id= c.stureg_id";
	$res=$conn->query($sel);
	while($row=$res->fetch_assoc()) {?>
    <tr>
      <td><?php  echo $row['stu_name']?></td>
      <td><?php  echo $row['cmp_title']?></td>
      <td><?php  echo $row['cmp_content']?></td>
      <td><?php  echo $row['cmp_date']?></td>
       <?php  if($row['cmp_status']==0) { ?>
      <td><a href="replay.php?did=<?php echo $row['cmp_id']?>">Give Replay</a></td>
      <?php } else { ?>
      <td><?php echo $row['cmp_replay']; }?></td>
     </tr>
     <?php  } ?>
  </table>
</form>
</body>
</html>