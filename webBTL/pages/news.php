<?php
// Bắt đầu phiên làm việc
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/font/fontawesome-free-6.6.0-web/css/all.min.css">
    <script src="../assets/js/scripts.js"></script>
    <style>
        body,
        html {
            font-family: "Arial", sans-serif;
            background-color: #f9f9f9;
            color: #333;
            line-height: 1.6;
        }

        .image img {
            width: 100%;
            height: auto;
            display: block;
        }

        .main-content {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .intro {
            text-align: center;
            margin-bottom: 30px;
        }

        .intro h1 {
            font-size: 2.5rem;
            color: #222;
            margin-bottom: 10px;
        }

        .intro h3 {
            font-size: 1.2rem;
            color: #555;
            font-style: italic;
            margin-bottom: 20px;
        }

        .content {
            margin-bottom: 40px;
        }

        .text-image {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .text-image img {
            width: 300px;
            height: auto;
            border-radius: 10px;
        }

        .text-image p {
            flex: 1;
            font-size: 1rem;
            color: #444;
        }

        .gallerys {
            text-align: center;
            margin-bottom: 30px;
        }

        .gallerys h3 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: #222;
        }

        .gallery {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .gallery img {
            width: 150px;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .gallery img:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>
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

    <div class="body">
        <div class="image">
            <img src="../assets/img/new1.webp" alt="Converse Header" />
        </div>
        <div class="main-content">
            <section class="intro">
                <h1>Trademark Introduces Newest Silhouette: The Run Star Trainer</h1>
                <h3>
                    Modern Low-Profile Offering Combines Best of Sport Past with
                    Versatility for Today's Lifestyle
                </h3>
            </section>

            <section class="content">
                <div class="text-image">
                    <img src="../assets/img/2.gif" alt="Converse GIF" />
                    <p>
                        Running, Fencing, Volleyball, Wrestling. What do these have in
                        common? They all served as inspiration for Trademark's all-new
                        silhouette, the Run Star Trainer. Trademark set sights on creating
                        a new concept inspired by the past but designed for modern life -
                        enabling new styling for those who value versatility,
                        self-expression, and comfort.
                    </p>
                </div>
            </section>

            <!-- Section 4: Text and Image -->
            <section class="content">
                <div class="text-image">
                    <p>
                        The Run Star Trainer takes cues from nearly 20 heritage
                        silhouettes, all of which were originally purpose-built for sports
                        including karate, fencing, soccer, wrestling, triple jump...even
                        steeple chase. The outsole tread pattern is also conceptualized
                        from the Chuck Taylor All Star, extended in an exaggerated fashion
                        through the heel and is stamped with the Star logo of the Run Star
                        Hike, first introduced in 2019.
                    </p>
                    <img src="../assets/img/new2.webp" alt="Converse Run Star Trainer" />
                </div>
            </section>

            <!-- Section 5: Gallery -->
            <section class="gallerys">
                <h3>Run Star Trainer Silhouette</h3>
                <div class="gallery">
                    <img src="../assets/img/new3.webp" alt="Gallery Image 1" />
                    <img src="../assets/img/new4.webp" alt="Gallery Image 2" />
                    <img src="../assets/img/new5.webp" alt="Gallery Image 3" />
                    <img src="../assets/img/new6.webp" alt="Gallery Image 4" />
                    <img src="../assets/img/new7.webp" alt="Gallery Image 5" />
                </div>
            </section>
        </div>
    </div>

    <?php
    include '../includes/footer.php';
    ?>