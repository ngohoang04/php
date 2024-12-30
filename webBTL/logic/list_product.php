<h1>Thông tin người dùng</h1>
    <table border=1>
        <tr>
            <th>ID</th>
            <th>Họ và tên</th>
            <th>Tên Đăng nhập</th>
            <th>Mật khẩu</th>
            <th>Ảnh</th>
            <th>Chức năng</th>
        </tr>
            <?php
                $sql="Select * from user";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($result)){

                
            ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['ho_ten']; ?></td>
            <td><?php echo $row['ten_dang_nhap']; ?></td>
            <td><?php echo $row['mat_khau']; ?></td>
            <td>
                <img src="<?php echo $row['avata_path']; ?>" alt="">
            </td>
            <td>
                
                <a class="delete" href="trangchu.php?page=process_delete_user&id=<?php echo $row['id']; ?>">Xoá</a>
            </td>
        </tr>
        <?php } ?>
    </table>