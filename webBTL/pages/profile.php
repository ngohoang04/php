<?php
// Bắt đầu phiên làm việc
session_start();
include('../includes/db.php');
if (!isset($_SESSION['user'])) {
  // Nếu người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập
  header("Location: login.php");
  exit();
}

// Lấy thông tin role từ session
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Hồ Sơ Của Tôi</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      font-family: "Arial", sans-serif;
      box-sizing: border-box;
    }

    body {
      background-color: #f0f0f0;
    }

    .body {
      display: flex;
      min-height: 100vh;
    }

    .trai {
      background-color: #f5f5f5;
      width: 25%;
      padding: 20px;
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }

    .profile-section {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .avatar {
      width: 70px;
      height: 70px;
      border-radius: 50%;
      margin-right: 15px;
      border: 2px solid #ddd;
    }

    .details {
      display: flex;
      flex-direction: column;
    }

    .name {
      font-size: 18px;
      font-weight: bold;
      color: #333;
    }

    .edit {
      font-size: 14px;
      color: #007bff;
      cursor: pointer;
    }

    .edit:hover {
      text-decoration: underline;
    }

    .menu {
      margin-top: 20px;
    }

    .menu li {
      list-style: none;
      padding: 10px 0;
      font-size: 16px;
      color: #444;
      cursor: pointer;
      border-bottom: 1px solid #eee;
    }

    .menu li:hover {
      color: #007bff;
    }

    .phai {
      width: 75%;
      padding: 30px;
      background-color: #ffffff;
      box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1);
    }

    .phai p:first-child {
      font-size: 22px;
      font-weight: bold;
      color: #333;
      margin-bottom: 5px;
    }

    .phai p:nth-child(2) {
      font-size: 16px;
      color: #666;
      margin-bottom: 20px;
    }

    .main {
      display: flex;
      gap: 20px;
      margin-top: 20px;
    }

    .box1 {
      width: 70%;
    }

    .content-section {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      background-color: #ffffff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      margin-top: 50px;
    }

    /* Hồ sơ của tôi */
    form {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      font-size: 14px;
      font-weight: bold;
      color: #333;
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    select {
      width: 100%;
      padding: 8px;
      font-size: 14px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .edit-link {
      font-size: 14px;
      color: #007bff;
      text-decoration: none;
    }

    .gender {
      display: flex;
      align-items: center;
    }

    .gender input[type="radio"] {
      margin-right: 10px;
    }

    .gender label {
      margin-right: 50px;
    }

    .birth-date select {
      width: 30%;
      padding: 8px;
      font-size: 14px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .box2 {
      width: 30%;
      text-align: center;
    }

    .avatar-preview {
      margin-bottom: 20px;
    }

    .avatar-preview img {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      border: 3px solid #ddd;
      margin-top: 50px;
    }

    .upload-btn {
      background-color: #007bff;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
      margin-bottom: 15px;
    }

    .box2 p {
      font-size: 14px;
      color: #555;
    }

    .box2 p br {
      margin-bottom: 5px;
    }

    .save-btn {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }


    /* Đổi mật khẩu */
    .change-password-form {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      text-align: center;
    }

    .change-password-form h2 {
      font-size: 20px;
      color: #333;
      margin-bottom: 20px;
    }

    .change {
      margin-bottom: 20px;
    }

    label {
      font-size: 14px;
      font-weight: bold;
      color: #333;
      display: block;
      margin-bottom: 5px;
    }

    input[type="password"] {
      width: 100%;
      padding: 10px;
      font-size: 14px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    /* Đăng kí bán hàng */
    h2 {
      text-align: center;
      color: #333;
    }

    .register-form {
      display: flex;
      flex-direction: column;
    }

    .register {
      margin-bottom: 15px;
    }

    .register label {
      font-size: 14px;
      color: #333;
      margin-bottom: 5px;
    }

    .register input,
    .register textarea,
    .register select {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .form-buttons {
      display: flex;
      justify-content: space-between;
    }

    /* Đăng bán sản phẩm */
    .form-group textarea {
      width: 100%;
      height: 100px;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    /* Quản lý sản phẩm + Quản lý người dùng */
    .content-section {
      font-family: Arial, sans-serif;
      padding: 20px;
      background-color: #f9f9f9;
      border: 1px solid #ddd;
      border-radius: 8px;
      max-width: 800px;
      margin: 20px auto;
    }

    .content-section h2 {
      text-align: center;
      color: #333;
      margin-bottom: 20px;
    }

    .product-table {
      width: 100%;
      border-collapse: collapse;
      margin: 0 auto;
    }

    .product-table th,
    .product-table td {
      border: 1px solid #ddd;
      padding: 12px;
      text-align: center;
    }

    .product-table th {
      background-color: #f4f4f4;
      color: #555;
    }

    .product-table tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    .product-table tr:hover {
      background-color: #f1f1f1;
    }

    .edit-btn {
      color: #007bff;
      text-decoration: none;
    }

    .edit-btn:hover {
      text-decoration: underline;
    }

    .delete-btn {
      color: black;
      text-decoration: none;
    }

    .delete-btn:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div class="body">
    <!-- Menu Bên Trái -->
    <div class="trai">
      <?php
      $ten = $_SESSION['user'];
      $sql = "Select * from users where `Username` = '$ten' ";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_array($result)) {
        $idd = $row['UserId'];

      ?>
        <div class="profile-section">
          <img class="avatar" src="<?php echo $row['Avatar'] ?>" alt="Avatar" />
          <div class="details">
            <div class="name"><?php echo $row['FullName']; ?></div>

          </div>
        </div>

        <div>
          <h3 style="font-size: 18px; color: #333; margin: 10px 0">
            Tài Khoản Của Tôi
          </h3>
          <ul class="menu">
            <li>Hồ Sơ</li>
            <li>Đổi Mật Khẩu</li>
            <?php if ($role == 'User'): ?>
              <li>Đăng Kí Bán Hàng</li>

            <?php endif; ?>

            <?php if ($role == 'Seller'): ?>
              <li>Sell</li>
              <li>Quản Lý Sản Phẩm</li>
            <?php endif; ?>
            <?php if ($role == 'Admin'): ?>
              <li>Quản Lý Người Dùng</li>
            <?php endif; ?>
            <li><a href="../index.php" style="text-decoration: none;color:#444;">Trở lại</a></li>
          </ul>
        </div>
    </div>

    <!-- Nội Dung Bên Phải -->
    <div class="phai">
      <div id="profile-content" class="content-section">
        <p>Hồ Sơ Của Tôi</p>

        <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
        <hr />
        <form action="../logic/process_user_update.php" method="POST">
          <input type="hidden" name="UserId" value="<?php echo $row['UserId']; ?>" />
          <div class="form-group">
            <label for="username">Tên đăng nhập</label>
            <input type="text" id="username" name="username" value="<?php echo $row['Username']; ?>" />
          </div>
          <div class="form-group">
            <label for="name">Tên</label>
            <input type="text" id="name" name="fullname" value="<?php echo $row['FullName']; ?>" />
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $row['Email']; ?>" />
          </div>
          <div class="form-group">
            <label>Địa chỉ</label>
            <input type="text" name="address" value="<?php echo $row['Address']; ?>" />
          </div>
          <div class="form-group">
            <label>Giới tính</label>
            <div class="gender">
              <input type="radio" name="gender" id="male" value="Nam" <?php echo ($row['Gender'] == 'Nam') ? 'checked' : ''; ?> />
              <label for="male">Nam</label>
              <input type="radio" name="gender" id="female" value="Nữ" <?php echo ($row['Gender'] == 'Nữ') ? 'checked' : ''; ?> />
              <label for="female">Nữ</label>
              <input type="radio" name="gender" id="other" value="Khác" <?php echo ($row['Gender'] == 'Khác') ? 'checked' : ''; ?> />
              <label for="other">Khác</label>
            </div>
          </div>
          <div class="form-group">
            <label>Ngày sinh</label>
            <input type="date" name="date_of_birth" value="<?php echo $row['DateOfBirth']; ?>" />
          </div>
          <button type="submit" class="save-btn">Lưu</button>
        </form>

      </div>
      <div
        id="change-password-content"
        class="content-section"
        style="display: none">
        <form class="change-password-form" action="../logic/resetPass.php" method="POST">

          <input type="hidden" name="UserId" value="<?php echo $row['UserId']; ?>" />
          <h2>Đổi Mật Khẩu</h2>

          <div class="change">
            <label for="current-password">Mật khẩu hiện tại</label>
            <input
              type="password"
              id="current-password"
              name="current-password"
              placeholder="Nhập mật khẩu hiện tại"
              required />
          </div>

          <div class="change">
            <label for="new-password">Mật khẩu mới</label>
            <input
              type="password"
              id="new-password"
              name="new-password"
              placeholder="Nhập mật khẩu mới"
              required />
          </div>

          <div class="change">
            <label for="confirm-password">Xác nhận mật khẩu mới</label>
            <input
              type="password"
              id="confirm-password"
              name="confirm-password"
              placeholder="Xác nhận mật khẩu mới"
              required />
          </div>

          <button type="submit" class="save-btn">Lưu thay đổi</button>
        </form>
      </div>

      <!-- Đăng kí bán hàng -->
      <div
        id="register-sell-content"
        class="content-section"
        style="display: none">
        <h2>Đăng Ký Bán Hàng</h2>
        <form class="register-form" action="../logic/request_seller.php" method="POST">
          <input type="hidden" name="UserId" value="<?php echo $row['UserId']; ?>" />


          <div class="register">
            <button type="submit" class="save-btn">Đăng Ký</button>
          </div>
        </form>
      </div>

      <!-- Đăng Bán Sản Phẩm -->
      <div id="sell" class="content-section" style="display: none">
        <h2>Đăng Bán Sản Phẩm</h2>
        <form action="../logic/add_product.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="UserId" value="<?php echo $row['UserId']; ?>" />
          <div class="form-group">
            <label for="product-image">Hình ảnh sản phẩm</label>
            <div class="upload-box">
              <input type="file" name="product-image" id="product-image" />
            </div>
          </div>

          <div class="form-group">
            <label for="product-name">Tên sản phẩm</label>
            <input
              type="text"
              id="product-name"
              name="product-name"
              placeholder="Nhập tên sản phẩm" />
          </div>

          <div class="form-group">
            <label for="product-price">Giá</label>
            <input
              type="text"
              id="product-price"
              name="product-price"
              placeholder="Nhập giá sản phẩm" />
          </div>

          <div class="form-group">
            <label for="product-number">Số lượng</label>
            <input
              type="text"
              id="product-number"
              name="product-number"
              placeholder="Nhập số lượng" />
          </div>

          <div class="form-group">
            <label for="product-date">Ngày tạo</label>
            <input
              type="date"
              id="product-date"
              name="product-date"
              placeholder="Ngày tạo" />
          </div>

          <div class="form-group">
            <label for="product-description">Mô tả sản phẩm</label>
            <textarea
              id="product-description"
              name="product-description"
              placeholder="Nhập mô tả sản phẩm"></textarea>
          </div>

          <div class="form-buttons">
            <button type="button" class="save-btn">Hủy</button>
            <button type="submit" class="save-btn">Lưu & Hiển thị</button>
          </div>
        </form>
      </div>

      <!-- Quản lý sản phẩm -->
      <div id="manage-products-content" class="content-section" style="display: none">
        <h2>Quản Lý Sản Phẩm</h2>
        <table class="product-table">
          <thead>
            <tr>

              <th>Tên Sản Phẩm</th>
              <th>Giá</th>
              <th>Số Lượng</th>

              <th>Chức Năng</th>
            </tr>
          </thead>
          <?php
          $sql = "Select * from products where SellerId = '$idd'";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_array($result)) {
            $idp = $row['ProductId'];

          ?>
            <tbody>
              <tr>
                <td><?php echo $row['ProductName']; ?></td>
                <td><?php echo $row['Price']; ?></td>
                <td><?php echo $row['Quantity']; ?></td>


                <td>
                  <?php if (isset($idd)) {
                    echo '<a class="update" href="update_product.php?id=' . $idd . '">Cập nhật</a>';
                  } else {
                    echo 'Không có dữ liệu UserId.';
                  } ?>
                  <?php
                  // Kiểm tra nếu biến $idd và $idp đã được gán giá trị
                  if (isset($idd) && isset($idp)) {
                    // Tạo liên kết xóa với cả ID người dùng và ID sản phẩm
                    echo '<a class="delete" href="../logic/delete_product.php?user_id=' . $idd . '&product_id=' . $idp . '">Xóa</a>';
                  } else {
                    // Hiển thị thông báo nếu không có dữ liệu UserId hoặc ProductId
                    echo 'Không có dữ liệu ID người dùng hoặc ID sản phẩm.';
                  }
                  ?>
                </td>
              </tr>


            </tbody>
          <?php } ?>
        </table>

      </div>

      <!-- Quản Lý Người Dùng -->
      <div id="manage-people" class="content-section" style="display: none">
        <h2>Quản Lý Người Dùng</h2>
        <table class="product-table">
          <thead>
            <tr>
              <th>Tên Đăng Nhập</th>
              <th>Tên Người Dùng</th>
              <th>Vai Trò</th>
              <th>Chức Năng</th>

            </tr>
          </thead>
          <?php
          $sql = "Select * from users";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_array($result)) {
            $id = $row['UserId'];

          ?>
            <tbody>
              <tr>
                <td><?php echo $row['Username']; ?></td>
                <td><?php echo $row['FullName']; ?></td>
                <td><?php echo $row['Role']; ?></td>

                <td><?php if (isset($idd)) {
                      echo '<a class="update" href="../logic/delete_user.php?id=' . $idd . '">Xóa</a>';
                    } else {
                      echo 'Không có dữ liệu UserId.';
                    } ?></td>
              </tr>
            <?php } ?>
            </tbody>
        </table>
      <?php } ?>
      </div>




    </div>
  </div>

</body>
<script>
  // Danh sách các menu và nội dung liên kết
  // Lấy danh sách menu và nội dung tương ứng
  const menus = [{
      menu: ".menu li:nth-child(1)",
      content: "profile-content"
    },
    {
      menu: ".menu li:nth-child(2)",
      content: "change-password-content"
    },
    {
      menu: ".menu li:nth-child(3)",
      content: "register-sell-content", // Đăng Kí Bán Hàng
      condition: "User" // Chỉ hiển thị nếu vai trò là User
    },
    {
      menu: ".menu li:nth-child(3)",
      content: "sell", // Sell
      condition: "Seller" // Chỉ hiển thị nếu vai trò là Seller
    },
    {
      menu: ".menu li:nth-child(4)",
      content: "manage-products-content", // Quản Lý Sản Phẩm
      condition: "Seller" // Chỉ hiển thị nếu vai trò là Seller
    },
    {
      menu: ".menu li:nth-child(5)",
      content: "manage-users-content", // Quản Lý Người Dùng
      condition: "Admin" // Chỉ hiển thị nếu vai trò là Admin
    }
  ];

  // Vai trò của người dùng (lấy từ PHP)
  const userRole = "<?php echo $role; ?>";

  // Hàm ẩn tất cả nội dung
  function hideAllContent() {
    menus.forEach(item => {
      const contentElement = document.getElementById(item.content);
      if (contentElement) {
        contentElement.style.display = "none";
      }
    });
  }

  // Gắn sự kiện cho từng menu
  menus.forEach((item, index) => {
    // Chỉ gắn sự kiện nếu menu phù hợp với vai trò người dùng
    if (!item.condition || item.condition === userRole) {
      const menuElement = document.querySelector(item.menu);
      const contentElement = document.getElementById(item.content);

      if (menuElement && contentElement) {
        menuElement.addEventListener("click", () => {
          hideAllContent(); // Ẩn tất cả nội dung
          contentElement.style.display = "block"; // Hiển thị nội dung được chọn
        });
      }
    }
  });
</script>


</html>