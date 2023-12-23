<head>
<link rel="stylesheet" href="style.css">

</head>
<?php
include('db.php');

$sql = "SELECT * FROM rooms";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Phòng</th>
                    <th>Chi Tiết Phòng</th>
                    <th>Ảnh Phòng</th>
                    <th>Tình Trạng</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . $row['id'] . '</td>
                <td>' . $row['name'] . '</td>
                <td>' . $row['description'] . '</td>
                <td><img src="' . $row['image_path'] . '" alt="Room Image" style="max-width: 100px;"></td>
                <td>' . $row['status'] . '</td>
                <td>
                    <a href="edit_room.php?id=' . $row['id'] . '" class="btn btn-warning">Sửa</a>
                    <a href="delete_room.php?id=' . $row['id'] . '" class="btn btn-danger" onclick="return confirm(\'Bạn có chắc chắn muốn xóa phòng này không?\')">Xóa</a>

                    </td>
            </tr>';
    }

    echo '</tbody></table>';
} else {
    echo "Không có phòng nào.";
}

$conn->close();
?>
