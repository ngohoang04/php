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
    <title>Product List</title>
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/font/fontawesome-free-6.6.0-web/css/all.min.css">
    <style>
        /* General Styles */
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
                    <li class="header__nav-listitem "><a href="sell_men.php">Product</a></li>
                    <li class="header__nav-listitem "><a href="aboutus.php">About US</a></li>
                    <li class="header__nav-listitem "><a href="size.php">Size</a></li>
                    <li class="header__nav-listitem "><a href="returnpolicy.php">Return Policy</a></li>
                </ul>
            </div>
            <div class="header__search">
                <div class="header__search-abc">
                    <?php if (isset($_SESSION['user'])): ?>
                        <div class="header__search-signin-des" style="color:#444" id="user" onclick="">
                            <a href="profile.php" style="text-decoration: none;color:#444"> <?php echo $_SESSION['user']; // Hiển thị tên người dùng 
                                                                                            ?></a>
                        </div>
                        <div class="header__search-signin-icon">

                            <a href="logout.php" style="text-decoration: none;color:#444" class="header__search-signout ">Đăng xuất</a>
                        </div>
                    <?php else: ?>
                        <div class="header__search-signin-des " id="signin">
                            Sign In
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
                    <div class="header__search-buy-icon">
                        <i class="fa-solid fa-cart-plus"></i>
                    </div>
                </div>
                <div class="class__search-abc">

                    <div class="header__search-search-icon">
                        <i class="fa-solid fa-search"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <?php
        // Đoạn mã PHP của bạn
        $sql = "SELECT * FROM products";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
        ?>
            <h2>Product List</h2>
            <div class="product-list" id="product-list">
                <div class="product-item">
                    <img src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['ProductName']; ?>" />
                    <h3><?php echo $row['ProductName']; ?></h3>
                    <p><?php echo $row['Description']; ?></p>
                    <p><?php echo "đ" . $row['Price']; ?></p>
                    <p>Quantity: <?php echo $row['Quantity']; ?></p>
                    <!-- Chỉnh sửa nút View Details -->
                    <button class="details-button" onclick="viewDetails('<?php echo $row['ProductId']; ?>')">View Details</button>
                    <button onclick="buyProduct('<?php echo $row['ProductId']; ?>')">Buy Now</button>
                </div>
            <?php
        }
            ?>

            </div>

            <!-- Pagination -->
            <div class="pagination" id="pagination">
                <button onclick="prevPage()">Previous</button>
                <button onclick="nextPage()">Next</button>
            </div>
    </div>
    <script src="script.js"></script>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const signinElement = document.getElementById('signin');
        if (signinElement) {
            signinElement.addEventListener('click', function() {
                window.location.href = '../pages/login.php';
            });
        }
    });

    function viewDetails(productId) {
        alert("View details for product ID: " + productId);

        window.location.href = "viewsProduct.php?id=" + productId;
    }

    // Hàm xử lý mua sản phẩm
    function buyProduct(productId) {
        alert("Buying product ID: " + productId);

        window.location.href = "cart.php?id=" + productId;
    }
</script>

</html>