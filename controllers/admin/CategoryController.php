<?php

class CategoryController
{
    private $category;
    public function __construct()
    {
        $this->category = new Category();
    }

    public function index()
    {
        $view = 'categories/index';
        $title = "Danh sách loại sản phẩm";
        $data = $this->category->select('*', '1 = 1 ORDER BY id ASC');

        require_once PATH_VIEW_ADMIN_MAIN;
    }

    public function create()
    {
        $view = 'categories/create';
        $title = "Thêm mới loại giày";

        require_once PATH_VIEW_ADMIN_MAIN;
    }

    public function store()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception("Yêu cầu là POST");
            }
            $data = $_POST;
            $_SESSION['errors'] = [];

            if (empty($data['category_name']) > 32) {
                $_SESSION['errors']['category_name'] = "Trường tên loại giày (category_name) bắt buộc và độ dài không quá 32 ký tự.";
            }
            if (empty($data['description']) > 200) {
                $_SESSION['errors']['description'] = "Trường mô tả(description) bắt buộc và độ dài không quá 200 ký tự.";
            }
            if (!empty($_SESSION['errors'])) {
                $_SESSION['data'] = $data;

                throw new Exception('Dữ liệu lỗi!');
            }
            $rowCount = $this->category->insert($data);

            if ($rowCount > 0) {
                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Thêm loại giày thành công!';
            } else {
                throw new Exception("Thêm không thành công");
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
        }

        header('Location: ' . BASE_URL_ADMIN . '&action=categories-index');
        exit();
    }

    public function edit()
    {
        try {



            $id = $_GET['id'];

            $category = $this->category->find('*', 'id = :id', ['id' => $id]);

            if (empty($category)) {
                throw new Exception("Category có ID = $id không tồn tại");
            }

            $view = 'categories/edit';
            $title = "Cập nhật loại sản phẩm có ID =  $id";
            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
            header('Location: ' . BASE_URL_ADMIN . 'action=categories-index');

        }
    }

    public function update()
    {
        try {
            $id = $_GET['id'];

            $category = $this->category->find('*', 'id = :id', ['id' => $id]);

            if (empty($category)) {
                throw new Exception("Category có ID = $id không tồn tại");
            }

            $data = $_POST;

            $_SESSION['errors'];


            if (empty($data["category_name"]) || strlen($data["category_name"]) > 32) {
                $_SESSION['error']['category_name'] = "TÊN LOẠI bắt buộc và không quá 32 ký tự";
            }

            if (empty($data["description"]) || strlen($data["description"]) > 200) {
                $_SESSION['error']['description'] = "mô tả  không quá 200 ký tự";
            }
            if (!empty($_SESSION['errors'])) {
                throw new Exception('Dữ liệu lỗi!');
            }

            $rowCount = $this->category->update($data, 'id = :id', ['id' => $id]);

            if ($rowCount > 0) {
                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'cập nhật thành công';
            } else {
                throw new Exception('cập nhật không thành công');
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = true;
            $_SESSION['msg'] = $th->getMessage() . ' - Line ' . $th->getLine();
            if ($th->getCode() == 99) {
                header('Location: ' . BASE_URL_ADMIN . '$action=categories-index');
                exit();
            }
        }
        header('Location:' . BASE_URL_ADMIN . '&action=categories-edit&id='.    $id);
        exit;
    }

    public function delete()
    {
        try{
            $id = $_GET['id'];

            $category = $this->category->find('*', 'id = :id', ['id' => $id]);
             
            if (empty($category)) {
                throw new Exception("Category có mã id = $id, không tồn tại");
            }

            $rowCount = $this->category->delete('id = :id', ['id' => $id]);

            if($rowCount > 0){
                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'xóa thành công!';
            }else{
                throw new Exception('xóa không thành công');
            }

        }catch (\Throwable $th){
            $_SESSION ['success'] = false;
            $_SESSION ['msg'] = $th->getMessage();
        }

        header("Location: " . BASE_URL_ADMIN . '&action=categories-index');
        exit();
    }
}