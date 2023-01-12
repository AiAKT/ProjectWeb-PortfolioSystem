<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<style>
/* body {
            width: 550px;
            margin: 3rem auto;
        } */

#chart-container {
    width: 100%;
    height: auto;
}

/* ------------------ dropdown ---------------  */

.dropbtn {
    background-color: #3498DB;
    color: white;
    padding: 12px;
    font-size: 14px;
    border: none;
    cursor: pointer;
}

.dropbtn:hover,
.dropbtn:focus {
    background-color: #2980B9;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {
    background-color: #ddd;
}

.show {
    display: block;
}
</style>


<body>

    <?php

$con= mysqli_connect("localhost","root","","my_website") or die("Error: " . mysqli_error($con));
 
mysqli_query($con, "SET NAMES 'utf8' ");

// ***************************************************************  กราฟแท่งนิสิต
$query = "
SELECT yearstd, COUNT(fileID) AS dateup FROM `tb_addstd` GROUP BY yearstd;
";
$result = mysqli_query($con, $query);
$resultchart = mysqli_query($con, $query);  
 
 
 //for chart
$dateup = array();
$yearstd = array();
 
while($rs = mysqli_fetch_array($resultchart)){ 
  $dateup[] = "\"".$rs['dateup']."\""; 
  $yearstd[] = "\"".$rs['yearstd']."\""; 
}
$dateup = implode(",", $dateup); 
$yearstd = implode(",", $yearstd); 



//********************************************************************   กราฟแท่งอาจารย์  */
$query1 = "
SELECT yeartch, COUNT(fileID) AS dateup1 FROM `tb_addtch` GROUP BY yeartch;
";
$result1 = mysqli_query($con, $query1);
$resultchart1 = mysqli_query($con, $query1);  
 
 
 //for chart
$dateup1 = array();
$yeartch = array();
 
while($rs = mysqli_fetch_array($resultchart1)){ 
  $dateup1[] = "\"".$rs['dateup1']."\""; 
  $yeartch[] = "\"".$rs['yeartch']."\""; 
}
$dateup1 = implode(",", $dateup1); 
$yeartch = implode(",", $yeartch); 


// *********************************************************************  กล่องอาจารย์

$query2 = " 
SELECT COUNT(fileID) AS fileID FROM tb_addtch
";
$result2 = mysqli_query($con, $query2);
$resultchart2 = mysqli_query($con, $query2);  
 
 //for chart
$fileID2 = array();
 
while($rs = mysqli_fetch_array($resultchart2)){ 
  $fileID2[] = "\"".$rs['fileID']."\""; 
}
$fileID2 = implode(",", $fileID2); 

// ****************************************************************** กล่องนิสิต
$query3 = " 
SELECT COUNT(fileID) AS fileID FROM tb_addstd
";
$result3 = mysqli_query($con, $query3);
$resultchart3 = mysqli_query($con, $query3);  
 
 //for chart
$fileID3 = array();
 
while($rs = mysqli_fetch_array($resultchart3)){ 
  $fileID3[] = "\"".$rs['fileID']."\""; 
}
$fileID3 = implode(",", $fileID3); 

// ************************************************************** กล่องรวม

$query4 = " 
SELECT num1+num2 as total from (SELECT (SELECT COUNT(DISTINCT fileID) as total from tb_addtch )as num1, (SELECT COUNT(DISTINCT fileID) as total from tb_addstd )as num2)as total;
";
$result4 = mysqli_query($con, $query4);
$resultchart4 = mysqli_query($con, $query4);  
 
 //for chart
$fileID4 = array();
 
while($rs = mysqli_fetch_array($resultchart4)){ 
  $fileID4[] = "\"".$rs['total']."\""; 
}
$fileID4 = implode(",", $fileID4); 

// ********************************************************** กราฟแท่งชั้นปี
$query5 = "
SELECT tchname, COUNT(fileID) AS total FROM `tb_addstd` GROUP BY tchname;
";
$result5 = mysqli_query($con, $query5);
$resultchart5 = mysqli_query($con, $query5);  
 
 
 //for chart
$fileID5 = array();
$tchname = array();
 
