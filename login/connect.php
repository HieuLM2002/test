<?php
$servername = "localhost";
$username = "root";
$password = "badien217";
$dbname = "shop_quanao";
 
// tạo connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// kiểm tra connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
};

?>