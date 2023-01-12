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
                    <form enctype="multipart/form-data" action="save_formstd.php" method="POST"
                        enctype="multipart/form-data" name="upfile" id="upfile">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2>แบบฟอร์มเพิ่มข้อมูลผลงานนิสิต</h2>
                            </div>

                            <div class="panel-body">
                                <div class="row">
                                    <form action="save_formstd.php" name="frmAdd" method="post">
                                        <div class="col-md-6">

                                            <!--h3>ข้อมูลนิสิต</h3-->
                                            <label>รหัสนิสิต <font color="#FF0000">*</font></label>
                                            <input class="form-control" name="ids" id="ids" placeholder="รหัสนิสิต"
                                                onchange="readURL1(this);" required onclick="readURL2(this);">
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
                                            <input required id="fullname" type="text" class="form-control  mr-sm-2"
                                                name="fullname" placeholder="ชื่อ-นามสกุล">

                                            <label>ชั้นปี <font color="#FF0000">*</font></label>
                                            <select required id="ชั้นปี" name="years" class="form-control"
                                                placeholder="ชั้นปี" readonly="">
                                                <option value="-" selected="">เลือก</option>
                                                <option value="ปีที่ 1">ปีที่ 1</option>
                                                <option value="ปีที่ 2">ปีที่ 2</option>
                                                <option value="ปีที่ 3">ปีที่ 3</option>
                                                <option value="ปีที่ 4">ปีที่ 4</option>
                                            </select>

                                            <label class="control-label" for="inputSuccess">อาจารย์ที่ปรึกษา <font
                                                    color="#FF0000">*</font></label>
                                            <input required type="text" class="form-control" name="tchname" id="tchname"
                                                placeholder="ชื่อ-นามสกุล">

                                            <label class="control-label" for="inputSuccess">อีเมล์ <font
                                                    color="#FF0000">*</font></label>
                                            <input required type="text" class="form-control" name="email" id="email"
                                                placeholder="example@example.com">

                                                

                                        </div>

                                        <div class="col-md-6">

                                        <label class="mc_default">ภาคการศึกษา <font color="#FF0000">*</font>
                                            </label>
                                            <select id="semester" name="semester" class="form-control"
                                                placeholder="ภาคการศึกษา" readonly="" required>
                                                <option value="-" selected="">เลือก</option>
                                                <option value="ภาคต้น">ภาคต้น</option>
                                                <option value="ภาคปลาย">ภาคปลาย</option>
                                            </select>

                                        <label class="mc_default">ปีการศึกษา <font color="#FF0000">*</font>
                                            </label>
                                            <select id="yearstd" name="yearstd" class="form-control"
                                                placeholder="ภาคการศึกษา" readonly="" required>
                                                <option value="-" selected="">เลือก</option>
                                                <option value="2564">2564</option>
                                                <option value="2565">2565</option>
                                            </select>

                                            <label class="control-label" for="inputSuccess">ชื่อผลงาน <font
                                                    color="#FF0000">
                                                    *</font></label>
                                            <input required id="performance" type="text" class="form-control  mr-sm-2"
                                                name="performance" placeholder="ชื่อผลงาน">

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

                                            <!-- <label>รายละเอียดของผลงาน <font color="#FF0000">*</font></label> -->
                                            <!-- <input required id="name" type="text" class="form-control  mr-sm-2"
                                                name="details" placeholder="รายละเอียด"> -->
                                            <!-- <textarea type="text" class="form-control  mr-sm-2" name="details"
                                            placeholder="รายละเอียด" id="name" cols="50" rows="5"></textarea>
                                            <br /> -->

                                            <!-- <form action="" method="POST" enctype="multipart/form-data">
                                                <label>ไฟล์ภาพผลงาน <font color="red">*อัพโหลดได้เฉพาะ .jpg / .jpeg
                                                        /
                                                        .png เท่านั้น สามารถเลือกได้หลายรูป </font></label>
                                                <input type="file" name="upload[]" multiple="multiple" require>
                                            </form> -->
                                            <br />

                                            <form action="" method="post" enctype="multipart/form-data">
                                            <label>ไฟล์ผลงาน <font color="red">*อัพโหลดได้เฉพาะ .pdf </font></label>
                                                <input type="text" name="doc_name"  class="form-control"
                                                    placeholder="ชื่อเอกสาร"> <br>
                                                <input type="file" name="doc_file"  
                                                    accept="application/pdf"> <br>
                                            </form> 

                                            <input class="btn btn-success" type="submit" name="submit" value="Upload">
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