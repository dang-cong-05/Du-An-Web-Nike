<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Website_Nike/configs/env.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Website_Nike/configs/database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Website_Nike/models/SlidershowModel.php';

class SlidershowController {
    public function index() {
        $model = new SlidershowModel();
        $data = $model->getAll();
        $view ="slidershow/index";
        require_once PATH_VIEW_ADMIN_MAIN;
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $image = $_FILES['image'];
                $uploadDir = PATH_ASSETS_UPLOADS . 'slidershows/';
                if (!file_exists($uploadDir)) mkdir($uploadDir, 0777, true);
                $fileName = time() . '-' . basename($image['name']);
                $filePath = $uploadDir . $fileName;

                if (move_uploaded_file($image['tmp_name'], $filePath)) {
                    $imagePath = 'assets/uploads/slidershows/' . $fileName;
                    $model = new SlidershowModel();
                    $model->create($imagePath);  // Không cần tiêu đề ở đây, chỉ có ảnh
                    header("Location: " . BASE_URL_ADMIN . '&action=slidershow-index');
                    exit();
                }
            }
        }
        $view ="slidershow/create";
        require_once PATH_VIEW_ADMIN_MAIN;
        
    }

    public function edit() {
        $id = intval($_GET['id']);
        $model = new SlidershowModel();
        $data = $model->getByID($id);
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Đường dẫn hình ảnh hiện tại
            $imagePath = $data['image']; // Giữ hình ảnh cũ nếu không có ảnh mới
    
            // Kiểm tra nếu có ảnh mới
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $image = $_FILES['image'];
                // Thư mục upload hình ảnh
                $uploadDir = PATH_ASSETS_UPLOADS . 'slidershows/';
    
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true); // Nếu thư mục chưa tồn tại, tạo mới
                }
    
                $fileName = time() . '-' . basename($image['name']);
                $filePath = $uploadDir . $fileName;
    
                // Thực hiện upload file
                if (move_uploaded_file($image['tmp_name'], $filePath)) {
                    $imagePath = 'assets/uploads/slidershows/' . $fileName;
                }
            }
            // Cập nhật đường dẫn hình ảnh trong cơ sở dữ liệu
            $updateResult = $model->update($id, ['image' => $imagePath]); 
            if ($updateResult) {
                header("Location: " . BASE_URL_ADMIN . '&action=slidershow-index');
                exit();
            } else {
                echo "<p>Cập nhật hình ảnh thất bại. Vui lòng thử lại!</p>";
            }
        }
        $view ="slidershow/edit";
        require_once PATH_VIEW_ADMIN_MAIN;
    }

    public function delete() {
        $id = intval($_GET['id']);
        $model = new SlidershowModel();
        $model->delete($id);
        header("Location: " . BASE_URL_ADMIN . '&action=slidershow-index');
        exit();
    }

        public function store() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                    $image = $_FILES['image'];
                    $uploadDir = PATH_ASSETS_UPLOADS . 'slidershows/';
                    if (!file_exists($uploadDir)) mkdir($uploadDir, 0777, true);
                    $fileName = time() . '-' . basename($image['name']);
                    $filePath = $uploadDir . $fileName;
    
                    if (move_uploaded_file($image['tmp_name'], $filePath)) {
                        $imagePath = 'assets/uploads/slidershows/' . $fileName;
                        $model = new SlidershowModel();
                        $model->create($imagePath);  // Lưu slider mới vào cơ sở dữ liệu
                        header("Location: " . BASE_URL_ADMIN . '&action=slidershow-index');
                        exit();
                    }
                }
            }
      
            $view ="slidershow/create.php";
            require_once PATH_VIEW_ADMIN_MAIN;
            // Chuyển tới view tạo slider mới
        }
    
        // Phương thức update() - cập nhật slider
        public function update() {
            $id = intval($_GET['id']);
            $model = new SlidershowModel();
            $data = $model->getByID($id);
    
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $imagePath = $data['image'];  // Giữ lại hình ảnh cũ nếu không có hình ảnh mới
    
                // Kiểm tra nếu có ảnh mới
                if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                    $image = $_FILES['image'];
                    $uploadDir = PATH_ASSETS_UPLOADS . 'slidershows/';
                    if (!file_exists($uploadDir)) mkdir($uploadDir, 0777, true);
                    $fileName = time() . '-' . basename($image['name']);
                    $filePath = $uploadDir . $fileName;
    
                    if (move_uploaded_file($image['tmp_name'], $filePath)) {
                        $imagePath = 'assets/uploads/slidershows/' . $fileName;
                    }
                }
                $updateResult = $model->update($id, ['image' => $imagePath]);
    
                if ($updateResult) {
                    header("Location: " . BASE_URL_ADMIN . '&action=slidershow-index');
                    exit();
                } else {
                    echo "<p>Cập nhật hình ảnh thất bại. Vui lòng thử lại!</p>";
                }
            }
    
            $view ="slidershow/edit";
            require_once PATH_VIEW_ADMIN_MAIN;
        }
}

?>
