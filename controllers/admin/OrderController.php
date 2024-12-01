<?php

class OrderController
{
    private $order;
    private $category;

    public function __construct()
    {
        $this->order = new Order();
        $this->category = new Category();
    }
    // Hiển thị danh sách
    public function index()
    {
        $view = 'orders/index';
        $title = 'Danh sách Đơn Hàng';
        $data = $this->order->getAll();
        
        require_once PATH_VIEW_ADMIN_MAIN;
    }
    // Hiển thị form thêm mới
    public function create()
    {
        $view = 'orders/create';
        $title = 'Thêm mới Đơn Hàng';

        $categories = $this->category->select();
        $categoryPluck = array_column($categories, 'name', 'id');

        require_once PATH_VIEW_ADMIN_MAIN;
    }
    // Lưu dữ liệu thêm mới
    public function store()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception('Yêu cầu phương thức phải là POST');
            }

            $data = $_POST + $_FILES;

            if ($data['product_name']['size'] > 0) {
                $data['product_name'] = upload_file('orders', $data['product_name']);
            } else {
                $data['product_name'] = null;
            }
            
            $rowCount = $this->order->insert($data);

            if ($rowCount > 0) {
                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Thao tác thành công!';
            } else {
                throw new Exception('Thao tác KHÔNG thành công!');
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
        }

        header('Location: ' . BASE_URL_ADMIN . '&action=orders-create');
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

            $order = $this->order->getByID($id);

            if (empty($order)) {
                throw new Exception("Đơn Hàng có ID = $id KHÔNG TỒN TẠI!");
            }

            $view = 'orders/edit';
            $title = "Cập nhật Đơn hàng có ID = $id";
            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL_ADMIN . '&action=orders-index');
            exit();
        }
    }
    // Lưu dữ liệu cập nhật theo ID
    public function update()
    {
        try {
            $id = $_GET['id'];

            $order = $this->order->find('*', 'id = :id', ['id' => $id]);

            if (empty($order)) {
                throw new Exception("Đơn hàng có ID = $id KHÔNG TỒN TẠI!");
            }

            $data = $_POST;
            $_SESSION['errors'];

            if (empty($data["product_name"]) || strlen($data["product_name"]) > 32) {
                $_SESSION['error']['product_name'] = "TÊN LOẠI bắt buộc và không quá 32 ký tự";
            }if (empty($data["total_amount"])) {
                $_SESSION['error']['total_amount'] = "Tổng tiền là bắt buộc.";
            } elseif (!is_numeric($data["total_amount"])) {
                $_SESSION['error']['total_amount'] = "Tổng tiền phải là một số.";
            } elseif (preg_match('/^0/', $data["total_amount"])) {
                $_SESSION['error']['total_amount'] = "Tổng tiền không được bắt đầu bằng số 0.";
            }if (!empty($_SESSION['errors'])) {
                throw new Exception('Dữ liệu lỗi!');
            }
            $validStatuses = ['pending', 'completed', 'cancelled', 'processing'];
            if (empty($data["status"])) {
                $_SESSION['error']['status'] = "Trạng thái là bắt buộc.";
            } elseif (!in_array($data["status"], $validStatuses)) {
                $_SESSION['error']['status'] = "Trạng thái không hợp lệ.";
            }
            
            $data['updated_at'] = date('Y-m-d H:i:s');

            $rowCount = $this->order->update($data, 'id = :id', ['id' => $id]);

            if ($rowCount > 0) {
                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Cập nhật thành công!';
            } else {
                throw new Exception('Cập nhật khôngthành công!');
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage() . ' - Line: ' . $th->getLine();

            if ($th->getCode() == 99) {
                header('Location: ' . BASE_URL_ADMIN . '&action=orders-index');
                exit();
            }
        }

        header('Location: ' . BASE_URL_ADMIN . '&action=orders-edit&id=' . $id);
        exit();
    }
    // Xóa dữ liệu theo ID
    public function delete()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception('Thiếu tham số "id"', 99);
            }

            $id = $_GET['id'];

            $order = $this->order->find('*', 'id = :id', ['id' => $id]);

            if (empty($order)) {
                throw new Exception("Book có ID = $id KHÔNG TỒN TẠI!");
            }

            $rowCount = $this->order->delete('id = :id', ['id' => $id]);

            if ($rowCount > 0) {

                if (!empty($order['product_name']) && file_exists(PATH_ASSETS_UPLOADS . $order['product_name'])) {
                    unlink(PATH_ASSETS_UPLOADS . $order['product_name']);
                }

                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Thao tác thành công!';
            } else {
                throw new Exception('Thao tác KHÔNG thành công!');
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
        }

        header('Location: ' . BASE_URL_ADMIN . '&action=orders-index');
        exit();
    }
}