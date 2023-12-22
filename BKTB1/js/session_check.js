
	document.addEventListener('DOMContentLoaded', function() {
  var buttons = document.querySelectorAll('.nav-link');

  buttons.forEach(function(button) {
    button.addEventListener('click', function(event) {
      event.preventDefault();
      var targetUrl = this.getAttribute('data-href');
      window.location.href = targetUrl;
    });
  });

  // Sự kiện click cho nút đăng nhập
  document.querySelector('.nav-link-login').addEventListener('click', function(event) {
    event.preventDefault();
    var targetUrl = this.getAttribute('data-href');
    window.location.href = targetUrl;

    // Kiểm tra trạng thái đăng nhập sau khi nhấn nút đăng nhập
    checkLoginStatus();
  });

  // Kiểm tra trạng thái đăng nhập khi trang tải
  checkLoginStatus();

  function checkLoginStatus() {
    // Gửi yêu cầu kiểm tra đăng nhập đến máy chủ
    fetch('../php/check_login_status.php')
      .then(response => response.text())
      .then(data => {
        console.log('Login Status:', data); // Kiểm tra giá trị trả về từ máy chủ

        // Nếu đăng nhập, ẩn nút "Đăng nhập"
        if (data === "logged_in") {
          console.log('User is logged in.');
          document.querySelector('.nav-link-login').style.display = 'none';
          document.querySelector('.nav-link-logout').style.display = 'block'; // Hiện nút "Đăng xuất"
        } else {
          // Nếu chưa đăng nhập, ẩn nút "Đăng xuất"
          console.log('User is not logged in.');
          document.querySelector('.nav-link-logout').style.display = 'none';
        }
      })
      .catch(error => console.error('Error:', error));
  }
});


  