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
            <a href="/project/home.php" style="margin-right:20px; float: right; margin-top:15px;"
                class="btn btn-danger square-btn-adjust"> <span class="glyphicon glyphicon-circle-arrow-left"></span>
                ย้อนกลับ</a>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div id="page-inner">
                <div class="row">
                    <form enctype="multipart/form-data" action="save_formtch.php" method="POST"
                        enctype="multipart/form-data" name="upfile" id="upfile">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2>แบบฟอร์มเพิ่มข้อมูลผลงานอาจารย์</h2>
                            </div>

                            <div class="panel-body">
                                <div class="row">
                                    <form action="save_formtch.php" name="frmAdd" method="post">
                                        <div class="col-md-6">

                                            <!--h3>ข้อมูลอาจารย์</h3-->
                                            <label class="mc_default">คำนำหน้าชื่อ <font color="#FF0000">*</font>
                                            </label>
                                            <select id="sname" name="sname" class="form-control"
                                                placeholder="คำนำหน้าชื่อ" readonly="" required>
                                                <option value="-" selected="">เลือก</option>
                                                <option value="นาย">นาย</option>
                                                <option value="นาง">นาง</option>
                                                <option value="นางสาว">นางสาว</option>
                                            </select>

                                            <label>ชื่อ-นามสกุล <font color="#FF0000">*</font></label>
                                            <input id="fullname" type="text" class="form-control  mr-sm-2"
                                                name="fullname" required placeholder="ชื่อ-นามสกุล">

                                            <label>ตำแหน่ง <font color="#FF0000">*</font></label>
                                            <input id="name" required type="text" class="form-control  mr-sm-2"
                                                name="position" placeholder="ตำแหน่ง">

                                            <label class="control-label" for="inputSuccess">อีเมล์ <font
                                                    color="#FF0000">*</font></label>
                                            <input type="text" required class="form-control" name="email" id="email"
                                                placeholder="example@example.com">

                                            <label class="mc_default">ภาคการศึกษา <font color="#FF0000">*</font>
                                            </label>
                                            <select id="semester" name="semester" class="form-control"
                                                placeholder="ภาคการศึกษา" readonly="" required>
                                                <option value="-" selected="">เลือก</option>
                                                <option value="ภาคต้น">ภาคต้น</option>
                                                <option value="ภาคปลาย">ภาคปลาย</option>
                                            </select>


                                        </div>

                                        <div class="col-md-6">

                                            <label class="mc_default">ปีการศึกษา <font color="#FF0000">*</font>
                                            </label>
                                            <select id="yeartch" name="yeartch" class="form-control"
                                                placeholder="ภาคการศึกษา" readonly="" required>
                                                <option value="-" selected="">เลือก</option>
                                                <option value="2564">2564</option>
                                                <option value="2565">2565</option>
                                            </select>


                                            <label class="control-label" for="inputSuccess">ชื่อผลงาน <font
                                                    color="#FF0000">
                                                    *</font></label>
                                            <input id="performance" type="text" class="form-control  mr-sm-2"
                                                name="performance" required placeholder="ชื่อผลงาน">

                                            <label class="mc_default">หมวดหมู่ผลงาน <font color="#FF0000">*</font>
                                            </label>

                                            <select id="pername" name="pername" class="form-control"
                                                placeholder="หมวดหมู่ผลงาน" readonly="" required>
                                                <option value="-" selected="">เลือก</option>
                                                <option value="ผลงานวิจัย/ตำรา">ผลงานวิจัย/ตำรา</option>
                                                <option value="ผลงานสิ่งประดิษฐ์/นวัตกรรม/IOT">ผลงานสิ่งประดิษฐ์/นวัตกรรม/IOT</option>
                                                <option value="การแข่งตอบปัญหา/เขียนโปรแกรม">การแข่งตอบปัญหา/เขียนโปรแกรม</option>
                                                <option value="การสร้างเว็บไซต์">การสร้างเว็บไซต์</option>
                                            </select>

                                            <!-- <label>รายละเอียดของผลงาน <font color="#FF0000">*</font></label>
                                            <textarea type="text" class="form-control  mr-sm-2" name="details"
                                            placeholder="รายละเอียด" id="name" cols="50" rows="5"></textarea> -->

                                            <!-- <form action="" method="post" enctype="multipart/form-data">
                                                <label>ไฟล์ภาพผลงาน </label>
                                                <input type="file" name="fileupload" id="fileupload" require="image/*">
                                            </form> -->
                                            <br />

                                            <form action="" method="post" enctype="multipart/form-data">
                                                <label>ไฟล์ผลงาน <font color="red">*อัพโหลดได้เฉพาะ .pdf </font></label>
                                                <input type="text" name="doc_name" class="form-control"
                                                    placeholder="ชื่อเอกสาร"> <br>
                                                <input type="file" name="doc_file" accept="application/pdf"> <br>
                                            </form>

                                            <!-- <form action="" method="POST" enctype="multipart/form-data">
                                                <label>ไฟล์ภาพผลงาน <font color="#FF0000">*</font> jpg / jpeg / png <font color="#FF0000">*</font> </label>
                                                <input type="file" name="upload[]"  multiple="multiple" require="image/*">
                                            </form>
                                            <br/> -->

                                            <input class="btn btn-success" type="submit" name="submit" value="upload">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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