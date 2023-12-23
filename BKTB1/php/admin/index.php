    <head><link rel="stylesheet" href="style.css">
</head>
    <h2>Quản lý Phòng Khách Sạn</h2>
    <a href="add_room.php" class="btn btn-primary">Thêm Phòng</a>
    <a href="booked.php?id=' . $row['id'] . '" class="btn btn-info">Xem Đặt Phòng</a>

    <?php include('room_list.php'); ?>
