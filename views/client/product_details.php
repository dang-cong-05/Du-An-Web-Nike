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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details </title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/product_details.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <img src="./images/Logo.png" alt="Logo">
            </div>
            <ul class="menu">
                <li><a href="Home.php">Home</a></li>
                <li><a href="index.php?action=product_cart">Shop</a></li>
                <li><a href="index.php?action=contact">Contact</a></li>
                <li><a href="#">Service</a></li>
            </ul>
            <div class="search-container">
                <input type="text" placeholder="Search..." class="search-input">
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
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="cart-count">2</span>
                </div>
            </div>
        </nav>
    </header> 

    <main class="product-container">
        <div class="gallery">
            <div class="main-image">
                <img id="display-image" src="images/nike1.png" alt="Main Product Image">
                <button class="arrow left">&#10094;</button>
                <button class="arrow right">&#10095;</button>
            </div>

            <div class="thumbnail-images">
                <img src="images/nike1,1.png" alt="Shoe Image 1" onclick="changeImage('images/nike1,1.png')">
                <img src="images/nike1,2.png" alt="Shoe Image 2" onclick="changeImage('images/nike1,2.png')">/-strong/-heart:>:o:-((:-h <img src="images/nike1,3.jpg" alt="Shoe Image 3" onclick="changeImage('images/nike1,3.jpg')">
                <img src="images/nike1,4.png" alt="Shoe Image 4" onclick="changeImage('images/nike1,4.png')">
                <img src="images/nike1,5.png" alt="Shoe Image 5" onclick="changeImage('images/nike1,5.png')">
            </div>
        </div>

        <div class="product-details">
            <h1>NikeCITY</h1>
            <p class="genders">Giày Nam</p>
            <p class="price">2,929,000₫</p>
            <div class="color-options">
                <img src="images/anh4.png" alt="Black Color" class="color" onclick="changeImage('images/anh4.png')">
                <img src="images/anh5.png" alt="White Color" class="color" onclick="changeImage('images/anh5.png')">
                <img src="images/anh6.png" alt="Gold Color" class="color" onclick="changeImage('images/anh6.png')">
            </div>
            <div class="size-selection">
                <h3>Chọn Kích Cỡ</h3>
                <div class="sizes">
                    <span>35</span>
                    <span>36</span>
                    <span>37</span>
                    <span>38</span>
                    <span>39</span>
                    <span>40</span>
                    <span>41</span>
                    <span>42</span>
                    <span>43</span>
                    <span>44</span>
                    <span>45</span>
                    <span>46</span>
                </div>
            </div>
            <button class="add-to-bag">Thêm Vào Túi</button>
            <button class="wishlist">Yêu Thích &#9825;</button>

            <div class="product-description">
                <p>Nike C1TY được thiết kế để vượt qua mọi thứ mà thành phố mang đến cho bạn. 
                    Thân giày bằng lưới giúp vừa vặn, thoáng khí, trong khi phần hông và mũi giày được
                    gia cố giúp bảo vệ đôi chân của bạn khỏi các yếu tố thời tiết. Phiên bản 'Brownstone' này
                    lấy cảm hứng từ màu sắc của thiết kế kiến trúc mang tính biểu tượng—mang đến cho phong 
                    cách đường phố một ý nghĩa hoàn toàn mới.</p>
                <ul>
                    <li>Màu sắc hiển thị: Màu sữa / Đen / Đỏ</li>
                    <li>Kiểu dáng: FZ3863-200</li>
                    <li>Quốc gia/Khu vực xuất xứ: Việt Nam</li>
                </ul>
                <a href="#" class="view-more">Xem Chi Tiết Sản Phẩm</a>
            </div>

            <div class="additional-info">
                <div class="shipping">
                    <h3>Giao hàng và trả hàng miễn phí</h3>
                    <p>Chi tiết về giao hàng và trả hàng...</p>
                </div>
                <div class="reviews">
                    <h3>Đánh giá (50) ★★★★★</h3>/-strong/-heart:>:o:-((:-h <p>Xem đánh giá của khách hàng...</p>
                </div>
            </div>
            
        </div>
        
    </main>

    <script>
        function changeImage(src) {
            document.getElementById("display-image").src = src;
        }
    </script>
</body>
</html>