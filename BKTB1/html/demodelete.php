<?php
// delete_room.php

// Kiểm tra xem có tham số room_id được chuyển qua không
if (isset($_GET['id'])) {
    // Lấy giá trị room_id từ tham số URL
    $room_id = $_GET['id'];

    // Thực hiện các bước xóa phòng từ giỏ hàng ở đây
    // ...

    // Redirect người dùng về trang giỏ hàng sau khi xóa
    header("Location: cart.php");
    exit();
} else {
    // Nếu không có room_id, quay trở lại trang chủ hoặc trang lỗi
    header("Location: home.html");
    exit();
}
?>
