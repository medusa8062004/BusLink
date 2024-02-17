<?php
include("../ASSETS/connections/Connection.php"); 
session_start();
ob_start();
include('Head.php'); 
$sel="select * from tbl_alert a inner join tbl_route r on r.route_id=a.route_id";
$r1=$conn->query($sel);
$res=$r1->fetch_assoc();
?>
<div class="container mt-4">
    <h2>Alert Information</h2>
    <table class="table table-striped">
        <thead>
            <tr>
             
                <th scope="col">Alert Date</th>
               
                <th scope="col">Alert Content</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($res = $r1->fetch_assoc()) { ?>
                <tr>
                <td><?php echo date('Y-m-d H:i:s', strtotime($res['alert_datetime'])); ?></td>

                  
                    <td><?php echo $res['alert_detail']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<?php  
include('Foot.php');
ob_flush();
?>