while($rs = mysqli_fetch_array($resultchart5)){ 
  $fileID5[] = "\"".$rs['total']."\""; 
  $tchname[] = "\"".$rs['tchname']."\""; 
}
$fileID5 = implode(",", $fileID5); 
$tchname = implode(",", $tchname); 

// ********************************************************* วงกลม
$condb= mysqli_connect("localhost","root","","my_website") or die("Error: " . mysqli_error($condb));
mysqli_query($condb, "SET NAMES 'utf8' ");
 // คิวรี่ข้อมูลจากตาราง
$query6 = "SELECT pername, COUNT(fileID) as total FROM tb_addtch GROUP BY pername;";
$result6 = mysqli_query($condb, $query6);
 
    //นำข้อมูลที่ได้จากคิวรี่มากำหนดรูปแบบข้อมุลให้ถูกโครงสร้างของกราฟที่ใช้ *อ่าน docs เพิ่มเติม
    $datax = array();
    foreach ($result6 as $k) {
      $datax[] = "['".$k['pername']."'".", ".$k['total']."]";
    }
 
    //cut last commar
    $datax = implode(",", $datax);
    //แสดงข้อมูลก่อนนำไปแสดงบนกราฟ 
    // echo $datax; //ถ้าอยากเอาออก ก็ใส่ double slash ข้างหน้าครับ

    // ********************************************************** วงกลม
$query7 = "SELECT semester, COUNT(yeartch) as total FROM tb_addtch GROUP BY semester;";
$result7 = mysqli_query($condb, $query7);
 
    //นำข้อมูลที่ได้จากคิวรี่มากำหนดรูปแบบข้อมุลให้ถูกโครงสร้างของกราฟที่ใช้ *อ่าน docs เพิ่มเติม
$datax1 = array();
foreach ($result7 as $k) {
    $datax1[] = "['".$k['semester']."'".", ".$k['total']."]";
}
 
    //cut last commar
$datax1 = implode(",", $datax1);
    //แสดงข้อมูลก่อนนำไปแสดงบนกราฟ 
    // echo $datax; //ถ้าอยากเอาออก ก็ใส่ double slash ข้างหน้าครับ

