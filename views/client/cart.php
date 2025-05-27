
<body>
    <div class="cart-container">
        <div class="shopping-cart">
            <div class="cart-title">
                <h2>Giỏ Hàng</h2>
            </div>
            <table class="cart-table">
                <thead>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Details</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Remove</th>
                </thead>
                <tbody>
                <?php if(isset($_SESSION['cart'])) : ?>
                    <?php foreach($_SESSION['cart'] as $productId => $item ) : ?>
                    <tr>
                       
                        <td><img src="<?= BASE_ASSETS_UPLOADS . $item['product_image'] ?>" alt="Product Image" class="product-image" /></td>
                        <td> <?= $item['product_name'] ?> </td>
                        <td>
                            <div class="details">
                                <span>Size: <?= $item['size'] ?> </span><br><span>Material: <?= $item['material'] ?> </span>
                            </div>
                        </td>
                        <td class="price"> <?= $item['price'] ?> </td>
                        <td>
                           <a style="text-decoration: none;" href="<?= BASE_URL .'?action=cart-dec&productId=' . $item['id']?>"> <button class="quantity-btn">-</button></a>
                            <input type="number" disabled value="<?= $item['quantity'] ?>" class="quantity"  onchange="updateTotal(this)" />
                            <a style="text-decoration: none;" href="<?= BASE_URL .'?action=cart-inc&productId=' . $item['id']?>">   <button class="quantity-btn" >+</button></a>
                        </td>
                        <td class="product-total">0đ</td>
                        <td>   <a href="<?= BASE_URL .'?action=cart-delete&productId=' . $item['id']?>"><button class="remove-btn">Xóa</button> </a>  </td>
                    </tr>
                  
                    <?php endforeach ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="summary-container">
            <h3>Tổng tiền giỏ hàng</h3>
            <p style="padding: 12px 0;">Tổng sản phẩm: <span id="total-items">1</span></p>
            <h3 id="grand-total">Tổng Cộng: 0đ</h3>
            <a href="index.php?action=order"><button class="buy-now">Thanh Toán</button></a>
        </div>

    </div>
    </div>