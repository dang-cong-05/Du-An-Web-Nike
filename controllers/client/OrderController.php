<?php
class Order_Controller {
    private $order;

    public function __construct() {
        $this->order = new Order();
    }

    // Trang hiển thị form đặt hàng
        public function index() {
            // Kiểm tra giỏ hàng
            $cartItems = $_SESSION['cart'] ?? [];
            $totalItems = 0;
            $totalPrice = 0;
    
            // Tính tổng số lượng và tổng tiền
            foreach ($cartItems as $item) {
                $totalItems += $item['quantity'];
                $totalPrice += $item['quantity'] * $item['price'];
            }
            if (isset($_SESSION['user'])) {
                // Lấy thông tin người dùng từ session
                $userInfo = [
                    'name' => $_SESSION['user']['name'],
                    'email' => $_SESSION['user']['email'], // giả sử bạn lưu email trong session
                    'phone' => $_SESSION['user']['phone'], // Bạn có thể để trống nếu không có số điện thoại trong session
                    'address' => '',
             // Tương tự, nếu không có thì để trống
                ];
            } else {
                $userInfo = [];
            }
        
            // Lưu thông tin người dùng vào session để hiển thị trên trang đặt hàng
            $_SESSION['userInfo'] = $userInfo;
        

        // Render form đặt hàng
        $view = "order";
        require_once PATH_VIEW_CLIENT_MAIN;
    }

    // Xử lý đặt hàng
    public function create() {
        if (empty($_SESSION['cart'])) {
            header('Location: index.php?action=cart');
            exit;
        }

        // Nhận dữ liệu từ form
        if (isset($_POST['fullname'])) {
            $name = $_POST['fullname'];
        } else {
            $name = ''; // Giá trị mặc định nếu không có dữ liệu
        }
        
        $customerName = $_POST['fullname'];
        $customerEmail = $_POST['email'];
        $customerPhone = $_POST['phone'];
        $customerAddress = $_POST['address'];
        $paymentMethod = $_POST['paymentMethod'];

        // Tính tổng tiền
        $totalAmount = 0;
        foreach ($_SESSION['cart'] as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }

        // Lưu đơn hàng vào database
        $orderId = $this->order->createOrder($customerName, $customerEmail, $customerPhone, $customerAddress, $paymentMethod, $totalAmount);

        // Lưu sản phẩm vào bảng `order_items`
        foreach ($_SESSION['cart'] as $item) {
            $this->order->addOrderItem($orderId, $item['id'], $item['quantity'], $item['price']);
        }

        // Xóa giỏ hàng
        unset($_SESSION['cart']);

        // Chuyển đến trang thành công
        header('Location: index.php?action=order-success');
    }

    // Trang đặt hàng thành công
    public function success() {
        include PATH_ROOT . "views/client/order_success.php";
    }
}
// class Database {
//     private $conn;

//     public function __construct() {
//         // Kết nối cơ sở dữ liệu
//         $this->conn = new mysqli('localhost', 'root', '', 'shoe_store');
//     }

//     public function addCustomer($name, $email, $phone, $address) {
//         $stmt = $this->conn->prepare("INSERT INTO customers (name, email, phone, address) VALUES (?, ?, ?, ?)");
//         $stmt->bind_param("ssss", $name, $email, $phone, $address);
//         $stmt->execute();
//         return $this->conn->insert_id; // Trả về ID của khách hàng
//     }

//     public function addOrder($customerId, $totalPrice) {
//         $stmt = $this->conn->prepare("INSERT INTO orders (customer_id, total_price) VALUES (?, ?)");
//         $stmt->bind_param("ii", $customerId, $totalPrice);
//         $stmt->execute();
//         return $this->conn->insert_id; // Trả về ID của đơn hàng
//     }

//     public function addOrderItem($orderId, $productId, $quantity, $price) {
//         $stmt = $this->conn->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
//         $stmt->bind_param("iiii", $orderId, $productId, $quantity, $price);
//         $stmt->execute();
//     }
// }

?>