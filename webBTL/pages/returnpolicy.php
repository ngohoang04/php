<?php
// Bắt đầu phiên làm việc
session_start();
include '../includes/db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
    integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />

  <style>
    a {
      text-decoration: none;
    }

    ul {
      list-style-type: none;
    }

    .container1 {
      width: 100%;
      max-width: 1120px;
      margin-left: auto;
      margin-right: auto;
    }

    /* Header */

    /* End Header */

    /* Body  */
    .body_main p b {
      font-size: 18px;
      margin-bottom: 15px;
      display: block;
      color: #222;
    }

    .body_main ol,
    .body_main ul {
      color: #555;
      margin-bottom: 20px;
      margin-left: 20px;
    }

    .body_main ul {
      list-style-type: disc;
    }

    .body_main ol {
      list-style-type: decimal;
    }

    .body_main ul li,
    .body_main ol li {
      margin-bottom: 10px;
      line-height: 1.4;
    }

    /* End Body */
  </style>
  <link rel="stylesheet" href="../assets/css/styles.css">
  <link rel="stylesheet" href="../assets/font/fontawesome-free-6.6.0-web/css/all.min.css">

</head>

<body>
  <!-- Header  -->
  <div class="main">
    <div class="ontop">
      <div class="logovn">
        <i class="fa-solid fa-font-awesome logo__icon"></i>
        <div class="logovn__text">VN</div>
      </div>
      <div class="ontop__des">
        <div class="ontop__des-upper">Free Shipping!</div>
        <div class="ontop__des-lower">On All Orders</div>
      </div>
      <div class="ontop__help">
        <div class="ontop__help-logo">
          <div class="ontop__help-logo-icon ">
            <i class="fa-solid fa-font-awesome"></i>
          </div>
          <div class="ontop__help-logo-text ">VIETNAMESE</div>
        </div>
        <div class="ontop_help-locator">
          <div class="ontop__help-locator-icon ">
            <i class="fa-solid fa-location-dot "></i>
          </div>
          <div class="ontop__help-locator-text ">Store Locator</div>
        </div>
        <div class="ontop__help-track">
          <div class="ontop__help-track-icon  ">
            <i class="fa-solid fa-cart-shopping"></i>
          </div>
          <div class="ontop__help-track-text ">Track Oder</div>
        </div>
        <div class="ontop__help-help">
          <div class="ontop__help-help-icon a">
            <i class="fa-solid fa-question"></i>
          </div>
          <div class="ontop__help-help-text a">Help</div>
        </div>
      </div>
    </div>
    <div class="header">
      <div class="header__icon">
        <a href="../index.php" class="header__icon-link">trademark</a>
      </div>
      <div class="header__nav">
        <ul class="header__nav-list">
          <li class="header__nav-listitem"><a href="news.php">Run Star Trainer</a></li>
          <li class="header__nav-listitem "><a href="product.php">Product</a></li>
          <li class="header__nav-listitem "><a href="aboutus.php">About US</a></li>
          <li class="header__nav-listitem "><a href="size.php">Size</a></li>
          <li class="header__nav-listitem "><a href="returnpolicy.php">Return Policy</a></li>





        </ul>
      </div>
      <div class="header__search">
        <div class="header__search-abc">
          <?php if (isset($_SESSION['user'])): ?>
            <div class="header__search-signin-des" id="user" onclick="">
              <a href="profile.php" style="text-decoration: none;color:#444"><?php echo $_SESSION['user']; // Hiển thị tên người dùng 
                                                                              ?></a>
            </div>
            <div class="header__search-signin-icon">

              <a href="logout.php" style="text-decoration: none;color:#444" class="header__search-signout  ">Đăng xuất</a>
            </div>
          <?php else: ?>
            <div class="header__search-signin-des " id="signin">
              <a href="login.php" style="text-decoration: none;color:#444">Sign In</a>
            </div>
            <div class="header__search-signin-icon">
              <i class="fa-solid fa-user"></i>
            </div>
          <?php endif; ?>
        </div>
        <div class="header__search-abc">
          <div class="header__search-heart-icon">
            <i class="fa-solid fa-heart"></i>
          </div>
        </div>
        <div class="header__search-abc">
          <?php if (isset($_SESSION['user'])): ?>
            <!-- Hiển thị giỏ hàng khi người dùng đã đăng nhập -->
            <div class="header__search-buy-icon">
              <i class="fa-solid fa-cart-plus"></i>

            </div>

          <?php endif; ?>
        </div>

        <div class="class__search-abc">

          <div class="header__search-search-icon">
            <i class="fa-solid fa-search"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- End Header -->

  <!-- Body  -->
  <div class="container1">
    <div class="body_main">
      <p><b>Có hiệu lực từ tháng 1 năm 2024.</b></p>
      <p></p>
      <p><b>CHÍNH SÁCH ĐỔI TRẢ</b></p>
      <p><b>Điều kiện đổi trả</b></p>
      <ol>
        <li>
          Sản phẩm được mua nguyên giá và chiết khấu tối đa 30%. Chúng tôi
          không chấp nhận đổi trả với các sản phẩm đã được giảm giá hơn 30%
          trong thời gian khuyến mãi.
        </li>
        <li>
          Sản phẩm phải chưa qua sử dụng và còn nguyên đai, nguyên kiện, còn
          nguyên tem mác trên sản phẩm và không bị hư hỏng.
        </li>
        <li>
          Sản phẩm không c&oac[ute; vết bẩn, đứt đường may, mất cúc, tuột
          chỉ hoặc các tình trạng khác được cho là sản phẩm bị lỗi, hư hỏng.
        </li>
        <li>
          Sản phẩm phải còn nguyên hộp và bao bì thương hiệu. Hộp và bao bì
          không bị xé rách hoặc móp méo, không được dính bất kỳ vết keo nào
          và phải còn nguyên vẹn với các mặt hàng khác từ bao bì chính hãng
          như hộp carton, móc treo quần áo, nhãn dán, ruy băng, dây thừng,
          túi nhựa, nhựa và các đồ vật khác.
        </li>
        <li>
          Yêu cầu đổi trả sản phẩm phải được thực hiện trong vòng 14 (mười
          bốn) ngày kể từ khi nhận được đơn đặt hàng. Sản phẩm đổi trả phải
          được nhận tại địa điểm đã xác định trước chậm nhất là 7 (bảy) ngày
          kể từ ngày đổi trả được Trademark.vn chấp thuận.
        </li>
        <li>
          Khi trả lại sản phẩm, vui lòng sử dụng hộp đựng/bao bì mà chúng
          tôi đã gửi đến cho bạn trước đó và bọc bao bì sản phẩm chắc chắn
          bằng màng bọc và dán thêm nhãn dán “ĐỒ DỄ VỠ” trên lô hàng để
          tránh làm móp hộp chính hãng trong quá trình vận chuyển. Chúng tôi
          không chấp nhận bất kỳ hình thức trả lại nào khi sản phẩm và bao
          bì/hộp sản phẩm bị hư hỏng.
        </li>
        <li>
          Quá trình hoàn tiền mất từ 7 (bảy) đến 14 (mười bốn) ngày làm
          việc. Thời gian có thể thay đổi tùy thuộc vào phương thức hoàn
          trả. Chính sách hoàn tiền sẽ được thực hiện ngay sau khi chúng tôi
          nhận được các sản phẩm trả lại và theo phương thức thanh toán ban
          đầu của bạn đã chọn trong quá trình mua hàng. Chúng tôi không hoàn
          trả chi phí vận chuyển của các sản phẩm trả lại.
        </li>
        <li>
          Vui lòng liên hệ với Nhóm dịch vụ chăm sóc khách hàng của chúng
          tôi qua email connect@Trademark.vn để gửi yêu cầu trả hàng.
        </li>
      </ol>
      <p></p>
      <p><b>CHÍNH SÁCH ĐỔI TRẢ</b></p>
      <p><b>Điều kiện đổi hàng</b></p>
      <ol>
        <li>Áp dụng đổi hàng đối với sản phẩm đạt các điều kiện sau:</li>
      </ol>
      <p>Kích thước không chính xác</p>
      <ul>
        <li>
          Sản phẩm nhận được không khớp với đơn đặt hàng của khách hàng: ví
          dụ: khách hàng đặt size 30, nhưng nhận được size 32.
        </li>
        <li>Kích thước khác nhau giữa sản phẩm thực và bao bì/hộp.</li>
        <li>
          Kích thước khác nhau giữa sản phẩm bên trái và bên phải (ví dụ:
          giày, dép).
        </li>
        <li>
          Sản phẩm nhận được là cùng một bên (giày/dép đều là bên phải hoặc
          bên trái).
        </li>
      </ul>
      <p>Màu sắc không chính xác</p>
      <ul>
        <li>
          Màu sắc sản phẩm không giống như mô tả sản phẩm: v.d. Khách hàng
          đặt giày màu xanh dương nhưng lại nhận được giày màu đỏ.
        </li>
      </ul>
      <p>Hư hỏng/Lỗi sản phẩm</p>
      <ul>
        <li>Màu sắc sản phẩm: Bị phai hoặc khác màu</li>
        <li>
          Chất liệu sản phẩm: Da bị bong tróc, chất liệu bị rách, đường khâu
          hoặc may chỉ lỏng, chất liệu bị ố hoặc biến dạng, chất liệu bị
          rách hoặc thủng.
        </li>
        <li>
          Bộ phận sản phẩm: Nút bị lỏng, khóa kéo bị đứt, thiếu số lượng/phụ
          kiện, tay cầm bị gãy, không bơm được (đối với bóng).
        </li>
      </ul>
      <p></p>
      <p>Giày dép (giày/dép)</p>
      <ul>
        <li>Tối thiểu 1 (một) kích thước khác nhau giữa trái và phải.</li>
        <li>
          Chất liệu da bị bong tróc, đường may lỏng lẻo, thiếu chi tiết sản
          phẩm trên giày.
        </li>
        <li>Màu sắc sản phẩm bị phai/khác màu.</li>
      </ul>
      <p>Quần áo</p>
      <ul>
        <li>
          Hư hỏng do lỏng nút, đường may bị lỏng và những lỗi tương tự.
        </li>
        <li>Dính bẩn hoặc bị vết đốm.</li>
        <li>Vải/chất liệu bị rách.</li>
        <li>Đứt chỉ.</li>
        <li>Hư khóa kéo và những lỗi tương tự.</li>
        <li>Màu sắc sản phẩm bị phai/khác màu.</li>
      </ul>
      <p>Túi xách</p>
      <ul>
        <li>Vết bẩn hoặc đốm.</li>
        <li>Màu sắc sản phẩm bị phai/khác màu.</li>
        <li>Bị thủng hoặc rách nhỏ.</li>
        <li>Đường may lỏng hoặc hình thêu bị lỗi.</li>
        <li>Hỏng khóa kéo.</li>
        <li>Da sản phẩm bị bong tróc.</li>
      </ul>
      <p>Phụ Kiện</p>
      <ul>
        <li>Thiếu phụ kiện.</li>
        <li>Vết xước trên kính.</li>
        <li>
          Da sản phẩm bị bong tróc, các đường may trên găng tay bị lỏng.
        </li>
        <li>Hình thêu không đều, bị lỏng hoặc phai màu.</li>
      </ul>
      <p>
        2. Không chấp nhận yêu cầu đổi hàng để thay đổi kích thước, màu
        sắc hoặc phân loại/mẫu mã khác. Tuy nhiên, bạn có thể trả lại hàng
        của mình để được hoàn lại toàn bộ tiền (với điều kiện sản phẩm được
        đổi đáp ứng các điều kiện) và đặt hàng mới. Việc đổi hàng chỉ được
        thực hiện với cùng một sản phẩm (cùng SKU, cùng kích thước, cùng
        màu, v.v.).
      </p>
      <p>
        3. Yêu cầu đổi sản phẩm phải được thực hiện trong vòng 14 (mười bốn)
        ngày kể từ khi nhận được đơn đặt hàng. Sản phẩm đổi trả phải được
        nhận tại địa điểm đã xác định trước chậm nhất là 7 (bảy) ngày kể từ
        ngày đổi được Trademark.vn chấp thuận.
      </p>
      <p>
        4. Khi trả lại sản phẩm, vui lòng sử dụng hộp đựng/bao bì mà chúng
        tôi đã gửi đến cho bạn trước đó và bọc hộp hàng bằng màng bọc chắc
        chắn và dán thêm nhãn dán “ĐỒ DỄ VỠ” trên lô hàng để tránh làm móp
        hộp chính hãng trong quá trình vận chuyển. Chúng tôi không chấp nhận
        bất kỳ hình thức trả lại nào khi sản phẩm và bao bì/hộp sản phẩm bị
        hư hỏng.
      </p>
      <p>
        5. Vui lòng liên hệ với Nhóm dịch vụ chăm sóc khách hàng của chúng
        tôi qua email connect@Trademark.vn để gửi yêu cầu trả hàng.
      </p>
      <p></p>
      <p><b>Ngoại lệ</b></p>
      <ol>
        <li>
          Chúng tôi không hỗ trợ đổi hàng dựa trên sự khác biệt về màu sắc
          giữa sản phẩm thực tế nhận được và hình ảnh hiển thị do hiệu ứng
          ánh sáng hoặc màn hình máy tính gây ra.
        </li>
        <li>
          Chúng tôi không cho phép yêu cầu đổi hàng do mua nhầm hoặc đổi ý
          sau khi mua. Chúng tôi khuyến khích quý khách nên xem lại giỏ hàng
          trước khi bấm hoàn tất đơn đặt hàng.
        </li>
        <li>
          Yêu cầu đổi hàng không áp dụng cho đồ bơi, áo ngực thể thao, quần
          áo thể thao, quần bó (bao gồm quần bó/quần legging, quần bó/quần
          nén, quần short đạp xe), tất, dụng cụ thể dục, phụ kiện thể thao
          (bao gồm cả mũ) và các sản phẩm hoặc nhãn hiệu cụ thể khác theo
          Điều khoản và Điều kiện đã được nêu rõ trong phần mô tả.
        </li>
      </ol>
      <p></p>
      <p><b>Chính Sách Bảo Hành Sản Phẩm</b></p>
      <p>
        Tất cả sản phẩm bán tại Trademark Việt Nam đều không được bảo hành
      </p>
      <p></p>
      <p><b>Chính Sách Bảo Hành Sản Phẩm</b></p>
      <ul>
        <li>
          Hàng hóa được đóng gói cẩn thận. Hãy chắc chắn rằng bạn nhận được
          bao bì không có dấu hiệu biến dạng hoặc rách.
        </li>
        <li>
          Khi nhận được sản phẩm, hãy đảm bảo sản phẩm đúng với số lượng,
          màu sắc, tình trạng, chủng loại và kích thước với đơn đặt hàng của
          bạn.
        </li>
        <li>
          Nếu sản phẩm bạn nhận được bị lỗi, vui lòng liên hệ với Trung Tâm
          Chăm Sóc Khách Hàng của chúng tôi tại đây (đường dẫn đến trang
          Contact Us) và cung cấp cho chúng tôi số đơn đặt hàng, tên và địa
          chỉ, chi tiết sản phẩm, lý do trả lại và thông tin về yêu cầu hoàn
          lại tiền hoặc trao đổi.
        </li>
        <li>
          Yêu cầu đổi trả sản phẩm phải được thực hiện trong vòng 14 (mười
          bốn) ngày kể từ ngày nhận được đơn hàng. Sản phẩm trả lại phải
          được nhận tại địa điểm xác định trước không muộn hơn 7 (bảy) ngày
          sau ngày trả lại được Trademark Việt Nam chấp thuận.
        </li>
      </ul>
      <p></p>
      <p><b>Sản phẩm bị lỗi</b></p>
      <ol>
        <li>
          Tất cả các mô tả, thông tin và tài liệu sản phẩm được đăng trên
          Trademark.vn đều được cung cấp 'nguyên trạng' và không có bảo hành,
          cho dù là rõ ràng hay ngụ ý, hay bất kỳ điều gì khác phát sinh.
        </li>
        <li>
          Nếu sản phẩm bạn nhận được bị lỗi, vui lòng liên hệ với dịch vụ
          chăm sóc khách hàng của chúng tôi và cung cấp cho chúng tôi mã số
          đơn đặt hàng, tên và địa chỉ, chi tiết sản phẩm và lý do trả lại
          cũng như thông tin về yêu cầu hoàn tiền hoặc đổi hàng.
        </li>
        <li>
          Khi nhận được sản phẩm bị lỗi, chúng tôi sẽ kiểm tra và tư vấn cho
          quý khách về tình trạng hoàn trả hoặc đổi hàng (nếu có).
        </li>
        <li>
          Trademark.vn có toàn quyền từ chối xử lý việc đổi hàng. Tuy nhiên,
          chúng tôi có thể hoàn lại tiền như một biện pháp khắc phục thay
          thế.
        </li>
        <li>
          Quá trình hoàn tiền mất từ 7 (bảy) đến 14 (mười bốn) ngày làm
          việc. Thời gian có thể thay đổi tùy thuộc vào phương thức hoàn
          trả. Chính sách hoàn tiền sẽ được thực hiện ngay sau khi chúng tôi
          nhận được các sản phẩm trả lại và theo phương thức thanh toán ban
          đầu của bạn đã chọn trong quá trình mua hàng. Chúng tôi không hoàn
          trả chi phí vận chuyển của các sản phẩm trả lại.
        </li>
        <li>
          Trong trường hợp sản phẩm hoàn trả không bị lỗi, chúng tôi có thể
          tùy ý quyết định không đổi hoặc hoàn tiền sản phẩm và sẽ gửi lại
          sản phẩm cho bạn.
        </li>
      </ol>
    </div>
  </div>

  <!-- End Body -->
  <?php
  include '../includes/footer.php';
  ?>