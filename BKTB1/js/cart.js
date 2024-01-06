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
// Thêm sự kiện click cho nút Hủy Đặt Phòng
document.querySelectorAll('.cancelBookingBtn').forEach(function(button) {
    button.addEventListener('click', function() {
        // Lấy ID đặt phòng từ thuộc tính data
        var bookingId = this.getAttribute('data-booking-id');

        // Gửi yêu cầu AJAX để hủy đặt phòng
        $.ajax({
            type: "POST",
            url: "../php/cart.php",
            data: { booking_id: bookingId },
            success: function(response) {
                alert(response);
                location.reload();
            },
            error: function(error) {
                console.log("Error:", error);
            }
        });
    });
});

