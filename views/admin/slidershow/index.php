<div class="container">
    <h1>Danh sách Slidershow</h1>
    <a href="<?= BASE_URL_ADMIN . '&action=slidershow-create' ?>" class="btn btn-success">Thêm mới</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Hình ảnh</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['id']) ?></td>
                    <td><img src="<?= BASE_URL . $item['image'] ?>" width="100"></td>
                    <td>
                        <a href="<?= BASE_URL_ADMIN . '&action=slidershow-edit&id=' . $item['id'] ?>" class="btn btn-warning">Sửa</a>
                        <a href="<?= BASE_URL_ADMIN . '&action=slidershow-delete&id=' . $item['id'] ?>" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
