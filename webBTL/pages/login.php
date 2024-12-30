<?php
include('../includes/db.php');

if (isset($_POST['username']) && isset($_POST['password'])) {
    $userName = $_POST['username'];
    $passWord = $_POST['password'];
    $role;
    // Chuẩn bị câu lệnh SQL để tránh SQL Injection
    $sql = "SELECT * FROM users WHERE `Username` = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $userName);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Kiểm tra nếu tìm thấy người dùng
    if ($row = mysqli_fetch_assoc($result)) {
        // Kiểm tra mật khẩu
        if ($passWord == $row['Password']) {
            // Mở session và lưu thông tin người dùng
            session_start();
            $_SESSION['role'] = $row['Role'];
            $_SESSION['user'] = $userName;
            header('Location: ../index.php');
            exit();
        } else {
            echo "<script>alert('Vui lòng nhập lại mật khẩu');</script>";
        }
    } else {
        echo "<script>alert('Tên đăng nhập không chính xác');</script>";
    }
} else {
    echo "<script>alert('Vui lòng nhập đầy đủ thông tin');</script>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.6.0-web/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: #fff;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            max-width: 450px;
            width: 100%;
            text-align: center;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        /* Form Group */
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-size: 15px;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
        }

        input:focus {
            border-color: #b5b5b5;
            outline: none;
            box-shadow: 0 0 5px #b5b5b5;
        }

        /* Button Group */
        .btn-group {
            text-align: center;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            margin: 5px;
            background: #333;
            color: white;
            font-size: 14px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            border: 2px solid #333;
        }

        .btn:hover {
            background: white;
            color: #333;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Đăng Nhập</h2>

        <?php if (isset($error)) {
            echo "<p class='error-message'>$error</p>";
        } ?>

        <form method="POST" action="login.php">
            <div class="form-group">
                <label for="username">Tài khoản</label>
                <input type="text" id="username" name="username" placeholder="Nhập tài khoản" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
            </div>
            <div class="btn-group">
                <button class="btn btn-login" type="submit">Đăng Nhập</button>
                <!-- Nút đăng ký -->
                <a class="btn btn-register" href="register.php">Đăng Ký</a>
            </div>
            <!-- Nút quay lại trang chủ -->
            <div class="btn-group">
                <div class="btn btn-home goHome" onclick="goHome()">Quay Lại Trang Chủ</div>
            </div>
        </form>
    </div>
</body>
<script>
    function goHome() {
        window.location.href = "../index.php";
    }
</script>

</html>