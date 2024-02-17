<?php include("../ASSETS/connections/Connection.php");

ob_start();
include('Head.php');
$s1="select * from tbl_stdstp stp inner join tbl_stop s on s.stop_id=stp.stop_id inner join tbl_route r on r.route_id=s.route_id inner join 
tbl_assign a on a.route_id=r.route_id inner join tbl_driver d on d.driver_id=a.driver_id where stp.stureg_id=".$_SESSION['sid'];
$r1=$conn->query($s1);
if($ro1=$r1->fetch_assoc()){
?>
<table border="1">
    <tr>
        <th>Route Name</th>
        <th>Stop you chose</th>
        <th>Stop Number</th>
      
        <th>Driver Name</th>
        <th>Driver contact</th>

    </tr>
    <tr>
        <td><?php echo $ro1['source_name']."-".$ro1['desti_name'] ?></td>
        <td><?php echo $ro1['stop_name']?></td>
        <td><?php echo $ro1['stp_no']?></td>
        <td><?php echo $ro1['driver_name'] ?></td>
        <td><?php echo $ro1['driver_phone'] ?></td>
    </tr>
    
</table>

<?php
}
else
echo "No Driver Assignrd to this route yet";
include('Foot.php');
ob_flush();
?>