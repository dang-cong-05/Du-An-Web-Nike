<?php 
class Order extends BaseModel
{
    protected $table = "orders";

    public function getAll()
{
    $sql = "
    SELECT 
        orders.id AS orders_id,
        users.name AS users_name,
        users.email AS users_email,
        users.phone AS users_phone,
        orders.product_name AS orders_product_name,
        orders.total_amount AS orders_total_amount,
        orders.status AS order_status,
        orders.created_at AS order_created_at
    FROM 
        orders
    JOIN 
        users ON orders.user_id = users.id
    JOIN
        products ON  
    ORDER BY 
        orders.created_at DESC;
";

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll();
}
public function getByID($id)
{
    $sql = "
        SELECT 
            orders.id AS orders_id,
            users.name AS users_name,
            users.email AS users_email,
            users.phone AS users_phone,
            orders.product_name AS orders_product_name,
            orders.total_amount AS orders_total_amount,
            orders.status AS order_status,
            orders.created_at AS order_created_at
        FROM 
            orders
        JOIN 
            users ON orders.user_id = users.id
        WHERE 
            orders.id = :id
        ORDER BY 
            orders.created_at DESC;
    ";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(['id' => $id]);

    return $stmt->fetch();
}
public function createOrder($userId, $name, $email, $phone, $address, $paymentMethod, $totalAmount, $shippingAddress) {
    $sql = "INSERT INTO orders (user_id,name, email, phone, shipping_address, payment_method, total_amount,produtc_name, status, created_at,updated_at)
            VALUES (:user_id ,:name, :email, :phone, :shipping_address, :payment_method, :total_amount, 'pending', NOW(),NOW())";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([
        'user_id' => $userId,
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'shipping_ address' => $address,
        'payment_method' => $paymentMethod,
        'total_amount' => $totalAmount,
        'product_name' => $productName
    ]);
    return $this->pdo->lastInsertId();
}
function addOrderItem($orderId, $productId, $quantity, $price) {
    $sql = "INSERT INTO order_items (order_id, product_id, quantity, price) 
            VALUES (:order_id, :product_id, :quantity, :price)";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([
        ':order_id' => $orderId,
        ':product_id' => $productId,
        ':quantity' => $quantity,
        ':price' => $price,
    ]);
}

function addOrder($customerId, $totalPrice) {
    $sql = "INSERT INTO orders (customer_id, total_price, created_at) 
            VALUES (:customer_id, :total_price, NOW())";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([
        ':customer_id' => $customerId,
        ':total_price' => $totalPrice,
    ]);
    return $this->pdo->lastInsertId(); // Lấy ID đơn hàng vừa tạo
}

}