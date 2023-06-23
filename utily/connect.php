<?php
$servername = 'localhost';
$username = 'root';
$password = 'badien217';
$dbname ='shop_quanao';
 
// tạo kết nối
$conn = mysqli_connect($servername, $username, $password,$dbname);
 
// kiểm tra kết nối
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>