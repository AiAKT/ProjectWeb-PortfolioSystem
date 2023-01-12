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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.10/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.17.1/axios.min.js"></script>





</head>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: 0;
}

body {
    font-size: 16px;
    font-family: TH SarabunPSK;
    /* background-color: #F2F3F4; */
    /* color: #273746; */
}

.container {
    margin: 20px auto;
    padding: 0;
    width: 980px;
}

h1 {
    margin-top: 20px;
    margin-bottom: 20px;
}

table {
    width: 100%;
    /* ผสาน border ระหว่าง table กับ td  */
    border-collapse: collapse;
}

table,
td {
    /* border: 1px solid #5D6D7E; */
    text-align: center;
}


thead {
    background-color: #273746;
    color: #BDC3C7;
}

/* Striped Tables: ทำไฮไล์ในการแบ่ง row  */
tr:nth-child(even) {
    background-color: #BDC3C7;
}

td {
    height: 30px;
    vertical-align: center;
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

/*-------------------- search menu -------------------------*/
* {
    box-sizing: border-box;
}

#myInput {
    background-image: url('/css/searchicon.png');
    background-position: 10px 10px;
    background-repeat: no-repeat;
    width: 100%;
    font-size: 16px;
    padding: 12px 20px 12px 40px;
    border: 1px solid #ddd;
    margin-bottom: 12px;
}

#myTable {
    border-collapse: collapse;
    width: auto;
    border: 1px solid #ddd;
    font-size: 14px;
}

#myTable th,
#myTable td {
    padding: 12px;
    text-align: center;
}

#myTable tr {

    border-bottom: 1px solid #ddd;
}

#myTable tr.header {
    background-color: #f1f1f1;
}
</style>

