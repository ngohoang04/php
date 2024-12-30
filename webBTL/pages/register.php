<?php
// Kết nối database
if (
  !empty($_POST['fullname']) &&
  !empty($_POST['username']) &&
  !empty($_POST['password']) &&
  !empty($_POST['confirm_password']) &&
  !empty($_POST['email']) &&
  !empty($_POST['dob']) &&
  !empty($_POST['hometown']) &&
  !empty($_POST['gender'])
) {

  $hoTen = $_POST['fullname'];
  $tenDangNhap = $_POST['username'];
  $matKhau = $_POST['password'];
  $nhapLai = $_POST['confirm_password'];
  $email = $_POST['email'];
  $dob = $_POST['dob'];
  $queQuan = $_POST['hometown'];
  $gioiTinh = $_POST['gender'];

  if ($matKhau == $nhapLai) {
    include('../includes/db.php');
    $sql = "INSERT INTO `users` (`FullName`, `Username`, `Password`, `Address`, `DateOfBirth`, `Email`, `Gender`) 
                VALUES ('$hoTen', '$tenDangNhap', '$matKhau', '$queQuan', '$dob', '$email', '$gioiTinh');";
    if (mysqli_query($conn, $sql)) {
      header('Location: ../index.php');
    } else {
      $error = "Lỗi khi đăng ký: " . mysqli_error($conn);
    }
  } else {
    $error = "Mật khẩu nhập lại không đúng.";
  }
} else {
  $error = "Vui lòng điền đầy đủ thông tin.";
}
?>

<!-- Giao diện đăng ký -->
<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng Ký</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 40px 0px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .container {
      background: #fff;
      padding: 20px 30px;
      border-radius: 10px;
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
      max-width: 500px;
      width: 100%;
      text-align: center;
    }

    h2 {
      margin-bottom: 20px;
      font-size: 24px;
    }

    /* Form Group */
    .form-group {
      text-align: left;
    }

    label {
      display: block;
      margin-bottom: 5px;
      color: #333;
      font-size: 15px;
    }

    input,
    select {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
      font-size: 14px;
    }

    input:focus,
    select:focus {
      border-color: #b5b5b5;
      outline: none;
      box-shadow: 0 0 5px #b5b5b5;
    }

    button {
      width: 30%;
      padding: 10px 15px;
      background: #333;
      color: #fff;
      font-size: 16px;
      font-weight: bold;
      border-radius: 10px;
      cursor: pointer;
    }

    button:hover {
      background: white;
      color: #333;
    }

    p {
      margin-top: 15px;
      font-size: 14px;
      color: #4a4a4a;
    }

    a {
      color: #024b82;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div class="container">
    <h2>Đăng Ký Tài Khoản</h2>


    <?php if (isset($error)) {
      echo "<p class='error-message'>$error</p>";
    } ?>

    <form action="register.php" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="fullname">Họ và tên:</label>
        <input type="text" name="fullname" id="fullname" required>
      </div>

      <div class="form-group">
        <label for="username">Tên tài khoản:</label>
        <input type="text" name="username" id="username" required>
      </div>

      <div class="form-group">
        <label for="password">Mật khẩu:</label>
        <input type="password" name="password" id="password" required>
      </div>

      <div class="form-group">
        <label for="confirm_password">Nhập lại mật khẩu:</label>
        <input type="password" name="confirm_password" id="confirm_password" required>
      </div>

      <div class="form-group">
        <label for="dob">Năm sinh:</label>
        <input type="number" name="dob" id="dob" required>
      </div>

      <div class="form-group">
        <label for="hometown">Quê quán:</label>
        <input type="text" name="hometown" id="hometown">
      </div>

      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
      </div>

      <div class="form-group">
        <label for="gender">Giới tính:</label>
        <select name="gender" id="gender" required>
          <option value="Nam">Nam</option>
          <option value="Nữ">Nữ</option>
          <option value="Khác">Khác</option>
        </select>
      </div>
      <button type="submit">Đăng ký</button>
    </form>

    <p style="text-align: center;">Đã có tài khoản? <a href="login.php">Đăng nhập</a></p>
  </div>
</body>

</html>