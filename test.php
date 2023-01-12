


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

<?php
 
$con= mysqli_connect("localhost","root","","my_website") or die("Error: " . mysqli_error($con));
 
mysqli_query($con, "SET NAMES 'utf8' ");

// ***************************************************************  กราฟแท่งนิสิต
// SELECT COUNT(fileID) AS fileID, COUNT(years) AS count_years FROM `tb_addstd` GROUP BY years

$query = "
SELECT years, COUNT(years) AS count_years FROM `tb_addstd` GROUP BY years;;
";
$result = mysqli_query($con, $query);
$resultchart = mysqli_query($con, $query);  
 
 
 //for chart
$count_years = array();
$years = array();
 
while($rs = mysqli_fetch_array($resultchart)){ 
  $count_years[] = "\"".$rs['count_years']."\""; 
  $years[] = "\"".$rs['years']."\""; 
}
$count_years = implode(",", $count_years); 
$years = implode(",", $years); 


?>

<?php mysqli_close($con);?>

<script>
        var xValues = ["ชั้นปี 1", "ชั้นปี 2", "ชั้นปี 3", "ชั้นปี 4"];
        var yValues = [55, 49, 44, 24];
        var barColors = [
            "#FFCC00",
            "#FF9933",
            "#FF6699",
            "#9966CC"
        ];

        // new Chart("pieChart", {
        //     type: "pie",
        //     data: {
        //         labels: xValues,
        //         datasets: [{
        //             backgroundColor: barColors,
        //             data: yValues
        //         }]
        //     },
        //     options: {
        //         title: {
        //             display: true,
        //             text: "จำนวนผลงานนิสิตในแต่ละชั้นปี"
        //         }
        //     }
        // });
        </script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js">
</script>

<p align="center">

<div class="col-sm-2"></div>
<div class="col-sm-5">
    <canvas id="myChart" style="width:200%;max-width:500px;"></canvas>

    <script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php echo $years;?>],
            datasets: [{
                label: 'จำนวนผลงาน',
                data: [<?php echo $count_years;?>],
                backgroundColor: barColors,
                backgroundColor: [
                    '#87CEEB',
                    '#9999CC',
                    '#FFA07A',
                    '#FFC0CB',
                    '#6495ED',
                    '#FFD700',


                ],
                borderColor: [
                    '#87CEEB',
                    '#9999CC',
                    '#FFA07A',
                    '#FFC0CB',
                    '#6495ED',
                    '#FFD700',

                ],
                borderWidth: 1
            }]
        },
        options: {
            title: {
                display: true,
                text: "จำนวนผลงานนิสิตในแต่ละปี"
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    </script>
    </p>
</div>
    
</body>
</html>