<?php 
    session_start();
    include('server.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>

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
    
    <div class="header">
        <h1>สมัครสมาชิก</h1>
    </div>

    <form action="portfolio_web.php" method="post">
        <?php include('errors.php'); ?>
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
            <h3><label for="email">อีเมล์</label></h3>
            <input type="email" name="email">
        </div>
        <div class="input-group">
            <h3><label for="password_1">รหัสผ่าน</label></h3>
            <input type="password" name="password_1">
        </div>
        <div class="input-group">
            <h3><label for="password_2">ยืนยันรหัสผ่าน</label></h3>
            <input type="password" name="password_2">
        </div>
        <div class="input-group" align="center">
            <button type="submit" name="reg_user" class="btn">ลงทะเบียน</button>
        </div>
        <h4>เป็นเจ้าหน้าที่อยู่แล้ว? <a href="login.php">เข้าสู่ระบบ</a></h4>
    </form>

</body>
</html>