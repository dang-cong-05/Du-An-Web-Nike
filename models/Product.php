<?php

class Product extends BaseModel
{
    protected $table = 'products';

    

    public function getAll(){
        $sql = "SELECT 
        h.id AS h_id, 
        h.product_name AS h_product_name, 
        h.description AS h_description, 
        h.price AS h_price, 
        h.brand AS h_brand, 
        h.model AS h_model, 
        h.color AS h_color, 
        h.size AS h_size, 
        h.material AS h_material, 
        h.stock_quantity AS h_stock_quantity, 
        h.product_image AS h_product_image, 
        h.created_at AS h_created_at, 
        h.updated_at AS h_updated_at, 
        k.id AS k_id, 
        k.category_name AS k_category_name
        FROM products h
        JOIN categories k ON h.category_id = k.id
        ORDER BY h.id DESC";
    
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
     
    


    public function getByID($id){
        $sql = "SELECT h.id AS h_id, h.product_name AS h_product_name, h.description AS h_description, 
       h.price AS h_price, h.brand AS h_brand, h.model AS h_model, h.color AS h_color, 
       h.size AS h_size, h.material AS h_material, h.stock_quantity AS h_stock_quantity, 
       h.product_image AS h_product_image, -- Thêm trường ảnh sản phẩm
       h.created_at AS h_created_at, h.updated_at AS h_updated_at, 
       k.id AS k_id, k.category_name AS k_category_name 
FROM products h 
JOIN categories k ON h.category_id = k.id 
WHERE h.id = :id"
;

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(['id' => $id]);

    return $stmt->fetch();
    
     }
}