<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Page</title>
    <link rel="stylesheet" href="./style/Contact.css">
    <link rel="stylesheet" href="/style/home.css">
</head>
<body>
    <header>
        <nav>
          <div class="logo">
            <img src="/images/Logo.png" />
          </div>
          <ul class="menu">
            <li><a href="Home.php">Home</a></li>
            <li><a href="#">Shop</a></li>
            <li><a href="#">Contact</a></li>
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
                <a href="#" onclick=" openModal()">Đăng ký</a>
                <a href="#" onclick=" openModal()">Đăng nhập</a>
              </div>
            </div>
            <div class="cart-icon">
              <a href="Cart.html"><i class="fa-solid fa-cart-shopping"></i></a>
              <span class="cart-count">2</span>
            </div>
          </div>
        </nav>
      </header>
    <div class="contact-container">
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59578.20788227888!2d105.67140698432921!3d21.047166056212312!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455e940879933%3A0xcf10b34e9f1a03df!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2sus!4v1731587899669!5m2!1svi!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>    
        </div>
        <form class="contact-form">
            <h2>Liên hệ với chúng tôi</h2>
            <input type="text" placeholder="Họ và tên" required>
            <input type="email" placeholder="Email" required>
            <textarea placeholder="Nội dung" required></textarea>
            <button type="submit">Gửi liên hệ</button>
        </form>
    </div>

    <div class="subscribe-section">
        <h3>Đăng kí nhận tin khuyến mãi</h3>
        <input type="email" placeholder="Nhập email của bạn">
        <button type="button">Đăng ký</button>
    </div>
</body>
</html>
