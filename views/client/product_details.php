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
                <ul style="list-style: none;">
                    <li>Màu sắc:    <?= $product['h_color'] ?> </li>
                </ul>
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
            
            <a href="index.php?action=cart-add&productId=<?=$product['h_id']?>"><button class="add-to-bag">Thêm Vào Túi</button></a>
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