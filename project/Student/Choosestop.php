<?php include("../ASSETS/connections/connection.php");
session_start();
ob_start();
include('Head.php');
?>
<?php 
if(isset($_POST['btnsub'])) {
  $k = $_SESSION['sid'];
  $stop = $_POST['ddlstop'];
  $route = $_POST['ddlroute'];/*
  if (!($route == 0 && $stop == 0)) {
    $sql_check_duplicate = "SELECT stureg_id,stop_id  FROM tbl_stdstp WHERE stureg_id='" . $k . "' and stop_id='" . $stop . "' ";
    $result = $conn->query($sql_check_duplicate);
    if ($result->num_rows > 0)
      echo "Error : Duplicate data already exists!";
    else {*/
      $ins = "insert into tbl_stdstp(stureg_id,stop_id,noti_status)values('" . $k . "','" . $stop . "',1)";
      if($conn->query($ins))
      {
        header("location:PaymentCard.php");
      }
  /*  }
    echo "Please select a stop and route ";
  }*/
}
if(isset($_POST["btnchange"]))
{ $up1="update tbl_stdstp set noti_status=3 where  noti_status=2  and stureg_id='".$_SESSION['sid']."'";
$conn->query($up1);
}
?>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Choose Route and Stop</title>
</head>
<style>
  .regForm {
    background: linear-gradient(90deg, rgba(85, 0, 227, 1) 0%, rgba(198, 61, 255, 1) 100%);
    border: solid 2px;
    width: 400px;
    height: 280px;
    border-radius: 10px;
    padding-left: 5px;
    font: 16px Serif;
    color: white;
  }

  select {
    border: 1px solid;
    border-color: white;
    background-color: transparent;
    color: white;
    border-radius: 7px;
    width: 300px;
    height: 40px;
  }

  select option {
    background-color: purple;
    color: white;
  }
</style>
<center>

  <body>
  <form id="form1" name="form1" method="post" action="">
  <?php
// $s="SELECT * FROM tbl_stdstp where stureg_id=".$_SESSION['sid'];
$s = "SELECT * FROM tbl_stdstp where stureg_id=".$_SESSION['sid'];
$result = $conn->query($s);
$rowresult=$result->fetch_assoc();  

if (($result->num_rows == 0))
{
    // No route and stop have been selected
    ?>
    <div style="padding-bottom:50px;">
        <div class="regForm" style="padding-top:50px">
            Route&nbsp;<sup style="color:red;">*</sup>
            <label for="ddlroute"></label>
            <select name="ddlroute" onChange="getStop(this.value)" id="ddlroute">
                <option value="0">---Select Route---</option>
                <?php
                $a = "SELECT * FROM tbl_route";
                $ares = $conn->query($a);
                while ($row = $ares->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $row['route_id'] ?>">
                        <?php echo $row['source_name'], "-", $row['desti_name'] ?>
                    </option>
                <?php } ?>
            </select> <br><br>

            Stop&nbsp;<sup style="color:red;">*</sup>
            <label for="ddlstop"></label>
            <select name="ddlstop" id="ddlstop">
                <option value="0">---Select stop---</option>
            </select>
            <br><br>
            <input type="submit" name="btnsub" id="btnsub" value="Submit" class="btn btn-outline-light" />
        </div>
    <?php
} 
else
 { 
    $s1 = "SELECT * FROM tbl_stdstp where stureg_id=".$_SESSION['sid'];
    $result1 = $conn->query($s1);
    $rowres1 = $result1->fetch_assoc();

    if ($rowres1['stureg_id'] == $_SESSION['sid']) 
    {
        $r = "SELECT * FROM tbl_studentreg r
              INNER JOIN tbl_stdstp s ON r.stureg_id = s.stureg_id
              INNER JOIN tbl_stop stp ON stp.stop_id = s.stop_id
              INNER JOIN tbl_route ro ON ro.route_id = stp.route_id
              WHERE s.stureg_id=" . $_SESSION['sid'];
        $res = $conn->query($r);
        $row = $res->fetch_assoc();
        ?>
        <div class="regForm">
            <?php echo "You have already chosen a route"; ?><br>
            Route you chose: <?php echo $row['source_name'] . "-" . $row["desti_name"] ?><br><br>
            Stop you Chose: <?php echo $row['stop_name'] ?>
            <input type="submit" name="btnchange" value="Change">
        </div>
    <?php
    } 
    
  }   
   
?>

        </form>
  </body>
</center>
<script src="../ASSETS/JQ/jQuery.js"></script>
<script>
  function getStop(rid) {
    $.ajax({
      url: "../ASSETS/Ajaxpages/AjaxStop.php?rid=" + rid,
      success: function (html) {
        $("#ddlstop").html(html);

      }
    });
  }
</script>



</html>
<?php
include('Foot.php');
ob_flush();
?>