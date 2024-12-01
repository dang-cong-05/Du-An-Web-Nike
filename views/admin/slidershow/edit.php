<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Website_Nike/configs/env.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Website_Nike/configs/database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Website_Nike/models/SlidershowModel.php';

// Khởi tạo model
$slidershow = new SlidershowModel();

// Hiển thị thông báo nếu có
if (isset($message)) {
    echo "<p style='color: red;'>$message</p>";
}

// Lấy ID từ URL
$id = isset($_GET['id']) ? intval($_GET['id']) : null;


// Lấy dữ liệu từ database theo ID
$data = $slidershow->getByID($id);
if (!$data) {
    die('Dữ liệu không tồn tại.');
}

// Xử lý khi form được submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy thông tin từ form
    $name = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : '';
    $description = isset($_POST['description']) ? htmlspecialchars(trim($_POST['description'])) : '';

    // Mặc định giữ hình ảnh cũ nếu không có hình ảnh mới
    $imagePath = $data['image'];

    // Xử lý upload hình ảnh 
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image'];

        // Kiểm tra định dạng file
        $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
        if (in_array($image['type'], $allowedTypes)) {
            // Thực hiện upload file
            $uploadDir = PATH_ASSETS_UPLOADS . 'slidershows/';
            $fileName = time() . '-' . basename($image['name']);
            $uploadFile = $uploadDir . $fileName;

            if (move_uploaded_file($image['tmp_name'], $uploadFile)) {
                $imagePath = 'assets/uploads/slidershows/' . $fileName;
            } else {
                $message = "Lỗi khi upload file hình ảnh!";
                return;
            }
        } else {
            $message = "Định dạng file không hợp lệ. Chỉ chấp nhận jpg, png, gif.";
            return;
        }
    }

    // Chuẩn bị dữ liệu cập nhật
    $updateData = [
        'name' => $name,
        'description' => $description,
        'image' => $imagePath
    ];

    // Cập nhật dữ liệu
    $updateResult = $slidershow->update($id, $updateData);

    if ($updateResult) {
        header("Location: " . BASE_URL_ADMIN . '&action=slidershow-index');
        exit();
    } else {
        // Nếu cập nhật thất bại, hiển thị thông báo lỗi
        $message = "Cập nhật giao diện thất bại. Vui lòng thử lại!";
    }
}

?>

<!-- Hiển thị giao diện chỉnh sửa -->
<div class="container">
    <h1>Chỉnh sửa Slidershow</h1>
    <form action="<?= BASE_URL_ADMIN . '&action=slidershow-edit&id=' . $data['id'] ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="image">Hình ảnh hiện tại:</label>
            <img src="<?= BASE_URL . $data['image'] ?>" width="200" alt="Slidershow Image">
        </div>
        <div class="form-group">
            <label for="image">Chọn hình ảnh mới (tùy chọn):</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>



<style>
    .page-title {
        font-size: 1.5rem;
        margin-bottom: 20px;
        text-align: center;
        color: #333;
    }

    .form-container {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .form-label {
        font-size: 20px;
        font-weight: 500;
        color: #333;
    }

    .form-control {
        border-radius: 4px;
        padding: 10px;
        font-size: 1rem;
        border: 1px solid #ccc;
        width: 100%;
        box-sizing: border-box;
        margin-bottom: 15px;
    }

    .form-control:focus {
        border-color: #007bff;
        outline: none;
    }

    .btn {
        border-radius: 4px;
        padding: 10px 15px;
        font-size: 1rem;
        text-align: center;
        cursor: pointer;
        display: inline-block;
        margin-top: 10px;
    }

    .btn-submit {
        background-color: #007bff;
        color: #fff;
        border: none;
        width: 100%;
    }

    .btn-submit:hover {
        background-color: #0056b3;
    }

    .btn-back {
        background-color: #f0f0f0;
        color: #333;
        border: 1px solid #ccc;
        text-align: center;
        width: 100%;
        display: inline-block;
        margin-top: 10px;
    }

    .btn-back:hover {
        background-color: #e0e0e0;
    }

    .current-image {
        margin-top: 10px;
        width: 100px;
        height: auto;
        border-radius: 4px;
        border: 1px solid #ccc;
    }

    .mb-3 {
        margin-bottom: 20px;
    }

    a {
        display: inline-block;
        text-decoration: none;
        text-align: center;
        color: #007bff;
        margin-top: 15px;
        font-size: 1rem;
    }

    a:hover {
        text-decoration: underline;
    }
</style>

