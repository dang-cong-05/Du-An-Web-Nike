<?php

class Cart_items extends BaseModel
{
    protected $table = 'cart_items';

    public function showOne($id){
        try{
            $sql = "SELECT * FROM products WHERE id = :id LIMIT 1";

            $stmt = $this->pdo->prepare($sql);
            
            $stmt ->bindParam(":id", $id);

            $stmt->execute();

            return $stmt->fetch();
        }catch (PDOException $e) {
            error_log($e->getMessage());
        return [];
    }

    }
    public function get_str_keys($data) {
        $keys = array_keys($data);
        return implode(',', array_map(fn($key) => "`$key`", $keys));
    }
    public function get_virtual_params($data) {
        return implode(',', array_map(fn($key) => ":$key", array_keys($data)));
    }

    
  
    
    public function insertc($tableName, $data = []) {
        try {
            if (empty($data)) {
                throw new Exception("No data provided for insertion.");
            }

            $strKeys = $this->get_str_keys($data);
            $virtualParams = $this->get_virtual_params($data);

            $sql = "INSERT INTO $tableName ($strKeys) VALUES ($virtualParams)";
            $stmt = $this->pdo->prepare($sql);

            foreach ($data as $fieldName => $value) {
                $stmt->bindValue(":$fieldName", $value);
            }

            $stmt->execute();
        } catch (\Exception $e) {
            
            return false;
        }
    }
    

    public function insert_get_last_id($tableName, $data = []) {
        try {
            $columns = implode(',', array_keys($data));
            $placeholders = implode(',', array_map(fn($key) => ":$key", array_keys($data)));
    
            $sql = "INSERT INTO $tableName ($columns) VALUES ($placeholders)";
            $stmt = $this->pdo->prepare($sql);
    
            foreach ($data as $fieldName => $value) {
                $stmt->bindValue(":$fieldName", $value);
            }
    
            $stmt->execute();
            return $this->pdo->lastInsertId(); // Sử dụng PDO kết nối trong model
        } catch (Exception $e) {
            error_log($e->getMessage());
            throw $e; // Quăng lại ngoại lệ để controller xử lý
        }
    }

    public function getPdo()
    {
        return $this->pdo;
    }

    function get_set_params($data) {
        $setParams = [];
        foreach ($data as $fieldName => $value) {
            $setParams[] = "$fieldName = :$fieldName";
        }
        return implode(', ', $setParams);
    }
    

    public function updateCartItem($cartId, $productId, $data)
{
    try {
        // Kiểm tra dữ liệu
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                throw new Exception("Trường $key chứa giá trị không hợp lệ (mảng).");
            }
        }

        $setParams = $this->get_set_params($data);
        $sql = "UPDATE cart_items SET $setParams WHERE cart_id = :cart_id AND product_id = :product_id";
        $stmt = $this->pdo->prepare($sql);

        foreach ($data as $fieldName => $value) {
            $stmt->bindValue(":$fieldName", $value);
        }

        $stmt->bindValue(":cart_id", $cartId);
        $stmt->bindValue(":product_id", $productId);

        $stmt->execute();
    } catch (\Exception $e) {
        debug($e); // Hoặc log lỗi ra file
    }
}
function deleteCartitem($cartId, $productId) {
    try {
        $sql = "DELETE FROM cart_items WHERE cart_id = :cart_id AND product_id = :product_id";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(":cart_id", $cartId);
        $stmt->bindValue(":product_id", $productId);

        $stmt->execute();
    } catch (Exception $e) {
        debug($e);
    }
}
    
}