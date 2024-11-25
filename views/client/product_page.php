<div class="container">
    <aside class="sidebar">
        <h2>Phong Cách</h2>
        <div class="filter-section">
            <h3>Giới Tính</h3>
            <label><input type="checkbox" class="filter-checkbox" data-filter="men"> Đàn Ông</label><br>
            <label><input type="checkbox" class="filter-checkbox" data-filter="women"> Phụ Nữ</label><br>
            <label><input type="checkbox" class="filter-checkbox" data-filter="unisex">Không Phân Biệt Giới Tính</label>
        </div>
        <div class="filter-section">
            <h3>Màu Sắc</h3>
            <label><input type="checkbox" class="filter-checkbox" data-filter="black">Màu Đen</label><br>
            <label><input type="checkbox" class="filter-checkbox" data-filter="blue">Màu Xanh Dương</label><br>
            <label><input type="checkbox" class="filter-checkbox" data-filter="brown">Màu Nâu</label><br>
            <label><input type="checkbox" class="filter-checkbox" data-filter="green">Màu Xanh</label><br>
            <label><input type="checkbox" class="filter-checkbox" data-filter="gray">Màu Trắng</label>
        </div>
        <div class="filter-section">
            <h3>Bộ Sưu Tập</h3>
            <label><input type="checkbox" class="filter-checkbox" data-filter="nike-c1ty-black"> Nike C1TY
                Black</label><br>
            <label><input type="checkbox" class="filter-checkbox" data-filter="nike-c1ty-blue"> Nike C1TY
                Blue</label><br>
            <label><input type="checkbox" class="filter-checkbox" data-filter="nike-c1ty-brown"> Nike C1TY
                Brown</label><br>
            <label><input type="checkbox" class="filter-checkbox" data-filter="nike-c1ty-green"> Nike C1TY
                Green</label><br>
            <label><input type="checkbox" class="filter-checkbox" data-filter="nike-c1ty-gray"> Nike C1TY
                Gray</label>
        </div>
        <div class="filter-section">
            <h3>Chiều Cao Giày</h3>
            <label><input type="checkbox" class="filter-checkbox" data-filter="nike-c1ty-black">Cổ Thấp</label><br>
            <label><input type="checkbox" class="filter-checkbox" data-filter="nike-c1ty-blue">Cổ Cao</label><br>
        </div>
    </aside>



        <main class="main-content">
            <h1>Nike C1TY Collection</h1>

         
            <div class="product-grid">
    <?php if (isset($data['products']) && count($data['products']) > 0): ?>
        <?php foreach ($data['products'] as $product): ?>
            <div class="product-card" data-category="<?= htmlspecialchars($product['brand']) ?> <?= htmlspecialchars($product['color']) ?>">
                <?php if (!empty($product['product_image'])): ?>
                    <a href="index.php?action=product_detail&id=<?=$product['id']?>">  <img 
                        src="<?= BASE_ASSETS_UPLOADS . htmlspecialchars($product['product_image']) ?>" 
                        alt="<?= htmlspecialchars($product['product_name']) ?>" 
                        width="200px"
                    ></a>
                <?php endif; ?>
                <h2><?= htmlspecialchars($product['product_name']) ?></h2>
                <p><?= number_format($product['price'], 0, ',', '.') ?>₫</p>
            </div>

            <?php endforeach  ?>

            <!-- <div class="product-card" data-category="unisex gray nike-c1ty-gray">

                <div class="product-card" data-category="unisex gray nike-c1ty-gray">

                    <img src="images/Nike Air Force 1 Shadow.png" alt="Nike Air Force 1 Shadow">
                    <h2>Nike Air Force 1 Shadow</h2>
                    <p>  2,350,000₫</p>
                </div>
                <div class="product-card" data-category="unisex gray nike-c1ty-gray">
                    <img src="images/Nike Dunk Low.png" alt="Nike Dunk Low">
                    <h2>Nike Dunk Low</h2>
                    <p> 1,000,000₫</p>
                </div>
                <div class="product-card" data-category="unisex gray nike-c1ty-gray">
                    <img src="images/Air Jordan 1 Low SE.jpg" alt="Air Jordan 1 Low SE">
                    <h2>Air Jordan 1 Low SE</h2>
                    <p> 2,999,000₫</p>
                </div>
                <div class="product-card" data-category="unisex gray nike-c1ty-gray">
                    <img src="images/Nike C1TY 'Coveralls'.png" alt=" Nike C1TY 'Coveralls'">
                    <h2> Nike C1TY 'Coveralls'</h2>
                    <p>3,499,000₫</p>
                </div>
                <div class="product-card" data-category="unisex gray nike-c1ty-gray">
                    <img src="images/Nike C1TY 'Brownstone'.jpg" alt="Nike C1TY 'Brownstone'">
                    <h2>Nike C1TY 'Brownstone'</h2>
                    <p> 3,499,000₫</p>
                </div>
                <div class="product-card" data-category="unisex gray nike-c1ty-gray">
                    <img src="images/Nike C1TY 'Street Meat'.png" alt="Nike C1TY 'Street Meat'">
                    <h2>Nike C1TY 'Street Meat'</h2>
                    <p> 1,500,000₫</p>
                </div>
                <div class="product-card" data-category="unisex gray nike-c1ty-gray">
                    <img src="images/Nike C1TY 'Concrete'.png" alt="Nike C1TY 'Concrete'">
                    <h2>Nike C1TY 'Concrete'</h2>
                    <p> 1,050,000₫</p>
                </div>
                <div class="product-card" data-category="men black nike-c1ty-black">
                    <img src="images/anh1.png" alt="Nike C1TY Pink">
                    <h2>Nike C1TY Pink</h2>
                    <p> 2,929,000₫</p>
                </div>
                <div class="product-card" data-category="women blue nike-c1ty-blue">
                    <img src="images/anh2.png" alt="Nike C1TY Black">
                    <h2>Nike C1TY Black</h2>
                    <p> 2,299,000₫</p>
                </div>
                <div class="product-card" data-category="men brown nike-c1ty">
                    <img src="images/Nike C1TY.png" alt="Nike C1TY ">
                    <h2>Nike C1TY </h2>
                    <p> 2,800,000₫</p>
                </div>
                <div class="product-card" data-category="unisex gray nike-c1ty-gray">
                    <img src="images/anh4.png" alt="Nike C1TY Gray">
                    <h2>Nike C1TY Gray</h2>
                    <p> 3,499,000₫</p>

                </div> -->
        </div>
    </main>
</div>


