<?php 
if (isset($_SESSION['message'])) {
echo "<script>alert('Đăng Ký Thành Công');</script>";
unset($_SESSION['message']); // Xóa thông báo sau khi đã hiển thị
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <link rel="stylesheet" href="<?= BASE_URL ?>style/home.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>style/product_page.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>style/Contact.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>style/Cart.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>style/modal.css">


    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="icon" href="<?= BASE_URL ?>images/Logo.png" type="image/png">
    <title>NFA - Nike Fashion Authentic!</title>
</head>

<body>
    <div class="container">
        <header>
            <nav>
                <div class="logo">
                    <img src="/images/Logo.png" />
                </div>
                <ul class="menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php?action=product_page">Shop</a></li>
                    <li><a href="index.php?action=contact">Contact</a></li>
                    <li><a href="#">Service</a></li>
                </ul>

                <form action="?action=search" method="post">




                    <div class="search-container">
                        <input type="text" placeholder="Search..." class="search-input" name="keyword" />
                        <button type="submit" name="timkiem"><i
                                class="search-icon fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>

                <div class="menu-icon">
                    <div class="user-icon">
                        <span><i class="fa-solid fa-user"></i></span>
                        <div class="dropdown-menu">
                            <a href="#" onclick="openModal()">Đăng ký</a>
                            <a href="#" onclick="openModal()">Đăng nhập</a>
                        </div>
                    </div>
                    <div class="cart-icon">
                        <a href="index.php?action=cart"><i class="fa-solid fa-cart-shopping"></i></a>
                        <span class="cart-count">2</span>
                    </div>
                </div>
            </nav>
        </header>



        <div class="row">
            <?php
            if (isset($view)) {
                require_once PATH_VIEW_CLIENT . $view.'.php';
            }
            ?>
        </div>

        <footer>
            <ul>
                <li>© 2024 Nike, Inc. All rights reserved</li>
                <li>Hướng dẫn</li>
                <li>Điều Khoản Bán Hàng</li>
                <li>Điều khoản bảo mật</li>
                <li>Chính sách</li>
            </ul>
        </footer>
    </div>
    <?php include 'views/component/form_login_singup.php' ?>
    <script src="./script/modal.js"></script>
    <script src="./script/slideshow.js"></script>
    <script src="./script/product_page.js"></script>
    <script src="./script/cart.js"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
</body>

</html>