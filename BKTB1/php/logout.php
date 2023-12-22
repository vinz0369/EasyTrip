<?php
session_start();

// Hủy bỏ session và chuyển hướng về trang chủ
session_destroy();
header("Location: ../html/home.html");
exit();
?>
