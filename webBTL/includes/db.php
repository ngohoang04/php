<?php
$host = "localhost"; // Máy chủ MySQL
$dbname = "shoes_shop"; // Tên cơ sở dữ liệu
$username = "root"; // Tên tài khoản MySQL
$password = ""; // Mật khẩu tài khoản MySQL


$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
function getProducts($productId)
{
    global $conn;
    // Truy vấn với điều kiện WHERE dựa trên ProductId
    $sql = "SELECT ProductId, ProductName, Price, image_url FROM products WHERE ProductId = ?";

    // Chuẩn bị truy vấn
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $productId); // "i" là kiểu số nguyên (integer)
    $stmt->execute();

    // Lấy kết quả
    $result = $stmt->get_result();
    $products = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }
    $stmt->close(); // Đóng statement
    return $products;
}
