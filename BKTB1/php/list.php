
<link rel="stylesheet" href="../css/home.css">
<link rel="stylesheet" href="/css/booknow.css">
<link rel="stylesheet" href="../css/booknow.css">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<script src="../js/session_check.js"></script>



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
					<li><a class="nav-link current" href="#" data-href="home.html">TRANG CHỦ</a></li>
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
                <?php
                // Loop through the database results and dynamically generate HTML
                while ($row = $result->fetch_assoc()) {
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
                    echo '<a class="btn btn-sm btn-primary rounded py-2 px-4" href="#">Xem chi tiết</a>';
                    echo '<a class="btn btn-sm btn-dark rounded py-2 px-4" href="#">Đặt phòng</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>

    <!-- ... your existing footer ... -->
</body>
</html>

<?php
// Close the connection
$conn->close();
?>