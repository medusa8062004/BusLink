<?php  include("../ASSETS/connections/Connection.php");

ob_start();
include('Head.php');
$r="select * from tbl_assign where driver_id=".$_SESSION['did'];
 $res=$conn->query($r);
	  if($row=$res->fetch_assoc())
	 $k= $row['route_id']; 
	 else
	 echo "";

if(isset($_POST['btnsub']))
{ 
$detail=$_POST['txtdetail'];

$d=$_SESSION['did'];
	$inquery="insert into tbl_alert(alert_detail,alert_datetime,route_id,driver_id)values('".$detail."',now(),'".$k."','".$d."')";
$conn->query($inquery);

}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Driver Alerts</title>
<style>
  a{color:white;}
  a:hover
  {color:cyan;}
  th{ font:20px Seif;
  font-weight:10px;}
  td{font:16px Sans-serif;}
  .regForm {
    background-color:#1e293b;
    border:solid 2px;
    width:500px;
    height:250px;
    border-radius:10px;
    padding-left:5px;
    font:16px Serif ;
    color:white;
}
input[type="submit"],textarea
{border:1px solid;
  border-color:white;
background-color:transparent;
color:white;
border-radius:7px;
width:200px;
height:40px;}

  </style>
</head>

<body>
  <div class="regForm" style="margin-top:30px">
  <center>
  
<form id="form1" name="form1" method="post" action="" style="margin-top:20px">
 
  

       <?php
       if(isset($_GET['alert']))
       {$dl="delete from tbl_alert where alert_id=".$_GET['alert'];
       if($conn->query($dl))
       header('location:Alerts.php');}
       
       
       $ins="select * from tbl_assign  a inner join tbl_route r on r.route_id=a.route_id  where driver_id=".$_SESSION['did'];
	  $res=$conn->query($ins);
	  if($row=$res->fetch_assoc())
	 { ?>
      
      Route Name : &nbsp; &nbsp;  <?php echo $row['source_name']."-".$row['desti_name'] ?><?php } else { ?><?php echo "No route assigned"?><?php  } ?><br> <br>
  
  Alert Detail: &nbsp; &nbsp; <textarea name="txtdetail" id="txtdetail" class="custom-input" required></textarea><br><br>
     

         
     
    
   
    <?php 
	date_default_timezone_set('Asia/Kolkata');
$date=date('d-m-Y H:i'); ?>
 
   DateTime:&nbsp; <?php echo $date;?><br><br>
  
        <input type="submit" name="btnsub" id="btnsub" value="Submit" />


     
</form>
</center>
   </div>

   

   <table class="table table-dark table-hover" style="width: 100%;">
    <thead>
      <tr>
        <th>Sl.No</th>
        <th>Alert Given</th>
        
        <th>Action</th>
      
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 0;
      $k = "SELECT * FROM tbl_alert al inner join tbl_driver d on d.driver_id=al.driver_id";
      $result = $conn->query($k);
      while ($resrow = $result->fetch_assoc()) {
        $i++;
        ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $resrow['alert_detail'] ?></td>
        
          <td><a href="Alerts.php?alert=<?php echo $resrow['alert_id'] ?>" class="btn btn-dark">Delete</a></td>
         
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</body>
</html>
<?php
include('Foot.php');
ob_flush();
?>