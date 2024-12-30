<div class="footers">
    <div class="logo">
        <h1>TRADEMARK</h1>
        <p>Cung cấp sản phẩm <br>chất lượng tới quý khách</p>
    </div>
    <div class="noidungs">
        <div class="noidung">
            <div class="noidung1">Nội dung</div>
            <div class="footers__r">Trang chủ</div>
            <div class="footers__r">Sản phẩm</div>
            <div class="footers__r">Blog</div>
            <div class="footers__r">Liên hệ</div>
        </div>
    </div>
    <div class="lienhe">
        <div class="lienhe1">Liên hệ</div>
        <input type="email" placeholder="Địa chỉ email" class="inputemail" name="" id="">
        <div><input type="submit" class="inputsubmit" value="Nhắn tin "></div>
    </div>
</div>
<div class="message"><i class="fas fa-comment-alt"></i>
</div>


</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const signinElement = document.getElementById('signin');
        if (signinElement) {
            signinElement.addEventListener('click', function() {
                window.location.href = 'pages/login.php';
            });
        }
    });
</script>
</body>

</html>