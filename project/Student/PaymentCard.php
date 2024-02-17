


<?php
include("../ASSETS/connections/Connection.php");
session_start();
ob_start();
include('Head.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Card</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body  >
    <div class="container" id="pri">
        <?php
        $sel = "select * from tbl_stdstp s inner join tbl_stop p on p.stop_id=s.stop_id inner join tbl_route r on s.stureg_id=" . $_SESSION['sid'];
        $res = $conn->query($sel);
        if ($row = $res->fetch_assoc()) {
            ?>
            <h1>Payment Card</h1>
            <form method="post">
                Route Name:<?php echo $row['source_name'] . " - " . $row['desti_name'] ?>
              <table class="table table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Sl No</th>
            <th>Month Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $months = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];

        $paymentDue = 0; 
        foreach ($months as $index => $month) {
            echo "<tr>";
            echo "<td>" . ($index + 1) . "</td>";
            echo "<td>" . $month . "</td>";

            
            $currentYear = date('Y');
            $s = "SELECT * FROM tbl_payment WHERE stureg_id=" . $_SESSION['sid'] . " AND pay_month='" . $month . "' AND YEAR(pay_datetime)='" . $currentYear . "' ";
            $res1 = $conn->query($s);
            if ($res1->num_rows > 0) {
                echo "<td>Paid</td>";
            } else {
                echo "<td><a href='paymentinfo.php?did=$month&iid=" . ($index + 1) . "'>Pay</a></td>";
                $k = "SELECT r.route_rate,s.stp_no FROM tbl_route r INNER JOIN tbl_stop s ON r.route_id = s.route_id INNER JOIN tbl_stdstp stp ON s.stop_id = stp.stop_id WHERE stp.stureg_id = '" . $_SESSION['sid'] . "'";
                $res2 = $conn->query($k);
                $row2 = $res2->fetch_assoc();
 
               if($row2['stp_no']<=5)
                $paymentDue += $row2['route_rate'];
               else
               $paymentDue=20+$row2['route_rate']+ $paymentDue; 
            }
            echo "</tr>";
        }

        echo "<tr>";
        echo "<td></td>";
        echo "<td>Total Due:</td>"; 
        if($paymentDue==0)
        echo "<td>" . date('Y') . " Payment Completed <button onclick=\"printDiv('pri')\">Print</button></td>";

            else
            echo "<td>$paymentDue</td>";
        echo "</tr>";
        ?>
    </tbody>
</table>

            </form>
        <?php
        } else {
            echo "You didn't choose a route";
        }
        ?>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
</body>

</html>
<?php
include('Foot.php');
ob_flush();
?>

