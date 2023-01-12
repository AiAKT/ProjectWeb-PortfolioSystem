<?php 
ini_set('display_errors', 1);
error_reporting(~0);

$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbName = "my_website";

$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

$sname = $_POST['sname'];
$fullname = $_POST['fullname'];
$position = $_POST['position'];
$email = $_POST['email'];
$performance = $_POST['performance'];
// $details = $_POST['details'];
$doc_name = $_POST['doc_name'];
$id = $_POST['fileID'];

// $date1 = date("Ymd_His");
//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
// $numrand = (mt_rand());
// $doc_file = (isset($_POST['doc_file']) ? $_POST['doc_file'] : '');
// $upload=$_FILES['doc_file']['name'];


$sql = "UPDATE `tbl_pdf_tch` INNER JOIN tb_addtch 
    ON tbl_pdf_tch.fileID = tb_addtch.fileID
    SET tb_addtch.sname = '$sname',
        tb_addtch.fullname = '$fullname',
        tb_addtch.position = '$position',
        tb_addtch.email = '$email',
        tb_addtch.performance = '$performance',
        -- tb_addtch.details = '$details',
        tbl_pdf_tch.doc_name = '$doc_name'
    WHERE tbl_pdf_tch.fileID = $id AND
        tb_addtch.fileID = $id";


    $result = mysqli_query($conn,$sql) or die("error in 
        sql : $mysql". mysqli_error($mysql));


// $sql = "UPDATE tb_addstd SET ids='$ids', 
//                             sname='$sname', 
//                             fullname='$fullname', 
//                             years='$years',
//                             email='$email', 
//                             performance='$performance',
//                             details='$details' 
//                             WHERE fileID=$id ";

// $result = mysqli_query($conn,$sql) or die("error in 
//             sql : $mysql". mysqli_error($mysql));


mysqli_close($conn);
// echo $sql;
// echo '<hr>';

if($result){
    echo"<script type='text/javascript'>";
        echo "alert('แก้ไขข้อมูลสำเร็จ');";
        echo "window.location = 'delete_tch.php';";
    echo "</script>";
}else{
    echo"<script type='text/javascript'>";
        echo "alert('แก้ไขข้อมูลไม่สำเร็จสำเร็จ');";
        echo "window.location = 'delete_tch.php';";
    echo "</script>";
}

?>