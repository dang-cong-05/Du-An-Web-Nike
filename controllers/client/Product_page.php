<?php

class Product_pageController
{   
    
    private $product;
    private $category;

    
    public function __construct() {
        $this->product = new Product();
        $this->category = new Category(); 
      
    }
    public function index() 
    {
        $data['categories'] = $this->category->getAll();
    // Hiển thị danh sách mặc định (Top 16 sản phẩm mới nhất)
    $data['products'] = $this->product->getTop16Latest();
    
    $view = 'product_page';
    require_once PATH_VIEW_CLIENT_MAIN;
    }

public function searchProduct() {
    $keyword = $_POST['keyword'] ?? null; // Lấy từ POST hoặc null
    $cate_id = $_POST['category'] ?? null; // Lấy từ POST hoặc null

    // Lấy danh sách danh mục để hiển thị lọc
    $data['categories'] = $this->category->getAll();

    if (empty($keyword) && empty($cate_id)) {
        // Nếu không có từ khóa hoặc danh mục, hiển thị danh sách mặc định
        $data['products'] = $this->product->getTop16Latest();
    } else {
        // Nếu có từ khóa hoặc danh mục, tìm kiếm
        $data['products'] = $this->product->searchProductInCategory($keyword, $cate_id);
    }

    $view = 'product_page';
    require_once PATH_VIEW_CLIENT_MAIN;
}
// hàm ra chi sản phẩm
public function product_detail() {
    try {
        if (!isset($_GET['id'])) {
            throw new Exception('Thiếu tham số "id"', 99);
        }
        
        $id = intval($_GET['id']); // Lấy ID từ URL và chuyển đổi thành số nguyên.
        $product = $this->product->getByID($id); // Lấy thông tin sản phẩm từ model.

        if (empty($product)) {
            throw new Exception("Sản phẩm có ID = $id không tồn tại!");
        }

        // Truyền dữ liệu sang view
        $data['product'] = $product;
        $view = 'product_details';
        require_once PATH_VIEW_CLIENT_MAIN; // Render view chi tiết sản phẩm

    } catch (Throwable $th) {
        // Xử lý lỗi, có thể hiển thị thông báo lỗi hoặc điều hướng
        echo "Đã xảy ra lỗi: " . $th->getMessage();
        exit();
    }
}

    
}