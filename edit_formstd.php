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

</head>

<body>
    <?php
    
        $serverName = "localhost";
        $userName = "root";
        $userPassword = "";
        $dbName = "my_website";
        $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
        
        $id = $_GET['id'];
        //echo $id;
        $mysql = "SELECT * FROM `tbl_pdf` INNER JOIN tb_addstd ON tbl_pdf.fileID = tb_addstd.fileID WHERE tbl_pdf.fileID = $id";
        $result = mysqli_query($conn,$mysql) or die("error in 
            sql : $mysql". mysqli_error($sql));
        $row = mysqli_fetch_array($result);



    ?>


    <div style="background-color:#F5F5F5; width:auto;">
        <?php
      echo '<img src="/img/headku.png" id="icon" alt="ku Icon" width="550" style ="margin-top:20px; margin-left:20px; ">';  
    ?>
    </div>

    <div class="row">
        <?php include("tapbar.php");?>
    </div>

    <div class="row">
        <div class="col-sm">
            <a href="/project/delete.php" style="margin-right:20px; float: right; margin-top:15px;"
                class="btn btn-danger square-btn-adjust"> <span class="glyphicon glyphicon-circle-arrow-left"></span>
                ย้อนกลับ</a>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div id="page-inner">
                <div class="row">
                    <form enctype="multipart/form-data" action="edit_std_db.php" method="POST"
                        enctype="multipart/form-data" name="upfile" id="upfile">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2>แบบฟอร์มแก้ไขข้อมูลผลงานนิสิต</h2>
                            </div>

                            <div class="panel-body">
                                <div class="row">
                                    <form action="save_formstd.php" name="frmAdd" method="post">
                                        <div class="col-md-6">


                                            <!--h3>ข้อมูลนิสิต</h3-->
                                            <label>รหัสนิสิต <font color="#FF0000">*</font></label>
                                            <input class="form-control" name="ids" id="ids" placeholder="รหัสนิสิต"
                                                onchange="readURL1(this);" required value="<?php echo $row['ids'];?>"
                                                onclick="readURL2(this);"><br/>

                                            <label class="mc_default">คำนำหน้าชื่อ (นาย , นาง , นางสาว)<font color="#FF0000">*</font>
                                            </label>

                                            <input required value="<?php echo $row['sname'];?>" id="sname"
                                                type="text" class="form-control  mr-sm-2" name="sname"
                                                placeholder="คำนำหน้าชื่อ"> <br/>

                                            <label>ชื่อ-นามสกุล <font color="#FF0000">*</font></label>
                                            <input required value="<?php echo $row['fullname'];?>" id="fullname"
                                                type="text" class="form-control  mr-sm-2" name="fullname"
                                                placeholder="ชื่อ-นามสกุล"><br/>

                                            <label>ชั้นปี (ปีที่ 1 , ปีที่ 2 , ปีที่ 3 , ปีที่ 4 ,)<font color="#FF0000">*</font></label>
                                            <input required value="<?php echo $row['years'];?>" id="years"
                                                type="text" class="form-control  mr-sm-2" name="years"
                                                placeholder="ปีที่"> <br/>

                                            <label class="control-label" for="inputSuccess">อาจารย์ที่ปรึกษา <font
                                                    color="#FF0000">*</font></label>
                                            <input required type="text" value="<?php echo $row['tchname'];?>" class="form-control" name="tchname" id="tchname"
                                                placeholder="ชื่อ-นามสกุล"> <br/>

                                            <label class="control-label" for="inputSuccess">อีเมล์ <font
                                                    color="#FF0000">*</font></label>
                                            <input value="<?php echo $row['email'];?>" required type="text"
                                                class="form-control" name="email" id="email"
                                                placeholder="example@example.com"> <br/>

                                                <label class="mc_default">ภาคการศึกษา (ภาคต้น - ภาคปลาย) <font color="#FF0000">*</font>
                                            </label>
                                            <input value="<?php echo $row['semester'];?>" required id="semester"
                                                type="text" class="form-control  mr-sm-2" name="semester"
                                                placeholder="ภาคการศึกษา">

                                        </div>

                                        <div class="col-md-6">

                                        

                                                <label class="control-label" for="inputSuccess">ปีการศึกษา <font
                                                    color="#FF0000">*</font></label>
                                                    <input value="<?php echo $row['yearstd'];?>" required id="yearstd"
                                                type="text" class="form-control  mr-sm-2" name="yearstd"
                                                placeholder="ปีการศึกษา"> <br/>
                                            
                                                <label class="control-label" for="inputSuccess">ชื่อผลงาน <font
                                                    color="#FF0000">
                                                    *</font></label>
                                            <input value="<?php echo $row['performance'];?>" required id="performance"
                                                type="text" class="form-control  mr-sm-2" name="performance"
                                                placeholder="ชื่อผลงาน"> <br/>

                                            <label class="mc_default">หมวดหมู่ผลงาน <font color="#FF0000">*</font>
                                            </label>
                                            <option >- ผลงานวิจัย / ตำรา</option>
                                                <option >- ผลงานสิ่งประดิษฐ์ / นวัตกรรม / IOT</option>
                                                <option >- การแข่งตอบปัญหา / เขียนโปรแกรม</option>
                                                <option >- การสร้างเว็บไซต์</option>
                                            <input value="<?php echo $row['pername'];?>" required id="pername"
                                                type="text" class="form-control  mr-sm-2" name="pername"
                                                placeholder="หมวดหมู่ผลงาน">
                                                

                                            <!-- <label>รายละเอียดของผลงาน <font color="#FF0000">*</font></label> -->
                                            <!-- <input required id="name" type="text" class="form-control  mr-sm-2"
                                                name="details" placeholder="รายละเอียด"> -->
                                            <!-- <input required value="<?php echo $row['details'];?>" type="text"
                                                class="form-control  mr-sm-2" name="details" placeholder="รายละเอียด"
                                                id="name" cols="50" rows="5">
                                            <br /> -->

                                            <br />

                                            <form action="" method="post" enctype="multipart/form-data">
                                            <label>ชื่อไฟล์เอกสาร<font color="#FF0000">*</font> </label>
                                                </label>
                                                <input type="text" name="doc_name" class="form-control"
                                                    value="<?php echo $row['doc_name'];?>" placeholder="ชื่อเอกสาร">

                                                <br>
                                                <!-- <input type="file" name="doc_file"
                                                    value="" accept="application/pdf">
                                                <br> -->
                                            </form>

                                            <input type="hidden" name="fileID" value="<?php echo $row['fileID'];?>">



                                            <input class="btn btn-success" type="submit" name="submit" value="save">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- <div>ติดต่อเจ้าหน้าที่</div> -->
        <div class="row"></div>
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

</body>

</html>