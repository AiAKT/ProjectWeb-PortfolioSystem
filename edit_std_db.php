<?php 
ini_set('display_errors', 1);
error_reporting(~0);

$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbName = "my_website";

$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

$ids = $_POST['ids'];
$sname = $_POST['sname'];
$fullname = $_POST['fullname'];
$years = $_POST['years'];
$tchname = $_POST['tchname'];
$email = $_POST['email'];
$semester = $_POST['semester'];
$yearstd = $_POST['yearstd'];
$performance = $_POST['performance'];
$pername = $_POST['pername'];
// $details = $_POST['details'];
$doc_name = $_POST['doc_name'];
$id = $_POST['fileID'];

// $date1 = date("Ymd_His");
//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
// $numrand = (mt_rand());
// $doc_file = (isset($_POST['doc_file']) ? $_POST['doc_file'] : '');
// $upload=$_FILES['doc_file']['name'];


$sql = "UPDATE `tbl_pdf` INNER JOIN tb_addstd 
    ON tbl_pdf.fileID = tb_addstd.fileID
    SET tb_addstd.ids = '$ids',
        tb_addstd.sname = '$sname',
        tb_addstd.fullname = '$fullname',
        tb_addstd.years = '$years',
        tb_addstd.tchname = '$tchname',
        tb_addstd.email = '$email',
        tb_addstd.semester = '$semester',
        tb_addstd.yearstd = '$yearstd',
        tb_addstd.performance = '$performance',
        tb_addstd.pername = '$pername',
        -- tb_addstd.details = '$details',
        tbl_pdf.doc_name = '$doc_name'
    WHERE tbl_pdf.fileID = $id AND
            tb_addstd.fileID = $id";


//มีการอัพโหลดไฟล์

// if($upload !='') {
//     require_once 'connect.php';
// //ตัดขื่อเอาเฉพาะนามสกุล
//     $typefile = strrchr($_FILES['doc_file']['name'],".");

//     //สร้างเงื่อนไขตรวจสอบนามสกุลของไฟล์ที่อัพโหลดเข้ามา
//     if($typefile =='.pdf'){

//     //โฟลเดอร์ที่เก็บไฟล์ **สร้างไฟล์ index.php หรือ index.html (ไม่ต้องมี code) ไว้ในโฟลเดอร์ด้วยนะครับจะได้ป้องกันการเข้าถึงทุกไฟล์ในโฟลเดอร์
//         $path="docs/";
//         //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
//         $newname = 'doc_'.$numrand.$date1.$typefile;
//         $path_copy=$path.$newname;
//         //คัดลอกไฟล์ไปยังโฟลเดอร์
//         move_uploaded_file($_FILES['doc_file']['tmp_name'],$path_copy); 

//         //ประกาศตัวแปรรับค่าจากฟอร์ม
        
//         //sql insert
//         $doc_name = $_POST['doc_name'];
            
//             //sql insert
//             $stmt = $conn->prepare("INSERT INTO tbl_pdf (doc_name, doc_file)
//             VALUES (:doc_name, '$newname')");
//             $stmt->bindParam(':doc_name', $doc_name, PDO::PARAM_STR);
//             $result = $stmt->execute();
        
//     }
// }


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
        echo "window.location = 'delete.php';";
    echo "</script>";
}else{
    echo"<script type='text/javascript'>";
        echo "alert('แก้ไขข้อมูลไม่สำเร็จสำเร็จ');";
        echo "window.location = 'delete.php';";
    echo "</script>";
}

?>