<head>    <head><link rel="stylesheet" href="style.css">
</head>
<?php

include('db.php');
$id_to_update = $_GET['id']; // Lấy id từ database trước để tránh bị trùng lặp và gặp lỗi tất cả dữ liệu bị sửa theo

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $name = $_POST['name'];
    $price = $_POST['price']; 
    $description = $_POST['description'];
    $image_path = $_POST['image_path'];
    $status = $_POST['status'];
    

    // Thực hiện cập nhật dữ liệu vào database
    $sql = "UPDATE rooms SET name='$name', description='$description', price=$price, image_path='$image_path', status='$status'WHERE id = $id_to_update";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Cập nhật thành công, chuyển hướng về trang chính
        header("Location: index.php");
        exit();
    } else {
        // Xử lý lỗi khi cập nhật dữ liệu
        echo "Error updating record: " . mysqli_error($conn);
    }
}

// Truy vấn để lấy dữ liệu hiện tại từ database
$query = "SELECT * FROM rooms WHERE id = $id_to_update";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Đóng kết nối cơ sở dữ liệu
mysqli_close($conn);

?>

<div class="container">
    <h2>Sửa Thông Tin Phòng</h2>
    <!-- Form sửa thông tin phòng -->
    <form method="post" action="">
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

        <input type="submit" value="Lưu Thay Đổi" class="btn btn-warning">
    </form>
</div>
