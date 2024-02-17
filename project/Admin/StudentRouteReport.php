<?php
session_start();
include("../ASSETS/connections/Connection.php");
ob_start();
include("Head.php");
?>

<!DOCTYPE html>
<html>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</head>
<body>
<div id="tab" align="left">
    <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

    <?php
    $s = "select * from tbl_route";
    $r1 = $conn->query($s);

    $xValues = array();
    $yValues = array();

    while ($row1 = $r1->fetch_assoc()) {
        $routeid = $row1['route_id'];
        $xValues[] = $row1['source_name']."-".$row1['desti_name'];

        $sel = "SELECT COUNT(*) AS student_count FROM tbl_stdstp s 
                INNER JOIN tbl_stop st ON s.stop_id = st.stop_id
                WHERE st.route_id = '$routeid'";

        $result = $conn->query($sel);
        $data = $result->fetch_assoc();
        $yValues[] = $data["student_count"];
    }
    ?>

    <script>
        var xValues = <?php echo json_encode($xValues); ?>;
        var yValues = <?php echo json_encode($yValues); ?>;
        var barColors = ["pink", "hotpink", "purple", "cyan", "red","Orange","Violet","Green","Lime","Grey","Black","indigo"];

        new Chart("myChart", {
            type: "doughnut",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,
                    text: "Number of Studentsfrom Each Route"
                }
            }
        });
		
		
		
		
		
    </script>
</div>




</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>
