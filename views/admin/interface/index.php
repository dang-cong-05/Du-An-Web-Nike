<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'Danh sách giao diện' ?></title>
</head>
<body>
    <h1>Danh sách giao diện</h1>
    <a href="<?= BASE_URL_ADMIN . '&action=interface-create' ?>">Thêm giao diện</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Mô tả</th>
            <th>Hình Ảnh</th>
            <th>Hành động</th>
        </tr>
        <?php foreach ($Interfaces as $Interface): ?>
        <tr>
            <td><?= htmlspecialchars($Interface['id']) ?></td>
            <td><?= htmlspecialchars($Interface['name']) ?></td>
            <td><?= htmlspecialchars($Interface['description']) ?></td>
            <td><img src="<?= htmlspecialchars($Interface['image']) ?>" alt="Image" width="100"></td>
            <td>
                <a href="<?= BASE_URL_ADMIN . '&action=interface-edit&id='?><?= $Interface['id'] ?>">Sửa</a>
                <a href="<?= BASE_URL_ADMIN . '&action=interface-delete&id='?><?= $Interface['id'] ?>">Xóa</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
