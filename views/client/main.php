<?php 
if (isset($_SESSION['register_sucsess'])) {
echo "<script>alert('Đăng Ký Thành Công');</script>";
unset($_SESSION['register_sucsess']); // Xóa thông báo sau khi đã hiển thị
unset($_SESSION['error']);
}
if (isset($_SESSION['login_sucsess'])) {
    $name = isset($user['name']) ? htmlspecialchars($user['name']) : 'Guest';
    echo "<script>alert('Welcome, $name');</script>";
    unset($_SESSION['login_sucsess']); // Xóa thông báo sau khi đã hiển thị
    unset($_SESSION['error']);
    }

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <link rel="stylesheet" href="./style/home.css" />
    <link rel="stylesheet" href="./style/product_page.css">
    <link rel="stylesheet" href="./style/Contact.css">
    <link rel="stylesheet" href="./style/Cart.css" />
    <link rel="stylesheet" href="./style/modal.css">


    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="icon" href="<?= BASE_URL ?>images/Logo.png" type="image/png">
    <title>NFA - Nike Fashion Authentic!</title>
</head>
<style>
.row {
    margin-top: 70px;
    height: auto;
}
</style>

<body>
    <div class="container">
        <header data-aos="fade-down">
            <nav>
                <div class="logo">
                    <img src="./images/Logo.png" />
                </div>
                <ul class="menu">
                    <li><a href="index.php?action=/">Home</a></li>
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
                        <?php if (isset($_SESSION['user'])): ?>

                        <div class="dropdown-menu">
                            <p style="display:inline-block; font-size:13px;width:100%;text-align:center">
                                Chào,
                                <span style="font-weight: 700;"><?= htmlspecialchars($_SESSION['user']) ?></span>
                            </p>
                            <a href="index.php?action=logout">Đăng xuất</a>
                        </div>
                        <?php else: ?>
                        <?php include 'views/component/form_login_singup.php' ?>
                        <div class="dropdown-menu">
                            <a href="#" onclick="openModal()">Đăng ký</a>
                            <a href="#" onclick="openModal()">Đăng nhập</a>
                        </div>
                        <?php endif; ?>
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