<?php 
ini_set('display_errors', 1);
error_reporting(~0);

$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbName = "my_website";

$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

echo '<pre>';
print_r($_GET);
echo '</pre>';

echo '<pre>';
var_dump($_GET);
echo '</pre>';

//delete ข้อมูลออกจาก url $_GET
$id = $_GET['id'];
// echo $id;

$sql = "DELETE tb_addtch , tbl_pdf_tch FROM tb_addtch INNER JOIN tbl_pdf_tch ON tb_addtch.fileID = tbl_pdf_tch.fileID WHERE tb_addtch.fileID = '{$id}' ";


$result = mysqli_query($conn,$sql) or die("error in 
            sql : $mysql". mysqli_error($mysql));


mysqli_close($conn);
// echo $sql;
// echo '<hr>';

if($result){
    echo"<script type='text/javascript'>";
        // echo "alert('ลบข้อมูลสำเร็จ');";
        echo "window.location = 'delete_tch.php';";
    echo "</script>";
}else{
    echo"<script type='text/javascript'>";
        echo "alert('ลบข้อมูลไม่สำเร็จสำเร็จ');";
        echo "window.location = 'delete_tch.php';";
    echo "</script>";
}
?>