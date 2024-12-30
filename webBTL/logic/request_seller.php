<?php
include '../includes/db.php';
$idd = $_POST['UserId'];

$sql = "UPDATE Users SET `Role` = 'Seller' WHERE `UserId` = '$idd'";
if (mysqli_query($conn, $sql)) {

    echo "<script>alert('Chuyển người dùng thành người bán thành công'); location.reload();</script>";
    header('Location: ../pages/profile.php');
    exit();
}
