<?php
// Kết nối đến CSDL (thay đổi thông tin kết nối theo máy chủ của bạn)
include('./admin/db.php');

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$booking_id = $_POST['booking_id'];

// Thực hiện xóa dữ liệu từ CSDL
$sql = "DELETE FROM bookings WHERE booking_id = $booking_id";

if ($conn->query($sql) === TRUE) {
    echo "Booking canceled successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Đóng kết nối CSDL
$conn->close();
?>
