<?php
// $con= mysqli_connect("localhost","root","","my_website") or die("Error: " . mysqli_error($con));
// mysqli_query($con, "SET NAMES 'utf8' ");

$servername = "localhost";
$username = "root";
$password = ""; 
 
try {
  $conn = new PDO("mysql:host=$servername;dbname=my_website;charset=utf8", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
    date_default_timezone_set('Asia/Bangkok');

?>