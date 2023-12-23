// cart.js
$(document).ready(function () {
    // Lấy thông tin giỏ hàng từ server và hiển thị
    $.ajax({
        url: '../php/cart.php', // Đường dẫn đến script xử lý lấy thông tin giỏ hàng
        method: 'GET',
        dataType: 'html',
        success: function (data) {
            $('#cart-container').html(data);
        },
        error: function () {
            console.error('Lỗi khi lấy thông tin giỏ hàng');
        }
    });
});
