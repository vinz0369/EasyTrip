document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('signupForm').addEventListener('submit', function(event) {
        event.preventDefault();

        // Kiểm tra các điều kiện đăng ký (độ dài mật khẩu, định dạng email, v.v.) nếu cần

        // Gửi dữ liệu đăng ký đến server
        var formData = new FormData(this);

        fetch(this.action, {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            alert(data); // Hiển thị thông báo từ server
        })
        .catch(error => console.error('Error:', error));
    });
});
