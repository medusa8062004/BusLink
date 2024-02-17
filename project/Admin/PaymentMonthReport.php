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
    <div style="text-align: center;">
        <h2>Monthly Payment Data</h2>
        <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
    </div>

    <?php
    $xValues = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    $yValues = [];

    foreach ($xValues as $month) {
        $sel = "SELECT COUNT(*) AS student_count FROM tbl_payment WHERE pay_month = '$month'";
        $result = $conn->query($sel);
        $data = $result->fetch_assoc();
        $yValues[] = $data["student_count"];
    }
    ?>

    <script>
        var xValues = <?php echo json_encode($xValues); ?>;
        var yValues = <?php echo json_encode($yValues); ?>;
        
        function generateRandomColor() {
            var letters = "0123456789ABCDEF";
            var color = "#";
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        var barColors = [];
        for (var i = 0; i < xValues.length; i++) {
            barColors.push(generateRandomColor());
        }

        new Chart("myChart", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues,
                    barThickness: 6,
                }]
            },
            options: {
                title: {
                    display: false, // Hide the default title
                },
                scales: {
                    x: [{
                        grid: {
                            display: false, // Hide the grid lines on the x-axis
                        },
                        ticks: {
                            beginAtZero: true,
                            autoSkip: true,
                            maxTicksLimit: 12, // Adjust the number of visible x-values
                        },
                    }],
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: "lightgray", // Change the color of the y-axis grid lines
                        },
                    }
                },
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
