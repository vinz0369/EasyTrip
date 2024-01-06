<!-- get_cart_info.php -->
<?php
session_start();

if (!isset($_SESSION['email'])) {
    echo "Vui lòng đăng nhập để xem giỏ hàng.";
} else {
    $email = $_SESSION['email'];
    
    include('./admin/db.php');

    $sql = "SELECT booked_rooms.*, rooms.name as room_name, rooms.price, rooms.description, rooms.image_path
            FROM booked_rooms
            JOIN rooms ON booked_rooms.room_id = rooms.id
            WHERE booked_rooms.email = '$email'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Tên Phòng</th>
                        <th>Giá</th>
                        <th>Mô Tả</th>
                        <th>Ảnh</th>
                        <th>Check-in Date</th>
                        <th>Check-out Date</th>
                        <th>Số Ngày Ở</th>
                        <th>Tổng Giá</th>
                    </tr>
                </thead>
                <tbody>';
                

        while ($row = $result->fetch_assoc()) {
            $checkinDate = strtotime($row['checkindate']);
            $checkoutDate = strtotime($row['checkoutdate']);
            $daysStayed = ceil(($checkoutDate - $checkinDate) / (60 * 60 * 24)); // Số ngày ở

            $totalPrice = $row['price'] * $daysStayed;

            echo '<tr>
                    <td>' . $row['id'] . '</td>
                    <td>' . $row['email'] . '</td>
                    <td>' . $row['room_name'] . '</td>
                    <td>' . $row['price'] . '</td>
                    <td>' . $row['description'] . '</td>
                    <td><img src="' . $row['image_path'] . '" alt="Room Image" style="max-width: 100px;"></td>
                    <td>' . $row['checkindate'] . '</td>
                    <td>' . $row['checkoutdate'] . '</td>
                    <td>' . $daysStayed . '</td>
                    <td>' . $totalPrice . '</td>
                    <td><button class="cancelBookingBtn" data-booking-id="' . $row['id'] . '">Hủy Đặt Phòng</button></td>
                </tr>';
        }
        echo "<script>var totalprice = '$totalPrice';</script>";

        echo '</tbody></table>';
        
    } else {
        echo "Bạn chưa đặt phòng nào.";
    }

    $conn->close();
}
?>
