
    <?php

	//1. เชื่อมต่อ database: 
  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
	ini_set('display_errors', 1);
	error_reporting(~0);

	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "my_website";

	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

	$sql = "INSERT INTO tb_addtch (sname, fullname, position, email, performance, pername, semester, yeartch) 
		VALUES ('".$_POST["sname"]."','".$_POST["fullname"]."'
		,'".$_POST["position"]."','".$_POST["email"]."','".$_POST["performance"]."','".$_POST["pername"]."'
        ,'".$_POST["semester"]."','".$_POST["yeartch"]."'
        )";

	$query = mysqli_query($conn,$sql);

	// if($query) {
	// 	echo "Record add successfully";
	// 

	mysqli_close($conn);




	//-------------------------------------------อัพโหลดหลายรูป---------------------------------
	

    // require_once 'connection.php';
    // if(isset($_POST['submit'])){
    
        //วิธีที่3
    //     foreach($_FILES['upload']['tmp_name'] as $key => $value){
    //         $file_names = $_FILES['upload']['name']; 
    //         $extension = strtolower(pathinfo($file_names[$key], PATHINFO_EXTENSION));
    //         $supported = array('jpg','jpeg','png','gif');
    //         if( in_array($extension,$supported)){
    //             //$new_name = rand(0,microtime(true)).$file_names[$key];
    
    //             $new_name = rand(0,microtime(true)).'.'.$extension;
    //             if(move_uploaded_file($_FILES['upload']['tmp_name'][$key], "fileuploadtch/".$new_name)){
    //                 $sql = "INSERT INTO images_tch (image, product_id)
    //                     VALUES ( :image, 1)";
    
    //                 $stme = $conn->prepare($sql);
    //                 $params = array(
    //                     'image' => $new_name,
    //                 );
    //                 $stme->execute($params);
    //             }
    //             echo 'บันทึกไฟล์เรียบร้อย';
    //         } else{
    //             echo 'ไม่สามารถอัพโหลดไฟล์ '.$extension .' ได้กรุณาลองอีกครั้ง';
    //         }
    
    //     }
    // }


    // -------------------------อัพไฟล์เอกสาร---------------------------------

    if (isset($_POST['doc_name'])) {
        require_once 'connect.php';
         //สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ใหม่
        $date1 = date("Ymd_His");
        //สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
        $numrand = (mt_rand());
        $doc_file = (isset($_POST['doc_file']) ? $_POST['doc_file'] : '');
        $upload=$_FILES['doc_file']['name'];
     
        //มีการอัพโหลดไฟล์
        if($upload !='') {
        //ตัดขื่อเอาเฉพาะนามสกุล
        $typefile = strrchr($_FILES['doc_file']['name'],".");
     
        //สร้างเงื่อนไขตรวจสอบนามสกุลของไฟล์ที่อัพโหลดเข้ามา
        if($typefile =='.pdf'){
     
        //โฟลเดอร์ที่เก็บไฟล์ **สร้างไฟล์ index.php หรือ index.html (ไม่ต้องมี code) ไว้ในโฟลเดอร์ด้วยนะครับจะได้ป้องกันการเข้าถึงทุกไฟล์ในโฟลเดอร์
        $path="docs_tch/";
        //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
        $newname = 'doc_'.$numrand.$date1.$typefile;
        $path_copy=$path.$newname;
        //คัดลอกไฟล์ไปยังโฟลเดอร์
        move_uploaded_file($_FILES['doc_file']['tmp_name'],$path_copy); 
     
         //ประกาศตัวแปรรับค่าจากฟอร์ม
        $doc_name = $_POST['doc_name'];
        
        //sql insert
        $stmt = $conn->prepare("INSERT INTO tbl_pdf_tch (doc_name, doc_file)
        VALUES (:doc_name, '$newname')");
        $stmt->bindParam(':doc_name', $doc_name, PDO::PARAM_STR);
        $result = $stmt->execute();
        $conn = null; //close connect db
        //เงื่อนไขตรวจสอบการเพิ่มข้อมูล
                if($result){
                    echo '<script>
                         setTimeout(function() {
                          swal({
                              title: "อัพโหลดไฟล์สำเร็จ",
                              type: "success"
                          }, function() {
                              window.location = "addfile_std.php"; //หน้าที่ต้องการให้กระโดดไป
                          });
                        }, 1000);
                    </script>';
                }else{
                   echo '<script>
                         setTimeout(function() {
                          swal({
                              title: "เกิดข้อผิดพลาด",
                              type: "error"
                          }, function() {
                              window.location = "addfile_std.php"; //หน้าที่ต้องการให้กระโดดไป
                          });
                        }, 1000);
                    </script>';
                } //else ของ if result
     
            
            }else{ //ถ้าไฟล์ที่อัพโหลดไม่ตรงตามที่กำหนด
                echo '<script>
                             setTimeout(function() {
                              swal({
                                  title: "คุณอัพโหลดไฟล์ไม่ถูกต้อง",
                                  type: "error"
                              }, function() {
                                  window.location = "addfile_std.php"; //หน้าที่ต้องการให้กระโดดไป
                              });
                            }, 1000);
                        </script>';
            } //else ของเช็คนามสกุลไฟล์
       
        } // if($upload !='') {

    }

    if($result){
        echo "<script type='text/javascript'>";
        echo "alert('บันทึกสำเร็จ');";
        echo "window.location = 'addfile_tch.php'; ";
        echo "</script>";
    }
    else{
        echo "<script type='text/javascript'>";
        echo "alert('บันทึกไม่สำเร็จ');";
        echo "window.location = 'addfile_tch.php'; ";
        echo "</script>";
    }  

//--------------------------------- upload รูป---------------------------

// $fileupload = (isset($_POST['fileupload']) ? $_POST['fileupload'] : '');
// //ฟังก์ชั่นวันที่
// date_default_timezone_set('Asia/Bangkok');
// $date = date("Ymd");	
// //ฟังก์ชั่นสุ่มตัวเลข
// $numrand = (mt_rand());
// //เพิ่มไฟล์
// $upload=$_FILES['fileupload'];
// if($upload != '') {   //not select file
// 	//โฟลเดอร์ที่จะ upload file เข้าไป 
// 	$path="fileuploadtch/";  

// 	//เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
// 	$type = strrchr($_FILES['fileupload']['name'],".");
		
// 	//ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
// 	$newname = $date.$numrand.$type;
// 	$path_copy=$path.$newname;
// 	$path_link="fileupload/".$newname;

// 	//คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
// 	move_uploaded_file($_FILES['fileupload']['tmp_name'],$path_copy);  	
// }
// // เพิ่มไฟล์เข้าไปในตาราง uploadfile

// 	$sql = "INSERT INTO uploadfile_tch (fileupload) 
// 	VALUES('$newname')";
	
// 	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . 
// 	mysqli_error());

// mysqli_close($con);
// javascript แสดงการ upload file

?>