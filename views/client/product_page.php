

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
                <label><input type="checkbox" class="filter-checkbox" data-filter="nike-c1ty-black"> Nike C1TY Black</label><br>
                <label><input type="checkbox" class="filter-checkbox" data-filter="nike-c1ty-blue"> Nike C1TY Blue</label><br>
                <label><input type="checkbox" class="filter-checkbox" data-filter="nike-c1ty-brown"> Nike C1TY Brown</label><br>
                <label><input type="checkbox" class="filter-checkbox" data-filter="nike-c1ty-green"> Nike C1TY Green</label><br>
                <label><input type="checkbox" class="filter-checkbox" data-filter="nike-c1ty-gray"> Nike C1TY Gray</label>
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
        <?php endforeach; ?>
    <?php else: ?>
        <!-- Hiển thị thông báo khi không tìm thấy sản phẩm -->
        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
            <p style="font-size: 25px;" class="no-results">
                <?= isset($data['keyword']) ? 'Không có sản phẩm nào phù hợp với từ khóa "' . htmlspecialchars($data['keyword']) . '"' : 'Không có sản phẩm nào' ?>
            </p>
        <?php endif; ?>
    <?php endif; ?>
</div>






            </div>
        </main>
    </div>

        
