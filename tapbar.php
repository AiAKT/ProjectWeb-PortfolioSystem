<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<style>
.vertical-menu {
    width: 200px;
    height: 100%;
    overflow-y: auto;
    /* Set a width if you like */
}

.vertical-menu a {
    background-color: #F5F5F5;
    /* Grey background color */
    color: black;
    /* Black text color */
    display: block;
    /* Make the links appear below each other */
    padding: 12px;
    /* Add some padding */
    text-decoration: none;
    /* Remove underline from links */
}

.vertical-menu a:hover {
    background-color: #66CC99;
    /* Dark grey background on mouse-over */
}

.vertical-menu a.active {
    background-color: #66CC99;
    /* Add a green color to the "active/current" link */
    color: white;
}





* {box-sizing: border-box}
body {font-family: TH SarabunPSK;}

.navbar {
  width: auto;
  background-color: #04AA6D;
  overflow: auto;
}

.navbar a {
  float: left;
  padding: 12px;
  color: white;
  text-decoration: none;
  font-size: 17px;
  width: 250px; /* Four links of equal widths */
  text-align: center;
}

.navbar a:hover {
  background-color: #BEBEBE;
}

.navbar a.active {
  background-color:#BEBEBE;
}

@media screen and (max-width: 500px) {
  .navbar a {
    float: none;
    display: block;
    width: 100%;
    text-align: left;
  }
}
</style>

<body>

    <!-- <div class="row">
        <div class="col-sm-2">

            <div class="vertical-menu">
                <a href="http://localhost/project/performance.php">ผลงาน</a>
                <a href="http://localhost/project/addfile_tch.php">เพิ่มผลงานอาจารย์</a>
                <a href="http://localhost/project/addfile_std.php">เพิ่มผลงานนิสิต</a>
                <a href="#">แก้ไขผลงาน</a>
                <a href="http://localhost/project/deletefile.php">ลบผลงาน</a>
            </div>
        </div>
    </div> -->



    <div class="navbar">
  <a href="http://localhost/project/home.php"><i class="fa fa-fw fa-home"></i> หน้าหลัก</a> 
  <a href="http://localhost/project/addfile_tch.php"><i class="fa fa-plus-square"></i> เพิ่มผลงานอาจารย์</a> 
  <a href="http://localhost/project/addfile_std.php"><i class="fa fa-plus-square"></i> เพิ่มผลงานนิสิต</a> 
  <a href="http://localhost/project/delete.php"><i class="fa fa-pencil-square-o"></i> แก้ไขหรือลบผลงาน</a>
  <a href="http://localhost/project/dashboard.php"><i class="	fa fa-bar-chart"></i> จำนวนผลงาน</a>
  <a href="http://localhost/project/login.php"><i class="fa fa-sign-out"></i> Logout</a>
</div>



</body>

</html>