<body>

    <!-- <div>icon head</div> -->
    <div class="row" style="background-color:#F5F5F5; width:auto;">
        <?php
      echo '<img src="/img/headku.png" id="icon" alt="ku Icon" width="550" style ="margin-top:20px; margin-left:20px; ">';  
    ?>
    </div>


    <div class="row">
        <?php include("tapbar.php");?>
        <div class="alert alert-success" style="width:auto;">
            <strong>
                <h1 style="text-align:center;">ผลงานนิสิต</h1>
            </strong>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2 col-md-offset-1" class="dropdown">
            <button onclick="myFunction()" class="dropbtn">Select page <i class=" fa fa-sort-down"></i></button>
            <div id="myDropdown" class="dropdown-content">
                <a href="http://localhost/project/home.php">ผลงานนิสิต</a>
                <a href="http://localhost/project/home_tch.php">ผลงานอาจารย์</a>
            </div>
        </div>

        <div class="col-md-2 ">
            <input class="form-control" type="text" id="myInput" onkeyup="myFunctionSearch()"
                placeholder="ค้นหา ชื่อ-นามสกุล">
        </div>

        <div class="col-md-2 ">
            <input class="form-control" type="text" id="myInputId" onkeyup="myFunctionSearchId()"
                placeholder="ค้นหา รหัสนิสิต">
        </div>

        <div class="col-md-1 ">
            <select id="select"  class="form-control" placeholder="ภาคการศึกษา" onclick="myFunctionSearchId1()" >
                <option value="-" selected="">ภาค</option>
                <option value="ต้น">ภาคต้น</option>
                <option value="ปลาย">ภาคปลาย</option>
            </select>
        </div>

        <div class="col-md-2 ">
            <select id="selectYear"  class="form-control" placeholder="ปีการศึกษา" onclick="myFunctionSearchYears()" >
                <option value="-" selected="">ปีการศึกษา</option>
                <option value="2564">2564</option>
                <option value="2565">2565</option>
            </select>
        </div>
    </div>
    <br />


    <!-- <div>ช่องกรอกข้อมูล</div> -->
    <!-- <div class="row">
        <form class="form-inline my-2 my-lg-0" action="" method="post" style="margin-top:20px; margin-left:50px;">
            <div class="col-sm-8">
                <input style="margin-right:20px;" id="name" type="text" class="form-control  mr-sm-2"
                    name="ชื่อ-นามสกุล" placeholder="ชื่อ-นามสกุล">

                <input style="margin-right:20px;" id="userid" type="text" class="form-control  mr-sm-2" name="รหัสนิสิต"
                    placeholder="รหัสนิสิต">

                <input style="margin-right:20px;" id="date" type="date" class="form-control  mr-sm-2"
                    name="วัน/เดือน/ปี" placeholder="วัน/เดือน/ปี">

                <input id="performance" type="text" class="form-control  mr-sm-2" name="ชื่อผลงาน"
                    placeholder="ชื่อผลงาน">
            </div>

            
            <div class="col-sm-1">
                <button style="float: right;" type="submit" class="btn btn-success">ค้นหา</button>
            </div>

        </form>
    </div>
    <br/> -->



    <!-- <div>ผลงานที่1</div> -->
    <div class="row" class="container">
        <div class="col-md-1"></div>
        <div class="col-md-10">

            <table id="myTable" class="table table-striped  table-responsive table-bordered">
                <thead>
                    <tr>
                        <td width="9%">รหัสนิสิต</td>
                        <td width="8%">คำนำหน้าชื่อ</td>
                        <td width="15%">ชื่อ-นามสกุล</td>
                        <td width="15%">อาจารย์ที่ปรึกษา</td>
                        <td width="5%">ชั้นปี</td>
                        <td width="10%">อีเมล์</td>
                        <td width="10%">ชื่อผลงาน</td>
                        <td width="15%">หมวดหมู่</td>
                        <td width="6%">ไฟล์ผลงาน</td>
                        <td width="7%">ภาค</td>
                        <td width="10%">ปีการศึกษา</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                            //คิวรี่ข้อมูลมาแสดงในตาราง
                            require_once 'connect.php';
                            $stmt = $conn->prepare("SELECT pdf.doc_name,pdf.doc_file,home.ids,home.sname,home.fullname,home.years,home.email,home.performance,
                            home.semester,home.yearstd, home.pername, home.tchname,  SUBSTRING_INDEX(home.dateup,' ',1) AS date 
                            FROM `tbl_pdf` AS pdf INNER JOIN tb_addstd AS home ON pdf.fileID = home.fileID ORDER BY home.dateup DESC
                            ");
                            $stmt->execute();
                            $result = $stmt->fetchAll();
                            foreach($result as $row) {
                            ?>
                    <tr>
                        <td><?php echo $row['ids'];?></td>
                        <td><?php echo $row['sname'];?></td>
                        <td><?php echo $row['fullname'];?></td>
                        <td><?php echo $row['tchname'];?></td>
                        <td><?php echo $row['years'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['performance'];?></td>
                        <td><?php echo $row['pername'];?></td>
                        <!-- <td><?= $row['doc_name'];?></td> -->
                        <td><a href="docs/<?php echo $row['doc_file'];?>" target="_blank" class="btn btn-info btn-sm">
                                <i class="	fa fa-folder-open"></i></a></td>
                        <td><?php echo $row['semester'];?></td>
                        <td><?php echo $row['yearstd'];?></td>
                        <?php } ?>

                </tbody>
            </table>

            <!-- <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav> -->

        </div>
    </div>


    <!-- <div>ติดต่อเจ้าหน้าที่</div> -->
    <div class="row">
        <div class="alert alert-success" style="margin-top:20px; width:auto;">
            <strong>
                <h4 style="text-align:center;">คณะวิทยาศาสตร์ ศรีราชา</h4>
                <h4 style="text-align:center;">มหาวิทยาลัยเกษตรศาสตร์ วิทยาเขตศรีราชา</h4>
            </strong>
            <strong>
                <h4 style="text-align:center;">ชั้น 2 อาคารคณะวิทยาศาสตร์ ศรีราชา (อาคาร26)</h4>
                <h4 style="text-align:center;">199 หมู่ที่ 6 ถนนสุขุมวิท ตำบลทุ่งสุขลา</h4>
                <h4 style="text-align:center;">อำเภอศรีราชา ชลบุรี 20230</h4>


            </strong>
            <h4 style="text-align:center;">โทร. 038-3545804 </h4>
        </div>
    </div>




    <script>
    /* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
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



    function myFunctionSearch() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 1; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function myFunctionSearchId() {
        var input, filter, table, tr, td, j, txtValue;
        input = document.getElementById("myInputId");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (j = 1; j < tr.length; j++) {
            td = tr[j].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[j].style.display = "";
                } else {
                    tr[j].style.display = "none";
                }
            }
        }
    }

    function myFunctionSearchId1() {
        var input, filter, table, tr, td, j, txtValue;
        input = document.getElementById("select");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (j = 1; j < tr.length; j++) {
            td = tr[j].getElementsByTagName("td")[9];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[j].style.display = "";
                } else {
                    tr[j].style.display = "none";
                }
            }
        }
    }

    function myFunctionSearchYears() {
        var input, filter, table, tr, td, j, txtValue;
        input = document.getElementById("selectYear");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (j = 1; j < tr.length; j++) {
            td = tr[j].getElementsByTagName("td")[10];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[j].style.display = "";
                } else {
                    tr[j].style.display = "none";
                }
            }
        }
    }
    </script>




</body>

</html>