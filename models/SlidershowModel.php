<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Website_Nike/configs/database.php';

class SlidershowModel {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM slidershow");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByID($id) {
        $stmt = $this->db->prepare("SELECT * FROM slidershow WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($imagePath) {
        $stmt = $this->db->prepare("INSERT INTO slidershow (image) VALUES (:image)");
        $stmt->bindParam(':image', $imagePath);
        return $stmt->execute();
    }

    public function update($id, $updateData) {
        if (isset($updateData['image'])) {
            $sql = "UPDATE slidershow SET image = :image WHERE id = :id";
            $stmt = $this->db->prepare($sql);
    
            $stmt->bindParam(':image', $updateData['image']);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        }
        return false; 
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM slidershow WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
