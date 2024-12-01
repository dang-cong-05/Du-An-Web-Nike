<?php 
class Order extends BaseModel
{
    protected $table = "orders";

    public function getAll()
{
    $sql = "
        SELECT 
            orders.id AS orders_id,
            users.username AS users_username,
            users.email AS users_email,
            orders.product_name AS orders_product_name,
            orders.total_amount AS orders_total_amount,
            orders.status AS order_status,
            orders.created_at AS order_created_at
        FROM 
            orders
        JOIN 
            users ON orders.user_id = users.id
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
            users.username AS users_username,
            users.email AS users_email,
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
}