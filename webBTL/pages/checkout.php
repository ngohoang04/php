
<?php
session_start();
if (empty($_SESSION['cart'])) {
    echo "Giỏ hàng trống. Vui lòng thêm sản phẩm vào giỏ hàng.";
    exit;
}

// Xử lý thanh toán (lưu trữ đơn hàng vào cơ sở dữ liệu, giảm số lượng sản phẩm, v.v.)
echo "Thanh toán thành công!";
?>
