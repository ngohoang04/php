<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $userId = $_POST['UserId'];
        
        $currentPassword = $_POST['current-password'];
        $newPassword = $_POST['new-password'];
        $confirmPassword = $_POST['confirm-password'];
        if (empty($currentPassword) || empty($newPassword) || empty($confirmPassword)) {
            echo "Vui lòng điền đầy đủ thông tin.";
            exit;
        }
        if($newPassword !== $confirmPassword){
            echo "Vui lòng nhập lại mật khẩu!";
            exit;
        }
        else{
            include '../includes/db.php';
            
                $updateQuery = "UPDATE users SET `Password` = '$newPassword' WHERE `UserId` = '$userId'";
                
                mysqli_query($conn, $updateQuery);
                
                echo "cập nhật thành công";
                header("Location: ../pages/profile.php");
            
        }
    }
?>
