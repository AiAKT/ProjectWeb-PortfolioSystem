<?php
$servername = "localhost";
$dbname = "my_website";
$username = "root";
$password = "";
try{
    $conn = new PDO("mysql:host=$servername;dbname=my_website", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $exception){
    echo "connection fail :".$exception->getMessage();
    exit();
}