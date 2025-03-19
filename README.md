# 🌐 EasyTrip - Ứng Dụng Đặt HomeStay

## 🚀 Giới Thiệu
EasyTrip là một ứng dụng web đặt phòng du lịch hiệu quả với nhiều phương thức thanh toán đa dạng như chuyển khoản , paypal,...

## 📂 Cấu Trúc Thư Mục
```
📂 BKTB1
├── 📂 css         
├── 📂 html       
├── 📂 js           
├── 📂 php         
└── README.md
```

## 🛠 Cài Đặt
### 1. Clone repository
```bash
git clone https://github.com/vinz0369/EasyTrip.git
cd EasyTrip/BKTB1
```

### 2. Cài đặt môi trường máy chủ
- Đảm bảo bạn đã cài đặt [XAMPP](https://www.apachefriends.org/index.html) hoặc phần mềm máy chủ web tương tự.
- Đặt thư mục `BKTB1` vào thư mục `htdocs` của XAMPP.

### 3. Cấu hình cơ sở dữ liệu
- Khởi động Apache và MySQL từ bảng điều khiển XAMPP.
- Truy cập [phpMyAdmin](http://localhost/phpmyadmin/) và tạo một cơ sở dữ liệu mới, ví dụ: `easytrip_db`.
- Import tệp SQL (nếu có) vào cơ sở dữ liệu này.

### 4. Cấu hình tệp kết nối cơ sở dữ liệu
- Trong thư mục `php/`, tìm và mở tệp chứa thông tin kết nối cơ sở dữ liệu (ví dụ: `config.php`).
- Cập nhật thông tin kết nối cho phù hợp với cấu hình của bạn:
```php
<?php
$host = 'localhost';
$db   = 'easytrip_db';
$user = 'root';
$pass = '';
// Các thông số khác
?>
```
