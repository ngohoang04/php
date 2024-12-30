<?php
include '../includes/db.php';
    $id=$_GET['user_id'];
    $idp=$_GET['product_id'];
    $sql="DELETE FROM products WHERE SellerId = '$id' AND ProductId = '$idp'";

    mysqli_query($conn, $sql);
    header('location: ../pages/profile.php');
?>