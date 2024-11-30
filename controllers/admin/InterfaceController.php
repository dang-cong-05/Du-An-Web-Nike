<?php

class InterfaceController
{
    private $Interface;

    public function __construct()
    {
        $this->Interface = new InterfaceModel(); // Khởi tạo model
    }

    // Danh sách giao diện
    public function index()
    {
        $view = 'interface/index'; 
        $title = 'Giao diện';
        $Interfaces = $this->Interface->getAll();
        require_once PATH_VIEW_ADMIN_MAIN;
    }

    // Tạo mới giao diện
    public function create()
    {
    try {
        $view = 'interface/create';
        $title = 'Thêm mới giao diện';
        $Interfaces = $this->Interface->getAll();

        require_once PATH_VIEW_ADMIN_MAIN;
        
    }catch (\Throwable $th) {
        // Nếu có lỗi, lưu thông báo và quay lại trang tạo mới
        $_SESSION['success'] = false;
        $_SESSION['msg'] = $th->getMessage();

        header('Location: ' . BASE_URL_ADMIN . '&action=interface-create');
        exit();
    }
}
    
    // Xử lý lưu giao diện mới
    public function store()
{
    try {
        // Kiểm tra phương thức POST
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            throw new Exception('Yêu cầu phương thức phải là POST');
        }

        // Lấy dữ liệu từ form và file upload
        $data = $_POST + $_FILES;

        // Kiểm tra và xử lý file ảnh (nếu có)
        if (!empty($data['image']['name']) && $data['image']['size'] > 0) {
            // Giả sử bạn có hàm upload_file để xử lý tải file
            $data['image'] = upload_file('Interfaces', $data['image']);
        } else {
            // Nếu không có ảnh, gán giá trị null
            $data['image'] = null;
        }

        // Thực hiện insert dữ liệu vào cơ sở dữ liệu
        $rowCount = $this->Interface->insert($data);

        if ($rowCount > 0) {
            $_SESSION['success'] = true;
            $_SESSION['msg'] = 'Thêm mới giao diện thành công!';
        } else {
            throw new Exception('Thêm mới giao diện KHÔNG thành công!');
        }

        // Chuyển hướng về trang danh sách giao diện
        header('Location: ' . BASE_URL_ADMIN . '&action=interface-index');
        exit();
    } catch (\Throwable $th) {
        // Nếu có lỗi, lưu thông báo và quay lại trang tạo mới
        $_SESSION['success'] = false;
        $_SESSION['msg'] = $th->getMessage();

        header('Location: ' . BASE_URL_ADMIN . '&action=interface-create');
        exit();
    }
}





    // Sửa giao diện
    public function edit()
{
    try {
        // Lấy tham số ID từ URL
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;

        // Kiểm tra tham số ID
        if (!$id || $id <= 0) {
            throw new Exception('Thiếu tham số ID hoặc ID không hợp lệ');
        }

        // Lấy dữ liệu giao diện từ Model
        $Interface = $this->Interface->getByID($id);

        // Kiểm tra nếu không tìm thấy giao diện
        if (!$Interface) {
            throw new Exception("Giao diện với ID $id không tồn tại");
        }

        // Gán tiêu đề và truyền dữ liệu qua view
        $title = 'Cập nhật giao diện';

        require_once $_SERVER['DOCUMENT_ROOT'] . '/Website_Nike/views/admin/interface/edit.php';
    } catch (\Throwable $th) {
        // Ghi lại lỗi và chuyển hướng
        $_SESSION['success'] = false;
        $_SESSION['msg'] = $th->getMessage();

        header('Location: ' . BASE_URL_ADMIN . '&action=interface-index');
        exit();
    }
}


    // Cập nhật giao diện
    public function update()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                throw new Exception('Yêu cầu phương thức POST');
            }

            $id = $_GET['id'] ?? null;
            if (!$id) {
                throw new Exception('Thiếu tham số ID');
            }

            // Lấy dữ liệu từ form
            $data = $_POST;

            // Xử lý file upload (nếu có)
            if (!empty($_FILES['Interface_image']['name'])) {
                $data['Interface_image'] = upload_file('Interfaces', $_FILES['Interface_image']);
            }

            // Cập nhật dữ liệu
            if ($this->Interface->update($id, $data)) {
                $_SESSION['success'] = true;
                $_SESSION['msg'] = "Cập nhật giao diện thành công!";
            } else {
                throw new Exception('Cập nhật giao diện thất bại!');
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
        }

        header('Location:' . BASE_URL_ADMIN . '&action=interface-index');
        exit();
    }


    // Xóa giao diện
    public function delete()
    {
        try {
            $id = $_GET['id'] ?? null;
            if (!$id) {
                throw new Exception('Thiếu tham số ID');
            }

            // Xóa giao diện theo ID
            if ($this->Interface->delete($id)) {
                $_SESSION['success'] = true;
                $_SESSION['msg'] = "Xóa giao diện thành công!";
            } else {
                throw new Exception('Xóa giao diện thất bại!');
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
        }

        header('Location:'. BASE_URL_ADMIN .'&action=interface-index');
        exit();
    }
}
