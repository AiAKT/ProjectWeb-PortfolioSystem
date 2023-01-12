<?php
    session_start();
    include('server.php'); 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <link rel="stylesheet" href="style.css">
</head>

<style>
body {
    background-image: url('../img/2.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    font-family: TH SarabunPSK;
}
</style>
</body>

<body>

    <div class="row">
        <div class="col-sm">
            <a href="/project/home_user_std.php" style="margin-left:20px; float: left;;"
                class="btn btn-danger square-btn-adjust"> <span class="glyphicon glyphicon-circle-arrow-left"></span>
                กลับหน้าหลัก</a>
        </div>
    </div>

    <div class="header">
        <h1>เข้าสู่ระบบ</h1>
    </div>

    <form action="login_db.php" method="post">
        <?php if (isset($_SESSION['error'])) : ?>
        <div class="error">
            <h3>
                <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
            </h3>
        </div>
        <?php endif ?>
        <div class="input-group">
            <h3><label for="username">ชื่อผู้ใช้งาน</label></h3>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <h3><label for="password">รหัสผ่าน</label></h3>
            <input type="password" name="password">
        </div>
        <div class="input-group" align="center">
            <button type="submit" name="login_user" class="btn">เข้าสู่ระบบ</button>
        </div>
        <h4 style="text-align: center;"><font color="#FF0000">*</font> สามารถเข้าสู่ระบบได้เฉพาะเจ้าหน้าที่ <font color="#FF0000">*</font></h4>

        <!-- <h4>สมัครสมาชิก (สำหรับเจ้าหน้าที่) <a href="register.php">ลงทะเบียน</a></h4> -->
    </form>


</body>

</html>