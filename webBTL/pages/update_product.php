<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f9;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 20px;
    }

    form {
      background: #fff;
      border: 1px solid #ddd;
      border-radius: 10px;
      padding: 20px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    form div {
      margin-bottom: 15px;
    }

    form p {
      font-size: 14px;
      color: #555;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="file"],
    input[type="hidden"],
    input[type="submit"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 5px;
      box-sizing: border-box;
      font-size: 14px;
      outline: none;
    }

    input[type="text"]:focus,
    input[type="file"]:focus {
      border-color: #007bff;
    }

    input[type="submit"] {
      background: #007bff;
      color: #fff;
      border: none;
      cursor: pointer;
      font-size: 16px;
    }

    input[type="submit"]:hover {
      background: #0056b3;
    }
  </style>

</head>

<body>
  <?php
  include '../includes/db.php';
  $id = $_GET['id'];
  $sql = "select * from products where SellerId = '$id'";
  $result = mysqli_query($conn, $sql);
  $student = mysqli_fetch_assoc($result);
  $idd = $student['SellerId'];
  $idp = $student['ProductId'];
  ?>
  <form action="../logic/update_product.php" method="POST" enctype="multipart/form-data">
    <h2>Cập nhật thông tin</h2>
    <input type="hidden" name="id" value="<?php echo $row['UserId']; ?>" />
    <input type="hidden" name="productId" value="<?php echo $idp; ?>" />
    <div>
      <p>Tên sản phẩm</p>
      <input type="text" name="tensanpham">
    </div>
    <div>
      <p>Giá</p>
      <input type="text" name="gia">
    </div>
    <div>
      <p>Số lượng</p>
      <input type="text" name="soluong">
    </div>
    <div>
      <p>Mô tả</p>
      <input type="text" name="mota">
    </div>
    <div>
      <!-- Xử lý thêm ảnh -->
      <p>Ảnh sản phẩm</p>
      <input type="file" name="fileToUpload" id="fileToUpload">
    </div>
    <div style="margin-top: 20px">
      <input type="submit" value="Cập nhật">
    </div>
  </form>
</body>

</html>