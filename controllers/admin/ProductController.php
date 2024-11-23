<?php

class ProductController
{
    private $product;
    private $category;


    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
    }

    public function index(){
        $view = 'products/index';
        $title = 'Danh sách sản phẩm';
        $data  = $this->product->getAll();
        
        require_once PATH_VIEW_ADMIN_MAIN;
    }

    public function create(){
        $view = 'products/create';
        $title = "Thêm mới sản phẩm";

        $categories = $this->category->select();
        $categoryPluck = array_column($categories, 'category_name' , 'id');
        require_once PATH_VIEW_ADMIN_MAIN;
    }

    public function store (){
        try {
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception('Yêu cầu phương thức phải là POST');
            }
            
            $data = $_POST + $_FILES;

            if($data['product_image']['size'] > 0){
                $data['product_image']= upload_file('products', $data['product_image']);       
            }else{
                $data['product_image']=null;
            }
          
            $rowCount = $this->product->insert($data);

            if($rowCount > 0){
                $_SESSION['success']= true;
                $_SESSION['msg']= "Thêm thành công";

            }else{
                throw new Exception('Thêm không thành công');
            }

            
        }catch (\Throwable $th){
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
        }
        
        header('Location:' . BASE_URL_ADMIN . '&action=products-create' );
        exit();
    }
// Hiển thị form cập nhật theo ID
    public function edit()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception('Thiếu tham số "id"', 99);
            }

            $id = $_GET['id'];

            $product = $this->product->getByID($id);

            if (empty($product)) {
                throw new Exception("Sản phẩm có ID = $id KHÔNG TỒN TẠI!");
            }

            $view = 'products/edit';
            $title = "Cập nhật sản phẩm có ID = $id";

            $categories = $this->category->select();
            //$categoryPluck = array_column($categories, 'name', 'id');
            $categoryPluck = array_column($categories, 'category_name', 'id');




            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL_ADMIN . '&action=products-index');
            exit();
        }
    }

    public function update()
    {
        try{
            if($_SERVER['REQUEST_METHOD'] !='POST'){
            throw new Exception('Phải là phương thức POST');

            }

            if (!isset($_GET['id'])) {
                throw new Exception('Thiếu tham số "id"', 99);
            }

            $id = $_GET['id'];

            $product = $this->product->find('*', 'id = :id', ['id' => $id]);

            if (empty($product)) {
                throw new Exception("Sản phẩm có ID = $id KHÔNG TỒN TẠI!");
            }

            $data = $_POST + $_FILES;

            if ($data['product_image']['size'] > 0) {
                $data['product_image'] = upload_file('product', $data['product_image']);
            } else {
                $data['product_image'] = $product['product_image'];
            }

            $rowCount = $this->product->update($data, 'id = :id', ['id' => $id]);

            if ($rowCount > 0) {

                if (
                    $_FILES['product_image']['size'] > 0
                    && !empty($product['product_image'])
                    && file_exists(PATH_ASSETS_UPLOADS . $product['product_image'])
                ) {
                    unlink(PATH_ASSETS_UPLOADS . $product['product_image']);
                }

                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Sửa thành công!';
            } else {
                throw new Exception('Sửa không thành công!');
            }

        }catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage() . ' - Line: ' . $th->getLine();

            if ($th->getCode() == 99) {
                header('Location: ' . BASE_URL_ADMIN . '&action=products-index');
                exit();
            }
            header('Location: ' . BASE_URL_ADMIN . '&action=products-edit&id=' . $id);
            exit();
        
            
        }
        header('Location: ' . BASE_URL_ADMIN . '&action=products-index');
        exit();
    }


    public function delete()
    {


        try 
        {
            if(!isset($_GET['id'])){
                throw new Exception('Thiếu tham số "id"', 100);
            }

            $id = $_GET['id'];

            $product = $this->product->find('*', 'id = :id', ['id' => $id]);

            if(empty($product)){
                throw new Exception("Sản phẩm này không tồn tại");
            }

            $rowCount = $this ->product->delete('id = :id', ['id' => $id]);

            if ($rowCount > 0) {

                if (!empty($product['product_image']) && file_exists(PATH_ASSETS_UPLOADS . $product['product_image'])) {
                    unlink(PATH_ASSETS_UPLOADS . $product['product_image']);
                }

                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Xóa thành công!';
            } else {
                throw new Exception('xóa không thành công!');
            }
        }catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
        }

        header('Location: ' . BASE_URL_ADMIN . '&action=products-index');
        exit();
    }

}