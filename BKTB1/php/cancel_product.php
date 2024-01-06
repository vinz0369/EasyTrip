<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy id sản phẩm cần hủy từ yêu cầu POST
    $email = $_POST["email"];


    include('./cart.php');
}
?>
