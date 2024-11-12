<?php 
 class category{

    public $conn = null;

    public function __construct()
    {
        $this->conn = connection();
    }

    public function renderCategory(){
        $sql = "SELECT * FROM categories ORDER BY id ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteCategory($id){
        $sql ="DELETE FROM categories WHERE id=$id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function insertCategory($data){
        $sql = "INSERT INTO categories(category_name,description,created_at,updated_at) VALUES (:category_name, :description, :created_at, :updated_at)";
        $stmt = $this->conn->prepare($sql);
        
        $stmt->execute($data);
      
    }
   




    
}
