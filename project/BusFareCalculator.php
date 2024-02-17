<?php include("ASSETS/connections/connection.php");
session_start();
?>
<div style="padding-top: 120px;">

<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Choose Route and Stop</title>
  <!-- Add Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body{background: linear-gradient(90deg, rgba(85,0,227,1) 0%, rgba(198,61,255,1) 100%);}
    </style>
</head>

<body>
  
  <a href="javascript:history.go(-1);" style="background-color: transparent; font-weight: bold; font-size:120%; color:white; position: absolute; top: 0; right: 150px; padding-top:50px;"  class="back-button">&#9666; Back</a>
<?php
if (isset($_POST['btnsub'])) {
?>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <table class="table table-bordered mt-4">
          <thead class="thead-white">
            <tr>
              <th>Stop Name</th>
              <th>Stop Rate</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sl = "select * from tbl_route r inner join tbl_stop stp on stp.route_id=r.route_id where r.route_id=" . $_POST['ddlroute'];
            $r1 = $conn->query($sl);
            while ($ro1 = $r1->fetch_assoc()) {
            ?>
              <tr>
                <td><?php echo $ro1['stop_name'] ?></td>
                <?php if ($ro1['stp_no'] <= 5) { ?>
                  <td><?php echo $ro1['route_rate'] ?></td>
                <?php } else { ?>
                  <td><?php echo $ro1['route_rate'] + 100 ?></td>
              </tr>
            <?php }
            } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<?php } ?>

<!-- Add Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
