<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm giao diện</title>
</head>
<body>
    <h1>Thêm giao diện mới</h1>

    <!-- Nút quay lại danh sách -->
    <a href="<?= BASE_URL_ADMIN . '&action=interface-index' ?>">Quay lại danh sách</a>

    <form method="POST" enctype="multipart/form-data" action="<?= BASE_URL_ADMIN . '&action=interface-store' ?>">
    <div class="mb-3">
        <label for="name" class="form-label">Tên giao diện</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Mô tả</label>
        <textarea class="form-control" id="description" name="description"></textarea>
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Hình ảnh</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>

    <button type="submit" class="btn btn-primary">Tạo mới</button>
</form>


    <!-- Hiển thị thông báo -->
    <?php if (isset($_SESSION['msg'])): ?>
        <div class="<?= $_SESSION['success'] ? 'success' : 'error' ?>">
            <?= htmlspecialchars($_SESSION['msg']) ?>
        </div>
        <?php unset($_SESSION['success'], $_SESSION['msg']); ?>
    <?php endif; ?>
</body>
</html>
