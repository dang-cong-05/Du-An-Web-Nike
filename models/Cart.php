<?php

class Cart extends BaseModel
{
    protected $table = 'carts';
    

    
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
     // Lấy danh sách cột được bọc trong dấu ``
     public function get_str_keys($data) {
        $keys = array_keys($data);
        return implode(',', array_map(fn($key) => "`$key`", $keys));
    }

    // Lấy danh sách các placeholder dạng :key
    public function get_virtual_params($data) {
        return implode(',', array_map(fn($key) => ":$key", array_keys($data)));
    }

    // Chèn dữ liệu vào bảng và trả về ID vừa được chèn
    public function insert_get_last_id($tableName, $data = []) {
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

            return $this->pdo->lastInsertId();
        } catch (\Exception $e) {
            
            return false;
        }
    }

    // Chèn dữ liệu vào bảng nhưng không trả về ID
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
    
    public function getPdo()
    {
        return $this->pdo;
    }
}