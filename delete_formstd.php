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

$sql = "DELETE tb_addstd , tbl_pdf FROM tb_addstd INNER JOIN tbl_pdf ON tb_addstd.fileID = tbl_pdf.fileID WHERE tb_addstd.fileID = '{$id}' ";
// $sql = "DELETE FROM tb_addstd AS home INNER JOIN tbl_pdf AS pdf ON home.fileID = pdf.fileID  WHERE 'fileID' = $id ";

//$sql = "DELETE r1, r2 FROM table1 r1 INNER JOIN table2 r2  ON r1.id = r2.id WHERE r1.id = '{$id}' ";



// DELETE FROM CUSTOMERS WHERE ID = 6;



// DELETE T1, T2
// FROM T1
// INNER JOIN T2 ON T1.key = T2.key
// WHERE condition;

$result = mysqli_query($conn,$sql) or die("error in sql : $mysql". mysqli_error($mysql));


mysqli_close($conn);
// echo $sql;
// echo '<hr>';
echo '<pre>';
print_r($_COOKIE);
echo '</pre>';

if($result){
    echo"<script type='text/javascript'>";
        // echo "alert('ลบข้อมูลสำเร็จ');";
        echo "window.location = 'delete.php';";
    echo "</script>";
}else{
    echo"<script type='text/javascript'>";
        echo "alert('ลบข้อมูลไม่สำเร็จสำเร็จ');";
        echo "window.location = 'delete.php';";
    echo "</script>";
}
?>