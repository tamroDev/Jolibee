<?php
// File: view/xuly.php

// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jolibee";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Kiểm tra xem yêu cầu là POST và tồn tại dữ liệu số lượng và ID sản phẩm
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['quantity']) && isset($_POST['productId'])) {
    // Lấy giá trị số lượng và ID sản phẩm từ yêu cầu
    $newQuantity = $_POST['quantity'];
    $productId = $_POST['productId'];

    // Thực hiện cập nhật số lượng trong cơ sở dữ liệu
    $sql = "UPDATE carts SET quantity = $newQuantity WHERE idProduct = $productId";

    if ($conn->query($sql) === TRUE) {
        // Trả về thông báo thành công
        echo "Cập nhật số lượng thành công!";
    } else {
        // Trả về thông báo lỗi nếu có lỗi trong quá trình cập nhật
        echo "Lỗi: " . $conn->error;
    }
} else {
    // Trả về thông báo lỗi nếu không có dữ liệu hợp lệ
    echo "Lỗi: Dữ liệu không hợp lệ!";
}

// Đóng kết nối
$conn->close();
?>