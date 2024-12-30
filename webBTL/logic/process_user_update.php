<?php
include '../includes/db.php'; // Kết nối cơ sở dữ liệu

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nhận dữ liệu từ form
    $id = $_POST['UserId'];
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];

    // Kiểm tra dữ liệu (có thể bổ sung kiểm tra chi tiết hơn)
    if (empty($fullname) || empty($email)) {
        die("Vui lòng điền đầy đủ thông tin.");
    }

    // Câu lệnh SQL cập nhật
    $sql = "UPDATE users SET 
            `Username` = '$username',
            `FullName` = '$fullname',
            `Email` = '$email',
            `Address` = '$address',
            `Gender` = '$gender',
            `DateOfBirth` = '$date_of_birth'
            WHERE `UserId` = $id";

    // Thực thi câu lệnh SQL
    if (mysqli_query($conn, $sql)) {
        echo "Cập nhật thành công!";
        header("Location: ../pages/profile.php");
        exit();
    } else {
        echo "Lỗi khi cập nhật hồ sơ: " . mysqli_error($conn);
    }
}
?>
