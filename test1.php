<?php
//เชื่อมต่อฐานข้อมูล
$condb= mysqli_connect("localhost","root","","my_website") or die("Error: " . mysqli_error($condb));
mysqli_query($condb, "SET NAMES 'utf8' ");
 // คิวรี่ข้อมูลจากตาราง
// $query = "SELECT semester, COUNT(yearstd) as total FROM tb_addstd GROUP BY semester;";
$query = "SELECT pername, COUNT(fileID) as total FROM tb_addstd GROUP BY pername;";
$result = mysqli_query($condb, $query);
 
    //นำข้อมูลที่ได้จากคิวรี่มากำหนดรูปแบบข้อมุลให้ถูกโครงสร้างของกราฟที่ใช้ *อ่าน docs เพิ่มเติม
    $datax = array();
    foreach ($result as $k) {
      $datax[] = "['".$k['pername']."'".", ".$k['total']."]";
    }
 
    //cut last commar
    $datax = implode(",", $datax);
    //แสดงข้อมูลก่อนนำไปแสดงบนกราฟ 
    // echo $datax; //ถ้าอยากเอาออก ก็ใส่ double slash ข้างหน้าครับ

    // ***************************************************************************

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
<html>

<head>
    <!-- เรียก js มาใช้งาน -->
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
            title: 'จำนวนผลงานของนิสิต ภาคต้น-ภาคปลาย ',
            colors: ["#FF6699", "#9966CC", "#FFCC00", "#FF9933"]
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
    </script>

<!-- ********************************************************* -->

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
            title: 'จำนวนผลงานของอาจารย์ ภาคต้น-ภาคปลาย ',
            colors: ["#FF6699", "#9966CC", "#FFCC00", "#FF9933"]
        };

        var chart1 = new google.visualization.PieChart(document.getElementById('piechart1'));

        chart1.draw(data1, options1);
    }
    </script>
</head>

<body>

    <div class="col-sm-3" id="piechart" style="width: 600px; height: 500px;"></div>

    <div class="col-sm-3" id="piechart1" style="width: 400px; height: 500px;"></div>
</body>

</html>