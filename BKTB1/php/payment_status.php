<?php
include('.//admin/db.php');

if (isset($_POST['id']) && isset($_POST['payment_status'])) {
    $bookingId = $_POST['id'];
    $newStatus = $_POST['payment_status'];

    // Thực hiện truy vấn để cập nhật trạng thái thanh toán
    $sql = "UPDATE booked_rooms SET payment_status = '$payment_status' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Trạng thái thanh toán đã được cập nhật thành công.";
    } else {
        echo "Lỗi cập nhật trạng thái thanh toán: " . $conn->error;
    }
} else {
    echo "Dữ liệu không hợp lệ.";
}

$conn->close();
?>
