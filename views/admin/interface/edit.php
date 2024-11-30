<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/WEBSITE_NIKE/configs/database.php';

$conn = (new Database())->getConnection();

// Lấy ID và loại dữ liệu từ $_GET một cách an toàn
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$type = isset($_GET['type']) ? htmlspecialchars($_GET['type']) : '';

// Kiểm tra nếu thiếu tham số ID hoặc loại
if (!$id || !$type) {
    die('Thiếu tham số ID hoặc loại');
}

// Lấy dữ liệu từ database theo loại
switch ($type) {
    case 'slideshow':
        $query = "SELECT * FROM slideshow WHERE id = ?";
        break;
    case 'image':
        $query = "SELECT * FROM product_images WHERE id = ?";
        break;
    case 'category':
        $query = "SELECT * FROM categories WHERE id = ?";
        break;
        default:
        die('Loại không hợp lệ');
}

$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id); // Bind ID vào câu truy vấn
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    die('Dữ liệu không tồn tại.');
}
?>

<div class="container">
    <h1>Chỉnh sửa <?= ucfirst($type) ?></h1>
    <form method="POST" action="<?= BASE_URL_ADMIN . '&action=interface-update&type=' . $type . '&id=' . $id ?>" enctype="multipart/form-data">

        <!-- Trường ẩn cho id -->
        <input type="hidden" name="id" value="<?= $id ?>">

        <!-- Trường Tên -->
        <?php if ($type === 'category' || $type === 'slideshow'): ?>
        <div class="mb-3">
            <label for="name" class="form-label">Tên</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($data['name']) ?>" required>
        </div>
        <?php endif; ?>

        <!-- Trường Mô tả -->
        <?php if (isset($data['description'])): ?>
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea class="form-control" id="description" name="description" rows="3"><?= htmlspecialchars($data['description']) ?></textarea>
        </div>
        <?php endif; ?>

        <!-- Trường Hình ảnh -->
        <div class="mb-3">
            <label for="image" class="form-label">Hình ảnh</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
            <?php if (!empty($data['image_url'])): ?>
                <p>Hình ảnh hiện tại:</p>
                <img src="<?= htmlspecialchars($data['image_url']) ?>" alt="Current Image" style="width: 100px;">
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="<?= BASE_URL_ADMIN . '&action=interface-index' ?>" class="btn btn-secondary">Quay lại</a>
    </form>
</div>

<?php
// Xử lý dữ liệu khi form được submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $description = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '';
    $image_url = $data['image_url']; // Giá trị mặc định là hình ảnh hiện tại

    // Xử lý upload hình ảnh (nếu có)
    if (!empty($_FILES['image']['tmp_name'])) {
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
        $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/uploads/';
        $image_name = basename($_FILES['image']['name']);
        $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);

        if (in_array($image_extension, $allowed_extensions)) {
            $image_path = $upload_dir . $image_name;
            if (move_uploaded_file($_FILES['image']['tmp_name'], $image_path)) {
                $image_url = '/uploads/' . $image_name;
            } else {
                echo "<p>Lỗi khi tải ảnh lên!</p>";
            }
        } else {
            echo "<p>Định dạng ảnh không hợp lệ! Chỉ chấp nhận JPG, JPEG, PNG, GIF.</p>";
        }
    }

    // Cập nhật dữ liệu vào cơ sở dữ liệu
    $update_query = "";
    if ($type === 'category' || $type === 'slideshow') {
        $update_query = "UPDATE " . ($type === 'category' ? 'categories' : 'slideshows') . " SET name = ?, description = ?, image_url = ? WHERE id = ?";
    }

    if ($update_query) {
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param('sssi', $name, $description, $image_url, $id);
        if ($stmt->execute()) {
            header("Location: " . BASE_URL_ADMIN . '&action=interface-index');
            exit();
        } else {
            echo "<p>Cập nhật giao diện thất bại!</p>";
        }
    }
}
?>
