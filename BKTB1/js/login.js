document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        event.preventDefault();

        // Gửi dữ liệu đăng nhập đến server
        var formData = new FormData(this);

        fetch(this.action, {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log(data);  // Thêm dòng này để xem dữ liệu trả về trong console log
            if (data.trim() === "admin_success") {
                // Nếu là admin, chuyển hướng đến trang quản trị
                window.location.href = "../php/admin/index.php";
            } else if (data.trim() === "success") {
                // Nếu là người dùng thông thường, chuyển hướng đến trang home.html
                window.location.href = "../html/home.html";
            } else {
                // Nếu có lỗi, hiển thị thông báo từ server
                alert(data);
            }
        })
        .catch(error => console.error('Error:', error));
    });
});
