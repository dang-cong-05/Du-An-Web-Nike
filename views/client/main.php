
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/product_page.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/Contact.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/style/Cart.css" />
  <link rel="stylesheet" href="<?= BASE_URL ?>/style/product_details.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/home.css"/>
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/modal.css">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="icon" href="./images/logo_resized_32x32.png" type="image/png">
    <style>
    /* Chỉ áp dụng cho select */
    #category {
      border: none;
        /* border: 1px solid #ccc; */
        border-radius: 20px;
        padding: 8px 12px;
        font-size: 14px;
        outline: none;
        height: 40px;
        box-sizing: border-box;
        appearance: none; /* Ẩn mũi tên mặc định */
        -moz-appearance: none; /* Firefox */
        -webkit-appearance: none; /* Chrome/Safari */
        background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3E%3Cpath fill='none' d='M0 0h20v20H0z'/%3E%3Cpath d='M6 8l4 4 4-4z' fill='%23999'/%3E%3C/svg%3E")
            no-repeat right 10px center;
        background-size: 12px;
        cursor: pointer;
    }

    /* Hiệu ứng khi rê chuột */
    #category:hover {
        border-color: #007BFF;
    }

    /* Điều chỉnh cho khoảng cách nội dung không tràn */
    #category option {
        padding: 5px;
    }
</style>

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
        <select name="category" id="category" >
            <option value="">ALL CATEGORIES</option>
            <?php if (isset($data['categories']) && count($data['categories']) > 0): ?>
                <?php foreach ($data['categories'] as $category): ?>
                    <option value="<?= htmlspecialchars($category['id']) ?>" 
                        <?= isset($_POST['category']) && $_POST['category'] == $category['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($category['category_name']) ?>
                    </option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
        <input type="text" placeholder="Search..." class="search-input" name="keyword" 
            value="<?= isset($_POST['keyword']) ? htmlspecialchars($_POST['keyword']) : '' ?>" />
        <button type="submit" name="timkiem">
            <i class="search-icon fa-solid fa-magnifying-glass"></i>
        </button>
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
                require_once PATH_VIEW_CLIENT . $view . '.php';
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
    <script src="script/product_page.js"></script>
    <script src="./script/cart.js"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
  </body>
</html>




