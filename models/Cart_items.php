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
    public function get_str_keys($data){
        $keys = array_keys($data);
        $keystenten = array_map(function ($key){
            return "`$key`";
        },$keys);
        return implode(',', $keystenten);
    
    
    }
    public function get_virtual_params($data){
        $key=array_keys($data);
    
        $tmp = [];
        foreach($key as $key){
            $tmp[] = ":$key";
        }
        return implode(',',$tmp);
    }

    
  
    
    public function insertc($tableName, $data = [])
    {
        try {
            $columns = $this->get_str_keys($data);
            $placeholders = $this->get_virtual_params($data);
    
            $sql = "INSERT INTO $tableName ($columns) VALUES ($placeholders)";
            $stmt = $this->pdo->prepare($sql);
    
            foreach ($data as $fieldName => $value) {
                $stmt->bindValue(":$fieldName", $value);
            }
    
            $stmt->execute();
        } catch (PDOException $e) {
            error_log($e->getMessage());
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
}