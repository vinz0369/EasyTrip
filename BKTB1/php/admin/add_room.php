<head>
<head><link rel="stylesheet" href="style.css">

</head>
<?php

include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    // Xử lý upload ảnh (nếu cần)
    $image_path = ''; // Placeholder, modify as needed

    // Thực hiện chèn dữ liệu vào database
    $sql = "INSERT INTO rooms (name, description, price, image_path, status) VALUES ('$name', '$description', $price, '$image_path', '$status')";
    
    if (mysqli_query($conn, $sql)) {
        // Chèn thành công, chuyển hướng về trang chính
        header("Location: index.php");
        exit();
    } else {
        // Xử lý lỗi khi chèn dữ liệu
        echo "Error inserting record: " . mysqli_error($conn);
    }
}
?>
<div class="container">
    <h2>Thêm Phòng Mới</h2>
    <!-- Form thêm phòng -->
    <form method="post" action="" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Tên Phòng:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Mô tả:</label>
            <textarea name="description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="price">Giá:</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="image_path">Ảnh URL:</label>
            <input type="text" name="image_path" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="status">Trạng thái:</label>
            <select name="status" class="form-control" required>
                <option value="available">Có sẵn</option>
                <option value="occupied">Đã thuê</option>
            </select>
        </div>

        <input type="submit" value="Thêm Phòng" class="btn btn-success">
    </form>
</div>

