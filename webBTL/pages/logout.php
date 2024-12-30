<?php
// Bắt đầu phiên làm việc
session_start();

// Xóa tất cả các session
session_unset();

// Hủy phiên làm việc
session_destroy();

// Chuyển hướng người dùng về trang đăng nhập
header('Location: ../index.php');
exit();
?>
