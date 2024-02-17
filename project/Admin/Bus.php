
<?php include("../ASSETS/connections/connection.php");
ob_start();
include('Head.php');?><br><br><?php 
$bid=0;
$bno="";
$breg="";
$bcap="";
$bpic="";

if(isset($_POST['btnsub']))
{
 $nbreg=$_POST['txtbusreg'];
 $nbcap=$_POST['txtbuscap'];
 $b_id=$_POST['txthid'];
 $nbpic=$_FILES["image"]["name"];
 $temppic=$_FILES["image"]["tmp_name"];
 $size=$_FILES["image"]["size"];
 move_uploaded_file($temppic,'../ASSETS/File/User/'.$nbpic);

		 if($b_id==0)
		// { 
    //   $sql_check_duplicate = "SELECT bus_regno,bus_capacity FROM tbl_bus WHERE bus_regno='".$nbreg."' and bus_capacity='".$nbcap."' ";
    //  $result =$conn->query($sql_check_duplicate);
    //   if ($result->num_rows > 0)
    //    {
    //     echo "Error : Duplicate data already exists!";
    //    } else 
    //    {
			 $i="insert into tbl_bus (bus_regno,bus_capacity,bus_image,bus_time)values('".$nbreg."','".$nbcap."','".$nbpic."','".$_POST['appt']."')";
			if($size>=0&&$size<=150000)
			{
			$conn->query($i);
			}
			else
			{?>			<script>
				alert("file size doesn't match");
				</script> 
			<?php } 
       }
	  // }
     
			// $upquery="update tbl_bus set bus_regno='".$nbreg."',bus_capacity='".$nbcap."',bus_image='".$nbpic."' where bus_id='".$b_id."'";
			// if($conn->query($upquery))
			// header('location:Bus.php');
   		
// }
    

if(isset($_GET['did']))
{
$delquery="delete from tbl_bus where bus_id= ".$_GET['did'];
$conn->query($delquery);
}

if(isset($_GET['edit']))
{
$squery="select * from tbl_bus where bus_id=".$_GET['edit'];
$resed=$conn->query($squery);
$rowed=$resed->fetch_assoc();
$breg=$rowed['bus_regno'];
$bcap=$rowed['bus_capacity'];
$bpic=$rowed['bus_image'];
$bid=$rowed['bus_id'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
    width:100%;
    height:180px;
    border-radius:10px;
    padding-left:5px;
    font:16px Serif ;
    color:white;
}
input[type="text"]
{border:1px solid;
  border-color:white;
background-color:transparent;
color:white;
border-radius:7px;
width:250px;
height:40px;}
input[type="file"]
{background-color:#1e293b;
color:white;
}

</style>
</head>
<body>
<form id="form1" name="form1" enctype="multipart/form-data" method="post" action=""><div class="regForm"><br>
   Bus  Number:<sup style="color:red;">*</sup>&nbsp;
 <input type="text" name="txtbusreg" id="txtbusreg" placeholder="Enter bus  number"value="<?php /* echo $breg*/ ?>" required/>
 &nbsp;&nbsp;&nbsp;
 Departure Time:<sup style="color:red;">*</sup>&nbsp;
 <input type="time" id="appt" name="appt" min="06:00" max="18:00" required />
   &nbsp;&nbsp;
   Bus Image:<sup style="color:red;">*</sup><input type="file" name="image" id="image"  value="<?php  echo $bpic?>"/>
   <sup style="color:red;">*</sup><b>Choose photo between 50KB and 150KB</b><br><br>
   &nbsp;&nbsp;Bus Capacity:<sup style="color:red;">*</sup><input type="text" placeholder="Enter number of seats" name="txtbuscap" id="txtbuscap" value="<?php  echo $bcap ?>" required/>
<center>
    <input  type="submit" name="btnsub" id="btnsub" value="Add Bus" class="btn btn-outline-light" />
    <input type="reset" name="btncan" id="btncan" value="Cancel" class="btn btn-outline-light" />  </center>
</p>
<input type="hidden" name="txthid"  value="<?php echo $bid ?>"/></div>
</form>
  <table width="200" border="1" class="table table-hover table-dark">
    <tr>
      
      <td>Bus Registration</td>
      <td>Departure Time</td>
      <td>Bus Capacity</td>
      <td>Bus Image</td>
      <td>Action</td>
    </tr>
    <?php $s="select * from tbl_bus";
	$res=$conn->query($s);
	while($row=$res->fetch_assoc())
   
    {
		?>
    <tr>
      
      <td><?php  echo $row['bus_regno']; ?></td>
      <td> <?php echo $row['bus_time'] ?></td>
      <td><?php  echo $row['bus_capacity']; ?></td>
      <td> <img src="../ASSETS/File/User/<?php  echo $row['bus_image'] ?>" width="100"/></td>
      <td><a href="Bus.php?did=<?php echo $row['bus_id'] ?>" class="btn btn-outline-light">Delete</a>
     <a href="Bus.php?edit=<?php echo $row['bus_id'] ?>"class="btn btn-outline-light">Upadte</a>
    </tr>
    <?php }?>
  </table>
<p>&nbsp;</p>
<?php
include('Foot.php');
ob_flush();
?>
</body>
</html>