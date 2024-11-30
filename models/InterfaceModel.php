<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Website_Nike/configs/env.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Website_Nike/configs/Database.php';

class InterfaceModel {
    private $conn;
    private $table = 'interface';  
    public function __construct() {
        $db = new Database();  
        $this->conn = $db->getConnection();  
    }

    // Lấy tất cả giao diện
    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy giao diện theo ID
    public function getByID($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Thêm giao diện
    public function insert($data) {
        $query = "INSERT INTO " . $this->table . " (name, description, image) VALUES (:name, :description, :image)";
        $stmt = $this->conn->prepare($query);

        // Bind tham số với biến
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':description', $data['description']);

        // Kiểm tra xem có file ảnh không, nếu có, xử lý upload
        if (isset($data['image']) && $data['image']['size'] > 0) {
            $image = upload_file('Interfaces', $data['image']);  // Giả sử bạn có hàm upload_file xử lý tải ảnh
        } else {
            $image = 'default.jpg';  // Nếu không có ảnh thì gán mặc định
        }

        $stmt->bindParam(':image', $image);

        // Thực thi câu lệnh và trả về kết quả
        return $stmt->execute();
    }

    // Cập nhật giao diện
    public function update($id, $data) {
        $query = "UPDATE " . $this->table . " SET name = :name, description = :description, image = :image WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        // Bind tham số
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':description', $data['description']);

        // Kiểm tra xem có file ảnh không, nếu có, xử lý upload
        if (isset($data['image']) && $data['image']['size'] > 0) {
            $image = upload_file('Interfaces', $data['image']);  // Giả sử bạn có hàm upload_file xử lý tải ảnh
        } else {
            $image = isset($data['image']) ? $data['image'] : 'default.jpg';  // Nếu không có ảnh, giữ nguyên ảnh cũ hoặc gán mặc định
        }

        $stmt->bindParam(':image', $image);

        // Thực thi câu lệnh và trả về kết quả
        return $stmt->execute();
    }

    // Xóa giao diện
    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);

        // Thực thi câu lệnh và trả về kết quả
        return $stmt->execute();
    }
}
