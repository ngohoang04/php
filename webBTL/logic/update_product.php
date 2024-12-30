<?php
include('../includes/db.php');

// Kiểm tra nếu tất cả các trường đều có dữ liệu
if (!empty($_POST['tensanpham']) && !empty($_POST['gia']) && !empty($_POST['soluong']) && !empty($_POST['mota'])) {
    $idProduct = $_POST['productId'];
    $hoTen = $_POST['tensanpham'];
    $gia = $_POST['gia'];
    $soluong = $_POST['soluong'];
    $mota = $_POST['mota'];

    // Xử lý ảnh
    $target_dir = "../assets/img/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Kiểm tra xem file ảnh có hợp lệ không
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File không phải là ảnh.";
            $uploadOk = 0;
        }
    }

    // Kiểm tra kích thước file
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "File quá lớn.";
        $uploadOk = 0;
    }

    // Kiểm tra định dạng file ảnh
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "webp") {
        echo "Chỉ những file JPG, JPEG, PNG, WEBP & GIF mới được chấp nhận.";
        $uploadOk = 0;
    }

    // Nếu ảnh hợp lệ, tiếp tục xử lý
    if ($uploadOk == 0) {
        echo "File của bạn chưa được tải lên.";
    } else {
        // Kiểm tra nếu ảnh đã được tải lên
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $image_path = $target_file;

            // Cập nhật sản phẩm với ảnh mới
            $sql = "UPDATE `products` 
                    SET `ProductName` = '$hoTen', 
                        `Price` = '$gia', 
                        `Quantity` = '$soluong', 
                        `Description` = '$mota', 
                        `image_url` = '$image_path' 
                    WHERE `ProductId` = '$idProduct'";

            // Thực hiện câu lệnh SQL
            if (mysqli_query($conn, $sql)) {
                header('Location: ../pages/profile.php');
            } else {
                echo "Lỗi khi cập nhật sản phẩm: " . mysqli_error($conn);
            }
        } else {
            echo "Có lỗi khi tải ảnh lên.";
        }
    }
} else {
    echo "Vui lòng điền đầy đủ thông tin.";
}
