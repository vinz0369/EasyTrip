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
                    <th>Payment Status</th> <!-- Thêm cột trạng thái thanh toán -->
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
                <td>
                    <select class="paymentStatus" data-booking-id="' . $row['id'] . '">
                        <option value="unpaid" ' . ($row['payment_status'] == 'unpaid' ? 'selected' : '') . '>Chưa thanh toán</option>
                        <option value="paid" ' . ($row['payment_status'] == 'paid' ? 'selected' : '') . '>Đã thanh toán</option>
                    </select>
                </td>
                <td><button class="confirmPaymentBtn" data-booking-id="' . $row['id'] . '">Xác nhận</button></td>

            </tr>';
    }

    echo '</tbody></table>';
} else {
    echo "Không có đơn đặt phòng nào.";
}

$conn->close();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    // Thêm sự kiện onchange cho ô chọn Payment Status
$(".paymentStatus").change(function() {
    var bookingId = $(this).data("id");
    var newStatus = $(this).val();

    // Hiển thị nút xác nhận
    $(this).next('.confirmPaymentBtn').show();
});

// Thêm sự kiện click cho nút Xác nhận
$(".confirmPaymentBtn").click(function() {
    var bookingId = $(this).data("booking-id");
    var newStatus = $(this).prev('.paymentStatus').val();

    $.ajax({
        type: "POST",
        url: "/php/payment_status.php",
        data: { booking_id: bookingId, new_status: newStatus },
        success: function(response) {
            alert(response);
        },
        error: function(error) {
            console.log("Error:", error);
        }
    });
});

</script>
