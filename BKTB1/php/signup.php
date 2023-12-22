<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Kết nối đến cơ sở dữ liệu
    $conn = new mysqli("127.0.0.1", "root", "", "mydb");

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Thực hiện truy vấn để thêm người dùng mới
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Đăng ký thành công";
    } else {
        echo "Đăng ký thất bại: " . $conn->error;
    }

    // Đóng kết nối
    $conn->close();
}
?>