?>


    <div class="row" style="background-color:#F5F5F5; width:auto;">
        <?php
      echo '<img src="/img/headku.png" id="icon" alt="ku Icon" width="550" style ="margin-top:20px; margin-left:20px; ">';  
    ?>
    </div>

    <div class="row">
        <?php include("tapbar1.php");?>
    </div>

    <!-- <div class="row">
        <div class="alert alert-success" style=" width:auto;">
            <strong>
                <h1 style="text-align:center;">จำนวนผลงาน</h1>
            </strong>
        </div>
    </div> -->

    <div class="row">

        <div class="col-md-2 col-md-offset-1" class="dropdown" style="margin-top: 20px;">
            <button onclick="myFunction()" class="dropbtn">Select page <i class=" fa fa-sort-down"></i></button>
            <div id="myDropdown" class="dropdown-content">
                <a href="http://localhost/project/dashboard_user.php">จำนวนผลงานนิสิต</a>
                <a href="http://localhost/project/dashboard_user_tch.php">จำนวนผลงานอาจารย์</a>
            </div>
        </div>

        <div class="col-sm-2">
            <div class="w3-container" style="width: 200px;">
                <div class="w3-panel w3-card-4 ">
                    <?php while($row = mysqli_fetch_array($result2)) { ?>
                    <div align="center" class="card-body">จำนวนผลงานอาจารย์ <br><?php echo $row['fileID'];?> ผลงาน</div>
                    <?php } ?>
                </div>
            </div>
        </div>


        <div class="col-sm-2">
            <div class="w3-container" style="width: 200px;">
                <div class="w3-panel w3-card-4 ">
                    <?php while($row = mysqli_fetch_array($result3)) { ?>
                    <div align="center" class="card-body">จำนวนผลงานนิสิต <br><?php echo $row['fileID'];?> ผลงาน</div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="col-sm-2">
            <div class="w3-container" style="width: 200px;">
                <div class="w3-panel w3-card-4">
                    <?php while($row = mysqli_fetch_array($result4)) { ?>
                    <div align="center" class="card-body">จำนวนผลงานทั้งหมด <br><?php echo $row['total'];?> ผลงาน
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-top: 30px;">
        <!-- <div class="col-sm-4"></div>
        <div class="col-sm-5"> -->

        <!-- <canvas id="pieChart" style="width:100%;max-width:600px"></canvas> -->

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

            <!-- ******************************   วงกลม  ************************************************* -->

            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

            <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Summary per pername'],
                    <?php echo $datax;?>
                ]);


                var options = {
                    title: ' จำนวนผลงานในแต่ละหมวดหมู่ ',
                    colors: ['#66CC99',
                            '#FFC75F',
                            '#E688A1',
                            '#2EBDBD',
                            '#CECBDA',
                            '#FFA07A',
                            '#CC3333',
                            '#1E90FF',]
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                chart.draw(data, options);
            }
            </script>
            <!-- ***************************************************************************************** -->

            <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart1);

            function drawChart1() {

                var data1 = google.visualization.arrayToDataTable([
                    ['Task', 'Summary per semester'],
                    <?php echo $datax1;?>
                ]);


                var options1 = {
                    title: 'จำนวนผลงานของอาจารย์ ภาคต้น-ภาคปลาย',
                    colors: ["#FF6699", "#9966CC", "#FFCC00", "#FF9933"]
                };

                var chart1 = new google.visualization.PieChart(document.getElementById('piechart1'));

                chart1.draw(data1, options1);
            }
            </script>
            <!-- ***************************************************************************************** -->

        <div class="col-sm-2"></div>

        <div class="col-sm-4">
            <canvas id="myChart2" style="width:200%;max-width:500px;"></canvas>

            <script>
            var ctx2 = document.getElementById("myChart2").getContext('2d');
            var myChart2 = new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: [<?php echo $tchname;?>],
                    datasets: [{
                        label: 'จำนวนผลงาน',
                        data: [<?php echo $fileID5;?>],
                        backgroundColor: barColors,
                        backgroundColor: [

                            'rgba(117,192,149,1.00)',
                            'rgba(241,221,106,1.00)',
                            'rgba(255,143,127,1.00)',
                            'rgba(1,166,186,1.00)',
                            'rgba(160,171,177,1.00)',
                            'rgba(255,199,122,1.00)',
                            'rgba(220,73,63,1.00)',
                            'rgba(0,110,188,1.00)',


                        ],
                        borderColor: [
                            'rgba(117,192,149,1.00)',
                            'rgba(241,221,106,1.00)',
                            'rgba(255,143,127,1.00)',
                            'rgba(1,166,186,1.00)',
                            'rgba(160,171,177,1.00)',
                            'rgba(255,199,122,1.00)',
                            'rgba(220,73,63,1.00)',
                            'rgba(0,110,188,1.00)',

                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: "จำนวนผลงานนิสิตที่มีอาจารย์แต่ละท่านเป็นที่ปรึกษา"
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
        <div class="col-sm-3" id="piechart1" style="width: 700px; height: 300px;"></div>


    </div>

    <div class="row">
        <?php mysqli_close($con);?>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js">
        </script>

        <p align="center">

        <div class="col-sm-2"></div>
        <!-- <div class="col-sm-5">
            <canvas id="myChart" style="width:200%;max-width:500px;"></canvas>

            <script>
            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php echo $yearstd;?>],
                    datasets: [{
                        label: 'จำนวนผลงาน',
                        data: [<?php echo $dateup;?>],
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
        </div> -->



        <p align="center">
        <div class="col-sm-4">
            <canvas id="myChart1" style="width:200%;max-width:500px;"></canvas>

            <script>
            var ctx1 = document.getElementById("myChart1").getContext('2d');
            var myChart1 = new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: [<?php echo $yeartch;?>],
                    datasets: [{
                        label: 'จำนวนผลงาน',
                        data: [<?php echo $dateup1;?>],
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
                        text: "จำนวนผลงานอาจารย์ในแต่ละปี"
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

        <div class="col-sm-3" id="piechart" style="width: 700px; height: 300px;"></div>



    </div>



</body>
<script>
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}
</script>

</html>