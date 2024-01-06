<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: home.html");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['room_id'])) {
    $email = $_SESSION['email'];
    $room_id = $_POST['room_id'];

    include('./admin/db.php');
    error_log('POST data: ' . print_r($_POST, true));
    echo "MySQL Error: " . $conn->error; 


    $checkinDate = DateTime::createFromFormat('d/m/Y', $_POST['checkinDate']);
    $checkoutDate = DateTime::createFromFormat('d/m/Y', $_POST['checkoutDate']);
    
    // Chuyển định dạng ngày
    $checkinDateFormatted = $checkinDate ? $checkinDate->format('Y-m-d') : null;
    $checkoutDateFormatted = $checkoutDate ? $checkoutDate->format('Y-m-d') : null;
    


    // Truy vấn INSERT sử dụng trường email
    $stmt = $conn->prepare("INSERT INTO booked_rooms (email, room_id, checkinDate, checkoutDate) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siss", $email, $room_id, $checkinDateFormatted, $checkoutDateFormatted);


    if ($stmt->execute()) {
        $conn->commit();
        $stmt->close();
        $conn->close();

        header("Location:../html/cart.html ");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

$stmt->close();

    $conn->close();
}
?>
