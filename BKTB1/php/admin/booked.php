
<head>
    <link rel="stylesheet" href="style.css">
</head>
<?php
include('db.php');

// Truy vấn để lấy tất cả các đơn đặt
$sql = "SELECT * FROM booked_rooms";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Room ID</th>
                    <th>Check-in Date</th>
                    <th>Check-out Date</th>
                </tr>
            </thead>
            <tbody>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . $row['id'] . '</td>
                <td>' . $row['email'] . '</td>
                <td>' . $row['room_id'] . '</td>
                <td>' . $row['checkindate'] . '</td>
                <td>' . $row['checkoutdate'] . '</td>
            </tr>';
    }

    echo '</tbody></table>';
} else {
    echo "Không có đơn đặt phòng nào.";
}

$conn->close();
?>
