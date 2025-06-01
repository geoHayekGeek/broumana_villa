<?php
$host = 'localhost';  
$dbname = 'broumana_villa'; 
$user = 'root';   
$pass = '';  

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");

?>
