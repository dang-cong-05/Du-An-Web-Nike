<?php
class CartController
{

    private $product;
    private $cart;
    private $cart_item;
    public function __construct() {
        $this->product = new Product();
        $this->cart = new Cart();
        $this->cart_item = new Cart_items();
    }

    public function index() 
    {
        $view = 'cart';
        require_once PATH_VIEW_CLIENT_MAIN;
    }
   
     
    // public function cartAdd($productId)
    // {
    //     // Lấy thông tin sản phẩm
    //     $product = $this->product->showOne($productId);
    
    //     // Lưu sản phẩm vào session
    //     $_SESSION['cart'][$productId] = array_merge(
    //         $product, // Dữ liệu sản phẩm
    //         ['quantity' => 1] // Thêm số lượng
    //     );
        
    
    //     try {
    //         // Bắt đầu transaction
    //         $pdo = $this->cart->getPdo(); // Sử dụng getter để lấy PDO
    //         $pdo->beginTransaction();
    
    //         // Thêm vào bảng carts
    //         $cartId = $this->cart->insert_get_last_id('carts', ['user_id' => $_SESSION['user']['id']]);
    
    //         // Thêm vào bảng cart_items
    //         foreach ($_SESSION['cart'] as $productId => $item) {
    //             $this->cart_item->insertc('cart_items', [
    //                 'cart_id' => $cartId,
    //                 'product_id' => $productId,
    //                 'quantity' => $item['quantity'],
    //             ]);
    //         }
    
    //         // Commit giao dịch
    //         $pdo->commit();
    //     } catch (Exception $e) {
    //         // Rollback nếu có lỗi
    //         $pdo->rollBack();
    //         error_log($e->getMessage());
    //     }
    // }

    public function cartAdd($productId)
{
    try {
        // Kiểm tra session cart
        if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Ép kiểu $productId thành số nguyên
        $productId = (int)$productId;

        // Lấy thông tin sản phẩm
        $product = $this->product->showOne($productId);
      
        // Kiểm tra nếu sản phẩm là mảng hợp lệ
        if (!is_array($product) || empty($product)) {
            throw new Exception("Dữ liệu sản phẩm không hợp lệ hoặc không tìm thấy sản phẩm.");
        }

        // Lưu sản phẩm vào session
        $_SESSION['cart'][$productId] = array_merge($product, ['quantity' => 1]);
       debug($_SESSION);
        // Tiến hành giao dịch với database
        $pdo = $this->cart->getPdo();
        $pdo->beginTransaction();
       
        // Thêm vào bảng carts
       // Ví dụ sử dụng phương thức insert_get_last_id
        $cartId = $this->cart->insert_get_last_id('carts', ['user_id' => $_SESSION['user']['id']]);

        
        // Thêm vào bảng cart_items
        foreach ($_SESSION['cart'] as $productId => $item) {
            $this->cart_item->insertc('cart_items', [
                'cart_id' => $cartId,
                'product_id' => $productId,
                'quantity' => $item['quantity'],
            ]);
        }

        // Commit giao dịch
        $pdo->commit();
    } catch (Exception $e) {
        // Rollback nếu có lỗi
        if (isset($pdo)) {
            $pdo->rollBack();
        }
        error_log($e->getMessage());
        die("Đã xảy ra lỗi khi thêm sản phẩm vào giỏ hàng.");
    }
}


    
}

