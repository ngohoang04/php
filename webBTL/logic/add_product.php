<?php
include '../includes/db.php';
// Kiểm tra xem form đã được submit hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $sellerId = $_POST['UserId'];
    $productName = $_POST['product-name'];
    $productPrice = $_POST['product-price'];
    $productQuantity = $_POST['product-number'];
    $productDescription = $_POST['product-description'];

    // Lấy ngày tạo (sử dụng ngày hiện tại nếu không có giá trị)
    $productDate = $_POST['product-date'] ? $_POST['product-date'] : date('Y-m-d H:i:s');

    // Xử lý hình ảnh
    $targetDir = "../assets/img/"; // Thư mục lưu trữ hình ảnh
    $targetFile = $targetDir . basename($_FILES["product-image"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Kiểm tra loại tệp tin (chỉ cho phép các loại hình ảnh phổ biến)
    if (in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif', 'webp', 'jpeg'])) {
        if (move_uploaded_file($_FILES["product-image"]["tmp_name"], $targetFile)) {
            // Thêm sản phẩm vào cơ sở dữ liệu
            $sql = "INSERT INTO products (SellerId, ProductName, Description, Price, Quantity, CreatedDate, image_url) 
                    VALUES ('$sellerId','$productName', '$productDescription', '$productPrice', '$productQuantity', '$productDate', '$targetFile')";

            if ($conn->query($sql) === TRUE) {
                echo "Sản phẩm đã được thêm thành công.";
                header('Location:../pages/profile.php');
            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Có lỗi khi tải lên hình ảnh.";
        }
    } else {
        echo "Chỉ chấp nhận các định dạng hình ảnh JPG, JPEG, PNG, GIF, WEBP, JPEG.";
    }
}

// Đóng kết nối
$conn->close();
