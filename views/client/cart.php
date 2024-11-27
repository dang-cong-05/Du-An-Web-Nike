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
                    <tr>
                        <td><img src="images/anh1.png" alt="Product Image" class="product-image" /></td>
                        <td>Giày Baseketball E35</td>
                        <td>
                            <div class="details">
                                <span>Size: 40</span><br><span>Material: Leather</span>
                            </div>
                        </td>
                        <td class="price">8700000</td>
                        <td>
                            <button class="quantity-btn" onclick="updateQuantity(this, -1)">-</button>
                            <input type="number" value="1" class="quantity" onchange="updateTotal(this)" />
                            <button class="quantity-btn" onclick="updateQuantity(this, 1)">+</button>
                        </td>
                        <td class="product-total">8700000đ</td>
                        <td><button class="remove-btn" onclick="removeProduct(this)">Xóa</button></td>
                    </tr>
                    <tr>
                        <td><img src="images/anh2.png" alt="Product Image" class="product-image" /></td>
                        <td>Giày Baseketball E35</td>
                        <td>
                            <div class="details">
                                <span>Size: 40</span><br><span>Material: Leather</span>
                            </div>
                        </td>
                        <td class="price">8700000</td>
                        <td>
                            <button class="quantity-btn" onclick="updateQuantity(this, -1)">-</button>
                            <input type="number" value="1" class="quantity" onchange="updateTotal(this)" />
                            <button class="quantity-btn" onclick="updateQuantity(this, 1)">+</button>
                        </td>
                        <td class="product-total">8700000đ</td>
                        <td><button class="remove-btn" onclick="removeProduct(this)">Xóa</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="summary-container">
            <h3>Tổng tiền giỏ hàng</h3>
            <p style="padding: 12px 0;">Tổng sản phẩm: <span id="total-items">1</span></p>
            <h3 id="grand-total">Tổng Cộng: 8700000đ</h3>
            <button class="buy-now">Thanh Toán</button>
        </div>

    </div>
    </div>