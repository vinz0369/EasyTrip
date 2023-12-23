
<link rel="stylesheet" href="../css/home.css">
<link rel="stylesheet" href="../css/booknow.css">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<script src="../js/session_check.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">




</head>
<?php

include('./admin/db.php');
$sql = "SELECT * FROM rooms";
$result = $conn->query($sql);


$sql = "SELECT * FROM rooms";
$result = $conn->query($sql);

// Check for errors in query execution
if (!$result) {
    die("Error in SQL query: " . $conn->error);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách khách sạn</title>
    <!-- ... your existing head content ... -->
</head>
<body>
<header>
    

		<nav id="navbar">
			<div class="container">
				<h1 class="logo"><a href="../html/home.html">EASY STAY</a></h1>
				<ul>
					<li><a class="nav-link current" href="#" data-href="../html/home.html">TRANG CHỦ</a></li>
					<li><a class="nav-link" href="#" data-href="contact.html">LIÊN HỆ</a></li>
					<li><a class="nav-link" href="#" data-href="login.html">PHÒNG CỦA TÔI</a></li>
					<li><a class="nav-link-login" href="#" data-href="login.html">ĐĂNG NHẬP</a></li>
					<li><a class="nav-link-logout"href="../php/logout.php">ĐĂNG XUẤT</a></li>

					
				</ul>
			</div>
		</nav>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Khách sạn</h6>
                <h1 class="mb-5">Khám phá <span class="text-primary text-uppercase">Phòng</span></h1>
            </div>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
            <div class="modal fade" id="datePickerModal" tabindex="-1" role="dialog" aria-labelledby="datePickerModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="datePickerModalLabel">Chọn Ngày</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Thêm thẻ form bên trong modal body -->
<div class="modal-body">
    <form id="bookingForm" method= "post" action="./book_room.php" onsubmit="return confirmBooking()" >
        <div class="form-group">
            <label for="checkinDate">Ngày Check-in</label>
            <input type="text" class="form-control datepicker" id="checkinDate" name="checkinDate" readonly>
        </div>
        <div class="form-group">
            <label for="checkoutDate">Ngày Check-out</label>
            <input type="text" class="form-control datepicker" id="checkoutDate" name="checkoutDate" readonly>
        </div>
        <input type="hidden" id="room_id" name="room_id" value="">
        <button type="submit" class="btn btn-primary">Xác Nhận</button>
    </form>
</div>

            </div>
        </div>
    </div>
    <?php
    // Loop through the database results and dynamically generate HTML
    while ($row = $result->fetch_assoc()) {
        $room_id = $row['id'];
        echo '<div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">';
        echo '<div class="room-item shadow rounded overflow-hidden">';
        echo '<div class="position-relative">';
        echo '<img class="img-fluid" src="' . $row['image_path'] . '" alt="">';
        echo '<small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">$' . $row['price'] . '/Night</small>';
        echo '</div>';
        echo '<div class="p-4 mt-2">';
        echo '<div class="d-flex justify-content-between mb-3">';
        echo '<h5 class="mb-0">' . $row['name'] . '</h5>';
        echo '<div class="ps-2">';
        echo '</div>';
        echo '</div>';
        echo '<div class="d-flex mb-3">';
        echo '</div>';
        echo '<p class="text-body mb-3">' . $row['description'] . '</p>';
        echo '<div class="d-flex justify-content-between">';
        echo '<button type="button" class="btn btn-sm btn-dark rounded py-2 px-4" onclick="confirmBooking(' . $room_id . ')">Đặt phòng</button>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    ?>  
            </div>
        </div>
    </div>
    <script>
   


   function confirmBooking(room_id) {
    // Kiểm tra xem room_id có tồn tại không
    if (room_id !== undefined) {
        // Cập nhật giá trị room_id trước khi mở modal
        $('#room_id').val(room_id);
        console.log('room_id:', room_id);

        // Xử lý logic xác nhận đặt phòng
        alert('Đặt phòng đã được xác nhận!');
        $('#datePickerModal').modal('hide');
        return false;
    } else {
        console.error('room_id is undefined');
    }
}

    $(document).ready(function () {
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });

        // Sử dụng sự kiện click cho tất cả các nút đặt phòng
        $(document).on('click', '.btn-dark', function() {
            $('#datePickerModal').modal('show');
        });
    });
    
</script>

    <!-- ... your existing footer ... -->
</body>
</html>



<?php
// Close the connection
$conn->close();
?>