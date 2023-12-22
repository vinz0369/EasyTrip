<?php
$conn = new mysqli("127.0.0.1", "root", "", "mydb");

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

?>
