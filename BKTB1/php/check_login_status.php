<?php
session_start();

// Kiểm tra xem có phiên đăng nhập nào đang tồn tại hay không
if (isset($_SESSION["email"])) {
    // Nếu đã đăng nhập, trả về "logged_in"
    echo "logged_in";
} else {
    // Nếu chưa đăng nhập, trả về "not_logged_in"
    echo "not_logged_in";
}
?>
