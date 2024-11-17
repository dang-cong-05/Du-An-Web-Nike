 <?php 


session_start();

spl_autoload_register(function ($class) {    
    $fileName = "$class.php";

    $fileModel              = PATH_MODEL . $fileName;
    $fileControllerClient   = PATH_CONTROLLER_CLIENT . $fileName;
    $fileControllerAdmin    = PATH_CONTROLLER_ADMIN . $fileName;

    if (is_readable($fileModel)) {
        require_once $fileModel;
    } 
    else if (is_readable($fileControllerClient)) {
        require_once $fileControllerClient;
    }
    else if (is_readable($fileControllerAdmin)) {
        require_once $fileControllerAdmin;
    }
});
?> 

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
            <li><a href="#">Home</a></li>
            <li><a href="">Shop</a></li>
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
    <div class="modal-container" data-aos="fade-down">
      <div class="modal" id="modal">
        <button class="close-button" onclick="closeModal()"><i class="fa-solid fa-xmark"></i></button>
        <div class="form-container sign-up">
            <form action="#" method="$_POST">
                <h1>Create Account</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google"></i></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin"></i></a>
                </div>

                <span>or use your email for registration</span>
                <input type="text" placeholder="Name" name="username"/>
                <input type="email" placeholder="Email" name="email"/>
                <input type="password" placeholder="Password" name="password_hash" />
                <button type="submit" name="signup">Sign Up</button>
            </form>
        </div>
  
        <div class="form-container sign-in">
            <form action="process_login.php" method="$_POST">
                <h1>Log In</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google"></i></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin"></i></a>
                </div>
                <span>or use your account</span>
                <input type="email" placeholder="Email" name="email" />
                <input type="password" placeholder="Password" name="password_hash" />
                <a href="#">Forgot your password?</a>
                <button type="submit" name="login">Log In</button>
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <h1>Welcome Back!</h1>
                    <p>To continue shopping, Please log in with your personal information.</p>
                    <button class="ghost" id="register">Sign In</button>
                </div>
                <div class="toggle-panel toggle-left">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your information to start shopping with us.</p>
                    <button class="hidden" id="signIn">Sign Up</button>
                </div>
            </div>
        </div>
      </div>
  </div>
    <script src="./script/modal.js"></script>
    <script src="./script/slideshow.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
  </body>
</html>