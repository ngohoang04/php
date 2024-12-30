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
      max-width: 1200px;
      margin-left: auto;
      margin-right: auto;
      margin-top: 15px;
    }

    /* Header */

    /* End Header */

    /* BODY  */
    .body_main {
      display: flex;
      gap: 40px;
      align-items: center;
      justify-content: space-between;
    }

    .content {
      width: 55%;
      color: #333;
    }

    .content p {
      margin-bottom: 20px;
      font-size: 17px;
      color: #444;
      text-align: justify;
    }

    .images {
      width: 45%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .images img {
      max-width: 100%;
      height: auto;
      border-radius: 8px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    h2 {
      font-size: 28px;
      font-weight: bold;
      color: #222;
      text-align: center;
      margin-bottom: 20px;
    }

    /* END BODY */
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
  <div class="body">
    <div class="container1">

      <div class="body_main">
        <div class="content">
          <h2>ABOUT TRADEMARK</h2>
          <p>
            Welcome to Trademark, where every step begins a journey, and every design tells a story. Founded in 2023, Trademark is more than just a shoe store - it’s a platform that connects creators, sellers, and buyers in a shared passion for footwear.
          </p>
          <p></p>
          <p>
            We are a community-driven marketplace where independent sellers can showcase their unique designs, and customers can discover shoes that reflect their individuality. At Trademark, creativity knows no bounds. Our platform welcomes all styles and celebrates diversity, offering a curated collection of footwear for every gender and every walk of life.
          </p>
          <p></p>
          <p>
            Built on a foundation of innovation and collaboration, Trademark thrives on empowering small businesses while maintaining ethical practices and high-quality standards. Here, comfort, style, and self-expression merge seamlessly to create a space where every seller’s vision can shine and every customer can find their perfect fit.
          </p>
          <p></p>
          <p>
            At Trademark, it’s not just about shoes - it’s about stepping into a world of possibilities.
          </p>
        </div>
        <div class="images">
          <img src="../assets/img/about2.jpg">
        </div>
      </div>
    </div>
  </div>

  <!-- End Body -->
  <?php
  include '../includes/footer.php';
  ?>