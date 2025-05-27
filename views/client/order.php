<style>
/* Tổng thể */
.container {
  display: flex;
  justify-content: space-between;
  gap: 40px;
  max-width: 1200px;
  margin: auto;
  padding: 40px;
  background: linear-gradient(145deg, #f2f2f2, #ffffff);
  border-radius: 20px;
  box-shadow: 8px 8px 20px rgba(0, 0, 0, 0.1), -8px -8px 20px rgba(255, 255, 255, 0.6);
  font-family: "Poppins", Arial, sans-serif;
}

/* Cột trái (Form nhập liệu và phương thức thanh toán) */
.col-md-8 {
  flex: 1;
  padding: 20px;
  background: #ffffff;
  border-radius: 15px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

/* Cột phải (Thông tin sản phẩm và đặt hàng) */
.col-md-4 {
  flex: 0.45;
  padding: 20px;
  background: #ffffff;
  border-radius: 15px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

/* Cột phải Card thông tin sản phẩm */
.card {
  border: none;
  border-radius: 15px;
  background: linear-gradient(145deg, #ffffff, #f8f9fa);
  box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.15), -5px -5px 20px rgba(255, 255, 255, 0.6);
  margin-bottom: 30px;
}

.card-header {
  background: linear-gradient(135deg, #007bff, #0056b3);
  color: white;
  text-align: center;
  padding: 25px;
  font-size: 24px;
  font-weight: bold;
  border-radius: 15px 15px 0 0;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.card-body {
  padding: 25px;
}

.card-body p {
  margin: 25px 0;
  font-size: 20px;
  color: #333;
  line-height: 1.6;
}

.card-body .product-price {
  font-size: 24px;
  font-weight: bold;
  color: #28a745;
}

.card-body .product-quantity input {
  font-size: 18px;
  padding: 15px;
  border-radius: 10px;
  border: 1px solid #ccc;
  width: 100%;
}

.card-footer {
  text-align: center;
  padding: 20px;
  background: #f8f9fa;
  border-radius: 0 0 15px 15px;
}

/* Nút Đặt Hàng */
.card-footer .btn {
  display: inline-block;
  padding: 20px 30px;
  font-size: 20px;
  color: white;
  background: linear-gradient(135deg, #28a745, #218838);
  border: none;
  border-radius: 30px;
  cursor: pointer;
  transition: all 0.3s ease;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.card-footer .btn:hover {
  background: linear-gradient(135deg, #218838, #28a745);
  transform: translateY(-3px);
  box-shadow: 0 8px 18px rgba(0, 0, 0, 0.3);
}

/* Form nhập liệu */
form .mb-3 {
  margin-bottom: 25px;
}

form label {
  font-weight: bold;
  font-size: 18px;
  color: #555;
}

form input, form textarea {
  font-size: 16px;
  padding: 15px;
  border-radius: 10px;
  border: 1px solid #ccc;
  width: 100%;
  box-sizing: border-box;
}

/* Radio buttons */
.form-check {
  margin-bottom: 20px;
}

.form-check-input {
  margin-right: 15px;
}
.error-message {
    color: red;
    font-size: 14px;
    margin-top: 10px;
  }

  .form-control.error {
    border-color: red;
  }

  .form-control.success {
    border-color: green;
  }
/* Responsive */
@media (max-width: 768px) {
  .container {
    flex-direction: column;
    padding: 20px;
  }
  .col-md-8, .col-md-4 {
    flex: 1;
    width: 100%;
    margin-bottom: 30px;
  }
  .card {
    margin-top: 20px;
  }
}
</style>

<div class="container mt-5">
    <div class="col-md-8">
    <form action="index.php?action=order-save" method="POST" id="orderForm">
    <div class="mb-3">
        <label for="fullname" class="form-label">Họ và Tên</label>
        <input type="text" name="fullname" id="fullname" class="form-control" 
        value="<?= isset($_SESSION['userInfo']['name']) ? $_SESSION['userInfo']['name'] : '' ?>" 
        placeholder="Nhập họ và tên" required />
        <div class="error-message" id="fullname-error"></div>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" 
        value="<?= isset($_SESSION['userInfo']['email']) ? $_SESSION['userInfo']['email'] : '' ?>"
        placeholder="Nhập email" required />
        <div class="error-message" id="email-error"></div>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Số Điện Thoại</label>
        <input type="tel" name="phone" id="phone" class="form-control" 
        value="<?= isset($_SESSION['userInfo']['phone']) ? $_SESSION['userInfo']['phone'] : '' ?>" 
        placeholder="Nhập số điện thoại" required />
        <div class="error-message" id="phone-error"></div>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Địa chỉ giao hàng</label>
        <textarea name="address" id="address" class="form-control" rows="3" 
        placeholder="Nhập địa chỉ giao hàng" required><?= isset($_SESSION['userInfo']['address']) ? $_SESSION['userInfo']['address'] : '' ?></textarea>
        <div class="error-message" id="address-error"></div>
    </div>
    <div class="mb-3">
        <label class="form-label">Phương thức thanh toán</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="paymentMethod" id="paymentCash" value="cash" checked />
            <label class="form-check-label" for="paymentCash">Thanh toán khi nhận hàng</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="paymentMethod" id="paymentCard" value="card" />
            <label class="form-check-label" for="paymentCard">Thẻ tín dụng</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="paymentMethod" id="paymentATM" value="atm" />
            <label class="form-check-label" for="paymentATM">Thanh toán bằng ATM</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMomo" value="momo" />
            <label class="form-check-label" for="paymentMomo">Thanh toán bằng Momo</label>
        </div>
        <div class="error-message" id="paymentMethod-error"></div>
    </div>

    <button type="submit" class="btn btn-success" id="orderButton">Đặt Hàng</button>
    </form>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                Thông Tin Sản Phẩm
            </div>
            <div class="card-body">
                <?php if (!empty($cartItems)) : ?>
                    <?php foreach ($cartItems as $item) : ?>
                        <p>
                            <strong>Sản phẩm:</strong> <?= $item['product_name'] ?><br>
                            <strong>Giá:</strong> <?= number_format($item['price'], 0, ',', '.') ?> VND<br>
                            <strong>Số lượng:</strong> <?= $item['quantity'] ?><br>
                            <strong>Thành tiền:</strong> <?= number_format($item['quantity'] * $item['price'], 0, ',', '.') ?> VND
                        </p>
                        <hr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>Giỏ hàng trống.</p>
                <?php endif; ?>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Đặt Hàng</button>
            </div>
        </div>
    </div>
</div>


