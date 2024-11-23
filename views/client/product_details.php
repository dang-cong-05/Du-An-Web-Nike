<!-- 

/*??
    <main class="product-container">
        <div class="gallery">
            <div class="main-image">
                <img id="display-image" src="images/nike1.png" alt="Main Product Image">
                <button class="arrow left">&#10094;</button>
                <button class="arrow right">&#10095;</button>
            </div>

            <div class="thumbnail-images">
                <img src="images/nike1,1.png" alt="Shoe Image 1" onclick="changeImage('images/nike1,1.png')">
                <img src="images/nike1,2.png" alt="Shoe Image 2" onclick="changeImage('images/nike1,2.png')">
                <img src="images/nike1,3.jpg" alt="Shoe Image 3" onclick="changeImage('images/nike1,3.jpg')">
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
                    <h3>Đánh giá (50) ★★★★★</h3>
                    <p>Xem đánh giá của khách hàng...</p>
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
</html> -->




    <main class="product-container">
        <div class="gallery">
            <div class="main-image">

                <img id="display-image" src="<?= BASE_ASSETS_UPLOADS . $product['h_product_image'] ?>" alt="<?= $product['h_product_name'] ?>">


                <button class="arrow left">&#10094;</button>
                <button class="arrow right">&#10095;</button>
            </div>

            <div class="thumbnail-images">
                <img src="images/nike1,1.png" alt="Shoe Image 1" onclick="changeImage('images/nike1,1.png')">
                <img src="images/nike1,2.png" alt="Shoe Image 2" onclick="changeImage('images/nike1,2.png')">
                <img src="images/nike1,3.jpg" alt="Shoe Image 3" onclick="changeImage('images/nike1,3.jpg')">
                <img src="images/nike1,4.png" alt="Shoe Image 4" onclick="changeImage('images/nike1,4.png')">
                <img src="images/nike1,5.png" alt="Shoe Image 5" onclick="changeImage('images/nike1,5.png')">
            </div>
        </div>

        <div class="product-details">
            <h1><?= $product['h_product_name'] ?></h1>
            <p class="genders"><?= $product['k_category_name'] ?></p>
            <br>
            <p  class="price"><?= number_format($product['h_price'], 0, ',', '.') ?>₫</p style="font-weight: 25px; ">
            
            <div class="color-options">
                <!-- Giả sử bạn có thêm các màu khác từ cơ sở dữ liệu -->
                <img src="<?= $product['h_product_image'] ?>" alt="Color Option" class="color" onclick="changeImage('<?= $product['h_product_image'] ?>')">
            </div>

            <div class="size-selection">
                <h3>Chọn Kích Cỡ</h3>
                <div class="sizes">
                    <!-- Giả sử kích cỡ được hiển thị động -->
                    <span>35</span>
                    <span>39</span>
                    <span>40</span>
                    <span>41</span>
                    <span>42</span>
                    <span>43</span>
           
                </div>
            </div>
            
            <button class="add-to-bag">Thêm Vào Túi</button>
            <button class="wishlist">Yêu Thích &#9825;</button>

            <div class="product-description">
                <p><?= $product['h_description'] ?></p>
                <ul>
                    <li>Thương hiệu: <?= $product['h_brand'] ?></li>
                    <li>Model: <?= $product['h_model'] ?></li>
                    <li>Chất liệu: <?= $product['h_material'] ?></li>
                    <li>Tồn kho: <?= $product['h_stock_quantity'] ?></li>
                    <li>Xuất xứ: Việt Nam</li>
                </ul>
                <a href="#" class="view-more">Xem Chi Tiết Sản Phẩm</a>
            </div>
            <div class="additional-info">
                <div class="shipping">
                    <h3>Giao hàng và trả hàng miễn phí</h3>
                    <p>Chi tiết về giao hàng và trả hàng...</p>
                </div>
                <div class="reviews">
                    <h3>Đánh giá (50) ★★★★★</h3>
                    <p>Xem đánh giá của khách hàng...</p>
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