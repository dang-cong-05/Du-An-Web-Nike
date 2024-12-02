<?php
class CartController
{

    private $product;
    private $cart;
    private $cart_item;
    public function __construct()
    {
        $this->product = new Product();
        $this->cart = new Cart();
        $this->cart_item = new Cart_items();
    }

    public function index()
    {
        $view = 'cart';
        require_once PATH_VIEW_CLIENT_MAIN;
    }




    public function cartAdd($productId)
    {
        try {



            // Lấy thông tin sản phẩm
            $product = $this->product->showOne($productId);



            // Lưu sản phẩm vào session
            $_SESSION['cart'][$productId] = array_merge($product, ['quantity' => 1]);

            // Tiến hành giao dịch với database
            $pdo = $this->cart->getPdo();
            // $pdo->beginTransaction();

            $cart = $this->cart->showOneCart('carts', ['user_id' => $_SESSION['user']['id']]);

            if (empty($cart)) {
                $cartId = $this->cart->insert_get_last_id('carts', ['user_id' => $_SESSION['user']['id']]);
            } else {
                $cartId = $cart['id'];
            }
            // Thêm vào bảng carts

            $_SESSION['cart_Id'] = $cartId;

            // Thêm vào bảng cart_items

            $this->cart_item->insertc('cart_items', [
                'cart_id' => $cartId,
                'product_id' => $productId,
                'quantity' => 1,
            ]);



            // $pdo->commit();
        } catch (Exception $e) {
            // Rollback nếu có lỗi
            if (isset($pdo)) {
                // $pdo->rollBack();
            }
            error_log($e->getMessage());
            die("Đã xảy ra lỗi khi thêm sản phẩm vào giỏ hàng.");
        }
        header('Location:' . BASE_URL . '?action=cart-List');
    }


    public function cartList()
    {
        $view = "cart";
        require_once PATH_VIEW_CLIENT_MAIN;
    }

    public function cartInc($productId)
    {
        // Kiểm tra xem sản phẩm có tồn tại trong session giỏ hàng không
        if (isset($_SESSION['cart'][$productId])) {
            // Tăng số lượng sản phẩm trong session
        $_SESSION['cart'][$productId]['quantity'] += 1;

        // Cập nhật số lượng vào cơ sở dữ liệu
        $this->cart_item->updateCartItem($_SESSION['cart_Id'], $productId, [
            'quantity' => $_SESSION['cart'][$productId]['quantity']
        ]);
        }

       

        // Redirect trở lại danh sách giỏ hàng hoặc trang hiện tại
        header('Location: ' . BASE_URL . '?action=cart-List');
    }

    public function cartDec($productId)
    {
        // Kiểm tra xem sản phẩm có tồn tại trong session giỏ hàng không
        if (isset($_SESSION['cart'][$productId]) && $_SESSION['cart'][$productId]['quantity'] > 1) {

            // Giam số lượng sản phẩm trong session
            $_SESSION['cart'][$productId]['quantity'] -= 1;

            // Cập nhật số lượng vào cơ sở dữ liệu
            $this->cart_item->updateCartItem($_SESSION['cart_Id'], $productId, [
                'quantity' => $_SESSION['cart'][$productId]['quantity']
            ]);
        }
        // Redirect trở lại danh sách giỏ hàng hoặc trang hiện tại
        header('Location: ' . BASE_URL . '?action=cart-List');
    }

    public function cartDelete($productId)
    {
        // Kiểm tra xem sản phẩm có tồn tại trong session giỏ hàng không
        if (isset($_SESSION['cart'][$productId])) {

            unset($_SESSION['cart'][$productId]);

            // Cập nhật số lượng vào cơ sở dữ liệu
            $this->cart_item->deleteCartitem($_SESSION['cart_Id'], $productId);
        }
        // Redirect trở lại danh sách giỏ hàng hoặc trang hiện tại
        header('Location: ' . BASE_URL . '?action=cart-List');
    }
}
