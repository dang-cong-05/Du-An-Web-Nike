
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/home.css"/>
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/modal.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="icon" href="./images/logo_resized_32x32.png" type="image/png">
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
            <li><a href="index.php?action=product_cart">Shop</a></li>
            <li><a href="Contact.php">Contact</a></li>
            <li><a href="#">Service</a></li>
          </ul>
          <div class="search-container">
            <input type="text" placeholder="Search..." class="search-input" />
            <i class="search-icon fa-solid fa-magnifying-glass"></i>
          </div>
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
      <div id="slider">
        <div class="slides">
          <img class="slide" src="/images/Slide-1.jpg" />
          <img class="slide" src="/images/slide-2.jpg" />
          <img class="slide" src="/images/slide-3.jpg" />
        </div>
        <a class="prev" onclick="prevSlide()">&#10094;</a>
        <a class="next" onclick="nextSlide()">&#10095;</a>
      </div>
      <main>
        <section class="content-section">
          <div class="Latest-section">
            <h3>The Latest</h3>
            <div class="new-list">
              <div class="new-item" data-aos="fade-right">
                <img src="./images/New-section1.jpg" height="500" width="400" />
                <div class="new-item-info">
                  <h3 class="new-item-title">Nothing Beats The C1TY</h3>
                  <a class="new-nav-btn" href="product_page.php">Shop Now</a>
                </div>
              </div>
              <div class="new-item" data-aos="fade-down">
                <img src="./images/New-section3.jpg" height="500" width="400" />
                <div class="new-item-info">
                  <h3 class="new-item-title">Time</h3>
                  <a class="new-nav-btn" href="product_page.php">Shop Now</a>
                </div>
              </div>
              <div class="new-item" data-aos="fade-left">
                <img src="./images/New-section2.jpg" height="500" width="400" />
                <div class="new-item-info">
                  <h3 class="new-item-title">Quality</h3>
                  <a class="new-nav-btn" href="product_page.php">Shop Now</a>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
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
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
  </body>
</html>