<?php
if (isset($_SESSION['success'])) {
    $class = $_SESSION['success'] ? 'alert-success' : 'alert-danger';

    echo "<div class='alert $class'> {$_SESSION['msg']} </div>";

    unset($_SESSION['success']);
    unset($_SESSION['msg']);
}
?>

<?php if (!empty($_SESSION['errors'])): ?>

    <div class="alert alert-danger">

        <ul>
            <?php foreach ($_SESSION['errors'] as $value): ?>

                <li> <?= $value ?> </li>

            <?php endforeach; ?>
        </ul>

    </div>

    <?php unset($_SESSION['errors']); ?>

<?php endif; ?>


<form action="<?= BASE_URL_ADMIN . '&action=categories-store' ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
        <label for="name" class="form-label">Tên Loại giày</label>
        <input type="text" class="form-control" name="category_name" value="<?= $_SESSION['data']['category_name'] ?? null ?>">
    </div>
    <div class="mb-3 mt-3">
        <label for="name" class="form-label">Mô tả</label>
        <textarea class="form-control" name="description" id="floatingTextarea2" style="height: 100px"></textarea>
        <label for="floatingTextarea2">Comments</label>
    </div>

    <button type="submit" class="btn btn-primary">Thêm mới</button>
    <a href="<?= BASE_URL_ADMIN . '&action=categories-index' ?>" class="btn btn-danger">Quay lại danh sách</a>
</form>